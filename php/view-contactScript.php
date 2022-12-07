<?php 

session_start();

$host = "localhost";
$username = "root";
$password = "";
$db_name = "dolphin_crm";

$conn = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8mb4",$username, $password);


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['comment'])){
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contactId = filter_var($_POST['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $userId = $_SESSION['id'];

        //CODE TO ADD NEW NOTE TO DATABASE
        ////////////////////////
        ////////////////////////

        //CODE TO PUT NEW NOTE ON PAGE
        echo "<div class=\"written-notes\">";
        echo "<h4>" . $_SESSION['name'] . "</h4>";
        echo "<p class=\"pnotes\">" . $comment . "</p>";
        echo "<p class=\"date\">" . convertDateFormat(substr(date('Y-m-d H:i:s'), 0, 10)) . " at" . substr(date('Y-m-d H:i:s'), 10) . "</p>";
        echo "</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if(isset($_GET['assign'])){
        $contactId = filter_var($_GET['assign'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $sql = $conn->prepare("UPDATE contacts SET assigned_to= '". $_SESSION['id'] ."' WHERE id = '" .$contactId ."'"); 
        $sql->execute();
        $sql = $conn->prepare("UPDATE contacts SET updated_at= :date");
        $sql->bindValue(':date', date('Y-m-d H:i:s'));
        $sql->execute();

        echo $_SESSION['name'];
    }

    if(isset($_GET['switch'])){
        $contactId = filter_var($_GET['switch'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $newType = filter_var($_GET['to'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $sql = $conn->prepare("UPDATE contacts SET type =" . $newType ." WHERE id = '" .$contactId ."'"); 
        $sql->execute();

        $sql = $conn->prepare("UPDATE contacts SET updated_at= :date");
        $sql->bindValue(':date', date('Y-m-d H:i:s'));
        $sql->execute();
    }

}



function convertDateFormat($date){
    $date = explode("-", $date);
    $monthNum  = $date[1];
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = $dateObj->format('F');
    return $monthName . " " . $date[2] . " " . $date[0];
}