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
    public $ph_no;
    public $email;
    
    // Creating the construct function to initialize the variables

    function __construct($fname,$lname,$image,$image_class,$marks,$ph_no,$email)
    {
        // Initializing variables
        $this->fname=$fname;
        $this->lname=$lname;
        $this->fullname=$fname . " " . $lname;
        $this->image=$image;
        $this->image_class=$image_class;
        $this->marks=$marks;
        $this->ph_no=$ph_no;
        $this->email=$email;
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

    function subject_marks_table(){
         //will break it into arrays when line breaks
         $marks=explode("\n", $this->marks);
         $m_array = array();
        foreach ($marks as $val) {
            $subject = explode('|', $val)[0];
            $marks = explode('|', $val)[1];
            $m_array[$subject] = $marks;
        }
        return $m_array;
    }

    // Creating a function which will take the text in the form of array and arrange it.
    function subject_marks(){
       
        // Creating a table with heading subject and marks
        echo "<table border=2>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
            </tr>";
        // Iterating through the text and arranging in the form of a table
        foreach($this->subject_marks_table() as $subject=>$marks){
            //Breaking the text into array when | comes
            // Arranging into tables
            echo "<tr>
                <td>$subject</td>
                <td>$marks</td>
                </tr>";
        }
        echo "</table>";
    }

    // Creating a function which will validate whether the phone number entered is correct or not.
    function valid_phno(){
        if(preg_match('/^[+]{1}[9]{1}[1]{1}[0-9]{10}+$/' , $this->ph_no)) {
        echo "Phone Number "."$this->ph_no"."<br/>";
        } 
        else {
        echo "Invalid Phone Number!"."<br/>";
        }
    }

    // Creating a function which will validate the email
    function valid_email(){

        // API which will validate whether the input email is valid or not
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=$this->email",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: text/plain",
            "apikey: QLxAWdbSxiIjNnPNOL2pzElf5Er2Jbho"
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        // Decoding the json code
        $decode=json_decode($response,true);

        // Applying the condition to validate email
        if($decode["format_valid"]==true && $decode["smtp_check"]==true){
            echo "Valid email: "."$this->email"."<br/>";
        }
        else{
            echo "Invalid email"."<br/>";
        }
    }

    function download_file(){
        $myfile = fopen("File-upload/".$this->ph_no.".doc", "w") or die("Unable to open file!");
        $txt = "Hello $this->fullname\n";
        fwrite($myfile, $txt);
        $txt="Phone Number: $this->ph_no\n";
        fwrite($myfile, $txt);
        $txt="Email: $this->email\n";
        fwrite($myfile,$txt);
        $txt = "Subject | Marks" ."\n";
        fwrite($myfile, $txt);
        foreach ($this->subject_marks_table() as $subject => $marks) {
            $txt = " ".$subject . " | " . $marks. "\n" ;
            fwrite($myfile, $txt);
        }
        fclose($myfile);

        echo "<a download=" . $this->ph_no. " href=" . "File-upload/".$this->ph_no.".doc" . ">Download</a><br/>";
    }

    function echo_download(){
        // $myfile = fopen("File-upload/".$this->ph_no.".doc", "r") or die("Unable to open file!");
        // echo fread($myfile,filesize("File-upload/".$this->ph_no.".doc"));
        // fclose($myfile);

        $lines = file("File-upload/".$this->ph_no.".doc");
        foreach($lines as $l) {
            echo "$l <br/>";
        }
    }
    

}

// applying isset to show the output after clicking the submit button

if (isset($_POST['First_Name']) && isset($_POST['Last_Name'])){
    $image=$_FILES['image']['name'];
    $image_class=$_FILES['image']['tmp_name'];
    $fname=$_POST["First_Name"];
    $lname=$_POST["Last_Name"];
    $marks=$_POST["marks"];
    $ph_no=$_POST["ph_no"];
    $email=$_POST["email"];
    $obj = new form($fname,$lname,$image,$image_class,$marks,$ph_no,$email);
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

    if(isset($_POST["ph_no"])){
        $obj->valid_phno();
    }

    if(isset($_POST["email"])){
        $obj->valid_email();
    }

    $obj->download_file();
    $obj->echo_download();
   
}
?>