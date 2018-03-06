DEPLOY DIRECTIONS
==========

### Vagrant Testing

Steps to test pocketvote on Vagrant VM:

-	vagrant up --provision - vagrant ssh
-	In vagrant vm run commands:
	-	sudo su -
	- 	chkconfig httpd on
	-	lynx localhost:80
-	Exit out of Vagrant
-	Run: vagrant destroy

### Provisioner.

Provisioner installs LAMP stack among a few other things to create a web server and move the pocketvote files to /var/www/html where they can be hosted for webiste. Also creates service user and group. 


### Setting Up Production Environment


##Prerequisites
* Linux environment up and running

* AWS CLI already installed on Linux Machine or install using the command
    
    ```
    sudo pip install --upgrade awscli
	```

* An AWS account is required with the Access id and the Secret Access id to authenticate with AWS.

## Compatibility
This file is created as per the Linux requirements. And it is also tested on the Linux machine. There may be some compatibilities issues with the Mac system.

## How to execute create_infra.sh file
* Download the create_infra_pocketvote.sh and place it in the folder from where you need to execute the script.

* Make file script name executable by using

     ```
     chmod 755 scriptname
     ```
    
* Configure named profile which will be used to create the infrastructure

         ```
         aws configure --profile pocketvoteprofile
		 ```
		 
* Provide the Access key and the Secret access key

* Region as us-west-2

* Now execute the file to create infrastructure on the terminal by using the below command

       ```` 
       ./create_infra_pocketvote.sh or sh create_infra_pocketvote.sh
       ````
	   
###### **Follow the instruction along with the script**
* When we run the script, it will ask for the VPC ID, paste VPC ID (without quotes) and hit enter

* Then it will ask for the two Subnets ID, paste it and hit enter again

* When asked for the public subnet, paste any subnet id as public subnet and one as private.

* It will create two subnet one public and another one as private.

* It will again ask for the subnet id, which will be created in another Availibility Zone (AZ), in order to attach the RDS with it.

* Now, paste the Internet Gateway ID (IGW) and hit enter

* Paste all three Route table IDs which will be connected to tagged with each subnet.

* Select Allocation ID and paste in the Elasticip ID, hit enter

* Paste the NAT Gateway ID, press enter

* Copy and paste the EC2 Instance id which starts from 'I'.

* Script will ask for the Security Group(SG), paste it and hit enter.

###### **After the infrastructure has created, it will ask to create the RDS and run the SQL scripts**
###### **Please follow the steps below, in order to create the RDS from console and run the SQL script to create the required tablespace in the RDS**

### RDS
##### Steps to create RDS through AWS console
* Select RDS from the services

* Go to instances, select Launch DB instance

* Select MariaDB from the select engine and click next 
* Choose Dev/Test-MariaDB from the Use Case list and click next 
     * *The Amazon RDS Free Tier provides a single db.t2.micro
instance as well as up to 20 GB of storage**
* Licence Model  - general-public-license (by default)
* DB Engine version – mariadb 10.1.26
*  DB instance class - db.t2.micro – 1vCPU, 1 GiB RAM 
* Multi-AZ deployment – Select No (as we do not need to deploy in multiple regions)
* Storage type – General Purpose(SSD)
* Allocated storage – 20 GB
* DB Instance identifier -  pocketvotedb
* Master username – Set username
* Master password – Set password
* Virtual Private Cloud(VPC) - Select pocketvote_website 
* Public accessibility  - Select No
* Availability Zone – us-west-2a
* VPC security group  - select existing VPC security groups
    SSH Access(VPC)
* Database name - pocket_vote
* Database port – 3306
* No preference for Back up
* Disabled enhanced monitoring
* Disable auto minor version upgrade
* No preference for Maintenance window
* Click on Launch DB Instance
	
**Make sure the config.php file in pocketvote/php has your RDS credentials before deploying.**

**Please refer the README in the SQL folder to deploy the SQL code into the RDS**

## Destroying Production Environment
### Destroy Infrastructure

###### **create_infra_pocketvote will generate two output files**

1. all_instances.txt -  Which has all the different AWS component ID

2. generated_destroy_infra.sh - Which will destroy the entire infrastruture upon execution.

To destroy the infrastructure, execute the generated_destroy_infra.sh by using the command

```
./generated_destroy_infra.sh
```
or 
```
sh generated_destroy_infra.sh
```	  

###### **Above script will delete all the dependencies first and then delete the VPC**

### Running provisioner on EC2 Instance

-	scp -i ~/.ssh/somekeypair.pem deploy.tar.gz ec2-user@somehost:/tmp 
- 	ssh -i somekeypair.pem ec2-user@somehost
-	sudo su -
-	yum update
-	rpm -Uvh https://mirror.webtatic.com/yum/el6/latest.rpm
-	yum list php55w*
-	yum install yum-plugin-replace
-	yum replace php-common --replace-with=php55w-common
-	service httpd restart
-	cd /tmp
-	tar -xvzf deploy.tar.gz
-	cd deploy
-	chmod +x provisioner.sh
-	./provisioner.sh
