<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dolphin CRM</title>

        <link href="style.css" type="text/css" rel="stylesheet">

    </head>
        
    <body>
    <div id="bg"></div>
        <form action="login.php" method="post">
                <h2>LOGIN</h2>
                <?php if(isset($_GET['error'])) { ?>
                    <p class="error"> <?php echo $_GET['error']; ?></p>
                <?php } ?>
                
                <div class="form-field">
                <input type="text" name = "email" placeholder="Email address"><br>
                </div>

                <div class="form-field">
                <input type="password" name="password" placeholder="Password"><br>
                </div>
                
                <div class = "form-field">
                <button type="submit" class = "btn">Login</button>
                </div>
            </form>
    </body>
</html>