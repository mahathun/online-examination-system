<?php 
	include("connection.php");
		
	//$user = $_POST['user'];
	//$pass = $_POST['pass'];

	
	$server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $registrantUserType = $_POST['registrantUserType'];
   $email = $_POST['email'];
   $approvement = $_POST['approvement'];

   if($approvement!="delete"){

   //echo $registrantUserType;

   if($registrantUserType== "Student"){
      $query = "SELECT * FROM `tempusers` INNER JOIN `tempstudents` ON tempusers.email=tempstudents.email WHERE tempusers.email = '$email'";
      
    

      


    }elseif($registrantUserType=="Teacher"){
      $query = "SELECT * FROM `tempusers` INNER JOIN `tempteacher` ON tempusers.email=tempteacher.email WHERE tempusers.email = '$email'";
    }


   //$query = "INSERT INTO `examRegistration`(`examId`, `email`) VALUES ('$examId','$email')";
    
    mysql_query($query) or die("error1".mysql_error());
    $result = mysql_fetch_array(mysql_query($query)) or die("error2");



      $userType = $result["userType"];
      $fname = $result['fname'];
      $mname = $result['mname'];
      $lname = $result['lname'];
      $maritalStatus = $result['maritalStatus'];
      $nic = $result['nic'];
      $regNo = $result['regNo'];
      $gender = $result['gender'];
      $dob = $result['dob'];
      $email = $result['email'];
      $pass = $result['password'];
      $degreeCode = $result['degreeCode'];
      $title = $result['title'];
      $year = $result['year'];
      $semester = $result['semester'];
      $subjects = $result['subjects'];
      $department = $result['department'];
      $courses = $result['courses'];
      $coursesRegistered = $result['coursesRegistered'];
      $coursesAssigned = $result['coursesAssigned'];

$query2 = "INSERT INTO `users`(`fname`, `mname`, `lname`, `gender`, `password`, `email`, `userType`) VALUES ('$fname','$mname','$lname','$gender','$pass','$email','$userType')";


if($registrantUserType== "Student"){
     $query3 = "INSERT INTO `students`(`regNo`, `dob`, `degreeCode`, `year`, `semester`, `subjects`, `coursesRegistered`, `email`) VALUES ('$regNo','$dob','$degreeCode','$year','$semester','$subjects','$coursesRegistered','$email')";
     

  }elseif($registrantUserType=="Teacher"){
     $query3 = "INSERT INTO `teacher`(`maritalStatus`, `NICNo`, `title`, `department`, `coursesAssigned`, `email`) VALUES ('$maritalStatus','$nic','$title','$department','$coursesAssigned','$email')"; 
    }
   

    $queryr = mysql_query($query2) or die("Error entering data to the users".mysql_error());
    $queryrr = mysql_query($query3) or die("Error entering data to the teacher/students".mysql_error());



if($registrantUserType== "Student"){
      $query4 = "DELETE FROM `tempusers` WHERE `email` = '$email'";
      
    

      


    }elseif($registrantUserType=="Teacher"){
      $query4 = "DELETE FROM `tempusers` WHERE `email` = '$email'";
    }


   //$query = "INSERT INTO `examRegistration`(`examId`, `email`) VALUES ('$examId','$email')";
    
    mysql_query($query4) or die("error1".mysql_error());
    //$result2 = mysql_fetch_array(mysql_query($query4)) or die("error2");











   header("Location:userConsole.php");
 }else{
  //echo $approvement;

  if($registrantUserType== "Student"){
      $query4 = "DELETE FROM `tempusers` WHERE `email` = '$email'";
      
    

      


    }elseif($registrantUserType=="Teacher"){
      $query4 = "DELETE FROM `tempusers` WHERE `email` = '$email'";
    }


   //$query = "INSERT INTO `examRegistration`(`examId`, `email`) VALUES ('$examId','$email')";
    
    mysql_query($query4) or die("error1".mysql_error());

    header("Location:userConsole.php");
 }

   mysql_close($server);

?>