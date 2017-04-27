<!DOCTYPE html>
<html lang="en">
<?php 
        //Requires the file CreateDB.php and runs the SQL query and stores it inside $result.
        require 'CreateDB.php'; 
        //starting session
        session_start();
        //Empty string variable for any errors
        $regErr = "";
        
        //If the user has already posted information, then check if username is taken.
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            $result = mysqli_query($conn, "SELECT userName FROM User 
                                            WHERE userName = '".$userName."'");
            if(mysqli_num_rows($result) === 0){
                //Stores the information entered by the user and is inserted into the
                // user table if the username is not taken.
                $userName = $_POST['userName'];
                $password = $_POST['password'];
                $Address = $_POST['Address'];
                $isStudent = $_POST['isStudent'];
                $isCertified = $_POST['isCertified'];
                $researchTitle = $_POST['researchTitle'];
                
        	    $firstName = $_POST['firstName'];
        	    $lastName = $_POST['lastName'];
        	    $email = $_POST['email'];
        	    $phoneNo = $_POST['phoneNo'];
        	    
                $sql = "INSERT INTO User (UID, PID, CID, userName, password, Address, isStudent, isCertified, ResearchTitle)
                         VALUES('','1','1', '$userName', password('$password'), '$Address','$isStudent','$isCertified','$researchTitle')";
                if(mysqli_query($conn, $sql) == FALSE) 
                    echo "Communication error: " . mysqli_error($conn);
                
                 $sql = "INSERT INTO People (PID, firstName, lastName, email, phoneNo)
                    VALUES('','$firstName','$lastName','$email','$phoneNo')";
                    if(mysqli_query($conn, $sql) == FALSE) 
                        echo "error: " . mysqli_error($conn);
                        
                //Stores the username to the session array and redirects them to profile.php.
                $_SESSION['login_user'] = $userName;
                header("location: profile.php");
            //If username is taken, then print an error.
            } else $regErr = $_POST['userName']." is already taken. Please choose a different username.";
        }
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Marist IRB Register</title>
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
            <li><a href="login.html">Login</a></li>
			<li class="active"><a href="register.html">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- *****************************************************************************************************************
	 Mission Statement
	 ***************************************************************************************************************** -->
	  <br/><br/><br/><br/><br/><br/><br/>
	  
	  <div class="register-card">
    <h1>Register</h1><br>
  <form>
    <input type="text" name="firstName" placeholder="* First Name" required>
	<input type="text" name="lastName" placeholder="* Last Name" required>
	<input type="email" name="email" placeholder="* Email" required>
	<input type="password" id="password" placeholder="* Password" required>
	<input type="password" id="ConfPass" placeholder="* Confirm Password" required>
    <input type="submit" id="register" class="register register-submit" value="Submit">
  </form>
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
	<script src="assets/js/password.js"></script>
  </body>
<?php
        //checking for error and printing to users.
        if($regErr != "")
            echo "Error: ".$regErr;
?>
</html>
