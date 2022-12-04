<?php
$viewlink = filter_input(INPUT_GET, "viewlink", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_GET, "contactname", FILTER_SANITIZE_STRING);
$host = "localhost";
$username = "root";
$password = "";
$db_name = "dolphin_crm";

$conn = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8mb4",$username, $password);
$result = mysqli_query($conn, "SELECT title, firstname, lastname, email, company, telephone, created_at, created_by, updated_at, assigned_to");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contact</title>
    <link rel="stylesheet" href="vcontact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="ViewContactDetails.js"></script>
</head>
<body>

    
    <header>
        <div class="image">
                <img src="pictures/profilepic2.jpg" alt="Contact Profile Picture" width="90p" height="90p"> <!--filler image-->

                <div class="text">
                    <h1><?php $row['title']." ".$row['firstname']." ".$row['lastname'] ?></h1> <!--filler text-->
                    <p><?php $row['created_at']." ".$row['created_by'] ?></p>  <!--filler text-->
                    <p><?php $row['updated_at'] ?></p>  <!--filler text-->
                </div>
        </div>

        <div class="header-buttons">
            <button type="button" id="abtn"><i class="fas fa-hand-paper"></i>Assign to me</button> 
            <button type="button" id="sbtn"><i class="fas fa-exchange"></i>Switch to Sales Lead</button> 
        </div>

    </header>
    <br>

    <section>

        <div class="info-container">

            <div class="contact-info">
                <label for="email"><h4 style="color: #365871;">Email</h4></label>
                <input type="email" id="email" name="email" value="michael.scott@paper.co" readonly class="info-element">  <!--filler text-->
            </div>

            <div class="contact-info">
                <label for="telephone"><h4 style="color: #365871;">Telephone</h4></label>
                <input type="text" id="telephone" name="telephone" value="876-999-9999" readonly class="info-element">  <!--filler text-->
            </div>

            <div class="contact-info">
                <label for="company"><h4 style="color: #365871;">Company</h4></label>
                <input type="text" id="text" name="text" value="The Paper Company" readonly class="info-element">  <!--filler text-->
            </div>

            <div class="contact-info">
                <label for="assigned"><h4 style="color: #365871;">Assigned To</h4></label>
                <input type="text" id="assigned" name="assigned" value="Jen Levinson" readonly class="info-element">  <!--filler text-->
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
                    <div class="written-notes">
                        <h4>Jane Doe</h4> <!--filler text-->
                        <p class="pnotes">Lorem ipsum and some more words balh ablah balh 
                            lets fill his u with words fhejb skbjk bjksbhj hebjhkhjbhj fsjkbhfj</p> <!--filler text-->
                        <p class="date"> November 10, 2022 at 4pm</p> <!--filler text-->
                    </div>

                    <div class="written-notes">
                        <h4>Jane Doe</h4> <!--filler text-->
                        <p class="pnotes">Lorem ipsum and some more words</p> <!--filler text-->
                        <p class="date"> November 10, 2022 at 4pm</p> <!--filler text-->
                    </div>

                    <div class="written-notes">
                        <h4>Jane Doe</h4> <!--filler text-->
                        <p class="pnotes">Lorem ipsum and some more words</p> <!--filler text-->
                        <p class="date"> November 10, 2022 at 4pm</p> <!--filler text-->
                    </div>
                </div>    

                    <div class="add-notes">
                        <form action="">

                            <div class="editnotes">
                            <label for="editnotes">Add a Note about <?php $row['first_name'] ?></label> <!--filler text-->
                            <textarea name="editnotes" id="editnotes" cols="50" rows="10" placeholder="Enter details here"></textarea>
                            </div>

                            <div class="add-note-btn">
                                <input type="submit" value="Add Note">
                            </div>

                        </form>

                    </div>

                </div>
        </div>    

    </section>


    
</body>
</html>