<?php 

$password="";
$dbname="library_management";
$server="localhost";
$user= "root";
$connect =  new mysqli($server, $user, $password, $dbname);


if (!$connect) {
    echo "error : {$connect->connect_error}";
    exit();
}

?>