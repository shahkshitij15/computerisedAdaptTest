 <?php
    session_start();
    include_once 'class.user.php';
    $user = new User();
    $uid = $_SESSION['username'];
    $result = $user->get_user_details($uid);
    $row = mysqli_fetch_array($result);

    
if($_SESSION['type']!=2)
{
    ?>
    <script>alert("You are not allowed to access this page");</script>
    <script>location="index.php"</script>
<?php
}





    ?>

 <!DOCTYPE html>
 <html>

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
     <script type="text/javascript">
         $(document).ready(function() {
             $("#success").modal('show');
         });
     </script>

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
                     <li>
                         <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['username'] ?></a>
                     </li>
                     <li><a href="contact.php?q=logout" class="trigger-btn">
                             <span class="glyphicon glyphicon-envelope"></span>Contact</a>
                     </li>
                     <li><a href="index.php?q=logout" class="trigger-btn">
                             <span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>

     <div class="container">
         <br><br><br><br>

         <ul class="nav nav-tabs">
             <li><a data-toggle="tab" href="#questions">Question</a></li>
             <li><a data-toggle="tab" href="#result">Result</a></li>
             <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
         </ul>

         <div class="tab-content">
             <div id="questions" class="tab-pane fade">
                 <div class="table-wrapper">
                     <div class="table-title">
                         <div class="row">
                             <div class="col-sm-8">
                                 <h2>Question Details</h2>
                             </div>
                             <div class="col-sm-4">
                                 <button href="#addt" type="button" class="btn btn-info" data-toggle="modal">Add New</button>
                             </div>
                         </div>
                     </div>
                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>QID</th>
                                 <th>Statement</th>
                                 <th>Option A</th>
                                 <th>Option B</th>
                                 <th>Option C</th>
                                 <th>Option D</th>
                                 <th>Answer</th>
                                 <th>Difficulty</th>
                                 <th>Marks</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $a = $_SESSION['username'];
                                $result = $user->get_question_details($a);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['q_id'] . "</td>";
                                    echo "<td>" . $row['statement'] . "</td>";
                                    echo "<td>" . $row['a'] . "</td>";
                                    echo "<td>"    . $row['b'] . "</td>";
                                    echo "<td>" . $row['c'] . "</td>";
                                    echo "<td>" . $row['d'] . "</td>";
                                    echo "<td>" . $row['answer'] . "</td>";
                                    echo "<td>" . $row['value'] . "</td>";
                                    echo "<td>" . $row['marks'] . "</td>";
                                    ?>
                                 <td>
                                     <a href="update.php?id=<?php echo $row['q_id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                     <a href="#" data-toggle="modal" data-target="#myModal<?php echo $row['q_id']; ?>">
                                         <span class="glyphicon glyphicon-trash"></span></a>
                                     <div class="modal fade" id="myModal<?php echo $row['q_id']; ?>" role="dialog">
                                         <div class="modal-dialog">

                                             <!-- Modal content-->
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                     <h4 class="modal-title">Delete File</h4>
                                                 </div>
                                                 <div class="modal-body">
                                                     <p>Are you sure?</p>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                     <a href="delete1.php?id=<?php echo $row['q_id']; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
                                                 </div>
                                             </div>
                                 </td>
                                 <?php echo "</tr>";
                                } ?>
                         </tbody>
                     </table>
                 </div>
             </div>

             <div id="result" class="tab-pane fade">
                 <div class="container">
                     <h2>Student Results</h2>
                     <hr>

                     <ul class="nav nav-tabs">
                         <li class="active"><a data-toggle="tab" href="#home">Total</a></li>
                         <li><a data-toggle="tab" href="#menu1">Average</a></li>
                         <li><a data-toggle="tab" href="#menu2">Range</a></li>
                         <li><a data-toggle="tab" href="#menu3">Search</a></li>
                     </ul>

                     <div class="tab-content">
                         <div id="home" class="tab-pane fade in active">
                             <div class="table-wrapper">
                                 <table class="table table-bordered">
                                     <thead>
                                         <tr>
                                             <th>User ID</th>
                                             <th>Name</th>
                                             <th>Marks</th>
                                             <th>Total</th>
                                             <th>Percent(%)</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $a = $_SESSION['username'];
                                            $result = $user->get_student_marks($a);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['s_id'] . "</td>";
                                                echo "<td>" . $row['s_name'] . "</td>";
                                                echo "<td>" . $row['marks'] . "</td>";
                                                echo "<td>" . $row['total'] . "</td>";
                                                echo "<td>" . $row['percent'] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                         <div id="menu1" class="tab-pane fade">
                             <div class="table-wrapper">
                                 <div class="table-title">
                                     <div class="row">
                                         <div class="col-sm-8">
                                             <h2>Average Percent:</h2>
                                         </div>
                                         <?php
                                            $a = $_SESSION['username'];
                                            $result = $user->get_average($a);
                                            $row = mysqli_fetch_array($result);
                                            echo "<h2>" . $row['percent'] . " %</h2>";
                                            ?>
                                         <hr>
                                         <div class="col-sm-8">
                                             <h2>Students above average</h2>
                                         </div>
                                     </div>
                                 </div>
                                 <table class="table table-bordered">
                                     <thead>
                                         <tr>
                                             <th>User ID</th>
                                             <th>Name</th>
                                             <th>Marks</th>
                                             <th>Total</th>
                                             <th>Percent(%)</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $a = $_SESSION['username'];
                                            $result = $user->get_student_marks_aboveAverage($a);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['s_id'] . "</td>";
                                                echo "<td>" . $row['s_name'] . "</td>";
                                                echo "<td>" . $row['marks'] . "</td>";
                                                echo "<td>" . $row['total'] . "</td>";
                                                echo "<td>" . $row['percent'] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                     </tbody>
                                 </table>
                             </div>
                             <div class="table-wrapper">
                                 <div class="table-title">
                                     <div class="row">
                                         <div class="col-sm-8">
                                             <h2>Students below average</h2>
                                         </div>
                                     </div>
                                 </div>
                                 <table class="table table-bordered">
                                     <thead>
                                         <tr>
                                             <th>User ID</th>
                                             <th>Name</th>
                                             <th>Marks</th>
                                             <th>Total</th>
                                             <th>Percent(%)</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $a = $_SESSION['username'];
                                            $result = $user->get_student_marks_belowAverage($a);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['s_id'] . "</td>";
                                                echo "<td>" . $row['s_name'] . "</td>";
                                                echo "<td>" . $row['marks'] . "</td>";
                                                echo "<td>" . $row['total'] . "</td>";
                                                echo "<td>" . $row['percent'] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                         <div id="menu2" class="tab-pane fade">
                             <div class="table-wrapper">
                                 <div class="table-title">
                                     <div class="row">
                                         <div class="col-sm-8">
                                             <h2>Maxiumum Marks</h2>
                                         </div>
                                     </div>
                                 </div>
                                 <table class="table table-bordered">
                                     <thead>
                                         <tr>
                                             <th>User ID</th>
                                             <th>Name</th>
                                             <th>Marks</th>
                                             <th>Total</th>
                                             <th>Percent(%)</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $a = $_SESSION['username'];
                                            $result = $user->get_student_maxmarks($a);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['s_id'] . "</td>";
                                                echo "<td>" . $row['s_name'] . "</td>";
                                                echo "<td>" . $row['marks'] . "</td>";
                                                echo "<td>" . $row['total'] . "</td>";
                                                echo "<td>" . $row['percent'] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                     </tbody>
                                 </table>
                             </div>
                             <div class="table-wrapper">
                                 <div class="table-title">
                                     <div class="row">
                                         <div class="col-sm-8">
                                             <h2>Minimum Marks</h2>
                                         </div>
                                     </div>
                                 </div>
                                 <table class="table table-bordered">
                                     <thead>
                                         <tr>
                                             <th>User ID</th>
                                             <th>Name</th>
                                             <th>Marks</th>
                                             <th>Total</th>
                                             <th>Percent(%)</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $a = $_SESSION['username'];
                                            $result = $user->get_student_minmarks($a);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['s_id'] . "</td>";
                                                echo "<td>" . $row['s_name'] . "</td>";
                                                echo "<td>" . $row['marks'] . "</td>";
                                                echo "<td>" . $row['total'] . "</td>";
                                                echo "<td>" . $row['percent'] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>

                         <div id="menu3" class="tab-pane fade">
                             <form method="POST">
                                 <div class="form-group">
                                     <span class="glyphicon glyphicon-search"></span>
                                     <div class="col-m-10">
                                         <input type="text" class="form-control" name="name" placeholder="Enter the username to search" required="required">
                                     </div>
                                     <br>
                                     <div class="col-m-2">
                                         <button type="submit" name="submit" class="btn btn-info" data-toggle="tooltip">Search</button>
                                         <?php
                                            if (isset($_POST['submit'])) {
                                                echo '<br><div class="table-wrapper">
						<table class="table table-bordered">
						<thead>
						<tr>
                            <th>User ID</th>
							<th>Name</th>
                            <th>Marks</th>
                            <th>Total</th>
                            <th>Percent(%)</th>
						</tr>
						</thead>
						<tbody>';
                                                $a = $_SESSION["username"];
                                                $b = $_POST["name"];
                                                $result = $user->get_specificStudent($a, $b);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['s_id'] . "</td>";
                                                    echo "<td>" . $row['s_name'] . "</td>";
                                                    echo "<td>" . $row['marks'] . "</td>";
                                                    echo "<td>" . $row['total'] . "</td>";
                                                    echo "<td>" . $row['percent'] . "</td>";
                                                    echo "</tr>";
                                                }
                                                echo '</tbody>
						</table>
					</div>';
                                            }
                                            ?>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>




             <div id="profile" class="tab-pane fade in active">
                 <br>
                 <div class="row">
                     <div class="col-xs-12 col-sm-3 center">
                         <span class="profile-picture">
                             <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="avatar1.png">
                         </span>

                         <div class="space space-4"></div>
                         <a href="editt.php" class="btn btn-sm btn-block btn-light">
                             <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                             <span class="bigger-110">Edit profile</span>
                         </a>

                         <a href="changet.php" class="btn btn-sm btn-block btn-primary">
                             <i class="ace-icon fa fa-envelope-o bigger-110"></i>
                             <span class="bigger-110">Change Password</span>
                         </a>
                     </div><!-- /.col -->

                     <?php
                        $result = $user->get_user_details($uid);
                        $row = mysqli_fetch_array($result);
                        ?>

                     <div class="col-xs-12 col-sm-9">
                         <h4 class="blue">
                             <span class="middle"><?php echo $row['t_name']; ?></span>

                             <span class="label label-purple arrowed-in-right">
                                 <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                                 online
                             </span>
                         </h4>

                         <div class="profile-user-info">
                             <div class="profile-info-row">
                                 <div class="profile-info-name"> Username </div>
                                 <div class="profile-info-value">
                                     <span><?php echo $row['t_id']; ?></span>
                                 </div>
                             </div>
                             <div class="profile-info-row">
                                 <div class="profile-info-name"> Email ID </div>
                                 <div class="profile-info-value">
                                     <span><?php echo $row['t_email']; ?></span>
                                 </div>
                             </div>
                             <div class="profile-info-row">
                                 <div class="profile-info-name"> Teaches </div>
                                 <div class="profile-info-value">
                                     <span><?php echo $row['subject']; ?></span>
                                 </div>
                             </div>
                         </div>
                         <div class="hr hr-8 dotted"></div>
                     </div><!-- /.col -->
                 </div><!-- /.row -->
             </div>
         </div>
     </div>


     <!--ADD QUESTION MODAL-->
     <div id="addt" class="modal fade">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4>Add QUESTION</h4>
                 </div>
                 <div class="modal-body">
                     <form name="add" method="post">
                         <!--<div class="form-group">
                            <input type="text" class="form-control" name="qid" placeholder="Question ID" required="required">
                        </div>-->
                         <div class="form-group">
                             <input type="text" class="form-control" name="statement" placeholder="Statement" required="required">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" name="a" placeholder="Option A" required="required">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" name="b" placeholder="Option B" required="required">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" name="c" placeholder="Option C" required="required">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" name="d" placeholder="Option D" required="required">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" name="ans" placeholder="Answer" required="required">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" name="value" placeholder="Difficulty" required="required">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" name="marks" placeholder="Marks" required="required">
                         </div>
                         <div class="form-group">
                             <button type="submit" name="tsubmit" class="btn btn-primary btn-lg btn-block login-btn">Confirm</button>
                         </div>
                     </form>
                     <p id="wrong_id"></p>

                     <?php
                        if (isset($_REQUEST['tsubmit'])) {
                            extract($_REQUEST);

                            $login = $user->check_login($userId, $pwd);
                            if ($login) {
                                echo "<script>location='teacher.php'</script>";
                            } else {
                                $a = $_SESSION['username'];
                                $res = $user->add_question($a, $statement, $a, $b, $c, $d, $ans, $value, $marks);
                                if ($res) {
                                    echo "<script>location='teacher.php'</script>";
                                } else {
                                    echo "<script>location='update.php'</script>";
                                }
                            }
                        } ?>
                 </div>
             </div>
         </div>
     </div>


 </body>