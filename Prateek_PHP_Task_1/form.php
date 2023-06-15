<?php 
// Creating class named form
class form{
    // Creating variables
    public $fname;
    public $lname;
    public $fullname;

    // Creating the construct function to initialize the variables
    function __construct($fname,$lname)
    {
        // Initializing variables
        $this->fname=$fname;
        $this->lname=$lname;
        $this->fullname=$fname . " " . $lname;
    }

    // Creating function to check that the input field should contain only names and spaces
    function valid_condition(){
        if(!preg_match('/^[a-zA-Z]+$/' , $this->fname) or !preg_match('/^[a-zA-Z]+$/' , $this->lname)){
            echo "Invalid Input";
        }
        else{
            echo "Hello $this->fullname";
        }
    }
}

// applying isset to show the output after clicking the submit button
if (isset($_POST['First_Name']) && isset($_POST['Last_Name'])){
    $fname=$_POST["First_Name"];
    $lname=$_POST["Last_Name"];
    //Creating an object named obj of class form
    $obj= new form($fname,$lname);
    $obj->valid_condition();
   
}
?>

