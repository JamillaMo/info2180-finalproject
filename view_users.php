<?php
    include "php/db_conn.php";

    $result = mysqli_query($conn,"SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/view_users.css">
    <script src="js/addUserBtn.js"></script>
</head>
<body>
    <div class="header">
        <img class="logo" src="img/Dolphin.jpg" alt="Dolphin CRM Logo">
        <h4>Dolphin CRM</h4>
    </div>

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

        <section>
            <div class="mainpageHeader">
                <h1>Users</h1>
                <button>Add User</button>
            </div>
            <div class="table">
                <?php
                    if($row = mysqli_fetch_array($result)){
                        echo "<table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created</th>
                                </tr> 
                            </thead>";
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tbody><tr><td width=25%>".$row['firstname']." ".$row['lastname']."</td><td width=25%>".$row['email']."</td><td width=25%>".$row['role']."</td><td width=25%>".$row['created_at']."</td>";
                        }
                        echo "</table>";
                    }
                ?>
            </div>
        </section>
    </div>
</body>
</html>