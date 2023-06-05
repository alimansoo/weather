<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container d-flex p-2 w-100 h-100 flex-column justify-content-center text-light">
    <div class="w-100 nav-gray">
    <?php
    if (isset($_SESSION['id'])) {
      echo '
      <div class="d-flex m-0 gap-1">
      <a href="./login" class="m-0 mx-2 text-dark border border-dark p-2 rounded d-flex flex-row align-items-center">
        <img src="./assets/icons/person-outline.svg" alt="" class="svg-icon">
      </a>
      <a href="./logout" class="m-0 text-dark border border-dark p-2 rounded d-flex flex-row align-items-center">
        <img src="./assets/icons/log-out-outline.svg" alt="" class="svg-icon">
      </a>
      </div>
      
      '; 
    }else{
      echo '
      <a href="./login" class="m-0 text-dark border border-dark p-2 rounded d-flex flex-row align-items-center">
        <p class="h6 m-0 h-1 ml-1 mr-2 d-none d-md-block">حساب کاربری</p>
        <img src="./assets/icons/person-outline.svg" alt="" class="svg-icon">
      </a>
      '; 
    }
    
    ?>
      
      <div class="m-0 text-dark h4">
          دماسنج هوشمند
      </div>
    </div>


    <div class="w-100 flex-container flex-column flex-md-row">
      <img src="./assets/image/ardoino.webp" alt="" class="ard-image m-0 m-md-4">
      <div class="text-right text-dark m-3 h-max">
        <div class="h2">دماسنج هوشمند</div>
        <div class="mt-3 text-muted">دماسنج هوشمند با استفاده از بدر آردوینو</div>
        <div class="mt-5">
          <button type="button" class="btn btn-ligh"  data-toggle="modal" data-target="#exampleModalCenter"> اعضای تیم </button>
          <a href='./signup' class="btn btn-primary">ثبت نام در حساب کاربری</a>
        </div>
      </div>
    </div>
    
    <div class=""></div>
  </div>
  

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex flex-row justify-content-between w-100">
          <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title m-0" id="exampleModalLongTitle">اعضای تیم<img src="./assets/icons/people-outline.svg" alt="" class="svg-icon ml-2"></h5>
        </div>
        <div class="modal-body w-100 text-right">
          <div class="h-2 mb-3">
            علی منصوری <span class="text-muted mr-3">00111022302018</span><img src="./assets/icons/person-outline.svg" alt="" class="svg-icon ml-2"> 
          </div>
          <div class="h-2 mb-3">
            علی مشایخی <span class="text-muted mr-3">00111022302018</span><img src="./assets/icons/person-outline.svg" alt="" class="svg-icon ml-2"> 
          </div>
          <div class="h-2 mb-3">
            رضا شیاری <span class="text-muted mr-3">00111022302018</span><img src="./assets/icons/person-outline.svg" alt="" class="svg-icon ml-2"> 
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
