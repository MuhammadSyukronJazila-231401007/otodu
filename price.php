<?php
session_start();

if( !isset($_SESSION['login']) ){
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: "Poppins";
        }

        body {
            background-color: rgb(150, 137, 137);
        }

        .navbar {
            background-color: white;
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

        .text {
            position: relative; /* Mengatur posisi relatif untuk overlay */
            text-align: center;
            width: 100%; /* Mengambil lebar penuh layar */
            overflow: hidden; /* Menghindari elemen keluar dari tampilan */
        }

        .background-image {
            width: 100%; /* Mengatur gambar agar mengikuti lebar elemen */
            height: auto; /* Menjaga proporsi gambar */
            display: block; /* Menghindari spasi di bawah gambar */
        }

        .overlay {
            position: absolute; /* Memungkinkan teks berada di atas gambar */
            top: 50%; /* Posisi vertikal tengah */
            left: 50%; /* Posisi horizontal tengah */
            transform: translate(-50%, -50%); /* Memusatkan teks */
            color: white; /* Warna teks */
            z-index: 1; /* Memastikan teks di atas gambar */
        }

        #text-2 {
            margin-top: 3vw; /* 20px */
        }

        h4 {
            color: white;
            font-weight: 400;
        }

        #kredit-otodu {
            color: #1F2844;
            margin-top: 3vh;
            margin-left: 5vw; 
        }

        .kredit-satuan {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
        }

        .kredit-satuan p {
            font-size: 1.1vw; /* 13px */
            align-self: center;
        }

        .nomor {
            width: 5.5vw;
            height: 5vh; 
            border-radius: 5px;
            margin-right: 1.5vw; 
            margin-left: 1.5vw; 
            margin-bottom: 2vh; 
        }

        .rounded-text {
            background-color: #F26D0F;
            padding: 0.5vw 1.3vw; /* 5px 15px */
            border-radius: 12px; /* 10px */
            display: inline-block;
            color: #fff;
        }

        .atau {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 4vh; 
        }   

        .kredit-diskon {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .kredit-diskon img {
            height: 23vw; 
            cursor: pointer;
            transition: transform 0.3s ease; 
        }

        .kredit-diskon img:hover {
            transform: scale(1.1); 
        }

        #disc-0 {
            height: 21.2vw; /* 235px */
            margin-top: 1vw; 
            margin-left: 2vw; 
        }
        
        #disc-50 {
            margin-left: 4vw; 
            height: 22vw
        }

        #disc-100 {
            height: 22vw;
            margin-top: 0.5vw
        }

        .kredit-redeem {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10vh;
            margin-bottom: 3vh;
        }

        .redeem {
            width: 15vw; 
            height: 5vh; 
            border-radius: 5px;
            margin-right: 1.5vw; 
            margin-left: 1.5vw; 
            margin-bottom: 2vh; 
        }

        .btn {
            background-color: white;
            color: black;
            border: 0.05vw solid black; /* 0.5px */
            padding: 0.2vw 0.7vw; /* 2px 7px */
            border-radius: 8px; /* 10px */
            cursor: pointer;      
            margin-bottom: 1vw; /* 10px */
        }

        .btn:hover {
            background-color: black;
            color: white;
        }

        footer {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: #1F2844;
            padding: 2vw; /* 20px */
            color: white;
        }
        
    </style>
    
</head>
<body>    

    <nav class="navbar">
        <div class="container" style="display: flex; align-items: center;">
            <div class="logo">
                <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 1vw;"> <!-- 130px -->
            </div>
            <a style="margin: 0; text-decoration: none;" class="nav-menu" id="nav-main" href="dashboard.php">NLP OTODU</a>
            <a style="margin: 0; text-decoration: none;" class="nav-menu" href="mentor.php">Mentor OTODU</a>
            <a style="margin: 0; text-decoration: none;" class="nav-menu" href="jasa.php">Desain Web & App</a>
        </div>
    </nav> 

    <div class="text">
        <img src="./image/price bc.png" alt="Gambar Latar" class="background-image">
        <div class="overlay">
            <h4>Jelajahi pembelajaran otodidak Kamu untuk</h4>
            <h4 id="text-2">NLP dan Mentor dengan <span style="font-family: 'Martian Mono'; font-weight: 600;">Kredit OTODU</span></h4>
        </div>
    </div>


    <div class="card">
        <span style="position: relative; background-color: #96AA03; color: white; display: inline-flex; align-items: center; padding: 0.2vw 1vw; 
                  margin-left: 9vw; border-radius: 3px; width: fit-content; " id="koin">
                <img src="image/coin.png" style="width: 1.7vw; margin-right: 0.5vw;">
                <span style="font-weight: 515">69</span>
        </span>
        <!-- <p id="kredit-otodu">Kredit OTODU Anda: <span style="font-weight: 600;">69</span></p> -->
        <div class="kredit-satuan">
            <p style="font-size: 1rem;">Beli kredit satuan</p>
            <input type="number" class="form-control nomor" placeholder="000" required>
            <p class="rounded-text">Beli <u>Rp 69.420 </u><b>(hemat Rp 1.998)</b></p>
        </div>
        <div class="atau">
            <p>Atau</p>
        </div>
        <div class="kredit-diskon">
            <img id="disc-0" src="image/disc 10 f.png" alt="">
            <img id="disc-50" src="image/disc 50 f.png" alt="">
            <img id="disc-100" src="image/disc 100 f.png" alt="">
        </div>
        <div class="kredit-redeem">
            <p>Sudah punya kode? Redeem kode!</p>
            <input type="text" class="form-control redeem" placeholder="Redeem Kode" required>
            <button type="submit" id="register-btn" class="btn">Redeem</button>
        </div>
    </div>

    <footer>
        <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;"> <!-- 120px -->
        <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</body>
</html>
