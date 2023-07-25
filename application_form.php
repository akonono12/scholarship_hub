<?php 

session_start();
include("db.php");

if(empty($_SESSION['id_user'])) {
	header("Location: index.php");
	exit();
}
?>
<?php
// get agency id using the scholar id
$scholar_id=$_GET['id'];
$sel1="SELECT * FROM post_scholar where scholar_id ='$scholar_id' ";
$result1=$conn->query($sel1);
$row1=$result1->fetch_assoc();
$agency_id=$row1['agency_id'];
$docs=$row1['docsreq'];
$docs=explode(';',$docs);
$subtype=$row1['Subject_type'];
// get agency name using the agency id
$sel2="SELECT * FROM agency where Agency_id ='$agency_id'";
$result2=$conn->query($sel2);
$row2=$result2->fetch_assoc();
//fetch the data of the logged in applicant
$sel3="SELECT * FROM applicant where Applicant_id ='$_SESSION[id_user]' ";
$result3=$conn->query($sel3);
$row3=$result3->fetch_assoc();
$Fname=$row3['Fname'];
$lname=$row3['Lname'];
$age=$row3['age'];
$bdate=$row3['bdate'];
$gender=$row3['gender'];
if($gender == 'Male'){
	$value1= 'Selected';
	$value2= ' ';
}else{
	$value1= '';
	$value2= 'Selected';
}
$contactno=$row3['con_no'];
$emailad=$row3['email_add'];
//fetch requirements
$sel4="SELECT * FROM `post_req` WHERE Req_Name not like '%gwa%' and Req_Name not like '%gpa%' and Post_id = '$scholar_id' ";
$result4=$conn->query($sel4);
?>
<?php



if(isset($_POST['submit'])){
	
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








	
	
	
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		

 </head>

<!-- jQuery 3 -->
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://chedro5stufap.com/assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="http://chedro5stufap.com/assets/adminlte/plugins/iCheck/icheck.min.js"></script>
<!-- DataTables -->
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/buttons.flash.min.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/jszip.min.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/pdfmake.min.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/vfs_fonts.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/buttons.html5.min.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/datatables.net-bs/js/buttons.print.min.js"></script>

<script src="http://chedro5stufap.com/assets/adminlte/dropzone/dist/min/dropzone.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="http://chedro5stufap.com/assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- fullCalendar -->
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/moment/moment.js"></script>
<script src="http://chedro5stufap.com/assets/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>



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
          <li>
            <a href="jobs.php">Scholarship</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login.php">Login</a>
          </li>
          <li>
            <a href="sign-up.php">Sign Up</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="company/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>          
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">
  
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <div class="form-row">
        <div class="col-sm-6"><label>
       Scholarship Application Form </label>
        </div>
        <div class="col-sm-2" style="margin-left:-60px;margin-top:-10px;">
        <input type="text" class="form-control input-lg" id="a_year" name="a_year" value="2019-2020" style="display:none;">
        </div>
        </div>
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box" style="margin-top:40px;">
        
        <div class="box-body">
 <!--FORM-->
         <form method="post" id="insert_form" action="insert.php<?php echo "?id=".$scholar_id."&&cid=".$agency_id ;?>" enctype="multipart/form-data">  
            <div class="box-body">
              <div id="sub_error">
            </div>
            <h5><b><span class="fa fa-file-text"></span>&nbsp;&nbsp;PERSONAL INFORMATION</b></h5>
            <hr/>
            
              <div class="form-row">
                <div class="form-group col-md-4">
                  <span for="lastname">Last Name <span class="text-danger">*</span></span>
                  <input type="text" class="form-control" id="lastname" name="lname" placeholder="" value="<?php echo $lname;?>" required>
                </div>
                <div class="form-group col-md-4">
                  <span for="firstname">First Name <span class="text-danger">*</span></span>
                  <input type="text" class="form-control" id="firstname" name="fname" placeholder="" value="<?php echo $Fname;?>" required>
                </div>
                <div class="form-group col-md-4">
                  <span for="middlename">Middle Name <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="middlename" name="mname" placeholder="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <span for="birthdate">Date of Birth <span class="text-danger">*</span></span>
                  <input type="date" class="form-control" id="birthdate" name="bday" placeholder="" value="<?php echo $bdate;?>" required>
                </div>
                <div class="form-group col-md-4">
                  <span for="birthplace">Place of Birth <span class="text-danger">*</span></span>
                  <input type="text" class="form-control" id="birthplace" name="bplace" placeholder="" required>
                </div>
                <div class="form-group col-md-2">
                  <span for="sex">Sex <span class="text-danger">*</span></span>
                  <select class="form-control" id="sex" name="sex" placeholder=""  required>
                    <option></option>
                    <option value="M" <?php echo $value1;?>>Male</option>
                    <option value="F" <?php echo $value2;?>>Female</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <span for="province">Province <span class="text-danger">*</span></span>
                  <select class="form-control" id="province" name="province" placeholder="" required>
                    <option></option>
                    <option value="Albay">Albay</option>
                    <option value="Camarines Norte">Camarines Norte</option>
                    <option value="Camarines Sur">Camarines Sur</option>
                    <option value="Catanduanes">Catanduanes</option>
                    <option value="Masbate">Masbate</option>
                    <option value="Sorsogon">Sorsogon</option>
                  </select>
                </div>
              </div>
        
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <span for="street">Street/Barangay <span class="text-danger">*</span></span>
                      <input type="text" class="form-control" id="street" name="street" placeholder=""  >
                    </div>
                <div class="form-group col-md-4">
                  <span for="town">Town <span class="text-danger">*</span></span>
				  <input type="text" class="form-control" id="town" name="town" placeholder="" required>
                 
                    
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <span for="dist">District <span class="text-danger">*</span></span>
                  <select class="form-control" id="district" name="district" placeholder="" required>
				  <option value="" selected=""></option>
				  <option value="1" >1st District</option>
				   <option value="2" >2nd District</option>
				  <option value="3" >3rd District</option>
				   <option value="4" >4th District</option>
				  <option value="5" >5th District</option>
				  </select>
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-2">
                      <span for="zip">Zip Code <span class="text-danger">*</span></span>
                      <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                    </div>
                  <div class="form-group col-md-3">
                      <span for="contact">Contact No. <span class="text-danger">*</span></span>
                      <input type="number" class="form-control" id="contact" name="contactno" placeholder="" value="<?php echo $contactno;?>" required>
                  </div>
                  <div class="form-group col-md-5">
                      <span for="email">Email <span class="text-danger">*</span></span>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $emailad;?>"  placeholder="">
                  </div>
                    <div class="form-group col-md-2">
                      <span for="sibling">No. of Siblings <span class="text-danger">*</span></span>
                      <input type="number" class="form-control" id="sibling" name="sibling" placeholder=""  />
                    </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-5">
                      <span for="fb">Facebook Account <span class="text-danger"></span></span>
                      <input type="text" class="form-control" id="fb" name="fb" placeholder="Email/Phone/Username/Name" >
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
                                            <span for="fathername">Complete Name <span class="text-danger">*</span></span>
                                            <input type="text" class="form-control" id="fathername" name="fathername" placeholder=""  >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <span for="fatherocc">Occupation <span class="text-danger">*</span></span>
                                            <input type="text" class="form-control" id="fatherocc" name="fatherocc" placeholder=""  >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="fatheradd">Address <span class="text-danger">*</span></span>
                                            <input type="text" class="form-control" id="fatheradd" name="fatheradd" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="fatheredu">Educational Attainment <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="fatheredu" name="fatheredu" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <input type="radio" class="minimal" style="display:inline !important;" id="fatherstatus1" value="living" name="fatherstatus" checked value='1' >
                                            <span for="fatherstatus1">Living</span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="radio" class="minimal" style="display:inline !important;" id="fatherstatus2" value="deceased" name="fatherstatus" value='2' >
                                            <span for="fatherstatus2">Deceased</span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="checkbox" class="minimal" style="display:inline !important;" id="separated" name="separated1" />
                                            <span for="separated">Separated</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">MOTHER <span class="text-danger"></span></label><br/>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="mothername">Complete Name <span class="text-danger">*</span></span>
                                            <input type="text" class="form-control" id="mothername" name="mothername" placeholder=""  >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <span for="motherocc">Occupation <span class="text-danger">*</span></span>
                                            <input type="text" class="form-control" id="motherocc" name="motherocc" placeholder=""  >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="motheradd">Address <span class="text-danger">*</span></span>
                                            <input type="text" class="form-control" id="motheradd" name="motheradd" placeholder=""  >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="motheredu">Educational Attainment <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="motheredu" name="motheredu" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <input type="radio" style="display:inline !important;" id="motherstatus1" class="minimal" name="motherstatus" value="living" value='1' checked >
                                            <span for="motherstatus1">Living</span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="radio" class="minimal" style="display:inline !important;" id="motherstatus2" name="motherstatus" value="deceased" value='2' >
                                            <span for="motherstatus2">Deceased</span>
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
                                            <input type="text" class="form-control" id="guardianname" name="guardianname" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <span for="guardianocc">Occupation <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="guardianocc" name="guardianocc" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="guardianadd">Address <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="guardianadd" name="guardianadd" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">FAMILY/GUARDIAN'S INCOME <span class="text-danger"></span></label><br/>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="income">PARENT'S/GUARDIAN ANNUAL GROSS INCOME <span class="text-danger">*</span></span>
                                            <input type="number" class="form-control" id="income" name="income" placeholder=""  >
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
                                    <span for="apptype">Applicant's Type <span class="text-danger">*</span></span>
                                    <select class="form-control" id="apptype" name="apptype"  >
                                        <option></option>
                                        <option value="A">HS/Senior High Graduate</option>
                                        <option value="B">Graduating Senior High</option>
                                        <option value="C">With Earned Units</option>
                                        <option value="D">ALS</option>
                                        <option value="E">PEPT</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <span for="year">Year Level <span class="text-sm" id="lbl_yrin"></span> <span class="text-danger">*</span></span>
                                    <select class="form-control" id="year" name="year" placeholder=""  >
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                   <br/><br/><br/>
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <span for="hs">High School Graduated <span class="text-danger">*</span></span>
                                    <input type="text" class="form-control" id="hs" name="hs" placeholder=""  >
                                </div>
                                
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group ">
                                    <span for="college">College/University <span class="text-danger">*</span></span>
                                    <select class="form-control select2" id="college" name="college" placeholder=""  >
                                      <option></option>
                                        <option value="Access Computer & Technical Colleges-Manila">Access Computer & Technical Colleges-Manila</option><option value="Access Computer College">Access Computer College</option><option value="ACLC College of Daet, Inc.">ACLC College of Daet, Inc.</option><option value="ACLC College of Iriga">ACLC College of Iriga</option><option value="ACLC College of Mandaue">ACLC College of Mandaue</option><option value="ACLC College of Sorsogon">ACLC College of Sorsogon</option><option value="Adamson University">Adamson University</option><option value="Adventist University of the Philippines">Adventist University of the Philippines</option><option value="Aemilianum College, Inc.">Aemilianum College, Inc.</option><option value="Aeronautical Academy of the Philippines, Inc.">Aeronautical Academy of the Philippines, Inc.</option><option value="Ago Medical and Educational Center">Ago Medical and Educational Center</option><option value="Alfelor Sr. Memorial College, Inc.">Alfelor Sr. Memorial College, Inc.</option><option value="AMA Computer College-Legazpi">AMA Computer College-Legazpi</option><option value="AMA Computer College-Naga">AMA Computer College-Naga</option><option value="AMA Computer College-Sta. Mesa">AMA Computer College-Sta. Mesa</option><option value="Amando Cope College">Amando Cope College</option><option value="Annunciation College of Bacon Sorsogon Unit, Inc.">Annunciation College of Bacon Sorsogon Unit, Inc.</option><option value="Aquinas University of Legazpi">Aquinas University of Legazpi</option><option value="Arellano University-Malabon">Arellano University-Malabon</option><option value="Arellano University-Mandaluyong">Arellano University-Mandaluyong</option><option value="Arellano University-Manila">Arellano University-Manila</option><option value="Arellano University-Pasay">Arellano University-Pasay</option><option value="Aroroy Municipal College">Aroroy Municipal College</option><option value="Asia Technological School of Science and Arts">Asia Technological School of Science and Arts</option><option value="Asian Institute Maritime Studies">Asian Institute Maritime Studies</option><option value="Ateneo De Manila University">Ateneo De Manila University</option><option value="Ateneo De Naga University">Ateneo De Naga University</option><option value="Baao Community College">Baao Community College</option><option value="Balud Municipal College">Balud Municipal College</option><option value="Bataan Peninsula State University-Abucay">Bataan Peninsula State University-Abucay</option><option value="Bataan Peninsula State University-Balanga">Bataan Peninsula State University-Balanga</option><option value="Bataan Peninsula State University-Dinalupihan">Bataan Peninsula State University-Dinalupihan</option><option value="Bataan Peninsula State University-Main">Bataan Peninsula State University-Main</option><option value="Bataan Peninsula State University-Orani">Bataan Peninsula State University-Orani</option><option value="Batangas State University">Batangas State University</option><option value="Belen B. Francisco Foundation-Albay">Belen B. Francisco Foundation-Albay</option><option value="Belen B. Francisco Foundation, Inc.">Belen B. Francisco Foundation, Inc.</option><option value="Bestlink College of the Philipppines, Inc.">Bestlink College of the Philipppines, Inc.</option><option value="Bible Theological College">Bible Theological College</option><option value="Bicol Christian College of Medicine">Bicol Christian College of Medicine</option><option value="Bicol College">Bicol College</option><option value="Bicol Merchant Marine College, Inc.">Bicol Merchant Marine College, Inc.</option><option value="Bicol State College of Applied Sciences and Technology">Bicol State College of Applied Sciences and Technology</option><option value="Bicol University-Daraga">Bicol University-Daraga</option><option value="Bicol University-Gubat">Bicol University-Gubat</option><option value="Bicol University-Guinobatan">Bicol University-Guinobatan</option><option value="Bicol University-Main">Bicol University-Main</option><option value="Bicol University-Main (BU-CAL)">Bicol University-Main (BU-CAL)</option><option value="Bicol University-Main (BU-CBEM)">Bicol University-Main (BU-CBEM)</option><option value="Bicol University-Main (BU-CE)">Bicol University-Main (BU-CE)</option><option value="Bicol University-Main (BU-CENG)">Bicol University-Main (BU-CENG)</option><option value="Bicol University-Main (BU-CIT)">Bicol University-Main (BU-CIT)</option><option value="Bicol University-Main (BU-CN)">Bicol University-Main (BU-CN)</option><option value="Bicol University-Main (BU-CS)">Bicol University-Main (BU-CS)</option><option value="Bicol University-Main (BU-CSSP)">Bicol University-Main (BU-CSSP)</option><option value="Bicol University-Main (BU-IA)">Bicol University-Main (BU-IA)</option><option value="Bicol University-Main (BU-IPESR)">Bicol University-Main (BU-IPESR)</option><option value="Bicol University-Polangui">Bicol University-Polangui</option><option value="Bicol University-Tabaco">Bicol University-Tabaco</option><option value="Brentwood College of Asia International School">Brentwood College of Asia International School</option><option value="Cainta Catholic College">Cainta Catholic College</option><option value="Calabanga Community College">Calabanga Community College</option><option value="Calauag Central College">Calauag Central College</option><option value="Camarines Norte College">Camarines Norte College</option><option value="Camarines Norte College of Arts and Business">Camarines Norte College of Arts and Business</option><option value="Camarines Norte School of Law, Arts and Sciences">Camarines Norte School of Law, Arts and Sciences</option><option value="Camarines Norte State College">Camarines Norte State College</option><option value="Camarines Norte State College-Entienza">Camarines Norte State College-Entienza</option><option value="Camarines Norte State College-Jose Panganiban">Camarines Norte State College-Jose Panganiban</option><option value="Camarines Norte State College-Labo">Camarines Norte State College-Labo</option><option value="Camarines Norte State College-Main">Camarines Norte State College-Main</option><option value="Camarines Norte State College-Mercedes">Camarines Norte State College-Mercedes</option><option value="Camarines Sur Community College">Camarines Sur Community College</option><option value="Camarines Sur Polytechnic Colleges">Camarines Sur Polytechnic Colleges</option><option value="Capalonga College, Inc.">Capalonga College, Inc.</option><option value="Caramoan Community College">Caramoan Community College</option><option value="Cataingan Municipal College">Cataingan Municipal College</option><option value="Cataingan Polytechnic Institute, Inc.">Cataingan Polytechnic Institute, Inc.</option><option value="Catanduanes Colleges">Catanduanes Colleges</option><option value="Catanduanes Institute of Technology Foundation, Inc.">Catanduanes Institute of Technology Foundation, Inc.</option><option value="Catanduanes State University">Catanduanes State University</option><option value="Catanduanes State University-Main">Catanduanes State University-Main</option><option value="Catanduanes State University-Panganiban">Catanduanes State University-Panganiban</option><option value="Cavite State University">Cavite State University</option><option value="Cebu Normal University">Cebu Normal University</option><option value="Cebu Roosevelt Memorial Colleges">Cebu Roosevelt Memorial Colleges</option><option value="Cebu Technological University">Cebu Technological University</option><option value="Ceguera Technological College">Ceguera Technological College</option><option value="Central Bicol State University of Agriculture">Central Bicol State University of Agriculture</option><option value="Central Bicol State University of Agriculture-Calabanga">Central Bicol State University of Agriculture-Calabanga</option><option value="Central Bicol State University of Agriculture-Main">Central Bicol State University of Agriculture-Main</option><option value="Central Bicol State University of Agriculture-Pasacao">Central Bicol State University of Agriculture-Pasacao</option><option value="Central Bicol State University of Agriculture-Sipocot">Central Bicol State University of Agriculture-Sipocot</option><option value="Centro Escolar University">Centro Escolar University</option><option value="Christ the King College of Science and Technology">Christ the King College of Science and Technology</option><option value="Christian Polytechnic Institute of Catanduanes">Christian Polytechnic Institute of Catanduanes</option><option value="Chrisville Institute of Technology">Chrisville Institute of Technology</option><option value="City College of Naga">City College of Naga</option><option value="Colegio De San Juan De Letran">Colegio De San Juan De Letran</option><option value="Colegio De Sta. Monica of Polangui">Colegio De Sta. Monica of Polangui</option><option value="Colegio Dela Milagrosa">Colegio Dela Milagrosa</option><option value="Colegio Dela Purisima Concepcion">Colegio Dela Purisima Concepcion</option><option value="Community College of Manito">Community College of Manito</option><option value="Computer Arts and Technological College-Legazpi">Computer Arts and Technological College-Legazpi</option><option value="Computer Arts and Technological College-Ligao">Computer Arts and Technological College-Ligao</option><option value="Computer Arts and Technological College-Polangui">Computer Arts and Technological College-Polangui</option><option value="Computer Communication Development Institute-Goa">Computer Communication Development Institute-Goa</option><option value="Computer Communication Development Institute-Iriga">Computer Communication Development Institute-Iriga</option><option value="Computer Communication Development Institute-Legazpi">Computer Communication Development Institute-Legazpi</option><option value="Computer Communication Development Institute-Naga">Computer Communication Development Institute-Naga</option><option value="Computer Communication Development Institute-Sorsogon">Computer Communication Development Institute-Sorsogon</option><option value="Computer Systems Institute">Computer Systems Institute</option><option value="Daniel B. Pena Memorial College Foundation">Daniel B. Pena Memorial College Foundation</option><option value="Daraga Community College">Daraga Community College</option><option value="DATACOM Institute of Computer Technology">DATACOM Institute of Computer Technology</option><option value="Datamex">Datamex</option><option value="De La Salle-Lipa">De La Salle-Lipa</option><option value="De Vera Institute of Technology">De Vera Institute of Technology</option><option value="Deaf Evangelistic Alliance Foundation Inc. School">Deaf Evangelistic Alliance Foundation Inc. School</option><option value="Divine Word College of Legazpi">Divine Word College of Legazpi</option><option value="Donsol Community College">Donsol Community College</option><option value="Dr. Carlos S. Lanting Colleges-Dr. Ruby Lanting Casaul Educ'l Fdn.">Dr. Carlos S. Lanting Colleges-Dr. Ruby Lanting Casaul Educ'l Fdn.</option><option value="Dr. Emilio B. Espinosa Sr. Memorial State College">Dr. Emilio B. Espinosa Sr. Memorial State College</option><option value="Dr. Sun Yat Sen Memorial School and Maritime Institute">Dr. Sun Yat Sen Memorial School and Maritime Institute</option><option value="Earist College">Earist College</option><option value="Emilio Aguinaldo College">Emilio Aguinaldo College</option><option value="Estenias Science Foundation School, Inc.">Estenias Science Foundation School, Inc.</option><option value="Eulogio Amang Rodriguez Institute of Science and Technology">Eulogio Amang Rodriguez Institute of Science and Technology</option><option value="Far Eastern University">Far Eastern University</option><option value="Fatima School of Science and Techology, Inc.">Fatima School of Science and Techology, Inc.</option><option value="Febias College of Bible">Febias College of Bible</option><option value="Felix O. Alfelor Sr. Foundation College">Felix O. Alfelor Sr. Foundation College</option><option value="Forbes College, Inc.">Forbes College, Inc.</option><option value="Global IT">Global IT</option><option value="Holy Family Center of Studies Foundation, Inc.">Holy Family Center of Studies Foundation, Inc.</option><option value="Holy Rosary Major Seminary">Holy Rosary Major Seminary</option><option value="Holy Rosary Minor Seminary">Holy Rosary Minor Seminary</option><option value="Holy Trinity College of Cam Sur, Inc.">Holy Trinity College of Cam Sur, Inc.</option><option value="Holy Trinity College Seminary">Holy Trinity College Seminary</option><option value="Holy Trinity College-Bato">Holy Trinity College-Bato</option><option value="ICCT Colleges">ICCT Colleges</option><option value="Immaculate Conception College-Albay">Immaculate Conception College-Albay</option><option value="Infotech Development Systems College, Inc.">Infotech Development Systems College, Inc.</option><option value="Institute of Creative Computer Technology">Institute of Creative Computer Technology</option><option value="Inter-Global College Foundation, Inc.">Inter-Global College Foundation, Inc.</option><option value="International Electronics and Technical Institute">International Electronics and Technical Institute</option><option value="Jesus the Loving Shepherd Christian College">Jesus the Loving Shepherd Christian College</option><option value="Jose Rizal University">Jose Rizal University</option><option value="L.D.W. Bethany Christian Colleges">L.D.W. Bethany Christian Colleges</option><option value="La Consolacion College-Daet">La Consolacion College-Daet</option><option value="La Consolacion College-Iriga">La Consolacion College-Iriga</option><option value="Lady of Penafrancia College">Lady of Penafrancia College</option><option value="Laguna State Polytechnic University">Laguna State Polytechnic University</option><option value="Laguna University">Laguna University</option><option value="Lapu-Lapu City College">Lapu-Lapu City College</option><option value="Libon Community College">Libon Community College</option><option value="Liceo De Masbate">Liceo De Masbate</option><option value="Liceo De San Jacinto Foundation, Inc.">Liceo De San Jacinto Foundation, Inc.</option><option value="Ligao Community College">Ligao Community College</option><option value="Lower Isarog Foundation Exponent, Inc.">Lower Isarog Foundation Exponent, Inc.</option><option value="Luis H. Dilanco Sr. Foundation College, Inc.">Luis H. Dilanco Sr. Foundation College, Inc.</option><option value="Lyceum of Alabang">Lyceum of Alabang</option><option value="Lyceum of Manila">Lyceum of Manila</option><option value="Lyceum of the Philippines University-Batangas">Lyceum of the Philippines University-Batangas</option><option value="Maba Computer College Foundation Inc.">Maba Computer College Foundation Inc.</option><option value="Mabini Colleges Inc.">Mabini Colleges Inc.</option><option value="Manuel S. Enverga University Foundation-Lucena">Manuel S. Enverga University Foundation-Lucena</option><option value="Mapua Institute of Technology">Mapua Institute of Technology</option><option value="Marikina Polytechnic College">Marikina Polytechnic College</option><option value="Mariners' Polytechnic Colleges Foundation-Baras">Mariners' Polytechnic Colleges Foundation-Baras</option><option value="Mariners' Polytechnic Colleges Foundation-Legazpi">Mariners' Polytechnic Colleges Foundation-Legazpi</option><option value="Mariners' Polytechnic Colleges-Naga">Mariners' Polytechnic Colleges-Naga</option><option value="Maryhill College">Maryhill College</option><option value="Masbate Central Technical Institute">Masbate Central Technical Institute</option><option value="Masbate Colleges">Masbate Colleges</option><option value="Masbate Polytechnic and Development College">Masbate Polytechnic and Development College</option><option value="Mater Salutis College Seminary">Mater Salutis College Seminary</option><option value="Microsystems College Foundation">Microsystems College Foundation</option><option value="Mountview College">Mountview College</option><option value="Naga College Foundation">Naga College Foundation</option><option value="Naga College Institute">Naga College Institute</option><option value="Naga View Adventist College, Inc.">Naga View Adventist College, Inc.</option><option value="National University">National University</option><option value="NEW ERA UNIVERSITY">NEW ERA UNIVERSITY</option><option value="Northhills College of Asia">Northhills College of Asia</option><option value="Oas Community College">Oas Community College</option><option value="Osmena Colleges">Osmena Colleges</option><option value="Our Lady of Fatima University">Our Lady of Fatima University</option><option value="Our Lady of Lourdes College Foundation">Our Lady of Lourdes College Foundation</option><option value="Our Lady of Penafrancia Seminary">Our Lady of Penafrancia Seminary</option><option value="Our Lady of Salvation College">Our Lady of Salvation College</option><option value="Our Lady of the Most Holy Trinity College Seminary, Inc.">Our Lady of the Most Holy Trinity College Seminary, Inc.</option><option value="Ovilla Technical College">Ovilla Technical College</option><option value="Palawan State University">Palawan State University</option><option value="Pamantasan ng Laguna">Pamantasan ng Laguna</option><option value="Pamantasan ng Lungsod ng Marikina">Pamantasan ng Lungsod ng Marikina</option><option value="Pamantasan ng Lungsod ng Muntinlupa">Pamantasan ng Lungsod ng Muntinlupa</option><option value="Pamantasan ng Lungsod ng Pasig">Pamantasan ng Lungsod ng Pasig</option><option value="Partido College">Partido College</option><option value="Partido State University">Partido State University</option><option value="Partido State University-Caramoan">Partido State University-Caramoan</option><option value="Partido State University-Goa">Partido State University-Goa</option><option value="Partido State University-Lagonoy">Partido State University-Lagonoy</option><option value="Partido State University-Sagnay">Partido State University-Sagnay</option><option value="Partido State University-Salogon">Partido State University-Salogon</option><option value="Partido State University-San Jose">Partido State University-San Jose</option><option value="Partido State University-Tinambac">Partido State University-Tinambac</option><option value="PATTS College of Aeronautics">PATTS College of Aeronautics</option><option value="Perpetual Help Paramedical School, Inc.">Perpetual Help Paramedical School, Inc.</option><option value="Philippine Computer Foundation College, Inc.-Naga">Philippine Computer Foundation College, Inc.-Naga</option><option value="Philippine Computer Foundation College, Inc.-Pili">Philippine Computer Foundation College, Inc.-Pili</option><option value="Philippine Maritime Institute Colleges">Philippine Maritime Institute Colleges</option><option value="Philippine Maritime Institute Colleges-MANILA">Philippine Maritime Institute Colleges-MANILA</option><option value="Philippine Merchant Marine Academy">Philippine Merchant Marine Academy</option><option value="Philippine Normal University">Philippine Normal University</option><option value="Philippine Women University-Manila">Philippine Women University-Manila</option><option value="PhilTech Institute of Arts and Technology Inc.">PhilTech Institute of Arts and Technology Inc.</option><option value="Pili Capital College">Pili Capital College</option><option value="Pili Capital College, Inc.">Pili Capital College, Inc.</option><option value="PLT College of Guinobatan Inc.">PLT College of Guinobatan Inc.</option><option value="PMI Colleges-Quezon">PMI Colleges-Quezon</option><option value="Polangui Community College">Polangui Community College</option><option value="Polytechnic Institute of Tabaco">Polytechnic Institute of Tabaco</option><option value="Polytechnic University of the Philippines-Lopez">Polytechnic University of the Philippines-Lopez</option><option value="Polytechnic University of the Philippines-Manila">Polytechnic University of the Philippines-Manila</option><option value="Polytechnic University of the Philippines-Ragay">Polytechnic University of the Philippines-Ragay</option><option value="Polytechnic University of the Philippines-San Juan">Polytechnic University of the Philippines-San Juan</option><option value="Polytechnic University of the Philippines-Sto. Tomas">Polytechnic University of the Philippines-Sto. Tomas</option><option value="Quezon City Polytechnic University">Quezon City Polytechnic University</option><option value="R.G. De Castro Colleges, Inc.">R.G. De Castro Colleges, Inc.</option><option value="Rapu-rapu Community College">Rapu-rapu Community College</option><option value="Regina Mondi College, Inc.">Regina Mondi College, Inc.</option><option value="Republic College of Guinobatan, Inc.">Republic College of Guinobatan, Inc.</option><option value="Rizal Technological University">Rizal Technological University</option><option value="Saint Anthony Mary Claret College">Saint Anthony Mary Claret College</option><option value="Saint Louise De Marillac College of Sorsogon">Saint Louise De Marillac College of Sorsogon</option><option value="San Beda College">San Beda College</option><option value="San Beda College-Alabang">San Beda College-Alabang</option><option value="San Jose Community College">San Jose Community College</option><option value="San Pascual Polytechnic College">San Pascual Polytechnic College</option><option value="San Pedro College of Business Administration">San Pedro College of Business Administration</option><option value="San Sebastian College Recoletos">San Sebastian College Recoletos</option><option value="San Sebastian College Recoletos-Canlubang">San Sebastian College Recoletos-Canlubang</option><option value="Siena College Tigaon, Inc.">Siena College Tigaon, Inc.</option><option value="Solis Institute of Technology">Solis Institute of Technology</option><option value="Sorsogon College of Criminology">Sorsogon College of Criminology</option><option value="Sorsogon Community College">Sorsogon Community College</option><option value="Sorsogon State College">Sorsogon State College</option><option value="Sorsogon State College-Bulan">Sorsogon State College-Bulan</option><option value="Sorsogon State College-Castilla">Sorsogon State College-Castilla</option><option value="Sorsogon State College-Magallanes">Sorsogon State College-Magallanes</option><option value="Sorsogon State College-Main">Sorsogon State College-Main</option><option value="Southern Bicol Colleges">Southern Bicol Colleges</option><option value="Southern Luzon Institute">Southern Luzon Institute</option><option value="Southern Luzon State University">Southern Luzon State University</option><option value="Southern Luzon Technological College Fdtn. Inc.-Legazpi">Southern Luzon Technological College Fdtn. Inc.-Legazpi</option><option value="Southern Luzon Technological College Fdtn. Pilar, Inc.">Southern Luzon Technological College Fdtn. Pilar, Inc.</option><option value="Southern Luzon Technological College Fdtn. Pioduran, Inc.">Southern Luzon Technological College Fdtn. Pioduran, Inc.</option><option value="Southern Masbate Roosevelt College">Southern Masbate Roosevelt College</option><option value="Speed Computer College, Inc.">Speed Computer College, Inc.</option><option value="SPJ International Technology Institute Inc.">SPJ International Technology Institute Inc.</option><option value="St. John Technological College of the Philippines">St. John Technological College of the Philippines</option><option value="St. Louis College Valenzuela">St. Louis College Valenzuela</option><option value="St. Nicolas College of Business and Technology, Inc.">St. Nicolas College of Business and Technology, Inc.</option><option value="St. Peter Baptist College Foundation, Inc.">St. Peter Baptist College Foundation, Inc.</option><option value="Sta. Catalina College">Sta. Catalina College</option><option value="Sta. Elena (Camarines Norte) College, Inc.">Sta. Elena (Camarines Norte) College, Inc.</option><option value="STI College Naga City, Inc.">STI College Naga City, Inc.</option><option value="STI College-Dasmariñas">STI College-Dasmariñas</option><option value="STI College-Legazpi">STI College-Legazpi</option><option value="STI College-Lucena">STI College-Lucena</option><option value="STI College-Marikina">STI College-Marikina</option><option value="STI College-Taft">STI College-Taft</option><option value="STI CollegeShaw">STI CollegeShaw</option><option value="STI-FAIRVIEW">STI-FAIRVIEW</option><option value="Sunshine International School, Inc.">Sunshine International School, Inc.</option><option value="Tabaco College">Tabaco College</option><option value="Tanchuling College">Tanchuling College</option><option value="Technological Institute of the Philippines">Technological Institute of the Philippines</option><option value="Technological University of the Philippines">Technological University of the Philippines</option><option value="The Lewis College, Inc.">The Lewis College, Inc.</option><option value="The National Teachers College">The National Teachers College</option><option value="The University of Manila">The University of Manila</option><option value="Tiwi Community College">Tiwi Community College</option><option value="Universidad De Sta. Isabel">Universidad De Sta. Isabel</option><option value="University of Caloocan">University of Caloocan</option><option value="University of Cebu">University of Cebu</option><option value="University of Makati">University of Makati</option><option value="University of Northeastern Philippines">University of Northeastern Philippines</option><option value="University of Nueva Caceres">University of Nueva Caceres</option><option value="University of Perpetual Help System Dalta">University of Perpetual Help System Dalta</option><option value="University of Perpetual Help System Dalta-Molino">University of Perpetual Help System Dalta-Molino</option><option value="University of Regina Carmel">University of Regina Carmel</option><option value="University of Rizal System-Antipolo">University of Rizal System-Antipolo</option><option value="University of Saint Anthony">University of Saint Anthony</option><option value="University of Santo Tomas">University of Santo Tomas</option><option value="University of Santo Tomas">University of Santo Tomas</option><option value="University of Santo Tomas-Legazpi">University of Santo Tomas-Legazpi</option><option value="University of the East">University of the East</option><option value="University of the Philippines-Baguio">University of the Philippines-Baguio</option><option value="University of the Philippines-Diliman">University of the Philippines-Diliman</option><option value="University of the Philippines-Los Baños">University of the Philippines-Los Baños</option><option value="Veritas College of Irosin">Veritas College of Irosin</option><option value="Vineyard Asia International College">Vineyard Asia International College</option><option value="West Coast College">West Coast College</option><option value="World Citi Colleges-Quezon City">World Citi Colleges-Quezon City</option><option value="Worldtech Resources Foundation, Inc.-Iriga">Worldtech Resources Foundation, Inc.-Iriga</option><option value="Worldtech Resources Foundation, Inc.-Naga">Worldtech Resources Foundation, Inc.-Naga</option><option value="Zamora Memorial College, Inc.">Zamora Memorial College, Inc.</option>                                    </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span for="course">Current Course/Course to take <span class="text-danger">*</span></span>
                                    <select class="form-control select2" id="course" name="course" placeholder=""  >
                                        <option></option>
                                        <option>Bachelor in Agricultural Technology</option><option>Bachelor in Elementary Education</option><option>Bachelor in Elementary Education major in Early Childhood Education</option><option>Bachelor in Elementary Education major in SPED</option><option>Bachelor in Library Science and Information System major in System Analysis</option><option>Bachelor of Arts in Broadcasting</option><option>Bachelor of Arts in Communication</option><option>Bachelor of Arts in English</option><option>Bachelor of Arts in Journalism</option><option>Bachelor of Arts in Performing Arts</option><option>Bachelor of Arts in Philosophy</option><option>Bachelor of Arts in Psychology</option><option>Bachelor of Arts in Religious Education</option><option>Bachelor of Physical Educ. major in School PE</option><option>Bachelor of Science in Accountancy</option><option>Bachelor of Science in Agri Eco-Tourism Management</option><option>Bachelor of Science in Agribusiness</option><option>Bachelor of Science in Agricultural Economics</option><option>Bachelor of Science in Agricultural Education</option><option>Bachelor of Science in Agricultural Engineering</option><option>Bachelor of Science in Agricultural Entrepreneurship</option><option>Bachelor of Science in Agriculture</option><option>Bachelor of Science in Agro-Forestry</option><option>Bachelor of Science in Animal Husbandry</option><option>Bachelor of Science in Animation</option><option>Bachelor of Science in Applied Mathematics</option><option>Bachelor of Science in Applied Physics</option><option>Bachelor of Science in Architecture</option><option>Bachelor of Science in Atmospheric Science</option><option>Bachelor of Science in Automotive Technology</option><option>Bachelor of Science in Bio Chemical Engineering</option><option>Bachelor of Science in Biology</option><option>Bachelor of Science in Biomedical</option><option>Bachelor of Science in Business Administration Micro-Finance</option><option>Bachelor of Science in Business Data Outsourcing</option><option>Bachelor of Science in Business Process Outsourcing</option><option>Bachelor of Science in Chemical Engineering</option><option>Bachelor of Science in Chemistry</option><option>Bachelor of Science in Civil Engineering</option><option>Bachelor of Science in Civil Technology</option><option>Bachelor of Science in Communication Engineering</option><option>Bachelor of Science in Computer Engineering</option><option>Bachelor of Science in Computer Science</option><option>Bachelor of Science in Construction Management</option><option>Bachelor of Science in Creative and Performing Arts</option><option>Bachelor of Science in Criminology</option><option>Bachelor of Science in Development Communication</option><option>Bachelor of Science in Earth Science</option><option>Bachelor of Science in Electrical Engineering</option><option>Bachelor of Science in Electrical Technology</option><option>Bachelor of Science in Electronics and Communication Engineering</option><option>Bachelor of Science in Electronics Engineering</option><option>Bachelor of Science in Electronics Technology</option><option>Bachelor of Science in Entrepreneurship</option><option>Bachelor of Science in Environmental Engineering</option><option>Bachelor of Science in Environmental Management</option><option>Bachelor of Science in Environmental Planning</option><option>Bachelor of Science in Environmental Science</option><option>Bachelor of Science in Fine Arts</option><option>Bachelor of Science in Fisheries</option><option>Bachelor of Science in Food Technology</option><option>Bachelor of Science in Geodetic Engineering</option><option>Bachelor of Science in Geological</option><option>Bachelor of Science in Geology</option><option>Bachelor of Science in Guidance and Counselling</option><option>Bachelor of Science in Human Development</option><option>Bachelor of Science in Industrial Engineering</option><option>Bachelor of Science in Industrial Technology</option><option>Bachelor of Science in Industrial Technology major in Automotive</option><option>Bachelor of Science in Industrial Technology major in Automotive Technology (LEP)</option><option>Bachelor of Science in Industrial Technology major in Civil Technology</option><option>Bachelor of Science in Industrial Technology major in Electrical</option><option>Bachelor of Science in Industrial Technology major in Electronics</option><option>Bachelor of Science in Industrial Technology major in Food Technology</option><option>Bachelor of Science in Industrial Technology major in Garments & Trade</option><option>Bachelor of Science in Industrial Technology major in Mechanical</option><option>Bachelor of Science in Information System</option><option>Bachelor of Science in Information System Management</option><option>Bachelor of Science in Information Technology</option><option>Bachelor of Science in Interior Design</option><option>Bachelor of Science in Land Use Management</option><option>Bachelor of Science in Landscape Architecture</option><option>Bachelor of Science in Marine Biology/Science</option><option>Bachelor of Science in Marine Engineering</option><option>Bachelor of Science in Marine Transportation</option><option>Bachelor of Science in Math</option><option>Bachelor of Science in Mechanical Engineering</option><option>Bachelor of Science in Mechanical Technology</option><option>Bachelor of Science in Medical Technology</option><option>Bachelor of Science in Medical Tourism</option><option>Bachelor of Science in Metallurgical/Mining</option><option>Bachelor of Science in Meteorological</option><option>Bachelor of Science in Midwifery</option><option>Bachelor of Science in Mining</option><option>Bachelor of Science in Multimedia</option><option>Bachelor of Science in Nursing</option><option>Bachelor of Science in Nutrition</option><option>Bachelor of Science in Nutrition and Dietetics</option><option>Bachelor of Science in Petroleum Engineering</option><option>Bachelor of Science in Pharmacy</option><option>Bachelor of Science in Physical Therapy</option><option>Bachelor of Science in Physics</option><option>Bachelor of Science in Programming</option><option>Bachelor of Science in Psychology</option><option>Bachelor of Science in Radiology Technology</option><option>Bachelor of Science in Sanitary Engineering</option><option>Bachelor of Science in Social Work</option><option>Bachelor of Science in Statistics/Applied Statistics</option><option>Bachelor of Science in Theology</option><option>Bachelor of Science in Tourism</option><option>Bachelor of Science in Urban Planning</option><option>Bachelor of Secondary Education</option><option>Bachelor of Secondary Education major in Art Education</option><option>Bachelor of Secondary Education major in Biology</option><option>Bachelor of Secondary Education major in Chemistry</option><option>Bachelor of Secondary Education major in Educ. Media/Tech.</option><option>Bachelor of Secondary Education major in English</option><option>Bachelor of Secondary Education major in Environmental Planning</option><option>Bachelor of Secondary Education major in Filipino</option><option>Bachelor of Secondary Education major in Health Education</option><option>Bachelor of Secondary Education major in Human Kinetics</option><option>Bachelor of Secondary Education major in MAPEH</option><option>Bachelor of Secondary Education major in Math</option><option>Bachelor of Secondary Education major in Music Education</option><option>Bachelor of Secondary Education major in PE</option><option>Bachelor of Secondary Education major in Physics</option><option>Bachelor of Secondary Education major in Science</option><option>Bachelor of Secondary Education Technology and Livelihood Education</option><option>Bachelor of Technical Teacher Education</option><option>Bachelor of Technical Teacher Education major in Automotive</option><option>Bachelor of Technology major in Automotive</option><option>Bachelor of Technology major in Civil Technology</option><option>Bachelor of Technology major in Electrical</option><option>Bachelor of Technology major in Electronics</option><option>Bachelor of Technology major in Food Technology</option><option>Bachelor of Technology major in Garments and Trade</option><option>Bachelor of Technology major in Mechanical</option><option>Doctor of Veterinary Medicine</option><option>Master of Science in Agricultural Extension</option><option>Non Priority Course</option>                                    </select>
                                </div>
                                <style>
                                  .hidden{
                                    display:none;
                                  }
                                </style>
                                
                                <div class="form-group col-md-6">
                                    <span for="course">Non Priority Courses <span class="text-danger"></span></span>
                                    <select class="form-control select2" disabled id="npcourse" name="npcourse" placeholder="" required>
                                        <option></option>
                                        <option value="AB English Language">AB English Language</option><option value="Aircraft Electronics and Communication Course">Aircraft Electronics and Communication Course</option><option value="Aircraft Maintenance Course">Aircraft Maintenance Course</option><option value="Associate in Computer Technology">Associate in Computer Technology</option><option value="Associate in Office Administration">Associate in Office Administration</option><option value="Bachelor in Public Administration">Bachelor in Public Administration</option><option value="Bachelor of Arts">Bachelor of Arts</option><option value="Bachelor of Arts  in Economics">Bachelor of Arts  in Economics</option><option value="Bachelor of Arts  in Sociology">Bachelor of Arts  in Sociology</option><option value="Bachelor of Arts in Audio Visual Communication">Bachelor of Arts in Audio Visual Communication</option><option value="Bachelor of Arts in Drama & Speech">Bachelor of Arts in Drama & Speech</option><option value="Bachelor of Arts in Economics">Bachelor of Arts in Economics</option><option value="Bachelor of Arts in English">Bachelor of Arts in English</option><option value="Bachelor of Arts in Filipino">Bachelor of Arts in Filipino</option><option value="Bachelor of Arts in History">Bachelor of Arts in History</option><option value="Bachelor of Arts in Literature">Bachelor of Arts in Literature</option><option value="Bachelor of Arts in Literature English">Bachelor of Arts in Literature English</option><option value="Bachelor of Arts in Mass Communication">Bachelor of Arts in Mass Communication</option><option value="Bachelor of Arts in Mathematics">Bachelor of Arts in Mathematics</option><option value="Bachelor of Arts in Peace Studies">Bachelor of Arts in Peace Studies</option><option value="Bachelor of Arts in Philosophy">Bachelor of Arts in Philosophy</option><option value="Bachelor of Arts In Political Science">Bachelor of Arts In Political Science</option><option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option><option value="Bachelor of Arts in Public Administration">Bachelor of Arts in Public Administration</option><option value="Bachelor of Arts in Religious Education">Bachelor of Arts in Religious Education</option><option value="Bachelor of Arts in Religious Studies">Bachelor of Arts in Religious Studies</option><option value="Bachelor of Arts in Social Studies">Bachelor of Arts in Social Studies</option><option value="Bachelor of Arts in Sociology">Bachelor of Arts in Sociology</option><option value="Bachelor of Arts in Speech and Theater Arts">Bachelor of Arts in Speech and Theater Arts</option><option value="Bachelor of Arts in Theology">Bachelor of Arts in Theology</option><option value="Bachelor of Arts Political Science">Bachelor of Arts Political Science</option><option value="Bachelor of Automotive Technology (LEP)">Bachelor of Automotive Technology (LEP)</option><option value="Bachelor of Electrical Technology (LEP)">Bachelor of Electrical Technology (LEP)</option><option value="Bachelor of Fine Arts Visual Communication">Bachelor of Fine Arts Visual Communication</option><option value="Bachelor of Food Service Management">Bachelor of Food Service Management</option><option value="Bachelor of Industrial Design">Bachelor of Industrial Design</option><option value="Bachelor of Industrial Education">Bachelor of Industrial Education</option><option value="Bachelor of Laws">Bachelor of Laws</option><option value="Bachelor of Library and Information Science">Bachelor of Library and Information Science</option><option value="Bachelor of Music Education">Bachelor of Music Education</option><option value="Bachelor of Music Piano">Bachelor of Music Piano</option><option value="Bachelor of Music Voice">Bachelor of Music Voice</option><option value="Bachelor of Public Administration">Bachelor of Public Administration</option><option value="Bachelor of Refrigeration and Airconditioning Technology (LEP)">Bachelor of Refrigeration and Airconditioning Technology (LEP)</option><option value="Bachelor of Science in  Business Administration Management">Bachelor of Science in  Business Administration Management</option><option value="Bachelor of Science in Accounting Technology">Bachelor of Science in Accounting Technology</option><option value="Bachelor of Science in Aeronautical Engineering">Bachelor of Science in Aeronautical Engineering</option><option value="Bachelor of Science in Agri-Business">Bachelor of Science in Agri-Business</option><option value="Bachelor of Science in Agricultural Development">Bachelor of Science in Agricultural Development</option><option value="Bachelor of Science in Agriculture  Crop Science">Bachelor of Science in Agriculture  Crop Science</option><option value="Bachelor of Science in Agriculture  General Agriculture">Bachelor of Science in Agriculture  General Agriculture</option><option value="Bachelor of Science in Agriculture (LEP)">Bachelor of Science in Agriculture (LEP)</option><option value="Bachelor of Science in Agriculture (LEP) General Curriculum">Bachelor of Science in Agriculture (LEP) General Curriculum</option><option value="Bachelor of Science in Agriculture Agricultural Extension">Bachelor of Science in Agriculture Agricultural Extension</option><option value="Bachelor of Science in Agriculture Agronomy">Bachelor of Science in Agriculture Agronomy</option><option value="Bachelor of Science in Agriculture Animal Science">Bachelor of Science in Agriculture Animal Science</option><option value="Bachelor of Science in Agriculture Crop Science">Bachelor of Science in Agriculture Crop Science</option><option value="Bachelor of Science in Agriculture Entomology">Bachelor of Science in Agriculture Entomology</option><option value="Bachelor of Science in Agriculture Farming System">Bachelor of Science in Agriculture Farming System</option><option value="Bachelor of Science in Agriculture Horticulture">Bachelor of Science in Agriculture Horticulture</option><option value="Bachelor of Science in Agriculture Plant Pathology">Bachelor of Science in Agriculture Plant Pathology</option><option value="Bachelor of Science in Agriculture Soil Science">Bachelor of Science in Agriculture Soil Science</option><option value="Bachelor of Science in Aircraft Maintenance Technology">Bachelor of Science in Aircraft Maintenance Technology</option><option value="Bachelor of Science in Audio-Visual Technology and Communication">Bachelor of Science in Audio-Visual Technology and Communication</option><option value="Bachelor of Science in Avionics Technology">Bachelor of Science in Avionics Technology</option><option value="Bachelor of Science in Business Administration">Bachelor of Science in Business Administration</option><option value="Bachelor of Science in Business Administration Banking and Finance">Bachelor of Science in Business Administration Banking and Finance</option><option value="Bachelor of Science in Business Administration BPO">Bachelor of Science in Business Administration BPO</option><option value="Bachelor of Science in Business Administration Business Economics">Bachelor of Science in Business Administration Business Economics</option><option value="Bachelor of Science in Business Administration Business Engineering">Bachelor of Science in Business Administration Business Engineering</option><option value="Bachelor of Science in Business Administration Business Management">Bachelor of Science in Business Administration Business Management</option><option value="Bachelor of Science in Business Administration Business Management Honors Program">Bachelor of Science in Business Administration Business Management Honors Program</option><option value="Bachelor of Science in Business Administration Business Management, Marketing, Technology and Communication Management">Bachelor of Science in Business Administration Business Management, Marketing, Technology and Communication Management</option><option value="Bachelor of Science in Business Administration Comp. Information System">Bachelor of Science in Business Administration Comp. Information System</option><option value="Bachelor of Science in Business Administration Computer Applications">Bachelor of Science in Business Administration Computer Applications</option><option value="Bachelor of Science in Business Administration Computer Management">Bachelor of Science in Business Administration Computer Management</option><option value="Bachelor of Science in Business Administration Computer Management and Accounting">Bachelor of Science in Business Administration Computer Management and Accounting</option><option value="Bachelor of Science in Business Administration E-Commerce">Bachelor of Science in Business Administration E-Commerce</option><option value="Bachelor of Science in Business Administration Economics">Bachelor of Science in Business Administration Economics</option><option value="Bachelor of Science in Business Administration Export Management">Bachelor of Science in Business Administration Export Management</option><option value="Bachelor of Science in Business Administration Finance">Bachelor of Science in Business Administration Finance</option><option value="Bachelor of Science in Business Administration Financial Accounting">Bachelor of Science in Business Administration Financial Accounting</option><option value="Bachelor of Science in Business Administration Financial Management">Bachelor of Science in Business Administration Financial Management</option><option value="Bachelor of Science in Business Administration Financial Management and Accounting">Bachelor of Science in Business Administration Financial Management and Accounting</option><option value="Bachelor of Science in Business Administration Hospital and Home Health Care Management">Bachelor of Science in Business Administration Hospital and Home Health Care Management</option><option value="Bachelor of Science in Business Administration Human Resource Development">Bachelor of Science in Business Administration Human Resource Development</option><option value="Bachelor of Science in Business Administration Human Resource Development Management">Bachelor of Science in Business Administration Human Resource Development Management</option><option value="Bachelor of Science in Business Administration Human Resource Management">Bachelor of Science in Business Administration Human Resource Management</option><option value="Bachelor of Science in Business Administration Legal Management">Bachelor of Science in Business Administration Legal Management</option><option value="Bachelor of Science in Business Administration Management">Bachelor of Science in Business Administration Management</option><option value="Bachelor of Science in Business Administration Management Info. System">Bachelor of Science in Business Administration Management Info. System</option><option value="Bachelor of Science in Business Administration Marketing">Bachelor of Science in Business Administration Marketing</option><option value="Bachelor of Science in Business Administration Marketing Management">Bachelor of Science in Business Administration Marketing Management</option><option value="Bachelor of Science in Business Administration Office Administration">Bachelor of Science in Business Administration Office Administration</option><option value="Bachelor of Science in Business Administration Operations Management">Bachelor of Science in Business Administration Operations Management</option><option value="Bachelor of Science in Business Management">Bachelor of Science in Business Management</option><option value="Bachelor of Science in Civil Technology">Bachelor of Science in Civil Technology</option><option value="Bachelor of Science In Commerce">Bachelor of Science In Commerce</option><option value="Bachelor of Science in Commerce Banking & Finance">Bachelor of Science in Commerce Banking & Finance</option><option value="Bachelor of Science in Commerce Computer Management">Bachelor of Science in Commerce Computer Management</option><option value="Bachelor of Science in Commerce Economics">Bachelor of Science in Commerce Economics</option><option value="Bachelor of Science in Commerce Management">Bachelor of Science in Commerce Management</option><option value="Bachelor of Science in Commerce Management">Bachelor of Science in Commerce Management</option><option value="Bachelor of Science in Commerce Management Accoounting">Bachelor of Science in Commerce Management Accoounting</option><option value="Bachelor of Science in Commerce Marketing">Bachelor of Science in Commerce Marketing</option><option value="Bachelor of Science in Commerce/Business Administration">Bachelor of Science in Commerce/Business Administration</option><option value="Bachelor of Science in Commerce/Business Administration Banking & Finance">Bachelor of Science in Commerce/Business Administration Banking & Finance</option><option value="Bachelor of Science in Commerce/Business Administration Economics">Bachelor of Science in Commerce/Business Administration Economics</option><option value="Bachelor of Science in Commerce/Business Administration Management">Bachelor of Science in Commerce/Business Administration Management</option><option value="Bachelor of Science in Commerce/Business Administration Marketing">Bachelor of Science in Commerce/Business Administration Marketing</option><option value="Bachelor of Science in Criminology (LEP)">Bachelor of Science in Criminology (LEP)</option><option value="Bachelor of Science in Customs Administration">Bachelor of Science in Customs Administration</option><option value="Bachelor of Science in Customs Administration Customs and Tariff">Bachelor of Science in Customs Administration Customs and Tariff</option><option value="Bachelor of Science in Development Communication">Bachelor of Science in Development Communication</option><option value="Bachelor of Science in Digital Illustration And Animation">Bachelor of Science in Digital Illustration And Animation</option><option value="Bachelor of Science in Electronics">Bachelor of Science in Electronics</option><option value="Bachelor of Science in Entrepreneurship Entrepreneurial Tourism">Bachelor of Science in Entrepreneurship Entrepreneurial Tourism</option><option value="Bachelor of Science in Environmental Management">Bachelor of Science in Environmental Management</option><option value="Bachelor of Science in Environmental Science">Bachelor of Science in Environmental Science</option><option value="Bachelor of Science in Food Service & Institutional Management">Bachelor of Science in Food Service & Institutional Management</option><option value="Bachelor of Science in Food Service Management">Bachelor of Science in Food Service Management</option><option value="Bachelor of Science in Forestry">Bachelor of Science in Forestry</option><option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option><option value="Bachelor of Science in Hospitality Management / Hotel and Restaurant Management">Bachelor of Science in Hospitality Management / Hotel and Restaurant Management</option><option value="Bachelor of Science in Hotel and Restaurant Management">Bachelor of Science in Hotel and Restaurant Management</option><option value="Bachelor of Science in Hotel and Restaurant Management (LEP)">Bachelor of Science in Hotel and Restaurant Management (LEP)</option><option value="Bachelor of Science in Human Ecology and Environmental Science">Bachelor of Science in Human Ecology and Environmental Science</option><option value="Bachelor of Science in Industrial Arts">Bachelor of Science in Industrial Arts</option><option value="Bachelor of Science in Industrial Education">Bachelor of Science in Industrial Education</option><option value="Bachelor of Science in Industrial Education Automotive">Bachelor of Science in Industrial Education Automotive</option><option value="Bachelor of Science in Industrial Education Drafting Technology">Bachelor of Science in Industrial Education Drafting Technology</option><option value="Bachelor of Science in Industrial Education Electrical">Bachelor of Science in Industrial Education Electrical</option><option value="Bachelor of Science in Industrial Education Electrical Technology">Bachelor of Science in Industrial Education Electrical Technology</option><option value="Bachelor of Science in Industrial Education Food Service Management">Bachelor of Science in Industrial Education Food Service Management</option><option value="Bachelor of Science in Industrial Education Foods">Bachelor of Science in Industrial Education Foods</option><option value="Bachelor of Science in Industrial Education Garment, Fashion & Design">Bachelor of Science in Industrial Education Garment, Fashion & Design</option><option value="Bachelor of Science in Industrial Education Garments">Bachelor of Science in Industrial Education Garments</option><option value="Bachelor of Science in Industrial Technology Drafting">Bachelor of Science in Industrial Technology Drafting</option><option value="Bachelor of Science in Industrial Technology Drafting Technology">Bachelor of Science in Industrial Technology Drafting Technology</option><option value="Bachelor of Science in Industrial Technology Foods">Bachelor of Science in Industrial Technology Foods</option><option value="Bachelor of Science in Industrial Technology Furniture & Cabinet Making Technology">Bachelor of Science in Industrial Technology Furniture & Cabinet Making Technology</option><option value="Bachelor of Science in Industrial Technology HRM">Bachelor of Science in Industrial Technology HRM</option><option value="Bachelor of Science in Industrial Technology Industrial Arts Technology">Bachelor of Science in Industrial Technology Industrial Arts Technology</option><option value="Bachelor of Science in Industrial Technology Machine Shop Technology">Bachelor of Science in Industrial Technology Machine Shop Technology</option><option value="Bachelor of Science in Industrial Technology Mechanical">Bachelor of Science in Industrial Technology Mechanical</option><option value="Bachelor of Science in Industrial Technology Mechanical Technology">Bachelor of Science in Industrial Technology Mechanical Technology</option><option value="Bachelor of Science in Industrial Technology Methods of Teaching">Bachelor of Science in Industrial Technology Methods of Teaching</option><option value="Bachelor of Science in Industrial Technology Refrigeration and Air Conditioning Technology">Bachelor of Science in Industrial Technology Refrigeration and Air Conditioning Technology</option><option value="Bachelor of Science in Management">Bachelor of Science in Management</option><option value="Bachelor of Science in Management and Accountancy">Bachelor of Science in Management and Accountancy</option><option value="Bachelor of Science in Management Local Government Administration">Bachelor of Science in Management Local Government Administration</option><option value="Bachelor of Science in Managerial Accounting">Bachelor of Science in Managerial Accounting</option><option value="Bachelor of Science in Medical Laboratory Technology">Bachelor of Science in Medical Laboratory Technology</option><option value="Bachelor of Science in Midwifery">Bachelor of Science in Midwifery</option><option value="Bachelor of Science in Naval Architecture & Marine Engineering">Bachelor of Science in Naval Architecture & Marine Engineering</option><option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option><option value="Bachelor of Science in Nursing (LEP)">Bachelor of Science in Nursing (LEP)</option><option value="Bachelor of Science in Nursing (LEP) Caregiving">Bachelor of Science in Nursing (LEP) Caregiving</option><option value="Bachelor of Science in Nursing THROUGH DIPLOMA IN MIDWIFERY (LEP)">Bachelor of Science in Nursing THROUGH DIPLOMA IN MIDWIFERY (LEP)</option><option value="Bachelor of Science in Nursing thru Midwifery (LEP)">Bachelor of Science in Nursing thru Midwifery (LEP)</option><option value="Bachelor of Science in Office Administration">Bachelor of Science in Office Administration</option><option value="Bachelor of Science in Office Administration (LEP)">Bachelor of Science in Office Administration (LEP)</option><option value="Bachelor of Science in Office Administration (LEP) Computer Education">Bachelor of Science in Office Administration (LEP) Computer Education</option><option value="Bachelor of Science in Office Administration (LEP) Office Management">Bachelor of Science in Office Administration (LEP) Office Management</option><option value="Bachelor of Science in Office Administration Computer Education">Bachelor of Science in Office Administration Computer Education</option><option value="Bachelor of Science in Office Administration Computer Secretarial Education">Bachelor of Science in Office Administration Computer Secretarial Education</option><option value="Bachelor of Science in Office Administration Office Management">Bachelor of Science in Office Administration Office Management</option><option value="Bachelor of Science in Physical Theraphy w/ AHSE">Bachelor of Science in Physical Theraphy w/ AHSE</option><option value="Bachelor of Science in Physical Therapy">Bachelor of Science in Physical Therapy</option><option value="Bachelor of Science in Public Administration">Bachelor of Science in Public Administration</option><option value="Bachelor of Science in Secondary Agricultural Education  Biology">Bachelor of Science in Secondary Agricultural Education  Biology</option><option value="Bachelor of Science in Special Education">Bachelor of Science in Special Education</option><option value="Bachelor of Science in Technical Teacher Education Automotive">Bachelor of Science in Technical Teacher Education Automotive</option><option value="Bachelor of Science in Tourism (BST/M)">Bachelor of Science in Tourism (BST/M)</option><option value="Bachelor of Science in Tourism Development Tourism Management">Bachelor of Science in Tourism Development Tourism Management</option><option value="Bachelor of Science in Tourism Food & Beverage Management">Bachelor of Science in Tourism Food & Beverage Management</option><option value="Bachelor of Science in Tourism Hotel & Resort Management">Bachelor of Science in Tourism Hotel & Resort Management</option><option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option><option value="Bachelor of Science in Tourism Management (LEP)">Bachelor of Science in Tourism Management (LEP)</option><option value="Bachelor of Science in Tourism Tour & Travel Management">Bachelor of Science in Tourism Tour & Travel Management</option><option value="Bachelor of Science in Tourism Travel management">Bachelor of Science in Tourism Travel management</option><option value="Bachelor of Science in Travel Management">Bachelor of Science in Travel Management</option><option value="Bachelor of Science in Veterinary Technology">Bachelor of Science in Veterinary Technology</option><option value="Bachelor of Science in Zoology">Bachelor of Science in Zoology</option><option value="Bachelor of Secondary Education  Biological Sciences">Bachelor of Secondary Education  Biological Sciences</option><option value="Bachelor of Secondary Education  Computer Education">Bachelor of Secondary Education  Computer Education</option><option value="Bachelor of Secondary Education  Let Law">Bachelor of Secondary Education  Let Law</option><option value="Bachelor of Secondary Education  Physical Science">Bachelor of Secondary Education  Physical Science</option><option value="Bachelor of Secondary Education  Social Studies">Bachelor of Secondary Education  Social Studies</option><option value="Bachelor of Secondary Education Biological Sciences">Bachelor of Secondary Education Biological Sciences</option><option value="Bachelor of Secondary Education Biology">Bachelor of Secondary Education Biology</option><option value="Bachelor of Secondary Education History">Bachelor of Secondary Education History</option><option value="Bachelor of Secondary Education Physical Science">Bachelor of Secondary Education Physical Science</option><option value="Bachelor of Technical Teacher Education  Electronics">Bachelor of Technical Teacher Education  Electronics</option><option value="Bachelor of Technical Teacher Education  Food  Service Management">Bachelor of Technical Teacher Education  Food  Service Management</option><option value="Bachelor of Technical Teacher Education Electronics Technology">Bachelor of Technical Teacher Education Electronics Technology</option><option value="Bachelor of Technology (LEP) Food Trades">Bachelor of Technology (LEP) Food Trades</option><option value="Bachelor of Technology Architectural Drafting">Bachelor of Technology Architectural Drafting</option><option value="Bachelor of Technology Food Service Management">Bachelor of Technology Food Service Management</option><option value="Bachelor of Technology Food Trades">Bachelor of Technology Food Trades</option><option value="Bachelor of Technology Garment Technology">Bachelor of Technology Garment Technology</option><option value="Bachelor of Technology Mechanical Technology">Bachelor of Technology Mechanical Technology</option><option value="Bachelor of Technology Welding and Fabrication">Bachelor of Technology Welding and Fabrication</option><option value="Bachelor of Technology, Major in Food Trades (LEP) Food Trades">Bachelor of Technology, Major in Food Trades (LEP) Food Trades</option><option value="Bachelor Refrigeration and Air-Conditoning Technology (LEP)">Bachelor Refrigeration and Air-Conditoning Technology (LEP)</option><option value="BS Elementary Education Computer Programing">BS Elementary Education Computer Programing</option><option value="Classical Liberal Arts Philosophy">Classical Liberal Arts Philosophy</option><option value="Computer Hardware Servicing NC-II">Computer Hardware Servicing NC-II</option><option value="Computer Programming NC-IV">Computer Programming NC-IV</option><option value="Diploma in Agricultural Technology">Diploma in Agricultural Technology</option><option value="Diploma in College Teaching">Diploma in College Teaching</option><option value="Diploma in Cooperative Management">Diploma in Cooperative Management</option><option value="Diploma in Cultural Education">Diploma in Cultural Education</option><option value="Diploma in Disaster-Risk Management">Diploma in Disaster-Risk Management</option><option value="Diploma in Educational Management">Diploma in Educational Management</option><option value="Diploma in Entrepreneurship">Diploma in Entrepreneurship</option><option value="Diploma in Fisheries Technology">Diploma in Fisheries Technology</option><option value="Diploma in Local Government Management">Diploma in Local Government Management</option><option value="Diploma in Midwifery">Diploma in Midwifery</option><option value="Diploma in Pre-School Education">Diploma in Pre-School Education</option><option value="Diploma in Public Administration">Diploma in Public Administration</option><option value="Diploma in Technology Electrical">Diploma in Technology Electrical</option><option value="Diploma in Technology Electronics">Diploma in Technology Electronics</option><option value="Diploma in Technology Refrigeration and Air-Conditioning">Diploma in Technology Refrigeration and Air-Conditioning</option><option value="Hotel and Restaurant Services">Hotel and Restaurant Services</option><option value="Hotel and Restaurant Services Technology">Hotel and Restaurant Services Technology</option>                                    </select>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-body">
                       <h5><b><span class="fa fa-cogs"></span>&nbsp;&nbsp;Grades</b></h5>
                      <hr/>
                      <div class="box-body">
					  
					   <br />
   <h4 align="center">Enter <?php echo $subtype;?> subjects Only</h4>
   <h6 align="center"><b>NOTE: Please do not include non-academic subjects (such as NSTP,CWTS, ROTC and PE)</b></h6>
  
    <br />
   <h6 align="Left"><b>Intructions:</b></h6>
 <ol>
  <li>Click the <span class="glyphicon glyphicon-plus"></span> button to add a new line of row </li>
  <li>Click the <span class="glyphicon glyphicon-minus"></span> button to remove the row </li>
  <li>Final Grades must be in a percentage  value <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_gwa">Click here</button> to view the rating value to percentage value</li>
</ol> 
  
   <br/>
 
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Enter Subject Name</th>
       <th>Enter Final Grade</th>
       <th>Enter Units</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     
    </div>
<div class="modal fade" id="modal_gwa" tabindex="-1" role="dialog" aria-labelledby="admin_login" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
            Please select Percentage Value
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th style="font-size:15px;">Numerical Value</th>
                        <th style="font-size:15px;">Percentage Value</th>
                    </tr>
                </thead>
                <tbody class="gwa_table">
                    <tr value="98.58">
                        <td>1.00</td>
                        <td>98.58</td>
                    </tr>
                    <tr value="96.91">
                        <td>1.10</td>
                        <td>96.91</td>
                    </tr>
                    <tr value="96.12">
                        <td>1.25</td>
                        <td>96.12</td>
                    </tr>
                    <tr value="94.32">
                        <td>1.30</td>
                        <td>94.32</td>
                    </tr>
                    <tr value="93.23">
                        <td>1.40</td>
                        <td>93.23</td>
                    </tr>
                    <tr value="92.65">
                        <td>1.50</td>
                        <td>92.65</td>
                    </tr>
                    <tr value="91.18">
                        <td>1.60</td>
                        <td>91.18</td>
                    </tr>
                    <tr value="90.18">
                        <td>1.70</td>
                        <td>90.18</td>
                    </tr>
                    <tr value="89.54">
                        <td>1.75</td>
                        <td>89.54</td>
                    </tr>
                    <tr value="88.82">
                        <td>1.80</td>
                        <td>88.82</td>
                    </tr>
                    <tr value="87.82">
                        <td>1.90</td>
                        <td>87.82</td>
                    </tr>
                    <tr value="86.80">
                        <td>2.00</td>
                        <td>86.80</td>
                    </tr>
                    <tr value="85.64">
                        <td>2.10</td>
                        <td>85.64</td>
                    </tr>
                    <tr value="84.64">
                        <td>2.20</td>
                        <td>84.64</td>
                    </tr>
                    <tr value="84.15">
                        <td>2.25</td>
                        <td>84.15</td>
                    </tr>
                    <tr value="83.27">
                        <td>2.30</td>
                        <td>83.27</td>
                    </tr>
                    <tr value="82.27">
                        <td>2.40</td>
                        <td>82.27</td>
                    </tr>
                    <tr value="81.28">
                        <td>2.50</td>
                        <td>81.28</td>
                    </tr>
                    <tr value="80.14">
                        <td>2.60</td>
                        <td>80.14</td>
                    </tr>
                    <tr value="79.00">
                        <td>2.70</td>
                        <td>79.00</td>
                    </tr>
                    <tr value="78.12">
                        <td>2.75</td>
                        <td>78.12</td>
                    </tr>
                    <tr value="77.45">
                        <td>2.80</td>
                        <td>77.45</td>
                    </tr>
                    <tr value="76.27">
                        <td>2.90</td>
                        <td>76.27</td>
                    </tr>
                    <tr value="75.00">
                        <td>3.00</td>
                        <td>75.00</td>
                    </tr>

                </tbody>
            </table>
            </center>
        </div>
	</div>	
</div>	
 </div>                
                        </div>

                    <div class="box-body">
                      <h5><b><span class="fa fa-file-text"></span>&nbsp;&nbsp;DOCUMENTS</b> (Can either be pdf or photos(jpg or png) formats)</h5>
                      <hr/>
                      <div class="box-body" >
                          <div id="img_error">
                          </div>
                         
                          
                         
                            
                       <div class="form-row">
					    <div class="form-group col-md-7">
                                  <span> Report Card </span>
                              </div>
							    <div class="form-group col-md-5">
							      <input type="hidden" name="report" value="Report Card"  >
                                  <input type="file" name="myfile"  accept="image/png, image/jpeg , application/pdf" id="file" onchange="return fileValidation()" required >
                              </div>
                          <?php while($row4=$result4->fetch_assoc()){?>
						  
                            <div class="form-group col-md-7">
                                  <span> <?php echo $row4['Req_Name'];?> </span>
                              </div>
                              <div class="form-group col-md-5">
							      <input type="hidden" name="doc[]" value="<?php echo $row4['Req_Name'];?>"  >
								   <input type="hidden" name="points[]" value="<?php echo $row4['Req_points'];?>"  >
                                  <input type="file" name="mydocs[]" accept="image/png, image/jpeg , application/pdf"  id="file" onchange="return fileValidation()"required >
                              </div>
                          
						  
						  <?php }?>
                              
                            </div>
                         
                         
                          
                          
                        
                          
                            
                          
                      </div>
                    </div>
                   
                      <input type="checkbox" id="agreed" name="agreed"  />
                      <span><i>I hereby certify that the information provided in this application is true and accurate and contains no false or misleading statements to the best of my knowledge. Any information found later to be false and inaccurate shall be a ground for the disapproval or cancellation of my application and/or award. Further, I understand that the documents submitted herein automatically become the property of <?php echo $row2['Agency_Name'];?>.</i></span>
                    </div>
                     <div class="col-md-2">
                      <br/>
                      <input type="submit" name="submit" class="btn btn-info" value="Submit">
                    </div>

                </form> 
          <!--END FORM-->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
 

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2019-2020 <a href="learningfromscratch.online">Scholarship Hub</a>.</strong> All rights
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
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

    

<script type="text/javascript">

function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.pdf only.');
        fileInput.value = '';
        return false;
    }
}
      function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }
</script>
 <script>

        $(document).ready(function(){
			
			$(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
  html += '<td><input type="number" step=".005" id="gwa" name="item_quantity[]" class="form-control item_quantity" /></td>';
  html += '<td><input type="number" name="item_unit[]" class="form-control item_unit" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
			
			
           $("#province").change(function(){
                $("#dist").val('');
                $("#zip").val('');
                if($(this).val()!=''){
                    $.ajax({
                        url: 'http://chedro5stufap.com/stufap/townlist',
                        type: 'post',
                        data: {"province":$(this).val()},
                        dataType: "json",
                        success: function(data){
                            $("#town").html('<option></option>');
                            $.each(data.town,function(i,post){
                                $("#town").append('<option value="'+post.town_name+'">'+post.town_name+'</option>');
                            });
                        }
                    });
                }
            });
            $("#town").change(function(){
                if($(this).val()!=''){
                    $.ajax({
                        url: 'http://chedro5stufap.com/stufap/town_data',
                        type: 'post',
                        data: {"town":$(this).val()},
                        success: function(data){
                            $.each(data.town,function(i,post){
                                $("#dist").val(post.dist);
                                $("#zip").val(post.zip_code);
                            });
                        }
                    });
                }
            });

         

        

            

            $("#apptype").on('change', function(e){
                e.preventDefault();
                $("#year").html('<option></option>');
                $("#gwa").val('');
                var sh = '<span> For Graduating Senior HS applicants - 1st Sem Senior HS Grades </span>';
                var hs = '<span> For Senior High School Graduates - Form 137 </span>';

                if($("#apptype").val()=='C'){
                    $("#year").append(''
                        +'<option selected>2</option>'
                        +'<option>3</option>'
                        +'<option>4</option>'
                        +'<option>5</option>'
                        +'');

                    $("#acad_req").html(''
                      +'<div class="form-group col-md-7">'
                            +'<span> Certificate of Grades in all subjects in completed semesters </span>'
                        +'</div>'
                        +'<div class="form-group col-md-5">'
                            +'<input type="file" name="cert_grades" id="cert_grades">'
                        +'</div>'
                      +'');
                    $("#gwa").prop('disabled',false);
                }else if($("#apptype").val()=='D'||$("#apptype").val()=='E'){
                    $("#year").append('<option selected>1</option>');
                    $("#gwa").val(80);
                    $("#gwa").prop('disabled',true);
                    var als = '<span> Accreditation and Equivalency Test Passer Certificate </span>';
                    var pept = '<span> Certificate of Advancing to the Next Level </span>';
                    $("#acad_req").html(''
                      +'<div class="form-group col-md-7">'
                            +(($("#apptype").val()=='D')? als:pept)
                        +'</div>'
                        +'<div class="form-group col-md-5">'
                            +'<input type="file" name="cert_grades" id="cert_grades">'
                        +'</div>'
                      +'');

                }else{
                  $("#gwa").prop('disabled',false);
                  $("#acad_req").html(''
                      +'<div class="form-group col-md-7">'
                            +(($("#apptype").val()=='A')? sh:hs)
                        +'</div>'
                        +'<div class="form-group col-md-5">'
                            +'<input type="file" name="cert_grades" id="cert_grades">'
                        +'</div>'
                      +'');
                  $("#year").append('<option selected>1</option>');
                }
            });




            $("input[name='pwd']").change(function(){
                if($("input[name='pwd']:checked").val()=='yes'){
                  $("#typeofpwd").prop('disabled',false);
                  $("#pwd_cert").prop('disabled',false);
                }else{
                  $("#typeofpwd").prop('disabled',true);
                  $("#pwd_cert").prop('disabled',true);
                  $("#pwd_cert").val('');
                  $("#typeofpwd").val('');
                }
            });

            $("input[name='ip']").change(function(){
                if($("input[name='ip']:checked").val()=='yes'){
                  $("#ip_cert").prop('disabled',false);
                }else{
                  $("#ip_cert").prop('disabled',true);
                  $("#ip_cert").val('');
                }
            });
            $("input[name='sp']").change(function(){
                if($("input[name='sp']:checked").val()=='yes'){
                  $("#sp_cert").prop('disabled',false);
                }else{
                  $("#sp_cert").prop('disabled',true);
                  $("#sp_cert").val('');
                }
            });


            $(".select2").select2();

            $("#course").change(function(){
              $("#npcourse").val(null).trigger('change');
              //console.log($("#npcourse").val());
              if($(this).val()=='Non Priority Course'){
                $("#npcourse").prop('disabled',false);
              }else{
                $("#npcourse").prop('disabled',true);
              }
            });

            $("#typeofpwd").change(function(){
              $("#other_pwd").val('');
              if($(this).val()=='Others'){
                $("#other_pwd").prop('disabled',false);
              }else{
                $("#other_pwd").prop('disabled',true);
              }
            });


             $("#pic,#proof_income,#gmc,#sp_cert,#ip_cert,#pwd_cert,#aff_guard").change(function() {
                var file = this.files[0];     
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                    $("#img_error").html('<div class="alert alert-danger" style="font-size:12px;">Please select a valid image file (JPEG/JPG/PNG)</div>');
                    $(this).val('');
                    return false;
                }else{
                    $("#img_error").empty();
                }
            });

            $("#guardianname").change(function(){
              if($(this).val()!=''){
                $("#aff_guard").prop('disabled',false);
              }else{
                $("#aff_guard").prop('disabled',true);
              }
            });
            
            $("#print-close").click(function(){
                $('#modal-print').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                window.location.href='http://chedro5stufap.com/index.php/application/form';
            });
            
            $("#lbl_yrin").text("("+$("#a_year").val()+")");
            $("#a_year").change(function(){
                $("#lbl_yrin").text("("+$(this).val()+")");
            });
          
        });
    </script>
<script>
  $("#registerCandidates").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>

</body>
</html>
