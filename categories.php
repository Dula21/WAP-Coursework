<?php include("partials-front/menu.php");?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
<?php

//create sql query to display categories from datbase
$sql = "SELECT * FROM category  WHERE active= 'Yes' ";
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
                   //image not availabe
                   echo "<div class='error'>image not availabe </div>";

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
    echo "<div class='error'>Category  not Found</div>";
}





?>
        
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include("partials-front/footer.php");?>    