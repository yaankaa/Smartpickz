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
</head>
<body>

<?php
if(isset($_GET['cid'])){
    $cat_id = $_GET['cid'];
}

$sql = "select shop.product_id, shop.title, shop.description, shop.price, shop.available, shop.image
from shop left join categories on shop.cat_id = categories.cat_id 
where shop.cat_id = $cat_id
order by shop.product_id desc";


$sqlRun = mysqli_query($con,$sql);
if(mysqli_num_rows($sqlRun) > 0){
    while($row = mysqli_fetch_assoc($sqlRun)){
        ?>
        <div class="shop__display">
                <div class="shop__info">
                    <div class="image">
                        <img src="img/<?php echo $row['image']?>"style="height: 200px; width:295px;" alt="" />
                    </div>
                    <div class="name">
                        <h2 class=""><?php echo $row['title'] ?></h2>
                    </div>
                    <div class="shop">
                        <a href="shopdetails.php?product_id=<?php echo $row['product_id'];?>">See Product</a>
                    </div>
                    
                    
                </div>
        </div>
    <?php    }
}
// else{
//     echo '<script>alert("There are no results!")</script>';
//     echo "<script>   window.location.href ='shop.php'</script>";
// }


?>
</body>
</html>






<?php
       include ('includes/footer.php');
?> 