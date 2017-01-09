<?php

include "connection.php";


function clean($string) {
   $string = str_replace('[', '', $string); // Replaces all [ with ''.
   $string = str_replace(']', '', $string); // Replaces all [ with ''.
   $string = str_replace('"', '', $string); // Replaces all " with ''.

   return $string;
}


$userType = $_POST["userType"];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$maritalStatus = $_POST['maritalStatus'];
$nic = $_POST['nic'];
$regNo = $_POST['regNo'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$pass = $_POST['password'];
$degreeCode = $_POST['degreeCode'];
$title = $_POST['title'];
$year = $_POST['year'];
$semester = $_POST['semester'];
$subjects = $_POST['subjects'];
$department = $_POST['department'];
$courses = $_POST['courses'];
$coursesRegistered = $_POST['coursesRegistered'];
$coursesAssigned = $_POST['coursesAssigned'];

	 // echo $userType."<br>".$fname."<br>".$mname."<br>".$lname."<br>".$maritalStatus."<br>".
	 // 	$nic."<br>".$regNo."<br>".$gender."<br>".$dob."<br>".$email."<br>".$degreeCode."<br>".
	 // $title."<br>".$year."<br>".$semester."<br>".$subjects."<br>".$department."<br>".$courses."<br>".$coursesAssigned;

$subjects = clean($subjects);
$coursesAssigned = clean($coursesAssigned);
$coursesRegistered = clean($coursesRegistered);

$server = mysql_connect($host, $username, $password) or die("There is an error with the connection");
$connection = mysql_select_db($database, $server);

$query1= "SELECT * FROM `users` WHERE email = '$email'";


$query = mysql_query($query1);

if ( !$query ) {
	echo "Failed to connect to MySQL: " . mysql_error();
	die;
}else{
	//echo "success";
	$row = mysql_fetch_array($query);

	if( !empty($row)){
		header("Location:signup.php");
	}else{
		//echo "empty";
		//$query2 = "INSERT INTO `users`(`fname`, `mname`, `lname`, `gender`, `password`, `email`, `userType`) VALUES ('$fname','$mname','$lname','$gender','$pass','$email','$userType')";
		$query2 = "INSERT INTO `tempusers`(`fname`, `mname`, `lname`, `gender`, `password`, `email`, `userType`) VALUES ('$fname','$mname','$lname','$gender','$pass','$email','$userType')";
		if($userType=="Teacher"){
			//echo "<br>teacher";
			//$query3 = "INSERT INTO `teacher`(`maritalStatus`, `NICNo`, `title`, `department`, `coursesAssigned`, `email`) VALUES ('$maritalStatus','$nic','$title','$department','$coursesAssigned','$email')";
			$query3 = "INSERT INTO `tempteacher`(`maritalStatus`, `NICNo`, `title`, `department`, `coursesAssigned`, `email`) VALUES ('$maritalStatus','$nic','$title','$department','$coursesAssigned','$email')";
		}else if( $userType == "Student"){
			//echo $coursesRegistered;
			//$query3 = "INSERT INTO `students`(`regNo`, `dob`, `degreeCode`, `year`, `semester`, `subjects`, `coursesRegistered`, `email`) VALUES ('$regNo','$dob','$degreeCode','$year','$semester','$subjects','$coursesRegistered','$email')";
			$query3 = "INSERT INTO `tempstudents`(`regNo`, `dob`, `degreeCode`, `year`, `semester`, `subjects`, `coursesRegistered`, `email`) VALUES ('$regNo','$dob','$degreeCode','$year','$semester','$subjects','$coursesRegistered','$email')";
		}
		$query = mysql_query($query2) or die("Error entering data to the users");
		$query = mysql_query($query3) or die("Error entering data to the teacher/students");

		//header("Location:signup.php?success=true");
		//echo "<br>success";
	}


}




	header("Location:signup.php?success=true");



?>