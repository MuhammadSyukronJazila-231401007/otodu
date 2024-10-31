<?php
// session_start();

// if (!isset($_SESSION['login'])) {
//     header("Location: login.php");
//     exit;
// }

include 'function.php';
$kode_materi = 1; //$_GET['kode_materi'];
$kode_bab = 1; // $_GET['kode_bab'];
$kode_subbab = 1;// $_GET['kode_subbab'];

$koin = ambilData("SELECT koin FROM user_materi WHERE id_user = 1");
$nama_materi = ambilData("SELECT nama_materi FROM materi WHERE kode_materi = $kode_materi ");
$nama_bab = ambilData("SELECT nama_bab FROM bab WHERE kode_bab = $kode_bab ");
$nama_subbab = ambilData("SELECT nama_subbab FROM subbab WHERE kode_subbab = $kode_subbab ");
$topik = ambilData("SELECT * FROM topik WHERE kode_subbab= $kode_subbab");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_subtopik_pilih = $_POST['kode_subtopik'];
    $harga_subtopik = $_POST['harga'];
    $status_bayar = ambilData("SELECT status_bayar FROM subtopik WHERE kode_subtopik = $kode_subtopik_pilih");
    // Cek apakah koin cukup

    if ($status_bayar[0]['status_bayar'] == 1) {
        // Redirect ke halaman isi_subtopik
        // header("Location: isi_subtopik2.php?kode_materi=$kode_materi&kode_bab=$kode_bab&kode_subbab=$kode_subbab&kode_subtopik=$kode_subtopik_pilih");
        if($kode_subtopik_pilih == 1){
            header("Location: isi_materi.php");
        }else{
            header("Location: isi_subtopik2.php");
        }
        
        exit;
    } else if ($koin[0]['koin'] >= $harga_subtopik && $status_bayar[0]['status_bayar'] == 0) {
        // Update koin
        $new_koin = $koin[0]['koin'] - $harga_subtopik;
        mysqli_query($conn, "UPDATE user_materi SET koin = $new_koin WHERE id_user = 1;");
        mysqli_query($conn, "UPDATE subtopik SET status_bayar = 1 WHERE kode_subtopik = $kode_subtopik_pilih");
        // Redirect ke halaman isi_subtopik
        if($kode_subtopik_pilih == 1){
            header("Location: isi_materi.php");
        }else{
            header("Location: isi_subtopik2.php");
        }
        
        exit;
    } else {
        echo "<script>alert('Koin anda belum cukup!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar menu With Sub-menus | Using HTML, CSS & JQuery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style media="screen">
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

        /* Navbar */
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
            transform: translateX(50%);
            /* Memindahkan garis ke tengah-tengah jarak antara elemen a */
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

        .container {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        /* End of Navbar */

        /* .text {
            padding: 1.2vw; 
            background-color: #375679;
        } */

        .head {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>


    <div class="head">
        <nav class="navbar">
            <div class="container" style="display: flex; align-items: center;">
                <div class="logo">
                    <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 1vw;"> <!-- 130px -->
                </div>
                <a style="margin: 0;" class="nav-menu" id="nav-main" href="dashboard.php">NLP OTODU</a>
                <a style="margin: 0;" class="nav-menu" href="mentor.php">Mentor OTODU</a>
                <a style="margin: 0;" class="nav-menu" href="jasa.php">Desain Web & App</a>
            </div>
        </nav>
        <!-- <div class="text">
            
        </div> -->
        <div class="row full-row">
            <div class="col-md-4">
                <div class="box box-1 ml-5">
                    <div class="menu-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                    <u>Matematika SMA Kelas 11</u>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-2">Fungsi |&nbsp;<b>I. Pengantar</b></div>
            </div>
            <div class="col-md-4">
                <div class="box box-3">0/3 Materi Selesai</div>
            </div>
        </div>

        <span style="position: relative; background-color: #96AA03; color: white; display: inline-flex; align-items: center; padding: 0.2vw 1vw; 
              margin-left: 6.5vw; border-radius: 3px; cursor: pointer;" id="koin">
            <img src="image/coin.png" style="width: 1.7vw; margin-right: 0.5vw;">
            <b><?= $koin[0]['koin']; ?></b>
        </span>


    </div>

    <div class="side-bar">
        <header>
            <div class="close-btn">
                <i class="fas fa-times"></i>
            </div>
            <p id="judul-materi">Materi</p>
            <p id="nama-materi">Matematika SMA Kelas IX</p>
        </header>
        <div class="menu">
            <p>Bab</p>
            <div class="item">
                <a class="sub-btn">Fungsi<i class="fas fa-angle-down dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Pengantar</a>
                    <a href="#" class="sub-item">Fungsi dan Bukan Fungsi</a>
                    <a href="#" class="sub-item">Komposisi</a>
                </div>
            </div>
            <div class="item">
                <a class="sub-btn">Matriks<i class="fas fa-angle-down dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                    <a href="#" class="sub-item">Sub Item 03</a>
                </div>
            </div>
            <div class="item">
                <a class="sub-btn">Trigonometri<i class="fas fa-angle-down dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                    <a href="#" class="sub-item">Sub Item 03</a>
                </div>
            </div>
            <div class="item">
                <a class="sub-btn">Ruang 3 Dimensi<i class="fas fa-angle-down dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                    <a href="#" class="sub-item">Sub Item 03</a>
                </div>
            </div>
            <div class="item">
                <a class="sub-btn">Limit<i class="fas fa-angle-down dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                    <a href="#" class="sub-item">Sub Item 03</a>
                </div>
            </div>
            <div class="item">
                <a class="sub-btn">Turunan<i class="fas fa-angle-down dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                    <a href="#" class="sub-item">Sub Item 03</a>
                </div>
            </div>
            <div class="item">
                <a class="sub-btn">Integral<i class="fas fa-angle-down dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                    <a href="#" class="sub-item">Sub Item 03</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left: 1.5vw; margin-right: 1.5vw;">
        <div class="col-md-6">
            <div class="boxleft box-4">
                <div class="column d-flex flex-column mb-4 mt-2">
                    <span style="color: #3A425A; margin-left: 0.8vw; font-size: 1.3vw;">Materi NLP</span>
                    <div style="height: 0.1vw; width: 20vw; background-color: #3A425A; margin-left: 0.8vw;"></div>
                </div>

                <!-- kontent topik -->
                <div class="row" style="margin-left: 0vw;">
                    <div class="inner-box" style="background-color: #375679; width: 30vw; margin-right: 3vw">
                        <img src="image/01.png" style="width: 1.5vw;">
                        <b>Apa itu fungsi?</b>
                    </div>
                    <div class="inner-box mulai" style="background-color: #46CC6A; color: #24384E; width: 7vw; 
                        align-items: center; display: flex; justify-content: center; cursor: pointer" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <b>Mulai</b>
                    </div>
                </div>

                <div class="inner-box">
                    <img src="image/02.png" style="width: 1.5vw;">
                    Beda fungsi dan bukan fungsi
                </div>
                <div class="inner-box">
                    <img src="image/03.png" style="width: 1.5vw;">
                    Filler aja ini
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="boxleft box-4">
                <div class="column d-flex flex-column mb-4">
                    <span style="color: #3A425A; margin-left: 0.8vw;">
                        <span style="font-size: 1.3vw;">
                            Rangkuman Materi
                            <img src="image/01_2.png" style="width: 1.5vw;">
                        </span>
                    </span>
                    <div style="height: 0.1vw; width: 20vw; background-color: #3A425A; margin-left: 0.8vw;"></div>
                </div>

                <div class="inner-box column d-flex flex-column mb-3" style="background-color: #ffffff; border: 0.1vw solid #B2B5BF; align-items: center;">
                    <img src="image/thumbnail.png" width="420vw">
                    <p style="color: #1F2844; font-size: 1vw; margin-left: 4.5vw; margin-right: 4.5vw; margin-top: 1vw;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a risus vel est maximus volutpat sit amet et ipsum. Duis a massa sodales, pulvinar lectus vel, elementum dolor. Vestibulum nibh nibh, placerat vitae fringilla non, accumsan eget lectus.
                        <br>
                        Phasellus suscipit, odio quis ultricies luctus, ex risus bibendum neque, vitae hendrerit leo turpis ac nisl. Nam sit amet fermentum odio, at posuere tortor. Etiam sit amet lobortis sem. Praesent eget rhoncus tortor. Etiam tincidunt consectetur erat eu tincidunt. Aenean a tellus nec massa tempor consectetur sit amet at metus.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- popup -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div style="text-align: right; margin-right: 0.8vw;">
                    <button type="button" data-bs-dismiss="modal" aria-label="Close"
                        style="margin-top: 0.7vw; margin-right: 0.7vw; background-color: white; border-radius: 5vw; font-size: 15px; padding: 0px 0.2vw"> &nbsp;X&nbsp;</button>
                </div>
                <div class="modal-body">
                    <div style="display: flex; background-color: #375679; border-radius: 0.5vw; margin-bottom: 2vw;">
                        <div
                            style="border-radius: 4vw; font-size: 1vw; background-color: #F6F7FA; padding-left: 0.25vw; padding-right: 0.25vw; margin: 1.2vw 1vw 1.2vw 2.5vw; color: #375679">
                            01
                        </div>
                        <div style="margin-top: 0.8vw; color: #F6F7FA;">
                            Apa itu fungsi?
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-around">
                        <div style="width: 40vw; height: 30vw; background-color: white; border-radius: 0.5vw;">
                            <center>
                                <table style="margin-left: 2vw; margin-right: 2vw;">
                                    <tr>
                                        <td style="margin: 1vw;">
                                            <font
                                                style="border-bottom: 1px solid #3A425A; color: #3A425A;  padding-bottom: 4px;">
                                                Sub Topik NLP</font>
                                        </td>
                                        <td></td>
                                        <td style="padding: 0.8vw;"></td>
                                        <td style="padding-left: 3.8vw;"></td>
                                        <td
                                            style="background-color: #96AA03; border-radius: 0.2vw; padding: 0vw 0.4vw 0.4vw 0.4vw;">
                                            <div style="padding: 0%;">
                                                <img src="./image/coin.png" width="20" height="20">
                                                <font style="font-size: 1vw; color: white;"><?= $koin[0]['koin']; ?></font>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="padding: 0.7vw;"></td>
                                    </tr>
                                    <?php $subtopik = ambilData("SELECT * FROM subtopik WHERE kode_topik = 1"); ?>
                                    <?php foreach ($subtopik as $rowsub) {
                                        if ($rowsub['keterangan'] == 'materi') { ?>
                                            <tr><!--Baris 1 Sub Topik 1-->
                                                <td colspan="2"
                                                    style="background-color: #B4BFCC; color: white; width: 20vw; max-width: 30vw; padding: 0.5vw 1vw 0.5vw 1.5vw; border-radius: 0.5vw;">
                                                    <div style="display: flex;">
                                                        <div>
                                                            <img src="./image/coin.png" width="18" height="18"
                                                                style="margin-right: 5vw;">
                                                        </div>
                                                        <div style="color: white;">
                                                            <?= $rowsub['nama_subtopik']; ?>
                                                        </div>
                                                    </div>
                                                </td><!--Baris 1 Sub Topik 1-->
                                                <td></td>
                                                <td colspan="2"
                                                    style="background-color: #96AA03; color: white;  border-radius: 0.5vw;">
                                                    <form method="post">
                                                        <input type="hidden" name="kode_subtopik" value="<?= $rowsub['kode_subtopik'] ?>">
                                                        <input type="hidden" name="harga" value="<?= $rowsub['harga'] ?>">
                                                        <button type="submit" class="btn"
                                                            style="background-color: #96AA03; color: white;">
                                                            Buka
                                                            <img src="./image/coin.png" width="20" height="20">
                                                            <?= $rowsub['harga']; ?></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="5" style="padding: 0.7vw;"></td>
                                    </tr>
                                    <tr>
                                        <td style="margin: 1vw;">
                                            <font
                                                style="border-bottom: 1px solid #3A425A; color: #3A425A;  padding-bottom: 4px;">
                                                Sub Topik Tambahan</font>
                                        </td>
                                        <td></td>
                                        <td style="padding: 0.8vw;"></td>
                                        <td style="padding-left: 3.8vw;"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="padding: 0.7vw;"></td>
                                    </tr>
                                    <?php foreach ($subtopik as $rowsub) {
                                        if ($rowsub['keterangan'] == 'tambahan') { ?>
                                            <tr><!--Baris 1 Sub Topik 1-->
                                                <td colspan="2"
                                                    style="background-color: #B4BFCC; color: white; width: 20vw; max-width: 30vw; padding: 0.5vw 1vw 0.5vw 1.5vw; border-radius: 0.5vw;">
                                                    <div style="display: flex;">
                                                        <div>
                                                            <img src="./image/coin.png" width="18" height="18"
                                                                style="margin-right: 5vw;">
                                                        </div>
                                                        <div style="color: white;">
                                                            <?= $rowsub['nama_subtopik']; ?>
                                                        </div>
                                                    </div>
                                                </td><!--Baris 1 Sub Topik 1-->
                                                <td></td>
                                                <td colspan="2"
                                                    style="background-color: #96AA03; color: white;  border-radius: 0.5vw;">
                                                    <form method="post">
                                                        <input type="hidden" name="kode_subtopik" value="<?= $rowsub['kode_subtopik'] ?>">
                                                        <input type="hidden" name="harga" value="<?= $rowsub['harga'] ?>">
                                                        <button type="submit" class="btn"
                                                            style="background-color: #96AA03; color: white;">
                                                            Buka
                                                            <img src="./image/coin.png" width="20" height="20">
                                                            <?= $rowsub['harga']; ?></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="padding: 0.5vw;"></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="5" style="padding: 0.3vw;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="padding: 0.5vw;"></td>
                                    </tr>
                                    <tr>
                                        <td style="margin: 1vw;">
                                            <font
                                                style="border-bottom: 1px solid #3A425A; color: #3A425A;  padding-bottom: 4px;">
                                                Latihan Soal</font>
                                        </td>
                                        <td></td>
                                        <td style="padding: 0.8vw;"></td>
                                        <td style="padding-left: 3.8vw;"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="padding: 0.7vw;"></td>
                                    </tr>
                                    <?php foreach ($subtopik as $rowsub) {
                                        if ($rowsub['keterangan'] == 'latihan') { ?>
                                            <tr><!--Baris 1 Sub Topik 1-->
                                                <td colspan="2"
                                                    style="background-color: #B4BFCC; color: white; width: 20vw; max-width: 30vw; padding: 0.5vw 1vw 0.5vw 1.5vw; border-radius: 0.5vw;">
                                                    <div style="display: flex;">
                                                        <div>
                                                            <img src="./image/coin.png" width="18" height="18"
                                                                style="margin-right: 5vw;">
                                                        </div>
                                                        <div style="color: white;">
                                                            <?= $rowsub['nama_subtopik']; ?>
                                                        </div>
                                                    </div>
                                                </td><!--Baris 1 Sub Topik 1-->
                                                <td></td>
                                                <td colspan="2"
                                                    style="background-color: #96AA03; color: white;  border-radius: 0.5vw;">
                                                    <form method="post">
                                                        <input type="hidden" name="kode_subtopik" value="<?= $rowsub['kode_subtopik'] ?>">
                                                        <input type="hidden" name="harga" value="<?= $rowsub['harga'] ?>">
                                                        <button type="submit" class="btn"
                                                            style="background-color: #96AA03; color: white;">
                                                            Buka
                                                            <img src="./image/coin.png" width="20" height="20">
                                                            <?= $rowsub['harga']; ?></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </table>
                            </center>
                        </div>
                        <div style="width: 40vw; height: 30vw; background-color: white; border-radius: 0.5vw;">
                            <div style="margin-top: 1vw; text-align: center;">
                                <video width="250" height="150" style="border-radius: 0.5vw;" controls>
                                    <source src="<?= $topik[0]['video_url']; ?>">
                                </video>
                            </div>
                            <div style="padding-left: 4vw; padding-right: 4vw; padding-top: 1vw; font-size: 1.2vw; color: #1F2844">
                                <?= $topik[0]['rangkuman']; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script type="text/javascript">
        // Mengatur menu hamburger, dropdown, dan close saat diklik
        $(document).ready(function() {
            //jquery for toggle sub menus
            $('.sub-btn').click(function() {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('fa-angle-down fa-angle-up');
            });

            //jquery for expand and collapse the sidebar
            $('.menu-btn').click(function() {
                $('.side-bar').addClass('active');
                $('.menu-btn').css("visibility", "hidden");
            });

            $('.close-btn').click(function() {
                $('.side-bar').removeClass('active');
                $('.menu-btn').css("visibility", "visible");
            });
        });

        // Mengatur warna list dan isi dropdown di Navbar
        const subItems = document.querySelectorAll('.sub-item');

        subItems.forEach(item => {
            item.addEventListener('click', function() {
                subItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');

                // Seleksi elemen sub-btn terdekat
                const parentSubBtn = item.closest('.sub-menu').previousElementSibling;

                // Menghapus kelas 'active' dari semua sub-btn
                document.querySelectorAll('.sub-btn').forEach(btn => btn.classList.remove('active'));

                // Menambahkan kelas 'active' pada sub-btn yang sesuai
                parentSubBtn.classList.add('active');
            });
        });

        // Mengatur tinggi Sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.querySelector('.menu-btn');
            const sidebar = document.querySelector('.side-bar');
            const closeBtn = document.querySelector('.close-btn');
            const navbar = document.querySelector('.navbar');

            // Fungsi untuk mengatur tinggi sidebar sesuai dengan perubahan posisi navbar saat scroll
            function updateSidebarHeight() {
                const navbarBottom = navbar.getBoundingClientRect().bottom; // Posisi bawah navbar
                const sidebarHeight = window.innerHeight - navbarBottom; // Tinggi sidebar yang dibutuhkan

                // Batasi tinggi sidebar hingga maksimal 100vh
                if (sidebarHeight < window.innerHeight) {
                    sidebar.style.top = `${navbarBottom}px`;
                    sidebar.style.height = `${sidebarHeight}px`;
                } else {
                    sidebar.style.top = '0';
                    sidebar.style.height = '100vh';
                }
            }

            // Panggil fungsi saat halaman dimuat, di-scroll, atau diubah ukurannya
            updateSidebarHeight();
            window.addEventListener('scroll', updateSidebarHeight);
            window.addEventListener('resize', updateSidebarHeight);

            menuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('active');
            });

            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('active');
            });
        });

        // Mengatur padding Body
        document.addEventListener('DOMContentLoaded', function() {
            const head = document.querySelector('.head');

            function adjustBodyPadding() {
                const headHeight = head.offsetHeight;
                document.body.style.paddingTop = `${headHeight}px`;
            }

            // Panggil fungsi saat halaman dimuat
            adjustBodyPadding();

            // Panggil lagi jika ukuran jendela berubah
            window.addEventListener('resize', adjustBodyPadding);
        });

        document.getElementById('koin').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = 'price.php';
        });

        document.getElementById('materi').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = 'isi_subtopik2.php';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>