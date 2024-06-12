
<?php
    include("config/constant.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Customer Registration</title>
    <!-- Include Required CSS Files -->
    <link rel="stylesheet" type="text/css" href="CSS/Reg-form.css"/>

    <script type="text/javascript">
        <?php 
        ob_start();
        if(isset($_SESSION['Reg']))
        {
            echo "alert('{$_SESSION['Reg']}');";
            unset($_SESSION['Reg']);
        }
        ?>

       

        function Emptyfield(uname, upass, uemail)
        {
            var uname_len = uname.value.length;
            var upass_len = upass.value.length;
           
            var uemail_len = uemail.value.length;

            if (uname_len == 0 || upass_len == 0 || utyp_len == 0 || uemail_len == 0) {
                alert("Fields should not be empty ");
                return false;
            } else {
                return true;
            }
        }

        function allLetter(uname)
        {
            var letters = /^[0-9a-zA-Z]+$/;
            if (uname.value.match(letters)) {
                return true;
            } else {
                alert('Username must have alphanumeric characters only');
                uname.focus();
                return false;
            }
        }

       // function alphanumeric(utype)
//{
   // var letters = /^[0-9a-zA-Z]+$/;
    //if (utype.value.match(letters)) {
      //  return true;
    //} else {
       // alert('User type must have alphanumeric characters only');  // Typo here, change 'aplhabetic' to 'alphabetic'
       // utype.focus();
       // return false;
    //}
//}


        function allnumeric(upass)
        {
            var numbers = /^[0-9a-zA-Z]+$/;
            if (upass.value.match(numbers)) {
                return true;
            } else {
                alert('Password  must have both alphanumeric characters only');
                upass.focus();
                return false;
            }
        }

        function ValidateEmail(uemail)
        {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (uemail.value.match(mailformat)) {
                return true;
            } else {
                alert("You have entered an invalid email address!");
                uemail.focus();
                return false;
            }
        }
        function formValidation()
        {
            var uname = document.registration.username;
            var upass = document.registration.password;
            
            var uemail = document.registration.email;

            if (Emptyfield(uname, upass, utyp, uemail)) {
                if (allLetter(uname)) {
                    if (alphanumeric(upass)) {
                        
                            if (ValidateEmail(uemail)) {
                                return true;
                            }
                        
                    }
                }
            }
            return false;
        }
    </script>

   
</head>
<body>



<!-- Header Section 
<header>
    <h1>Outer Clove Restaurant</h1>
    <p>Welcome to User Registration Page </p>
  </header>
    
<br/>
    -->
  <!--form-->

  <div class="registration-form">
        <h3>Fill all the fields and submit.</h3>

        <form method="POST" action="" name="registration" enctype="multipart/form-data" onsubmit="return formValidation();">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Enter Username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Enter Email" required>

            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" id="reset" value="Reset">
        </form>
    </div>


<?php
if (isset($_POST["submit"])) {
   
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_customer ( username, email, password) VALUES ( '$username', '$email', '$password')";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        $_SESSION["Reg"] = "<div class='success text-center'> User Registration Successful!.</div>";
        header("location:index.php");
    } else {
        $_SESSION["Reg"] = "<div class='error text-center'> User Registration  Failed! Please try again!.</div>";
        header("location:index.php");
    }
}
ob_end_flush();
?>
 

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Dulasi Nethma</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>
