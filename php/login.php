<?php
session_start();
include "db_conn.php";

$username = $_POST['email'];
$password = $_POST['password'];

$username = trim($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($conn, $username);  
$password = mysqli_real_escape_string($conn, $password);  



if(empty($username)){
    header ("Location: index.php?error=Email is required");
    exit();
}
else if(empty($password)){
    header ("Location: index.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM users WHERE email='$username' AND password='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['email'] === $username && $row['password'] === $password) {
        echo "Login Successful!";
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.php");
        exit();
    }
}
else{
    header ("Location: index.php?error=Incorrect Email or Password");
    exit();
}  
?>  
