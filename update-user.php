<?php
	include("connection.php");

	session_start();
function clean($string) {
   $string = str_replace('[', '', $string); // Replaces all [ with ''.
   $string = str_replace(']', '', $string); // Replaces all [ with ''.
   $string = str_replace('"', '', $string); // Replaces all " with ''.

   return $string;
}
	if(isset($_SESSION['user'])){
	  $user = $_SESSION['user'];
	  $userType = $_SESSION['userType'];

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
		$coursesAssigned = $_POST['coursesAssigned'];
		$coursesRegistered = $_POST['coursesRegistered'];

		$subjects = clean($subjects);

		 echo $userType."<br>".$fname."<br>".$mname."<br>".$lname."<br>".$maritalStatus."<br>".
	 	$nic."<br>".$regNo."<br>".$gender."<br>".$dob."<br>".$pass."<br>".$email."<br>".$degreeCode."<br>".
	 $title."<br>".$year."<br>".$semester."<br>".$subjects."<br>".$department."<br>".$courses."<br>".$coursesAssigned."<br>".$coursesRegistered;

	 	$server = mysql_connect($host, $username, $password) or die("There is an error with the connection");
		$connection = mysql_select_db($database, $server);



		 $query1 = "UPDATE `users` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`gender`='$gender',`password`='$pass' WHERE `email` = '$email' ";
		 $query2 = "test";
	  	if($userType=="Student"){
		 	$query2 = "UPDATE `students` SET `regNo`='$regNo',`dob`='$dob',`degreeCode`='$degreeCode',`year`='$year',`semester`='$semester',`subjects`='$subjects',`coursesRegistered`='$coursesRegistered' WHERE `email` = '$email' ";

			
		 }else if( $userType == "Teacher"){
	
		 	$query2 = "UPDATE `teacher` SET `maritalStatus`='$maritalStatus',`NICNo`='$NICNo',`title`='$title',`department`='$department',`coursesAssigned`='$coursesAssigned' WHERE `email` = '$email' ";
		
	 	}

	 	echo "B4 executing the query";
	 	 $query = mysql_query($query1) or die("Error entering data to the users".  mysql_error()) ;
		 $query = mysql_query($query2) or die("Error entering data to the teacher/students". mysql_error());

		 header("Location:userConsole.php");

	}else{

		echo "invalid user";
	}

?>