<?php include "db_conn.php";
$stmt = $conn->query("SELECT title, firstname, lastname, email, company, type FROM contacts;")     
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <script src="dashboard.js"></script>
    <script src="ViewContactDetails.js"></script>
</head>
<body>
    <nav>
        <img src="#" alt="Dolphin CRM LOGO" srcset="">
        <p>Dolphin CRM</p>
    </nav>

    <div class="container">
        <aside>
            <ul>
                <a href="#"><li><i class="material-icons">home</i>Home</li></a>
                <a href="#"><li><i class="material-icons">account_circle</i>New Contact</li></a>
                <a href="#"><li><i class="material-icons">people_outline</i>Users</li></a>
                <hr>
                <a href="lougout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>

        <main>
            <header>
                <h1>Dashboard</h1>
                <button><i class="material-icons">group_add</i>Add Contact</button>
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
                    <?php foreach ($results as $row):?>
                        <tr>
                            <td><a href="view-contact.html"><?php echo $row['title']." ".$row['firstname']." ".$row['lastname'] ?></a></td> 
                            <td><?php echo $row['email'] ?></td> 
                            <td><?php $row['company'] ?></td> 
                            <td><span class="sales-lead"><?php $row['type'] ?></span></td> 
                            <td><a href="view-contact.html">Link</a></td>        
                        </tr>
                    <?php endforeach; ?>    
                    </tbody>
                </table>
            </section>
        </main>
</body>
</html>