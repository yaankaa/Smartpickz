<?php 
include 'db_config.php';

$fullname = $_POST["fullname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = md5($_POST["password"]);

$query = "INSERT INTO login (fullname, email, username, password)
          VALUES ('$fullname', '$email','$username', '$password')";

if (mysqli_query($con, $query)) {
    echo '<script> 
            alert("Your Sign Up Was Successful");
            window.location.replace("login.php");
          </script>';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>
