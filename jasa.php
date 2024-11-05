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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/jasa.css">
  <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
  <title>Desain Web & App</title>
  <style>
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
        color: white;
        bottom: 0;
        width: 100%;
        text-align: center;
        padding: 2vw;
      }
  </style>
</head>

<body>

  <nav class="navbar">
      <div class="container" style="display: flex; align-items: center;">
          <div class="logo">
              <img src="image/logo otodu2.png" alt="logo" style="width: 10vw;"> <!-- 130px -->
          </div>
          <a style="margin: 0; text-decoration: none;" class="nav-menu" href="dashboard.php">NLP OTODU</a>
          <a style="margin: 0; text-decoration: none;" class="nav-menu" href="mentor.php">Mentor OTODU</a>
          <a style="margin: 0; text-decoration: none;" class="nav-menu" id="nav-main" href="jasa.php">Desain Web & App</a>
      </div>
  </nav>


  <section class="header">
    <p class="header-p">Kami memiliki professional Developer & Designer <br>
      Wujudkan ide Anda sekarang! di <img style="margin-left: 0.5vw;" src="image/otodu-logo.png" width="30vw">
    </p>
    <div class="card-jasa shadow">
      <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
        aria-controls="collapseExample">
        <div class="jasa text-center">
          <img src="image/design.png" width="60vw" alt=""> <br>
          <p>Desain Grafis</p>
        </div>
      </button>
      <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false"
        aria-controls="collapseExample2">
        <div class="jasa text-center">
          <img src="image/website.png" width="60vw" alt=""> <br>
          <p>Jasa Website</p>
        </div>
      </button>
      <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false"
        aria-controls="collapseExample3">
        <div class="jasa text-center">
          <img src="image/mobile-app.png" width="60vw" alt=""> <br>
          <p>Jasa Aplikasi</p>
        </div>
      </button>

    </div>
  </section>

  <section class="container">
    <div class="collapse" id="collapseExample">
      <div class="isi-jasa" class="collapse" id="collapseExample">
        <div class="d-flex justify-content-around">
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="img-jasa d-flex flex-column justify-content-end"
              style="background-image: url(image/design1.png); ">
              <div class="d-flex justify-content-between">
                <p class="mb-0">Logo</p>
                <p class="mb-0">Rp100k - Rp1000k</p>
              </div>
            </div>
          </button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="img-jasa d-flex flex-column justify-content-end"
              style="background-image: url(image/design2.png); ">
              <div class="d-flex justify-content-between">
                <p class="mb-0">Desain Website</p>
                <p class="mb-0">Rp100k - Rp1000k</p>
              </div>
            </div>
          </button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="img-jasa d-flex flex-column justify-content-end"
              style="background-image: url(image/desain3.png); ">
              <div class="d-flex justify-content-between">
                <p class="mb-0">Banner</p>
                <p class="mb-0">Rp100k - Rp1000k</p>
              </div>
            </div>
          </button>
        </div>
      </div>
    </div>
    <div div class="collapse" id="collapseExample2">
      <div class="isi-jasa">
        <div class="d-flex justify-content-around">
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="img-jasa d-flex flex-column justify-content-end"
              style="background-image: url(image/website1.png); ">
              <div class="d-flex justify-content-between">
                <p class="mb-0">Profile</p>
                <p class="mb-0">Rp100k - Rp1000k</p>
              </div>
            </div>
          </button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="img-jasa d-flex flex-column justify-content-end"
              style="background-image: url(image/website2.png); ">
              <div class="d-flex justify-content-between">
                <p class="mb-0">Promosi</p>
                <p class="mb-0">Rp100k - Rp1000k</p>
              </div>
            </div>
          </button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="img-jasa d-flex flex-column justify-content-end"
              style="background-image: url(image/website3.png); ">
              <div class="d-flex justify-content-between">
                <p class="mb-0">S.Informasi</p>
                <p class="mb-0">Rp100k - Rp1000k</p>
              </div>
          </button>
        </div>
      </div>
    </div>
    </div>

    <div class="collapse" id="collapseExample3">
      <div class="isi-jasa">
        <div class="d-flex justify-content-around">
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="img-jasa d-flex flex-column justify-content-end"
              style="background-image: url(image/aplikasi1.png); ">
              <div class="d-flex justify-content-between">
                <p class="mb-0">Bisnis</p>
                <p class="mb-0">Rp100k - Rp1000k</p>
              </div>
            </div>
          </button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="img-jasa d-flex flex-column justify-content-end"
              style="background-image: url(image/aplikasi2.png); ">
              <div class="d-flex justify-content-between">
                <p class="mb-0">Edukasi</p>
                <p class="mb-0">Rp100k - Rp1000k</p>
              </div>
            </div>
          </button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="img-jasa d-flex flex-column justify-content-end"
              style="background-image: url(image/aplikasi3.png); ">
              <div class="d-flex justify-content-between">
                <p class="mb-0">Kustom</p>
                <p class="mb-0">Rp100k - Rp1000k</p>
              </div>
            </div>
          </button>
        </div>
      </div>
    </div>


    <div class="teks1">
      <p class="teks1-p1">Kenapa Otodu?</p>
      <p class="teks1-p2">Karena kami akan mewujudkan ide Anda dengan para developer
        terbaik!</p>
      <div class="teks1-fitur">
        <div class="d-flex align-items-start">
          <img class="penggunaan-img1" src="image/developer_best.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur">Developer terbaik</p>
            <p class="deskripsi-fitur">Kami bekerja dengan developer profesional <br>
              yang memiliki pengalaman luas, menjamin <br>
              kualitas proyek Anda.</p>
          </div>
          <img class="penggunaan-img1" src="image/layanan.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur">Tersedia Berbagai Layanan</p>
            <p class="deskripsi-fitur">Kami menawarkan 4 layanan utama dan layanan <br>
              tambahan yang mendukung kebutuhan spesifik <br>
              Anda.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="teks1 mb-5">
      <p class="teks1-p2">Langkah mudah dalam menggunakan jasa OTODU !</p>
      <div class="teks1-fitur">
        <div class="d-flex align-items-start">
          <img class="penggunaan-img2" src="image/login.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur">1. Cari layanan</p>
            <p class="deskripsi-fitur">Cari dan pilih layanan sesuai dengan <br>
              kebutuhan proyek Anda.</p>
          </div>
          <img class="penggunaan-img2" src="image/resume.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur">2. Isi formulir</p>
            <p class="deskripsi-fitur">Silahkan isi data diri anda dan <br>
              detail proyek anda.</p>
          </div>
        </div>
        <div style="margin-top: 2vw;" class="d-flex align-items-start">
          <img class="penggunaan-img2" src="image/talk.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur">3. Diskusi</p>
            <p class="deskripsi-fitur">Diskusikan detail proyek anda serta <br>
              penawaran harga kepada developer</p>
          </div>
          <img class="penggunaan-img2" src="image/invoice.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur"> 4. Pembayaran dan Ulasan
            </p>
            <p class="deskripsi-fitur">Setujui proyek Anda dan lakukan Pembayaran. <br>
              Berikan ulasan sebagai evaluasi kami.</p>
          </div>

        </div>
      </div>
    </div>
  </section>
  <form>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content p-3">
          <div class="modal-header border-0">
            <h4 style="font-weight: bold;" class="modal-title text-center w-100" id="exampleModalLabel">Pesan Jasa <i
                class="bi bi-envelope-fill"></i></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="dropdown" class="form-label">Pilih Opsi</label>
              <select class="form-select" id="dropdown" aria-label="Dropdown">
                <option selected>Pilih opsi...</option>
                <option value="1">Opsi 1</option>
                <option value="2">Opsi 2</option>
                <option value="3">Opsi 3</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="whatsapp" class="form-label">No. Whatsapp</label>
              <input type="text" class="form-control" id="whatsapp">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="description" rows="6" placeholder="Masukkan deskripsi..."></textarea>
            </div>

          </div>
          <div class="modal-footer border-0">
            <button type="submit" class="btn w-100 text-center border-0" data-bs-dismiss="modal">
              Submit <i class="bi bi-check-circle-fill"></i>
            </button>
          </div>

        </div>
      </div>
    </div>
  </form>

  <footer>
      <img src="image/logo otodu terang.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;"> <!-- 120px -->
      <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>


</body>

</html>