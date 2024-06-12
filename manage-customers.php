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
        <h1>Manage Customers</h1>
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
        
      
        ?>
       
        <br/><br/><br/>
        <!--button to add users-->
        
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
            $sql = "SELECT * FROM tbl_customer";
            $res = mysqli_query($conn, $sql);

            if($res == TRUE) {
                $count = mysqli_num_rows($res);
                $UserID = 1; // Initialize the variable

                if ($count > 0) {
                    while($rows = mysqli_fetch_assoc($res)) {
                       $id=$rows["id"];
                        $username = $rows["username"];
                        $email = $rows["email"];
                       
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                          
                                
                               <td>
                                <a href ="<?php echo SITEURL; ?>Admin/delete-customers.php?id=<?php echo $id; ?>" class="btn-danger">Remove Customer</a>
                            </td>
                        </tr>
                        <?php
                        $id++; // Move the increment outside the loop
                    }
                }
            } else {
                echo "No  data found.";
            }
            ?>
        </table>
    </div>
</div>

<?php include("partials/footer.php");?>
