<?php
if($_SERVER["request_method"]=="POST"){
    $full_name= filter_var($_POST["full_name"],FILTER_SANITIZE_STRING);
    $phone=filter_var($_POST["phone"],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"],FILTER_SANITIZE_STRING);
    $subject=filter_var($_POST["subject"],FILTER_SANITIZE_STRING);
    $message=filter_var($_POST['message'],FILTER_SANITIZE_STRING);

    if(empty($full_name)||empty($phone)||empty($email)||empty($subject) ||empty($message)){
         echo "All fields are required";
            
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo"Invalid email format";
    }
    else{
        $servername="your_servername";
        $username="your_username";
        $password="PASSWORD";
        $dbname='your_database';

        $conn= new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error){
            echo 'Connection failed: '.$conn->connect_error;
        }
     $ip_add = $_SERVER["Remote_addr"];
     $timestamp= date("Y-m-d H:i:s");
     $sql= "INSERT INTO contact_form(full_name, phone, email, subject, message, ip_address, timestamp)
     VALUES('$full_name', '$phone','$email' ,'$subject',' $message', '$ip_add', '$timestamp') ";

     if($conn->query($sql)===TRUE){
        echo "Form Submitted Successfully!";
     }
     else{
        echo "Error" . $sql . ",<br>" .$conn->error;
     }
     $conn->close();
}
}
?>