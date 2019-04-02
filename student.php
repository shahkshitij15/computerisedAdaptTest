<?php
session_start();
include_once 'class.user.php';
$user=new User();
$uid=$_SESSION['username'];
?>



<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="student.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
                <a class="navbar-brand" href="#">Computerised Adaptive Test</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">About</a></li>
                    <li><a href="#">Take a Test</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#myModal" class="trigger-btn" data-toggle="modal"><span
                                class="	glyphicon glyphicon-user"></span> Login</a></li>
                    <li><a href="index.php?q=logout" class="trigger-btn"><span
                                class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-8 boundary text-center" >
                <div class="row">
                    <div class="col-md-6" style="padding:10px;">
                        Questions Answered
                    </div>
                    <div class="col-md-6" style="padding:10px;">
                        Percentage
                    </div>
                    
                </div>

                <div class="row">
                        <div class="col-md-6" style="padding:10px;">
                            1000
                        </div>
                        <div class="col-md-6" style="padding:10px;">
                            95%
                        </div>
                    </div>

            </div>


            <?php
                 $result=$user->get_details($_SESSION['username']);
                 if($result)
                 {
                     if(mysqli_num_rows($result)>0)
                     {
                         while($row=mysqli_fetch_array($result))
                         {
                             echo "
                             
                             <div class='col-md-2 text-center boundary2' style='margin-left:100px;'>
                            <div class='row' style='padding-bottom: 20px;'>
                            <img src='https://via.placeholder.com/150' alt='place' style='border-radius:5px;'>
                            </div>
                            <div class='row' style='padding:10px 0px;border-bottom: 1px solid grey'>"
                            .$row['s_name']."
                            </div>
                            <div class='row' style='padding:10px 0px;border-bottom: 1px solid grey'>
                            19
                            </div>
                            <div class='row' style='padding:10px 0px;'>".$row['s_email']."
                            
                            </div>
                            </div>
                             
                             
                             
                             
                             
                             
                             ";

                         }
                     }
                 }   



            ?>



            
           
        
        </div>

    </div>



</body>

</html>