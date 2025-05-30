<?php
session_start();
include "../connection.php";
?>
<!doctype html>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <!-- Add your image here -->
                    <img src="images/bgfeed.png" class="img-fluid" alt="Login Image" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                </div>
                <div class="col-md-6">
                    <div class="login-content" style="padding: 40px; background-color: #343a40; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                        <div class="login-logo" style="color:white; font-size: 24px; margin-bottom: 20px;">
                            Admin Login
                        </div>
                        <div class="login-form">
                            <form name="formal" action="" method="post">
                                <div class="form-group">
                                    <label style="color: #ffffff;">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter your username" required="" style="border-radius: 5px;">
                                </div>
                                <div class="form-group">
                                    <label style="color: #ffffff;">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required="" style="border-radius: 5px;">
                                </div>
                                <button type="submit" name="submit1" class="btn btn-success btn-block" style="border-radius: 5px;">Sign in</button>
                                
                                <div class="alert alert-danger" id="errormsg" style="margin-top: 10px; display: none; border-radius: 5px;">
                                    <strong>Invalid!</strong> Username or Password.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>

<?php
if (isset($_POST["submit1"])) {
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);
    $res = mysqli_query($link, "select * from admin_login where username='$username' && password='$password'");
    $count = mysqli_num_rows($res);

    if ($count == 0) {
        ?>
        <script type="text/javascript">
            document.getElementById("errormsg").style.display = "block";
        </script>
        <?php
    } else {
        $_SESSION["admin"] = $username;
        ?>
        <script type="text/javascript">
            window.location = "exam_category.php";
        </script>
        <?php
    }
}
?>
