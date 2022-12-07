<?php

session_start();
//include("db_conn.php");

$host = "localhost";
$username = "root";
$password = "";
$db_name = "dolphin_crm";

$conn = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8mb4",$username, $password);

$id = filter_var($_GET['view'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//GETTING THE CONTACT
$stmt = $conn->prepare("SELECT * FROM contacts where id=$id");
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

//GETTING THE USER THAT CREATED THE CONTACT
$stmt = $conn->prepare("SELECT * FROM users where id= " . $row['created_by']);
$stmt->execute();
$created_by= $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

//GETTING THE USER THAT CONTACT IS ASSIGNED TO
$stmt = $conn->prepare("SELECT * FROM users where id= " . $row['assigned_to']);
$stmt->execute();
$assigned_to= $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

//GETTING THE NOTES FOR THE CONTACT
$stmt = $conn->prepare("SELECT * FROM notes where contact_id= " . $row['id']);
$stmt->execute();
$notes= $stmt->fetchAll(PDO::FETCH_ASSOC);

function convertDateFormat($date){
    $date = explode("-", $date);
    $monthNum  = $date[1];
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = $dateObj->format('F');
    return $monthName . " " . $date[2] . " " . $date[0];
}

function convertTimeFormat(){

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contact</title>

    <link rel="stylesheet" href="css/view-contact.css">
    <script src="js/view-contact.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>

    <nav>
        <img src="img/Dolphin.jpg" alt="Dolphin CRM LOGO" srcset="">
        <p>Dolphin CRM</p>
    </nav>

    <div class="container">

        <aside>
            <ul>
                <a href="dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="create-contact.html"><li><i class="material-icons">account_circle</i>New Contact</li></a>
                <a href="view_users.php" class="currentPage"><li><i class="material-icons">people_outline</i>Users</li></a>
                <hr>
                <a href="php/logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>

        <section>
            <header>
                <div class="image">
                        <img src="img/profilepic.png" alt="Contact Profile Picture"> <!--filler image-->

                        <div class="text">
                            <h1><?php echo $row['title'] . " " . $row['firstname'] . " " . $row['lastname']?></h1> <!--filler text-->
                            <p>Created on <?php echo convertDateFormat(substr($row['created_at'], 0, 10)) ?> by <?php echo $created_by['firstname'] . " " . $created_by['lastname']?></p>  <!--filler text-->
                            <p>Updated on <?php echo convertDateFormat(substr($row['updated_at'], 0, 10)) ?></p>  <!--filler text-->
                        </div>
                </div>

                <div class="header-buttons">
                    <button type="button" id="assign"><i class="fas fa-hand-paper"></i>Assign to me</button> 
                    <button type="button" id="switch"><i class="fas fa-exchange"></i>Switch to <?php if($row['type'] == "Support"){echo "Sales Lead";} else{echo "Support";}?></button> 
                </div>
            </header>

            <div class="info-container">
                <div class="contact-info">
                    <label for="email"><h4 style="color: #365871;">Email</h4></label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']?>" readonly class="info-element">
                </div>

                <div class="contact-info">
                    <label for="telephone"><h4 style="color: #365871;">Telephone</h4></label>
                    <input type="text" id="telephone" name="telephone" value="<?php echo $row['telephone']?>" readonly class="info-element">  <!--filler text-->
                </div>

                <div class="contact-info">
                    <label for="company"><h4 style="color: #365871;">Company</h4></label>
                    <input type="text" id="text" name="text" value="<?php echo $row['company']?>" readonly class="info-element">  <!--filler text-->
                </div>

                <div class="contact-info">
                    <label for="assigned"><h4 style="color: #365871;">Assigned To</h4></label>
                    <input type="text" id="assigned" name="assigned" value="<?php echo $assigned_to['firstname'] . " " . $assigned_to['lastname']?>" readonly class="info-element">  <!--filler text-->
                </div>
            </div>


            <div class="n-container">
                    <div class="notes-container">
                        
                        <div class="notes-title">
                            <label for="notes">
                                <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                            </label>
                            <input type="text" value="Notes" readonly>
                        </div>


                    <div class="w-notes">
                        <?php
                            foreach($notes as $note){
                                //Getting name of person who made note
                                $stmt = $conn->prepare("SELECT * FROM users where id= " . $row['created_by']);
                                $stmt->execute();
                                $user= $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

                                echo "<div class=\"written-notes\">";
                                    echo "<h4>" . $user['firstname'] . " " . $user['lastname'] . "</h4>";
                                    echo "<p class=\"pnotes\">" . $note['comment'] . "</p>";
                                    echo "<p class=\"date\">" . convertDateFormat(substr($note['created_at'], 0, 10)) . " at" . substr($note['created_at'], 10) . "</p>";
                                echo "</div>";
                            }
                        ?>
                    </div>    

                        <div class="add-notes">
                            <form>

                                <div class="editnotes">
                                <label for="editnotes">Add a Note about Michael</label> <!--filler text-->
                                <textarea name="editnotes" id="editnotes" cols="50" rows="10" placeholder="Enter details here"></textarea>
                                </div>

                                <div class="add-note-btn">
                                    <input type="submit" value="Add Note" id="addNote">
                                </div>

                            </form>

                        </div>

                    </div>
            </div>    

        </section>

    </div>

    
</body>
</html>