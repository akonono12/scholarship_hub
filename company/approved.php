<?php
include ( "../src/NexmoMessage.php" );
//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files  
require_once("../db.php");

$sql = "SELECT * FROM apply_scholar inner join agency on apply_scholar.agency_id = agency.Agency_id WHERE apply_scholar.agency_id='$_SESSION[id_company]' AND  Applicant_id='$_GET[id]' AND scholar_id='$_GET[id_jobpost]'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
$appid=$rows['AppSc_id'];
$add=$rows['Agency_Address'];
if($result->num_rows == 0) 
{
  header("Location: index.php");
  exit();
}


$sql = "UPDATE apply_scholar SET status='3' WHERE AppSc_id = '$appid'";
if($conn->query($sql)) {
//get applicant data to notify-sms	
$selapp="Select * from applicant where Applicant_id = '$_GET[id]' ";
$resultt=$conn->query($selapp);
$rowss=$resultt->fetch_assoc();
$name= $rowss['Fname'] ." " .$rowss['Lname'];
$numbers = (string)$rowss['con_no'];
$number= '+63'.$numbers;
if($rowss['gender']=="Male"){
                   $msg="Hello Mr. " . $name ." You are one of the qualified applicant(s).Please visit our Agency.Located in this address ".  $add. " <br> Thank you";	
}else{
                    $msg="Hello Ms." . $name . "You are one of the qualified applicant(s).Please visit our Agency.Located in this address ".  $add. " <br> Thank you";	
}
	
	

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('f670c45e', 't0lxRNohKmJai3de');
	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( $number, 'MyApp', $msg );
	// Step 3: Display an overview of the message
	echo $nexmo_sms->displayOverview($info);
	header("Location: job-applications.php");
	exit();

}

?>