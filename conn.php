<?php
$air_servername = "localhost";
$air_username = "root";
$air_password = "root";
$air_dbname = "locadora";
// Create connection
$air_conn = mysqli_connect($air_servername, $air_username, $air_password, $air_dbname);
// Check connection
if (!$air_conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>