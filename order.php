<?php include("partials-front/menu.php");?>

<?php

//check weather food id selecte or not
if(isset($_GET['menu_id'])) 
{

 //get the food id and its details
 $id=$_GET['menu_id'];

 //create sql query to display categories from datbase
 $sql = "SELECT * FROM menus WHERE menu_id = $id";
 //excute the query
 $res = mysqli_query($conn, $sql);
 //count the rows
    $count=mysqli_num_rows($res);

    
 //check weather the data available or not
 if($count==1)

 {

 //food available
 $row=mysqli_fetch_assoc($res);
     $id=$row['menu_id'];
     $item_name=$row['item_name'];
     $price=$row['price'];
     $image_name=$row['image_name'];
 }
 else
 {
     //redirect to home page
     header('location:'.SITEURL);
 }

}
else
{
    //redirect to home page
    header('location:'.SITEURL);
}
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" method="POST" class="order" onsubmit="return confirmOrder()">

                <fieldset>
                    <legend class="text-white">Selected Food</legend>
                     <div class="food-menu-img">

                     <?php 
                //cheack weather the image is availabe or not
                 if($image_name=="")
                 {
                   //image not availabe
                   echo "<div class='error'>image not availabe </div>";

                 }
                 else{

                    //iamage is availabe
                    ?>
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?> " alt="Chicken with hawaiian Pizza" class="img-responsive img-curve">
                    <?php
                 }
                  
                 ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3 class="text-white"><?php echo $item_name;?></h3>
                        <input type="hidden" name="food" value="<?php echo $item_name;?>">
                        <p class="food-price text-white">$<?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Dulasi Nethma" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@dulasinethma.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>


            <?php
           
            if (isset($_POST["submit"])) {

                $food = $_POST['food'];

                $price = $_POST['price'];

                $qty = $_POST['qty'];

                $total = $price * $qty;

                $order_date= date("Y-m-d h:i:sa");

                $status="Ordered";

                $customer_name = $_POST['full-name'];

                $cutomer_contact = $_POST['contact'];

                $cutomer_email = $_POST['email'];

                $cutomer_address = $_POST['address'];
            
                $sql2 = "INSERT INTO tbl_order SET 
                food='$food',
                price='$price',
                qty='$qty',
                total='$total',
                order_date='$order_date',
                status='$status', 
                customer_name='$customer_name',
                cutomer_contact='$cutomer_contact',
                cutomer_email='$cutomer_email',
                cutomer_address='$cutomer_address' ";

                $res2 = mysqli_query($conn, $sql2);
                
             
            
                if ($res2 == TRUE)
                {
                    $_SESSION["order"] = "<div class='success text-center'>Food orderd Successfully!</div>";
                    header("location:" . SITEURL );
                } else {
                    $_SESSION["order"] = "<div class='error text-center'>Failed Food orderd: " . mysqli_error($conn) . "</div>";
                    header("location:" . SITEURL );
                }
               
            }
            else{
                // Handle the case where the query did not execute successfully
                echo "Error: " . mysqli_error($conn);
            }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <script>
    function confirmOrder() {
        // Display a confirmation dialog
        var confirmation = confirm("Are you sure you want to confirm your order?");
        
        // If the user clicks OK, the form will be submitted; otherwise, it won't
        return confirmation;
    }
</script>

    <?php include("partials-front/footer.php");?>   