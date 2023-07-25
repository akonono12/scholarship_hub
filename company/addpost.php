<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//if user Actually clicked Add Post Button
if(isset($_POST)) {

	// New way using prepared statements. This is safe from SQL INJECTION. Should consider to update to this method when many people are using this method.
   $description = mysqli_real_escape_string($conn, $_POST['description']);
	$maxgwa = mysqli_real_escape_string($conn, $_POST['MaxGWA']);
	$quota = mysqli_real_escape_string($conn, $_POST['slots']);
	$deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
	$docs = mysqli_real_escape_string($conn, $_POST['docs']);
	$subj = mysqli_real_escape_string($conn, $_POST['subtype']);
	$apptype = mysqli_real_escape_string($conn, $_POST['appt']);
    $angency_id=$_SESSION['id_company'];

	$stmt = "INSERT INTO post_scholar(agency_id, desc_scholar, maxGWA, Quota_applicant, deadline,docsreq, Subject_type,	applicant_type) VALUES ('$angency_id','$description',  '$maxgwa', '$quota', '$deadline','$docs ','$subj','$apptype' )";
    if($conn->query($stmt)){


	
	$_SESSION['jobPostSuccess'] = true;
		header("Location: index.php");
		exit();


	}
	$conn->close();

} else {
	//redirect them back to dashboard page if they didn't click Add Post button
	header("Location: create-job-post.php");
	exit();
}