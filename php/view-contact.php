<?php
//$viewlink = filter_input(INPUT_GET, "viewlink", FILTER_SANITIZE_STRING);
//$name = filter_input(INPUT_GET, "contactname", FILTER_SANITIZE_STRING);
session_start();
include("db_conn.php");
$sql = "SELECT title, firstname, lastname, email, company, type, telephone, created_at, created_by, updated_at, assigned_to FROM contacts";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contact</title>
    <link rel="stylesheet" href="view-contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>

    <nav>
        <img src="#" alt="Dolphin CRM LOGO" srcset="">
        <p>Dolphin CRM</p>
    </nav>

    <div class="container">
        <aside>
            <ul>
                <a href="#"><li><i class="material-icons"><!--home--></i>Home</li></a>
                <a href="#"><li><i class="material-icons"><!--account_circle--></i>New Contact</li></a>
                <a href="#"><li><i class="material-icons"><!--people_outline--></i>Users</li></a>
                <hr>
                <a href="lougout.php"><li><i class="material-icons"><!--exit_to_app--></i>Logout</li></a>
            </ul>
        </aside>



    <div class="page">
    
        <header>
            <div class="image">
                    <img src="pictures/profilepic2.jpg" alt="Contact Profile Picture" width="90p" height="90p"> 

                    <div class="text">
                        <h1><?php $row['title']." ".$row['firstname']." ".$row['lastname'] ?></h1> 
                        <p><?php $row['created_at']." ".$row['created_by'] ?></p>  
                        <p><?php $row['updated_at'] ?></p>  
                    </div>
            </div>

            <div class="header-buttons">
                <button type="button" id="abtn" onclick="assignclick()"><i class="fas fa-hand-paper"></i>Assign to me</button> 
                <script> 
                    function assignclick() {
                    <?php $sql1 = "UPDATE contacts SET assigned_to= '{$row['firstname']}' '{$row['lastname']}' WHERE firstname= '{$row['firstname']}'"; 
                        $conn->query($sql1);
                        $sql2 = "UPDATE contacts SET updated_at= DATE(NOW())";
                        $conn->query($sql2);?>
                    }
                </script>
                <?php if ($row['type'=="Sales Lead"]): ?>
                    <button onclick= "switchclick1()" type="button" id="sbtn"><i class="fas fa-exchange"></i>Switch to Support</button> 
                <script> 
                    function switchclick1(){
                        <?php $sql1 = "UPDATE contacts SET type = 'Support' WHERE firstname= '{$row['firstname']}'"; 
                        $conn->query($sql1);
                        $sql2 = "UPDATE contacts SET updated_at= DATE(NOW())";
                        $conn->query($sql2);?>
                    }
                </script>
                <?php else: ?>
                    <button onclick= "switchclick2()" type="button" id="sbtn"><i class="fas fa-exchange"></i>Switch to Sales Lead</button>
                <script> 
                    function switchclick2(){
                        <?php $sql1 = "UPDATE contacts SET type = 'Sales Lead' WHERE firstname= '{$row['firstname']}'"; 
                        $conn->query($sql1);
                        $sql2 = "UPDATE contacts SET updated_at= DATE(NOW())";
                        $conn->query($sql2);?>
                    }
                </script>
                <?php endif ?>
            </div>

        </header>
        <br>

        <section>

            <div class="info-container">

                <div class="contact-info">
                    <label for="email"><h4 style="color: #365871;">Email</h4></label>
                    <input type="email" id="email" name="email" value="<?php $row['email'] ?>" readonly class="info-element">  
                </div>

                <div class="contact-info">
                    <label for="telephone"><h4 style="color: #365871;">Telephone</h4></label>
                    <input type="text" id="telephone" name="telephone" value="<?php $row['telephone'] ?>" readonly class="info-element">  
                </div>

                <div class="contact-info">
                    <label for="company"><h4 style="color: #365871;">Company</h4></label>
                    <input type="text" id="text" name="text" value="<?php $row['company'] ?>" readonly class="info-element">  <
                </div>

                <div class="contact-info">
                    <label for="assigned"><h4 style="color: #365871;">Assigned To</h4></label>
                    <input type="text" id="assigned" name="assigned" value="<?php $row['assigned_to'] ?>" readonly class="info-element">  
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
                                <label for="editnotes">Add a Note about <?php $row['first_name'] ?></label> 
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

    </div>
    
</body>
</html>