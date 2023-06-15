<?php 
// Creating class named form
class form{
    // Creating variables
    public $fname;
    public $lname;
    public $fullname;
    public $image;
    public $image_class;
    public $marks;

    // Creating the construct function to initialize the variables

    function __construct($fname,$lname,$image,$image_class,$marks)
    {
        // Initializing variables
        $this->fname=$fname;
        $this->lname=$lname;
        $this->fullname=$fname . " " . $lname;
        $this->image=$image;
        $this->image_class=$image_class;
        $this->marks=$marks;

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

    // Creating a function which will take the text in the form of array and arrange it.
    function subject_marks(){
        //will break it into arrays when line breaks
        $marks=explode("\n", $this->marks);
        // Creating a table with heading subject and marks
        echo "<table border=2>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
            </tr>";
        // Iterating through the text and arranging in the form of a table
        foreach($marks as $val){
            //Breaking the text into array when | comes
            $subject=explode("|", $val)[0];
            $marks=explode("|", $val)[1];
            // Arranging into tables
            echo "<tr>
                <td>$subject</td>
                <td>$marks</td>
                </tr>";
        }
        echo "</table>";
    }
    
}

// applying isset to show the output after clicking the submit button

if (isset($_POST['First_Name']) && isset($_POST['Last_Name'])){
    $image=$_FILES['image']['name'];
    $image_class=$_FILES['image']['tmp_name'];
    $fname=$_POST["First_Name"];
    $lname=$_POST["Last_Name"];
    $marks=$_POST["marks"];
    $obj = new form($fname,$lname,$image,$image_class,$marks);
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


    // Calling the function subject_marks() and taking the text from $_POST()
    if(isset($_POST["marks"])){
        $obj->subject_marks();
    }
   
}
?>