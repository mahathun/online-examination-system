<?php 
include("connection.php");
session_start();

$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);


if(isset($_POST['test'])){

    $courseCode = $_SESSION['courseCode'];
    $studentRegNo = $_SESSION['studentRegNo'];

    $marks = $_POST['no_of_correctanswers']/ $_POST['total'];
    //echo $marks;


    //echo $studentRegNo;
}else{
    $courseCode = $_POST['courseCode'];
    $studentRegNo = $_POST['studentRegNo'];

    $_SESSION['courseCode'] = $courseCode;
    $_SESSION['studentRegNo'] = $studentRegNo;
    //echo $studentRegNo;
}
//$examId = $_POST['examId'];
//$email = $_POST['email'];



//echo $courseCode;


$myquery = "SELECT * FROM `exams` INNER JOIN `answeres` ON exams.examId = answeres.examId INNER JOIN `mcq` ON answeres.qId = mcq.mcqId INNER JOIN `students` on answeres.registrantEmail = students.email WHERE (`courseCode`  = '$courseCode') AND (`regNo` = '$studentRegNo')";
$query = mysql_query($myquery);
$row = mysql_fetch_array($query) or die("error fetching data" . mysql_error());

if ( !$query ) {
    echo "Failed to connect to MySQL: " . mysql_error();
    die;
}




echo '

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="tharindu" >

    <title>'.$row['courseCode'].' - ('. $row['examinationType'].')</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="lib/js/jquerry.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>



</head>
<body style="background-color:black;">
    <form method="POST">

    <div class="container" style="padding-top:10px;">
        <div class="jumbotron" style="padding-top:10px;padding-bottom:10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3"><h3>'.$row['courseCode'].'</h3></div>
                    <div class="col-md-6"><h3>'.$row['courseTitle'].'</h3> </div>
                    <div class="col-md-3"><input style="margin:5px" name="test" type="submit" onclick="" value="Mark &amp Post" class="btn btn-sm btn-primary">
                    ';if(isset($marks)){
                        $marks_final = round($marks*100);
                        echo $marks_final.'%'; 

                        $examId = $row['examId'];
                        $email = $row['email'];
                       //echo $examId.$email;

                        $marksq = "INSERT INTO `marks`(`examId`, `email`, `marks`) VALUES ('$examId','$email','$marks_final')";

                        if(!mysql_query($marksq)){
                            echo '<script> alert(\'You are not allowd to resubmit a previously marked paper\');</script>';
                        }else{
                            echo "<p style='color:green;font-size:10px;'>Marks has been successfully published.</p>";
                        }
                    }
                    echo '
                    </div>
                </div>
            </div>
        </div>

        <div id="save_alert" class="alert alert-warning alert-dismissible hidden" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Warning!</strong> Better check yourself, youre not looking too good.
        </div>

        <div class="jumbotron">
            <div class="list-group">
            ';
            //$myquery = "SELECT * FROM `examQuestions` INNER JOIN `mcq` ON examQuestions.qId = mcq.mcqId  WHERE examQuestions.examId = '$examId'";
            $query = mysql_query($myquery);
            $i = 0;
            $no_of_correctanswers = 0;
            while($row = mysql_fetch_array($query)){

                echo '<a class="list-group-item">
                    <div class="row">
                        <div class="col-md-1">
                        <input class="hidden" readonly type="text" value="'. $row["qId"] .'" name="q'.$i.'">
                            ';echo $i+1;


                             echo ').
                        </div>
                        <div class="col-md-11">
                            '.$row['question'].'
                         </div>
                          <div class="col-md-10 col-md-offset-2">
                            Student has selected -'.$row['answer'];
                                if($row['answer']==$row['correctAnswer']){
                                    echo ' <span class="glyphicon glyphicon-ok" style="color:green;"></span>';
                                    $no_of_correctanswers+=1;
                                }else{
                                    echo ' <span class="glyphicon glyphicon-remove" style="color:red;"></span>';
                                }
                            echo '
                         </div>
                        <div class="col-md-11 col-md-offset-1">
                            <div class="radio">
                              <label>
                                <input type="radio" disabled  name="a'.$i.'" value="'. $row['ans1'].'" >
                                '. $row['ans1'].'
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" disabled name="a'.$i.'" value="'. $row['ans2'].'">
                                '. $row['ans2'].'
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" disabled name="a'.$i.'" value="'. $row['ans3'].'" >
                                '. $row['ans3'].'
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" disabled name="a'.$i.'" value="'. $row['ans4'].'">
                                '. $row['ans4'].'
                              </label>
                            </div>
                         </div>
                    </div>
                </a>';

                $qId = $row['qId'];
                //$q = "SELECT * FROM `answeres` WHERE (examId = '$examId') AND (qId = '$qId') AND (registrantEmail = '$email')";
                //$q = "INSERT INTO `answeres`(`examId`, `qId`, `qType`, `registrantEmail`, `answer`) VALUES ('$examId','$qId','mcq','$email','null')";
                //$query1 = mysql_query($q);
               
                    //echo "test";
                    $q = "INSERT INTO `answeres`(`examId`, `qId`, `qType`, `registrantEmail`, `answer`) VALUES ('$examId','$qId','mcq','$email','null')";
                    $query1 = mysql_query($q);
                

                $i += 1;
            }
                




            echo '</div>
        </div>
    </div>
    <input  readonly type="text" value="'.$no_of_correctanswers.'" name="no_of_correctanswers">
    <input  readonly type="text" value="'.$i.'" name="total">
    </form>
</body>
</html>


';




mysql_close($server);

?>