<?php
    
    include ('includes/header.php');
    include "db_config.php";
    
    session_start();
  
    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
    header('location:login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="./css/search.css">
</head>
<body>
<div>
<?php
        if(isset($_POST['submit'])){
          $search = mysqli_real_escape_string($con, $_POST['str']);
          $sql = "SELECT * from shop WHERE shop_keyword LIKE '%$search%' OR title LIKE '%$search%' OR description LIKE '%$search%'";
          $result = mysqli_query($con, $sql);
          $queryResult = mysqli_num_rows($result);
          if($queryResult > 0){
            while($row = mysqli_fetch_assoc($result)){

              $title=$row['title'];
              $description=$row['description'];
              $price=$row['price'];
              $available=$row['available'];
              $date=$row['added_date'];
              $id=$row['id'];
              $cat=$row['cat_id'];	
              $pic=$row['image'];
              
              
                echo "
                <div class='product'>
                  <h1><a href='shopdetails.php?product_id=$id'>$title</a></h1>
                  <a href='shopdetails.php?product_id=$id'><img src='./img/$pic' /></a>
                </div>
                <div class='product'>
                <h1><a href='shopdetails.php?product_id=$id'>See Product</a></h1>
                </div>
                ";
            }
          }else{
            echo '<script>alert("There are no results matching your search!")</script>';
            echo "<script>   window.location.href ='index.php'</script>";
          }
        }
?>
</div>

</body>
<?php
   
    include ('includes/footer.php');
    
?>
</html>



