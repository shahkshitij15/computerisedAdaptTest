<?php
session_start();
include_once 'class.user.php';
$user = new User();
?>

<?php


if (!isset($_GET['submit'])) {
    if (!isset($_SESSION['count']))
        $_SESSION['count'] = 0;

    if (!isset($_SESSION['diff']))
        $_SESSION['diff'] = 0;

    if ($_SESSION['count'] >= 5) {
        $_SESSION['count'] = 0;
        $_SESSION['diff'] = 0;
        echo "<script>location='result.php'</script>";
    }


    $result = $user->get_question($_SESSION['subject'], $_SESSION['diff']);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['qid'] = $row['q_id'];
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
                <div class="container-fluid" style="padding: 80px;">
                    <div class="card text-center mx-auto" style="width: 60rem;">
                        <form action="test.php" method="get">
                            <div class="card-header">
                                <?php echo $row['statement']; ?>
                            </div>
                            <div class='card-body text-left' style='padding-left:50px;'>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='answer' id='answer1' value='a'>
                                    <label class='form-check-label' for='answer1'>

                                        <?php echo $row['a']; ?>

                                    </label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='answer' id='answer2' value='b'>
                                    <label class='form-check-label' for='answer2'>
                                        <?php echo $row['b'] ?>
                                    </label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='answer' id='answer3' value='c'>
                                    <label class='form-check-label' for='answer3'>
                                        <?php echo $row['c'] ?>
                                    </label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='answer' id='answer4' value='d'>
                                    <label class='form-check-label' for='answer4'>
                                        <?php echo $row['d'] ?>
                                    </label>
                                </div>




                            </div>
                            <div class='card-footer text-left'>



                                <input class='btn btn-lg btn-success' name='submit' style='margin-left: 10px;margin-right: 10px' type='submit' value='Submit'>
                                <input class='btn btn-lg btn-danger' name='submit' style='margin-left: 10px;margin-right: 10px' type='submit' value='skip'>
                            <?php
                        }
                    }
                }
                if (isset($_GET['submit'])) {
                    if ($_GET['submit'] == 'skip') {
                        $_SESSION['count']++;

                        if ($_SESSION['diff'] > -1)
                            $_SESSION['diff']--;

                        $r = $user->submit_answer($_SESSION['subject'], $_SESSION['count'], $_SESSION['qid'], '');




                        echo "<script>location='test.php'</script>";
                    }
                }


                if (isset($_GET['answer'])) {

                    $r = $user->submit_answer($_SESSION['subject'], $_SESSION['count'], $_SESSION['qid'], $_GET['answer']);
                    $_SESSION['count']++;

                    $ans = $user->check_answer($_SESSION['subject'], $_SESSION['qid'], $_GET['answer']);

                    if ($ans == 1 && $_SESSION['diff'] < 1)
                        $_SESSION['diff']++;
                    else if ($ans == 0 && $_SESSION['diff'] > -1)
                        $_SESSION['diff']--;
                    echo "<script>location='test.php'</script>";
                }


                ?>
            </form>
        </div>
    </div>
    </div>

</body>

</html>