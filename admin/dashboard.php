<?php
session_start();
if(!isset($_SESSION['login_user'])){
     // echo "fdafdafd";
  header('Location:login.php');
}else{
  include '../database.php'; 
  include 'layout-top.php' ;


  ?>
  <script type="text/javascript">
    var products = [];
  </script>
  <?php $data = mysqli_query($conn,"SELECT * FROM products order by sort_order asc"); 
// print_r($data);exit;?>
  <div class="container-fluid">
    <div class="row">
      <div class="col" style='text-align:center;background-color:#cd1e25;color:#fff;margin-top:1rem;padding:2px;font-family:roboto;letter-spacing:1px'> 
        <a href="logout.php" class="btn" style="float:right;margin-top:10px;margin-right:1rem;background-color:#fff;">Logout</a>
        <h3>Products table</h3>
        
      </div>
    </div>
  </div>
  <div class='container-fluid' style="margin:1rem 2rem">
    <div class="row">

      <table class="table table-bordered table-hover" style="margin:2rem 0;table-layout:fixed;overflow-wrap:break-word;">
        <thead style="background-color:#daeaef;color:#333;letter-spacing:1px;">
          <tr>
           <!--<th scope="col">ID</th>-->
           <th scope="col">Product Name</th>
           <th scope="col">Images</th>
           <th scope="col">Product popularity image</th>
           <th scope="col">Description</th>
           <th scope="col">Product Price</th>
           <th scope="col">Regular Price</th>
           <th scope="col">Shipping</th>
           <th scope="col">Image URL</th>
           <th scope="col">Swap URL</th>
           <th scope="col">Action</th>

         </tr>
       </thead>
       <tbody>
        <?php
        $counter = 0;      
        $last = (mysqli_num_rows($data) -1);
      //print_r($last);exit;
        while($row = mysqli_fetch_array($data,MYSQLI_BOTH)) { 
          ?>
          <script type="text/javascript">
            var product = {};
            product.id = '<?php echo $row['id'];?>';
            product.order = '<?php echo $counter;?>';
            product.sort_order = '<?php echo $row['sort_order'] ?>';
            products.push(product);
          </script>
          <?php

          ?>
          <tr id="<?php echo $counter; ?>" class="cls_<?php echo $row['id']; ?>">
            <!--<td scope="row"><?php echo $row['id'] ?></td>-->
            <td class="product_name">
              <?php echo $row['product_name'] ?>
            </td>
            <td class="images">
              <?php
              if($row['images'] != "")
              {
               ?>
               <img src="../<?php echo $row['images'];?>" width="100px">
               <a href="javascript:void(0);" class="removePic"><i class="fa fa-trash"></i></a>
               <?php     
             }
             else if($row['images'] == "" || $row['images'] == NULL)
             {
              ?>
              <img src="../images/products_image/default-product-img.jpg" width="100px">
              <?php    
            }
            ?>                        
          </td>
          <td class="img_popular">
            <?php 

            if($row['img_popular'] != "")
            {
              ?>

              <img src="../<?php echo $row['img_popular'];?>" alt="no image" width="100px">
              <a href="javascript:void(0)" class="remove_pic"><i class="fa fa-trash"></i></a>
              <?php 
            }
            elseif($row['img_popular'] == "" || $row['img_popular'] == NULL )
            {
              ?>
              <img src="../images/popular_image/default-product-img.jpg" alt="" width="100px">
              <?php
            }
            ?>
          </td>
          <td class="description">
            <?php echo $row['description'] ?>
          </td>
          <td class="product_price">
            <?php echo $row['product_price'] ?>
          </td>
          <td class="regular_price">
            <?php echo $row['regular_price'] ?>
          </td>
          <td class="shipping">
            <?php echo $row['shipping'] ?>
          </td>
          <td class="URL">
            <a target='_blank' href="<?php echo $row['url_1'] ?>"><?php echo $row['url_1'] ?></a>
          </td>                    
          <td>                
            <?php
            if($counter == 0)
            {
              ?>
              <a target='_blank' class="swap" title="DOWN" href="javascript:void(0);"><i
                class="fa fa-arrow-down" style="margin:1rem 1rem; font-size:30px;"></i></a>
                <?php
              }
              elseif($counter == $last)
              {
                ?>
                <a target='_blank' class="swap" title="UP" href="javascript:void(0);"><i
                  class="fa fa-arrow-up" style="margin:1rem 1rem; font-size:30px;"></i></a>
                  <?php
                }
                else
                {
                  ?>
                  <a target='_blank' class="swap" title="UP" href="javascript:void(0);"><i
                    class="fa fa-arrow-up" style="margin:1rem 1rem; font-size:30px;"></i></a>
                    <a target='_blank' class="swap" title="DOWN" href="javascript:void(0);"><i
                      class="fa fa-arrow-down" style="margin:1rem 1rem; font-size:30px;"></i></a>
                      <?php
                    }
                    ?>

                  </td>

                  <td>
                    <a href="update_products.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-sm"
                      id="update_products" style="letter-spacing:1px;font-family:roboto">Update</a></br>

                      <a href="delete_products.php?eid=<?php echo $row['id'];?>" class="btn btn-primary btn-sm add_delet_edi"
                       style="letter-spacing:1px;font-family:roboto;margin-top:10px;" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                      <a href="add_products.php" class="btn btn-primary btn-sm add_delet_edi"
                      style="letter-spacing:1px;font-family:roboto;margin-top:10px;">Add</a>

                      </td>
                      <td class="sort_order" style="display:none">
                        <input type="hidden" name="sort_order" value="<?php echo $row['sort_order'];?>"
                      </td>
                    </tr>
                    <?php 
                    $counter++;
                  } ?>



                </tbody>
              </table>
            </div>
          </div>


          <?php  include 'layout-bottom.php' ;
        }

        ?>
