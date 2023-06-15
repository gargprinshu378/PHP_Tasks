<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prateek PHP Task 1</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Creating form -->
    <form method="post">
    <!-- Input first name -->
    First Name: <input type="text" name="First_Name" id="First_Name" required><br>
    <!-- Input Last Name -->
    Last Name: <input type="text" name="Last_Name" id="Last_Name" required><br>
    <!-- Making input and disabling it and printing the full name using JS-->
    Full Name: <input type="text" name="Full_Name" id="Full_Name" disabled><br>
    <!-- Submit -->
    <input type="submit"><br>
    <?php
    // Including form.php file which contains the backend(logic).
    include 'form.php';
    ?>
    </form>
    <!-- Linking JavaScript -->
    <script src="./concat.js"></script>
</body>     
</html>