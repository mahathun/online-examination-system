<?php
if (isset($_GET['success']) && $_GET['success']==true) {
	echo '
	<html ng-app>
	<head>
		<title> Sign UP </title>

		<!-- Bootstrap core CSS -->
		<link href="lib/css/bootstrap.min.css" rel="stylesheet">

		<!-- signup css-->
		<link href="lib/css/signup.css" rel="stylesheet">

		<!-- jquery -->	
		<script type="text/javascript" src="lib/js/jquerry.js">

		</script>
		<!-- bootstrap js -->
		<script type="text/javascript" src="lib/js/bootstrap.min.js">

		</script>

		<!-- datepicker css -->
		<link href="lib/css/datepicker3.css" rel="stylesheet">
		<!-- datepicker js -->
		<script type="text/javascript" src="lib/js/bootstrap-datepicker.js">

		</script>


		<!-- select js -->
		<link href="lib/css/bootstrap-select.css" rel="stylesheet">
		<script type="text/javascript" src="lib/js/bootstrap-select.js">

		</script>

		<!-- angular js library -->
		<script type="text/javascript" src="lib/js/angular.min.js"></script>

		<script type="text/javascript" >


function Redirect() 
{  
window.location="index.php"; 
} 

setTimeout(\'Redirect()\', 3000);   


			$(window).on("load", function () {

				$(".selectpicker").selectpicker({
					"selectedText": "cat"
				});

            // $(".selectpicker").selectpicker("hide");
});

$(function(){
	$("a[title]").tooltip();
});


function changeUserType(x){
	if(x=="admin"){	
		$("#admin").removeClass("btn-default").addClass("btn-primary");			
		$("#teacher").removeClass("btn-primary").addClass("btn-default");
		$("#student").removeClass("btn-primary").addClass("btn-default");
	}else if(x=="teacher"){
		$("#admin").removeClass("btn-primary").addClass("btn-default");			
		$("#teacher").removeClass("btn-default").addClass("btn-primary");
		$("#student").removeClass("btn-primary").addClass("btn-default");		
	}else if(x=="student"){
		$("#admin").removeClass("btn-primary").addClass("btn-default");			
		$("#teacher").removeClass("btn-primary").addClass("btn-default");
		$("#student").removeClass("btn-default").addClass("btn-primary");		
	}

}


function toggleGender(y){
	if(y=="male"){	
		$("#gender").val("Male");	
		$("#male").removeClass("btn-default").addClass("btn-primary");
		$("#female").removeClass("btn-primary").addClass("btn-default");
	}else if(y=="female"){
		$("#gender").val("Female");
		$("#female").removeClass("btn-default").addClass("btn-primary");
		$("#male").removeClass("btn-primary").addClass("btn-default");				
	}
}

function toggleMarital(y){
	if(y=="single"){	
		$("#maritalStatus").val("Single");
		$("#single").removeClass("btn-default").addClass("btn-primary");
		$("#married").removeClass("btn-primary").addClass("btn-default");
		$("#widowed").removeClass("btn-primary").addClass("btn-default");
		$("#divorced").removeClass("btn-primary").addClass("btn-default");
	}else if(y=="married"){
		$("#maritalStatus").val("Married");
		$("#single").removeClass("btn-primary").addClass("btn-default");
		$("#married").removeClass("btn-default").addClass("btn-primary");
		$("#widowed").removeClass("btn-primary").addClass("btn-default");
		$("#divorced").removeClass("btn-primary").addClass("btn-default");
	}else if(y=="widowed"){
		$("#maritalStatus").val("Widowed");
		$("#single").removeClass("btn-primary").addClass("btn-default");
		$("#married").removeClass("btn-primary").addClass("btn-default");
		$("#widowed").removeClass("btn-default").addClass("btn-primary");
		$("#divorced").removeClass("btn-primary").addClass("btn-default");
	}else if(y=="divorced"){
		$("#maritalStatus").val("Divorced");
		$("#single").removeClass("btn-primary").addClass("btn-default");
		$("#married").removeClass("btn-primary").addClass("btn-default");
		$("#widowed").removeClass("btn-primary").addClass("btn-default");
		$("#divorced").removeClass("btn-default").addClass("btn-primary");
	}
}

$(document).ready(function () {

	$("#datepicker input").datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		todayHighlight: true,
		startDate: "1987-1-1",
		startView: 2,
		autoclose: true
	});  

});

		//selecting the user type
$(document).ready(function(){
	$("#teacher").click(function(){
		$("#userType").val("Teacher");
		$(".student-only").removeClass("show").addClass("hidden");
		$(".teacher-only").removeClass("hidden").addClass("show");

	});

$("#student").click(function(){
	$("#userType").val("Student");
	$(".student-only").removeClass("hidden").addClass("show");
	$(".teacher-only").removeClass("show").addClass("hidden");

});
});

function init(){

	$(".student-only").removeClass("hidden").addClass("show");
	$(".teacher-only").removeClass("show").addClass("hidden");


}


</script>


</head>

<body onload="init()">

	<section style="background:#efefe9;">
		<div class="container">
			<div class="row">
				<div class="board">

					<div class="board-inner">
						<ul class="nav nav-tabs" id="myTab">
							<div class="liner"></div>
							<li id="home-li" >
								<a >
									<span class="round-tabs one icon-disable">
										<i class="glyphicon glyphicon-home icon-place"></i>
									</span> 
								</a></li>

								<li id="profile-li"><a >
									<span class="round-tabs two icon-disable">
										<i class="glyphicon glyphicon-user icon-place" ></i>
									</span> 
								</a>
							</li>

							<li id="degree-li" >
								<a >
									<span class="round-tabs three icon-disable">
										<i class="glyphicon glyphicon-book icon-place" ></i>
									</span> </a>
								</li>

								<li id="review-li">
									<a >
										<span class="round-tabs four icon-disable">
											<i class="glyphicon glyphicon-list icon-place"></i>
										</span> 
									</a></li>

									<li class="active" ><a >
										<span class="round-tabs five icon-finish">
											<i class="glyphicon glyphicon-ok icon-place " ></i>
										</span> </a>
									</li>

								</ul></div>

								<div >
									<div>
										<div class="text-center">
											<i class="img-intro icon-checkmark-circle"></i>
										</div>

										<br><br>
										<h3 class="head text-center">Thank you for registering</h3>
										<p class="narrow text-center">
											We"ll process your request and will soon come back to you. Stay tune for an email. 


											<br>
											<a href="index.php">Please click here if you were not automatically redirected.</a>
										</p>
									</div>
									<div class="clearfix"></div>
								</div>

							</div>
						</div>
					</div>
				</section>
			</body>
			</html>
			';
		} else {
			echo '
			<html ng-app>
			<head>
				<title> Sign UP </title>

				<!-- Bootstrap core CSS -->
				<link href="lib/css/bootstrap.min.css" rel="stylesheet">

				<!-- signup css-->
				<link href="lib/css/signup.css" rel="stylesheet">

				<!-- jquery -->	
				<script type="text/javascript" src="lib/js/jquerry.js">

				</script>
				<!-- bootstrap js -->
				<script type="text/javascript" src="lib/js/bootstrap.min.js">

				</script>

				<!-- datepicker css -->
				<link href="lib/css/datepicker3.css" rel="stylesheet">
				<!-- datepicker js -->
				<script type="text/javascript" src="lib/js/bootstrap-datepicker.js">

				</script>


				<!-- select js -->
				<link href="lib/css/bootstrap-select.css" rel="stylesheet">
				<script type="text/javascript" src="lib/js/bootstrap-select.js">

				</script>

				<!-- angular js library -->
				<script type="text/javascript" src="lib/js/angular.min.js"></script>


				<script type="text/javascript" >

					$(window).on("load", function () {

						$(".selectpicker").selectpicker({
							"selectedText": "cat"
						});

            // $(".selectpicker").selectpicker("hide");
});

$(function(){
	$("a[title]").tooltip();
});


function changeUserType(x){
	if(x=="admin"){	
		$("#admin").removeClass("btn-default").addClass("btn-primary");			
		$("#teacher").removeClass("btn-primary").addClass("btn-default");
		$("#student").removeClass("btn-primary").addClass("btn-default");
	}else if(x=="teacher"){
		$("#admin").removeClass("btn-primary").addClass("btn-default");			
		$("#teacher").removeClass("btn-default").addClass("btn-primary");
		$("#student").removeClass("btn-primary").addClass("btn-default");		
	}else if(x=="student"){
		$("#admin").removeClass("btn-primary").addClass("btn-default");			
		$("#teacher").removeClass("btn-primary").addClass("btn-default");
		$("#student").removeClass("btn-default").addClass("btn-primary");		
	}

}


function toggleGender(y){
	if(y=="male"){	
		$("#gender").val("Male");	
		$("#male").removeClass("btn-default").addClass("btn-primary");
		$("#female").removeClass("btn-primary").addClass("btn-default");
	}else if(y=="female"){
		$("#gender").val("Female");
		$("#female").removeClass("btn-default").addClass("btn-primary");
		$("#male").removeClass("btn-primary").addClass("btn-default");				
	}
}

function toggleMarital(y){
	if(y=="single"){	
		$("#maritalStatus").val("Single");
		$("#single").removeClass("btn-default").addClass("btn-primary");
		$("#married").removeClass("btn-primary").addClass("btn-default");
		$("#widowed").removeClass("btn-primary").addClass("btn-default");
		$("#divorced").removeClass("btn-primary").addClass("btn-default");
	}else if(y=="married"){
		$("#maritalStatus").val("Married");
		$("#single").removeClass("btn-primary").addClass("btn-default");
		$("#married").removeClass("btn-default").addClass("btn-primary");
		$("#widowed").removeClass("btn-primary").addClass("btn-default");
		$("#divorced").removeClass("btn-primary").addClass("btn-default");
	}else if(y=="widowed"){
		$("#maritalStatus").val("Widowed");
		$("#single").removeClass("btn-primary").addClass("btn-default");
		$("#married").removeClass("btn-primary").addClass("btn-default");
		$("#widowed").removeClass("btn-default").addClass("btn-primary");
		$("#divorced").removeClass("btn-primary").addClass("btn-default");
	}else if(y=="divorced"){
		$("#maritalStatus").val("Divorced");
		$("#single").removeClass("btn-primary").addClass("btn-default");
		$("#married").removeClass("btn-primary").addClass("btn-default");
		$("#widowed").removeClass("btn-primary").addClass("btn-default");
		$("#divorced").removeClass("btn-default").addClass("btn-primary");
	}
}

$(document).ready(function () {

	$("#datepicker input").datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		todayHighlight: true,
		startDate: "1987-1-1",
		startView: 2,
		autoclose: true
	});  

});

		//selecting the user type
$(document).ready(function(){
	$("#teacher").click(function(){
		$("#userType").val("Teacher");
		$(".student-only").removeClass("show").addClass("hidden");
		$(".teacher-only").removeClass("hidden").addClass("show");

	});

$("#student").click(function(){
	$("#userType").val("Student");
	$(".student-only").removeClass("hidden").addClass("show");
	$(".teacher-only").removeClass("show").addClass("hidden");

});
});

function init(){

	$(".student-only").removeClass("hidden").addClass("show");
	$(".teacher-only").removeClass("show").addClass("hidden");


}


</script>
</head>

<body onload="init()">

	<section style="background:#efefe9;">
		<div class="container">
			<div class="row">
				<div class="board">

					<div class="board-inner">
						<ul class="nav nav-tabs" id="myTab">
							<div class="liner"></div>
							<li id="home-li" class="active" >
								<a href="#home" data-toggle="tab" title="welcome">
									<span class="round-tabs one">
										<i class="glyphicon glyphicon-home icon-place"></i>
									</span> 
								</a></li>

								<li id="profile-li"><a href="#profile" data-toggle="tab" title="Personal Information">
									<span class="round-tabs two">
										<i class="glyphicon glyphicon-user icon-place" ></i>
									</span> 
								</a>
							</li>

							<li id="degree-li" ><a href="#degree" data-toggle="tab" title="Degree">
								<span class="round-tabs three">
									<i class="glyphicon glyphicon-book icon-place"></i>
								</span> </a>
							</li>

							<li id="review-li"><a href="#review" data-toggle="tab" title="Review">
								<span class="round-tabs four">
									<i class="glyphicon glyphicon-list icon-place"></i>
								</span> 
							</a></li>

							<li ><a >
								<span class="round-tabs five">
									<i class="glyphicon glyphicon-ok icon-place"></i>
								</span> </a>
							</li>

						</ul></div>

						<div class="tab-content">
							<div class="tab-pane fade in active" id="home">

								<h3 class="head text-center">Welcome...</h3>
								<p class="narrow text-center">
									Please select the user type,
								</p>

								<div class="col-md-12">
									<div class="btn-group div-center center-block" >
										<button id="admin" type="button" disabled="" class="btn btn-default" onclick="changeUserType(\'admin\')">Admin</button>
										<button id="teacher" type="button" class="btn btn-default" onclick="changeUserType(\'teacher\')">Teacher</button>
										<button id="student" type="button" class="btn btn-primary" onclick="changeUserType(\'student\')">Student</button>
									</div>
									<br><br><br>
									                      
								</div>
								
								<div class="col-md-12">
									<p class="text-center">
										<a href="#profile" data-toggle="tab" data-original-title="profile" class="btn btn-success btn-outline-rounded green" onclick="$(\'#home-li\').removeClass(\'active\');$(\'#profile-li\').addClass(\'active\')"> Next <span style="margin-left:10px;" class="glyphicon glyphicon-user"></span></a>
									</p>
								</div>
							</div>

							<div class="tab-pane fade" id="profile">
								<h3 class="head text-center">Personal Information</h3>
								<p class="narrow text-center">


									<!-- Row start -->
									<div class="row">
										<div class="col-md-10 col-sm-6 col-xs-12 div-block-center center-block">
											<div class="panel panel-default">
												<div class="panel-heading clearfix">
													<i class="icon-calendar"></i>
													<h3 class="panel-title">Section 1</h3>
												</div>

												<div class="panel-body">




													<div class="row form-group">
														<label class="col-md-2 control-label">Name</label>
														<div class="col-md-10">
															<div class="row">
																<div class="col-md-4">
																	<input ng-model="fname" type="text" class="form-control" placeholder="First Name">
																</div>
																<div class="col-md-4 ">
																	<input ng-model="mname" type="text" class="form-control" placeholder="Middle Name">
																</div>
																<div class="col-md-4">
																	<input ng-model="lname" type="text" class="form-control" placeholder="Last Name">
																</div>
															</div>
														</div>
													</div>

													<div class="row form-group teacher-only">
														<label class="col-md-2 control-label ">Marital Status</label>

														<div class="col-md-10">
															<div class="btn-group"> 
																<button id="single" class="btn btn-sm btn-primary" onclick="toggleMarital(\'single\')">Single</button>
																<button id="married" class="btn btn-sm btn-default" onclick="toggleMarital(\'married\')">Married</button>
																<button id="widowed" class="btn btn-sm btn-default" onclick="toggleMarital(\'widowed\')">Widowed</button>
																<button id="divorced" class="btn btn-sm btn-default" onclick="toggleMarital(\'divorced\')">Divorced</button>
															</div>
														</div>
													</div>

													<div class="row form-group teacher-only">
														<label class="col-md-2 control-label">NIC. No</label>
														<div class="col-md-10">
															<input ng-model="nic" type="text" name="regular" class="form-control" placeholder="National Identity Card No.">
														</div>
													</div>





													<div class="row form-group student-only">
														<label class="col-md-2 control-label">Reg. No.</label>
														<div class="col-md-10">
															<input ng-model="regNo" type="text" name="regular" class="form-control" placeholder="Registration Number">
														</div>
													</div>


													<div class="row form-group">
														<label class="col-md-2 control-label">Gender</label>

														<div class="col-md-10">
															<div class="btn-group div-center"> 
																<button id="male" class="btn btn-sm btn-primary" onclick="toggleGender(\'male\')">Male</button>
																<button id="female" class="btn btn-sm btn-default" onclick="toggleGender(\'female\')">Female</button>
															</div>
														</div>
													</div>



													<div class="row form-group student-only">
														<label class="col-md-2 control-label">Date of Birth</label>
														<div id="datepicker" class="col-md-10">
															<input ng-model="dob" type="text" class="form-control" placeholder="yyyy-mm-dd">
														</div>
													</div>


													<div class="row form-group">
														<label class="col-md-2 control-label">E-mail</label>
														<div class="col-md-10">
															<input ng-model="emailAdd" type="email" name="regular" class="form-control" placeholder="e-mail address which will be used as the user name">
														</div>
													</div>

													<div class="row form-group">
														<label class="col-md-2 control-label">Password</label>
														<div class="col-md-10">
															<input ng-model="password" type="password" class="form-control" placeholder="this password will be used to log into the system.">
														</div>
													</div>


												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->


								</p>

								<p class="text-center">
									<a href="#degree" data-toggle="tab" data-original-title="profile" class="btn btn-success btn-outline-rounded green" onclick="$(\'#profile-li\').removeClass(\'active\');$(\'#degree-li\').addClass(\'active\')"> Next <span style="margin-left:10px;" class="glyphicon glyphicon-book"></span></a>
								</p>

							</div>




							<div class="tab-pane fade" id="degree">
								<h3 class="head text-center student-only">Degree</h3>
								<h3 class="head text-center teacher-only">Designation</h3>
								<p class="narrow text-center">



									<!-- Row start -->
									<div class="row">
										<div class="col-md-10 col-sm-6 col-xs-12 div-block-center center-block">
											<div class="panel panel-default">
												<div class="panel-heading clearfix">
													<i class="icon-calendar"></i>
													<h3 class="panel-title">Secton 2</h3>
													
												</div>

												<div class="panel-body">




													<div class="row form-group student-only">
														<label class="col-md-2 control-label">Degree name/Code</label>
														<div class="col-md-10">
															<div class="row">
																<div class="col-md-12">
																	<select ng-model="degreeCode" class="form-control">
																		<option>1</option>
																		<option>2</option>
																		<option>3</option>
																		<option>4</option>
																		<option>5</option>

																	</select>
																</div>
															</div>
														</div>
													</div>


													<div class="row form-group teacher-only">
														<label class="col-md-2 control-label">Title</label>
														<div class="col-md-10">
															<div class="row">
																<div class="col-md-12">
																	<select ng-model="title" class="form-control">
																		<option>Prof.</option>
																		<option>Asso. Prof.</option>
																		<option>SL I</option>
																		<option>SL II</option>
																		<option>Lec</option>
																		<option>Ass. Lec</option>
																	</select>
																</div>
															</div>
														</div>
													</div>




													<div class="row form-group student-only">
														<label class="col-md-2 control-label">Year</label>
														<div class="col-md-3">
															<select ng-model="year" class="form-control">
																<option>1</option>
																<option>2</option>
																<option>3</option>
																<option>4</option>
																<option>5</option>

															</select>
														</div>
														<div class="col-md-2">&nbsp;</div>
														<label class="col-md-2 control-label">Semester</label>
														<div class="col-md-3">
															<select ng-model="semester" class="form-control">
																<option>I</option>
																<option>II</option>

															</select>
														</div>
													</div>


													<div class="row form-group student-only">
														<label class="col-md-2 control-label">Subjects</label>

														<div class="col-md-10">
															<select ng-model="subject" id="id_select" class="selectpicker bla bla bli" multiple data-live-search="true">
																<option>Physics</option>
																<option>Mathematics</option>
																<option>Chemistry</option>
																<option>Computer Science</option>
																<option>Botany</option>
																<option>Zoology</option>
																
															</select>  
														</div>
													</div>

													<div class="row form-group teacher-only">
														<label class="col-md-2 control-label">Department</label>

														<div class="col-md-10">
															<select ng-model="department" id="id_select" class="selectpicker bla bla bli" data-width="auto">
																<option>Department of Physics</option>
																<option>Department of Chemistry</option>
																<option>Department of Mathematics</option>
																<option>Department of Botany</option>
																<option>Department of Statistics &amp; Computer Science</option>
																<option>Department of Zoology</option>
																
															</select>  
														</div>
													</div>



													<div class="row form-group student-only">
														<label class="col-md-2 control-label">Courses Registered</label>
														<div class="col-md-10">


															<select ng-model="courses" id="id_select" class="selectpicker bla bla bli" multiple data-live-search="true">
																<optgroup label="Mathematics" data-subtext="Courses" data-icon="icon-ok" >
																	<option>MT100</option>
																	<option>MT101</option>
																	<option>MT102</option>
																</optgroup>
																<optgroup label="Physics" data-subtext="Courses" data-icon="icon-ok" >
																	<option>PH100</option>
																	<option>PH101</option>
																	<option>PH103</option>
																</optgroup>
															</select>     

														</div>
													</div>

													<div class="row form-group teacher-only">
														<label class="col-md-2 control-label">Courses assigned</label>
														<div class="col-md-10">


															<select ng-model="courseAssigned" id="id_select" class="selectpicker bla bla bli" multiple data-live-search="true">
																<optgroup label="Mathematics" data-subtext="Courses" data-icon="icon-ok" >
																	<option>MT100</option>
																	<option>MT101</option>
																	<option>MT102</option>
																</optgroup>
															</select>     

														</div>
													</div>


												</div>
											</div>
										</div>
									</div>
									<!-- Row end --> 

								</p>

								<p class="text-center">
									<a href="#review" data-toggle="tab" data-original-title="review"  class="btn btn-success btn-outline-rounded green" onclick="$(\'#degree-li\').removeClass(\'active\');$(\'#review-li\').addClass(\'active\')"> Next <span style="margin-left:10px;" class="glyphicon glyphicon-list"></span></a>
								</p>
							</div>


							<div class="tab-pane fade" id="review">
								<form id="f" action="signup-user.php" method="POST">
									<h3 class="head text-center">Review Data</h3>
									<p class="narrow text-center">


										<!-- Row start -->
										<div class="row">
											<div class="col-md-10 col-sm-6 col-xs-12 div-block-center center-block">
												<div class="panel panel-default">
													<div class="panel-heading clearfix">
														<i class="icon-calendar"></i>
														<h3 class="panel-title">User Type</h3>
													</div>

													<div class="panel-body">

														<div class="row form-group">
															<label class="col-md-2 control-label">User Type</label>
															<div class="col-md-10">
																<input id="userType" type="text" name="userType" class="form-control" readonly value="Student">
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
										<!-- Row end -->


										<!-- Row start -->

										<div class="row">
											<div class="col-md-10 col-sm-6 col-xs-12 div-block-center center-block">
												<div class="panel panel-default">
													<div class="panel-heading clearfix">
														<i class="icon-calendar"></i>
														<h3 class="panel-title">Section 1</h3>
													</div>

													<div class="panel-body">




														<div class="row form-group">
															<label class="col-md-2 control-label">Name</label>
															<div class="col-md-10">
																<div class="row">
																	<div class="col-md-4">
																		<input name="fname" readonly value="{{fname}}" type="text" class="form-control" placeholder="First Name">
																	</div>
																	<div class="col-md-4 ">
																		<input name="mname" readonly value="{{mname}}" type="text" class="form-control" placeholder="Middle Name">
																	</div>
																	<div class="col-md-4">
																		<input name="lname" readonly value="{{lname}}" type="text" class="form-control" placeholder="Last Name">
																	</div>
																</div>
															</div>
														</div>

														<div class="row form-group teacher-only">
															<label class="col-md-2 control-label ">Marital Status</label>

															<div class="col-md-10">
																<input name="maritalStatus" id="maritalStatus" readonly type="text" class="form-control" value="Single">
															</div>
														</div>

														<div class="row form-group teacher-only">
															<label class="col-md-2 control-label">NIC. No</label>
															<div class="col-md-10">
																<input name="nic" readonly value="{{nic}}" type="text" class="form-control" placeholder="National Identity Card No.">
															</div>
														</div>





														<div class="row form-group student-only">
															<label class="col-md-2 control-label">Reg. No.</label>
															<div class="col-md-10">
																<input name="regNo" readonly value="{{regNo}}" type="text" class="form-control" placeholder="Registration Number">
															</div>
														</div>


														<div class="row form-group">
															<label class="col-md-2 control-label">Gender</label>

															<div class="col-md-10">
																<input name="gender" id="gender" value="Male" readonly type="text" class="form-control">
															</div>
														</div>



														<div class="row form-group student-only">
															<label class="col-md-2 control-label">Date of Birth</label>
															<div id="datepicker" class="col-md-10">
																<input name="dob" value="{{dob}}" readonly type="text" class="form-control" placeholder="yyyy-mm-dd">
															</div>
														</div>


														<div class="row form-group">
															<label class="col-md-2 control-label">E-mail</label>
															<div class="col-md-10">
																<input name="email" value="{{emailAdd}}" readonly type="email" name="regular" class="form-control" placeholder="e-mail address">
															</div>
														</div>

														<div class="row form-group">
														<label class="col-md-2 control-label">Password</label>
														<div class="col-md-10">
															<input name="password" type="password" readonly value="{{password}}" class="form-control" placeholder="this password will be used to log into the system.">
														</div>
														</div>

													</div>
												</div>
											</div>
										</div>


										<!-- Row end -->

										<!-- Row start -->

										<div class="row">
											<div class="col-md-10 col-sm-6 col-xs-12 div-block-center center-block">
												<div class="panel panel-default">
													<div class="panel-heading clearfix">
														<i class="icon-calendar"></i>
														<h3 class="panel-title">Secton 2</h3>

													</div>

													<div class="panel-body">




														<div class="row form-group student-only">
															<label class="col-md-2 control-label">Degree name/Code</label>
															<div class="col-md-10">
																<div class="row">
																	<div class="col-md-12">
																		<input name="degreeCode" value="{{degreeCode}}" readonly type="text" class="form-control">
																	</div>
																</div>
															</div>
														</div>


														<div class="row form-group teacher-only">
															<label class="col-md-2 control-label">Title</label>
															<div class="col-md-10">
																<div class="row">
																	<div class="col-md-12">
																		<input name="title" value="{{title}}" readonly type="text" class="form-control">
																		
																	</div>
																</div>
															</div>
														</div>




														<div class="row form-group student-only">
															<label class="col-md-2 control-label">Year</label>
															<div class="col-md-3">
																<input name="year" value="{{year}}" readonly class="form-control">
															</div>
															<div class="col-md-2">&nbsp;</div>
															<label class="col-md-2 control-label">Semester</label>
															<div class="col-md-3">
																<input name="semester" value="{{semester}}" readonly type="text" class="form-control">
															</div>
														</div>


														<div class="row form-group student-only">
															<label class="col-md-2 control-label">Subjects</label>

															<div class="col-md-10">
																<input name="subjects" value="{{subject}}" readonly type="text" class="form-control" >
															</div>
														</div>

														<div class="row form-group teacher-only">
															<label class="col-md-2 control-label">Department</label>

															<div class="col-md-10">
																<input name="department" value="{{department}}" readonly type="text" class="form-control" >
															</div>
														</div>



														<div class="row form-group student-only">
															<label class="col-md-2 control-label">Courses Registered</label>
															<div class="col-md-10">


																<input name="coursesRegistered" value="{{courses}}" readonly type="text" class="form-control">


															</div>
														</div>

														<div class="row form-group teacher-only">
															<label class="col-md-2 control-label">Courses assigned</label>
															<div class="col-md-10">


																<input name="coursesAssigned" type="text" value="{{courseAssigned}}" readonly id="id_select" class="form-control" >
																

															</div>
														</div>


													</div>
												</div>
											</div>
										</div>


										<!-- Row end --> 





									</p>

									<p id="myTab" class="text-center">
										<a href="#finish" data-toggle="tab" title data-original-title="Finish" class="btn btn-success btn-outline-rounded green"  onclick="f.submit();"> Finish <span style="margin-left:10px;" class="glyphicon glyphicon-ok"></span></a>
									</p>
									


								</form>
							</div>
							<!-- <div class="tab-pane fade" id="finish" >
							<div class="text-center">
								<i class="img-intro icon-checkmark-circle"></i>
							</div>
							<h3 class="head text-center">Thank you for registering</h3>
							<p class="narrow text-center">
								We"ll process your request and will soon come back to you. Stay tune for an email. 
							</p>
						</div> -->
						<div class="clearfix"></div>
					</div>

				</div>
			</div>
		</div>
	</section>
</body>
</html>
';
}

?>

