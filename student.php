<?php
session_start();
include_once 'class.user.php';
$user = new User();
$uid = $_SESSION['username'];
if (isset($_GET['subject'])) {
  $_SESSION['subject'] = $_GET['subject'];
  echo "<script>location='test.php'</script>";
}



if ($_SESSION['type'] != 1) {
    ?>
  <script>
    alert("You are not allowed to access this page");
  </script>
  <script>
    location = "index.php"
  </script>
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
  <style>



  div .tt .col-sm-3{
    border : 0.5px solid #d1d1d1;
    border-radius: 5px;
    padding-top:10px;
    padding-bottom:10px;
    margin : 5px;
  }
  
  #tt
  {
    padding-left : 180px;
    padding-right : 10px;
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
        <a class="navbar-brand" href="#">Computerised Adaptive Test</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['username'] ?></a>
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
      <li><a data-toggle="tab" href="#test"><span class="glyphicon glyphicon-home"></span>&nbsp&nbsp&nbspTake Test</a></li>
      <li><a data-toggle="tab" href="#result">Result</a></li>
      <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
    </ul>

    <div class="tab-content">
      <div id="test" class="tab-pane fade">
        <div class="container-fluid">
          <div class="row tt text-center" id="tt">
            <div class="col-sm-3">
            <div>Test Your Knowledge in Maths</div><br>
            <button type="button" class="btn btn-primary btn-lg" ><a style="color:white !important;" href="student.php?subject=maths">Maths</a></button>
            </div>
            <div class="col-sm-3">
            <div>Test Your Knowledge in English</div><br>
            <button type="button" class="btn btn-primary btn-lg" ><a style="color:white !important;" href="student.php?subject=english">English</a></button>
            </div>
            <div class="col-sm-3">
            <div>Test Your Knowledge in Sciene</div><br>
            <button type="button" class="btn btn-primary btn-lg" ><a style="color:white !important;" href="student.php?subject=science">Science</a></button>
            </div>
          </div>
        </div>
      </div>

      <div id="result" class="tab-pane fade">
        <div class="container">
          <h2>Results</h2>
          <hr>

          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Total</a></li>
            <li><a data-toggle="tab" href="#menu1">Maths</a></li>
            <li><a data-toggle="tab" href="#menu2">Science</a></li>
            <li><a data-toggle="tab" href="#menu3">English</a></li>
          </ul>

          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
              <div class="table-wrapper">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Marks</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $a = $_SESSION['username'];
                    $result = $user->get_particular_student_marks($a);
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['subject'] . "</td>";
                      echo "<td>" . $row['marks'] . "</td>";
                      echo "<td>" . $row['total'] . "</td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="menu1" class="tab-pane fade">
              <div class="table-wrapper">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Marks</th>
                      <th>Total</th>
                      <th>Percent</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $a = $_SESSION['username'];
                    $result = $user->get_particular_student_marks_maths($a);
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
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
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Marks</th>
                      <th>Total</th>
                      <th>Percent</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $a = $_SESSION['username'];
                    $result = $user->get_particular_student_marks_science($a);
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
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
              <div class="table-wrapper">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Marks</th>
                      <th>Total</th>
                      <th>Percent</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $a = $_SESSION['username'];
                    $result = $user->get_particular_student_marks_english($a);
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
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
          </div>
        </div>
      </div>

      <div id="profile" class="tab-pane fade in active">
        <br>
        <div class="row">
          <div class="col-xs-12 col-sm-3 center">
            <span class="profile-picture">
              <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="avatar2.png">
            </span>

            <div class="space space-4"></div>
            <a href="edits.php" class="btn btn-sm btn-block btn-light">
              <i class="ace-icon fa fa-plus-circle bigger-120"></i>
              <span class="bigger-110">Edit profile</span>
            </a>

            <a href="changes.php" class="btn btn-sm btn-block btn-primary">
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
              <span class="middle"><?php echo $row['s_name']; ?></span>

              <span class="label label-purple arrowed-in-right">
                <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                online
              </span>
            </h4>

            <div class="profile-user-info">
              <div class="profile-info-row">
                <div class="profile-info-name"> Username </div>
                <div class="profile-info-value">
                  <span><?php echo $row['s_id']; ?></span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name"> Age </div>
                <div class="profile-info-value">
                  <span><?php echo $row['age']; ?></span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name"> Email ID </div>
                <div class="profile-info-value">
                  <span><?php echo $row['s_email']; ?></span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name"> Date Of Birth </div>
                <div class="profile-info-value">
                  <span><?php echo $row['dob']; ?></span>
                </div>
              </div>
            </div>
            <div class="hr hr-8 dotted"></div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
  </div>