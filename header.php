<?php 
 include "admin/config.php";
 session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  <style>
    .tambahan>a,.tambahan>ul>li>a{
      color: white;
    }
  </style>

  </head>
  <body>
    <div class="container mb-3">
      <nav class="navbar navbar-expand-lg bg-info tambahan">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse tambahan" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produk.php">Produk</a>
            </li>
            <?php 
            if (!isset($_SESSION['id_user'])) {
             ?>
            <li class="nav-item">
              <a class="nav-link" href="form_login.php">Login</a>
            </li>
            <?php } ?>
            <?php
              if(isset($_SESSION['id_user'])){
            ?>

          </ul>
          <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['nama_user']; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
          <?php } ?>
        </div>
      </nav>
    </div>


