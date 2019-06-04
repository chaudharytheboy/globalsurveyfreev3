<?php
session_start();
include '../database.php';
$error ="";
if(isset($_POST['update'])){
    $id = $_POST['id'];
    //print_r($id);exit;
    //$pro_name = $_POST['product_name'];
     $pro_name =trim($_POST['product_name']);
    $pro_name = mysqli_real_escape_string($conn,$pro_name);
    //print_r($pro_name);exit;
   // $desc = $_POST['description'];
    $desc =trim($_POST['description']);
    $desc = mysqli_real_escape_string($conn,$desc);
    $price = $_POST['product_price'];
    $reg_price = $_POST['regular_price'];
    $shipping = $_POST['shipping'];
    $qty = $_POST['quantity'];
    $review = $_POST['review_users'];
    
    $file_name=$_FILES["images"]["name"];
    $temp_name=$_FILES["images"]["tmp_name"];
    $target_path = "../images/products_image/".$file_name;
    $target_path1 = "images/products_image/". $file_name;
    
    $image_name = $_FILES["img_popular"]["name"];
    $temperary_name = $_FILES["img_popular"]["tmp_name"];
    $path = "../images/popular_image/".$image_name;
    $path1 = "images/popular_image/". $image_name;
    
    
    $url_1 = $_POST['url_1'];
    $url_2 = $_POST['url_2'];
    
    if($image_name && $file_name){
        move_uploaded_file($temperary_name, $path);
        move_uploaded_file($temp_name, $target_path);    
        $update = mysqli_query($conn,"update products set product_name = '$pro_name', description = '$desc', product_price= '$price',
                    regular_price = '$reg_price', shipping = '$shipping', quantity = '$qty', review_users = '$review', 
                    img_popular = '$path1', images = '$target_path1', url_1 = '$url_1'  WHERE id = '$id' ");

    }elseif($file_name){
        move_uploaded_file($temp_name, $target_path);
        $update = mysqli_query($conn,"update products set product_name = '$pro_name', description = '$desc', product_price= '$price',
        regular_price = '$reg_price', shipping = '$shipping', quantity = '$qty', review_users = '$review', 
         images = '$target_path1', url_1 = '$url_1', url_2 = '$url_2'  WHERE id = '$id' ");
         
    }elseif($image_name){
            move_uploaded_file($temperary_name, $path);
            $update = mysqli_query($conn,"update products set product_name = '$pro_name', description = '$desc', product_price= '$price',
                        regular_price = '$reg_price', shipping = '$shipping', quantity = '$qty', review_users = '$review', 
                        img_popular = '$path1', url_1 = '$url_1'  WHERE id = '$id' ");

    }else{
        $update = mysqli_query($conn,"update products set product_name = '$pro_name', description = '$desc', product_price= '$price',
        regular_price = '$reg_price', shipping = '$shipping', quantity = '$qty', review_users = '$review',
        url_1 = '$url_1', url_2 = '$url_2' WHERE id = '$id' ");
    }
    header('Location:dashboard.php');
  }

include 'layout-top.php' ;
   
$id = $_GET['id'];
//print_r($id);exit;
$products = mysqli_query($conn,"SELECT * FROM products WHERE id = '$id'");

$data = mysqli_fetch_array($products,MYSQLI_BOTH);
//print_r($data);exit;
?>
<div class="col" style='text-align:center;background-color:#cd1e25;color:#fff;letter-spacing:1px;font-family:roboto;padding:2px;margin-top:1rem'>

 <h3>Update Products</h3>
 <!-- <a href="add_product.php" class="btn btn-primary" style="float:right">Add Product</a>-->
</div>
<a href="dashboard.php"  style="float:right;text-decoration:underline; margin-top:70px; padding-right:200px; font-size:18px;">Go back</a>
<div class="container" style="margin:4rem 0">
  <div class="row">
    <div class='col-sm-6 col-sm-offset-3'>
      <form method="POST" action="" enctype = 'multipart/form-data' id="submitData">
        <div class="form-group ">
          <input type="hidden" class="form-control"  name="id" value="<?php echo $data['id'];?>" autocomplete="off">
        </div>
        <div class="form-group ">
          <label for="exampleInputEmail1">Product Name</label>
          <input type="text" class="form-control"  name="product_name" value="<?php echo $data['product_name'];?>" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" class="form-control"  name="description"  value="<?php echo $data['description'];?>" >
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Product Price</label>
          <input type="text" class="form-control" id="price"  name="product_price"  value="<?php echo $data['product_price'];?>" >
          <label for="price_error" id="price_error" style="color:red;display:none">Must have integer value</label>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Regular Price</label>
          <input type="text" class="form-control" id="reg_price"  name="regular_price"  value="<?php echo $data['regular_price'];?>" >
          <label for=" regprice_error" id="regprice_error" style="color:red;display:none">Must have integer value</label>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Shipping</label>
          <input type="text" class="form-control" id="shipping_price" name="shipping"  value="<?php echo $data['shipping'];?>" >
          <label for="shipping_error" id="shipping_error" style="color:red;display:none">Must have integer value</label>

        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Quantity</label>
          <input type="text" class="form-control"  name="quantity"  value="<?php echo $data['quantity'];?>" >
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Review Users</label>
          <input type="text" class="form-control"  name="review_users"  value="<?php echo $data['review_users'];?>" >
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">URL (Cliquez ici)</label>
          <input type="text" class="form-control" id="val_1"  name="url_1"  value="<?php echo $data['url_1'];?>" >
        </div>
        
        

        <div class="form-group">
          <label for="exampleInputPassword1">Image</label><br/>
          <img src="../<?php echo $data['images'];?>" width="100px;" id = "globalfree">
          <input type="file"  name="images" onchange = Free(this);>
          <input type='hidden' name="image_id" value="<?php echo $data['id'];?>">
        </div>
        
        <div class="form-group">
                    <label for="exampleInputPassword1">Most Popular / Top Rated / Best Offer Image Uploaded
                        For</label><br />
                    <img src="../<?php echo $data['img_popular'];?>" width="100px;" id = "globalfreepops">
                    <input type="file" name="img_popular" onchange = Freepopsimg(this);>

                </div>

       
        <button type="submit" class="btn btn-primary" name="update" style="width:100%;letter-spacing:2px;">Submit</button>
      </form>
         </div>


  </div>
</div>



<?php include 'layout-bottom.php';?>