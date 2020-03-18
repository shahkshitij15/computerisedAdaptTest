<?php
session_start();
include_once 'class.user.php';
$user = new User();
$uid = $_SESSION['username'];
$result=$user->get_user_details($uid);
$row=mysqli_fetch_array($result);
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
</head>

<body>
   <div class="container">
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
                  <a href ="teacher.php "class="navbar-brand"><span class="glyhicon glyphicon-user" style="color: white"></span><?php echo $_SESSION['username'] ?></a>
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
      <br><br><br><br>
      <form class="form-horizontal" action="editt.php" method="post">
         <div class="form-group">
            <label class="control-label col-sm-2" for="email">Username:</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="userId" value="<?php echo $row['t_id'];?>" name="id">
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Name:</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="name" value="<?php echo $row['t_name'];?>" name="name">
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Email</label>
            <div class="col-sm-10">
               <input type="email" class="form-control" id="email" value="<?php echo $row['t_email'];?>" name="email">
            </div>
         </div>
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" name="submit" class="btn btn-default">Submit</button>
               <button class="btn btn-default"><a href="student.php">Back</a></button>
            </div>
         </div>
         <?php
            if (isset($_REQUEST['submit'])){
               extract($_REQUEST);
               $result= $user->edit_teachers($row['t_id'],$id,$name,$email);
               if($result)
               {
                  echo "<script>location='teacher.php'</script>";
               }
               else
               {
                  echo "Invalid entry";
               }
            }
         ?>
      </form>
   </div>
</body>