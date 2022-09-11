<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$contact no = $_POST["contact no"];
$emai-id = $_POST["email-id"];
for(!empty($fname)||!empty($lname)||!empty($dob)||!empty($gender)||!empty($address)||!empty($contact no)||!empty($email-id)){
    $host ="localhost";
    $dbUsername = "contact us";
    $dbpassword = "";
    $databse = "registration"
     
    //create a connection
    $conn = new mysquli($host, $dbUsername, $dbpassword, $dbname);

    if(mysqli_connect_error()){
        die('Connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }else{
        $SELECT = "SELECT email from register where email = ? Limit 1";
        $INSERT = "INSERT Into register(fname, lname, dob, gender, address, contact no, email-id) value(?,?,?,?,?,?,?,?)";

        //prepare for statement
        $stmt = $conn->prepare($SELECT);
        $stmt->blind_param("s",$email);
        $stmt->execute();
        $stmt->blind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_row;

        if($rnum==0){
            $stmt = $conn->prepare($INSERT);
            $stmt->blind_param("ssicsis",$fname, $lname, $dob, $gender, $address, $contact no, $email-id);
            $stmt->execute();
            echo "New record inserted successfully"; 
        }else{
            echo"Someone already registere using this email";
        }
        $stmt->close();
        $conn->close();
    }
}else{
    echo"All field are required";
    die();
}
?>