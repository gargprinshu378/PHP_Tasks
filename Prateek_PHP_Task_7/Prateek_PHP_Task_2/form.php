<?php 
// Creating class named form
class form{
    // Creating variables
    public $fname;
    public $lname;
    public $fullname;
    public $image;
    public $image_class;

    // Creating the construct function to initialize the variables

    function __construct($fname,$lname,$image,$image_class)
    {
        // Initializing variables
        $this->fname=$fname;
        $this->lname=$lname;
        $this->fullname=$fname . " " . $lname;
        $this->image=$image;
        $this->image_class=$image_class;

    }

    // Creating function to check that the input field should contain only names and spaces
    function valid_condition(){
        if(!preg_match('/^[a-zA-Z]+$/' , $this->fname) or !preg_match('/^[a-zA-Z]+$/' , $this->lname)){
            echo "Invalid Input";
        }
        else{
            echo "Hello $this->fullname"."<br/>";
        }
    }

    // File uploading to the server and printing it

    function img(){
        if(move_uploaded_file($this->image_class,"./Pictures/".$this->image)){
            echo "<img src='./Pictures/".$this->image."'>"."<br/>";
        }
        else{
            echo "Error! Not Uploaded the file."."<br/>";
        }
    }
}

// applying isset to show the output after clicking the submit button

if (isset($_POST['First_Name']) && isset($_POST['Last_Name'])){
    $image=$_FILES['image']['name'];
    $image_class=$_FILES['image']['tmp_name'];
    $fname=$_POST["First_Name"];
    $lname=$_POST["Last_Name"];
    $obj = new form($fname,$lname,$image,$image_class);
    // getting the file uploaded
    if(isset($_FILES["image"])){
        $obj->img();
        $obj->valid_condition();
    }
    else{
        $image=null;
        $image_class=null;
        $obj->valid_condition();
    }
   
}
?>