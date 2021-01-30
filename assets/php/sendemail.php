<?php

	$name = @trim(stripslashes($_POST['name'])); 
	$email = @trim(stripslashes($_POST['email']));  
	$subject = @trim(stripslashes($_POST['subject']));  
	$message = @trim(stripslashes($_POST['message'])); 

	$email_from = $email;
	$email_to = 'fajarsub06@gmail.com'; //replace with your email

	$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

	$success = @mail($email_to, $body, 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message);

	$con = mysqli_connect("localhost","root","","db_cv");

	  if(isset($_POST['submit'])){
	    $sql = "INSERT INTO tb_contact VALUES ('','$_POST[name]','$_POST[email]', '$_POST[subject]', '$_POST[message]')";
	    $query = mysqli_query($con, $sql);
	    if($query){
	      echo "Berhasil";
	    }else{
	      echo "G";
	    }
	  }
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<script>alert("Thank you for contact me.");</script>
	<meta HTTP-EQUIV="REFRESH" content="0; url=http://fajarsubeki06.blogspot.com"> 
</head>