<?php
  
    include ('includes/header.php');
   
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
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/banner.css">
        
    </head>
    <body>
        <!--Banner-->
        <?php
            include ('includes/banner.php');
        ?>
        
        <!--main body hero sec-->
        <section class="id">
            <div class="container">
                <div class="hero__wrapper">
                    <div class="hero__left" >
                        <div class="hero__left__wrapper">
                            <h1 class="hero__heading">SmartPickz: Your Ultimate Ecommerce Oasis!</h1>
                            <p class="hero__info">
                                
                            SmartPickz is an innovative ecommerce platform that caters to a 
                            wide range of consumer needs, offering a vast selection of products 
                            including electronics, clothes, and shoes. 
                            As an all-in-one destination for shoppers, SmartPickz provides a seamless 
                            and user-friendly experience, allowing customers to browse through an 
                            extensive catalogue of high-quality items from renowned brands. 
                            Whether you're in search of cutting-edge gadgets, stylish apparel, or trendy 
                            footwear, SmartPickz ensures that every customer finds exactly what they're 
                            looking for. 
                            
                            <p>With a commitment to excellence, competitive prices, and 
                            reliable customer service, SmartPickz has become a trusted choice for 
                            online shoppers seeking convenience and satisfaction in their retail 
                            experiences.</p>
        
                            </p>
                            <div class="button__wrapper">
                                <a href="shop.php" class="btn btn primary-btn">Explore More</a>
                            </div>
                        </div>
                    </div>
                    <div class="hero__right" >
                        <div class="hero__imgWrapper">
                            <a href="shop.php"><img src="./img/slider1.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- <div class="display__wrapper" >
        <p>Featured Products</p>
                <?php
                    foreach($newprod as $new){
                ?>
                <table  class="display">
                    
                        <tr>
                            <td><img src="img/<?= $new['img']; ?>.png" alt="<?php echo $display['name']; ?>"></td>
                        </tr>
                        <tr> <td><a href="shop.php"><h2>
                            <?php echo $new['name']; ?></h2></a>
                            
                        </td></tr>
                        
                </table> 
                
                <?php
                    }
                ?> 
                
            </div>
                
        </div> -->

        
        <section class="products">
    <h1 class="title">Suggested Products</h1>

<div class="box-container">
      <?php
      $sql = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'final_array_view'";

      $result = mysqli_query($con, $sql);
      $columnNames = array();

      if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
            $columnNames[] = $row['COLUMN_NAME'];
         }
      }

      $userId = $user_id; // Replace with the user's ID to check
      $matchingColumns = array();

      foreach ($columnNames as $columnName) {
         if ($columnName == $userId) {
            $matchingColumns[] = $columnName;
         }
      }
      if (!empty($matchingColumns)) {
         $sql = "SELECT `$matchingColumns[0]` FROM final_array_view";
         //var_dump($matchingColumns[0]);
         $result = mysqli_query($con, $sql);
         $userfinal = array();
         //var_dump($userfinal);
         while ($row = mysqli_fetch_assoc($result)) {
            $userfinal[] = $row[$matchingColumns[0]];
         }
         arsort($userfinal);
         //var_dump($userfinal);
        //  $sql="select * from shop, categories where categories.cat_id=shop.cat_id ";
        //  $select_products = mysqli_query($con,$sql) or die('query failed');
         $select_products = mysqli_query($con, "SELECT * FROM `shop`") or die('query failed');
         $fetch_rating = array();
         if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
               $select_query = "SELECT ROUND(AVG(rating), 0) AS rating FROM user_ratings WHERE item_id = '" . $fetch_products['product_id'] . "'";
               $result = mysqli_query($con, $select_query);
               $fetch_rating[] = mysqli_fetch_assoc($result);
            }
            $count = 0;
            
    
            foreach ($userfinal as $productID => $rating) {
               // Retrieve the product details based on the product ID
               $valuespd = $productID+1;
               $select_product_query = "SELECT * FROM `shop` WHERE product_id = '$valuespd'";

               $product_result = mysqli_query($con, $select_product_query);
               $product = mysqli_fetch_assoc($product_result);
               $averageRating = $fetch_rating[$productID]['rating'];
               
               if ($count > 2) {
                  break;
               }
               $count++;
               
               ?>
               <form action="" method="post" class="box">
    <?php if (isset($product['image'])) : ?>
        <img class="image" src="img/<?php echo $product['image']; ?>" style="height: 150px; width: 155px;" alt="">
    <?php endif; ?>
    <div class="name">
        <?php echo isset($product['title']) ? $product['title'] : ''; ?>
    </div>
    <div class="price">RS
        <?php echo isset($product['price']) ? $product['price'] : ''; ?>/-
    </div>
               <input class="star star-5" id="star-5-<?php echo $product['product_id']; ?>" type="radio" name="star" value="5" <?php if ($averageRating == 5) {
                                                                                                                           echo 'checked';
                                                                                                                        } ?> disabled />
               <label class="star star-5" for="star-5-<?php echo $product['product_id']; ?>"></label>

               <input class="star star-4" id="star-4-<?php echo $product['product_id']; ?>" type="radio" name="star" value="4" <?php if ($averageRating == 4) {
                                                                                                                           echo 'checked';
                                                                                                                        } ?> disabled />
               <label class="star star-4" for="star-4-<?php echo $product['product_id']; ?>"></label>

               <input class="star star-3" id="star-3-<?php echo $product['product_id']; ?>" type="radio" name="star" value="3" <?php if ($averageRating == 3) {
                                                                                                                           echo 'checked';
                                                                                                                        } ?> disabled />
               <label class="star star-3" for="star-3-<?php echo $product['product_id']; ?>"></label>

               <input class="star star-2" id="star-2-<?php echo $product['product_id']; ?>" type="radio" name="star" value="2" <?php if ($averageRating == 2) {
                                                                                                                           echo 'checked';
                                                                                                                        } ?> disabled />
               <label class="star star-2" for="star-2-<?php echo $product['product_id']; ?>"></label>

               <input class="star star-1" id="star-1-<?php echo $product['product_id']; ?>" type="radio" name="star" value="1" <?php if ($averageRating == 1) {
                                                                                                                           echo 'checked';
                                                                                                                        } ?> disabled />
               <label class="star star-1" for="star-1-<?php echo $product['product_id']; ?>"></label>
                  
               
            </form>
      <?php
            }
         }
     } else {
         // User's ID does not match any column names in the final_array_view table
         echo "No Suggestions for you at the moment!";
     }
     

      ?>
      <div class="load-more" style="margin-top: 2rem; text-align:center">
         <a href="shop.php" class="option-btn">Go to Shop</a>
      </div>
   </div>
   </section>
   <div>
            <div class="display__wrapper" >
                <?php
                    foreach($categories as $category){
                ?>
                <table  class="display">
                        <tr>
                            <td><img src="img/<?= $category['img']; ?>.png" alt="<?php echo $display['name']; ?>"></td>
                        </tr>
                        <tr> <td><a href="shop.php"><h2>
                            <?php echo $category['name']; ?></h2></a>
                            
                        </td></tr>
                        
                </table> 
                
                <?php
                    }
                ?> 
                
            </div>
            <div class="moreshop">
                <a href="shop.php" class="btn btn primary-btn">Categories</a>
            </div>
            
        </div>
        
    <?php
        include ('includes/footer.php');
        ?> 
    
    </body>

    </html>

    
    