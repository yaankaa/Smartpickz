<?php
session_start();
include "db_config.php";
$user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
    header('location:login.php');
    }

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con,$_POST['name']); //form wala name sanga same huna parxa
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $messages=mysqli_real_escape_string($con,$_POST['messages']);
    $num=$_POST['number'];
    if(empty($name && $email && $messages && $num)){
        $_SESSION['note'] = "All Details must be filled";
    }
    else{
         $sql="insert into messages(name,email,sugesstions, number)
         values('$name','$email','$messages', '$num')";
         
            
        if(mysqli_query($con,$sql)){
            $_SESSION['note'] = "Thank You For Your Suggestion!";
           
        }
        else{
            $_SESSION['note'] = "Please Try Again";
            }
    }
}

header('location:contact.php');
?>