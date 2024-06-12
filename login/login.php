<?php
include('../config/constant.php');?>
<?php
 if(isset($_SESSION['login-error'])) {
            echo $_SESSION['login-error'];
            unset($_SESSION['login-error']);
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/login-form.css">
    <title>User Login</title>

      <!-- JavaScript Validation -->
      <script>
        function validateForm() {
            var username = document.forms["loginForm"]["username"].value;
            var password = document.forms["loginForm"]["password"].value;

            if (username == "" || password == "") {
                alert("Username and password must be filled out");
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br/><br/>

        <form method="POST" action="login_process.php" class="text-center" onsubmit="return validateForm()">
            Username:
            <br/>
            <input type="text" name="username" placeholder="Enter Username">
            <br><br>
            Password:
            <br/>
            <input type="password" name="password" placeholder="Enter Password">
            <br><br>
            User Type:
            <br/>
            <select name="user_type">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="customer">Customer</option>
            </select>
            <br><br>
            <input type="submit" name="submit" value="Log In Here">
            <br><br>
            <input type="checkbox" id="check">
            <span>Remember me</span>
            <br><br>
            <a href="<?php echo SITEURL;?>Reg.php">New User?</a>
        </form>

    </div>
    <br><br>
    <br/><br/>
    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Dulasi Nethma</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->
</body>
</html>
