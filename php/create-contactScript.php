<?php

//include "db_conn.php";

$host = "localhost";
$username = "root";
$password = "";
$db_name = "dolphin_crm";

$conn = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8mb4",$username, $password);

session_start();

$title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$firstName = filter_var($_POST['fname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastName = filter_var($_POST['lname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$company = filter_var($_POST['company'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$type = filter_var($_POST['type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$assign = filter_var($_POST['assign'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


date_default_timezone_set(date_default_timezone_get());

try{
    $stmt = $conn->prepare("INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) 
                            VALUES (:title, :fname, :lname, :email, :telephone, :company, :type, :assigned_to, :created_by, :created_at, :updated_at)");

    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':fname', $firstName, PDO::PARAM_STR);
    $stmt->bindValue(':lname', $lastName, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);
    $stmt->bindValue(':company', $company, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->bindValue(':assigned_to', $assign, PDO::PARAM_STR);
    $stmt->bindValue(':created_by', $_SESSION['id'], PDO::PARAM_STR);
    $stmt->bindValue(':created_at', date('Y-m-d H:i:s'));
    $stmt->bindValue(':updated_at', date('Y-m-d H:i:s'));

    $stmt->execute();
    echo "Created new contact successfully";
}
catch(Exception $e){
    echo "An Exception has occured: " . $e; 
}