
<?php 
session_start();


if(isset($_POST["item_name"]))
{echo"sss <br>";
 $connect = new PDO("mysql:host=localhost;dbname=scholarhub", "root", "");
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
 {echo"sss ssss<br>";
	 
$selsubj=$connect->query("SELECT sum(grades.Subject_Units * grades.Subject_Grade) as totalpoints, sum(grades.Subject_Units) as totalunits FROM `grades` WHERE grades.app_id = '$_SESSION[id_user]' and scholar_id ='$_GET[id]' ");
$rows= $selsubj->fetch(); 

$gwa=$rows['totalpoints']/$rows['totalunits'];
 $app_id=$_SESSION['id_user'];
 echo $app_id;
$upd="Update apply_scholar set  gwa='$gwa' where Applicant_id = '$app_id'  ";
$results=$connect->prepare($upd);
if($results->execute()){
echo "hello";

 
}
 }
}
?>