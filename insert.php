
<?php 
session_start();
 $connect = new PDO("mysql:host=localhost;dbname=scholarhub", "root", "");







if(isset($_POST['item_name']))
{
	
	
	
	$fname=$_POST['fname'];	
$mname=$_POST['mname']; 
$lname=$_POST['lname'];	
$dob=$_POST['bday']; 
$pob=$_POST['bplace']; 
$gender=$_POST['sex']; 
$prov=$_POST['province']; 
$bar=$_POST['street']; 
$town=$_POST['town']; 
$distr=$_POST['district']; 
$zip=$_POST['zip']; 
$cont=$_POST['contactno']; 
$email=$_POST['email']; 
$sibs=$_POST['sibling']; 
$fb=$_POST['fb']; 
$father_name=$_POST['fathername']; 
$focc=$_POST['fatherocc']; 
$fadd=$_POST['fatheradd']; 
$fatatt=$_POST['fatheredu']; 
$fatherStat=$_POST['fatherstatus'];  
$motname=$_POST['mothername']; 
$mocc=$_POST['motherocc']; 
$madd=$_POST['motheradd']; 
$matt=$_POST['motheredu']; 
$mstat=$_POST['motherstatus']; 
$Gname=$_POST['guardianname']; 
$Gocc=$_POST['guardianocc']; 
$Gadd=$_POST['guardianadd']; 
$Fincome=$_POST['income']; 
$apptype=$_POST['apptype']; 
$yrlvl=$_POST['year']; 
 
$hsgrad=$_POST['hs']; 
$college=$_POST['college']; 
$curcourse=$_POST['course'];


$valid_formats_server = array(
	"image/jpeg",
	"image/png",
	
	"application/pdf"

);
 
//prevent uploading of wrong file types 

	if(!in_array($_FILES['myfile']['type'], $valid_formats_server)){
		$message= $_FILES['myfile']['name']  . " is the wrong file type .<br>";
		$message = "Please make sure all uploads are of the correct file type (jpeg, jpg, png, gif, pdf)";
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('<?php echo $message;?>' );
    window.location.href='application_form.php?id=".$_GET['id']."';
    </script>");
	}else{
		$continue = 1;
if(isset($_FILES['mydocs'])){
    for($a = 0; $a < count($_FILES['mydocs']['name']); $a++){
	if(!in_array($_FILES['mydocs']['type'][$a], $valid_formats_server)){
	$message = $_FILES['fileToUpload']['name'][$a]  . " is the wrong file type .";
	$message = "Please make sure all uploads are of the correct file type (jpeg, jpg, png, gif, pdf)";
	$continue = 0;
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('<?php echo $message;?>' );
    window.location.href='application_form.php?id=".$_GET['id']."';
    </script>");
    }
}}
if($continue == 1){
 $names=$_FILES['myfile']['name'];

	$types=$_FILES['myfile']['type'];
	 $datas=addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
	 $reqname=$_POST['report'];
	 $appid=$_SESSION['id_user'];
	 $scholar_id=$_GET['id'];
	$insertss=$connect->prepare("INSERT INTO docreq(name, filetype, data, app_id, scholar_id,doc_req) VALUES ('$names','$types','$datas','$appid',' $scholar_id','$reqname')");
		
	
if($insertss->execute()){
if(isset($_FILES['mydocs'])){	
for($i = 0; $i < count($_FILES['mydocs']['name']); $i++){


$upload=$connect->prepare("INSERT INTO `docreq`(`name`, `filetype`, `data`, `app_id`, `scholar_id`,doc_req,	points) VALUES (:name,:type,:data,:appid,:scholar_id, :doc, :points)");

$upload->execute(
array(
   ':name'   => $_FILES['mydocs']['name'][$i],
	':type'   => $_FILES['mydocs']['type'][$i],
    ':data'  => file_get_contents($_FILES['mydocs']['tmp_name'][$i]), 
	':appid'  => $_SESSION['id_user'],
    ':scholar_id' => $_GET['id'],
	':doc' => $_POST['doc'][$i],
	':points' => $_POST['points'][$i]
)
);

}


}

$ins="INSERT INTO application_form ( Fname, Mname, Lname, Dob, Pob, gender, province, barangay, town, district, zip_code, con_no, email_add, num_sib, fb_acc, F_Name, F_Occ, F_Address, F_attain, aliveF, M_name, M_Occ, M_add, M_attain, aliveM, G_name, G_Occ, G_Addres, Fam_grinc, app_type, year_level,  hs_grad, college, cur_course) VALUES ('$fname','$mname','$lname','$dob','$pob','$gender','$prov','$bar','$town','$distr','$zip','$cont','$email','$sibs','$fb','$father_name','$focc','$fadd','$fatatt','$fatherStat','$motname','$mocc','$madd','$matt','$mstat','$Gname','$Gocc','$Gadd','$Fincome','$apptype','$yrlvl','$hsgrad','$college','$curcourse')";	
$result= $connect->query($ins);
if($result){
$sel="SELECT * FROM `application_form` ORDER BY `Applictn_id` DESC";
$selres= $connect->query($sel);
$row=$selres->fetch();
echo $appform_id=$row['Applictn_id']; 
echo $scholar_id=$_GET['id'];
echo $angency_id=$_GET['cid'];
$insApp="INSERT INTO apply_scholar (scholar_id, agency_id, Applicant_id, Application_id, status) VALUES('$scholar_id','$angency_id','$_SESSION[id_user]','$appform_id','0')";
$connect->query($insApp);
	
	
	
}
	




   $app_id = $_SESSION['id_user'];
   $scholar_id=$_GET['id'];
 for($count = 0; $count < count($_POST["item_name"]); $count++){  
  $query = "INSERT INTO grades
  (app_id,scholar_id,Subject_name, Subject_Units, Subject_Grade) 
  VALUES ( :app_id, :scholar_id, :subjname, :units, :grade)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
   ':app_id'   => $app_id ,
	':scholar_id'   => $scholar_id,
    ':subjname'  => $_POST["item_name"][$count], 
	':units'  => $_POST["item_unit"][$count],
    ':grade' => $_POST["item_quantity"][$count]
    
	
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
	 
$selsubj=$connect->query("SELECT sum(grades.Subject_Units * grades.Subject_Grade) as totalpoints, sum(grades.Subject_Units) as totalunits FROM `grades` WHERE grades.app_id = '$_SESSION[id_user]' and scholar_id ='$_GET[id]' ");

$rows= $selsubj->fetch(); 

 $gwa=$rows['totalpoints']/$rows['totalunits'];
 
 $app_id;
$upd="Update apply_scholar set  gwa='$gwa' where Applicant_id = '$app_id' and scholar_id ='$_GET[id]' ";
$results=$connect->prepare($upd);

if($results->execute()){
	$tlpts=$connect->query("SELECT sum(`points`) as total FROM `docreq` WHERE `scholar_id` ='$_GET[id]' and app_id ='$_SESSION[id_user]'  ");
$row2=$tlpts->fetch();
$row2['total'] ;

	$tt=$connect->query("SELECT * FROM `post_req` WHERE `Req_Name` = 'gwa' and Post_id = '$_GET[id]'");
	$row3=$tt->fetch();
	$gwapts= '0.'.$row3['Req_points'];
    $total=$gwa * $gwapts + $row2['total'];
	$upds="Update apply_scholar set  tl_pts='$total' where Applicant_id = '$_SESSION[id_user]' and scholar_id ='$_GET[id]' ";
    $resultss1=$connect->prepare($upds);
	if($resultss1->execute()){
			header("location:index.php");
	}

 }
}
}
}
}
}

?>