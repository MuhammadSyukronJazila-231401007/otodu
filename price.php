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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: "Poppins";
        }

        body {
            background-color: rgb(150, 137, 137);
        }

        .judul {
            color: white;
            font-weight: 400;
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

        .btn-redem {
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

        .btn-redem:hover {
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

        .kirim {
            background-color: #25D366;
            font-size: 1.5vw;
            transition: background-color 0.3s ease;
        }

        .kirim:hover {
            background-color: #1DA851 !important;
        }

        .custom-btn {
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
            background-color: rgba(0, 0, 0, 0.1) !important;
            /* Warna gelap sedikit transparan */
        }

        .mentor {
          background-color: #4D62A5;
          color: white; 
          font-weight: 450;
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
            <h4 class="judul">Jelajahi pembelajaran otodidak Kamu untuk</h4>
            <h4 class="judul" id="text-2">NLP dan Mentor dengan <span
                    style="font-family: 'Martian Mono'; font-weight: 600;">Kredit
                    OTODU</span></h4>
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
            <img data-bs-target="#exampleModal" data-bs-toggle="modal" id="disc-0" src="image/disc 10 f.png" alt="" data-price="Rp5.000">
            <img data-bs-target="#exampleModal" data-bs-toggle="modal" id="disc-50" src="image/disc 50 f.png" alt="" data-price="Rp20.000">
            <img data-bs-target="#exampleModal" data-bs-toggle="modal" id="disc-100" src="image/disc 100 f.png" alt="" data-price="Rp35.000">
        </div>
        <div class="kredit-redeem">
            <p>Sudah punya kode? Redeem kode!</p>
            <input type="text" class="form-control redeem" placeholder="Redeem Kode" required>
            <button type="submit" id="register-btn" class="btn-redem">Redeem</button>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-4 py-2">
                <div class="modal-header" style="border: none;">
                    <h3 class="modal-title text-center w-100" id="exampleModalLabel">Beli Kredit <i
                            class="bi bi-cart-fill ms-2"></i>
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="image/qrcode.png" width="160vw" alt=""> <br>
                    <img src="image/qris 1.png" width="100vw" alt="">
                    <h4 class="mt-2" style="font-weight: bold;">Rp35.000</h4>
                    <button
                        id="toggleButton1"
                        class="custom-btn px-3 btn w-100 mb-3 text-start bg-transparent border d-flex justify-content-between align-items-center"
                        type="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                        <img src="image/mandiri 1.png" width="100vw" alt="">
                        <i class="bi bi-chevron-down py-2"></i>
                    </button>
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <ol class="list-group list-group-numbered text-start">
                            <li class="list-group-item border-0">
                                <span>ATM</span> <br>
                                <ul>
                                    <li>Pergi ke ATM terdekat</li>
                                    <li>Lakukan transfer menggunakan mesin ATM ke nomor rekening berikut:</li>
                                    <li>Nomor Rekening: 123-456-7890 (Bank ABC)</li>
                                    <li>Ikuti instruksi pada layar ATM untuk transfer ke nomor rekening tersebut.</li>
                                </ul>
                            </li>
                            <li class="list-group-item border-0">
                                <span>Mobile Banking</span> <br>
                                <ul>
                                    <li>Melalui aplikasi mobile banking di ponsel Anda, pilih opsi transfer ke rekening Bank ABC dan masukkan nomor rekening:</li>
                                    <li>Nomor Rekening: 123-456-7890</li>
                                    <li>Konfirmasi pembayaran setelah memasukkan jumlah yang sesuai.</li>
                                </ul>
                            </li>
                        </ol>
                    </div>

                    <button
                        id="toggleButton2"
                        class="custom-btn px-3 btn w-100 mb-3 text-start bg-transparent border d-flex justify-content-between align-items-center"
                        type="button" aria-expanded="false" aria-controls="multiCollapseExample2">
                        <img src="image/bca 1.png" width="90vw" alt="">
                        <i class="bi bi-chevron-down py-2"></i>
                    </button>
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <ol class="list-group list-group-numbered text-start">
                            <li class="list-group-item border-0">
                                <span>ATM</span> <br>
                                <ul>
                                    <li>Pergi ke ATM terdekat</li>
                                    <li>Lakukan transfer menggunakan mesin ATM ke nomor rekening berikut:</li>
                                    <li>Nomor Rekening: 123-456-7890 (Bank ABC)</li>
                                    <li>Ikuti instruksi pada layar ATM untuk transfer ke nomor rekening tersebut.</li>
                                </ul>
                            </li>
                            <li class="list-group-item border-0">
                                <span>Mobile Banking</span> <br>
                                <ul>
                                    <li>Melalui aplikasi mobile banking di ponsel Anda, pilih opsi transfer ke rekening Bank ABC dan masukkan nomor rekening:</li>
                                    <li>Nomor Rekening: 123-456-7890</li>
                                    <li>Konfirmasi pembayaran setelah memasukkan jumlah yang sesuai.</li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button style="background-color: #25D366; font-size: 1.5vw;" type="button"
                        class="kirim btn d-block w-100 text-white fw-bold " onclick="sendWhatsApp()">Kirim
                        Bukti <i class="bi bi-whatsapp ms-2"></i></button>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;">
        <!-- 120px -->
        <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
    </footer>
    <script>
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function () {
                const price = this.getAttribute('data-price');
                const modalPriceElement = document.querySelector('#exampleModal h4');
                if (modalPriceElement) {
                    modalPriceElement.textContent = price;
                }
            });
        });
        
        // Menggunakan Bootstrap Collapse API
        document.getElementById('toggleButton1').addEventListener('click', function () {
            const targetElement = new bootstrap.Collapse(document.getElementById('multiCollapseExample1'), {
                toggle: true
            });
            targetElement.toggle();
        });

        document.getElementById('toggleButton2').addEventListener('click', function () {
            const targetElement = new bootstrap.Collapse(document.getElementById('multiCollapseExample2'), {
                toggle: true
            });
            targetElement.toggle();
        });

        function sendWhatsApp() {
            const phoneNumber = "628973267766";
            const message = "Halo, saya ingin mengirim bukti pembayaran."; // Pesan default
            const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

            window.location.href = url;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</body>

</html>