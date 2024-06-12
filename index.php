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

<?php
    if(isset($_SESSION['order'])) {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
        if(isset($_SESSION['Login'])) {
            echo $_SESSION['Login'];
            unset($_SESSION['Login']);
        }
        if(isset($_SESSION['Reg'])) {
            echo $_SESSION['Reg'];
            unset($_SESSION['Reg']);
        }
        if(isset($_SESSION['feedback'])) {
            echo $_SESSION['feedback'];
            unset($_SESSION['feedback']);
        }

        if(isset($_SESSION['reserv'])) {
            echo $_SESSION['reserv'];
            unset($_SESSION['reserv']);
        }

        //if(isset($_SESSION['connect'])) {
            //echo $_SESSION['connect'];
            //unset($_SESSION['connect']);
        //}
        ?>
       


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

<?php 
//create sql query to display categories from datbase
$sql = "SELECT * FROM category  WHERE active= 'Yes' AND featured = 'Yes'LIMIT 3";
//excute the query
$res = mysqli_query($conn, $sql);

$count=mysqli_num_rows($res);


if($count> 0){

//category available
while($row=mysqli_fetch_assoc($res))
{

    //get the data from rows

    $id=$row['id'];
    $categoryname=$row['categoryname'];
    $image_name=$row['image_name'];

      ?>
             <a href="<?php echo SITEURL;?>category-foods.php?id=<?php echo $id ?>">
            <div class="box-3 float-container">
                <?php 
                //cheack weather the image is availabe or not
                 if($image_name=="")
                 {
                   //display image
                   echo "<div class='error'>Image not availabe </div>";

                 }
                 else{

                    //iamage is availabe
                    ?>
                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?> " alt="Pizza" class="img-responsive img-curve">
                    <?php
                 }
                 
                 ?>
                
                <h3 class="float-text text-white"><?php echo $categoryname;?> </h3>
            </div>
            </a>

    <?php
    
   
}

}

else{

    //category not availabe
    echo "<div class='error'>Category  not Add </div>";
}
?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

<?php 

//create sql query to display categories from datbase
$sql2 = "SELECT * FROM menus  WHERE active='Yes' AND  featured='Yes' LIMIT 6 ";
//excute the query
$res2 = mysqli_query($conn, $sql2);

if ($res2 === false) {
    // Handle the error, for example by displaying an error message
    die("Error in query: " . mysqli_error($conn));
}
$count2=mysqli_num_rows($res2);


if($count2> 0){

//food available
while($row=mysqli_fetch_assoc($res2))
{

    //get the data from rows

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
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?> " alt="Chicken with hawaiian Pizza" class="img-responsive img-curve">
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
    echo "<div class='error'>Food is not available </div>";

}
      ?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include("partials-front/footer.php");?>