<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Add Admin </h1>
        <br/><br/>
        <form action="" method="POST">
            <table class="tbl-30">
                
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder=" Enter Username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter password" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" placeholder=" Enter Email" required></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Users" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO tbl_admin ( username, email, password ) VALUES ( '$username', '$email', '$password')";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        $_SESSION["add"] = "<div class='success'>User Added Successfully!</div>";
        header("location:" . SITEURL . "Admin/manage-admin.php");
    } else {
        $_SESSION["add"] = "<div class='error'>Failed to delete User. Error: " . mysqli_error($conn) . "</div>";
        header("location:" . SITEURL . "Admin/manage-admin.php");
    }
}
?>

<?php include("partials/footer.php"); ?>
