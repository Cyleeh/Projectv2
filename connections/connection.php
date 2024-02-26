<?php

function connection(){

$host = "localhost";
$username = "root";
$password = "";
$database = "student_info";

$con = new mysqli($host, $username, $password, $database);

// check if may connection error- nag add ko else statement tas echo if connected

if($con->connect_error){
        echo $con->connect_error;
}else{
    return $con;
}
        
}