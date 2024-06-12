<?php include("partials/menu.php");?>
<html>
<!--Menu section ends here-->

<!--main content start  here-->
<div class="main-content">
   
    <div class="wrapper">
     <h1>DASHBOARD</h1>
<br/>
<br/>
<!--Profile Section Starts Here-->
<?php
if(isset($_SESSION['Login']))
    {
     echo $_SESSION['Login'];
      unset($_SESSION['Login']);
      
    }
    
    ?>
<br/><br/>


<div class="col-4 text-center">
            <?php 
          // query to get all categories from database
            $sql = "SELECT * FROM category";
            // execute query
            $res = mysqli_query($conn, $sql);
             // count rows
             $count = mysqli_num_rows($res);

?>
              <h1><?php echo $count;?></h1>
               Categories
          </div>

          <div class="col-4 text-center">

          <?php 
          // query to get all categories from database
            $sql2 = "SELECT * FROM menus";
            // execute query
            $res2 = mysqli_query($conn, $sql2);
             // count rows
             $count2 = mysqli_num_rows($res2);

?>
              <h1> <?php echo $count2;?></h1>
               Foods
          </div>

          <div class="col-4 text-center">
          <?php 
          // query to get all categories from database
            $sql3 = "SELECT * FROM tbl_order";
            // execute query
            $res3 = mysqli_query($conn, $sql3);
             // count rows
             $count3 = mysqli_num_rows($res3);

?>
              <h1> <?php echo $count3;?></h1>
                Total Orders
          </div>

          <div class="col-4 text-center">
    <?php
    // query to get the total revenue from delivered orders
    $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status ='Delivered'";
    
    // execute query
    $res4 = mysqli_query($conn, $sql4);

    if ($res4) { // Check if the query was successful
        // fetch the result as an associative array
        $row4 = mysqli_fetch_assoc($res4);

        // get total revenue
        $total_revenue = $row4['Total'];
      } else {
        // display an error message if the query fails
        echo 'Error executing query: ' . mysqli_error($conn);
    }
?>
        
        <h1> $<?php echo $total_revenue;?></h1>
        Revenue Generated
        </div>
          <div class="clearfix"></div>
</div>


</div>

<!--Menu content ends here-->


<?php include("partials/footer.php");?>




</html>