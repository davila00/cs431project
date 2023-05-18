<?php

$servername 	= "localhost";
$username = "root";
$password	= "";
$dbname	= "cs431";

$conn = mysqli_connect($servername, $username, $password);

function dbConnection()
{
	global $servername;
	global $username;
	global $password;
	global $dbname;

	return $conn = mysqli_connect($servername, $username, $password, $dbname);
}

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($conn, $dbname);

//create database

$sql = "CREATE DATABASE IF NOT EXISTS cs431";
if (mysqli_query($conn, $sql)) {
} else {
	echo "Error creating database: " . mysqli_error($conn);
}

//create provider table
$sql = "CREATE TABLE `provider_table` (
	`Name` varchar(255) NOT NULL,
	`Email` varchar(255) NOT NULL,
	`Password` varchar(255) NOT NULL,
	`Location` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

//create appointment table
$sql = "CREATE TABLE `appointmenttable` (
		`PatientEmail` varchar(255) NOT NULL,
		`DoctorEmail` varchar(255) NOT NULL,
		`PatientName` varchar(255) NOT NULL,
		`DoctorName` varchar(255) NOT NULL,
		`AppointmentDate` date NOT NULL,
		`ShortDescription` varchar(512) DEFAULT NULL,
		`Advice` varchar(512) DEFAULT NULL,
		`PatientAge` int(255) NOT NULL,
	`Slot` varchar(255) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";


//create doctorrequest table
$sql = "CREATE TABLE `doctorrequest_table` (
	`Name` varchar(255) NOT NULL,
	`Address` varchar(255) NOT NULL,
	`Gender` varchar(10) NOT NULL,
	`MobileNo` int(10) NOT NULL,
	`Email` varchar(255) NOT NULL,
	`Password` varchar(255) NOT NULL,
	`Department` varchar(255) NOT NULL,
	`Location` varchar(255) NOT NULL,
	`FileName` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

//create doctor table
$sql = "CREATE TABLE `maindoctable` (
	`Name` varchar(255) NOT NULL,
	`Address` varchar(255) NOT NULL,
	`Gender` varchar(255) NOT NULL,
	`MobileNo` int(10) NOT NULL,
	`Email` varchar(255) NOT NULL,
	`Department` text NOT NULL,
	`Location` varchar(255) NOT NULL,
	`Password` varchar(255) NOT NULL,
	`Slot` varchar(255) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

//create patient table
$sql = "CREATE TABLE `mainpatienttable` (
	`Name` varchar(255) NOT NULL,
	`Email` varchar(255) NOT NULL,
	`Birth_Date` date NOT NULL,
	`Gender` varchar(255) NOT NULL,
	`Location` varchar(255) NOT NULL,
	`Password` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

//create patientrequest table
$sql = "CREATE TABLE `patientrequest_table` (
	`Name` varchar(255) NOT NULL,
	`Email` varchar(255) NOT NULL,
	`Birth_Date` date NOT NULL,
	`Gender` varchar(255) NOT NULL,
	`Location` varchar(255) NOT NULL,
	`Password` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

//indexes for table `doctorrequest_table`
$sql = "ALTER TABLE `doctorrequest_table`
ADD PRIMARY KEY (`Email`)";

//indexes for table `patient_table`
$sql = "ALTER TABLE `mainpatienttable`
ADD PRIMARY KEY (`Email`)";


//indexes for table 'patientrequest_table'
$sql = "ALTER TABLE `patientrequest_table`
ADD PRIMARY KEY (`Email`)";

//commit changes
$sql = "COMMIT";
