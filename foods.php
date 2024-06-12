<?php include("partials-front/menu.php");?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>



            <?php
            
              //create sql query to display categories from datbase
              $sql = "SELECT * FROM menus  WHERE active= 'Yes' ";
             //excute the query
             $res = mysqli_query($conn, $sql);

               $count=mysqli_num_rows($res);


if($count> 0){

//food available
while($row=mysqli_fetch_assoc($res)){


    $id=$row['menu_id'];
    $item_name=$row['item_name'];
    $cuisine_type=$row['cuisine_type'];
    $description=$row['description'];
    $price=$row['price'];
    $image_name=$row['image_name'];
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