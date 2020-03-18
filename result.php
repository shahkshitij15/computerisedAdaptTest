<?php
session_start();
include_once 'class.user.php';
$user = new User();


function color($flag)
{
    if($flag == 1)
    {
        $result="success";
        return $result;
    }
    else
    {
        $result="danger";
        return $result;
    }

}
?>



<!DOCTYPE html>
<html>

<head>
    <title>CAT</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
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
                    <li><a href="student.php" class="trigger-btn"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'];?></a></li>
                    <li><a href="index.php?q=logout" class="trigger-btn"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" 
    style=
    "border:1px solid grey;
    border-radius:5px;
    box-shadow: 5px 5px 5px grey;
    padding:10px;
    margin-top:120px;
    
    ">
    <h3 class="text-center" style="margin:20px;">Results</h3>
    <table class="table table-condensed" style="border-collapse:collapse;">

        

        <thead style="background-color:#47b8ff;">
            <tr>
                <th>&nbsp;</th>
                <th>Question Id</th>
                <th>Question</th>
                <th>Your Answer</th>
                <th>Answer</th>
                
            </tr>
        </thead>

        <tbody>
        <?php
                $result=$user->get_results($_SESSION['subject']);
                if ($result) 
                {
                    if (mysqli_num_rows($result) > 0) 
                    {
                        while ($row = mysqli_fetch_array($result)) 
                        {
                            $pi = $row['count'] + 1; ?>

            <tr data-toggle="collapse" data-target="#<?php echo $pi; ?>" class="accordion-toggle <?php echo color($row['flag'])?>">
                <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-arrow-down"></span></button></td>
                <td><?php echo $row['q_id']; ?></td>
                <td><?php echo $row['statement'];?></td>
                <td><?php echo $row['response'];?></td>
                <td><?php echo $row['answer'];?></td>    
            </tr>
            <tr>
                <td colspan="12" class="hiddenRow">
                    <div class="accordian-body collapse" id="<?php echo $pi; ?>">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Option</th>
                                    <th>Answer Statement</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>A</td>
                                    <td><?php echo $row['a']; ?></td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td><?php echo $row['b']; ?></td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td><?php echo $row['c']; ?></td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td><?php echo $row['d']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            <?php
                        
                    }
                } 
                else 
                {
                    echo "NO Data Exist";
                }
            } 
            else 
            {
                    echo "Cannot connect to server" . $result;
                }
            
                    ?>
        </tbody>
    </table>
    <h3>Total marks:<?php echo $user->get_marks($_SESSION['subject']);?></h3>
    <h3>Out of:<?php echo $user->get_totalmarks($_SESSION['subject']);?>
    </div>
    <?php
        $user->insert_records($_SESSION['username'],$_SESSION['subject'],$user->get_marks($_SESSION['subject']),$user->get_totalmarks($_SESSION['subject']));
        $user->clear_temp();
    ?>

    



</body>

</html>