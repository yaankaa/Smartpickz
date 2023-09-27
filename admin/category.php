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
    <title>Admin | SmartPickz</title>
    
    <link rel="stylesheet" href="./includes/css/category.css">
   
    <style>
            #nameErr, #submitErr{
                color: red;
            }
        </style>
</head>
<body>
   <?php
        include 'includes/nav.php';
   ?>
    <div class="main-content">
        <div>
            <h1>Category Management</h1>
            <p>Manage Your Categories</p>
        </div>
        <div class="row">
        <div style="color:red";>
            <?php
                if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
            ?>
            </div>
            <form action="category_process.php" method="post" >
                <input autocomplete="off" placeholder="category name" type="text" name="name" id="name" onkeyup="ValidateName();">
                <p id="nameErr"></p>
                <input type="submit" value="Add" onclick="return ValidateCat()">
                <p id="submitErr"></p>
                <input type="hidden" name="action" value="Add">
            </form>
            <table class="table">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Option</th>
                </tr>
                <?php
                    $sql="select * from categories order by cat_id";
                    $sqlRun = mysqli_query($con,$sql);
                    $i=1;
                    while($category = mysqli_fetch_assoc($sqlRun)){  
                ?>
                
                <tr>   
                    <td>
                       <?php
                           echo $i++;
                       ?>
                    </td>
                    <td><?= $category['name'];?></td>
                    <td>
                    <a href="edit_category.php?edit_id=<?= $category['cat_id'];?>">Edit</a>  | 
                    <a onclick="return confirm('Are you sure?')"href="category_process.php?delete_id=<?= $category['cat_id'];?>">Delete</a> </td>
                </tr>
                <?php } ?>
            </table>
        </div>   
    </div>
    

</body>
</html>