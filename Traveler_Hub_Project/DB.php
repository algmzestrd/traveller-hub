<?php
$servername = "mysql.cs.iastate.edu";
$username = "u30914";
$password = "AfzMyGF4c7";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE db30914",
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


// sql to create table
$sql = "CREATE TABLE `db30914`.`User` (
  `User_ID` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NULL,
  `register_date` INT NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`User_ID`));
)";

if ($conn->query($sql) === TRUE) {
    echo "Table User created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = " CREATE TABLE `db30914`.`Activity` (
  `Activity_ID` VARCHAR(45) NOT NULL,
  `Title` VARCHAR(45) NULL,
  `User_ID` varchar(45) NULL,
  `Content` VARCHAR(300) NULL,
   `Limit` INT NULL,
   `Post_Time` DATETIME NULL,
  
  PRIMARY KEY (`ActivityID`));
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Activity created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = " CREATE TABLE `db30914`.`Profile` (
  `User_ID` VARCHAR(45) reference User(User_ID) NOT NULL,
  `location` VARCHAR(45) NULL,
  `description` VARCHAR(300) NULL,

));";

if ($conn->query($sql) === TRUE) {
    echo "Table Profile created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = " CREATE TABLE `db30914`.`Post` (
  `Qustion_ID` VARCHAR(45) NOT NULL,
  `Post_Time` DATETIME NULL,
  `User_ID` varchar(45) reference User(User_ID) NULL,
  `Content` VARCHAR(300) NULL,
   'Title' VARCHAR(45) null,
  
  PRIMARY KEY (`Question_ID`));";

if ($conn->query($sql) === TRUE) {
    echo "Table Post created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "  CREATE TABLE `db30914`.`Reply` (
  `User_ID` VARCHAR(45) NOT NULL,
  `Question_ID` VARCHAR(45) NOT NULL,
  `Answer_ID` varchar(45) NOT NULL,
  `Content` VARCHAR(300) NULL,
   `Post_Time` DATETIME NULL,
  
  PRIMARY KEY (`Answer_ID`));";

if ($conn->query($sql) === TRUE) {
    echo "Table Reply created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



$sql = " CREATE TABLE `db30914`.`particpate` (
  `User_ID` VARCHAR(45) NOT NULL,
  `Activity_ID` VARCHAR(45) NOT NULL,
   `Post_Time` DATETIME NULL,
  
  PRIMARY KEY (`Activity_ID`,'User_ID'));";

if ($conn->query($sql) === TRUE) {
    echo "Table particpate created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



$conn->close();
?>