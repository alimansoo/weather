<?php
session_start();
if (isset($_SESSION['id'])) {
  header('location:../dashboard/');
}

if (isset($_REQUEST['phone'])) {
  $dbhost = 'localhost';
  $dbuser = 'frar963_mohajer';
  $dbpass = '8480411';
  $db = 'frar963_mohajer';
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
  $sql = "
    SELECT * FROM `users` WHERE email = '".$_REQUEST['phone']."'
  ";
  $retval = $conn->query( $sql );
  $array = $retval->fetch_array(MYSQLI_ASSOC);
  if (count($array) < 1) {
    $sql = "
      INSERT INTO `users`(`email`) VALUES ('".$_REQUEST['phone']."')
    ";
    $retval = $conn->query( $sql );
    $sql = "
      SELECT LAST_INSERT_ID();
    ";
    $retval = $conn->query( $sql );
    $array = $retval->fetch_array(MYSQLI_ASSOC);
    var_dump($array);
    $_SESSION['id'] = $array['LAST_INSERT_ID()'];
    header('location:../dashboard/');
  }else{
    $status = 320;
  }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first py-3">
        <p class="h3 py-2">ثبت نام</p>
        <?php 
        if ($status == 320) {
          echo '
          <div class="alert alert-danger" role="alert">
            کاربر وجود دارد
          </div>
          ';
        }
        ?>
      </div>

      <!-- Login Form -->
      <form method='post'>
        <input type="text" id="login" class="fadeIn second" name="phone" placeholder="ایمیل">
        <input type="submit" class="fadeIn fourth btn btn-primary" value="ثبت نام">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="/login">ورود</a>
      </div>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
