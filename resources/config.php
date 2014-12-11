<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "toor";
$dbName = "mks_data";

function mysql_conn($dbhost, $dbusername, $dbpassword, $dbname){
	global $conn;
	$conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
		die("Connection Aborted : " . $conn->connect_error);
	}
}

mysql_conn($dbHost, $dbUsername, $dbPassword, $dbName);
?>