<?php
session_start();
include '../database.php';
$error ="";
if(isset($_POST['productID']) && $_POST['productID'] != "")
{
  $fromIDs = explode('_', $_POST['productID']);  
  $update = mysqli_query($conn,"update products set images='' where id=".$fromIDs[1]);
  $response = array('status'=>TRUE);
  echo json_encode($response);
}

if(isset($_POST['image_id']) && $_POST['image_id'] != "")
{
  $fromIDs = explode('_', $_POST['image_id']);
  $update = mysqli_query($conn, "update products set img_popular ='' where id =" .$fromIDs[1]); 
  echo json_encode(array('status' => TRUE));
}

if(isset($_POST['idfrom'])  && isset($_POST['idTo']))
{
  $fromIDs = explode('_', $_POST['idfrom']);
  $update = mysqli_query($conn,"update products set sort_order ='".$_POST['orderfrom']."' where id=".$fromIDs[1]);

  $roIDs = explode('_', $_POST['idTo']);
  $update = mysqli_query($conn,"update products set sort_order ='".$_POST['orderTo']."' where id=".$roIDs[1]);
  $response = array('status'=>TRUE);
  echo json_encode($response);
}
