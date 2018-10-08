<?php
require_once 'commonPasswords.php';
 ?>
<!doctype html>
<html>
<head>
<title>Register</title>
    <style>
        body{
    margin-top: 100px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 80px;
    background-color: white ;
    color: palevioletred;
    font-family: verdana;
    font-size: 100%

        }
            h1 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}
         h2 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}</style>
</head>
<body>

    <center><h1>CREATE REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1></center>
   <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
    <center><h2>Registration Form</h2></center>
<form action="" method="POST">
    <legend>
    <fieldset>

Username: <input type="text" name="user"><br />
Password: <input type="password" name="pass"><br />
Type your password again: <input type="password" name="pass2"><br />
Adress: <input type: "text" name="adress"><br />
<input type="submit" value="Register" name="submit" />

        </fieldset>
        </legend>
</form>
<?php
if(isset($_POST["submit"])){
if(!empty($_POST['user']) && !empty($_POST['pass'])) {
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];
    $adress=$_POST['adress'];
if ($pass2 ==$pass){
if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{7,}$/', $pass))
{
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());
    mysqli_select_db($con,'user_registration') or die("cannot select DB");

    $query=mysqli_query($con,"SELECT * FROM login WHERE username='.$user.'");
    $numrows=mysqli_num_rows($query);
    if($numrows==0)
    {
      if(checkPassword($pass)){
      }
	$passhash =password_hash ($pass, PASSWORD_DEFAULT);
    $sql="INSERT INTO login(username,password,adress) VALUES('$user','$passhash', '$adress')";

    $result=mysqli_query($con,$sql);
        if($result){
    echo "Account Successfully Created";
    } else {
    echo "Failure!";
    }

    } else {
    echo "That username already exists! Please try again with another.";
    }

}  else {
 echo "Password must be atleast 7 characters and contain atleast one uppercase letter, one lowercase letter and one number";
}
}  else {
 echo "You need to write the same password twice!";
}
} else {
    echo "All fields are required!";
  }

}
?>
</body>
</html>
