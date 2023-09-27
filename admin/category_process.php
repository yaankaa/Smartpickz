<?php
    session_start();
    include '../db_config.php';
    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
    header('location:login.php');
}


if(isset($_POST['action']) and $_POST['action'] == "Add"){
    $name = mysqli_real_escape_string($con,$_POST['name']);

    if(empty($name)){
        $_SESSION['msg'] = "Category Name Required";
    }
    else{
         $sql = "insert into categories (name) values ('$name')";
            
        if(mysqli_query($con,$sql)){
            $_SESSION['msg'] = "Category Added";
        }
        else{
            $_SESSION['msg'] = "Category can not be added";
            }
    }
}
else if(isset($_POST['action']) and $_POST['action'] == "edit"){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $id= (int)$_POST['cat_id'];
    $sql= "update categories set name ='$name' where cat_id=$id";
    mysqli_query($con,$sql);
    $_SESSION['msg'] = "Category Updated";
}
else if(isset($_GET['delete_id'])){
    $id=(int)$_GET['delete_id'];
    $sql="delete from categories where cat_id = $id";
    mysqli_query($con,$sql);
    $_SESSION['msg'] = "Category Deleted";
}
header('location:category.php');