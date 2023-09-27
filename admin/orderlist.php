<?php
    session_start();
    include '../db_config.php';
    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_POST['update_order'])){


    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($con, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
    $message[] = 'Payment Status has been updated!';
 
 }
 
 if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
    header('location:orderlist.php');
 }
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | SmartPickz</title>
    <link rel="stylesheet" href="./includes/css/admindash.css">
   
</head>
<body>
   <?php
        include 'includes/nav.php';
   ?>
    <div class="main-content">
        
            <div>
                <div>
                    <h1>User's Order List</h1>
                    <p>Your Orders So Far</p>
                </div>
                <table>
                    <tr>
                        <th>SN</th>
                        
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Total Amount</th>
                        <th>Payment Method</th>
                        <th>Ordered Product</th>
                        <th>Option</th>
                    </tr>
                    
                    <?php
                        

                        
                        $select_orders = mysqli_query($con, "SELECT * FROM `orders`") or die('query failed');
                        $i=1;
                        if(mysqli_num_rows($select_orders) > 0){
                        while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                        ?>
                        
                    <tr>
                    <td>
                       <?php
                           echo $i++;
                       ?>
                    </td>
                        
                        <td><?= $fetch_orders['name'];?></td>
                        <td><?= $fetch_orders['number'];?></td>
                        <td><?= $fetch_orders['email'];?></td>
                        <td><?= $fetch_orders['address'];?></td>
                        <td><?= $fetch_orders['total_price'];?></td>
                        <td><?= $fetch_orders['method'];?></td>
                        <td><?= $fetch_orders['total_products'];?></td>
                        
                        
                        <td>
                        <form action="" method="post">
                            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                            <select name="update_payment">
                            <option value="<?php echo $fetch_orders['payment_status']; ?>" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                            <option value="pending">Pending</option>
                            <option value="pending">In Process</option>
                            <option value="completed">Completed</option>
                            </select>
                            <input type="submit" value="update" name="update_order" class="option-btn">
                            <a href="orderlist.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
                    </form>
                        </td>
                    </tr>
                    <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
                    
                
                </table>
            </div>
           
         
        
    </div>
    

</body>
</html>