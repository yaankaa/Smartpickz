<?php  
include ('includes/header.php');
require_once "db_config.php" ;
//session_start();

    
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
header('location:login.php'); 
}
if (isset($_POST['add_to_cart'])) {
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $item_id = $_GET['product_id'];

   

   $check_cart_numbers = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if (mysqli_num_rows($check_cart_numbers) > 0) {
       $message[] = 'Already Added To Cart!';
   } else {
       $insert_query = "INSERT INTO `cart`(item_id, user_id, name, price, quantity, image) VALUES('$item_id', '$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')";
       if (mysqli_query($con, $insert_query)) {
           $message[] = 'Product Added To Cart!';
       } else {
           die('Query failed: ' . mysqli_error($con));
       }
   }
}
?>


   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link rel="stylesheet" href="./css/shop_details.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
       <script src="js/html2pdf.bundle.min.js"></script>
       <style>
      
        
       </style>
   </head>
   <body>
   <div class="scontainer">
            <?php
            
            $query = "Select * from shop where product_id=".$_GET['product_id'];
            $select_products = mysqli_query($con, $query) or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
               $select_query = "SELECT ROUND(AVG(rating),0) AS rating FROM user_ratings WHERE item_id = '" . $fetch_products['product_id'] . "'";
                    $result = mysqli_query($con, $select_query);
                    $fetch_rating = mysqli_fetch_assoc($result);
               ?>
            <div class="whole">

            <form action="" method="post" class="box">
                <table class="shop__details" id="shop__details">
                    <tr class="contain">
                        <td><img src="img/<?= $fetch_products['image']?>" style="height: 240px; width:350px;"alt="<?php echo $fetch_products['title'];?>"></td>
                    </tr>
                    
                    <tr class="contain">
                        <td><strong>Name: </strong><?php echo $fetch_products['title'];?>
                    
                    </td>
                    </tr>
                    <tr class="contain">
                        <td><strong>Description </strong> <br>
                        <?= $fetch_products['description'];?>
                    </td>
                    </tr>
                    <tr class="contain">
                        <td><strong>Price </strong> <br>
                        <?= $fetch_products['price'];?></td>
                    </tr>
                    
                    
                    <!-- <tr class="contain">
                        <td><strong>Available </strong> <br>
                        <?= $fetch_products['available'];?></td>
                    </tr> -->
                    
                    
                    
                <tr>
                <td>Quantity: <input type="number" min="1" name="product_quantity" value="1" class="qty"></td>
                </tr>
                <tr>
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['product_id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_products['title']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                    <td><input type="submit" value="add to cart" name="add_to_cart" class="cartbtn"></td>
                </tr>
                <tr class="contain">
                        <td> <a href="shop.php">Back</a> </td>
                        
                    </tr>
                    
                </table>
            </form>
            <?php
            }
        }else {
            echo '<p class="empty">No Products Added Yet!</p>';
         }
         ?>


            </div>
                    
           
            
            
           
                
           
        </div>         
    </div>      
    <script src="js/script.js"></script>

   </body>
  
   <?php
       include ('includes/footer.php');
    ?> 
   
   </html>
    
   