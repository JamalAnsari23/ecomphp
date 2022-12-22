<?php 
include "partials/db_connection.php"
?>
<?php 
 error_reporting(0);
   $login = false;
   $showError = false;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   $username = $_POST['username'];
   $password = $_POST['password'];
 
     $sql = "SELECT * FROM  `users` WHERE username ='$username' ";
 
     $result = mysqli_query($conn,$sql);
     $num = mysqli_num_rows($result);
     if($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password,$row['password'])){
       $login = true;
       session_start();
       $id = session_create_id();	
       session_id($id);
       $_SESSION['loggedin']= true;
       $_SESSION['username']= $username;
       
       
       header("location: admin.php");
        } else{
            $showError = "Invalid credentials";
        }
    }
}
          else{
     $showError = "Invalid Credentials";
   }
       }
   

   
 
 
 
 ?>
 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Login Page<?php echo $_SESSEION['sno'] ?></title>
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
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</header>
<?php 
if($login){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> You are loggedin!
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


<form action="/akstest2/login.php" method="POST">
<div class="clear"></div>
<div class="bodycont">
  <div id="wrap2" style="min-height:530px;">
    <div class="login-cont">
      <h1 class="loginhd">Login Here</h1>
      <div class="login-row">
        <div class="loginname" style="width: 100px"  >Email</div>
        <div class="admintxtfld-box">
          <input type="text" maxlength="25" name="username" id="username">
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

      
      <div class="clear"></div>
      <div class="contact-row" style="width:325px;">
        <div style="background:none; border:none; margin-top:15px;">
        
          <input type="submit" class="btn" value="Login">
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