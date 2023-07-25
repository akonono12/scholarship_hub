<?php

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

$sql = "SELECT * FROM apply_scholar WHERE agency_id='$_SESSION[id_company]' AND  Applicant_id='$_GET[id]' AND scholar_id='$_GET[id_jobpost]'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
$appid=$rows['AppSc_id'];
if($result->num_rows == 0) 
{
  header("Location: index.php");
  exit();
}


$sql = "UPDATE apply_scholar SET status='2' WHERE AppSc_id = '$appid'";
if($conn->query($sql) === TRUE) {
	header("Location: job-applications.php");
	exit();
}

?>