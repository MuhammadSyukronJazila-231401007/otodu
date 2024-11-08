<?php
include 'function.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$koin = ambilData("SELECT koin FROM users WHERE id = $id");

include 'navbar.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga</title>

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

        .text {`
            position: relative;
            /* Mengatur posisi relatif untuk overlay */
            text-align: center;
            width: 100%;
            /* Mengambil lebar penuh layar */
            overflow: hidden;
            /* Menghindari elemen keluar dari tampilan */
        }

        .background-image {
            width: 100%;
            /* Mengatur gambar agar mengikuti lebar elemen */
            height: auto;
            /* Menjaga proporsi gambar */
            display: block;
            /* Menghindari spasi di bawah gambar */
        }

        .overlay {
            position: absolute;
            /* Memungkinkan teks berada di atas gambar */
            top: 50%;
            /* Posisi vertikal tengah */
            left: 50%;
            /* Posisi horizontal tengah */
            transform: translate(-50%, -50%);
            /* Memusatkan teks */
            color: white;
            /* Warna teks */
            z-index: 1;
            /* Memastikan teks di atas gambar */
        }

        #text-2 {
            margin-top: 3vw;
            /* 20px */
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
            font-size: 1.1vw;
            /* 13px */
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
            padding: 0.5vw 1.3vw;
            /* 5px 15px */
            border-radius: 12px;
            /* 10px */
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
            height: 21.2vw;
            /* 235px */
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
            border: 0.05vw solid black;
            /* 0.5px */
            padding: 0.2vw 0.7vw;
            /* 2px 7px */
            border-radius: 8px;
            /* 10px */
            cursor: pointer;
            margin-bottom: 1vw;
            /* 10px */
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
            padding: 2vw;
            /* 20px */
            color: white;
        }
    </style>

</head>

<body>

    <!-- <nav class="navbar">
        <div class="container" style="display: flex; align-items: center;">
            <div class="logo">
                <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 1vw;"> 
            </div>
            <a style="margin: 0; text-decoration: none;" class="nav-menu" id="nav-main" href="dashboard.php">NLP OTODU</a>
            <a style="margin: 0; text-decoration: none;" class="nav-menu" href="mentor.php">Mentor OTODU</a>
            <a style="margin: 0; text-decoration: none;" class="nav-menu" href="jasa.php">Desain Web & App</a>
        </div>
    </nav> -->

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
            <span style="font-weight: 515"><?= $koin[0]['koin'] ?></span>
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
            <img data-bs-target="#exampleModal" data-bs-toggle="modal" id="disc-0" src="image/disc 10 f.png" alt="">
            <img data-bs-target="#exampleModal" data-bs-toggle="modal" id="disc-50" src="image/disc 50 f.png" alt="">
            <img data-bs-target="#exampleModal" data-bs-toggle="modal" id="disc-100" src="image/disc 100 f.png" alt="">
        </div>
        <div class="kredit-redeem">
            <p>Sudah punya kode? Redeem kode!</p>
            <input type="text" class="form-control redeem" placeholder="Redeem Kode" required>
            <button type="submit" id="register-btn" class="btn">Redeem</button>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <h3 class="modal-title text-center w-100" id="exampleModalLabel">Beli Kredit <i class="bi bi-cart-fill"></i>
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="image/qrcode.png" width="160vw" alt=""> <br>
                    <img src="image/qris 1.png" width="100vw" alt="">
                    <h4 class="mt-2" style="font-weight: bold;">Rp35.000</h4>
                    <button class="btn btn-primary w-100 mb-3 text-start" type="button" data-bs-toggle="collapse"
                        data-bs-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle
                        second element</button>
                    <br>
                    <button class="btn btn-primary w-100 text-start" type="button" data-bs-toggle="collapse"
                        data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle
                        second element</button>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                    Some placeholder content for the first collapse component of this multi-collapse example. This panel is
                                    hidden by default but revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample2">
                                <div class="card card-body">
                                    Some placeholder content for the second collapse component of this multi-collapse example. This panel is
                                    hidden by default but revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;"> <!-- 120px -->
        <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
    </footer>
    <script>
        // Dapatkan elemen gambar
        const images = document.querySelectorAll('#disc-0, #disc-50, #disc-100');

        // Tambahkan event listener ke setiap gambar
        images.forEach(image => {
            image.addEventListener('click', () => {
                // Tampilkan modal
                const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</body>

</html>