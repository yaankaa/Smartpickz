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
    
</head>

<body>
<section class="banner">
        <div class="text">
           <h1>Find Any Products</h1>
        </div>
        <div class="container2">
            <form action="search.php" method= "post" class="search-box">
                <input type="text" name="str" class="search" placeholder="Search for any item">
                <button type="submit" class="search-btn" name="submit">
                    <i class="fas fa-search"></i>
                </button>
                
                
            </form>
        </div>          
</section>
</body>
</html>
