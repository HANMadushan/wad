<?php
include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Register Now</title>
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
                background-image: url('img/plain-background.jpg'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat; 
                background-attachment: fixed; 
            }

            .error-pagewrap {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }

            .error-page-int {
                background: rgba(255, 255, 255, 0.8); 
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 600px;
                width: 100%;
            }
        </style>


    </head>

    <body>

        <div class="error-pagewrap">
            <div class="error-page-int">
                <div class="text-center custom-login">
                    <h3>Register Now</h3>

                </div>
                <div class="content-error">
                    <div class="hpanel">
                        <div class="panel-body">
                            <form action="" name="formal" method="post">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>FirstName</label>
                                        <input type="text" name="firstname" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>LastName</label>
                                        <input type="text" name="lastname" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Username</label>
                                        <input type="text"  name="username" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Password</label>
                                        <input type="password"  name="password" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Email</label>
                                        <input type="text"  name="email" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Contact</label>
                                        <input type="text"  name="contact" class="form-control">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit"  name="submit" class="btn btn-success loginbtn">Register</button>

                                </div>

                                <div class="alert alert-success" id="success" style="margin-top: 10px; display: none">
                                    <strong>Success!</strong> Account Registration successfully.
                                </div>

                                <div class="alert alert-danger" id="failure"style="margin-top: 10px; display: none">
                                    <strong>Already Exist!</strong> This Username is already exist.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>   
        </div>


        <?php
        if (isset($_POST["submit"])) {
            $count = 0;
            $res = mysqli_query($link, "select * from registration where username='$_POST[username]'") or die(mysqli_error($link));
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display = "none";
                    document.getElementById("failure").style.display = "block";
                </script>
                <?php
            } else {
                mysqli_query($link, "insert into registration values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]')") or die(mysqli_error($link));
                ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display = "block";
                    document.getElementById("failure").style.display = "none";
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
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>

</html>