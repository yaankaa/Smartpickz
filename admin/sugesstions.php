<?php
    session_start();
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
    <title>Admin | Online Bhancha</title>
    <style>
        
    .table{
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
        
    }
    .table td, table th{
        border-bottom: 1px solid black;
        padding: 8px;
    }
    .table tr:hover {background-color: #b8debd;}
            
    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    </style>
       
</head>
<body>
   <?php
        include 'includes/nav.php';
   ?>
    <div class="main-content">
        <div>
            <h1>Suggestion Lists</h1>
            <p>Enhance Your Work</p>
        </div>
        <form action="">
                <div style="color:red;font-weight:bold;font-size:medium;">
                    <?php
                        if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                        }
                    ?>
                </div>
            
            	<table class="table">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Suggestions</th>
                        <th>Phone Number</th>
                        <th>Option</th>
                    </tr>
                    <?php
                        $sql="select * from messages order by sid";
                        $sqlRun = mysqli_query($con,$sql);
                        $i=1;
                        while($message = mysqli_fetch_assoc($sqlRun)){  
                    ?>
                    <tr>
                        <td>
                            <?php
                                echo $i++;
                            ?>
                        </td>
                        <td><?= $message['name'];?></td>
                        <td><?= $message['email'];?></td>
                        <td><?= $message['sugesstions'];?></td>
                        <td><?= $message['number'];?></td>
                        <td>
                        <a onclick="return confirm('Are you sure?')"href="sugesstions_process.php?delete_id=<?= $message['sid'];?>">Delete</a> </td>
                    </tr>
                    <?php } ?>
            </table>
        </form>
        
        
    </div>
    

</body>
</html>