<?php
include '../database.php';
session_start();
$error=''; // Variable To Store Error Message
if (isset($_POST['user_login'])) {
     
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
 
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
//print_r($password);exit;
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);

// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$data = mysqli_fetch_array($query,MYSQLI_BOTH);
if($data["username"]==$username && $data["password"]==$password){
if(!isset($_SESSION['login_user']))
{
$_SESSION['login_user']=$username;
}


header("location:dashboard.php"); // Redirecting To Other Page
}else{
 $error = "Sorry, your credentials are not valid, Please try again.";
}
mysqli_close($conn); // Closing connection
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Free Enquête</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="favicon.ico">
<!-- Stylesheets -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">

</head>
<body>
 <!-- Header -->

 <div class="top-header">
        <span><a href="#"><img src="../images/free.png" class="img-responsive"></a></span><br>
        <hr>
        <!-- <span>amazon</span>
	<br>Shopper Survey ✓ -->

    </div>



<style>

.login-container {
  margin-top: 2%;
  margin-bottom: 2%;
  border: 1px solid #CCD1D1;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  max-width: 50%;
  
}

.ads {
    height:80vh;
  background-image:url('user_image/admin.jpg');
  background-size:cover;
  background-position:center;
  background-color: #A569BD;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  color: #fff;
  padding: 15px;
  text-align: center;
}

.ads h1 {
  margin-top: 20%;
}

#fl {
  font-weight: 600;
}

#sl {
  font-weight: 100 !important;
}

.profile-img {
  text-align: center;
}

.profile-img img {
  border-radius: 50%;
  /* animation: mymove 2s infinite; */
}

@keyframes mymove {
  from {border: 1px solid #F2F3F4;}
  to {border: 8px solid #F2F3F4;}
}

.login-form {
  padding: 15px;
}

.login-form h3 {
  text-align: center;
  padding-top: 15px;
  padding-bottom: 15px;
}

.form-control {
  font-size: 14px;
}

.forget-password a {
  font-weight: 500;
  text-decoration: none;
  font-size: 14px;
}

</style>

<div class="container login-container">
      <div class="row">
        <div class="col-md-6 ads">
    
         <!--<h1><span id="fl">Global</span><span id="sl"> Survey Center</span></h1>-->
        </div>
        <div class="col-md-6 login-form">
          <div class="profile-img">
            <img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659652__340.png" alt="..." height="140px" width="140px;">
          </div>
          <h3>Login</h3>
          <form method="post" action="">
            <div class="form-group">
              <input type="email" class="form-control" name="username" placeholder="Email..." autocomplete="off"
              required="" style="border:none;border-bottom:1px solid dodgerblue">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password..."  autocomplete="off"
              required=""  style="border:none;border-bottom:1px solid dodgerblue">
           </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary  btn-block" name="user_login">Sign In</button>
            </div>
           <!-- <div class="form-group forget-password">
                <a href="#">Forget Password</a>
            </div>-->
          </form>
        </div>
      </div>
    </div>


<?php include 'layout-bottom.php'; ?>