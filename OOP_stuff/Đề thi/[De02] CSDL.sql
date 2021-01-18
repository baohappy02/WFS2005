CREATE DATABASE De02;

USE De02;

ALTER DATABASE De02
DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;

CREATE TABLE Subject (
	Id int AUTO_INCREMENT,
	Name varchar(100) NOT NULL,
	Credit int DEFAULT 1 NOT NULL,
	Multiplier int DEFAULT 1 NOT NULL,
	TeacherId int,
	Status boolean DEFAULT 1 NOT NULL,
	PRIMARY KEY (Id)
) ENGINE = INNODB;

CREATE TABLE Teacher (
	Id int AUTO_INCREMENT,
	FirstName varchar(100) NOT NULL,
	LastName varchar(100) NOT NULL,
	Salary int DEFAULT 0 NOT NULL,
	Status boolean DEFAULT 1 NOT NULL,
	PRIMARY KEY (Id)
) ENGINE = INNODB;

ALTER TABLE Subject
ADD FOREIGN KEY (TeacherId) REFERENCES Teacher(Id);

INSERT INTO Teacher (FirstName, LastName, Salary) VALUES ('Dương', 'Hữu Phước', 20000000);
INSERT INTO Teacher (FirstName, LastName, Salary) VALUES ('Lữ', 'Cao Tiến', 17000000);
INSERT INTO Teacher (FirstName, LastName, Salary) VALUES ('Trần', 'Quang Khải', 10500000);
INSERT INTO Teacher (FirstName, LastName, Salary) VALUES ('Nguyễn', 'Thị Ngọc', 12000000);
INSERT INTO Teacher (FirstName, LastName, Salary) VALUES ('Vũ', 'Đình Bảo', 14000000);

INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Lập trình C/C++', 6, 6, 1);
INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Cấu trúc dữ liệu & giải thuật', 3, 3, 4);
INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Thực hành Cấu trúc dữ liệu & giải thuật', 3, 1, 5);
INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Phương pháp lập trình hướng đối tượng', 3, 3, 1);
INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Thực hành Phương pháp lập trình hướng đối tượng', 3, 1, 1);
INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Lập trình ứng dụng web với ASP.NET', 4, 4, 3);
INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Thực hành Lập trình ứng dụng web với ASP.NET', 3, 2, 3);
INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Lập trình ứng dụng đi động', 3, 4, 2);
INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Đồ án Lập trình ứng dụng đi động', 2, 1, 2);
INSERT INTO Subject (Name, Credit, Multiplier, TeacherId) VALUES ('Đồ án tốt nghiệp', 8, 10, 1);

