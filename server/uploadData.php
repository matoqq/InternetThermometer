<?php

$action = "";
$location = "";
$temperature1 = "";
$temperature2 = "";
$humidity1 = "";
$humidity2 = "";

if(isset($_POST['action'])){$action = $_POST['action'];}
if(isset($_POST['location'])){$location = $_POST['location'];}
if(isset($_POST['temperature1'])){$temperature1 = $_POST['temperature1'];}
if(isset($_POST['temperature2'])){$temperature2 = $_POST['temperature2'];}
if(isset($_POST['humidity1'])){$humidity1 = $_POST['humidity1'];}
if(isset($_POST['humidity2'])){$humidity2 = $_POST['humidity2'];}

/*
$action = $_POST["action"];
$location = $_POST["location"];
$temperature1 = $_POST["temperature1"];
$temperature2 = $_POST["temperature2"];
$humidity1 = $_POST["humidity1"];
$humidity2 = $_POST["humidity2"];
*/

/*$action = $_GET["action"];
$location = $_GET["location"];
$temperature1 = $_GET["temperature1"];
$temperature2 = $_GET["temperature2"];
$humidity1 = $_GET["humidity1"];
$humidity2 = $_GET["humidity2"];*/

echo "action = ".$action."<br>";
echo "temperature1 = ".$temperature1."<br>";
echo "temperature2 = ".$temperature2."<br>";
echo "humidity1 = ".$humidity1."<br>";
echo "humidity2 = ".$humidity2."<br>";
echo "location = ".$location."<br>";


include("dbinfo.php");

$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="INSERT INTO sensors_table (temperature1, temperature2, humidity1, humidity2, location) VALUES (".$temperature1.",".$temperature2.",".$humidity1.",".$humidity2.",'".$location."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>