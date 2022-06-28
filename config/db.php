<?php include_once 'config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn -> connect_error) {
    die("ERROR: Could not connect." );
}

// echo 'Connected succesfully<br>';