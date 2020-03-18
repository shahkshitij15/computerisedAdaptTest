<?php
session_start();
include_once 'class.user.php';
$user = new User();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <li class="active"><a href="#">About</a></li>
                    
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="#myModal" class="trigger-btn" data-toggle="modal"><span class="	glyphicon glyphicon-user"></span> Login</a></li>
                    <!--<li><a href="index.php?q=logout" class="trigger-btn"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>-->
                </ul>
            </div>
        </div>
    </nav>
	
	<div class="container">
		<div class="col-sm-6">
			<img src="stu.jpg" width="500" height="auto" style="padding-top:280px;">
		</div>
		<div class="col-sm-6">
			<br><br><br>
			<h2 style="color:orange"><b>What is an adaptive test?<b></h2>
			<h4>Computerized adaptive tests (CATs) are a sophisticated method of test delivery based on item response theory (IRT). They operate by adapting both the difficulty and quantity of items seen by each examinee.</h4>
			<br>
			<h3><b>Difficulty<b></h3>
			<h4>Most characterizations of adaptive testing focus on how item difficulty is matched to examinee ability. High ability examinees receive more difficult items, while low ability examinees receive easier items, which has important benefits to the student and the organization. An adaptive test typically begins by delivering an item of medium difficulty; if you get it correct, you get a tougher item, and if you get it incorrect, you get an easier item. This basic algorithm continues until the test is finished, though it usually includes subalgorithms for important things like content distribution and item exposure.</h4>
			<br>
			<h3><b>Quantity<b></h3>
			<h4>A less publicized facet of adaptation is the number of items. Adaptive tests can be designed to stop when certain psychometric criteria are reached, such as a specific level of score precision. Some examinees finish very quickly with few items, so that adaptive tests are typically about half as many questions as a regular test, with at least as much accuracy. Because some examinees have longer tests, these adaptive tests are referred to as variable-length. Obviously, this makes for a massive benefit: cutting testing time in half, on average, can substantially decrease testing costs. Nevertheless, some adaptive tests use a fixed length, and only adapt item difficulty. This is merely for public relations issues, namely the inconvenience of dealing with examinees who feel they were unfairly treated by the CAT, even though it is arguably more fair and valid than conventional tests.</h4>
		</div>
	</div>
	<div class="container">
		<div class="col-sm-6">
		<h2 style="color:orange"><b>Advantages of adaptive Testing<b></h2>
		<h4>By making the test more intelligent, adaptive testing provides a wide range of benefits.  Some of the well-known advantages of adaptive testing, recognized by scholarly psychometric research, are listed below.  However, the development of an adaptive test is a very complex process that requires substantial expertise in item response theory (IRT) and CAT simulation research.  Our Ph.D. psychometricians can provide your organization with the requisite experience to implement adaptive testing and help your organization benefit from these advantages.  Contact us or read this white paper to learn more.</h4>
		<ul>
			<li>Shorter tests, anywhere from a 50% to 90% reduction; reduces cost, examinee fatigue, and item exposure</li>
			<li>More precise scores: CAT will make tests more accurate</li>
			<li>More control of score precision (accuracy): CAT ensures that all students will have the same accuracy, making the test much more fair.  Traditional tests measure the middle students well but not the top or bottom students.</li>
			<li>Increased efficiency</li>
			<li>Greater test security because everyone is not seeing the same form</li>
			<li>A better experience for examinees, as they only see items relevant for them, providing an appropriate challenge</li>
			<li>The better experience can lead to increased examinee motivation</li>
			<li>Immediate score reporting</li>
			<li>More frequent retesting is possible; minimize practice effects</li>
			<li>Individual pacing of tests; examinees move at their own speed</li>
			<li>On-demand testing can reduce printing, scheduling, and other paper-based concerns</li>
			<li>Storing results in a database immediately makes data management easier</li>
			<li>Computerized testing facilitates the use of multimedia in items</li>
		</ul>
		</div>
		<div class="col-sm-6">
			<img src="child.jpg" width="600" height="670">
		</div>
	</div>
	
	<div class="container">
		<div class="col-sm-6">
			<img src="img3.jpg" width="500" height="400">
		</div>
		<div class="col-sm-6">
		<h2 style="color:orange"><b>What do I need for adaptive testing? Minimum requirements:<b></h2>
			<ul>
				<li>A large item bank piloted on at least 500 examinees</li>
				<li>1,000 examinees per year</li>
				<li>Specialized IRT calibration and CAT simulation software</li>
				<li>Staff with a PhD in psychometrics or an equivalent level of experience. Or, leverage our internationally recognized expertise in the field.</li>
				<li>Items (questions) that can be scored objectively correct/incorrect in real time</li>
				<li>Item banking system and CAT delivery platform</li>
				<li>Financial resources: Because it is so complex, development of a CAT will cost at least $10,000 (USD) — but if you are testing large volumes of examinees, it will be a significant positive investment.</li>
			</ul>
		</div>
	</div>
	
	<div class="container">
		<div class="col-sm-6">
		<h2 style="color:orange"><b>No, you can’t just subjectively rank items!<b></h2>
		<h4>Computerized adaptive tests (CATs) are the future of assessment. They operate by adapting both the difficultyand number of items to each individual examinee. The development of an adaptive test is no small feat, and requires five steps integrating the expertise of test content developers, software engineers, and psychometricians. The development of a quality adaptive test is not possible without a Ph.D. psychometrician experienced in both item response theory (IRT) calibration and CAT simulation research. FastTest can provide you the psychometrician and software; if you provide test items and pilot data, when can help you quickly publish an adaptive version of your test.</h4>
		<h3 style="color:orange">Step 1:</h3>
		<h4> Feasibility, applicability, and planning studies. First, extensive monte carlo simulation research must occur, and the results formulated as business cases, to evaluate whether adaptive testing is feasible, applicable, or even possible.</h4>
		
		<h3 style="color:orange">Step 2:</h3>
		<h4> Develop item bank. An item bank must be developed to meet the specifications recommended by Step 1.</h4>
		
		<h3 style="color:orange">Step 3:</h3>
		<h4>Pretest and calibrate item bank. Items must be pilot tested on 200-1000 examinees (depends on IRT model) and analyzed by Ph.D. psychometrician.</h4>
		
		<h3 style="color:orange">Step 4:</h3>
		<h4>Determine specifications for final CAT. Data from Step 3 is analyzed to evaluate CAT specifications and determine most efficient algorithms using CAT simulation software such as CATSim.</h4>
		
		<h3 style="color:orange">Step 5:</h3>
		<h4>Publish live CAT. The adaptive test is published in a testing engine capable of fully adaptive tests based on IRT.</h4>
		</div>
		<div class="col-sm-6">
			<img src="cat1.png" width="600" height="800">
		</div>
	</div>
	
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
                                if($_SESSION['type']==1)
                                {
                                    echo "<script>location='student.php'</script>";
                                }
                                if($_SESSION['type']==2)
                                {
                                    echo "<script>location='teacher.php'</script>";
                                }
                                if($_SESSION['type']==3)
                                {
                                    echo "<script>location='admin1.php'</script>";
                                }
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