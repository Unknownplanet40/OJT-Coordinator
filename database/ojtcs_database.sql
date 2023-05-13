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
    role VARCHAR(255) NOT NULL,
    status INT NOT NULL
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
    status INT NOT NULL
);

-- Create tbl_Accounts table
CREATE TABLE IF NOT EXISTS tbl_Accounts (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    UID VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL
);

-- Create trigger to sync data from tbl_Admin to tbl_Accounts
DELIMITER //
CREATE TRIGGER trg_insert_admin
AFTER INSERT ON tbl_Admin
FOR EACH ROW
BEGIN
    INSERT INTO tbl_Accounts (ID, name, username, password, status)
    VALUES (NEW.UID,  NEW.name, NEW.admin_uname, NEW.admin_pword, NEW.status);
END//
DELIMITER ;

-- Create trigger to sync data from tbl_Trainee to tbl_Accounts
DELIMITER //
CREATE TRIGGER trg_insert_trainee
AFTER INSERT ON tbl_Trainee
FOR EACH ROW
BEGIN
    INSERT INTO tbl_Accounts (ID, name, username, password, status)
    VALUES (NEW.UID,  NEW.name, NEW.trainee_uname, NEW.trainee_pword, NEW.status);
END//
DELIMITER ;

-- Insert data to tbl_Admin
INSERT INTO tbl_Admin (ID, name, admin_uname, admin_pword, email, department, role, status) 
