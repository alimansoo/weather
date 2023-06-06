<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('location:../login/');
}

$dbhost = 'localhost';
$dbuser = 'frar963_mohajer';
$dbpass = '8480411';
$db = 'frar963_mohajer';
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

if (isset($_REQUEST['submit'])) {
  $sql = "
    INSERT INTO `devices`(`user_id`) VALUES ('".$_SESSION['id']."')
  ";
  $retval = $conn->query( $sql );
}

$sql = "
  SELECT * FROM `devices` WHERE `user_id` = '".$_SESSION['id']."'
";
$retval = $conn->query( $sql );
$array = $retval->fetch_all(MYSQLI_ASSOC);
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container d-flex p-2 w-100 h-100 flex-column justify-content-center text-light">
      <br><br>
      <div class="m-0 text-right py-3 text-dark h4">
        حساب کاربری
      </div>


    <div class="w-100">
      <div class="w-100 text-right my-3">
        <form method='post'>
          <input type="submit" name='submit' class="btn btn-primary" value="دستگاه جدید">
        </form>
      </div>

      <?php
      if (count($array) > 0) {
        foreach ($array as $key => $value) {
          echo '
          <div class="w-100 my-3 text-dark d-flex flex-row align-items-center justify-content-between text-right gap-3 border rounded" data-toggle="modal" data-target="#modalcontent'.$value['id'].'">
            <form action="../temper" class="m-0">
              <input type="hidden" name="device_id" value="'.$value["id"].'" />
              <button type="submit" class="btn btn-dark m-0 ml-3">دیدن دما</button>
            </form>
            <div class="d-flex flex-row m-0">
              <div class="m-0">
                <p class="m-0">DEVICE-'.$value["id"].'</p>
                <p class="m-0 text-muted">'.$value["id"].'</p>
              </div>
              <img src="../assets/image/modem.png" alt="" class="svg-icon-lg m-0">
            </div>
          </div>

          <div class="modal fade" id="modalcontent'.$value['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header d-flex flex-row justify-content-between w-100">
                  <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h5 class="modal-title m-0 text-dark" id="exampleModalLongTitle">اتصال دستگاه</h5>
                </div>
                <div class="modal-body w-100 text-center text-dark">
                  <img src="../assets/image/conectiong.webp" alt="" class="ard-image m-0 m-md-4">
                  <p class="m-0 text-muted"><span class="h4 text-dark">Link to Board Arduino: </span><br>http://weather963.freehost.io/api/?device_id='.$value["id"].'&temp={?}</p>
                </div>
              </div>
            </div>
          </div>
          ';
        }
      }else{
        echo '
        <div class="alert alert-light" role="alert">
          دستگاهی وجود ندارد!!
        </div>
        ';
      }
      
       ?>
    
    
    <div class=""></div>
  </div>
  

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
