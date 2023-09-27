<?php
$host="localhost";
$username="root";
$password="";
$db="smartpickzdb";


$con = mysqli_connect($host,$username,$password,$db);
if(!$con){
    die();
}

?>