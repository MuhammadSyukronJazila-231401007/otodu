<?php
include 'function.php';
include 'navbar.php';
session_start();

if( !isset($_SESSION['login']) ){
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$koin = ambilData("SELECT koin FROM users WHERE id = $id");

// Ambil latitude dan longitude pengguna dari POST
$userLat = $_SESSION['latitude']; 
$userLng = $_SESSION['longitude']; 

// Query untuk mengambil data Mentor (role = 'Mentor')
$mentors = ambilData("SELECT * FROM users WHERE role = 'Mentor'");

// Fungsi untuk menghitung jarak antara dua koordinat (Haversine formula)
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Radius bumi dalam kilometer
    
    $latFrom = deg2rad($lat1);
    $lonFrom = deg2rad($lon1);
    $latTo = deg2rad($lat2);
    $lonTo = deg2rad($lon2);

    $latDiff = $latTo - $latFrom;
    $lonDiff = $lonTo - $lonFrom;

    $a = sin($latDiff / 2) * sin($latDiff / 2) +
         cos($latFrom) * cos($latTo) *
         sin($lonDiff / 2) * sin($lonDiff / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    return $earthRadius * $c; // Mengembalikan jarak dalam kilometer
}

// Filter mentor yang jaraknya kurang dari 2 km
// $nearbyMentors = [['nama' => 'Lokasi pengguna', 'latitude' => $userLat, 'longitude' => $userLng]];
$nearbyMentors = [];
foreach ($mentors as $mentor) {
    $distance = calculateDistance($userLat, $userLng, $mentor['latitude'], $mentor['longitude']);
    if ($distance <= 10) {
        $mentor['jarak'] = number_format($distance,2);
        $nearbyMentors[] = $mentor; // Menambahkan mentor ke array jika jaraknya <= 2 km
    }
}

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@400;700&display=swap">
    <title>Cari Mentor</title>
    <style>
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
        padding: 2.3vw;
    }

    .intro {
        padding: 5vw 5vw 10vw 27vw;
        background-image: url('./image/gradien\ blue.avif');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        color: white;
        font-size: 2vw;

    }

    #map {
        height: 350px;
        width: 350px;
    }

    .modal-backdrop {
        background-color: #1F2844;
        opacity: 100%;
        /* awalnya 90% */
    }

    .modal {
        background-color: #1F2844;
        opacity: 100%;
        /* awalnya 90% */
    }

    .modal-content {
        background-color: #1F2844;
        opacity: 100%;
        /* awalnya 90% */
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Rethink Sans";
    }

    body {
        /* min-height: 100vh; */
        background: white;
        color: white;
        background-size: cover;
        background-position: center;
    }

    .top-element {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        /* Supaya elemen ini berada di atas elemen lainnya */
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .side-bar {
        background: #375679;
        backdrop-filter: blur(15px);
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: -250px;
        overflow-y: auto;
        z-index: 2000;
        /* Menambahkan overflow-y untuk scroll */
        transition: 0.6s ease;
        transition-property: left;
    }

    /* Menampilkan scrollbar pada .side-bar */
    .side-bar::-webkit-scrollbar {
        width: 8px;
        /* Lebar scrollbar */
    }

    .side-bar::-webkit-scrollbar-thumb {
        background-color: #6A6A6A;
        /* Warna thumb scrollbar */
        border-radius: 4px;
    }

    .side-bar::-webkit-scrollbar-track {
        background: #434041;
        /* Warna track scrollbar */
    }

    .side-bar.active {
        left: 0;
    }

    .side-bar .menu {
        width: 100%;
        margin-top: 30px;
    }

    .side-bar .menu .item {
        position: relative;
        cursor: pointer;
    }

    .side-bar .menu .item a {
        color: #fff;
        font-size: 0.9rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 2vh 1.5vw;
        border-radius: 10px;
    }

    .sub-btn {
        font-weight: 600;
        margin: 0 0.9vw;
    }

    .side-bar .menu .item a:hover {
        background: #455E95;
        transition: 0.3s ease;
    }

    .side-bar .menu .item i {
        margin-right: 15px;
    }

    .side-bar .menu .item a .dropdown {
        position: absolute;
        right: 0;
        transition: 0.3s ease;
        padding-right: 0.8vw;
    }

    .side-bar .menu .item .sub-menu {
        background: #3E5A86;
        display: none;
        margin: 0 0.9vw;
        border-radius: 10px;
    }

    .side-bar .menu .item .sub-menu a {
        padding-left: 2.5vw;
    }

    .side-bar .menu .item .sub-btn.active {
        background-color: #4D62A5;
        color: #fff;
    }

    .side-bar .menu .item .sub-menu .sub-item.active {
        background-color: #6B7FA7;
        color: #fff;
    }

    .rotate {
        transform: rotate(-180deg);
    }

    .menu-btn {
        color: rgb(255, 255, 255);
        font-size: 1.5rem;
        margin: 1.2px;
        margin-left: 3vw;
        margin-right: 3vw;
        cursor: pointer;
    }

    .main {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px;
    }

    header {
        background: #5E88B6;
    }

    .close-btn {
        position: absolute;
        color: #fff;
        font-size: 1.1rem;
        right: 0px;
        margin: 15px;
        cursor: pointer;
    }

    #judul-materi {
        padding-top: 2vw;
        padding-left: 1vw;
    }

    #nama-materi {
        padding-top: 0.5vw;
        padding-left: 1vw;
        padding-bottom: 1vw;
        font-weight: 700;
        font-size: 1em;
    }

    .menu p {
        margin-left: 1vw;
        margin-top: 1vw;
        margin-bottom: 0.5vw;
    }

    /* .text {
            padding: 1.2vw; 
            background-color: #375679;
        } */

    .head {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        z-index: 1000;
    }

    table td {
        border: 1px;
    }

    /* css konten halaman (kode anugrah) */
    .box {
        height: 4.5vw;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.4vw;
    }

    .boxleft {
        color: white;
        display: flex;
        font-size: 1.4vw;
        flex-direction: column;
    }

    .full-row {
        background-color: #375679;
        padding: 0;
        /* Remove horizontal padding */
    }

    .box-4 {
        padding: 3vw;
        display: flex;
        flex-direction: column;
        gap: 1vw;
        /* Jarak antar elemen */
    }

    .box-4 .inner-box {
        background-color: #C2C5CD;
        color: #F6F7FA;
        padding: 0.8vw;
        font-family: 'Nunito Sans', sans-serif;
        margin-bottom: 0;
        /* Hilangkan margin bawah */
    }

    .box-5 {
        background-color: #d36bff;
    }

    .inner-box {
        border-radius: 1vw;
    }

    .modal-backdrop {
        background-color: #1F2844;
        opacity: 100%;
        /* awalnya 90% */
    }

    .modal {
        background-color: #1F2844;
        opacity: 100%;
        /* awalnya 90% */
    }

    .modal-content {
        background-color: #1F2844;
        opacity: 100%;
        /* awalnya 90% */
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/button.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">


</head>

<body style="font-family: 'Rethink Sans', sans-serif;">
    <header>

        <div class="intro">
            <div style="width: 30vw;">Otodidak jauh lebih terarah
                dengan..</div>
            <div style="display: flex;">
                <b>
                    Mentor &nbsp;
                    <img src="./image/otodu putih.png" width="25" height="15">
                    <font style="font-family: 'Martian Mono', monospace;">OTODU</font>
                </b>
            </div>
        </div>
    </header>

    <main>
        <div style="display: flex; justify-content: space-between; margin-left: 5vw; margin-top: 0;">
            <div style="display: flex;">
                <div><?php include "koin.php"; ?></div>
                <div style="background-color: #4D62A5; color: white; padding: 0;">
                    <a href="riwayatmentor.php" class="btn btn-primary"
                        style="background-color: #4D62A5;  font-size: 12px; text-align: center; border: 0cm;"
                        tabindex="-1" role="button" aria-disabled="true">
                        <div style="display: flex;" id="riwayat-mentor">
                            <div style="margin-right: 0.4vw;">
                                <img src="./image/riwayat.png" width="20" height="20">
                            </div>
                            <div style="text-align: left;">Riwayat transaksi</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- <div>
          <font style="background-color: #4D62A5; margin-right: 5vw; padding: 0vw 0.4vw 0.4vw 0.4vw;">   
              <a href="leaderboard.php">
                  <img src="image/rank.png" width="18" height="18" style="margin-left: 0.7vw;">
              </a>
              <a href="">
                  <img src="image/mail.png" width="18" height="18" style="margin-left: 1.5vw; margin-right: 1.5vw;">
              </a>
              <a href="profil.php">
                  <img src="image/user2.png" width="18" height="18" style="margin-right: 0.7vw;">
              </a>
              </font>
        </div> -->

            <?php include "navbarkecil.php"; ?>
        </div>

        <center>
            <table style="width: 90%;">

                <tr>
                    <td style="padding-top: 1vw;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding: 1.5vw;"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-bottom: 2px;">
                        <h5>Mentor apa yang Kamu cari?</h5>
                    </td>
                    <td>
                        <h5>Ketersediaan mentor?</h5>
                    </td>
                    <td>
                        <h5>Peta lokasi mentor</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <font style="border-bottom: 0.1vw solid #1F2844; padding-bottom: 2px;">Materi sekolah</font>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-off" style="border-radius: 1.6vw;">
                            Luring / <i>Offline</i>
                        </button>
                    </td>
                    <td rowspan="7">
                        <!-- <img src="./image/maps.jfif" width="350" height="300"> -->
                        <div id="map" name="map"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="display: flex;">
                            <div>
                                <button type="button" class="btn btn-outline-mtk"
                                    style="border-radius: 1.6vw; margin-right: 1.5vw;">
                                    Matematika
                                </button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-bing" style="border-radius: 1.6vw;">
                                    B. Inggris
                                </button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-on" style="border-radius: 1.6vw;">
                            Daring / <i>Online</i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="display: flex;">
                            <div>
                                <button type="button" class="btn btn-outline-utbk"
                                    style="border-radius: 1.6vw; margin-right: 1.5vw;">
                                    UTBK
                                </button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-dp" style="border-radius: 1.6vw;">
                                    Dasar Pemrograman
                                </button>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding: 0.5vw;"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <font style="border-bottom: 0.1vw solid #1F2844; padding-bottom: 5px;">Pemrograman Lanjutan
                        </font>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="display: flex;">
                            <div>
                                <button type="button" class="btn btn-outline-bing"
                                    style="border-radius: 1.6vw; margin-right: 1.5vw; margin-top: 5px;">
                                    <i>Front-end App</i>
                                </button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-bing"
                                    style="border-radius: 1.6vw; margin-top: 5px;">
                                    <i>Front-end Web</i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="display: flex;">
                            <div>
                                <button type="button" class="btn btn-outline-bing"
                                    style="border-radius: 1.6vw; margin-right: 1.5vw;">
                                    <i>Back-end</i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
            </table>
        </center><br>
        <h5 style="margin-left: 5vw;">List mentor</h5><br>
        <!--Baris pertama-->
        <?php 
          $mentors = ambilData("SELECT * FROM users WHERE role='Mentor'");
        ?>

        <div>
            <center style="display: flex; margin-left: 5vw; margin-right: 5vw; justify-content: space-between;">
                <?php foreach ($nearbyMentors as $mentor) { ?>
                <table style="background-color: #4D62A5; border-radius: 1vw; margin-bottom: 1vw;">
                    <tr>
                        <td rowspan="2">
                            <img src="./image/user.png" width="30" height="30"
                                style="margin-left: 2vw; margin-top: 1vw;">
                        </td>
                        <td colspan="2" style="color: white; padding-top: 1vw;">
                            Mentor <?= htmlspecialchars($mentor['nama']); ?>, S.Komedi
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="color: white; font-size: 12px; border-bottom: 1px solid white;">
                            <img src="./image/pin.png" width="17" height="17">
                            <?= htmlspecialchars($mentor['jarak']); ?> Km
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px;"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <!-- <tr>
                        <td colspan="3">
                            <div style="display: flex;">
                                <?php
                            // $subjects = explode(',', $mentor['pelajaran']); // Pelajaran disimpan sebagai string dipisahkan koma
                            // foreach ($subjects as $subject) {
                            //     echo "<div><button type='button' class='btn btn-secondary' 
                            //         style='font-size: 12px; padding: 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw;'>"
                            //         . htmlspecialchars(trim($subject)) . "</button></div>";
                            // }
                            ?>
                            </div>
                        </td>
                    </tr> -->

                    <tr>
                        <td colspan="3">
                            <div style="display: flex;">
                                <div><button type="button" class="btn btn-danger"
                                        style="background-color: #793738; border-color: #793738; font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0vw;">
                                        Matematika </button></div>
                                <div><button type="button" class="btn btn-secondary"
                                        style="background-color: #6C3779; border-color: #6C3779; font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-bottom: 4px; margin-right: 3vw;">Dasar
                                        Pemrograman</button></div>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div style="display: flex;">
                                <div><button type="button" class="btn btn-success"
                                        style="background-color: #89622B; border-color: #89622B; font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0;">UTBK</button>
                                </div>
                                <div><button type="button" class="btn btn-success"
                                        style="background-color: #377939; border-color: #377939; font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw;">Luring</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: end; padding: 0 0 4px 0; margin-top: 0;">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#modal<?= $mentor['id']; ?>"
                                style="color: white; font-size: 12px; margin-right: 1vw;">
                                Pesan Jasa
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal<?= $mentor['id']; ?>" tabindex="-1"
                                aria-labelledby="modalLabel<?= $mentor['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div style="text-align: right; margin-right: 0.8vw;">
                                            <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                                style="margin-top: 0.7vw; margin-right: 0.7vw; background-color: white; border-radius: 5vw; font-size: 15px; padding: 0px 0.2vw">
                                                &nbsp;X&nbsp;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div
                                                style="display: flex; background-color: #375679; border-radius: 0.5vw; margin-bottom: 2vw;">
                                                <div
                                                    style="margin-top: 0.8vw; color: #F6F7FA; border-radius: 4vw; font-size: 1.5vw; padding-left: 0.25vw; padding-right: 0.25vw; margin: 1.2vw 1vw 1.2vw 2.5vw;">
                                                    Pesan jasa mentor OTODU
                                                </div>
                                            </div>

                                            <div style="display: flex; justify-content: space-around">
                                                <div
                                                    style="width: 40vw; height: 30vw; background-color: white; border-radius: 0.5vw;">
                                                    <center>
                                                        <div style="display: flex; align-items: center;">
                                                            <img src="image/user.png" alt="User Image"
                                                                style="width: 50px; margin-right: 15px;">

                                                            <div
                                                                style="display: flex; flex-direction: column; border-bottom: 1px solid black;">
                                                                <p> <?= htmlspecialchars($mentor['nama']); ?>,
                                                                    S.Komedi
                                                                </p>

                                                                <div style="display: flex; align-items: center;">
                                                                    <img src="image/pinhitam.png" alt="Location Pin"
                                                                        style="width: 20px; margin-right: 5px;">
                                                                    <div><?= htmlspecialchars($mentor['jarak']); ?>
                                                                        Km
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div
                                                            style="border-bottom: 1px solid #3A425A; color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                            <font>Mengajar</font>
                                                        </div>

                                                        <div
                                                            style="display: flex; gap: 10px; align-items: center; margin-top: 1vw;">
                                                            <span
                                                                style="padding: 10px 20px; background-color: #FF6F00; color: white; border-radius: 5px; font-size: 16px;">Matematika</span>
                                                            <span
                                                                style="padding: 10px 20px; background-color: #388E3C; color: white; border-radius: 5px; font-size: 16px;">Dasar
                                                                Pemrograman</span>
                                                            <span
                                                                style="padding: 10px 20px; background-color: #1976D2; color: white; border-radius: 5px; font-size: 16px;">UTBK</span>
                                                        </div>

                                                        <div
                                                            style="border-bottom: 1px solid #3A425A; color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                            <font>Ketersediaan</font>
                                                        </div>

                                                        <div
                                                            style="display: flex; flex-direction: column; gap: 10px; margin-top: 1vw;">
                                                            <span
                                                                style="padding: 5px 10px; background-color: #FF6F00; color: white; border-radius: 5px; font-size: 16px;">Luring
                                                                @ 13:00 - 16:00, 16:30 - 19:00</span>
                                                            <span
                                                                style="padding: 5px 10px; background-color: #388E3C; color: white; border-radius: 5px; font-size: 16px;">Daring
                                                                @ 13:00 - 16:00, 16:30 - 19:00, 19:30 - 22:30</span>
                                                        </div>

                                                        <div
                                                            style="border-bottom: 1px solid #3A425A; color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                            <font>Riwayat studi</font>
                                                        </div>

                                                        <div
                                                            style="display: flex; flex-direction: column; gap: 10px; margin-top: 10px; align-items: flex-start;">
                                                            <p style="font-size: 16px; color: #3A425A; margin: 0;">
                                                                Sarjana Ilmu Komedi - Universitas Kampus Institut
                                                            </p>
                                                            <p style="font-size: 16px; color: #3A425A; margin: 0;">
                                                                Magister Sastra Mesin - Institut Teknologi Dimensi
                                                            </p>
                                                        </div>

                                                    </center>
                                                </div>
                                                <div
                                                    style="width: 40vw; height: 30vw; background-color: white; border-radius: 0.5vw;">
                                                    <div style="margin-top: 1vw; text-align: center;">

                                                        <div
                                                            style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                            <font>Materi yang ingin dipelajari</font>
                                                        </div>

                                                        <div
                                                            style="margin-top: 10px; display: flex; flex-direction: column; align-items: flex-start;">
                                                            <select
                                                                style="padding: 10px 20px; font-size: 16px; color: #3A425A; border: 1px solid #3A425A; border-radius: 5px; width: 100%;">
                                                                <option value="matematika" style="font-weight: bold;">
                                                                    Matematika</option>
                                                            </select>
                                                        </div>

                                                        <div style="margin-top: 1vw; text-align: center;">

                                                            <div
                                                                style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                                <font>Topik</font>
                                                            </div>

                                                            <div
                                                                style="margin-top: 10px; display: flex; flex-direction: column; align-items: flex-start;">
                                                                <select
                                                                    style="padding: 10px 20px; font-size: 16px; color: #3A425A; border: 1px solid #3A425A; border-radius: 5px; width: 100%;">
                                                                    <option value="Fungsi" style="font-weight: bold;">
                                                                        Matematika</option>
                                                                </select>
                                                            </div>

                                                            <div style="margin-top: 1vw; text-align: center;">

                                                                <div
                                                                    style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                                    <font>Fungsi</font>
                                                                </div>

                                                                <div
                                                                    style="margin-top: 10px; display: flex; flex-direction: column; align-items: flex-start;">
                                                                    <select
                                                                        style="padding: 10px 20px; font-size: 16px; color: #3A425A; border: 1px solid #3A425A; border-radius: 5px; width: 100%;">
                                                                        <option value="matematika"
                                                                            style="font-weight: bold;">Daring
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <button
                                                                    style="margin-top: 20px; padding: 10px 0; background-color: #FF6F00; color: white; border: none; border-radius: 5px; font-size: 16px; width: 100%; text-align: center;">
                                                                    Pesan
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                        </td>
                    </tr>
                </table>
                <?php } ?>
            </center>
        </div>
        </td>
        </tr>
        </table>
        </center>
        </div>
        </div>
    </main><br><br><br>

    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;">
        <!-- 120px -->
        <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script async defer
        src="https://maps.gomaps.pro/maps/api/js?key=AlzaSyeT3ed8_nmf_1VGDtIOF0Z0FYT88xg945v&callback=initMap"></script>

    <script>
    // Data dari PHP (Mentor dan lokasi pengguna)
    let nearbyMentors = <?php echo json_encode($nearbyMentors); ?>;
    let userLat = <?php echo $userLat; ?>;
    let userLng = <?php echo $userLng; ?>;

    // Fungsi untuk menginisialisasi peta
    function initMap() {
        let userLocation = {
            lat: userLat,
            lng: userLng
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: userLocation
        });

        // Menambahkan marker untuk setiap mentor
        nearbyMentors.forEach(function(mentor) {
            // Konversi lat dan lng ke angka menggunakan Number() atau parseFloat()
            let mentorLat = Number(mentor.latitude);
            let mentorLng = Number(mentor.longitude);

            console.log(mentor.nama);

            // Cek apakah lat dan lng mentor valid
            if (!isNaN(mentorLat) && !isNaN(mentorLng)) {
                let mentorLocation = {
                    lat: mentorLat,
                    lng: mentorLng
                };
                // console.log(mentorLocation);

                let ikon;
                if (mentor.nama == 'Lokasi pengguna') {
                    ikon = "image/red-marker-mini.png"
                    // ikon = "https://img.icons8.com/color/48/google-maps-new.png"
                    // ikon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                } else {
                    ikon = "image/blue-marker-mini.png"
                    // ikon = "https://img.icons8.com/color-glass/480/google-maps-new.png"
                    // ikon = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                }

                let mentorMarker = new google.maps.Marker({
                    position: mentorLocation,
                    map: map,
                    title: mentor.name,
                    icon: ikon
                });

                // Event listener untuk klik pada marker
                google.maps.event.addListener(mentorMarker, 'click', function() {
                    // alert('Marker ' + mentor.nama + ' diklik!');

                    // menampilkan info window
                    let infoWindow = new google.maps.InfoWindow({
                        content: `<h4>${mentor.nama}</h4><h5>Jarak: ${mentor.jarak} KM</h5>`
                    });
                    infoWindow.open(map, mentorMarker);
                });
            } else {
                console.log('Invalid mentor location for: ' + mentor.name);
            }
        });

        // Marker untuk lokasi pengguna
        let userMarker = new google.maps.Marker({
            position: userLocation,
            map: map,
            title: 'Your Location',
            icon: "image/red-marker-mini.png" // Merah untuk pengguna
        });

        // Event listener untuk klik pada marker lokasi pengguna
        google.maps.event.addListener(userMarker, 'click', function() {
            let infoWindow = new google.maps.InfoWindow({
                content: `<h5>Lokasi anda</h5>`
            });
            infoWindow.open(map, userMarker);
        });
    }

    document.getElementById('koin').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = 'price.php';
    });
    </script>
</body>

</html>