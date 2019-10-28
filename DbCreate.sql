CREATE TABLE ddapp_vmd_spe(ID INT PRIMARY KEY AUTO_INCREMENT, NameSpe VARCHAR(128));
CREATE TABLE ddapp_vmd_tol(ID INT PRIMARY KEY AUTO_INCREMENT, Friendly VARCHAR(32));
CREATE TABLE ddapp_vmd_md(ID INT PRIMARY KEY AUTO_INCREMENT, FirstName VARCHAR(128),
    LastName VARCHAR(128), Street VARCHAR(1024), House VARCHAR(8), City VARCHAR(128),
    Zip VARCHAR(5), Country VARCHAR(128), Phone VARCHAR(32), Web VARCHAR(1024),
    `Long` FLOAT, Latt FLOAT, FK_spe INT, FK_tol INT,
    FOREIGN KEY (FK_spe) REFERENCES ddapp_vmd_spe(ID),
    FOREIGN KEY (FK_tol) REFERENCES ddapp_vmd_tol(ID));
CREATE TABLE ddapp_vmd_wait(ID INT PRIMARY KEY AUTO_INCREMENT, FirstName VARCHAR(128),
    LastName VARCHAR(128), Street VARCHAR(1024), House VARCHAR(8), City VARCHAR(128),
    Zip VARCHAR(5), Country VARCHAR(128), Phone VARCHAR(32), Web VARCHAR(1024),
    `Long` FLOAT, Latt FLOAT, FK_spe INT, FK_tol INT,
    FOREIGN KEY (FK_spe) REFERENCES ddapp_vmd_spe(ID),
    FOREIGN KEY (FK_tol) REFERENCES ddapp_vmd_tol(ID));
CREATE TABLE ddapp_vmd_usemod(uID INT PRIMARY KEY AUTO_INCREMENT, email VARCHAR(1024), uFirstname VARCHAR(256),uLastName VARCHAR(256), IP VARCHAR(256), MdID INT, WtID INT);
CREATE TABLE ddapp_vmd_adm(ID INT PRIMARY KEY AUTO_INCREMENT, FirstName VARCHAR(256), LastName VARCHAR(255), Mail VARCHAR(1024), Pwd VARCHAR(255), UserType INT);

INSERT INTO ddapp_vmd_spe(NameSpe) VALUES('M&eacute;decin G&eacute;n&eacute;raliste'),('P&eacute;diatre'),
    ('Gyn&eacute;cologue'),('Psychiatre'),('Psychologue'),('Di&eacute;t&eacute;ticien');
INSERT INTO ddapp_vmd_tol(Friendly) VALUES('Vegan'),('Vegetarian');
INSERT INTO ddapp_vmd_adm(FirstName,LastName,Mail,Pwd,UserType) VALUES('Admin','Test','admin@test.com','$2y$10$jIM73Nx6r/E/QyyJd3IXuunrBJ1/zdeltDF23QXjfhb2mM6TmaoA6','1');
