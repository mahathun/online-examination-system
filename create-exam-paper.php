<?php 
include("connection.php");
session_start();

$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);


    
//echo $year.$semester.$subject.$courseTitle.$courseCode.$timeAllowed.$totalMarks;
if(!isset($_POST['questionSubmit'])){

    $_SESSION['year'] = $_POST['year'];
    $_SESSION['semester'] = $_POST['semester'];
    $_SESSION['subject'] = $_POST['subject'];
    $_SESSION['courseTitle'] = $_POST['courseTitle'];
    $_SESSION['courseCode'] = $_POST['courseCode'];
    $_SESSION['timeAllowed'] = $_POST['timeAllowed'];
    $_SESSION['totalMarks'] = $_POST['totalMarks'];
    $_SESSION['examinationType'] = $_POST['examinationType'];
    $_SESSION['email'] = $_POST['email'];

    $year = $_SESSION['year'];
    $semester =$_SESSION['semester'];
    $subject = $_SESSION['subject'];
    $courseTitle = $_SESSION['courseTitle'] ;
    $courseCode = $_SESSION['courseCode'];
    $timeAllowed = $_SESSION['timeAllowed'];
    $totalMarks = $_SESSION['totalMarks'] ;
    $examinationType = $_SESSION['examinationType'] ;
    $email = $_SESSION['email'] ;


    $q = "INSERT INTO `exams`
        (`year`, `semester`, `subject`, `courseCode`, `courseTitle`, `examinationType`, `timeAllowed`, `total`, `instructorEmail`)
          VALUES ('$year','$semester','$subject','$courseCode','$courseTitle','$examinationType','$timeAllowed', '$totalMarks' ,'$email')";

    $result = mysql_query($q) or die("Error inserting query".mysql_error());

    $q1 = "SELECT `examId` FROM `exams` WHERE `examId` = LAST_INSERT_ID()";

    $result1 = mysql_query($q1) or die("Error inserting query".mysql_error());
    $result2 = mysql_fetch_array($result1);

    $examId = $result2['examId'];

    $_SESSION['examId'] = $examId;

}else{

    $year = $_SESSION['year'];
    $semester =$_SESSION['semester'];
    $subject = $_SESSION['subject'];
    $courseTitle = $_SESSION['courseTitle'] ;
    $courseCode = $_SESSION['courseCode'];
    $timeAllowed = $_SESSION['timeAllowed'];
    $totalMarks = $_SESSION['totalMarks'] ;
    $examinationType = $_SESSION['examinationType'] ;
    $email = $_SESSION['email'] ;
    $examId = $_SESSION['examId'];


    $correct = $_POST['correct'];
    $question = $_POST['question'];

    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    $ans3 = $_POST['ans3'];
    $ans4 = $_POST['ans4'];
    $qType = "mcq";


    switch ($correct) {
        case '1':
            
            $qq = "INSERT INTO `mcq`( `examId`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correctAnswer`, `instructorEmail`) 
                            VALUES ('$examId','$question','$ans1','$ans2','$ans3','$ans4','$ans1','$email')";
            
            mysql_query($qq) or die("Error inserting mcq1");
            $qqqq = "SELECT * FROM `mcq` WHERE `mcqId`= LAST_INSERT_ID()";
            $r  = mysql_query($qqqq) or die("errror");
            $r1 = mysql_fetch_array($r);
            $mcqId = $r1['mcqId'];

            $qqq = "INSERT INTO `examQuestions`(`examId`, `qId`, `qType`) VALUES ('$examId','$mcqId','$qType')";
            
            mysql_query($qqq) or die("Error inserting mcq2");
            break;
        case '2':
           

            $qq = "INSERT INTO `mcq`( `examId`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correctAnswer`, `instructorEmail`) 
                            VALUES ('$examId','$question','$ans1','$ans2','$ans3','$ans4','$ans2','$email')";

            mysql_query($qq) or die("Error inserting mcq1");
            $qqqq = "SELECT * FROM `mcq` WHERE `mcqId`= LAST_INSERT_ID()";
            $r  = mysql_query($qqqq) or die("errror");
            $r1 = mysql_fetch_array($r);
            $mcqId = $r1['mcqId'];

            $qqq = "INSERT INTO `examQuestions`(`examId`, `qId`, `qType`) VALUES ('$examId','$mcqId','$qType')";
           
            mysql_query($qqq) or die("Error inserting mcq2");
            break;
        case '3':
           
            $qq = "INSERT INTO `mcq`( `examId`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correctAnswer`, `instructorEmail`) 
                            VALUES ('$examId','$question','$ans1','$ans2','$ans3','$ans4','$ans3','$email')";

            mysql_query($qq) or die("Error inserting mcq1");
            $qqqq = "SELECT * FROM `mcq` WHERE `mcqId`= LAST_INSERT_ID()";
            $r  = mysql_query($qqqq) or die("errror");
            $r1 = mysql_fetch_array($r);
            $mcqId = $r1['mcqId'];

            $qqq = "INSERT INTO `examQuestions`(`examId`, `qId`, `qType`) VALUES ('$examId','$mcqId','$qType')";
            mysql_query($qqq) or die("Error inserting mcq2".mysql_error());
            break;
        case '4':
           $qq = "INSERT INTO `mcq`( `examId`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correctAnswer`, `instructorEmail`) 
                            VALUES ('$examId','$question','$ans1','$ans2','$ans3','$ans4','$ans4','$email')";
            mysql_query($qq) or die("Error inserting mcq1");
            $qqqq = "SELECT * FROM `mcq` WHERE `mcqId`= LAST_INSERT_ID()";
            $r  = mysql_query($qqqq) or die("errror");
            $r1 = mysql_fetch_array($r);
            $mcqId = $r1['mcqId'];

            $qqq = "INSERT INTO `examQuestions`(`examId`, `qId`, `qType`) VALUES ('$examId','$mcqId','$qType')";
         
            mysql_query($qqq) or die("Error inserting mcq2");
            break;
        default:
            # code...
            break;
    }
}
//echo $question."<br>".$correctAns;
echo '

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="tharindu" >

    <title>'.$courseCode.' - ('.$examinationType.')</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="lib/js/jquerry.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>



</head>
<body style="background-color:black;">
    <form action="create-exam-paper.php" method="POST">

    <div class="container" style="padding-top:10px;">
        <div class="jumbotron" style="padding-top:10px;padding-bottom:10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3"><h3>'.$courseCode.'</h3></div>
                    <div class="col-md-6"><h3>'.$courseTitle.'</h3> </div>
                    <div class="col-md-3"><span class="label label-default">Time Allowed </span>: '.$timeAllowed.'<br><a style="margin:5px" onclick="window.location=\'createPaper.php\';"  class="btn btn-sm btn-primary">Finish</a></div>
                </div>
            </div>
        </div>

        <div id="save_alert" class="alert alert-warning alert-dismissible hidden" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Warning!</strong> Better check yourself, youre not looking too good.
        </div>

        <div class="jumbotron">
            <div class="list-group">
                <div class="row form-group">
                    <div class="col-md-12">
                        Question : <input name="question" type="text" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-1 col-xs-1 col-sm-1">
                            <div class="row"><input checked type="radio" name="correct" value="1" class="pull-right" style="margin:8px;"> </div>
                            <div class="row"><input type="radio" name="correct" value="2" class="pull-right" style="margin:8px;"> </div>
                            <div class="row"><input type="radio" name="correct" value="3" class="pull-right" style="margin:8px;"> </div>
                            <div class="row"><input type="radio" name="correct" value="4" class="pull-right" style="margin:8px;"> </div>
                        </div>
                        <div class="col-md-8 col-xs-8 col-sm-1">
                            <div class="row"><input type="text" name="ans1" class="form-control input-sm"></div>
                            <div class="row"><input type="text" name="ans2" class="form-control input-sm"></div>
                            <div class="row"><input type="text" name="ans3" class="form-control input-sm"></div>
                            <div class="row"><input type="text" name="ans4" class="form-control input-sm"></div>
                        </div>

                        <div class="col-md-1">&nbsp;</div>

                        <div class="col-md-2  col-sm-2 col-xs-2 ">
                            <div class="row">

                                <button name="questionSubmit" value="submit" class="btn btn-primary ">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>



        <div class="jumbotron">
            <div class="list-group">
            ';

             if(isset($_POST['questionSubmit'])){
                //echo $examId;
                $questionsQuery = "SELECT * FROM `mcq` WHERE `examId` = '$examId'";
                $resultQuestions = mysql_query($questionsQuery) or die("error runing the questions query"); 
                $i = 0;
                while($row = mysql_fetch_array($resultQuestions)){

                echo '<a class="list-group-item">
                    <div class="row">
                        <div class="col-md-1">
                        <input class="hidden" readonly type="text" value="'. $row["qId"] .'" name="q'.$i.'">
                            ';echo $i+1; echo ').
                        </div>
                        <div class="col-md-11">
                            '.$row['question'].'
                         </div>
                        <div class="col-md-11 col-md-offset-1">
                            <div class="radio">
                              <label>
                                <input type="radio"  name="a'.$i.'" value="'. $row['ans1'].'" >
                                '. $row['ans1'].'
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio"  name="a'.$i.'" value="'. $row['ans2'].'">
                                '. $row['ans2'].'
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio"  name="a'.$i.'" value="'. $row['ans3'].'" >
                                '. $row['ans3'].'
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio"  name="a'.$i.'" value="'. $row['ans4'].'">
                                '. $row['ans4'].'
                              </label>
                            </div>
                         </div>
                    </div>
                </a>';
                $i+=1;
            }
    // $q = "INSERT INTO `exams`
    //     (`year`, `semester`, `subject`, `courseCode`, `courseTitle`, `examinationType`, `timeAllowed`, `instructorEmail`)
    //       VALUES ('$year','$semester','$subject','$courseCode','$courseTitle','$examinationType','$timeAllowed','$email')";

    // $result = mysql_query($q) or die("Error inserting query".mysql_error());
}   

        echo '</div>
        <div>


    </div>
    <input class="hidden" readonly type="text" value="'.$i.'" name="total">
    <input class="hidden" readonly type="text" value="'.$examId.'" name="examId">
    <input class="hidden" readonly type="text" value="'.$email.'" name="email">
    </form>
</body>
</html>


';




mysql_close($server);

?>