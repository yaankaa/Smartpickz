<?php

include ('includes/header.php');
require_once "db_config.php" ;

//session_start();

$user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
    header('location:login.php');
    }

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($con, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $method = mysqli_real_escape_string($con, $_POST['method']);
   $address = mysqli_real_escape_string($con, $_POST['address']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($con, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         // mysqli_query($conn, "INSERT INTO `item_ids`(item_ids, order_id) VALUES()") or die('query failed');
         mysqli_query($con, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $order_id = mysqli_insert_id($con);
         
         $item_ids = array();
         $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $item_ids[] = $fetch_cart['item_id'];
         }
         foreach ($item_ids as $item_id) {
            mysqli_query($con, "INSERT INTO `item_ids`(order_id, item_ids) VALUES('$order_id', '$item_id')") or die('query failed');
         }
         $message[] = 'order placed successfully!';
         mysqli_query($con, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

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
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/checkout.css">

</head>
<body>
   


<!-- <div class="heading">
   <h3>checkout</h3>
   <p> <a href="home.php">home</a> / checkout </p>
</div> -->

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo 'Rs'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> Grand Total : <span>RS<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>Place Your Order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your Name :</span>
            <input type="text" name="name" required placeholder="Enter Your Name">
         </div>
         <div class="inputBox">
            <span>Your Number :</span>
            <input type="number" name="number" required placeholder="Enter Your Number">
         </div>
         <div class="inputBox">
            <span>Your Email :</span>
            <input type="email" name="email" required placeholder="Enter Your Email">
         </div>
         <div class="inputBox">
            <span>Payment Method :</span>
            <select name="method">
               <option value="cash on delivery">Cash on Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">Debit Card</option>
               <option value="khalti">Khalti</option>
            </select>
         </div>
         
         <div class="inputBox">
            <span>Address:</span>
            <input type="text" name="address" required placeholder="e.g. Balaju">
         </div>
         
      </div>
      <input type="submit" value="Order Now" class="btn" name="order_btn">
   </form>

</section>


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
<?php
       include ('includes/footer.php');
    ?> 