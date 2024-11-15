<?php
session_start();


if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
include 'navbar.php';
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
  <title>OTODU | Solusi Otodidakmu!</title>
  <style>
    * {
      font-family: "Rethink Sans";
    }

    .logo img {
      width: 10vw;
      margin-right: 1vw;
    }

    .intro {
      padding: 5vw 5vw 10vw 27vw;
      background-image: url('./image/gradien\ blue.avif');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      color: white;
      font-size: 16px;
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
      padding: 2vw;
    }

    #bab {
      cursor: pointer;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="button.css">
</head>

<body>
  <header>


    <section id="nlp">
      <div style="padding: 4vw 4vw 4vw 3vw; background-color:#375679;">
        <h3 class="text-white">Statistik NLP</h3>
        <p class="text-white">Statistik capaian belajar mingguan Kamu ditampilkan di sini!</p>
        <div style="display:flex; gap:3vw;">
          <div class="bg-white" style="height:30vw; width:60vw; padding:0vw 4vw 1vw 4vw; border-radius:1vw;">
            <!-- Gmbar Bulat -->
            <div style="position: relative; width: 15vw; height: auto;">
              <img src="image/Subtract.png" alt="" style="width: 100%; position: absolute; top: 6vw; left: 4vw; z-index: 1;">
              <img src="image/Subtract_hijau.png" alt=""
                style="width: 100%; position: absolute; top: 6vw; left: 4vw; z-index: 2; clip-path: inset(40% 0 0 0);">
            </div>
            <!-- Gmbar Bulat Akhir -->
            <!-- Gambar 3r  -->
            <div style="transform: scale(0.5);">
              <div style="position: absolute; top: 3vw; left: 30vw; display: inline-block; ">
                <img src="image/3r/3rputih_tengah.png" alt=""
                  style="position: relative; top: 60px; display: block; margin-left: auto; margin-right: auto;">
                <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                  <img style="margin-right: 10px;" src="image/3r/3rputih_kiri.png" alt="">
                  <img src="image/3r/3rputih_kanan.png" alt="">
                </div>
              </div>

              <div style="position: absolute;  top: 3vw; left: 30vw; display: inline-block; pointer-events: none;">
                <img src="image/3r/3rhijau_tengah.png" alt=""
                  style="position: relative; top: 60px; display: block; margin-left: auto; margin-right: auto; clip-path: inset(50% 0 0 0);">
                <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                  <img style="margin-right: 10px; clip-path: inset(40% 0 0 0);" src="image/3r/3rhijau_kiri.png" alt="">
                  <img style="clip-path: inset(70% 0 0 0);" src="image/3r/3rhijau_kanan.png" alt="">
                </div>
              </div>
            </div>
            <!-- Gambar 3r Akhir  -->

            <div style="display: flex; flex-direction: column; justify-content: flex-end; height: 100%; width: 100%;">
              <div class="mt-2" style="display: flex; gap: 5vw;">
                <div style="display: flex; width: 20vw; align-items: center; justify-content: center;">
                  <div style="width: 10vw; height: 5px; background-color: #46CC6A; border-radius: 1vw;">.</div>
                  <p style="margin-top: 1vw; margin-left: 1vw; font-size: 0.65rem;">Perkembangan saat ini</p>
                </div>

                <div style="display: flex; width: 25vw; align-items: center; justify-content: center;">
                  <div style="width: 10vw; height: 5px; background-color: #C4CBE0; border-radius: 1vw;">.</div>
                  <p style="margin-top: 1vw; margin-left: 1vw; font-size: 0.65rem;">Target capaian/capaian minggu lalu</p>
                </div>
              </div>
            </div>
          </div>



          <div class="bg-white" style="height:30vw; width:40vw; border-radius: 1vw; padding:5vw;">
            <div style="color: #1F2844;">
              <p>Halo <b><?= $_SESSION['user_name'] ?></b>!</p>
              <p style="margin-bottom: 2vw">Kamu terakhir mempelajari <b>Limit Tak Hingga - Subbab III</b>. pengen lanjut lagi ?</p>
              <p class="text-white" style="background-color:#375679; text-align:center; border-radius:5px; padding:5px; cursor:pointer; font-size: 0.9 rem" id="materi-nlp">Buka <b>Limit Tak Hingga - Subbab III</b></p>
              <p class="bg-white" style="color:#375679; text-align:center; border-radius:5px; padding:3px; border:1px solid; cursor:pointer; font-size: 1rem" id="daftar-materi">Buka materi lainnya</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="konten">
      <div style="padding: 4vw 4vw 4vw 7vw;">
        <h4>Bab Saya</h4>
        <br>
        <div style="background-color: #E3ECF5; border-radius: 0.5vw; padding: 2vw 3vw;">
          <div style="background-color: white; border-radius: 0.5vw; width: 40vw; padding: 2vw 1vw 2vw 3vw;" id="bab">
            <table style="border-collapse: collapse;">
              <tr>
                <td rowspan="4" style="padding-right: 1.5vw;"><img src="image/Bab.png" width="60" height="60"></td>
                <td style="font-size: 16px; padding-bottom: 0;"><b>Fungsi</b></td>
              </tr>
              <tr>
                <td style="font-size: 16px; padding-top: 0;">Matematika Kelas XI</td>
              </tr>
              <tr>
                <td style="padding: 0.3vw;"></td>
              </tr>
              <tr>
                <td style="font-size: 12px;">1/2 subtopik selesai</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <img src="image/logo otodu terang.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;"> <!-- 120px -->
      <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>

    <script>
      document.getElementById('bab').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah perilaku default tautan
        window.location.href = 'materi.php'; // Ganti dengan URL yang sesuai
      });

      document.getElementById('materi-nlp').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah perilaku default tautan
        window.location.href = 'materi.php'; // Ganti dengan URL yang sesuai
      });

      document.getElementById('daftar-materi').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah perilaku default tautan
        window.location.href = 'daftar.php'; // Ganti dengan URL yang sesuai
      });
    </script>
</body>

</html>