<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Scholarship HUB</title>
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="../js/tinymce/tinymce.min.js"></script>

  <script>tinymce.init({ selector:'#description', height: 300 });</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		
<style type="text/css">
#register_form fieldset:not(:first-of-type) {
display: none;
}
</style>
		

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Scholarship</b> HUB</span>
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
                  <li class="active"><a href="create-job-post.php"><i class="fa fa-file-o"></i>Post A Scholarship</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> Scholarship Posts</a></li>
                  <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Scholarship Applications</a></li>
                     <li><a href="dss.php"><i class="glyphicon glyphicon-tasks"></i> Scholarships ended</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="resume-database.php"><i class="fa fa-user"></i> Verified Applicants</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        
		  
		  <div class="container ">
		  
<h2>Post Scholarship</h2>
<div class="progress">
<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="alert alert-success hide"></div>
<form id="register_form" novalidate action="form_action.php" method="post">
<fieldset>
<h2>Step 1: For Whom the Scholarship*</h2>
<div class="form-group">
                   <select class="form-control input-lg" id="sel1" name="appt" placeholder="Select for whom the scholarship" required="">
                    <option value="">Select for whom the scholarship</option>
                     <option value='1'>High School Students</option>
                      <option value='2'>College Students</option>
                    
                      </select>
                  </div>
<input type="button" class="next-form btn btn-info" value="Next" />
</fieldset>
<fieldset>
<h2> Step 2:Requirements*</h2>
<div class="form-group">

  <h3 align="center"><b>All the Points should be 100pts in total</b></h6>
    <h5 align="center"><b>Note: Don't put report card in requirements.It is already set.</b></h6>
</div>
 <br/>
<h6 align="Left"><b>Intruction:</b></h6>
 <ol>
  <li>Click the <span class="glyphicon glyphicon-plus"></span> button to add a new line of row </li>
  <li>Click the <span class="glyphicon glyphicon-minus"></span> button to remove the row </li>
 
</ol> 
  
   <br/>
<div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Requirement's Name</th>
       <th>Description</th>
       <th>Points</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
<h4 align="center">Total:<span id="total_sum_value"></span></h6>     
    </div>
<input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
<input type="button" name="next" class="next-form btn btn-info" value="Next" id="myBtn" />
<br>
</fieldset>
<fieldset>
<h2>Step 3: Additional Details</h2>
 <div class="form-group">
 <label>Required Slots*</label>
                    <input type="number" class="form-control  input-lg" id="slots"  autocomplete="off" name="slots" placeholder="Max Applicant qouta" required="">
                  </div>
<div class="form-group">
<label>Required Subject*</label>
                <input type="text" class="form-control  input-lg"  id="subtype" name="subtype" placeholder="Enter the a single type of subject, Ex: math subject" >
                  </div>
<div class="form-group">
				<label>Deadline:*</label>
                    <input type="text" class="form-control  input-lg" id="shootdate" name="deadline" placeholder="Deadline" required="">
                  </div>
				  <div class="form-group">
                    <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description" >Please enter the description of the scholarship</textarea>
                  </div>
<input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
<input type="submit" name="submit" class="submit btn btn-success" value="Submit" />

</fieldset>
</form>
</div>
<br>		  
		  
		  
		  
       
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2019-2020 <a href="">Scholarship HUB</a>.</strong> All rights
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
<script src="../js/adminlte.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  	<script>
		
		$(document).ready(function(){
if(!$("#item_table .txtCal").val()) {
 document.getElementById("myBtn").disabled = true;
}		
	$("#item_table").on('input', '.txtCal', function () {
       var calculated_total_sum = 0;
     
       $("#item_table .txtCal").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
			 if (calculated_total_sum > 100){
				 alert("Total must not be over or lessthan than 100");
				    document.getElementById("myBtn").disabled = true;
			 }else if (calculated_total_sum < 100){
				 document.getElementById("myBtn").disabled = true;
				  
			 }else{
				  document.getElementById("myBtn").disabled = false;
			 }
              $("#total_sum_value").html(calculated_total_sum);
       });
			
			$(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="Req[]" class="form-control Req" required/></td>';
  html += '<td><input type="textarea" name="desc[]" class="form-control desc" required/></td>';
  html += '<td><input type="number"  step=".01" class="txtCal" name="points[]" class="form-control points" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });		
			
			
			
var form_count = 1, previous_form, next_form, total_forms;
total_forms = $("fieldset").length;
$(".next-form").click(function(){
previous_form = $(this).parent();
next_form = $(this).parent().next();
next_form.show();
previous_form.hide();
setProgressBarValue(++form_count);
});
$(".previous-form").click(function(){
previous_form = $(this).parent();
next_form = $(this).parent().prev();
next_form.show();
previous_form.hide();
setProgressBarValue(--form_count);
});
setProgressBarValue(form_count);
function setProgressBarValue(value){
var percent = parseFloat(100 / total_forms) * value;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
.html(percent+"%");
}
// Handle form submit and validation
$( "#register_form" ).submit(function(event) {
var error_message = '';
if(!$("#sel1").val()) {
error_message+="<br>Please select applicant type:Located 1st Form";
}
if(!$("#slots").val()) {
error_message+="<br>Please enter the desired available slot(s):Located 3rd Form";
}if(!$("#subtype").val()) {
error_message+="<br>Please enter the required subject:Located 3rd Form";
}if(!$("#shootdate").val()) {
error_message+="<br>Please enter the scholarship's deadline:Located 3rd Form";
}
if(!$("#description").val()) {
error_message+="<br>Please enter the scholarship description:Located 3rd Form";
}




// Display error if any else submit form
if(error_message) {
$('.alert-success').removeClass('hide').html(error_message);
return false;
} else {
return true;
}
});
});
	  		$( function() {
	   			$( "#shootdate" ).datepicker({
	   				minDate: 0
	   			});
	  		});
			
			
	  	</script>
</body>
</html>
