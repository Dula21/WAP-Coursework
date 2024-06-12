<?php

include('../config/constant.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    // Check for empty username or password
    if (empty($username) || empty($password)) {
        $_SESSION['login-error'] = "<div class='error text-center'>Username and password are required</div>";
        header('location:' . SITEURL . 'login/login.php');
        exit();
    }

    // Use prepared statement to prevent SQL injection
    $query = "";
    switch ($userType) {
        case 'admin':
            $query = "SELECT * FROM tbl_admin WHERE username=? AND password=?";
            break;
        case 'staff':
            $query = "SELECT * FROM tbl_staff WHERE username=? AND password=?";
            break;
        case 'customer':
            $query = "SELECT * FROM tbl_customer WHERE username=? AND password=?";
            break;
        default:
            $_SESSION['login-error'] = "<div class='error text-center'>Invalid user type</div>";
            header('location:'.SITEURL.'login/login.php');
            exit(); // Terminate script execution
    }

    // Use prepared statement
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check the number of rows returned
    if (mysqli_num_rows($result) == 1) {
        switch ($userType) {
            case 'admin':
                $_SESSION['user'] = $username;
                header('location:'.SITEURL.'Admin/index.php');
                break;
            case 'staff':
                $_SESSION['staff'] = $username;
                header('location:'.SITEURL.'staff/index.php');
                break;
            case 'customer':
                $_SESSION['customer'] = $username;
                header('location:'.SITEURL.'customers-dashboard.php');
                break;
        }
    } else {
        $_SESSION['login-error'] = "<div class='error text-center'>Failed Login! Error: " . mysqli_error($conn) . "</div>";
        header('location:' . SITEURL . 'login/login.php');
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>
