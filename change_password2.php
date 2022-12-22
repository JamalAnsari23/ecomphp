<?php
include "partials/db_connection.php";
?>
<?php 

session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){

	header("location: login.php");
	exit;
}
if(isset($_POST["change_password"])){
    $sid =session_id($id);
    $userid = 7;
    
    $current_password = $_POST['current_password'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $hash_current_password = password_hash($current_password, PASSWORD_DEFAULT);
    
    $sql = "SELECT * FROM  `users` WHERE sno ='".$userid."' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if(password_verify($current_password, $row['password'])){
        if($password == $password_confirm){
            $sql = "UPDATE `users` SET password ='".password_hash($password,PASSWORD_DEFAULT)."' WHERE sno ='".$userid."'";
            mysqli_query($conn,$sql);
            echo "<p>Password has been changed</p>";
        }
    }
    else{
        echo "<p>Password is not correct</p>";
    }
     
    

}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="menu/quickmenu0.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="menu/quickmenu0.js"></script>

    <title>Change_Password <?php echo $_SESSION['username'];?></title>

  </head>
  <body>
  <header>
  <div id="wrap">
       <div class="logo"><img src="images/logo.png" border="0"></div>
    <div class="topmenu">
      <ul>
        <li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        <li><a href="change_password.php">Change Password</a>&nbsp;|</li>
        <li><a href="logout.php"><img src="images/logout.png" width="16" height="16" border="0" align="absmiddle">&nbsp;&nbsp;Logout</a></li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</header>
<br>
<br>
<div class="container">
    <!--  print("Values from the session with id: ".session_id()); 
    echo $sid; -->


    <form action="change_password.php" method="POST">

    <div class="form-group"><h1 class="text-align-center">Change Password</h1></div>
    <br>
<br>
  <div class="form-group">

    <label for="exampleInputEmail1">Current Password</label>
    <input type="password" class="form-control" id="current_Password" name="current_password" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirm" name="password_confirm">
    <small id="emailHelp" class="form-text text-muted">Make sure your password and confirm password are same.</small>

  </div>
  
   <div class="class"><input type="submit" name="change_password" value="Change_Password"/></div>
</form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>