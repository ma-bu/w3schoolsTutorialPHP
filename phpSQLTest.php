<?php
/**
 * Created by IntelliJ IDEA.
 * User: manuel
 * Date: 03.03.16
 * Time: 21:04
 */

echo "

    <h1>PHP and MySQL Testpage ;)</h1>

";

#Open first Connection to MySQL

$servername = "localhost";
$username = "root";
$password = "a190xg52300";
$dbName = "myDB";

#create connection

$conn = new mysqli($servername, $username, $password);

#check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} else{
    echo "Database-Connection successfully";
}

echo "<br><br>";

#Create database

$sqlQuery = "CREATE DATABASE ".$dbName;

echo $sql;

    #create database
    if($conn->query($sqlQuery) === true){
        echo "successfully created database: ".$dbName;
    } else {
        echo "Error creating database: ".$conn->error;
    }

    #close connection
    $conn->close();

echo "<br><br>";

#sql statement to create a table

$tableName = "MyGuests";

    $sqlCreateTable = "
    CREATE TABLE ".$tableName." (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )
    ";

    #open new connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    #check connection
    if($conn->connect_error === TRUE){
        die("Error connecting to Database: ".$dbName);
    }else{
        echo "Successfully connected to Database: ".$dbName;
    }

echo "<br><br>";

    #create table
    if($conn->query($sqlCreateTable) === TRUE){
        echo "Successfully created Table: ".$tableName;
    } else{
        echo "Error creating table ".$tableName." ".$conn->error;
    }

#close connection
$conn->close();

echo "<br><br>";



#sql statement to insert data into MyGuests

$sqlInsertDataToMyGuestst = "
INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John','Doe','doe@buchert.onl')
";

    #open new connection
    $conn = new mysqli($servername,$username,$password,$dbName);
    #check connection
    if($conn->connect_error === TRUE){
        die("Error connecting to Database: ".$dbName);
    } else {
        echo "Successfully connected to Database: ".$dbName;
    }

echo "<br><br>";

    #insert data into the database
    if($conn->query($sqlInsertDataToMyGuestst) === TRUE){
        echo "Successfully inserted data to table: ".$tableName." of database: ".$dbName;
    } else{
        echo "Error inserting data to table: ".$tableName." of database: ".$dbName;
    }

    #close connection
    $conn->close();

echo "<br><br>";




