<?php

require_once('database_credentials.php');

//*******Principal Function to Connect Data Base On Mysql*********//
function conexion()
{ 
 
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE); 
 if (mysqli_connect_errno()) {
    printf(error_db_connect());
    exit();
    }
    return $mysqli;
}
 
