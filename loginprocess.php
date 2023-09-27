<?php


include './db_config.php';
session_start();

if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $pass = mysqli_real_escape_string($con, md5($_POST['password']));
 
    $select_users = mysqli_query($con, "SELECT * FROM `login` WHERE username = '$username' AND password = '$pass'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
 
       $row = mysqli_fetch_assoc($select_users);
 
       if($row['usertype'] == 'admin'){
        
          $_SESSION['admin_name'] = $row['username'];
          $_SESSION['admin_email'] = $row['email'];
          $_SESSION['admin_id'] = $row['log_id'];
          header('location:./admin/admindashboard.php');
 
       }elseif($row['usertype'] == 'people'){
        
          $_SESSION['user_name'] = $row['username'];
          $_SESSION['user_email'] = $row['email'];
          $_SESSION['user_id'] = $row['log_id'];
          header('location:index.php');
 
       }
 
    }else{
        $_SESSION['msg'] = "Invalid username or password";
        header('location:login.php');
    }
 
 }
 
 ?>
