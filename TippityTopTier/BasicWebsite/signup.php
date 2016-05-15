<?php
include 'dbh.php';

$em = $_POST['email'];
$uuid = $_POST['username'];
$pwd = $_POST['password'];
echo $em;
echo $uuid;
echo $pwd;
register($em,$uuid,$pwd);
function register($email, $username, $password) {
    // echo $test."</br>";
    echo "\n";
    print_r($email);
    echo "\n";
    print_r($username);
    echo "\n";
    print_r($password);
    $password = Encrypt($password);
    echo "\n";
    print_r($password);
    $now = date("Y/m/d");
    echo "\n";
    print_r($now);
    $sql = "INSERT INTO Account (email, username, password, last_modified, signup_date) 
	VALUES ('$email', '$username', '$password' , '$now', '$now')";
    // use exec() because no results are returned
    global $conn;
    $conn->exec($sql);
    echo "\n";
    echo "New record created successfully";
    echo "\n";
}
?>