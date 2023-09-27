<?php
    session_start();
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
    <title>SmartPickz</title>
    <link rel="stylesheet" href="./css/globalstyle.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    
    
</head>
<body>
    <!--Navbar-->
    <div class="nav">
        <div class="container">
            <div class="nav__wrapper">
                <a href="./index.php" class="logo"> 
                    <img src="./img/logoo.png"  alt="SmartPickz" >
                        <!--<span> Online Bhancha</span>-->
                </a>
                <nav>
                    <div class="nav__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                            <line x1="3" y1="12" x2="21" y2="12" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <line x1="3" y1="18" x2="21" y2="18" />
                        </svg>
                        
                    </div>
                    <div class="nav__overlay">

                    </div>
                    <ul class="nav__list ">
                        <div class="nav__close">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                >
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                            
                        </div>
                        <div class="navListWrapper">
                            <li><a href="./index.php"  class="nav__link">HOME</a></li>
                            <li><a href="./about.php"  class="nav__link">ABOUT</a></li>
                            <!-- <li><a href="./signup.php"  class="nav__link">SIGN UP</a></li>
                            <li><a href="./login.php"  class="nav__link">LOG IN</a></li> -->
                            <li><a href="./shop.php"  class="nav__link">SHOP</a></li>
                            <li><a href="./rate.php"  class="nav__link">RATE</a></li>
                            <li><a href="./cart.php"  class="nav__link">CART</a></li>
                            <li><a href="./orders.php"  class="nav__link">ORDERS</a></li>
                            <li><a href="./logout.php"  class="nav__link">LOGOUT</a></li>
                            
                            <li><p class="welcome-message">Welcome <?php echo $_SESSION['user_name']; ?></p></li>
                            
                            <li><a href="./contact.php"  class="btn primary-btn">CONTACT US</a></li> 
                         
                        </div>
                    </ul>
                </nav>
            </div>
            
        </div>
    </div>
   <!--aos script-->
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!--custom script-->
    <script src="./main.js"></script>
    <?php
        
        include ('includes/array.php');
    ?> 
</body>
</html>