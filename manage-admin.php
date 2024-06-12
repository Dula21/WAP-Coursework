
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<?php include("partials/menu.php");?>

<!--main content start here-->
<div class="main-content">
   
    <div class="wrapper">
        <h1>Manage Admins</h1>
        <br/><br/><br/>

        <?php
        if(isset($_SESSION["add"])) {
            echo $_SESSION["add"];
            unset($_SESSION["add"]);
        }
        if(isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']); 
        }
        if(isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if(isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if(isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }
       
        ?>
       
        <br/><br/><br/>
        <!--button to add users-->
        <a href="add-admin.php" class="btn-primary"> Add Users </a>
        <br/>
        <br/>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Username</th> 
                <th>Email</th>
               
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_admin";
            $res = mysqli_query($conn, $sql);

            if($res == TRUE) {
                $count = mysqli_num_rows($res);
                $id = 1; // Initialize the variable

                if ($count > 0) {
                    while($rows = mysqli_fetch_assoc($res)) {
                       $id=$rows['id'];
                        $username = $rows["username"];
                        $email = $rows["email"];
                       
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                           
                            <td>
                                <a href="<?php echo SITEURL; ?>Admin/update-pw-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Change Password</a>
                                <a href ="<?php echo SITEURL; ?>Admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href ="<?php echo SITEURL; ?>Admin/delete-staff.php?id=<?php echo $id; ?>" class="btn-danger">Remove Admin</a>
                            </td>
                        </tr>
                        <?php
                        $id++; // Move the increment outside the loop
                    }
                }
            } else {
                echo "No staff data found.";
            }
            ?>
        </table>
    </div>
</div>

<?php include("partials/footer.php");?>
