<?php
  $fname=$_POST["fname"];
  $lname=$_POST["lname"];
  $dob=$_POST["dob"];
  $gender=$_POST["gender"];
  $address=$_POST["address"];
  $contect_no=$_POST["contect_no"];
  $email_id=$_POST["email_id"];
  $password=$_POST["password"];

  //database connection
  $conn=new mysqli('localhost','root','','test1');
  if($conn->connect_error){
    echo "error"
    die('connection failed :' $conn->connection_error);
  }else{
    $stmt=$conn->prepare("insert into register(fname,lname,dob,gender,address,contact_no,email_id,password) value(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssississ",$fname,$lname,$dob,$gender,$address,$contect_no,$email_id,$password);
    $stmt->execute();
    echo "registration successfull....";
    $stmt->close();
    $conn->close();
  }
?>