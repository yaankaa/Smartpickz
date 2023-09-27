<?php
    
    include 'db_config.php';
    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
    header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
</head>
<body>
    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                <h4><a href="index.php">SmartPickz</a>  </h4>
                    <ul>
                        <li><a href="about.php">About us</a></li>
                        <li><a href="contact.php">Contact us</a></li>
                        <ul>
                     </div>
                     
                     <div class="footer-col">
                    <h4>Our Services</h4>
                    <ul>
                       
                        <li><a href="shop.php">Shop</a></li>
                        
                        <li><a href="cart.php">Cart</a></li>
                        
                        <ul>
                     </div>
                     <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a> 
                        <a href="#"><i class="fab fa-twitter"></i></a> 
                        <a href="#"><i class="fab fa-instagram"></i></a> 
                        <a href="#"><i class="fab fa-youtube"></i></a> 
        
                     </div>
            </div>
            </div>

</body>
</html>






