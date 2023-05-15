-- Create the ojtcs_database if it doesn't exist
CREATE DATABASE IF NOT EXISTS ojtcs_database;
USE ojtcs_database;

-- Create tbl_Admin table
CREATE TABLE IF NOT EXISTS tbl_Admin (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    admin_uname VARCHAR(255) NOT NULL,
    admin_pword VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    department VARCHAR(255) NOT NULL,
    role INT NOT NULL COMMENT '1-Admin, 2-Trainee' DEFAULT 1,
    LogginStatus INT NOT NULL COMMENT '0 - Offline, 1 - Online' DEFAULT 0
);

-- Create tbl_Trainee table
CREATE TABLE IF NOT EXISTS tbl_Trainee (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    trainee_uname VARCHAR(255) NOT NULL,
    trainee_pword VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    course VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    phone VARCHAR(20) NOT NULL,
    image VARCHAR(255) NOT NULL,
    role INT NOT NULL COMMENT '1-Admin, 2-Trainee' DEFAULT 2,
    status INT NOT NULL COMMENT '0 - Pending, 1 - Accepted, 2 - Rejected' DEFAULT 0,
    LogginStatus INT NOT NULL COMMENT '0 - Offline, 1 - Online' DEFAULT 0
);

-- Create tbl_Accounts table
CREATE TABLE IF NOT EXISTS tbl_Accounts (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    UID VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_type VARCHAR(255) NOT NULL COMMENT '1-Admin, 2-Trainee'
);

-- Create trigger to sync data from tbl_Admin to tbl_Accounts
DELIMITER //
CREATE TRIGGER Insert_Admin
AFTER INSERT ON tbl_Admin
FOR EACH ROW
BEGIN
    INSERT INTO tbl_Accounts (UID, name, username, password, user_type)
    VALUES (NEW.ID, NEW.name, NEW.admin_uname, NEW.admin_pword, New.role);
END//
DELIMITER ;

-- Create trigger to sync data from tbl_Trainee to tbl_Accounts
DELIMITER //
CREATE TRIGGER Insert_Trainee
AFTER INSERT ON tbl_Trainee
FOR EACH ROW
BEGIN
    INSERT INTO tbl_Accounts (UID, name, username, password, user_type)
    VALUES (NEW.ID,  NEW.name, NEW.trainee_uname, NEW.trainee_pword, NEW.role);
END//
DELIMITER ;

