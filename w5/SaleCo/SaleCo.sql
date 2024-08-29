/* Introduction to SQL 					*/
/* Script file for MySQL DBMS			*/
/* This script file creates the following tables:	*/
/* tblVendor, tblProduct, tblCustomer, tblInvoice, tblLine		*/
/* and loads the default data rows	*/

BEGIN;
create DATABASE saleco;
use saleco;

CREATE TABLE tblVendor (
vCode 		INTEGER NOT NULL,
vName 		VARCHAR(35) NOT NULL,
vContact 	VARCHAR(15) NOT NULL,
vAreacode 	CHAR(3) NOT NULL,
vPhone  	CHAR(8) NOT NULL,
vState	 	CHAR(2) NOT NULL,
vOrder	 	CHAR(1) NOT NULL,
PRIMARY KEY (vCode));

CREATE TABLE tblProduct (
pCode	 	VARCHAR(10) NOT NULL,
pDescript 	VARCHAR(35) NOT NULL,
pIndate 	DATETIME NOT NULL,
pQoh        INTEGER NOT NULL,
pMin 		INTEGER NOT NULL,
pPrice	 	NUMERIC(8,2) NOT NULL,
pDiscount 	NUMERIC(4,2) NOT NULL,
vCode 		INTEGER,
PRIMARY KEY (pCode),
FOREIGN KEY (vCode) REFERENCES tblVendor(vCode));

CREATE TABLE tblCustomer(
cusCode		INTEGER NOT NULL,
cusLName	VARCHAR(15) NOT NULL,
cusFName	VARCHAR(15) NOT NULL,
cusInitial	CHAR(1),
cusAreaCode	CHAR(3),
cusPhone	CHAR(8) NOT NULL,
cusBalance	NUMERIC(9,2) DEFAULT 0.00,
PRIMARY KEY(cusCode));

CREATE TABLE tblInvoice (
invNumber  	INTEGER NOT NULL,
cusCode		INTEGER NOT NULL,
invDate  	DATETIME NOT NULL,
PRIMARY KEY (invNumber),
FOREIGN KEY (cusCode) REFERENCES tblCustomer(cusCode));

CREATE TABLE tblLine (
invNumber 	INTEGER NOT NULL,
tblLineNumber	NUMERIC(2,0) NOT NULL,
pCode		VARCHAR(10) NOT NULL,
tblLineUnits	NUMERIC(9,2) DEFAULT 0.00 NOT NULL,
tblLinePrice	NUMERIC(9,2) DEFAULT 0.00 NOT NULL,
PRIMARY KEY (invNumber,tblLineNumber),
FOREIGN KEY (invNumber) REFERENCES tblInvoice(invNumber) ON DELETE CASCADE,
FOREIGN KEY (pCode) REFERENCES tblProduct(pCode));

/* Loading data rows					*/
/* tblVendor rows						*/
INSERT INTO tblVendor VALUES(21225,'Bryson, Inc.'    ,'Smithson','615','223-3234','TN','Y');
INSERT INTO tblVendor VALUES(21226,'SuperLoo, Inc.'  ,'Flushing','904','215-8995','FL','N');
INSERT INTO tblVendor VALUES(21231,'D&E Supply'      ,'Singh'   ,'615','228-3245','TN','Y');
INSERT INTO tblVendor VALUES(21344,'Gomez Bros.'     ,'Ortega'  ,'615','889-2546','KY','N');
INSERT INTO tblVendor VALUES(22567,'Dome Supply'     ,'Smith'   ,'901','678-1419','GA','N');
INSERT INTO tblVendor VALUES(23119,'Randsets Ltd.'   ,'Anderson','901','678-3998','GA','Y');
INSERT INTO tblVendor VALUES(24004,'Brackman Bros.'  ,'Browning','615','228-1410','TN','N');
INSERT INTO tblVendor VALUES(24288,'ORDVA, Inc.'     ,'Hakford' ,'615','898-1234','TN','Y');
INSERT INTO tblVendor VALUES(25443,'B&K, Inc.'       ,'Smith'   ,'904','227-0093','FL','N');
INSERT INTO tblVendor VALUES(25501,'Damal Supplies'  ,'Smythe'  ,'615','890-3529','TN','N');
INSERT INTO tblVendor VALUES(25595,'Rubicon Systems' ,'Orton'   ,'904','456-0092','FL','Y');

/* tblProduct rows						*/
INSERT INTO tblProduct VALUES('11QER/31','Power painter, 15 psi., 3-nozzle'     ,'2017-11-03',  8,  5,109.99,0.00,25595);
INSERT INTO tblProduct VALUES('13-Q2/P2','7.25-in. pwr. saw blade'              ,'2017-12-13', 32, 15, 14.99,0.05,21344);
INSERT INTO tblProduct VALUES('14-Q1/L3','9.00-in. pwr. saw blade'              ,'2017-11-13', 18, 12, 17.49,0.00,21344);
INSERT INTO tblProduct VALUES('1546-QQ2','Hrd. cloth, 1/4-in., 2x50'            ,'2018-01-15', 15,  8, 39.95,0.00,23119);
INSERT INTO tblProduct VALUES('1558-QW1','Hrd. cloth, 1/2-in., 3x50'            ,'2018-01-15', 23,  5, 43.99,0.00,23119);
INSERT INTO tblProduct VALUES('2232/QTY','B&D jigsaw, 12-in. blade'             ,'2017-12-30',  8,  5,109.92,0.05,24288);
INSERT INTO tblProduct VALUES('2232/QWE','B&D jigsaw, 8-in. blade'              ,'2017-12-24',  6,  5, 99.87,0.05,24288);
INSERT INTO tblProduct VALUES('2238/QPD','B&D cordless drill, 1/2-in.'          ,'2018-01-20', 12,  5, 38.95,0.05,25595);
INSERT INTO tblProduct VALUES('23109-HB','Claw hammer'                          ,'2018-01-20', 23, 10,  9.95,0.10,21225);
INSERT INTO tblProduct VALUES('23114-AA','Sledge hammer, 12 lb.'                ,'2018-01-02',  8,  5, 14.40,0.05,NULL);
INSERT INTO tblProduct VALUES('54778-2T','Rat-tail file, 1/8-in. fine'          ,'2017-12-15', 43, 20,  4.99,0.00,21344);
INSERT INTO tblProduct VALUES('89-WRE-Q','Hicut chain saw, 16 in.'              ,'2018-02-07', 11,  5,256.99,0.05,24288);
INSERT INTO tblProduct VALUES('PVC23DRT','PVC pipe, 3.5-in., 8-ft'              ,'2018-02-20',188, 75,  5.87,0.00,NULL);
INSERT INTO tblProduct VALUES('SM-18277','1.25-in. metal screw, 25'             ,'2018-03-01',172, 75,  6.99,0.00,21225);
INSERT INTO tblProduct VALUES('SW-23116','2.5-in. wd. screw, 50'                ,'2018-02-24',237,100,  8.45,0.00,21231);
INSERT INTO tblProduct VALUES('WR3/TT3' ,'Steel matting, 4''x8''x1/6", .5" mesh','2018-01-17', 18,  5,119.95,0.10,25595);


/* tblCustomer rows					*/
INSERT INTO tblCustomer VALUES(10010,'Ramas'   ,'Alfred','A' ,'615','844-2573',0);
INSERT INTO tblCustomer VALUES(10011,'Dunne'   ,'Leona' ,'K' ,'713','894-1238',0);
INSERT INTO tblCustomer VALUES(10012,'Smith'   ,'Kathy' ,'W' ,'615','894-2285',345.86);
INSERT INTO tblCustomer VALUES(10013,'Olowski' ,'Paul'  ,'F' ,'615','894-2180',536.75);
INSERT INTO tblCustomer VALUES(10014,'Orlando' ,'Myron' ,NULL,'615','222-1672',0);
INSERT INTO tblCustomer VALUES(10015,'O''Brian','Amy'   ,'B' ,'713','442-3381',0);
INSERT INTO tblCustomer VALUES(10016,'Brown'   ,'James' ,'G' ,'615','297-1228',221.19);
INSERT INTO tblCustomer VALUES(10017,'Williams','George',NULL,'615','290-2556',768.93);
INSERT INTO tblCustomer VALUES(10018,'Farriss' ,'Anne'  ,'G' ,'713','382-7185',216.55);
INSERT INTO tblCustomer VALUES(10019,'Smith'   ,'Olette','K' ,'615','297-3809',0);

/* tblInvoice rows						*/
INSERT INTO tblInvoice VALUES(1001,10014,'2018-01-16');
INSERT INTO tblInvoice VALUES(1002,10011,'2018-01-16');
INSERT INTO tblInvoice VALUES(1003,10012,'2018-01-16');
INSERT INTO tblInvoice VALUES(1004,10011,'2018-01-17');
INSERT INTO tblInvoice VALUES(1005,10018,'2018-01-17');
INSERT INTO tblInvoice VALUES(1006,10014,'2018-01-17');
INSERT INTO tblInvoice VALUES(1007,10015,'2018-01-17');
INSERT INTO tblInvoice VALUES(1008,10011,'2018-01-17');

/* tblLine rows						*/
INSERT INTO tblLine VALUES(1001,1,'13-Q2/P2',1,14.99);
INSERT INTO tblLine VALUES(1001,2,'23109-HB',1,9.95);
INSERT INTO tblLine VALUES(1002,1,'54778-2T',2,4.99);
INSERT INTO tblLine VALUES(1003,1,'2238/QPD',1,38.95);
INSERT INTO tblLine VALUES(1003,2,'1546-QQ2',1,39.95);
INSERT INTO tblLine VALUES(1003,3,'13-Q2/P2',5,14.99);
INSERT INTO tblLine VALUES(1004,1,'54778-2T',3,4.99);
INSERT INTO tblLine VALUES(1004,2,'23109-HB',2,9.95);
INSERT INTO tblLine VALUES(1005,1,'PVC23DRT',12,5.87);
INSERT INTO tblLine VALUES(1006,1,'SM-18277',3,6.99);
INSERT INTO tblLine VALUES(1006,2,'2232/QTY',1,109.92);
INSERT INTO tblLine VALUES(1006,3,'23109-HB',1,9.95);
INSERT INTO tblLine VALUES(1006,4,'89-WRE-Q',1,256.99);
INSERT INTO tblLine VALUES(1007,1,'13-Q2/P2',2,14.99);
INSERT INTO tblLine VALUES(1007,2,'54778-2T',1,4.99);
INSERT INTO tblLine VALUES(1008,1,'PVC23DRT',5,5.87);
INSERT INTO tblLine VALUES(1008,2,'WR3/TT3',3,119.95);
INSERT INTO tblLine VALUES(1008,3,'23109-HB',1,9.95);
COMMIT;

