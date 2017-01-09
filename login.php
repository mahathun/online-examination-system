<?php 
	include("connection.php");
		
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	
	 $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "SELECT * FROM `users`";
    $query = mysql_query($myquery);
    
    if ( !$query ) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die;
    }
   
   
   $login = false;
   $userType;
   
    while($row = mysql_fetch_array($query)) {
    		if( $user == $row['email'] && $pass == $row['password']){   				
    				$login = true;
    				$userType = $row['userType'];
    				break;
    			}
    	
    	}
    	
    	
    	if($login) {
			session_start();
			
			$_SESSION['user'] = $user;
			$_SESSION['userType'] = $userType;
    		
    		header("Location:userConsole.php");
    		
    		
    	}else{
    			header("Location:index.php?invalid=true");
    	}

    mysql_close($server);

?>