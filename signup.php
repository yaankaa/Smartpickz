<html>
  <head>
    <title>SmartPickz</title>
    
    <link rel="stylesheet" href="./css/signup.css">
  </head>
  <body>
    <div class="main">
      <h1>SignUp Form</h1>

      <br><br><br> <br>
      <form id="form" action="signupprocess.php" method="POST" onsubmit="submitForm(event)">
      <label>Full Name</label><br />
        <input
          type="text"
          name="fullname"
          placeholder="Full Name"
          pattern="^[a-zA-Z].*[\s\.]*$"
          title="Please Enter Alphabets Only."
          autofocus
          required
        /><br />
        <label>Email</label><br />
            <input 
            type="text" 
            name="email"  
            placeholder="Your email here"  
            pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$"
            title="Please Enter valid Email."
            autofocus
            required
            />
            
        <br />
        <label>Username</label><br />
        <input
          type="text"
          name="username"
          placeholder="Username"
          pattern="^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$"
          title="Username Must Be Between 8 - 20 characters. No Space"
          autofocus
          required
        /><br />
        <label>Password</label><br />
        <input
          type="password"
          name="password"
          id="password"
          required
          placeholder="Password"
          pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
          title="Minimum eight characters at least one letter and one number"
        /><br />
        <label>Re-enter Password</label><br />
        <input
          type="password"
          name="repassword"
          id="repassword"
          onkeyup="check();"
          placeholder="Retype Password"
          required
        />
        <span id="message"></span>
        <div class="btn primary-btn">
        <input type="submit" value="Send"></input>
        </div>
        <div class="txt_field">
          <a href="login.php">Already have account? Log In</a>
        </div>
        
      
        
        
     
        
      </form>
    </div>
  </body>
  <script>
    var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('repassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
function submitForm(event){
  if (document.getElementById('password').value !=
    document.getElementById('repassword').value) {
  event.preventDefault();
    }
}

    </script>
</html>


