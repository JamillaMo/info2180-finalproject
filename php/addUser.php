<?php

//include "db_conn.php";

$host = "localhost";
$username = "root";
$password = "";
$db_name = "dolphin_crm";

$conn = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8mb4",$username, $password);

session_start();

$firstName = filter_var($_POST['fname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastName = filter_var($_POST['lname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$password = $_POST['password'];
$role = filter_var($_POST['role'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

date_default_timezone_set(date_default_timezone_get());


try{
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, password, email, role, created_at) 
                            VALUES (:fname, :lname, :password, :email, :role, :date)");

    $stmt->bindValue(':fname', $firstName, PDO::PARAM_STR);
    $stmt->bindValue(':lname', $lastName, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
    $stmt->bindValue(':role', $role, PDO::PARAM_STR);
    $stmt->bindValue(':date', date('Y-m-d H:i:s'));

    $stmt->execute();
}
catch(Exception $e){
    echo "An Exception has occured: " . $e; 
}
