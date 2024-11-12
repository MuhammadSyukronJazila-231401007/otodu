<?php
include 'function.php';
session_start();

if( !isset($_SESSION['login']) ){
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$koin = ambilData("SELECT koin FROM users WHERE id = $id");

include 'navbar.php';

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <style>
      nlp {
        background-color: #4D62A5;
        color: white; 
        font-weight: 450;
      }

      .form-select {
          background-image: url("panah.png");
          background-repeat: no-repeat;
          background-position: right 0.75rem center;
          background-size: 2vw 0.8vw;
      }

      footer {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: #1F2844;
            color: white;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 2.3vw;
        }

    </style>
</head>
  <body style="font-family: 'Rethink Sans', sans-serif;">
        <div style="display: flex; justify-content: space-between;">
        <div>
        <font id="koin" style="background-color: #96AA03; color: white; align-items: center; padding: 0.7vw; margin-left: 7vw; cursor: pointer;">
            <img src="image/coin.png" width="18" height="18">
            <?= $koin[0]['koin'] ?>
        </font>
        </div>
        <div>
            <font style="background-color: #4D62A5; margin-right: 5vw; padding: 0.4vw;">   
                <a href="leaderboard.php">
                    <img src="image/rank.png" width="18" height="18" style="margin-left: 0.7vw;">
                </a>
                <a href="">
                    <img src="image/mail.png" width="18" height="18" style="margin-left: 1.5vw; margin-right: 1.5vw;">
                </a>
                <a href="profil.php">
                    <img src="image/user.png" width="18" height="18" style="margin-right: 0.7vw;">
                </a>
                </font>
        </div>
    </div>
    <h4 style="padding: 4vw 10vw 2vw 10vw;">Daftar Materi</h4>
    <br>
    <div style="background-color: #F6F7FA; border-radius: 0.5vw; padding: 2vw 3vw;" >
    <div style="display: flex;">
        <div style="margin: 4vw ;">
            <h6 style="margin-bottom: 1.5vw;">Pilih Materi</h6>
            <select class="form-select" aria-label="Default select example" style="background-color: white; padding: 1vw 4vw 1vw 2vw; border-radius: 1vw;">
                <option selected>Matematika Kelas XI</option>
                <option value="1">Bahasa Inggris </option>
                <option value="2">Pemrograman</option>
                <option value="3">UTBK</option>
            </select><br>
            <h6 style="margin-bottom: 1.5vw;">Pilih Bab</h6>
            <select class="form-select" aria-label="Default select example" style="background-color: white; padding: 1vw 4vw 1vw 2vw; border-radius: 1vw;">
                <option selected>Fungsi</option>
                <option value="1">Trigonometri </option>
                <option value="2">Statistik</option>
                <option value="3">Bangun Ruang</option>
            </select>
        </div>

        <a class="btn " href="materi.php" role="button" style="background-color: white; outline-color: white;  height: 9vw; text-align: left; box-shadow: 0vw 0.02vw 0.05vw;">
        <div style="background-color: white; border-radius: 1vw; width: 32vw; padding-top: 1vw; padding-left: 2vw; height: 8vw; ">
          <table style="border-collapse: collapse;">
              <tr>
                  <td rowspan="4" style="padding-right: 1.5vw;"><img src="image/Bab.png" width="60" height="60"></td>
                  <td style="font-size: 16px; padding-bottom: 0;"><b>Pengantar</b></td>
              </tr>
              <tr>
                  <td style="font-size: 16px; padding-top: 0;">Fungsi - Matematika Kelas XI</td>
              </tr>
              <tr>
                  <td style="padding: 0.3vw;"></td>
              </tr>
              <tr>
                  <td style="font-size: 12px;">1/2 subtopik selesai</td>
              </tr>
          </table>
        </div>
        </a>
    </div>
</div>
</div>
<footer>
    <img src="image/logo otodu terang.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;"> <!-- 120px -->
    <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
</footer>
    <script>
      document.getElementById('koin').addEventListener('click', function(event) {
          event.preventDefault();
          window.location.href = 'price.php'; 
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
