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
    
</head>

<body>
<section class="banner">
        
        <div class="container2">
            <form action="searchspecial.php" method= "post" class="search-box">
                <input type="text" name="str" class="search" placeholder="What are you looking for?">
                <button type="submit" class="search-btn" name="submit">
                    <i class="fas fa-search"></i>
                </button>
                
                
            </form>
        </div>          
</section>
</body>
</html>
