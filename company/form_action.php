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
	
	$quota = mysqli_real_escape_string($conn, $_POST['slots']);
	$deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
	
	$subj = mysqli_real_escape_string($conn, $_POST['subtype']);
	$apptype = mysqli_real_escape_string($conn, $_POST['appt']);
    $angency_id=$_SESSION['id_company'];

	$stmt = "INSERT INTO post_scholar(agency_id, desc_scholar,  Quota_applicant, deadline, Subject_type,applicant_type) VALUES ('$angency_id','$description',   '$quota', '$deadline','$subj','$apptype' )";
    if($conn->query($stmt)){
     $selquery="SELECT * FROM `post_scholar` order by scholar_id DESC ";
	 if($sel=$conn->query($selquery)){
	 $row=$sel->fetch_assoc();
     $scholar_id=$row['scholar_id'];
	for($count = 0; $count < count($_POST["Req"]); $count++){ 
	$scholarid=$scholar_id;
	$agencyid=$_SESSION['id_company'];
	$name=$_POST["Req"][$count];
	$points=$_POST["points"][$count];
	$desc=$_POST["desc"][$count];
	
	 $insert=$conn->query("INSERT INTO post_req(Req_Name,Req_points,Req_desc,Post_id,Agency_id)values('$name','$points','$desc','$scholarid','$agencyid')");
	
	}

	if(isset($insert)){
	$_SESSION['jobPostSuccess'] = true;
		header("Location: index.php");
		exit();
	 }
	 }
	}
	$conn->close();

} else {
	//redirect them back to dashboard page if they didn't click Add Post button
	header("Location: create-job-post.php");
	exit();
}