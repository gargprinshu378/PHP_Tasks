<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PHP Tasks</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <!-- Creating a form for login -->
    <form method="post">
        <div class="form-margin">
            <div class="index">
                <div>
                    <!-- Input for username -->
                    <h2>Username</h2>
                    <input name="Username" id="Username" type="text" placeholder="Username" class="login-username">
                </div>
            </div>
            <div class="index">
                <div>
                    <!-- Input for password -->
                    <h2>Password</h2>
                    <input name="Password" id="Password" type="password" placeholder="Password" class="login-username">
                </div>
            </div>
            <div class="index">
                <!-- Login submit type -->
                <input type="submit" name="Login" value="Login" class="login-btn">
            </div>
        </div>
        <?php
        // Including the login.php file
        include "./login.php";
        ?>
    </form>
</body>
</html>