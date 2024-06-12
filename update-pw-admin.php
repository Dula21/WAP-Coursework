<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br/>
        <br/>

        <?php
        if (isset($_GET['id'])) {
            $UserID = $_GET['id'];
        }
        ?>

        <form action="" method="post">
            <br/>
            <table class="tbl-30">
                <tr>
                    <td>Old Password</td>
                    <td><input type="password" name="old_password" placeholder="Current Password" required></td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td><input type="password" name="new_password" placeholder="New Password" required></td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_new_password" placeholder="Confirm Password" required></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $confirm_new_password = $_POST['confirm_new_password'];

            if ($new_password !== $confirm_new_password) {
                // Redirect to manage users page with an error message
                $_SESSION['pwd-not-match'] = "<div class='error'>Password does not match.</div>";
                // Redirect user
                header('location:' . SITEURL . 'Admin/manage-admin.php');
            } else {
                // Update password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                $sql2 = "UPDATE tbl_admin SET password='$hashed_password' WHERE id=$id";

                // Execute the query
                $res2 = mysqli_query($conn, $sql2);

                // Check whether the query executed or not
                if ($res2) {
                    // Password changed successfully
                    $_SESSION['change-pwd'] = "<div class='success'>Password changed successfully!</div>";
                    // Redirect the user
                    header('location:' . SITEURL . 'Admin/manage-admin.php');
                } else {
                    // Display error
                    $_SESSION['change-pwd'] = "<div class='error'>Failed to change password. Please try again.</div>";
                    // Redirect the user
                    header('location:' . SITEURL . 'Admin/manage-admin.php');
                }
            }

            // Check whether the user with the current password exists or not
            $sql = "SELECT * FROM tbl_admin WHERE id =$id AND password ='$old_password'";

            // Execute the query
            $res = mysqli_query($conn, $sql);

            if ($res) {
                // Check whether data is available or not
                $count = mysqli_num_rows($res);

                if ($count != 1) {
                    // User does not exist
                    $_SESSION['User Not Found'] = "<div class='error'>User not found.</div>";
                    // Redirect the user
                    header('location:' . SITEURL . 'Admin/manage-admin.php');
                }
            }
        }
        ?>
    </div>
</div>

<?php include("partials/footer.php"); ?>
