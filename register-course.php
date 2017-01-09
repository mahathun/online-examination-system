<?php 
	include("connection.php");
		
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	
	$server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "SELECT * FROM `users`";
    $query = mysql_query($myquery);
    
    if ( !$query ) {
        echo "Failed to connect to MySQL: " . mysql_error();
        die;
    }
   
   
   $examId = $_POST['examId'];
   $email = $_POST['email'];


   $query = "INSERT INTO `examRegistration`(`examId`, `email`) VALUES ('$examId','$email')";
   $result = mysql_query($query) or die("You have already registered for this exam");

   header("Location:applyExam.php");

    mysql_close($server);

?>