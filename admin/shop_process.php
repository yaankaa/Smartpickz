<?php

session_start();
include '../db_config.php';
$admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
    header('location:login.php');
}

$msg=nl2br($_POST['description']);


if(isset($_POST['action']) and $_POST['action'] == "Add"){
    $name = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con,$msg);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    
    $sKey = mysqli_real_escape_string($con,$_POST['sKey']);
    $cat_id = (int)$_POST['cat_id'];
    $image =$_FILES['image']['name'];
    // $video =$_FILES['video']['name'];
    

    if(empty($name && $description && $price && $cat_id && $image && $sKey )){
        $_SESSION['msg'] = "All Information must be filled";
    }
    else{
        $sql= "insert into shop(title,description,price,cat_id,image,shop_keyword,added_date )
        values('$name','$description','$price', '$cat_id','$image','$sKey',now())";
           
       if(mysqli_query($con,$sql)){
           move_uploaded_file($_FILES['image']['tmp_name'],'../img/'.$image);
        //    move_uploaded_file($_FILES['video']['tmp_name'],'./cook_videos/'.$video);
           $_SESSION['msg'] = "Product Added";
       }
       
       else{
           $_SESSION['msg'] = "Product can not be added";
           }
   }
}


else if(isset($_POST['action']) and $_POST['action'] == "edit"){
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $id= (int)$_POST['product_id'];
    $price = mysqli_real_escape_string($con,$_POST['price']);
 
    $keyword =mysqli_real_escape_string($con,$_POST['shop_keyword']);
    $cat = (int)$_POST['cat_id'];

    $photo=$_FILES['image']['name'];
    $photo_tmp=$_FILES['image']['tmp_name'];

    // $vid=$_FILES['video']['name'];
    // $vid_tmp=$_FILES['video']['tmp_name'];

    move_uploaded_file($photo_tmp, "img/$photo");   
    // move_uploaded_file($vid_tmp, "/cook_videos/$vid"); 
    $sql= "update shop set title ='$title', 
    description='$description',  price= '$price', shop_keyword= '$keyword', cat_id='$cat', image='$photo' where id=$id";
    mysqli_query($con,$sql);
        $_SESSION['msg'] =$_SESSION['msg'] = "Updated";
    
}
else if(isset($_GET['delete_id'])){
    $id=(int)$_GET['delete_id'];
    $sql="delete from shop where product_id = $id";
    mysqli_query($con,$sql);
    $_SESSION['msg'] = "Product Deleted";
}
header('location:add_shop.php');