<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tasks</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Creating the unordered list -->
    <ul class="Tasks">
        <div class="">
            <!-- Adding different links -->
            <li><a href="tasks.php?q=1">PHP Task 1</li>
            <li><a href="tasks.php?q=2">PHP Task 2</li>
            <li><a href="tasks.php?q=3">PHP Task 3</li>
            <li><a href="tasks.php?q=4">PHP Task 4</li>
            <li><a href="tasks.php?q=5">PHP Task 5</li>
            <li><a href="tasks.php?q=6">PHP Task 6</li>
            <form method="post">
                <!-- Logout button -->
                <input type="submit" name="logout" value="Log Out" class="login-btn">
            </form>
        </div>
    </ul>

    <?php
    include "pager.php";
    ?>
</body>
</html>