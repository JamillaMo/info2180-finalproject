<?php 
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db_name = "dolphin_crm";

$conn = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8mb4",$username, $password);

$stmt = $conn->prepare("SELECT title, firstname, lastname, email, company, type, telephone, created_at, created_by, updated_at, assigned_to FROM contacts");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$row = mysqli_fetch_array($result);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if($_GET['query'== "assign"]){
        $sql1 = "UPDATE contacts SET assigned_to= '".$row['firstname']."' ".$row['lastname']."' WHERE firstname= '{$row['firstname']}'"; 
        $conn->query($sql1);
        $sql2 = "UPDATE contacts SET updated_at= DATE(NOW())";
        $conn->query($sql2);
    }
    if($_GET['query'== "switch"]){
        if($switch== "Support"){
            $sql1 = "UPDATE contacts SET type = 'Sales Lead' WHERE firstname= '{$row['firstname']}'"; 
            $conn->query($sql1);
            $sql2 = "UPDATE contacts SET updated_at= DATE(NOW())";
            $conn->query($sql2);
        }
        else{
            $sql1 = "UPDATE contacts SET type = 'Support' WHERE firstname= '{$row['firstname']}'"; 
            $conn->query($sql1);
            $sql2 = "UPDATE contacts SET updated_at= DATE(NOW())";
            $conn->query($sql2);
        }
    }
}
