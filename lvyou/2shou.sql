CREATE DATABASE IF NOT EXISTS 2shou
COLLATE 'gb2312_chinese_ci';

USE 2shou;
CREATE TABLE IF NOT EXISTS Bulletin (
	Id INT  AUTO_INCREMENT  PRIMARY KEY,
	Title varchar(50), 
	Content varchar(1000),
	PostTime datetime,
	Poster  varchar(50)
);


CREATE TABLE IF NOT EXISTS Scenic (
	ScenicId INT  AUTO_INCREMENT  PRIMARY KEY,
	ScenicName VARCHAR(50),
	ScenicDetail VARCHAR(1000),
	ImageURL VARCHAR(100),
	Price VARCHAR(50),
	StartTime  INT,
	Priority INT,
	ClickTimes  INT
);

CREATE TABLE IF NOT EXISTS Users (
	UserId	VARCHAR(50),
	UserPwd	VARCHAR(50),
	Name	VARCHAR(50),
	Sex	TINYINT,
	Address	VARCHAR(5),
	Email	VARCHAR(50),
	UserType TINYINT
);
INSERT INTO Users VALUES('Admin', '111111', 'Admin', 1, '', '', 1);