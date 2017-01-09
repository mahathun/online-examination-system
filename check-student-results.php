<?php 
	include("connection.php");
	
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "SELECT * FROM `users`";
    $query = mysql_query($myquery);
    
    if ( !$query ) {
        echo "Failed to connect to MySQL: " . mysql_error();
        die;
    }
   
   

   $year = $_POST['year']; 
   $semester = $_POST['semester'];
   $subject = $_POST['subject'];
   $courseCode = $_POST['courseCode'];
   $examinationType = $_POST['examinationType'];
   $email = $_POST['email'];
   
 
   echo $year.$semester.$subject.$courseCode.$examinationType.$email;

   $q1 = "SELECT * 
            FROM `exams`
                INNER JOIN `marks`
                ON exams.examId=marks.examId
                    WHERE (marks.email = '$email') AND (exams.year = '$year') AND (exams.semester = '$semester') AND (exams.subject = '$subject') AND (exams.courseCode = '$courseCode')AND (exams.examinationType = '$examinationType')";

    $row = mysql_fetch_array(mysql_query($q1));

    echo $row['examId'].$row['marks'];

    $marks = $row['marks'];
    $examId = $row['examId'];
    session_start();

    if($marks){
        $_SESSION['examId'] = $examId;
        $_SESSION['email'] = $email;
        $_SESSION['marks'] = $marks;

        header("Location:checkResults.php?marks=$marks");
    }else{
        header("Location:checkResults.php");
    }


    mysql_close($server);

?>