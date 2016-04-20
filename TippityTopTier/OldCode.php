<?php
// Create connection
include 'dbh.php';
//Login pseudocode
//0. create database connection
//1. get email and password from the user
//2. parse input and store it as a variable in the php login script(check for mysql injection)
//3. create a query that to check if email is valid
//4. execute query,  if the email is valid, select the password from the database
//5. compare the user supplied password with the expected password

//login script

function login($email, $password) {

    echo $email."<br>";
    echo $password."<br>";
    global $conn;
    $sql = "SELECT 'password' FROM ACCOUNT WHERE email='$email' LIMIT 1";
    $conn->query($sql);

    if($conn == false) {
        echo "Invalid Query";
    } else {
        echo 'Thats a good Query'."\t";
    }

}

//Register pseudocode
//0. create database connection
//1. get email, username, and password from user
//2. parse input and store it as a variable in the php register script(check for mysql injection)
//3. create a query to insert a new user into the database
//4. execute query and check if query executed properly

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
/*
 * Retrieves account with the desired email
 * uses hash_equals to determine if the s
 * upplied password is equal to the expected
 * password
 */
function compare($email, $password) {
    global $conn;
    $sth = $conn->prepare('
  SELECT
    password
  FROM Account
  WHERE
   email = :email
  LIMIT 1
  ');

    $sth->bindParam(':email', $email);

    $sth->execute();

    $user = $sth->fetch(PDO::FETCH_OBJ);

// Hashing the password with its hash as the salt returns the same hash
    if ( hash_equals($user->password, crypt($password, $user->password)) ) {
        // Ok!
        print_r("Correct Password!");
        echo "\n";
        print_r($user->password);
        echo "\n";
        print_r($password);
        echo "\n";

    } else {
        print_r("Incorrect Password");
        echo "\n";
        print_r($user->password);
        echo "\n";
        print_r($password);
        echo "\n";
    }

}

function Encrypt($password) {
    // A higher "cost" is more secure but consumes more processing power
    $cost = 10;

// Create a random salt
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

// Prefix information about the hash so PHP knows how to verify it later.
// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
    $salt = sprintf("$2a$%02d$", $cost) . $salt;

// Value:
// $2a$10$eImiTXuWVxfM37uY4JANjQ==

// Hash the password with the salt
    $hash = crypt($password, $salt);

    return $hash;
}



//call functions here
//register("noah@email.com", "Superman", "uncrackable");
//compare("noah","noah");
$test_email = "noah@email.com";
$test_username = "Noah";
$test_password = "uncrackable";
//login($test_email,$test_password);

//register($test_email,$test_username, $test_password);
//compare($test_username,$test_password);


/*
 * 1.
 * 2.
 * 3.
 * 4.
 * 5.
 * 6.
 */

function createCookie($name, $value)
{
    setcookie($name, $value, time() + (86400 * 365), "/");

}

function retrieveCookie($name) {
    if(!isset($_COOKIE[$name])) {
        echo "Cookie named '" . $name . "' is not set!";
    } else {
        echo "Cookie '" . $name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$name];
    }
}

function deleteCookie($name) {

    // set the expiration date to one hour ago
    setcookie($name, "", time() - 3600);

}


$a = "Noah";
$b = "Is Great!";
createCookie($a,$b);

retrieveCookie($a);

//desktop host localhost:8889
//laptop host localhost:3306
global $db_host;
$db_host= "localhost:8889";
global $db_username;
$db_username = "root";
global $db_password ;
$db_password = "root";
global $db_name;
$db_name = "Test";
global $conn;



try {

    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

function test() {
    echo 'duck';
}