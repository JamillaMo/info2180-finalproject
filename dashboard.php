<?php

//include "db_conn.php";
//USING PDO INSTEAD OF mysqli
$host = "localhost";
$username = "root";
$password = "";
$db_name = "dolphin_crm";

$conn = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8mb4",$username, $password);

$stmt = $conn->prepare("SELECT * FROM contacts");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="js/dashboard.js"></script>
</head>
<body>
    <nav>
        <img src="img/Dolphin.jpg" alt="Dolphin CRM LOGO" srcset="">
        <p>Dolphin CRM</p>
    </nav>

    <div class="container">
        <aside>
            <ul>
                <a href="#" class="currentPage"><li><i class="material-icons">home</i>Home</li></a>
                <a href="create-contact.html"><li><i class="material-icons">account_circle</i>New Contact</li></a>
                <a href="view_users.php"><li><i class="material-icons">people_outline</i>Users</li></a>
                <hr>
                <a href="php/logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>

        <main>
            <header>
                <h1>Dashboard</h1>
                <a href="create-contact.html"><i class="material-icons">group_add</i>Add Contact</a>
            </header>

            <section>
                <div class="controls">
                    <i class="material-icons">filter_list</i>
                    <h3>Filter By:</h3>
                    <button class="active filter-all">All</button>
                    <button class="filter-sales">Sales Leads</button>
                    <button class="filter-support">Support</button>
                    <button class="filter-assigned">Assigned to me</button>
                </div>

                <table>
                    <colgroup>
                        <col style="width: 25%">
                        <col style="width: 25%">
                        <col style="width: 25%">
                        <col style="width: 15%">
                        <col style="width: 10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Name</th> <th>Email</th> <th>Company</th> <th>Type</th> <th></th>
                        </tr> 
                    </thead>
                    <tbody>
                    <?php foreach ($results as $row):

                        // Creating the text to put in the classes for the span based on DB result 
                        $classText;
                        if($row['type'] == "Support"){$classText = "support";}
                        if($row['type'] == "Sales Lead"){$classText = "sales-lead";}
                    ?>

                        <tr>
                            <td><p id= "name"><?php echo $row['title']." ".$row['firstname']." ".$row['lastname'] ?></p></td> 
                            <td><?php echo $row['email']?></td> 
                            <td><?php echo $row['company']?></td> 
                            <td><?php echo "<span class=\"" . $classText . "\">" . $row['type'] . "</span>" ?></td> 
                            <td><a href="view-contact.php?view=<?php echo $row['id'] ?>" id= "link">Link</a></td>        
                        </tr>
                    <?php endforeach; ?>    
                    </tbody>
                </table>
            </section>
        </main>
</body>
</html>