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
    <title>Edit | SmartPickz</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./includes/css/redit.css">

   
</head>
<body>
   <?php
        include 'includes/nav.php';
   ?>
    <div class="main-content">
        <div>
                    <h1>Shop Management/ Edit</h1>
                    <p>Edit Your Products</p>
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
                $sql="Select * from shop where product_id=".$_GET['edit_id'];
                $sqlRun = mysqli_query($con,$sql);
                $data = mysqli_fetch_assoc($sqlRun);
            ?>
                <form action="shop_process.php" method="post"  
                enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="">Name</label></td>
                            <td ><input type="text"  autocomplete="off" placeholder=""  name="title" style= "width: 100%; height: 50px;" value="<?= $data['title'];?>"   ></td>
                            
                        </tr>
                        <tr>
                            <td><label for="">Description</label></td>
                            <td><textarea autocomplete="off"  placeholder="" type="text" name="description" id="" rows=12 ><?= $data['description'];?></textarea> </td>
                        </tr>
                        <tr>
                            <td><label for="">Price</label></td>
                            <td ><input type="text"  autocomplete="off" placeholder=""  name="price" style= "width: 100%; height: 50px;" value="<?= $data['price'];?>"   ></td>
                        </tr>
                        
                        
                        <tr>
                            <td><label for="">Image</label></td>
                            <td ><input autocomplete="off"  placeholder="" type="file" name="image" id="" value="<?= $data['image'];?>"> </td>
                            
                        
                        </tr>
                        <!-- <tr>
                            <td><label for="">Video</label></td>
                            <td><input  autocomplete="off" placeholder="" type="file" name="video" id="" value="<?= $data['video'];?> "></td>
                        </tr> -->
                        <tr>
                        <td>Category:</td>
                        
                            <td>
                                <select name="cat_id" id="">
                                    <?php
                                        $sql="select * from categories order by cat_id desc";
                                        $sqlRun = mysqli_query($con,$sql);
                                        while($category = mysqli_fetch_assoc($sqlRun)){  
                                    ?>
                                    <option value="<?= $category['cat_id'] ?>"><?= $category
                                    ['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </td> 
                    </tr>
                        <tr>
                            <td><label for="">Keyword</label></td>
                            <td><textarea autocomplete="off"  placeholder="" type="text" name="shop_keyword" id="" rows=12 ><?= $data['shop_keyword'];?> </textarea></td>
                        </tr>
                        
                        <tr>
                            <td><input type="submit" value="Edit"></td>
                            <td><input type="hidden" name="id" value="<?= $data['id'] ?>"></td>
                            <td><input type="hidden" name="action" value="edit"></td>
                        </tr>
                    </table>
                        
                
                    
                </form>
                    
        </div>
    </div>
    

</body>
</html>