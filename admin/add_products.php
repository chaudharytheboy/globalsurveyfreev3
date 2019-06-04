
<?php
include 'layout-top.php';
include '../database.php';
$data = mysqli_query($conn, "select * from products");
$numOfRows = mysqli_num_rows($data);
if(isset($_POST['add'])){
  $product_name=$_POST['product_name'];
   $order= $numOfRows + 1;
  //$img_popular=$_POST['img_popular'];
  $quantity=$_POST['quantity'];
  $description=$_POST['description'];
  $product_price=$_POST['product_price'];
  $regular_price=$_POST['regular_price'];
  $shipping=$_POST['shipping'];
  $quantity=$_POST['quantity'];
  $review_users=$_POST['review_users'];
  $url_1=$_POST['url_1'];

  $file_name = $_FILES["images"]["name"];
  $temp_name = $_FILES["images"]["tmp_name"];
  $target_path = "../images/products_image/".$file_name;
  $target_path1 = "images/products_image/". $file_name;

    $image_name = $_FILES["img_popular"]["name"];
    $temperary_name = $_FILES["img_popular"]["tmp_name"];
    $path = "../images/popular_image/".$image_name;
    $path1 = "images/popular_image/". $image_name;

  move_uploaded_file($temp_name, $target_path);
  move_uploaded_file($temperary_name, $path);
  mysqli_query($conn,"INSERT INTO `products` (`product_name`,`description`,`product_price`,`regular_price`,`shipping`,`quantity`,`review_users`,`url_1`, images, img_popular,`sort_order`)
  VALUES ('$product_name', '$description','$product_price','$regular_price','$shipping','$quantity','$review_users','$url_1', '".$target_path1."',
    '".$path1."', '$order')");

echo "<script>top.window.location.href='dashboard.php';</script>";

}

?>



<div class="col" style='text-align:center;background-color:#cd1e25;color:#fff;letter-spacing:1px;font-family:roboto;padding:2px;margin-top:1rem'>

 <h3>Add Products</h3>
</div>
<a href="dashboard.php"  style="float:right;text-decoration:underline; margin-top:70px; padding-right:200px; font-size:18px;">Go back</a>

<div class="container" style="margin:4rem 0">
  <div class="row">

    <div class='col-sm-6 col-sm-offset-3'>
      <form method="POST" action="add_products.php" enctype = 'multipart/form-data' id="submitData">


        <div class="form-group ">
          <label>Product Name</label>
          <input type="text" class="form-control" name="product_name">
        </div>

        <div class="form-group">
          <label>Description</label>
          <input type="text" class="form-control"  name="description">
        </div>

        <div class="form-group ">
          <label>Product Price</label>
          <input type="text" class="form-control"  name="product_price">
        </div>

        <div class="form-group">
          <label>Regular Price</label>
          <input type="text" class="form-control" id="reg_price"  name="regular_price">
        </div>

        <div class="form-group">
          <label>Shipping</label>
          <input type="text" class="form-control" id="shipping_price" name="shipping">
        </div>

        <div class="form-group">
          <label>Quantity</label>
          <input type="text" class="form-control"  name="quantity">
        </div>

        <div class="form-group">
          <label>Review Users</label>
          <input type="text" class="form-control"  name="review_users">
        </div>
        <div class="form-group">
          <label>URL (Claim Reward)</label>
          <input type="text" class="form-control" id="val_1"  name="url_1">
        </div>
        
        <div class="form-group">
          <label for="exampleInputPassword1">Image</label><br/>
          <img src="" width="100px;" id = "globalfree">
          <input type="file"  name="images" onchange = Free(this);>
          <input type='hidden' name="image_id">
        </div>
        
        <div class="form-group">
          <label for="exampleInputPassword1">Most Popular / Top Rated / Best Offer Image Uploaded
            For</label><br />
            <img src="" width="100px;" id = "globalfreepops">
            <input type="file" name="img_popular" onchange = Freepopsimg(this);>
          </div>


          <button type="submit" class="btn btn-primary" name="add" style="width:100%;letter-spacing:2px;">Add</button>
        </form>
      </div>


    </div>
  </div>
  <?php
  include 'layout-bottom.php';
  ?>
