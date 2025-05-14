<?php
$servername = "localhost";
$username = "u474763945_fx_career_ae_u";
$password = 'Mahip@123#$';
$database = 'u474763945_fx_career_ae';
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>