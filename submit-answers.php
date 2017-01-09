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
   
   for($i=0; $i < $_POST['total'] ; $i++){
        $q[$i] = $_POST["q$i"];
        $a[$i] = $_POST["a$i"];
   }
   

   

   $examId = $_POST['examId']; 
   $email = $_POST['email'];
   $i=0;
 
    while($a[$i]) {
    		

            $query1 = "UPDATE `answeres` SET `answer`='$a[$i]' WHERE (`examId` = '$examId') AND (`qId`= '$q[$i]') AND (`registrantEmail`='$email')";
            mysql_query($query1);

            $i+=1;
    	}

    


    echo "<script>
    alert('Successfully Saved.');
    window.close();
    </script>";

    mysql_close($server);

?>