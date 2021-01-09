<?php 
	
	$conn = mysqli_connect("localhost","root","","myportfolio");

	if($conn === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$name = mysqli_real_escape_string($conn,$_REQUEST['name']);
	$gender = mysqli_real_escape_string($conn,$_REQUEST['gender']);
    $subject = mysqli_real_escape_string($conn,$_REQUEST['subject']);
    $phone = mysqli_real_escape_string($conn,$_REQUEST['phone']);
    $email = mysqli_real_escape_string($conn,$_REQUEST['email']);
    $message = mysqli_real_escape_string($conn,$_REQUEST['message']);
    $checkbox1 = $_POST['dev'];
    $chk="";  
    if(is_array($checkbox1) || is_object($checkbox1)){
        foreach($checkbox1 as $chk1)  
       {  
          $chk.= $chk1.",";  
       }  
    }
    $query = "INSERT INTO contact(name,gender,subject,work,phone,email,message) VALUES('$name','$gender','$subject','$chk','$phone','$email','$message')";
    if(mysqli_query($conn, $query)){
    	echo '<script>alert("Data Added Successfully")</script>';
        echo "<script>location.href = 'social_media.html';</script>";
    }
    else{
    	echo '<script>alert("Data Failed or Error in query")</script>';
    }
    mysqli_close($conn);
 ?>