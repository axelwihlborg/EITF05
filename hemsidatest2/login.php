<!doctype html>
<html>
<head>
<title>Login</title>
    <style>
        body{

    margin-top: 100px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 80px;
    background-color: white;
    color: palevioletred;
    font-family: verdana;
    font-size: 100%

        }
            h1 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}
        h3 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
} </style>
</head>
<body>
     <center><h1>CREATE REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1></center>
   <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
<h3>Login Form</h3>
<form action="" method="POST">
Username: <input type="text" name="user"><br />
Password: <input type="password" name="pass"><br />
<input type="submit" value="Login" name="submit" />
</form>
<?php
session_start();

if(!isset($_SESSION['attempts'])){
  $_SESSION['attempts'] = 0;
}

if ($_SESSION['attempts'] < 5){
  if(isset($_POST["submit"])){

  if(!empty($_POST['user']) && !empty($_POST['pass'])) {
      $user=mysqli_real_escape_string($_POST['user']);
      $pass=$_POST['pass'];


      $con=mysqli_connect('localhost','root','') or die(mysqli_error());
      mysqli_select_db($con,'user_registration') or die("cannot select DB");

      $query=mysqli_query($con,"SELECT username, password FROM login WHERE username like '$user'");

  	  $numrows=mysqli_num_rows($query);

      if($numrows != 0)
      {
      while($row=mysqli_fetch_assoc($query))
      {
      //a' OR username in (SELECT username FROM login WHERE username like '%') or 'x'='x
      //echo $row['username'], " ", $row['password'], " ";
      $dbusername=$row['username'];
      $dbpassword=$row['password'];
      }

      if($user == $dbusername && password_verify($pass, $dbpassword))
      {
      session_destroy();
      session_start();
      $_SESSION['sess_user']=$user;
      /* Redirect browser */
      header("Location: index.php");
      } else {
          echo "Invalid username or password!";
          $_SESSION['attempts']++;


      }

      } else {

      echo "Invalid username or password!";
      $_SESSION['attempts']++;
      }

  } else {
      echo "All fields are required!";

  }
  }
} else {
  echo "Too many failed attempts, try again later";
}

?>
</body>
</html>
