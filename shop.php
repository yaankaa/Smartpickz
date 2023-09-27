<?php
include ('includes/header.php');
include "db_config.php";
   
   
    
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
    <link rel="stylesheet" href="./css/shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    
    <div class="side">
        <h2>Categories</h2>
        
        <?php
            if(isset($_GET['cid'])){
                $cat_id = $_GET['cid'];
            }
            
            $sql="select * from categories order by cat_id desc";
            $sqlRun = mysqli_query($con,$sql);
            if(mysqli_num_rows($sqlRun) > 0){
                $active = "";
        ?>
        <div class="cat_name">
            <ul>
                <?php while($category = mysqli_fetch_assoc($sqlRun)){ 
                    if(isset($_GET['cid'])){
                        if($category['cat_id' == $cat_id]){
                            $active = "active";
                        }else{
                            $active = "";
                        }
                    }

                echo "<li><a class='{$active}' href='category.php?cid={$category['cat_id']}'>{$category['name']}</a></li>";
                } ?>
            </ul>  
        </div>
        
        <?php } ?>
    </div>

    <?php

    $sql="select * from shop, categories where categories.cat_id=shop.cat_id order by product_id desc";
    $select_products = mysqli_query($con,$sql) or die('query failed');

   
         
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                            
                                $select_query = "SELECT ROUND(AVG(rating),0) AS rating FROM user_ratings WHERE item_id = '" . $fetch_products['product_id'] . "'";
                                $result = mysqli_query($con, $select_query);
                                $fetch_rating = mysqli_fetch_assoc($result);
               ?>
               <form action="" method="post" class="box">
                  <img class="image" src="img/<?php echo $fetch_products['image']; ?>" style="height: 150px; width:155px;" alt="">
                  <div class="name">
                     <?php echo $fetch_products['title']; ?>
                  </div>
                  
                  <input class="star star-5" id="star-5-<?php echo $fetch_products['product_id']; ?>" type="radio" name="star"
                     value="5" <?php if ($fetch_rating && $fetch_rating['rating'] == 5) {
                        echo 'checked';
                     } ?> disabled/>
                  <label class="star star-5" for="star-5-<?php echo $fetch_products['product_id']; ?>"></label>

                  <input class="star star-4" id="star-4-<?php echo $fetch_products['product_id']; ?>" type="radio" name="star"
                     value="4" <?php if ($fetch_rating && $fetch_rating['rating'] == 4) {
                        echo 'checked';
                     } ?> disabled />
                  <label class="star star-4" for="star-4-<?php echo $fetch_products['product_id']; ?>"></label>

                  <input class="star star-3" id="star-3-<?php echo $fetch_products['product_id']; ?>" type="radio" name="star"
                     value="3" <?php if ($fetch_rating && $fetch_rating['rating'] == 3) {
                        echo 'checked';
                     } ?> disabled />
                  <label class="star star-3" for="star-3-<?php echo $fetch_products['product_id']; ?>"></label>

                  <input class="star star-2" id="star-2-<?php echo $fetch_products['product_id']; ?>" type="radio" name="star"
                     value="2" <?php if ($fetch_rating && $fetch_rating['rating'] == 2) {
                        echo 'checked';
                     } ?> disabled />
                  <label class="star star-2" for="star-2-<?php echo $fetch_products['product_id']; ?>"></label>

                  <input class="star star-1" id="star-1-<?php echo $fetch_products['product_id']; ?>" type="radio" name="star"
                     value="1" <?php if ($fetch_rating && $fetch_rating['rating'] == 1) {
                        echo 'checked';
                     } ?> disabled />
                  <label class="star star-1" for="star-1-<?php echo $fetch_products['product_id']; ?>"></label>
                  <a href="shopdetails.php?product_id=<?= $fetch_products['product_id'];?>">See Product</a>
                
                 
    
                
                  
               </form>
               
                    
              
               
               <?php
            }
         } 
        else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>
         
        
      </div>
</body>

</html>
    <?php
        include ('includes/footer.php');
    ?> 