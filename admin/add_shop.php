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

    
    
   <style>
      
      .btn input{
        width: 100px; 
        height: 40px;
        background-color: lightgreen;
      }
       
            #snameErr,#sdescErr, #spriceErr, #savailErr, #simgErr, #skeyErr, #rsubmitErr{
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
            <h1>Shop Management</h1>
            <p>Add Your Products</p>
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
            
            <form action="shop_process.php" method="post" name="shop"
                enctype="multipart/form-data">
                <table>
                    <tr class="sname">
                        <td>Name:</td>
                        <tr>
                            <td><input type="text" name="title" id="sname"  style= "width: 100%; height: 50px;" onkeyup="Sname();" ></td>
                            <td><span id="snameErr"></span></td>
                        </tr>
                        
                    </tr>
                    <tr  class="sDescription">
                        <td>Description:</td>
                        <tr>
                            <td><textarea name="description" cols=100 rows=10  id="sdescription" onkeyup="Sdescription();"></textarea></td>
                            <td><span id="sdescErr"></span></td>
                        </tr>
                        
                    </tr>
                    <tr  class="sPrice">
                        <td>Price</td>
                        <tr>
                            <td><input type="text" name="price" cols="10" rows="2"  id="sprice" onkeyup="Sprice();"></td>
                            <td><span id="spriceErr"></span></td>
                        </tr>
                        
                   
                        <td>Image:</td>
                        <tr>
                            <td><input type="file" name="image" id="simage" onchange="Simg();"></td>
                            <td><span id="simgErr"></span></td>
                        </tr>
                        
                    </tr>
                    <!-- <tr>
                        <td>Video:</td>
                        <tr>
                        <td><input type="file" name="video" id="file" onclick="Rvid();"> </td>
                        <td><span id="vidErr"></span></td>
                        </tr>
                        
                    </tr> -->
                    <tr>
                        <td>Category:</td>
                        <tr>
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
                        
                        
                    </tr>
                        
                        
                    <tr class="skey">
                        <td>Keyword:</td>
                        <tr>
                            <td><textarea name="sKey"  id="skey"cols="100" rows="10" onkeyup="Skey();"></textarea></td>
                            <td><span id="skeyErr"></span></td>
                        </tr>
                        
                    </tr>
                    <tr class="btn">
                        <td><input type="submit" name="submit" value="Add" class="" onclick="return ValidateRecipe()" ></td>
                        <td><span id="rsubmitErr"></span></td>
                        <input type="hidden" name="action" value="Add">
                    </tr>
                   
                    
                </table>
            </form>
        </div>
    </div>
    

</body>
</html>