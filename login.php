<?php
/* login.php
* Last Modified: 5/1/2017
*/

    //Require session.php which starts the session and requires CreateDB.php
    require 'session.php';

    //If the user is logged in, send them to profile.php
   if(isset($_SESSION['login_user'])){	
       // header("location: profile.php");	
        //die;	
    }
    //An empty string to print login errors.
    $loginErr = "";
    
    //If the user entered information the verify if the username/password is available.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST['email']) || empty($_POST['password']))
				$loginErr = "Username and/or Password are empty, please update.";	
		else {	
				//Store $email and $password	
				$email = $_POST['email'];	
				$password = $_POST['password'];
			
				//SQL query to collect user information if it exists.	
				$sql = "SELECT * FROM User WHERE password=password('$password')
				                            AND email = '$email'";	
				$query = mysqli_query($conn, $sql);	

                //Check if user exists.	
				if(mysqli_num_rows($query) === 1) {
				        $row = mysqli_fetch_assoc($query);
				        //Storing username
						$_SESSION['login_user'] = $row['email'];
						//Sends user to profile.php
						header("location: profile.php");	
				} else {
				        //user does not exist.
						$loginErr = "Invalid Username and/or Password.";	
				}	
		}	
    }
?>	
<html>	
    <!--Form for the user to log in. The information is sent to itself, index.php.-->
    <title>Marist IRB</title>
    <body>	
        <h1>Marist IRB</h1>
        <br>
        <br>
        <form action="login.php" method="post">
        <!--Print errors if there are any.--> 
        <?php echo $loginErr; ?>
         <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Marist IRB Login</title>
    <!-- core CSS -->

    <link href="assets/css/core.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<!-- FavIcon -->
	<link rel="icon" href="assets/img/favicon.ico">
	
    <script src="assets/js/modernizr.js"></script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img src="assets/img/marist.png"></a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
			<li><a href="faq.html">FAQ</a></li>
            <li><a href="info.html">IRB Info</a></li>
            <li class="active"><a href="login.html">Login</a></li>
			<li><a href="register.html">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- *****************************************************************************************************************
	 Mission Statement
	 ***************************************************************************************************************** -->
	  <br/><br/><br/><br/><br/><br/><br/>
	  
	  <div class="login-card">
    <h1>Login</h1><br>
    <input type="email" name="email" placeholder="example@email.com" required>
    <input type="password" name="password" placeholder="********" required>
    <input type="submit" name="login" class="login login-submit" value="login">
  
    
  <div class="login-help">
    <a href="register.html">Register</a> • <a href="#">Forgot password</a>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
	 
	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="https://www.facebook.com/marist/" target="_blank"><i class="fa fa-facebook"></i></a>
		 				<a href="https://twitter.com/Marist?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><i class="fa fa-twitter"></i></a>
		 				<a href="https://www.instagram.com/marist/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a>
		 				<a href="https://www.youtube.com/user/Marist" target="_blank"><i class="fa fa-youtube"></i></a>
		 			</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Marist College</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				3399 North Road,<br/>
		 				12601, New York,<br/>
		 				United States.<br/>
		 			</p>
		 		</div>
		 	
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->
	 
    <!-- core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/min.js"></script>
	<script src="assets/js/retina-1.1.0.js"></script>
	<script src="assets/js/jquery.hoverdir.js"></script>
	<script src="assets/js/jquery.hoverex.min.js"></script>
	<script src="assets/js/jquery.prettyPhoto.js"></script>
  	<script src="assets/js/jquery.isotope.min.js"></script>
  	<script src="assets/js/custom.js"></script>
  </body>
  </body>
        </form>	
    </body>	
</html>
