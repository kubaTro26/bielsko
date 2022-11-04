<?php
$servername = "localhost";
$username = "weblide2_mbmzam";
$password = "-]y-IMbc24YNHac7";
$dbname = "weblide2_msnew";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`,
 `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`,
  `display_name`, `nip`, `first_name`, `last_name`, `firma`, `first_address_line`,
   `second_address_line`, `city`, `kod`, `wojewodztwo`, `telefon`) VALUES
    ('998', 'kuba', 'kuba1245', 'kubalka', 'kubalka@gmail.com', 'kubalka.com',
     '0000-00-00 00:00:00.000000', '', '0', '', '', '', '', '', '', '', '', '', '', '');";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>