/**
* Add status column to application table 
  -1 : pending
  0  : rejected
  1  : accepted
*/
USE ams;

ALTER TABLE applications
ADD status int(1) DEFAULT -1;