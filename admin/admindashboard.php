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
    <link rel="stylesheet" href="./includes/css/admindash.css">
   
</head>
<body>
   <?php
        include 'includes/nav.php';
   ?>
    <div class="main-content">
        
            <div>
                <div>
                    <h1>Welcome To Dashboard</h1>
                    <p>Your Products So Far</p>
                </div>
                <table>
                    <tr>
                        <th>SN</th>
                        <th>Product Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Added Date</th>
                        <th>Option</th>
                    </tr>
                    
                    <?php
                        $sql="select * from shop, categories where categories.cat_id=shop.cat_id order by product_id ";
                        $sqlRun = mysqli_query($con,$sql);
                        $i=1;
                        while($shop = mysqli_fetch_assoc($sqlRun)){
                                    
                    ?>
                    <tr>
                    <td>
                       <?php
                           echo $i++;
                       ?>
                    </td>
                        <td><?= $shop['product_id'];?></td>
                        <td><?= $shop['title'];?></td>
                        <td><?= $shop['name'];?></td>
                        <td><img src="../img/<?= $shop['image'];?> " style="height: 150px; width:200px;"></td>
                        <td><?= $shop['added_date'];?></td>
                        <td>
                            <a href="edit_shop.php?edit_id=<?= $shop['product_id']?>">Edit</a>  | 
                            <a onclick="return confirm('Are you sure?')"href="shop_process.php?delete_id=<?= $shop['product_id']?>">Delete</a> 
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
           
         
        
    </div>
    

</body>
</html>