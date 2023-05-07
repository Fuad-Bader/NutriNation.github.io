<?php
ob_start();
include('includes/header.php');
require('includes/connection.php');

if(isset($_POST['submit'])){
    $subject =$_POST['subject'];
    $img_name =$_FILES['images']['name'];
    $tmp_name =$_FILES['images']['tmp_name'];
    $path = '../images/';
    
    $image2='images/'. $_FILES['images']['name'] ;

   
   
    move_uploaded_file($tmp_name,$path.$img_name)  ;

    $prod_name =$_POST['name'];
    $prod_price =$_POST['price'];
    
    $query="INSERT INTO phone_info (name,image,price,subject)
    VALUES('$prod_name','$image2','$prod_price','$subject')";
    mysqli_query($conn,$query);
    header("Location: manage_product.php");
}
if(isset($_POST['submit1'])){
 
   $img_name = $_FILES['images']['name'];
   $tmp_name = $_FILES['images']['tmp_name'];
   $path = 'images/';
   //move files to images folder
   move_uploaded_file($tmp_name, $path.$img_name);
   $prod_name     =  $_POST['name'];
   $prod_price    =  $_POST['price'];
   $subject       =  $_POST['subject'];

 
   $query2 = "UPDATE phone_info SET 
                            name = '$prod_name',
                            price = '$prod_price',
                            image   = '$img_name',
                            subject= '$subject',
                         where id = {$_GET['id']}";
         mysqli_query($conn, $query2);
         header("location: manage_product.php");

   }

if (isset($_GET['id1'])) {
    $query="DELETE FROM phone_info WHERE id={$_GET['id1']}";
 mysqli_query($conn,$query);
header("Location: manage_product.php");
}

if (isset($_GET['id'])) {
    $query="SELECT * FROM phone_info WHERE id={$_GET['id']}";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
}
?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                              <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header"> Product Info</div>
                                      <div class="card-body">
                                        <div class="card-title">
                                          <?php 
                                             if (isset($_GET['id'])) {
                                echo "<h4><i class='fa fa-angle-right'></i> Edit Product</h4>";}
                                elseif (!isset($_GET['id'])) {echo "<h4><i class='fa fa-angle-right'></i> Create Product</h4>";}
                                ?>

</div>
<hr>
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                          <div class="form-group ">
                                            <label for="cc-number" class="control-label mb-1">Product Name</label>
                                            <input id="cc-number" name="name" type="text" class="form-control cc-number identified visa" value="<?php if (isset($_GET['id'])) { echo $product['name'];} ?>" >

                                            </div>

                                             <div class="form-group" enctype="multipart/form-data"> 
                                            <label for="cc-number" class="control-label mb-1">Product Image</label>
                                            <input id="cc-number" name="images" type="file" class="form-control cc-number identified visa" value="<?php if (isset($_GET['id'])) { echo $img_name; ?>"  /><img src="<?php echo $product['image'];} ?>" />

                                             </div>

                                            
                                            <div class=" form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Price of Product</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="cc-number" name="price" placeholder="Price" class="form-control"  value="<?php if (isset($_GET['id'])) { echo $product['price'];} ?>">
                                                    
                                                </div>
                                            </div>
                                            <div class=" form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">subject  of Product</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="cc-number" name="subject" placeholder="subject " class="form-control" value="<?php if(isset($_GET['id'])){echo $product['subject'];}?>">
                                                                                                        
                                                </div>
                                            </div>
                                           
                                    
                                            <div class="form-actions form-group">  
                                            <?php
                                                if (isset($_GET['id'])) {
                                                    echo '<button type="submit" name="submit1" value="Edit" class="btn btn-info btn-ml">Edit</button>';
                                                }
                                                else{
                                                    echo '<button type="submit" name="submit" value="Create" class="btn btn-info btn-ml">Create</button>';
                                                }

                                            
                                            ?>                                                                   
                                             </div>
                                            </div>                          
                                            </div>
                                    </div>
                                    
                                        </form>
                                      </div>
                                </div>

                                
                            </div>
                                
                            </div>
                            <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>                                                                                                
                                                <th>product name</th>
                                                <th>product image </th>
                                                <th>price</th>
                                                <th>subject</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                           
                                            <?php
                                        $qr="SELECT * FROM phone_info";
                                        $rs= mysqli_query($conn,$qr);
                                        while($phone_info= mysqli_fetch_assoc($rs)){
                                            echo"<tr>";
                                            echo "<td>{$phone_info['name']}</td>";
                                            echo "<td><img src='{$phone_info['image']}' width='120' height='120'></td> ";
                                            echo "<td >{$phone_info['price']}</td>";
                                            echo "<td>{$phone_info['subject']}</td>";
                                            echo "<td><a href='manage_product.php?id={$phone_info['id']}'> Edit</a></td>";
                                            echo "<td><a href='manage_product.php?id1={$phone_info['id']}'>Delete</a></td>";
                                            echo "</tr>";} 
                                             ?>
                                         
                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>