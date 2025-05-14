<?php

define('DB_HOST', 'localhost');    
define('DB_USERNAME', 'u474763945_fx_career_ae_u');     
define('DB_PASSWORD', 'Mahip@123#$');        
define('DB_NAME', 'u474763945_fx_career_ae'); 
$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// You can now use $connection for your queries
?>
