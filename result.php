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
                    <li><a href="#myModal" class="trigger-btn" data-toggle="modal"><span class="	glyphicon glyphicon-user"></span> Login</a></li>
                    <li><a href="index.php?q=logout" class="trigger-btn"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <h3>Results</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Question Id</th>
                    <th>Question Statement</th>
                    <th>Your Answer</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from maths,temp where q_id=qid";
                $result = mysqli_query($user->db, $sql);
                if ($result) 
                {
                    if (mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_array($result))
                         {
                            $pi = $row['count'] + 1;?>
                            
                            <tr class='accordion-toggle' data-toggle='collapse' data-target='#<?php echo $pi;?>'>
                                <td><?php echo $row['q_id'];?></td>
                                <td><?php echo $row['statement'];?></td>
                                <td><?php echo $row['response'];?></td>
                                <td><?php echo $row['answer'];?></td>
                            </tr>
                
                            <tr>
                                <td class='accordion-body collapse' id='<?php echo $pi;?>'>
                            <table class='table'>
                                
                                <thead>
                                    <th>Option</th>
                                    <th>Answer Statement</th>
                                </thead>
                
                                <tbody>
                                    <tr>
                                        <td>a.</td>
                                        <td><?php echo $row['a'];?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>b.</td>
                                        <td><?php echo $row['b'];?></td>
                                    </tr>

                                    <tr>
                                        <td>c.</td>
                                        <td><?php echo $row['c'];?></td>
                                    </tr>
                  
                                    <tr>
                                        <td>d.</td>
                                        <td><?php echo $row['d'];?></td>
                                    </tr>

                                </tbody>
                            </table>
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
                $user->clear_temp();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>