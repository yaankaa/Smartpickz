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
    
    <link rel="stylesheet" href="./css/contact.css">
    
    
        <style>
            #nameErr, #emailErr, #msgErr, #numErr,  #submitErr{
                color: red;
            }
        </style>
        

</head>
<body>

  <section class="contact">
      <div class="content">
          <h2>Get In Touch</h2>
          
              <p>
                To contact us please send us your messages or simply email us.
            <p> You can call us if any emergency occurs!</p>
              </p> 
              
          </p>
      </div>
      <div class="container_con">
        <div class="contactInfo">
            <div class="box">
               
                <div class="text">
                    <h3>Email</h3>
                    <p>smartpickz2023@gmail.com</p>
                </div>
            </div>
            <div class="box">
                
                <div class="text">
                    <h3>Phone</h3>
                    <p>+977-9841635474</p>
                </div>
            </div>
            
        </div>
        
        <div class="contactForm">
            <form action="contact_process.php" method="post" name="form1">
                <h2>Send Message</h2>
                <div class="inputBox">
                    <input type="text" name="name" id="name" placeholder="Full Name" autocomplete="off"  onkeyup="ValidateName();" >
                    
                    <p id="nameErr"></p>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off"  onkeyup="ValidateEmail();" >
                    
                    <p id="emailErr"></p>
                    
                </div>
                <div class="inputBox">
                <input type="text" name="number" id="number" autocomplete="off" placeholder="Phone Number"  onkeyup="ValidateNumber();" >
                    
                    <p id="numErr"></p>
                </div>
                <div class="inputBox">
                <textarea name="messages" id="messages" autocomplete="off" placeholder="Your Message" onkeyup="ValidateMsg();" ></textarea>
                    
                    <p id="msgErr"></p>
                </div>
                
                <div class="inputBox">
                    <input type="submit" name="submit" value="Send" onclick="return ValidateMyForm()" > 
                    <p id="submitErr"></p>
                </div>
                <div style="color:red;font-weight:bold;font-size:large;">
                <?php
                    
                    if(isset($_SESSION['note'])){
                    echo $_SESSION['note'];
                    unset($_SESSION['note']);
                    }
                ?>
                </div>
                    
            </form>
        </div>
      </div>
  </section>
    
    
</body>

<?php
       include ('includes/footer.php');
    ?> 
</html>

