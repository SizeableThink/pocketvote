#!/bin/bash

#Scripts to create infrastructure

#NOTE: Please change the below variables as per need
#Declare variables:
region="us-west-2"
vpc_block="10.0.0.0/16"
profile="pocketvoteprofile"
public_subnet="10.0.1.0/24"
private_subnet="10.0.0.0/24"
private_subnet_rds="10.0.2.0/24" #Note: Not necessary unless you need a database
AZ_public_subnet="us-west-2a"
AZ_private_subnet="us-west-2a"
AZ_private_subnet_rds="us-west-2b" #Note: RDS private subnet's availability zone should be different than private subnet's availability zone
main_tag="pocketvote_website"
endfile="all_instances.txt"
destroy_file="generated_destroy_infra.sh"
image="ami-bf4193c7"


test -e $endfile && rm -rf $endfile
touch $endfile

test -e $destroy_file && rm -rf $destroy_file
touch $destroy_file

# Create VPC
aws ec2 create-vpc --cidr-block ${vpc_block} --region ${region} --profile ${profile}
echo -e "Please enter the VPC ID to tag it correctly"
read vpc
echo -e "VPC: $vpc\n" >> $endfile
aws ec2 create-tags --resources $vpc --tags Key=Name,Value=${main_tag} --profile ${profile}

# Create All Subnets
aws ec2 create-subnet --vpc-id ${vpc} --cidr-block ${public_subnet}  --availability-zone ${AZ_public_subnet} --profile ${profile}
aws ec2 create-subnet --vpc-id ${vpc} --cidr-block ${private_subnet} --availability-zone ${AZ_private_subnet} --profile ${profile}
echo -e "Please enter the public_subnet id"
read pubsub_id
echo -e "PUBSUBSID: $pubsub_id\n" >> $endfile
aws ec2 create-tags --resources $pubsub_id --tags Key=Name,Value=${main_tag} --profile ${profile}
echo -e "Please enter the private_subnet id"
read privsub_id
echo -e "PRIVSUBID: $privsub_id\n" >> $endfile
aws ec2 create-tags --resources $privsub_id --tags Key=Name,Value=${main_tag} --profile ${profile}

#Create Subnet in another availability zone for RDS
echo ""
echo "Creating Subnet in different availability Zone for RDS"
aws ec2 create-subnet --vpc-id ${vpc} --cidr-block ${private_subnet_rds} --availability-zone ${AZ_private_subnet_rds} --profile ${profile}
echo -e "Please enter the private_subnet id for RDS"
read privsub_id_rds
echo -e "PRIVSUBID_RDS: $privsub_id_rds\n" >> $endfile
aws ec2 create-tags --resources $privsub_id_rds --tags Key=Name,Value=${main_tag} --profile ${profile}


# Create IGW
aws ec2 create-internet-gateway --region ${region} --profile ${profile}
echo -e "Please enter the igw id"
read igw_id
echo -e "IGWID: $igw_id\n" >> $endfile
aws ec2 attach-internet-gateway --vpc-id $vpc --internet-gateway-id $igw_id --profile ${profile} --region ${region}
aws ec2 create-tags --resources $igw_id --tags Key=Name,Value=${main_tag} --profile ${profile}

#Create Custom Route Table for VPC and Assign to IGW
aws ec2 create-route-table --vpc-id $vpc --region ${region} --profile ${profile}
echo -e "Please enter the route table id"
read pub_route_id
echo -e "PUBROUTEID: $pub_route_id\n" >> $endfile
aws ec2 create-route --route-table-id $pub_route_id --destination-cidr-block 0.0.0.0/0 --gateway-id $igw_id --profile ${profile} --region ${region}
aws ec2 create-tags --resources $pub_route_id --tags Key=Name,Value=public_${main_tag} --profile ${profile}
aws ec2 associate-route-table  --subnet-id $pubsub_id --route-table-id $pub_route_id --profile ${profile} --region ${region}
aws ec2 describe-route-tables --route-table-id $pub_route_id  --profile ${profile} --region ${region} 


# Create Private RouteTable and Associate it to private subnet
aws ec2 create-route-table --vpc-id $vpc --region ${region} --profile ${profile}
echo -e "Please enter the route table id"
read priv_route_id
echo -e "PRIVROUTEID: $priv_route_id\n" >> $endfile
aws ec2 create-tags --resources $priv_route_id --tags Key=Name,Value=private_${main_tag} --profile ${profile} --region ${region}
aws ec2 associate-route-table  --subnet-id $privsub_id --route-table-id $priv_route_id --profile ${profile} --region ${region}
aws ec2 describe-route-tables --route-table-id $priv_route_id  --profile ${profile} --region ${region} 

# Create Private RouteTable for RDS 2nd Avaialability Zone and Associate it to private subnet
aws ec2 create-route-table --vpc-id $vpc --region ${region} --profile ${profile}
echo -e "Please enter the route table id"
read priv_route_id_rds
echo -e "PRIVROUTEID_RDS: $priv_route_id_rds\n" >> $endfile
aws ec2 create-tags --resources $priv_route_id_rds --tags Key=Name,Value=private_2_${main_tag} --profile ${profile} --region ${region}
aws ec2 associate-route-table  --subnet-id $privsub_id_rds --route-table-id $priv_route_id_rds --profile ${profile} --region ${region}
aws ec2 describe-route-tables --route-table-id $priv_route_id_rds  --profile ${profile} --region ${region} 


# Create NATGateway and ElasticIP as well as Associate to Private Route Table
aws ec2 allocate-address  --profile ${profile} --region ${region}
echo -e "Please enter the elasticip id"
read elastic_id
echo -e "ELASTICID: $elastic_id\n" >> $endfile
aws ec2 create-nat-gateway --subnet-id $pubsub_id --allocation-id $elastic_id --profile ${profile}
echo -e "Please enter the nat gateway id"
read natgw_id
echo -e "NATGWID: $natgw_id\n" >> $endfile
aws ec2 create-tags --resources $natgw_id --tags Key=Name,Value=NAT_${main_tag} --profile ${profile} --region ${region}
#aws ec2 create-nat-gateway --subnet-id $pubsub_id --allocation-id $elastic_id
aws ec2 create-route --route-table-id $priv_route_id --destination-cidr-block 0.0.0.0/0 --gateway-id $natgw_id --profile ${profile} --region ${region}



# Create Key Pair
aws ec2 create-key-pair --key-name pvkeypair --query 'KeyMaterial' --output text --profile ${profile} > pvkeypair.pem
chmod 400 pvkeypair.pem

#Create Security Group
aws ec2 create-security-group --group-name SSHAccess --description "Security group for SSH access" --vpc-id $vpc --profile ${profile}
echo -e "Please enter the security group id"
read security_group_id
echo -e "SECURITYGROUPID: $security_group_id\n" >> $endfile
aws ec2 authorize-security-group-ingress --group-id $security_group_id --protocol tcp --port 22 --cidr 0.0.0.0/0 --profile ${profile}

# Create EC2 Instance
aws ec2 run-instances --image-id ${image} --count 1 --instance-type t2.micro --key-name  pvkeypair --security-group-ids $security_group_id --subnet-id $pubsub_id --profile ${profile} --region ${region}


echo -e "Please enter the ec2 instance id"
read ec2instance_id
echo -e "EC2ID: $security_group_id\n" >> $endfile
aws ec2 create-tags --resources $ec2instance_id --tags Key=Name,Value=ec2_${main_tag} --profile ${profile} --region ${region}

# Tell User to Create RDS Instance
#echo "Please create an RDS instance that is MYSQL minimum requirements with DBNAME maria and Table called tester."
#echo "Make sure to run sql scripts that in folder db"
echo "Please create an RDS instance from Console. Instructions are given in the README file."
echo "SQL Scripts are placed under db folder"


#setting up destory_infra.sh.
echo -e "aws ec2 terminate-instances --instance-ids ${ec2instance_id} --profile ${profile}" >> $destroy_file
echo -e "aws ec2 wait instance-terminated --instance-ids ${ec2instance_id} --profile ${profile}" >> $destroy_file
echo -e "aws ec2 delete-nat-gateway --nat-gateway-id $natgw_id --profile ${profile}" >> $destroy_file
echo -e "echo \"Going to wait for 5 minutes for Network Interface to destroy\""  >> $destroy_file
echo -e "sleep 300"  >> $destroy_file
echo -e "aws ec2 delete-security-group --group-id $security_group_id --profile ${profile}" >> $destroy_file
echo -e "aws ec2 delete-subnet --subnet-id $privsub_id --profile ${profile}" >> $destroy_file
echo -e "aws ec2 delete-subnet --subnet-id $pubsub_id --profile ${profile}" >> $destroy_file
echo -e "aws ec2 delete-subnet --subnet-id $privsub_id_rds --profile ${profile}" >> $destroy_file
echo -e "aws ec2 delete-route-table --route-table-id $pub_route_id --profile ${profile}" >> $destroy_file
echo -e "aws ec2 delete-route-table --route-table-id $priv_route_id_rds --profile ${profile}" >> $destroy_file
echo -e "aws ec2 delete-route-table --route-table-id $priv_route_id --profile ${profile}" >> $destroy_file
echo -e "aws ec2 detach-internet-gateway --internet-gateway-id $igw_id --vpc-id $vpc --profile ${profile}" >> $destroy_file
echo -e "aws ec2 delete-internet-gateway --internet-gateway-id $igw_id --profile ${profile}" >> $destroy_file
echo -e "aws ec2 delete-vpc --vpc-id $vpc --profile ${profile}" >> $destroy_file
chmod 700 $destroy_file
