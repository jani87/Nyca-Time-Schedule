create table ACL
(
Person_ID int,
Role_ID int,
FOREIGN KEY(Person_ID) REFERENCES PERSONS(Person_ID)
);


ALTER table ACL
ADD constraint fk_roleID FOREIGN KEY(Role_ID) REFERENCES ROLES(Role_ID);