<?php 
include("connection.php");
session_start();

$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);



$examId = $_POST['examId'];
$email = $_POST['email'];



$myquery = "SELECT * FROM `exams` WHERE `examId`  = '$examId' ";
$query = mysql_query($myquery);
$row = mysql_fetch_array($query) or die("error fetching the examId" . mysql_error());

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
    <form action="submit-answers.php" target="_blank" method="POST">

    <div class="container" style="padding-top:10px;">
        <div class="jumbotron" style="padding-top:10px;padding-bottom:10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3"><h3>'.$row['courseCode'].'</h3></div>
                    <div class="col-md-6"><h3>'.$row['courseTitle'].'</h3> </div>
                    <div class="col-md-3"><span class="label label-default">Time Left </span>: 60<br><input style="margin:5px" type="submit" onclick="" value="save" class="btn btn-sm btn-primary"></div>
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
            $myquery = "SELECT * FROM `examQuestions` INNER JOIN `mcq` ON examQuestions.qId = mcq.mcqId  WHERE examQuestions.examId = '$examId'";
            $query = mysql_query($myquery);
            $i = 0;
            while($row = mysql_fetch_array($query)){

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
    <input class="hidden" readonly type="text" value="'.$i.'" name="total">
    <input class="hidden" readonly type="text" value="'.$examId.'" name="examId">
    <input class="hidden" readonly type="text" value="'.$email.'" name="email">
    </form>
</body>
</html>


';




mysql_close($server);

?>