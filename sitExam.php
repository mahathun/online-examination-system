<?php
include("connection.php");
session_start();


function contain($haystack,$needle){

  if(strpos("x".$haystack, $needle) != 0 ){
    return true;
  }else{
    return false;
  }

}

	// store session data
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
  $userType = $_SESSION['userType'];


  $server =mysql_connect($host,$username,$password);
  $connection = mysql_select_db($database, $server);	
  $userInfo =mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `email`='$user'"));


  $fname = $userInfo['fname'];
  $mname = $userInfo['mname'];
  $lname = $userInfo['lname'];	
  $gender = $userInfo['gender'];
  $password = $userInfo['password'];    
  $email = $userInfo['email'];  
  $userType = $userInfo['userType'];  


  if($userType=="Student"){
    $userInfo2 =mysql_fetch_array(mysql_query("SELECT * FROM `students` WHERE `email`='$user'"));


    $regNo = $userInfo2['regNo'];
    $dob = $userInfo2['dob'];
    $degreeCode = $userInfo2['degreeCode'];
    $year = $userInfo2['year'];
    $semester = $userInfo2['semester'];
    $subjects = $userInfo2['subjects'];
    $coursesRegistered = $userInfo2['coursesRegistered'];
  }else if($userType=="Teacher"){
    $userInfo2 =mysql_fetch_array(mysql_query("SELECT * FROM `teacher` WHERE `email`='$user'"));


    $maritalStatus = $userInfo2['maritalStatus'];
    $NICNo = $userInfo2['NICNo'];
    $title = $userInfo2['title'];
    $department = $userInfo2['department'];
    $coursesAssigned = $userInfo2['coursesAssigned'];

  }


   
  echo '
  <!doctype html>
  <html ng-app>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="tharindu" >

    <title>Welcome to OES</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">



    <!-- Add custom CSS here -->
    <link href="lib/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="lib/css/custom.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="lib/css/morris-0.4.3.min.css">


    <!-- verticle tab css -->
    <link href="lib/css/bootstrap.vertical-tabs.css" rel="stylesheet">




    <!-- JavaScript -->
    <script src="lib/js/jquerry.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>







    <!-- Page Specific Plugins -->
    <script src="lib/js/raphael-min.js"></script>
    <script src="lib/js/morris-0.4.3.min.js"></script>


    <!-- select js -->
    <link href="lib/css/bootstrap-select.css" rel="stylesheet">






    <!--select js-->
    <script type="text/javascript" src="lib/js/bootstrap-select.js">

    </script>


    <!-- angular js library -->
    <script type="text/javascript" src="lib/js/angular.min.js"></script>

    <script type="text/javascript" >


      $(window).on("load", function () {

        $(".selectpicker").selectpicker({
          "selectedText": "cat"
        });


});



</script>
</head>

<body>

  <div id="wrapper">

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="userConsole.php">Online Examination System</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
        <li ><a href="userConsole.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li ><a href="applyExam.php"><i class="glyphicon glyphicon-share"></i> Apply for an Exam</a></li>
          <li class="active"><a href="sitExam.php"><i class="glyphicon glyphicon-edit"></i> Sit For an Exam</a></li>
          <li><a href="checkResults.php"><i class="glyphicon glyphicon-check"></i> Check Results</a></li>
 
        </ul>

        <ul class="nav navbar-nav navbar-right navbar-user">
          <li class="dropdown messages-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">7 New Messages</li>
              <li class="message-preview">
                <a href="#">
                  <span class="avatar"><img src="http://placehold.it/50x50"></span>
                  <span class="name">John Smith:</span>
                  <span class="message">Hey there, I wanted to ask you something...</span>
                  <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                </a>
              </li>
              <li class="divider"></li>
              <li class="message-preview">
                <a href="#">
                  <span class="avatar"><img src="http://placehold.it/50x50"></span>
                  <span class="name">John Smith:</span>
                  <span class="message">Hey there, I wanted to ask you something...</span>
                  <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                </a>
              </li>
              <li class="divider"></li>
              <li class="message-preview">
                <a href="#">
                  <span class="avatar"><img src="http://placehold.it/50x50"></span>
                  <span class="name">John Smith:</span>
                  <span class="message">Hey there, I wanted to ask you something...</span>
                  <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                </a>
              </li>
              <li class="divider"></li>
              <li><a href="#">View Inbox <span class="badge">7</span></a></li>
            </ul>
          </li>
          <li class="dropdown alerts-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Default <span class="label label-default">Default</span></a></li>
              <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
              <li><a href="#">Success <span class="label label-success">Success</span></a></li>
              <li><a href="#">Info <span class="label label-info">Info</span></a></li>
              <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
              <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
              <li class="divider"></li>
              <li><a href="#">View All</a></li>
            </ul>
          </li>
          <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '.$fname.' '. $lname.'<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="" data-toggle="modal" data-target="#profile"><i class="fa fa-user"></i> Profile</a></li>





              <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
              <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
              <li class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

      <div class="row">
        <div class="col-lg-12">
          <h1>EXAM <small>sit</small></h1>
          <ol class="breadcrumb">
            <li class="active"><i class="glyphicon glyphicon-edit"></i> Sit for an Exam</li>
          </ol>
          
        </div>


        <form action="update-user.php" method="POST">
          <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myModalLabel">Edit your profile</h4>
                </div>
                <div class="modal-body">




                  <div class="row">
                    <div class="col-xs-3"> <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
                        <li><a href="#degree" data-toggle="tab">'; 

                          if($userType=="Student"){
                            echo 'Degree';
                          }else if($userType=="Teacher"){
                            echo 'Designation';
                          }


                          echo '</a></li>
                        </ul>
                      </div>

                      <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active" id="personal" style="font-size:12px;">






                            <div class="row form-group" >
                              <label class="col-md-3 control-label">Name</label>
                              <div class="col-md-9">
                                <div class="row">
                                  <div class="col-md-4">
                                    <input name="fname"  type="text" class="form-control input-sm" placeholder="First Name" value="'.$fname.'">
                                  </div>
                                  <div class="col-md-4 ">
                                    <input name="mname"  type="text" class="form-control input-sm" placeholder="Middle Name" value="'.$mname.'">
                                  </div>
                                  <div class="col-md-4">
                                    <input name="lname"  type="text" class="form-control input-sm" placeholder="Last Name" value="'.$lname.'">
                                  </div>
                                </div>
                              </div>
                            </div>
                            '; 

                            if($userType=="Student"){
                              echo '
                              <div class="row form-group student-only">
                                <label class="col-md-3 control-label">Reg. No.</label>
                                <div class="col-md-9">
                                  <input name="regNo" type="text" name="regular" class="form-control input-sm" placeholder="Registration Number" value="'.$regNo.'">
                                </div>
                              </div>

                              ';
                            }else if($userType=="Teacher"){
                              echo '<div class="row form-group teacher-only">
                              <label class="col-md-3 control-label ">Marital Status</label>

                              <div class="col-md-9">
                                <select name="maritalStatus" class="form-control input-sm" >
                                  <option ';if($maritalStatus=="Single"){echo 'selected';} echo'>Single</option>
                                  <option ';if($maritalStatus=="Married"){echo 'selected';} echo'>Married</option>
                                  <option ';if($maritalStatus=="Widowed"){echo 'selected';} echo'>Widowed</option>
                                  <option ';if($maritalStatus=="Divorced"){echo 'selected';} echo'>Divorced</option>
                                </select>
                              </div>
                            </div>

                            <div class="row form-group teacher-only">
                              <label class="col-md-3 control-label">NIC.</label>
                              <div class="col-md-9">
                                <input name="NICNo" type="text" class="form-control input-sm" placeholder="National Identity Card No." value="'.$NICNo.'">
                              </div>
                            </div>

                            ';
                          }


                          echo '




                          <div class="row form-group">
                            <label class="col-md-3 control-label">Gender</label>

                            <div class="col-md-9">
                              <select name="gender" class="form-control input-sm">
                                <option ';if($gender=="Male"){echo 'selected';} echo '>Male</option>
                                <option ';if($gender=="Female"){echo 'selected';} echo '>Female</option>

                              </select>
                            </div>
                          </div>




                          ';

                          if($userType=="Student"){
                            echo '    
                            <div class="row form-group student-only">
                              <label class="col-md-3 control-label">DOB</label>
                              <div id="datepicker" class="col-md-9">
                                <input name="dob" type="text" class="form-control input-sm" placeholder="yyyy-mm-dd" value="'.$dob.'">
                              </div>
                            </div>';
                          }


                          echo '




                          <div class="row form-group">
                            <label class="col-md-3 control-label">E-mail</label>
                            <div class="col-md-9">
                              <input name="email" readonly type="email" class="form-control input-sm" placeholder="e-mail address which will be used as the user name" value='.$email.'>
                            </div>
                          </div>

                          <div class="row form-group">
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                              <input name="password" type="password" class="form-control input-sm" placeholder="this password will be used to log into the system." value="'.$password.'">
                            </div>
                          </div>









                        </div>
                        <div class="tab-pane" id="degree" style="font-size:12px;">




                          ';

                          if($userType=="Student"){
                            echo '<div class="row form-group student-only">
                            <label class="col-md-3 control-label">Degree name/Code</label>
                            <div class="col-md-9">
                              <div class="row">
                                <div class="col-md-12">
                                  <select name="degreeCode" class="form-control input-sm">
                                    <option ';if($degreeCode==1){echo 'selected';} echo '>1</option>
                                    <option ';if($degreeCode==2){echo 'selected';} echo '>2</option>
                                    <option ';if($degreeCode==3){echo 'selected';} echo '>3</option>
                                    <option ';if($degreeCode==4){echo 'selected';} echo '>4</option>
                                    <option ';if($degreeCode==5){echo 'selected';} echo '>5</option>

                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row form-group student-only">
                            <label class="col-md-3 control-label">Year</label>
                            <div class="col-md-3">
                              <select name="year"  class="form-control input-sm">
                                <option ';if($year==1){echo 'selected';} echo '>1</option>
                                <option ';if($year==2){echo 'selected';} echo '>2</option>
                                <option ';if($year==3){echo 'selected';} echo '>3</option>
                                <option ';if($year==4){echo 'selected';} echo '>4</option>
                                <option ';if($year==5){echo 'selected';} echo '>5</option>

                              </select>
                            </div>
                            <div class="col-md-1">&nbsp;</div>
                            <label class="col-md-2 control-label">Semester</label>
                            <div class="col-md-3">
                              <select name="semester" class="form-control input-sm">
                                <option ';if($semester=="I"){echo 'selected';} echo '>I</option>
                                <option ';if($semester=="II"){echo 'selected';} echo '>II</option>

                              </select>
                            </div>
                          </div>


                          <div class="row form-group student-only">
                            <label class="col-md-3 control-label">Subjects</label>

                            <div class="col-md-9" style="padding-left:5px;">

                              <select   id="id_select" class="selectpicker bla bla bli input-sm" multiple data-live-search="true" onchange="$(\'#sub\').val($(\'#id_select\').val());">
                                <option ';if(contain($subjects,"Physics")){echo 'selected';} echo '>Physics</option>
                                <option ';if(contain($subjects,"Mathematics")){echo 'selected';} echo '>Mathematics</option>
                                <option ';if(contain($subjects,"Chemistry")){echo 'selected';} echo '>Chemistry</option>
                                <option ';if(contain($subjects,"Computer Science")){echo 'selected';} echo '>Computer Science</option>
                                <option ';if(contain($subjects,"Botany")){echo 'selected';} echo '>Botany</option>
                                <option ';if(contain($subjects,"Zoology")){echo 'selected';} echo '>Zoology</option>

                              </select>  

                              <input class="hidden" readonly name="subjects"  id="sub" type="text" value=\''.$subjects.'\'>

                            </div>
                          </div>


                          <div class="row form-group student-only">
                            <label class="col-md-3 control-label">Courses Registered</label>
                            <div class="col-md-9" style="padding-left:5px;">


                              <select  id="id_select1" class="selectpicker bla bla bli input-sm" multiple data-live-search="true" onchange="$(\'#coursesRegistered\').val($(\'#id_select1\').val());">
                                <optgroup label="Mathematics" data-subtext="Courses" data-icon="icon-ok" >
                                  <option ';if(contain($coursesRegistered,"MT100")){echo 'selected';} echo '>MT100</option>
                                  <option ';if(contain($coursesRegistered,"MT101")){echo 'selected';} echo '>MT101</option>
                                  <option ';if(contain($coursesRegistered,"MT102")){echo 'selected';} echo '>MT102</option>
                                </optgroup>
                                <optgroup label="Physics" data-subtext="Courses" data-icon="icon-ok" >
                                  <option ';if(contain($coursesRegistered,"PH100")){echo 'selected';} echo '>PH100</option>
                                  <option ';if(contain($coursesRegistered,"PH101")){echo 'selected';} echo '>PH101</option>
                                  <option ';if(contain($coursesRegistered,"PH103")){echo 'selected';} echo '>PH103</option>
                                </optgroup>
                              </select>     
                              <input class="hidden" readonly name="coursesRegistered"  id="coursesRegistered" type="text" value=\''.$coursesRegistered.'\'>
                            </div>
                          </div>


                          ';
                        }else if($userType=="Teacher"){
                          echo '<div class="row form-group teacher-only">
                          <label class="col-md-3 control-label">Title</label>
                          <div class="col-md-9">
                            <div class="row">
                              <div class="col-md-12">
                                <select name="title" class="form-control input-sm">
                                  <option ';if($title=="Prof."){echo 'selected';} echo '>Prof.</option>
                                  <option ';if($title=="Asso. Prof."){echo 'selected';} echo '>Asso. Prof.</option>
                                  <option ';if($title=="SL I"){echo 'selected';} echo '>SL I</option>
                                  <option ';if($title=="SL II "){echo 'selected';} echo '>SL II</option>
                                  <option ';if($title=="Lec"){echo 'selected';} echo '>Lec</option>
                                  <option ';if($title=="Ass. Lec"){echo 'selected';} echo '>Ass. Lec</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row form-group teacher-only">
                          <label class="col-md-3 control-label">Department</label>

                          <div class="col-md-9" style="padding-left:5px;">
                            <select name="department" class="selectpicker bla bla bli input-sm" data-width="auto">
                              <option  ';if($department=="Department of Physics"){echo 'selected';} echo '>Department of Physics</option>
                              <option  ';if($department=="Department of Chemistry"){echo 'selected';} echo '>Department of Chemistry</option>
                              <option  ';if($department=="Department of Mathematics"){echo 'selected';} echo '>Department of Mathematics</option>
                              <option  ';if($department=="Department of Botany"){echo 'selected';} echo '>Department of Botany</option>
                              <option  ';if($department=="Department of Statistics &amp; Computer Science"){echo 'selected';} echo '>Department of Statistics &amp; Computer Science</option>
                              <option  ';if($department=="Department of Zoology"){echo 'selected';} echo '>Department of Zoology</option>

                            </select>  
                          </div>
                        </div>

                        <div class="row form-group teacher-only">
                          <label class="col-md-3 control-label">Courses assigned</label>
                          <div class="col-md-9" style="padding-left:5px;">


                            <select  id="id_select2" class="selectpicker bla bla bli input-sm" multiple data-live-search="true" onchange="$(\'#coursesAssigned\').val($(\'#id_select2\').val());">
                              <optgroup label="Mathematics" data-subtext="Courses" data-icon="icon-ok" >
                                <option ';if(contain($coursesAssigned,"MT100")){echo 'selected';} echo '>MT100</option>
                                <option ';if(contain($coursesAssigned,"MT101")){echo 'selected';} echo '>MT101</option>
                                <option ';if(contain($coursesAssigned,"MT102")){echo 'selected';} echo '>MT102</option>
                              </optgroup>
                            </select>     
                            <input class="hidden" readonly name="coursesAssigned"  id="coursesAssigned" type="text" value=\''.$coursesAssigned.'\'>
                          </div>
                        </div>


                        ';
                      }


                      echo '






                    </div>


                  </div>
                </div>  

              </div>









            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </form>



  </div><!-- /.row -->





  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Registered Exams available to sit : '.date("M d Y").'</h3>
        </div>
        <div class="panel-body">
          

          <table class="table table-hover" style="font-size:13px;text-align:center">
              <thead>
                  <th style="text-align:center">Course</th>
                  <th style="text-align:center">Course Title</th>
                  <th style="text-align:center">Subject</th>
                  <th style="text-align:center">Examination Type</th>
                  <th style="text-align:center">Duration</th>
                  <th style="text-align:center">Sit </th>
              </thead>
              <tbody>';

              $q = "SELECT *
                FROM `exams`
                INNER JOIN `examRegistration`
                ON exams.examId=examRegistration.examId WHERE examRegistration.email = '$email'";

              //$query1 = "SELECT * FROM `exams` WHERE `year`='$year' AND `semester`='$semester'";
              $results = mysql_query($q) or die("Error runing the query".mysql_error());
             $counter=1;
              while($row = mysql_fetch_array($results)){
                echo '<form name="formreg'.$counter.'" action="sit-course.php" target="_blank" method="POST">
                        <tr>
                          <td>'.$row['courseCode'].'</td>
                          <td>'.$row['courseTitle'].'</td>
                          <td>'.$row['subject'].'</td>
                          <td ><span class="label label-warning">'.$row['examinationType'].'</span></td>
                          <td><span class="label label-default">'.$row['timeAllowed'].' minutes</span></td>
                          <td><a href="" data-toggle="modal" data-target="#myModal'.$counter.'"><i class="glyphicon glyphicon-edit"></i> Sit for this exam </a></td>
                        </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="myModal'.$counter.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Sit for '.$row['courseCode'].'</h4>
                              </div>
                              <div class="modal-body">
                                  You are about to sit for the following exam.<br><br>

                                  <ul class="list-group">
                                      <li class="list-group-item"><strong>Course Code <i class="glyphicon glyphicon-arrow-right"></i> </strong>'.$row['courseCode'].'</li>
                                      <li class="list-group-item"><strong>Course Title <i class="glyphicon glyphicon-arrow-right"></i> </strong>'.$row['courseTitle'].'</li>
                                      <li class="list-group-item"><strong>Examination Type <i class="glyphicon glyphicon-arrow-right"></i> </strong>'.$row['examinationType'].'</li>
                                      <li class="list-group-item"><strong>Duration <i class="glyphicon glyphicon-arrow-right"></i> </strong>'.$row['timeAllowed'].'</li>
                                     
                                  </ul>

                                  <input readonly class="hidden" type="text" name="examId" value="'.$row["examId"].'">
                                  <input readonly class="hidden" type="text" name="email" value="'.$email.'">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> &nbsp;Sit</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        
                      </form>';
                      $counter += 1;
              }

                
            
             echo '</tbody>
          </table>
        </div>
      </div>
    </div>
  </div><!-- /.row -->

  

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->




</body>
</html>
<html>

<body>
  <form action="logout.php" method="post">
    <button type="submit">Logout</button>		
  </form>

</body>
</html>';
mysql_close($server);
}else{
  header("Location:index.php");
		// echo "unsuccessfull login";	
		// echo "<br><a href='index.php'>Home</a>";	
}



?>