<?php
session_start();
//include "db_conn.php";

$email = filter_var($_POST['email'],  FILTER_VALIDATE_EMAIL);
$pass = $_POST['password'];

$host = "localhost";
$username = "root";
$password = "";
$db_name = "dolphin_crm";

$conn = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8mb4",$username, $password);

$stmt = $conn->prepare("SELECT * FROM users WHERE email= :email");
$stmt->bindValue(':email', $email, PDO::PARAM_STR);

$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($row)==1) {
    $row = $row[0];
    if (password_verify($pass, $row['password'])) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        echo "success";
        exit();
    }
    echo "Incorrect Email or Password";
}
else{
    echo "Incorrect Email or Password";
    exit();
}  
?>  
