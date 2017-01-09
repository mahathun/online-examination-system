<html>
<head>

<title>Login</title>

<!-- jquery -->
<script type="text/javascript" src="lib/js/jquerry.js">

</script>

<!-- bootstrap css -->
<link rel="stylesheet" href="lib/css/bootstrap.min.css"></link>

<!-- bootstrap js -->
<script type="text/javascript" src="lib/js/bootstrap.min.js" ></script>



<!--login form-->
<link rel="stylesheet" href="lib/css/login.css"></link>
<script type="text/javascript" src="lib/js/login.js"></script> 

<style type="text/css">
	
	
	

</style>

<script type="text/javascript" >

	
</script>



</head>
<body>

<div class="container">
	<div class="login-container">
            <div id="output"></div>
            <div class="avatar">
					<img src="images/user.jpg" alt="user" class="img-circle" height="96" >            
            </div>
            <div class="form-box">
                <form id="login" action="login.php" method="post" onsubmit="return checkForm(this);return false;">
                		
							<?php
							if($_GET['invalid']=='true') {
								echo"<div id='invalid-login' class='alert alert-danger'>
 										 <button type='button' class='close' data-hide='alert'>&times;</button>
 												 Invalid Login
										</div>";							
							}
							
							?>                		
                		
                		<div id="error" class="alert alert-warning" style="display:none" >
 								 <button type="button" class="close" data-hide="alert">&times;</button>
 								 You can't leave these fields blank.
							</div>
                	 
                    <input id="user" name="user" type="text" placeholder="email">
                    <input id="password" name="pass" type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" onclick="">Login</button>
                    
                    <a href="signup.php">sign up</a>
                </form>
            </div>
        </div>
        
</div>


</body>

</html>