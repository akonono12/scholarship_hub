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


<?php
session_start();
require_once("../db.php");


require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;


if(isset($_POST['download'])){
		


$document = new Dompdf();
	
$output='


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
                  <input type="text" class="form-control" id="lastname" name="lname" value= '.$fetch['Lname'].'placeholder="" readonly ="enabled">
                </div>
                <div class="form-group col-md-4">
                  <span for="firstname">First Name <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="firstname" name="fname" value= '.$fetch['Fname'].' placeholder="" readonly ="enabled">
                </div>
                <div class="form-group col-md-4">
                  <span for="middlename">Middle Name <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="middlename" name="mname" value= '.$fetch['Mname'].' placeholder="" readonly ="enabled">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <span for="birthdate">Date of Birth <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="birthdate" name="bday" placeholder="" value= '.$fetch['Dob'].' readonly ="enabled">
                </div>
                <div class="form-group col-md-4">
                  <span for="birthplace">Place of Birth <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="birthplace" name="bplace" placeholder="" value= '.$fetch['Pob'].' readonly ="enabled">
                </div>
                <div class="form-group col-md-2">
                  <span for="sex">Sex <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="sex" name="sex" placeholder="" readonly ="enabled" value="">
                   
                  
                </div>
                <div class="form-group col-md-3">
                  <span for="province">Province <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="province" name="province" placeholder="" value= '.$fetch['province'].' readonly ="enabled">
                    
                </div>
              </div>
        
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <span for="street">Street/Barangay <span class="text-danger"></span></span>
                      <input type="text" class="form-control" id="street" name="street" placeholder="" value= '.$fetch['barangay'].' readonly ="enabled" >
                    </div>
                <div class="form-group col-md-4">
                  <span for="town">Town <span class="text-danger"></span></span>
				  <input type="text" class="form-control" id="town" name="town" placeholder="" value= '.$fetch['town'].' readonly ="enabled">
                 
                    
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <span for="dist">District <span class="text-danger"></span></span>
                  <input type="text" class="form-control" id="district" name="district" placeholder="" value= '.$fetch['district'].' readonly ="enabled">
				 
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-2">
                      <span for="zip">Zip Code <span class="text-danger"></span></span>
                      <input type="text" class="form-control" id="zip" name="zip" placeholder="" value= '.$fetch['zip_code'].' readonly ="enabled">
                    </div>
                  <div class="form-group col-md-3">
                      <span for="contact">Contact No. <span class="text-danger"></span></span>
                      <input type="number" class="form-control" id="contact" name="contactno" placeholder="" value= '.$fetch['con_no'].' readonly ="enabled">
                  </div>
                  <div class="form-group col-md-5">
                      <span for="email">Email <span class="text-danger"></span></span>
                      <input type="email" class="form-control" id="email" name="email" placeholder=""  value= '.$fetch['email_add'].' readonly ="enabled">
                  </div>
                    <div class="form-group col-md-2">
                      <span for="sibling">No. of Siblings <span class="text-danger"></span></span>
                      <input type="number" class="form-control" id="sibling" name="sibling" placeholder="" value= '.$fetch['num_sib'].' readonly ="enabled" />
                    </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-5">
                      <span for="fb">Facebook Account <span class="text-danger"></span></span>
                      <input type="text" class="form-control" id="fb" name="fb" placeholder="Email/Phone/Username/Name"  value= '.$fetch['fb_acc'].' readonly ="enabled" >
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
                                            <input type="text" class="form-control" id="fathername" name="fathername" placeholder="" value= '.$fetch['F_Name'].' readonly ="enabled" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <span for="fatherocc">Occupation <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="fatherocc" name="fatherocc" placeholder="" value= '.$fetch['F_Occ'].' readonly ="enabled" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="fatheradd">Address <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="fatheradd" name="fatheradd" placeholder="" value= '.$fetch['F_Address'].' readonly ="enabled">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="fatheredu">Educational Attainment <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="fatheredu" name="fatheredu" value= '.$fetch['F_attain'].' placeholder="" readonly ="enabled">
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">MOTHER <span class="text-danger"></span></label><br/>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="mothername">Complete Name <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="mothername" name="mothername" placeholder="" value= '.$fetch['M_name'].' readonly ="enabled" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <span for="motherocc">Occupation <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="motherocc" name="motherocc" placeholder=""  value= '.$fetch['M_Occ'].' readonly ="enabled" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="motheradd">Address <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="motheradd" name="motheradd" placeholder="" value= '.$fetch['M_add'].' readonly ="enabled" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="motheredu">Educational Attainment <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="motheredu" name="motheredu" placeholder="" value= '.$fetch['M_attain'].' readonly ="enabled">
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
                                            <input type="text" class="form-control" id="guardianname" name="guardianname" placeholder="" value= '.$fetch['G_name'].' readonly ="enabled">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <span for="guardianocc">Occupation <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="guardianocc" name="guardianocc" placeholder="" value= '.$fetch['G_Occ'].' readonly ="enabled">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="guardianadd">Address <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="guardianadd" name="guardianadd" placeholder="" value= '.$fetch['G_Addres'].' readonly ="enabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">FAMILY/GUARDIANS INCOME <span class="text-danger"></span></label><br/>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <span for="income">PARENTS/GUARDIAN ANNUAL GROSS INCOME <span class="text-danger"></span></span>
                                            <input type="text" class="form-control" id="income" name="income" placeholder="" value= '.$fetch['Fam_grinc'].' readonly ="enabled" >
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
                                    <span for="apptype">Applicants Type <span class="text-danger"></span></span>
                                    <input type="text" class="form-control" id="apptype" name="apptype" readonly ="enabled" value="">
                                       
                                   
                                </div>
                                <div class="form-group col-md-2">
                                    <span for="year">Year Level <span class="text-sm" id="lbl_yrin"></span> <span class="text-danger"></span></span>
                                    <input type="text"  class="form-control" id="year" name="year" placeholder="" value= '.$fetch['year_level'].' readonly ="enabled" >
                                    
                                </div>
                                <div class="form-group col-md-2">
                                    <span for="gwa">GWA <span class="text-danger"></span></span>
                                    <input type="text" class="form-control" id="gwa" name="gwa" placeholder="" readonly ="enabled" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <span for="hs">High School Graduated <span class="text-danger"></span></span>
                                    <input type="text" class="form-control" id="hs" name="hs" placeholder="" value= '.$fetch['hs_grad'].' readonly ="enabled" >
                                </div>
                                
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group ">
                                    <span for="college">College/University <span class="text-danger"></span></span>
                                    <input type="text" class="form-control select2" id="college" name="college" placeholder="" value= '.$fetch['college'].' readonly ="enabled" >

                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span for="course">Current Course/Course to take <span class="text-danger"></span></span>
                                    <input type="text" class="form-control select2" id="course" name="course" placeholder="" value= '.$fetch['cur_course'].' readonly ="enabled" >
                                        
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
                      

                   
                  
                      <span><i>I hereby certify that the information provided in this application is true and accurate and contains no false or misleading statements to the best of my knowledge. Any information found later to be false and inaccurate shall be a ground for the disapproval or cancellation of my application and/or award. Further, I understand that the documents submitted herein automatically become the property of '.$rowsss['Agency_Name'].'</i></span>
                    </div>
                    <div class="col-md-2">
                      <br/>
					
                    </div>
                   
                  
          <!--END FORM-->

        </div>
';

$document->loadHtml($output);

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("ApplicationForm");
	
}




?>


<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>