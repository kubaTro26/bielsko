<?php


$servername = "localhost";
$username = "weblide2_mbmzam";
$password = "-]y-IMbc24YNHac7";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";





?>