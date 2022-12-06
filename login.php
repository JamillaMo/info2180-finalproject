<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dolphin CRM</title>

        <link href="css/login.css" type="text/css" rel="stylesheet">
        <script src="js/login.js"></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
        
    <body>
    <div id="bg"></div>
        <form>
                <h2>LOGIN</h2>
                
                <div class="form-field">
                <input type="text" name = "email" placeholder="Email address"><br>
                <div class="emailMsg error"></div>
                </div>

                <div class="form-field">
                <input type="password" name="password" placeholder="Password"><br>
                <div class="passwordMsg error"></div>
                </div>
                
                <div class = "form-field">
                <button class = "btn">Login</button>
                </div>
        </form>
    </body>
</html>