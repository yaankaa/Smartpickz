<?php
    session_start();
    include '../db_config.php';
    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category | SmartPickz</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/admindash.css">
    <style>
        form input[type="submit"]{
    width: 80px;
    background-color: rgb(236, 254, 117);
    color: black;
    cursor: pointer;
    border: none;
    border-radius: 10px;
    padding: 10px;
    font-size: 15px;
    margin-top: 5px;
}
form input[type="text"]{
    width: 300px;
    color: black;
    cursor: pointer;
    border: none;
    border-radius: 10px;
    padding: 10px;
    font-size: 15px;
}
    </style>
   
</head>
<body>
   <?php
        include 'includes/nav.php';
   ?>
    <div class="main-content">
        <div>
                    <h1>Category Management/ Edit</h1>
                    <p>Edit Your Categories</p>
        </div>
        <div class="row">
            <div style="color: red;">
                <?php
                    if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    }
                ?>
            </div>
            <?php
                
                $sql="Select * from categories where cat_id=".$_GET['edit_id'];
                $sqlRun = mysqli_query($con,$sql);
                $data = mysqli_fetch_assoc($sqlRun);
            ?>
                <form action="category_process.php" method="post">
                    <input autocomplete="off" value="<?= $data['name'];?>" placeholder="category name" type="text" name="name"  >
                    <p id="nameErr"></p>
                    <input type="submit" value="Edit" >
                    <p id="submitErr"></p>
                    <input type="hidden" name="cat_id" value="<?= $data['cat_id'] ?>">
                    <input type="hidden" name="action" value="edit">
                </form>
                    
        </div>
    </div>
    
   
</body>
</html>