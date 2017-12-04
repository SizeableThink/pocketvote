CREATE TABLE Organizer
             (EmailID          VARCHAR(255)     NOT NULL,
              Password         VARCHAR(255)     NOT NULL,
              FirstName        VARCHAR(25),
              LastName         VARCHAR(30),
              
CONSTRAINT EmailID_PK PRIMARY KEY (EmailID));

CREATE TABLE Poll
             (PollID                      NUMERIC(15)        NOT NULL,
              BallotType                  VARCHAR(50)        NOT NULL,
              BallotName                  VARCHAR(50)        NOT NULL,
              PollURL                     VARCHAR(2083),
              EmailID                     VARCHAR(255),
              Ctreation_Time              DATETIME, 
   
CONSTRAINT PollID_PK PRIMARY KEY (PollID),
CONSTRAINT EmailID_FK1 FOREIGN KEY (EmailID) REFERENCES Organizer(EmailID));
        

CREATE TABLE Ballot_Choice
             (BallotChoice_ID       NUMERIC(15)      NOT NULL,
              PollID                NUMERIC(15)      NOT NULL,
              BallotChoice         VARCHAR(20),
CONSTRAINT BallotChoiceID_PK PRIMARY KEY (BallotChoice_ID),
CONSTRAINT PollID_FK1 FOREIGN KEY (PollID) REFERENCES Poll(PollID));

CREATE TABLE Ballot
             (BallotID             NUMERIC(15)    NOT NULL,
               PollID              NUMERIC(15)    NOT NULL,             
CONSTRAINT BallotID_PK PRIMARY KEY (BallotID),
CONSTRAINT PollID_FK2 FOREIGN KEY (PollID) REFERENCES Poll(PollID));             
            


CREATE TABLE Selected_Ballot_Choices
             (BallotID                           NUMERIC(15)    NOT NULL,
              BallotChoice_ID                    NUMERIC(15)    NOT NULL,
              Selection                          NUMERIC(5)    NOT NULL,             
CONSTRAINT  COMPOSITE_KEY PRIMARY KEY(BallotID, BallotChoice_ID),
CONSTRAINT BallotID_FK1 FOREIGN KEY (BallotID) REFERENCES Ballot(BallotID),
CONSTRAINT BallotChoice_ID_FK2 FOREIGN KEY (BallotChoice_ID) REFERENCES Ballot_Choice(BallotChoice_ID));