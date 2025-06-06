<?php
session_start();
include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
        <link rel="stylesheet" href="css1/bootstrap.min.css">
        <link rel="stylesheet" href="css1/font-awesome.min.css">
        <link rel="stylesheet" href="css1/owl.carousel.css">
        <link rel="stylesheet" href="css1/owl.theme.css">
        <link rel="stylesheet" href="css1/owl.transitions.css">
        <link rel="stylesheet" href="css1/animate.css">
        <link rel="stylesheet" href="css1/normalize.css">
        <link rel="stylesheet" href="css1/main.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css1/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <style>
            body {
                background-color: #e0e0e0; 
            }
            .login-container {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                border-radius: 10px;
                background-color: #f7f7f7; 
                background-image: url('img/plain-background.jpg'); 
                background-size: cover;
                background-position: center; 
            }
            .login-form {
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                margin-left: 20px;
                width: 100%;
                max-width: 400px;
            }
        </style>

    </head>

    <body>

        <div class="login-container">

            <div class="image-container">

                <img src="img/bg.jpg" alt="Login Image">
            </div>


            <div class="login-form">
                <div class="text-center m-b-md custom-login">
                    <h3>LOGIN FORM</h3>
                </div>
                <div class="content-error">
                    <div class="hpanel">
                        <div class="panel-body">
                            <form action="" name="formal" method="post">
                                <div class="form-group">
                                    <label class="control-label" for="username">Username</label>
                                    <input type="text" placeholder="username" title="Please enter your username" required="" value="" name="username" id="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="password">Password</label>
                                    <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                </div>
                                <button type="submit" style="margin-left: 5px;" name="login" class="btn btn-success btn-block loginbtn">Login</button>
                                <a class="btn btn-default btn-block" href="register.php">Register</a>
                                <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none;">
                                    <strong>Does Not Match!</strong> Invalid Username or Password.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        </div>

        <?php
        if (isset($_POST["login"])) {
            $count = 0;
            $res = mysqli_query($link, "select * from registration where username='$_POST[username]' && password='$_POST[password]'");

            $count = mysqli_num_rows($res);

            if ($count == 0) {
                ?>
                <script type="text/javascript">
                    document.getElementById("failure").style.display = "block";
                </script>
                <?php
            } else {
                $_SESSION["username"] = $_POST["username"];
                ?>
                <script type="text/javascript">
                    window.location = "select_exam.php";
                </script>
                <?php
            }
        }
        ?>

        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery-price-slider.js"></script>
        <script src="js/jquery.meanmenu.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>

    </body>

</html>
