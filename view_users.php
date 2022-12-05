<?php
    $result = mysqli_query($con,"SELECT * FROM users");

    while($row = mysqli_fetch_array($result)) {
        echo "<table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
            </tr> 
        </thead>";
        echo "<tbody><tr><td>.$row['firstname'].</td><td>.$row['email'].</td><td>.$row['role'].</td><td>.$row['created'].</td>";
        echo "</table>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link rel="stylesheet" href="view_user.css">
</head>
<body>
    <div class="header">
        <img class="logo" src="images/Dolphin.jpg" alt="Dolphin CRM Logo">
        <h4>Dolphin CRM</h4>
    </div>

    <div class="container">
        <aside>
            <ul>
                <a href="#"><li><i class="material-icons">home</i>Home</li></a>
                <a href="#"><li><i class="material-icons">account_circle</i>New Contact</li></a>
                <a href="#"><li><i class="material-icons">people_outline</i>Users</li></a>
                <hr>
                <a href="logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>

        <section>
            <div class="mainpageHeader">
                <h1>Users</h1>
                <button>Add User</button>
            </div>
            <div class="tableClass">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created</th>
                        </tr> 
                    </thead>
                </table>
            </div>
        </section>
    </div>
</body>
</html>