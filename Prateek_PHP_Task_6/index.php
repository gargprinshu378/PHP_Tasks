<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prateek PHP Task 4</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Creating a class in div and placing form inside it to style. -->
    <div class="form_flex">
        <div>
            <!-- Creating form -->
            <form method="post" enctype="multipart/form-data">
                <!-- Input first name -->
            First Name: <input type="text" name="First_Name" id="First_Name" required><br>
            <!-- Input second name -->
            Last Name: <input type="text" name="Last_Name" id="Last_Name" required><br>
            <!-- Making input and disabling it and printing the full name using JS-->
            Full Name: <input type="text" name="Full_Name" id="Full_Name" disabled><br>
            <!-- Adding an input field which will input phone number -->
            Phone Number: <input type="tel" name="ph_no" id="ph_no" value="+91">
            <!-- Adding an input field which will input email -->
            Email: <input type="text" name="email" id="email" placeholder="abc@xyz.com">
            <!-- File Upload -->
            <input type="file" name="image"><br>
            <!-- Adding text area which accept subject and marks -->
            Marks: <textarea name="marks" id="marks" rows="4" cols="25"></textarea><br>
            <!-- Submit -->
            <input type="submit"><br>
            <?php
            // Including form.php file which contains the backend(logic).
            include 'form.php';
            ?>
            </form>
        </div>
    </div>
    
    <!-- Linking Javascript -->
    <script src="./concat.js"></script>
</body>     
</html>