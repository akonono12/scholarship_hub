<?php

//To Handle Session Variables on This Page
session_start();


//If user Not logged in then redirect them back to homepage. 
//This is readonly ="enabled" if user tries to manually enter view-job-post.php in URL.
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files  
require_once("../db.php");

$sql = "SELECT * FROM apply_scholar WHERE agency_id='$_SESSION[id_company]' AND Applicant_id='$_GET[appid]' and scholar_id='$_GET[idb]'";
$result = $conn->query($sql);
$rows=$result->fetch_assoc();
if($rows['status'] == '0'){
	$status="Pending";
}elseif($rows['status'] == '1'){
	$status="Rejected";
}elseif($rows['status'] == '2'){
	$status="Under Review";
}elseif($rows['status'] == '3'){
	$status="Approved";
}
if($result->num_rows == 0) 
{
  
  exit();
}

if($_GET['opid']=='1'){
	$class1 = 'class="active"';
	$class2 = '';
	$link1= 'href="under-review.php?';
	$name1= 'Mark Under Review';
	$link2= 'job-applications.php';
}else{
	$class1 = '';
	$class2 = 'class="active"';
    $link1= 'href="under-review.php?';
	$name1= 'Approved';
	$link1= 'href="approved.php?';
	$link2= 'dss.php';
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Scholarship Hub</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>P</span>
      <!-- logo for regular state and mobile devices -->
<span class="logo-lg"><b>Scholarship</b> Hub</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                  
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="edit-company.php"><i class="fa fa-tv"></i> Agency</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Scholarship Post</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Scholarship Post</a></li>
                  <li <?php echo $class1;?>><a href="job-applications.php"><i class="fa fa-file-o"></i> Scholarship Application</a></li>
                  <li <?php echo $class2;?>><a href="dss.php"><i class="glyphicon glyphicon-tasks"></i> Scholarships ended</a></li>  
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <div class="row margin-top-20">
              <div class="col-md-12">
              <?php
               $sql = "SELECT * FROM applicant WHERE Applicant_id='$_GET[appid]'";
                $result = $conn->query($sql);

                //If Job Post exists then display details of post
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) 
                  {
                ?>
                <div class="pull-left">
                  <h2><b><i><?php echo $row['Fname']. ' '.$row['Lname']; ?></i></b></h2>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $link2;?>" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div>
                  <?php
				    echo 'Contact Number: '.$row['con_no'];
                    echo '<br>';
                    echo 'Email: '.$row['email_add'];
                    echo '<br>';
                    echo 'Address: '.$row['address'];
                    echo '<br>';
					 echo 'Status: '.$status;
					 echo '<br>';
                    echo '<a href="#Modal" data-toggle="modal">
                <button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon" aria-hidden="true"></span> Grades</button>
            </a>';
			        echo '<a href="#ModalApp" data-toggle="modal">
                <button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon" aria-hidden="true"></span> Application</button>
            </a>';
			   echo '<a href="#Modaldocs" data-toggle="modal">
                <button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon" aria-hidden="true"></span> Documents</button>
            </a>';
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';
                  ?>
				   <!-- Modal -->
				   
  <div class="modal fade" id="Modaldocs" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          <h4 class="modal-title">Documents</h4>
		  
        </div>
        <div class="modal-body">
		
		<div class="container-fluid">


	 <?php $seldocc="SELECT * FROM `docreq` where app_id ='$_GET[appid]' and scholar_id='$_GET[idb]' ";
		$ddds=$conn->query($seldocc);
		while($rows1=$ddds->fetch_assoc()){?>
						   <div class="form-row">
                              <div class="form-group col-md-3">
                                  <span> <li><?php echo $rows1['doc_req'];?><br> </span>
                              </div>
                              <div class="form-group col-md-7">
                               <?php echo'<a target="_blank" href="view.php?id='.$rows1['doc_id'].'">'.$rows1['name'].'</a></li>';?>
                              </div>
                            </div>
						  
						  <?php }?>	
  
		</div>
          
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>				   
				   
				   
  <div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          <h4 class="modal-title">Grades</h4>
		  
        </div>
        <div class="modal-body">
		
		<div class="container-fluid">
		 
		<div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Subject Name</th>
                      <th>Grades</th>
                      <th>Units</th>
                    </thead>
                    <tbody>
                   <?php
				   
				 
					
                       $sql = "SELECT * from grades where app_id='$_GET[appid]' and scholar_id='$_GET[idb]'";
					   
                            $result = $conn->query($sql);
				            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) 
                              {     

                               
                      ?>
                      <tr>
                        <td><?php echo $row['Subject_name'] ; ?></td>
                        <td><?php echo $row['Subject_Grade']; ?></td>
                        <td><?php echo $row['Subject_Units']?> </td>
						
                      </tr>

                      <?php

                        }
                      }
                      ?>

                    </tbody>                    
                  </table>
                </div>
  
		</div>
          
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
   <div class="modal fade" id="ModalApp" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          <h4 class="modal-title">Application Form</h4>
		  
        </div>
        <div class="modal-body">
		
		<div class="container-fluid">
		
		<?php 
		//fetch agency name
		$selc="Select * from agency where Agency_id=$_SESSION[id_company]";
		$resss=$conn->query($selc);
		$rowsss=$resss->fetch_assoc();
		
		
		//fetch all application data
		$selfetch="SELECT * FROM apply_scholar inner join application_form on application_form.Applictn_id = apply_scholar.Application_id where apply_scholar.agency_id= $_SESSION[id_company] and apply_scholar.scholar_id = $_GET[idb] and apply_scholar.Applicant_id = $_GET[appid] ";
		$resfetch=$conn->query($selfetch);
		$fetch=$resfetch->fetch_assoc();
		
		
		?>
		 
		     <!-- Default box -->
      <div class="box" style="margin-top:40px;">
        
        <div class="box-body">
 <!--FORM-->
          
            <div class="box-body">
              <div id="sub_error">
            </div>
            <h5><b><span class="fa fa-file-text"></span>&nbsp;&nbsp;PERSONAL INFORMATION</b></h5>
            <hr/>
            
              <div class="form-row">
                <div class="form-group col-md-4">
                  <span for="lastname">Last Name <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="lastname" name="lname" value= "<?php echo $fetch['Lname'];?>" placeholder="" readonly ="enabled">
                </div>
                <div class="form-group col-md-4">
                  <span for="firstname">First Name <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="firstname" name="fname" value= "<?php echo $fetch['Fname'];?>" placeholder="" readonly ="enabled">
                </div>
                <div class="form-group col-md-4">
                  <span for="middlename">Middle Name <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="middlename" name="mname" value= "<?php echo $fetch['Mname'];?>" placeholder="" readonly ="enabled">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <span for="birthdate">Date of Birth <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="birthdate" name="bday" placeholder="" value= "<?php echo $fetch['Dob'];?>" readonly ="enabled">
                </div>
                <div class="form-group col-md-4">
                  <span for="birthplace">Place of Birth <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="birthplace" name="bplace" placeholder="" value= "<?php echo $fetch['Pob'];?>" readonly ="enabled">
                </div>
                <div class="form-group col-md-2">
                  <span for="sex">Sex <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="sex" name="sex" placeholder="" readonly ="enabled" value="<?php 
				  if ($fetch['gender'] == 'M'){
					  echo "Male" ;	
				  }else{
				  echo "Female" ;		}			  
				  
				  ?>">
                   
                  
                </div>
                <div class="form-group col-md-3">
                  <span for="province">Province <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="province" name="province" placeholder="" value= "<?php echo $fetch['province'];?>" readonly ="enabled">
                    
                </div>
              </div>
        
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <span for="street">Street/Barangay <span class="text-danger"></span></span>
                      <input type="text" class="form-control" id="street" name="street" placeholder="" value= "<?php echo $fetch['barangay'];?>" readonly ="enabled" >
                    </div>
                <div class="form-group col-md-4">
                  <span for="town">Town <span class="text-danger"></span></span>
				  <input type="text" class="form-control" id="town" name="town" placeholder="" value= "<?php echo $fetch['town'];?>" readonly ="enabled">
                 
                    
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <span for="dist">District <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="district" name="district" placeholder="" value= "<?php echo $fetch['district'];?>" readonly ="enabled">
				 
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-2">
                      <span for="zip">Zip Code <span class="text-danger"></span></span>
                      <input type="text" class="form-control" id="zip" name="zip" placeholder="" value= "<?php echo $fetch['zip_code'];?>" readonly ="enabled">
                    </div>
                  <div class="form-group col-md-3">
                      <span for="contact">Contact No. <span class="text-danger"></span></span>
                      <input type="number" class="form-control" id="contact" name="contactno" placeholder="" value= "<?php echo $fetch['con_no'];?>" readonly ="enabled">
                  </div>
                  <div class="form-group col-md-5">
                      <span for="email">Email <span class="text-danger"></span></span>
                      <input type="email" class="form-control" id="email" name="email" placeholder=""  value= "<?php echo $fetch['email_add'];?>" readonly ="enabled">
                  </div>
                    <div class="form-group col-md-2">
                      <span for="sibling">No. of Siblings <span class="text-danger"></span></span>
                      <input type="number" class="form-control" id="sibling" name="sibling" placeholder="" value= "<?php echo $fetch['num_sib'];?>" readonly ="enabled" />
                    </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-5">
                      <span for="fb">Facebook Account <span class="text-danger"></span></span>
                      <input type="text" class="form-control" id="fb" name="fb" placeholder="Email/Phone/Username/Name"  value= "<?php echo $fetch['fb_acc'];?>" readonly ="enabled" >
                    </div>
                 
              </div>
            </div>

            <div class="box-body">
                    <h5><b><span class="fa fa-users"></span>&nbsp;&nbsp;FAMILY BACKGROUND</b></h5>
                    <hr/>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">FATHER </label><br/>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="fathername">Complete Name <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="fathername" name="fathername" placeholder="" value= "<?php echo $fetch['F_Name'];?>" readonly ="enabled" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <span for="fatherocc">Occupation <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="fatherocc" name="fatherocc" placeholder="" value= "<?php echo $fetch['F_Occ'];?>" readonly ="enabled" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="fatheradd">Address <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="fatheradd" name="fatheradd" placeholder="" value= "<?php echo $fetch['F_Address'];?>" readonly ="enabled">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="fatheredu">Educational Attainment <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="fatheredu" name="fatheredu" value= "<?php echo $fetch['F_attain'];?>" placeholder="" readonly ="enabled">
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">MOTHER <span class="text-danger"></span></label><br/>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="mothername">Complete Name <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="mothername" name="mothername" placeholder="" value= "<?php echo $fetch['M_name'];?>" readonly ="enabled" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <span for="motherocc">Occupation <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="motherocc" name="motherocc" placeholder=""  value= "<?php echo $fetch['M_Occ'];?>" readonly ="enabled" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="motheradd">Address <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="motheradd" name="motheradd" placeholder="" value= "<?php echo $fetch['M_add'];?>" readonly ="enabled" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="motheredu">Educational Attainment <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="motheredu" name="motheredu" placeholder="" value= "<?php echo $fetch['M_attain'];?>" readonly ="enabled">
                                        </div>
                                    </div>
                                    
                                </div>
                                  
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="">GUARDIAN <span class="text-danger"></span></label><span style="font-size:11px;"><i>&nbsp;(if applicable)</i></span><br/>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <span for="guardianname">Complete Name <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="guardianname" name="guardianname" placeholder="" value= "<?php echo $fetch['G_name'];?>" readonly ="enabled">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <span for="guardianocc">Occupation <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="guardianocc" name="guardianocc" placeholder="" value= "<?php echo $fetch['G_Occ'];?>" readonly ="enabled">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="guardianadd">Address <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="guardianadd" name="guardianadd" placeholder="" value= "<?php echo $fetch['G_Addres'];?>" readonly ="enabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">FAMILY/GUARDIAN'S INCOME <span class="text-danger"></span></label><br/>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="income">PARENT'S/GUARDIAN ANNUAL GROSS INCOME <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="income" name="income" placeholder="" value= "<?php echo $fetch['Fam_grinc'];?>" readonly ="enabled" >
                                        </div>
                                    </div>
                                </div>

                            </div>

                </div>
                    <div class="box-body">
                     <h5><b><span class="fa fa-graduation-cap"></span>&nbsp;&nbsp;ACADEMIC INFORMATION</b></h5>
                      <hr/>
                      <div class="box-body">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <span for="apptype">Applicant's Type <span class="text-danger"></span></span>
                                    <input type="text" class="form-control" id="apptype" name="apptype" readonly ="enabled" value="<?php 
				  if ($fetch['app_type'] == 'A'){
					  echo "HS/Senior High Graduate" ;	
				  }elseif($fetch['app_type'] == 'B'){
				  echo "Graduating Senior High" ;		
				  }elseif($fetch['app_type'] == 'C'){
				  echo "With Earned Units" ;
				  }elseif($fetch['app_type'] == 'D'){
				  echo "ALS" ;		
				  }elseif($fetch['app_type'] == 'E'){
				  echo "PEPT" ;		
				  }
				  
				  
				  ?>" >
                                       
                                   
                                </div>
                                <div class="form-group col-md-2">
                                    <span for="year">Year Level <span class="text-sm" id="lbl_yrin"></span> <span class="text-danger"></span></span>
                                    <input type="text"  class="form-control" id="year" name="year" placeholder="" value= "<?php echo $fetch['year_level'];?>" readonly ="enabled" >
                                    
                                </div>
                                <div class="form-group col-md-2">
                                    <span for="gwa">GWA <span class="text-danger"></span></span>
                                    <input type="text" class="form-control" id="gwa" name="gwa" placeholder="" readonly ="enabled" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <span for="hs">High School Graduated <span class="text-danger"></span></span>
                                    <input type="text" class="form-control" id="hs" name="hs" placeholder="" value= "<?php echo $fetch['hs_grad'];?>" readonly ="enabled" >
                                </div>
                                
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group ">
                                    <span for="college">College/University <span class="text-danger"></span></span>
                                    <input type="text" class="form-control select2" id="college" name="college" placeholder="" value= "<?php echo $fetch['college'];?>" readonly ="enabled" >

                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span for="course">Current Course/Course to take <span class="text-danger"></span></span>
                                    <input type="text" class="form-control select2" id="course" name="course" placeholder="" value= "<?php echo $fetch['cur_course'];?>" readonly ="enabled" >
                                        
                                </div>
                                <style>
                                  .hidden{
                                    display:none;
                                  }
                                </style>
                                
                                <div class="form-group col-md-6">
                                    <span for="course">Non Priority Courses <span class="text-danger"></span></span>
                                    <select class="form-control select2" disabled id="npcourse" name="npcourse" placeholder="" >
                                        <option></option>
                                                                           </select>
                                </div>
                            </div>
                          </div>
                        </div>
                      

                   
                  
                      <span><i>I hereby certify that the information provided in this application is true and accurate and contains no false or misleading statements to the best of my knowledge. Any information found later to be false and inaccurate shall be a ground for the disapproval or cancellation of my application and/or award. Further, I understand that the documents submitted herein automatically become the property of <?php echo $rowsss['Agency_Name'];?>.</i></span>
                    </div>
                    <div class="col-md-2">
                      <br/>
					 <form method="Post" action="download.php?idb=<?php echo $_GET['idb'];?>&appid=<?php echo $_GET['appid'];?>">
					 <button type="submit" id="submit"  name="download" class="btn btn-primary btn-block">Download</button>
                  </form>
                    </div>
                   
                  
          <!--END FORM-->

        </div>
		 
		 
		 
		 
		
  
		</div>
          
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
                  <div class="row">
                  
					<div class="col-md-3 pull-left">
                      <a <?php echo $link1;?>id=<?php echo $_GET['appid']; ?>&id_jobpost=<?php echo $_GET['idb']; ?>" class="btn btn-success"><?php echo $name1;?></a>
                    </div>
                    <div class="col-md-3 pull-right">
                      <a href="reject.php?id=<?php echo $_GET['appid']; ?>&id_jobpost=<?php echo $_GET['idb']; ?>" class="btn btn-danger">Reject Application</a>
                    </div>
                  </div>
                </div>

                <div>
                </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>


    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2016-2017 <a href="learningfromscratch.online">Job Portal</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

</body>
</html>