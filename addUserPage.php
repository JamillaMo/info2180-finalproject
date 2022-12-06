<?php
session_start();
if(!isset($_SESSION['id'])){
    session_destroy();
    //header('Location: index.php');
    //exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" href="css/addUser.css">
    <script src="js/addUser.js"></script>
    
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
                <a href="#"><li><i class="material-icons">people_outline</i>Users</li></a>
                <hr>
                <a href="php/logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>
    
        <main>
            <h1>New User</h1>
            <div class="form">
    
                <section>
                    <h2>First Name</h2>
                    <input type="text" name="FirstName" placeholder="Jane" id="fname">
                    <div class="fnameMsg error"></div>
                </section>
    
                <section>
                    <h2>Last Name</h2>
                    <input type="text" name="LastName" placeholder="Doe" id="lname">
                    <div class="lnameMsg error"></div>
                </section>
    
                <section>
                    <h2>Email</h2>
                    <input type="text" name="Email" placeholder="something@example.com" id="email">
                    <div class="emailMsg error"></div>
                </section>
    
                <section>
                    <h2>Password</h2>
                    <input type="text" name="Password" id="password">
                    <div class="passwordMsg error"></div>
                </section>
    
                <section>
                    <h2>Role</h2>
                    <div class="dropdown">
                        <div class="select">
                            <span class="selected">Member</span>
                            <div class="caret"></div>
                        </div>
                        <ul class="menu">
                            <li class="active">Member</li>
                            <li>Admin</li>
                        </ul>
                    </div>
                </section>
    
                <div class="controls">
                    <div class="msg">Message</div><button>Save</button>
                </div>
    
            </div>
    
        </main>
    </div>
    
</body>
</html>