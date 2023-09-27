<?php  
include ('includes/header.php');
require_once "db_config.php" ;

    //session_start();
    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
    header('location:login.php');
    }
    
   
    
    if(isset($_POST['update_cart'])){
      $cart_id = $_POST['cart_id'];
      $cart_quantity = $_POST['cart_quantity'];
      mysqli_query($con, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE cart_id = '$cart_id'") or die('query failed');
      $message[] = 'cart quantity updated!';
   }
   
   if(isset($_GET['delete'])){
      $delete_id = $_GET['delete'];
      mysqli_query($con, "DELETE FROM `cart` WHERE cart_id = '$delete_id'") or die('query failed');
      header('location:cart.php');
   }
   
   if(isset($_GET['delete_all'])){
      mysqli_query($con, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      header('location:cart.php');
   }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


<link rel="stylesheet" href="./css/cart.css">
<section class="shopping-cart">

   <h1 class="title">Your Products Added</h1>

   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
         <a href="cart.php?delete=<?php echo $fetch_cart['cart_id']; ?>" class="fa-solid fa-trash" onclick="return confirm('Delete this from cart?');"></a>
         <img src="img/<?php echo $fetch_cart['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         <div class="price">RS<?php echo $fetch_cart['price']; ?>/-</div>
         <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['cart_id']; ?>">
            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            <input type="submit" name="update_cart" value="update" class="option-btn">
         </form>
         <div class="sub-total"> Sub Total : <span>RS<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span> </div>
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">Your Cart is empty</p>';
      }
      ?>
   </div>

   <div style="margin-top: 2rem">
      <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Delete all products from cart?');">Delete All</a>
   </div>

   <div class="cart-total">
      <p>Grand Total : <span>RS
         <?php echo $grand_total; ?>/-</span></p>
      <div class="flex">
         <a href="shop.php" class="option-btn">Continue Shopping</a>
         <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
      </div>
   </div>

</section>
<script src="js/script.js"></script>

</body>
</html>
<?php
       include ('includes/footer.php');
    ?> 