<?php 
include "partials/db_connection.php"
?>
<?php 
   $showAlert = false;
   $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    // $exists = false;
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn,$existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError="username is already exists";
    }
    else{

    
    if(($password == $cpassword)){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`,`password`,`date`) VALUES('$username','$hash',current_timestamp())";
        $result = mysqli_query($conn,$sql);
        if($result){
            $showAlert = true;

        }
    }else{
        $showError ="Password do not match or you username already exist";
    }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Signup page</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


<!-- Menu start --------------->
<link href="menu/quickmenu0.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="menu/quickmenu0.js"></script>
<!-- Menu End --------------->
</head>
<body>
<header>
  <div id="wrap">
    <div class="logo"><img src="images/logo.png" border="0"></div>
    
    <div class="admintxt">Admin panel</div>
    <div class="admintxt"><a href="login.php" class="btn btn-primary">Login</a></div>

    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</header>
<?php 
if($showAlert){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> Your account is now created , now you can loggin.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Success !</strong>'.$showError .'
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
 }
?>

<form action="/akstest2/signup.php" method="POST">
<div class="clear"></div>
<div class="bodycont">
  <div id="wrap2" style="min-height:530px;">
    <div class="login-cont">
      <h1 class="loginhd">Signup Here</h1>
      <div class="login-row">
        <div class="loginname" style="width: 100px"  >Email</div>
        <div class="admintxtfld-box">
          <input type="text" name="username" id="username">
        </div>        
        <div class="clear"></div>
      </div>
<!--       <div class="loginreq-field">* This Field Required </div> -->
      
      <div class="login-row">
        <div class="loginname"style="width: 100px">Password</div>
        <div class="admintxtfld-box">
          <input type="password" id="password" name="password">
        </div>
        <div class="clear"></div>
      </div>

      <div class="login-row">
        <div class="loginname" style="width: 100px">Confirm Password</div>
        <div class="admintxtfld-box">
          <input type="password" id="cpassword" name="cpassword">
        </div>
        <div class="clear"></div>
      </div>
      
      <div class="clear"></div>
      <div class="contact-row" style="width:325px;">
        <div style="background:none; border:none; margin-top:15px;">
        
          <input type="submit" class="btn" value="Signup">
          <br>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<div class="clear"></div>
</form>
<footer>
  <footer class="whitefoter">
    <div class="whitefooter-cont">
      <div style="float:left;">Copyright © AKS Machine Test. All Rights Reserved.</div>      
           <a href="https://www.akswebsoft.com/" target="_blank" style="float:right;">
                <img src="images/akslogo.png" alt="AKS Websoft Consulting Pvt. Ltd." title="AKS Websoft Consulting Pvt. Ltd."></a>
      
      <div class="clear"></div>
    </div>
  </footer>
</footer>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>