<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
 $scholar=base64_decode(urldecode($_GET['a']));
$selapp="Select * from post_scholar where scholar_id='$scholar'";
$selap=$conn->query($selapp);
$row1s=$selap->fetch_assoc();

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
                  <li ><a href="job-applications.php"><i class="fa fa-file-o"></i> Scholarship Application</a></li>
                     <li class="active"><a href="dss.php"><i class="glyphicon glyphicon-tasks"></i> Scholarships ended</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="resume-database.php"><i class="fa fa-user"></i> Verified Applicants</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
         <div class="col-md-9 bg-white padding-2">
            <h2><i>Applicants that meet the requirements</i></h2>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Name</th>
                      <th>Contact</th>
                      <th>Email</th>
					  <th>Total Points</th>
					  <th>Family ANNUAL GROSS INCOME</th>
					  <th>TimeCreated</th>
					  <th>Action</th>
                    </thead>
                    <tbody>
                    <?php
					  	  ///base64_decode urldecode-encryption code
				  $da=base64_decode(urldecode($_GET['a']));
				
					$dc=base64_decode(urldecode($_GET['c']));
					 $dd=base64_decode(urldecode($_GET['d']));
					// dss get all data from url parameters and fetch the data that meets the condition
					
					if ($row1s['applicant_type']== '1'){
						  $sql = "SELECT  * FROM `apply_scholar` inner JOIN post_scholar on apply_scholar.scholar_id=post_scholar.scholar_id inner join applicant on applicant.Applicant_id=apply_scholar.Applicant_id inner join application_form on apply_scholar.Application_id=application_form.Applictn_id where post_scholar.agency_id = '$_SESSION[id_company]' AND apply_scholar.scholar_id = '$da' and apply_scholar.status <> 3 and apply_scholar.status <> 1 and apply_scholar.tl_pts between '80' and '100' ORDER BY `apply_scholar`.`tl_pts` DESC,application_form.Fam_grinc ASC  limit $dd   ";
					}else{
                       $sql = "SELECT  * FROM `apply_scholar` inner JOIN post_scholar on apply_scholar.scholar_id=post_scholar.scholar_id inner join applicant on applicant.Applicant_id=apply_scholar.Applicant_id inner join application_form on apply_scholar.Application_id=application_form.Applictn_id where post_scholar.agency_id = '$_SESSION[id_company]' AND apply_scholar.scholar_id = '$da' and apply_scholar.status <> 3 and apply_scholar.status <> 1 and apply_scholar.tl_pts between '80' and '100' ORDER BY `apply_scholar`.`tl_pts` DESC,application_form.Fam_grinc ASC  limit $dd   ";
					}  
                            $result = $conn->query($sql);
				            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) 
                              {     

                               
                      ?>
                      <tr>
                        <td><?php echo $row['Fname']." ".$row['Lname'] ; ?></td>
                        <td><?php echo $row['con_no']; ?></td>
                        <td><?php echo $row['email_add']?> </td>
						<td><?php echo $row['tl_pts']?> </td>
						<td><?php echo "Php ".$row['Fam_grinc'] . ".00"?> </td>
                        <td><?php echo $row['TimeCreated']; ?></td>
                        <td><a href="user-application.php?appid=<?php echo $row['Applicant_id'];?>&idb=<?php echo $da;?>&opid=2" > <span class="glyphicon glyphicon-folder-open"></span></a></td>
                      </tr>


                      <?php

                        }
							  
                      }else {
					  echo "no data found";}
                      ?>

                    </tbody>                    
                  </table>
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
      <strong>Copyright &copy; 2018-2019 <a href="learningfromscratch.online">Scholarship Hub</a>.</strong> All rights
    reserved.
    </div>
  </footer>



</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
