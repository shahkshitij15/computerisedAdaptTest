<?php 
session_start(); 
include_once 'class.user.php'; 
$user=new User(); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Anton|Fredoka+One|Niramit|Patua+One" rel="stylesheet">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
	<script src="loop.js"></script>

	
	<style>
	nav .active
	{
		border-bottom: 5px solid white;
	}
	
	footer
	{
		color: #7D7D7D;
	}
	footer .socialm
	{
		background-color: black;
		color: white;
		padding:20px;
	}
	footer	.fa 
	{
	padding: 10px;
  	font-size: 15px;
    text-align: center;
  	text-decoration: none;
  	margin: 5px 5px;
	}

	footer .fa:hover
	{
    opacity: 0.7;
	text-decoration: none;
	}

	footer .fa-facebook
	{
  	background: #3B5998;
  	color: white;
	}

	.fa-twitter
	{
  	background: #55ACEE;
  	color: white;
	}	

	.fa-google 
	{
  	background: #dd4b39;
  	color: white;
	}

	.fa-linkedin 
	{
  	background: #007bb5;
  	color: white;
	}

	.fa-youtube 
	{
  	background: #bb0000;
  	color: white;
	}

	.fa-instagram 
	{
  	background: #125688;
  	color: white;
	}
	footer a{
		color:grey;
	}
	footer a:hover{
		color:white;
		text-decoration:none;
	}

	
  body{
  width:100%;
  height:100%;
  font-family: 'Roboto Condensed', sans-serif;
  
}


h1,h2,h3 {
  margin:0 0 35px 0;
  font-family: 'Patua One', cursive;
  text-transform: uppercase;
  letter-spacing:1px;
}

p{
  margin:0 0 25px;
  font-size:18px;
  line-height:1.6em;
}
a{
  color:#26a5d3;
}
a:hover,a:focus{
  text-decoration:none;
  color:#26a5d3;
}

#contact{
  background:#333333;
  color:#f4f4f4;
  padding-bottom:80px;
}

textarea.form-control{
    height:100px;
}

	</style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Computerised Adaptive Test</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.php">About</a></li>
                    
                    <li class="active"><a href="#">Contact</a></li>
                    <li><a href="#myModal" class="trigger-btn" data-toggle="modal"><span class="	glyphicon glyphicon-user"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="avatar" style="text-align:center;">
                        <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-372-456324.png" width="80px" height="80px" alt="Avatar">

                        <h4 class="modal-title" style="padding-top:20px;">Member Login</h4>
                    </div>

                </div>
                <div class="modal-body">
                    <form action="" name="login" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" value="Login" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                        </div>
                    </form>
                    <p id="wrong_id"></p>

                    <?php 
                    if (isset($_REQUEST['submit'])) {
                        extract($_REQUEST);
                    
                            $login = $user->check_login($username, $password);
                            if ($login) {
                                echo "done!";
                            } else { ?>
                    <script type="text/javascript">
                        alert("Wrong credentials");
                    </script>

                    <?php 
                }
            } ?>
                </div>


                <div class="modal-footer">
                    <a href="#">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
	
	<section id="contact" class="content-section text-center">
        <div class="contact-section">
            <div class="container">
              <div class="row">
			  <div class="col-lg-6" style="padding-top:20px; padding-right:180px;margin-left: -80px;border-right: 1px solid white;">
              <p>Contact Us</p>
              <p>Feel free to contact us by filling the form or visiting our social network sites</p>
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                      <label for="exampleInputName2">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName2" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail2">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="example@gmail.com" required>
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputText">Your Message</label>
                     <textarea  class="form-control" name="message" placeholder="Description" required></textarea> 
                    </div>
                    <button type="submit" name="submit1" class="btn btn-primary">Send Message</button>
					<p id="wrong_id" style=" color:red; font-size:12px; "></p>
					<?php
					if(isset($_REQUEST['submit1']))
					{
						extract($_REQUEST);
						$login=$user->get_query($_POST['name'],$_POST['email'],$_POST['message']);
						if($login)
						{
							echo "<script type='text/javascript'>
							alert('Thank You for your query!We will get back to you soon');
							</script>";
							$_SESSION['count']=$_SESSION['count']+1;
							echo"<script>location='index.php'</script>";
						}
						else
						{
							echo "<script type='text/javascript'>
							document.getElementById('wrong_id').innerHTML = 'Entry failed';
							</script>";
							echo"<script>location='contact.php'</script>";
						}
					}
					?>
                  </form>

                  <hr>
				 </div>
                </div>
				  </div>
				  <div class="col-lg-6">
				  	<div class="container text-left" style="margin-top: 80px; padding-left: 150px;">
					  	<h3>Find us at:</h3>
						<p style="margin-top: -20px;">Sardar Patel Institute of Technology,<br>Munshi Nagar,Andheri(W)</p>
						<div id="googleMap" style="width:300px;height:150px;"></div>

						<script>
						function myMap() {
var mapProp= {
    center:new google.maps.LatLng(19.123229, 72.836124),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
						</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
						<br>
						<h3>Call us at</h3>
						<p style="margin-top: -35px;">022 2670 7440</p>
						<h3>Drop a mail at</h3>
					  	<p style="margin-top: -35px;">customercare@cat.com</p>
					  
					  </div>
				  
				  
				  </div>
				  </div>
            </div>
        </div>
      </section>
	<footer>
	
	<div class="container socialm" style="padding: 0px; width: 100%;">
  <div class="row text-center" style="padding-top: 20px; font-size: 20px; font-family:'bebas-neue'; background-color: black;">
    
      <p>Stay Connected</p>
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-google"></a>
      <a href="#" class="fa fa-linkedin"></a>
      <a href="#" class="fa fa-youtube"></a>
      <a href="#" class="fa fa-instagram"></a><br>
  </div>
  <div class="row text-center" style="border-top:2px solid #212121; margin-top:8px; color:#565656; padding-bottom: 20px;">
    <h4>&#169 Computerized Adaptive Testing</h4>
    <h5>Designed and developed by Team Invincible</h5>
  
  </div>
</div>
  
</footer>

</body>

</html> 