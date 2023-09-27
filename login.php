<?php
  
  session_start();
  include './db_config.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SmartPickz</title>
    <link rel="stylesheet" href="./css/login.css">
  </head>
  <body>
  <script>
  

   function validateform() {
    var username= document.getElementById("username");
    var password= document.getElementById("password");
    if (username.value==null || username.value==""){
      alert("Please enter your Username");
      return false;
    }
    
    if (password.value==null || password.value==""){
      alert("Please enter your Password");
      return false;
    }
    
    return true;
    
  }
</script>
    <div class="center">
      
      <h1>Login</h1>
      
      <form action="loginprocess.php" method="POST" >
        <div class="txt_field">
          <input type="text" name="username" id="username" >
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name= "password" id="password" >
          <span></span>
          <label>Password</label>
        </div>
        
        <input type="submit" name="submit" value="Login" onclick="return validateform()">
        <div class="txt_field">
          <a href="signup.php">Don't have account? Sign Up</a>
        </div>
      </form>
      <div style="color:red;font-weight:bold;font-size:medium;">
        <?php
            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
            ?>
                
            
      </div>
      
    </div>
    
  </body>
</html>
