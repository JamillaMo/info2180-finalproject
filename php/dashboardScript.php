<?php

session_start();

$host = "localhost";
$username = "root";
$password = "";
$db_name = "dolphin_crm";

$conn = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8mb4",$username, $password);

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if($_GET['filter'] == "all"){
        $stmt = $conn->prepare("SELECT * FROM contacts");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo displayTableRows($results);
    }

    if($_GET['filter'] == "sales"){
        $stmt = $conn->prepare("SELECT * FROM contacts WHERE type = 'Sales Lead'");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo displayTableRows($results);
    }

    if($_GET['filter'] == "support"){
        $stmt = $conn->prepare("SELECT * FROM contacts WHERE type = 'Support'");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo displayTableRows($results);
    }

    if($_GET['filter'] == "assigned"){
        $stmt = $conn->prepare("SELECT * FROM contacts WHERE assigned_to = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo displayTableRows($results);
    }
}



function displayTableRows($results){
    $rows = "";
    foreach ($results as $row){
        // Creating the text to put in the classes for the span based on DB result 
        $classText = "";
        if($row['type'] == "Support"){$classText = "support";}
        if($row['type'] == "Sales Lead"){$classText = "sales-lead";}
    
        $rows .= 
        "<tr>
            <td><p>" . $row['title'] ." ". $row['firstname'] ." ". $row['lastname'] . "</p></td> 
            <td>" . $row['email'] . "</td> 
            <td>" . $row['company'] . "</td> 
            <td><span class=\"" . $classText . "\">" . $row['type'] . "</span></td> 
            <td><a href=\"view-contact.html\">Link</a></td>        
        </tr>";
    }
    return $rows;
}
