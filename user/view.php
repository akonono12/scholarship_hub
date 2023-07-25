<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 


require_once("../db.php");

$seldocc="SELECT * FROM `docreq` where doc_id ='$_GET[id]' ";
		$ddds=$conn->query($seldocc);
		$rows1=$ddds->fetch_assoc();
header("content-type:".rows1['filetype']);
echo rows1['data'];


?>