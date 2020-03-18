<?php
session_start();
include_once 'class.user.php';
$user = new User();
$uid = $_SESSION['username'];


if($_SESSION['type']!=3)
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
                    <a class="navbar-brand">Welcome <?php echo $_SESSION['username'] ?></a>
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
            <li class="active"><a data-toggle="tab" href="#teacher">Teacher</a></li>
            <li><a data-toggle="tab" href="#student">Student</a></li>
            <li><a data-toggle="tab" href="#query">Query</a></li>
        </ul>

        <div class="tab-content">

            <div id="teacher" class="tab-pane fade in active">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Teacher Details</h2>
                            </div>
                            <div class="col-sm-4">
                                <button href="#addt" type="button" class="btn btn-info" data-toggle="modal" style="margin-top:18px;">Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $user->get_teacher_details($_SESSION['username']);
                            while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['t_id'] . "</td>";
                                    echo "<td>" . $row['t_name'] . "</td>";
                                    echo "<td>" . $row['t_email'] . "</td>";
                                    echo "<td>"    . $row['subject'] . "</td>";
                                    ?>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#myModal<?php echo $row['t_id']; ?>">
                                        <span class="glyphicon glyphicon-trash"></span></a>
                                    <div class="modal fade" id="myModal<?php echo $row['t_id']; ?>" role="dialog">
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
                                                    <a href="delete.php?id=<?php echo $row['t_id']; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
                                                </div>
                                            </div>
                                </td>
                                <?php echo "</tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="student" class="tab-pane fade">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Student Details</h2>
                            </div>
                            <div class="col-sm-4">
                                <button href="#adds" type="button" class="btn btn-info" data-toggle="modal" style="margin-top:18px;">Add New</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $user->get_student_details($_SESSION['username']);
                            while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['s_id'] . "</td>";
                                    echo "<td>" . $row['s_name'] . "</td>";
                                    echo "<td>" . $row['s_email'] . "</td>";
                                    ?>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#myModal<?php echo $row['s_id']; ?>">
                                        <span class="glyphicon glyphicon-trash"></span></a>
                                    <div class="modal fade" id="myModal<?php echo $row['s_id']; ?>" role="dialog">
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
                                                    <a href="delete.php?id=<?php echo $row['s_id']; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
                                                </div>
                                            </div>
                                </td>
                                <?php echo "</tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="query" class="tab-pane fade">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Queries</h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Query</th>
                                <th>Actions</th>
                            <tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $result = $user->get_query_details($_SESSION['username']);
                            while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['query'] . "</td>";
                                    $i = $i + 1;
                                    ?>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#myModal<?php echo $row['email']; ?>">
                                        <span class="glyphicon glyphicon-trash"></span></a>
                                    <div class="modal fade" id="myModal<?php echo $row['email']; ?>" role="dialog">
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
                                                    <a href="delete.php?id=<?php echo $row['email']; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
                                                </div>
                                            </div>
                                </td>
                                <?php echo "</tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!--ADD TEACHER MODAL-->
        <div id="addt" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Add Teacher</h4>
                    </div>
                    <?php $flag=0 ?>
                    <div class="modal-body">
                        <form name="add" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="userId" placeholder="Username" required="required">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="required">
                                
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="tsubmit" class="btn btn-primary btn-lg btn-block login-btn">Confirm</button>
                            </div>
                        </form>
                        

                        <?php
                        if (isset($_REQUEST['tsubmit'])) {
                            extract($_REQUEST);

                            $login = $user->check_login($userId, $pwd);
                            if ($login) {
                                echo "<script>location='admin1.php'</script>";
                            } else {
                                $res = $user->add_teacher($userId, $name, $email, $subject, $pwd);
                                if ($res) {
                                    echo "<script>location='admin1.php'</script>";
                                } else {
                                    echo "<script>location='update.php'</script>";
                                }
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <!--ADD STUDENT MODAL-->
        <div id="adds" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Add Student</h4>
                    </div>
                    <div class="modal-body">
                        <form name="add" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="userId" placeholder="Username" required="required">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="required">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="ssubmit" class="btn btn-primary btn-lg btn-block login-btn">Confirm</button>
                            </div>
                        </form>
                        <p id="wrong_id"></p>

                        <?php
                        if (isset($_REQUEST['ssubmit'])) {
                            extract($_REQUEST);

                            $login = $user->check_login($userId, $pwd);
                            if ($login) {
                                echo "<script>location='admin1.php'</script>";
                            } else {
                                $res = $user->add_student($userId, $name, $email, $pwd);
                                if ($res) {
                                    echo "<script>location='admin1.php'</script>";
                                }
                                else{
                                    alert($_SESSION['error']);
                                } 
                            }
                        } 
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


</body>

</html>