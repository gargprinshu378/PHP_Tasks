$ (document).ready(function() {
    $('#First_Name, #Last_Name').on('input',function(){
        // Taking value of first name
        var fname= $('#First_Name').val();
        // Taking value of last name
        var lname= $('#Last_Name').val();
        //Concatenating the first and last name
        var fullname= fname + " " + lname;
        // Storing the full name value into the Full_Name ID
        $('#Full_Name').val(fullname);
    });
});