<?php include("partials-front/menu.php");?>


<?php 
if(isset($_GET['id']))
{
    //category id is set and and get it
    $category_id=$_GET['id'];
    //create sql query to display categories from datbase
    $sql = "SELECT * FROM category WHERE id=$category_id ";
          
    //excute the query
    $res = mysqli_query($conn, $sql);

    // Check if the query executed successfully
    if($res) {
        //get the value from database
         $row=mysqli_fetch_assoc($res);
        //get the name
         $categoryname=$row["categoryname"];
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else{

    //category is not passed
    //redirect to new page
    header('location:'.SITEURL);

}
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2 class="text-white">Foods on <a href="#" class="text-white">"<?php echo $categoryname;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
<?php 
//create sql query to get foods based on selected category
$sql2 =" SELECT * FROM menus where category_id='$category_id'";

//excute the query
$res2 = mysqli_query($conn, $sql2);

$count2=mysqli_num_rows($res2);

if($count2>0){

//food is availabe
while($row2=mysqli_fetch_assoc($res2))

{
    $id=$row2['menu_id'];
    $item_name=$row2['item_name'];
    $cuisine_type=$row2['cuisine_type'];
    $description=$row2['description'];
    $price=$row2['price'];
    $image_name=$row2['image_name'];
    ?>

<div class="food-menu-box">
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
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?> " alt="Food" class="img-responsive img-curve">
                    <?php
                 }
                  
                 ?>
                </div>

                <div class="food-menu-desc">
                <h4><?php echo $item_name;?></h4>
                    <p class="food-price">$<?php echo $price;?></p>
                    <p class="food-cuisine"><?php echo $cuisine_type;?></p>
                    <p class="food-detail">
                        <?php echo $description;?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL;?>order.php?menu_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
   
   <?php


}
}
else{

    //food is not availabe
    echo "<div class='error'>Food is  not Avilable.</div>";
}


?>
            
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   
    <?php include("partials-front/footer.php");?>   