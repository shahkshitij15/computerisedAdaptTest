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
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</head>

<body>
    <div class="contianer-fluid" style="text-align:center; background-color : #004c75; padding:20px;color:white;">
        <h3>Computerised Adaptive Testing</h3>
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $dbname = "cat";
    $conn = mysqli_connect($servername, $username, "", $dbname);
    $sql = "select * from maths ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);
    ?>
    <div class="container-fluid" style="padding: 80px;">
        <div class="card text-center mx-auto" style="width: 60rem;">
            <div class="card-header">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<h4>1. " . $row['statement'] . " </h4><br>";


                        echo
                            "	
            </div>
            <div class='card-body text-left' style='padding-left:50px;'>
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios1'
                        value='a'>
                    <label class='form-check-label' for='exampleRadios1'>
                        
							" . $row["a"] . "
					
                    </label>
                </div>
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios2'
                        value='b'>
                    <label class='form-check-label' for='exampleRadios2'>
                        " . $row['b'] . "
                    </label>
                </div>
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios3'
                        value='c'>
                    <label class='form-check-label' for='exampleRadios3'>
                        " . $row['c'] . "
                    </label>
                </div>
                ";
                    }
                }
                ?>

            </div>
            <div class="card-footer text-left">

                <form action="exam.php" method="post">

                    <input class="btn btn-lg btn-success" style="margin-left: 10px;margin-right: 10px" type="submit" value="Submit">
                    <input class="btn btn-lg btn-danger" style="margin-left: 10px;margin-right: 10px" type="reset" value="Skip">
                    <?php
                    if (isset($_POST['exampleRadios'])) {
                            $answer = $user->check_answer($_POST['exampleRadios']);
                            if ($answer)
                                echo "TRUE";
                            else
                                echo "FALSE";
                        }

                    ?>

                </form>
            </div>
        </div>
        <?php
                    if (isset($_POST['exampleRadios'])) {
                            $answer = $user->check_answer($_POST['exampleRadios']);
                            if ($answer)
                                echo "TRUE";
                            else
                                echo "FALSE";
                        }

        ?>

    </div>
</body>