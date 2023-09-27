<?php
    // session_start();
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
    <title>SmartPickz Admin</title>
    
    <!-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> -->
    <link rel="stylesheet" href="./includes/css/nav.css">
</head>
<body>
<input type="checkbox" name="" id="menu-toggle">
    <div class="overlay">
        <label for="menu-toggle"></label>
    </div>
    <div  class="sidebar" >
        <div class="sidebar-container">
            <div class="brand">
                <h2>
                    
                       <a href="admindashboard.php">SmartPickz Dashboard</a> 
                    
                </h2>
            </div>
                <div class="sidebar-avartar">
                    <div>
                        <img src="../img/logoo.PNG" alt="">
                    </div>
                    <div class="avartar-info">
                        <div class="avartar-text">
                            <h4>SmartPickz's Admin</h4>
                            
                        </div>
                       
                    </div>
                </div>
                
            <div  class="sidebar-menu">
                <ul>
                    <li class="nav-item">
                        <a href="category.php">
                           
                            <span>Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="add_shop.php">
                            
                            <span>Add Products to Your Shop</span>
                        </a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a href="sugesstions.php">
                            
                            <span>Suggestion Lists</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class = "btn btn-danger" href="orderlist.php">
                            
                            <span>Users' Orders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class = "btn btn-danger" href="logout.php">
                            
                            <span>Logout</span>
                        </a>
                    </li>
                  
                </ul>
            </div>  
        </div>
    </div>
    <script src="../main.js"></script>
</body>
</html>