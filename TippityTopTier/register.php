<?php
if((!empty($_POST['email'])) && (!empty($_POST['password'])) && !empty($_POST['username'])) {
    echo "Correct Input";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    //$email = mysql_real_escape_string($_POST['email']);
    //$password = mysql_real_escape_string( $_POST['password']);

    echo $email;
    echo $password;


} else {
    echo "Incorrect Input";
    echo $_POST['email'];
    echo $_POST['password'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tippity Top Tier</title>
    <link rel="stylesheet" type="text/css"  href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

<h1> <a href="login.php>">Login</a> or <a href="register.php">Register</a></h1>

<form action="login.php" method="post">
    <input type="text" placeholder="Enter your email" name="email">
    <input type="text" placeholder="Enter your username" name="username">
    <input type="password" placeholder="Enter Your password" name="password">
    <input type="checkbox" placeholder="Click if you want to skip login" name="remember_login"><br>
    <input type="submit">
</form>

</body>
</html>