<?php
include 'dbh.php';
$em = $_POST['email'];
$pwd = $_POST['password'];
echo $em;
echo $pwd;

login($em,$pwd);
function login($email, $password) {
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
?>