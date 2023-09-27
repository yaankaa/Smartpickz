<?php
   
    include 'db_config.php';
    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
    header('location:login.php');
    }
?>
<?php
    
    $categories = [
        [
            "name" => "MEN'S APPAREL",
            
            "img" => "menshirt"
        ],
        [
            "name" => "WOMEN'S APPAREL",
            
            "img" => "dress"
        ],
        [
            "name" => "ELECTRONIC APPLIANCES",
            
            "img" => "earbuds"
        ],
        [
            "name" => "BEAUTY",
            
            "img" => "beauty"
        ],
    ];
    $newprod = [
        [
            "name" => "Tshirt",
            
            "img" => "menshirt"
        ],
        [
            "name" => "One Piece",
            
            "img" => "dress"
        ],
        [
            "name" => "Airpods",
            
            "img" => "earbuds"
        ],
        [
            "name" => "Lipstick",
            
            "img" => "velvet slim stick lipstick"
        ],
    ];
    ?>