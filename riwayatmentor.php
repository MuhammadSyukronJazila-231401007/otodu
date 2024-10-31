<?php
session_start();

if( !isset($_SESSION['login']) ){
    header("Location: login.php");
    exit;
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap"
    rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    * {
      font-family: "Rethink Sans", sans-serif;
    }

    .btn-pilih {
      background-color: #4D62A5;
      margin: 0 0.5vw 0 0.5vw;
      padding: 0.4vw 1.5vw;
      border-radius: 1.4vw;
      font-weight: 600;
      color: #4D62A5;
      border: 0.2vw solid #4D62A5;
      background: none;
    }

    .btn-add {
      background-color: #4D62A5;
      margin: 0 0.5vw 0 0.5vw;
      padding: 0.4vw 1.5vw;
      border-radius: 1.4vw;
      font-weight: 600;
      color: white;
    }

    .riwayat {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .isi-riwayat {
      display: flex;
      align-items: center;
      justify-content: flex-start;
    }

    h2 {
      margin: 0;
    }

    .card {
      background-color: #4D62A5;
      color: white;
      border-radius: 1.5vw;
      margin: 1vw 2vw 1vw 2vw;
    }

    .btn1 {}

    .btn2 {}

    .card-body {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    h5 {
      font-weight: 100;
      font-size: 1.5vw;
    }

    .navbar {
        background-color: white;
        padding-inline-start: 1.5vw; 
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1.5vw; 
        align-items: center;
        }
    
        .nav-menu {
          margin: 0;
          padding: 0.8vw 2vw; 
          position: relative;
          align-self: center;
          font-size: 1.2vw; 
          cursor: pointer;
          font-family: 'Rethink Sans';
          text-decoration: none;
          color: #4D62A5;
        }
    
        .nav-menu:not(:last-child)::after {
          content: '';
          position: absolute;
          right: 0; 
          top: 0;
          width: 1px;
          height: 100%;
          background-color: #4D62A5;
          transform: translateX(50%); /* Memindahkan garis ke tengah-tengah jarak antara elemen a */
        }
    
        .nav-menu:hover {
          background-color: #4D62A5;
          color: white; 
          font-weight: 450;
        }
    
        #nav-main {
          background-color: #4D62A5;
          color: white;
        }
    
        .logo img {
          width: 10vw;
          margin-right: 1vw;
        }

        footer {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: #1F2844;
            padding: 1.5vw; /* 20px */
            color: white;
            /* position: fixed; */
            bottom: 0;
            width: 100%;
            text-align: center;
            position: relative; /* Default position */
            padding: 1vw;
            margin-top: 2.8vw
        }

    .isi-card {}
  </style>
  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar">
      <div class="container" style="display: flex; align-items: center;">
          <div class="logo">
              <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 1vw;"> <!-- 130px -->
          </div>
          <a style="margin: 0;" class="nav-menu" href="dashboard.php">NLP OTODU</a>
          <a style="margin: 0;" class="nav-menu" id="nav-main" href="mentor.php">Mentor OTODU</a>
          <a style="margin: 0;" class="nav-menu" href="jasa.php">Desain Web & App</a>
      </div>
  </nav> 
  <div style="margin-left: 8vw; margin-right: 8vw;" class="container mt-4">

    <div class="riwayat mb-5">
      <h2>Riwayat Mentor</h2>
      <div class="tombol">
        <button class="btn btn-add ">Diajukan</button>
        <button class="btn btn-pilih">Diterima</button>
        <button class="btn btn-pilih">Ditolak</button>
      </div>
    </div>

    <div class="isi-riwayat">
      <div class="card px-3" style="width: 32vw;">
        <div class="card-body p-4">
          <img src="image/boy 1.png" width="70vw" alt="">
          <div class="isi-card">
            <h5 class="mb-3">Mentor Skibidi L., S.Komedi</h5>
            <div class="status">
              <button style="background-color: #793738;color: white;border-radius: 10vw; font-weight: 500;"
                class="btn btn1 px-4">Matematika</button>
              <span> </span>
              <button
                style="background-color: #FFE600;color: white;border-radius: 10vw;font-weight: 500;  color: #4D62A5;"
                class="btn btn2 px-4">Diajukan</button>
            </div>
          </div>
        </div>
      </div>
      <div class="card px-3" style="width: 32vw;">
        <div class="card-body p-4">
          <img src="image/boy 1.png" width="70vw" alt="">
          <div class="isi-card">
            <h5 class="mb-3">Mentor Skibidi L., S.Komedi</h5>
            <div class="status">
              <button style="background-color: #793738;color: white;border-radius: 10vw; font-weight: 500;"
                class="btn btn1 px-4">Matematika</button>
              <span> </span>
              <button
                style="background-color: #21AD4E;color: white;border-radius: 10vw;font-weight: 500;  color: white;"
                class="btn btn2 px-4">Diterima</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card px-3" style="width: 32vw;">
      <div class="card-body p-4">
        <img src="image/boy 1.png" width="70vw" alt="">
        <div class="isi-card">
          <h5 class="mb-3">Mentor Skibidi L., S.Komedi</h5>
          <div class="status">
            <button style="background-color: #793738;color: white;border-radius: 10vw; font-weight: 500;"
              class="btn btn1 px-4">Matematika</button>
            <span> </span>
            <button style="background-color: #E8332A;color: white;border-radius: 10vw;font-weight: 500;  color: white;"
              class="btn btn2 px-4">Ditolak</button>
          </div>
        </div>
      </div>
    </div>

  </div>
  <footer>
      <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 5vw;"> <!-- 120px -->
      <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>