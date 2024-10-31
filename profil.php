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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
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

        .form-select {
            background-image: url("panah.png");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 2vw 0.8vw;
        }

        .t1 {
            border-collapse: collapse;
        }

        .t1 td {
            padding: 1vw;
        }

        .t2 {
            color: #4D62A5;
            padding: 0;
        }

        .t2 td {
            padding: 2vw 3vw;
        }

        .t3 {
            color: #4D62A5;
            padding: 0;
        }

        .t3 td {
            padding: 2vw 3vw;
            border-bottom: 0.1vw solid;
        }

        .collapse {
            transition: none !important;
        }

        .collapsing {
            transition: none !important;
            display: none;
        }

        footer {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: #1F2844;
            padding: 1.5vw; /* 20px */
            color: white;
            bottom: 0;
            width: 100%;
            text-align: center;
            position: relative; /* Default position */
            padding: 1vw;
            margin-top: 2.8vw
        }

        .logout-btn {
            display: flex;
            align-items: center;
            background-color: #ff4d4d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .logout-btn i {
            margin-right: 8px; /* Jarak antara ikon dan teks */
        }
        
        .logout-btn:hover {
            background-color: #ff3333;
        }

    </style>
</head>

<body style="font-family: 'Rethink Sans', sans-serif;">
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
    <!--
        <div style="display: flex; justify-content: space-between;">
        <div>
        <font style="background-color: #96AA03; color: white; align-items: center; padding: 0.7vw; margin-left: 7vw;">
            <img src="coin.png" width="18" height="18">
            69
        </font>
        </div>
        <div>
            <font style="background-color: #4D62A5; margin-right: 5vw; padding: 0.4vw;">   
                <a href="">
                    <img src="rank.png" width="18" height="18" style="margin-left: 0.7vw;">
                </a>
                <a href="">
                    <img src="mail.png" width="18" height="18" style="margin-left: 1.5vw; margin-right: 1.5vw;">
                </a>
                <a href="">
                    <img src="user.png" width="18" height="18" style="margin-right: 0.7vw;">
                </a>
                </font>
        </div>
    </div>-->

    <br><br>

    <div style="display: flex; justify-content: space-around;" id="elemen-top">
        <div>
            <table class="t1">
                <tr>
                    <td style="border-top: 0.1vw solid; border-bottom: 0.1vw solid;">
                        <a class="btn btn-primary" style="background-color: white; border: 0; color: #4D62A5;"
                            data-bs-toggle="collapse" href="#profil" role="button" aria-expanded="false"
                            aria-controls="profil" onclick="closeOtherCollapses('profil')">
                            <b>Profil</b>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 0.1vw solid; border-bottom: 0.1vw solid; width: 20vw;">
                        <a class="btn btn-primary" style="background-color: white; border: 0; color: #4D62A5;"
                            data-bs-toggle="collapse" href="#riwayat" role="button" aria-expanded="false"
                            aria-controls="riwayat" onclick="closeOtherCollapses('riwayat')">
                            <b>Riwayat Pembelian</b>

                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 0.1vw solid; border-bottom: 0.1vw solid;">
                        <a class="btn btn-primary" style="background-color: white; border: 0; color: #4D62A5;"
                            data-bs-toggle="collapse" href="#terimakasih" role="button" aria-expanded="false"
                            aria-controls="profil" onclick="closeOtherCollapses('terimakasih')">
                            <b>Terimakasih</b>

                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="collapse" id="profil">
            <div class="card card-body" style="border: 0;">
                <div style="box-shadow: 0 0.1vw 0.2vw;">
                    <table class="t2">
                        <tr>
                            <td colspan="2" style="border-bottom: 1px solid; padding: 1.5vw 3vw; width: 50vw;">
                                <b>Akun</b>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15vw;"><b>Email</b></td>
                            <td>adadadadadad@gmail.com</td>
                        </tr>
                        <tr>
                            <td><b>Password</b></td>
                            <td>****************</td>
                        </tr>
                    </table>

                </div><br>
                <div style="box-shadow: 0 0.1vw 0.2vw;">
                    <table class="t2">
                        <tr>
                            <td colspan="2" style="border-bottom: 1px solid; padding: 1.5vw 3vw; width: 50vw;">
                                <b>Informasi
                                    Pengguna</b>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15vw;"><b>Nama</b></td>
                            <td>adadadadadad</td>
                        </tr>
                        <tr>
                            <td><b>No. HP</b></td>
                            <td>0823144141414</td>
                        </tr>
                        <tr>
                            <td><b>Latitude</b></td>
                            <td>0.823144141414</td>
                        </tr>
                        <tr>
                            <td><b>Longitude</b></td>
                            <td>0.823144141414</td>
                        </tr>
                    </table>
                </div>
                <div style="box-shadow: 0 0.1vw 0.2vw; margin-top: 2vw">
                    <table class="t2">
                        <tr>
                            <td style="width: 15vw;"><b>Keluar</b></td>
                            <td>
                                <button id="logoutButton" class="logout-btn">
                                    <i class="fas fa-sign-out-alt"></i> Keluar
                                </button>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <div class="collapse" id="riwayat">
            <div class="card card-body" style="border: 0;">
                <div style="box-shadow: 0 0.1vw 0.2vw;">
                    <table class="t3">
                        <tr>
                            <td colspan="3" style="border-bottom: 1px solid; padding: 1.5vw 3vw;"><b>Koin</b></td>
                        </tr>
                        <tr>
                            <td><img src="image/coin2.png" width="18" height="18"> 20</td>
                            <td>Rp20.000</td>
                            <td style="width: 27vw;">29-10-2024</td>
                        </tr>
                        <tr>
                            <td><img src="image/coin2.png" width="18" height="18"> 10</td>
                            <td>Rp10.000</td>
                            <td>28-10-2024</td>
                        </tr>
                        <tr>
                            <td><img src="image/coin2.png" width="18" height="18"> 5</td>
                            <td>Rp5.000</td>
                            <td>27-10-2024</td>
                        </tr>
                    </table>

                </div><br><br><br>
                <div style="box-shadow: 0 0.1vw 0.2vw;">
                    <table class="t3">
                        <tr>
                            <td colspan="3" style="border-bottom: 1px solid; padding: 1.5vw 3vw;"><b>Subtopik</b></td>
                        </tr>
                        <tr>
                            <td>Apa itu fungsi?</td>
                            <td>28-10-2024</td>
                            <td style="width: 20vw;"><img src="image/coin2.png" width="18" height="18"> 20</td>
                        </tr>
                        <tr>
                            <td>Apa itu fungsi?</td>
                            <td>28-10-2024</td>
                            <td><img src="image/coin2.png" width="18" height="18"> 20</td>

                        </tr>
                        <tr>
                            <td>Apa itu fungsi?</td>
                            <td>28-10-2024</td>
                            <td><img src="image/coin2.png" width="18" height="18"> 20</td>

                        </tr>

                    </table>

                </div>

            </div>
        </div>
        <div class="collapse" id="terimakasih">
            <div class="card card-body" style="border: 0; padding-left: 3vw;">
                <div style="box-shadow: 0 0.1vw 0.2vw; color: #4D62A5;">
                    <div style="border-bottom: 0.1vw solid; padding: 2.5vw 3vw 1vw 3vw;"><b>Terimakasih kepada.....</b>
                    </div>
                    <div style="padding: 2.5vw 3vw 1vw 3vw;">Sumber asset</div>
                    <div style="width: 50vw; padding-left: 3vw;">
                        <div style="display: flex; ">
                            <img src="image/1.png" width="150" height="30">
                            <img src="image/2.png" width="150" height="30">
                            <div style="display: flex; width: 8vw;">
                                <img src="image/3.png" width="30" height="30">
                                <b>
                                    <font style="color: black; font-size: 0.8vw;"> Prosymbols
                                        Premium</font>
                                </b>
                            </div>
                            <img src="image/4.png" width="150" height="30">
                        </div>
                        <div style="display: flex; ">
                            <div style="display: flex; width: 8vw;">
                                <img src="image/5.png" width="30" height="30">
                                <b>
                                    <font style="color: black; font-size: 0.8vw;">Ilham Fitrotul
                                        Hayat</font>
                                </b>
                            </div>

                            <div style="display: flex; width: 8vw;">
                                <img src="image/6.png" width="30" height="30">
                                <b>
                                    <font style="color: black; font-size: 0.8vw;">Mayor Icons</font>
                                </b>
                            </div>


                            <div style="display: flex;">
                                <img src="image/7.png" width="30" height="30">
                                <b>
                                    <font style="color: black; font-size: 0.8vw;">Andrean Prabowo</font>
                                </b>
                            </div>

                            <div style="display: flex; width: 10vw;">
                                <img src="image/8.png" width="30" height="30">
                                <b>
                                    <font style="color: black; font-size: 0.8vw;">Md Tanvirul
                                        Haque</font>
                                </b>
                            </div>
                        </div>



                            <div style="display: flex; ">
                                <div style="display: flex; ">
                                    <div style="display: flex; width: 8vw;">
                                        <img src="image/9.png" width="30" height="30">
                                        <b>
                                            <font style="color: black; font-size: 0.8vw;">mk933</font>
                                        </b>
                                    </div>
                                </div>
                                <div style="display: flex; ">
                                    <div style="display: flex; width: 8vw;">
                                        <img src="image/10.png" width="30" height="30">
                                        <b>
                                            <font style="color: black; font-size: 0.8vw;">Maxim Basinski
                                            </font>
                                        </b>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br><br>

    <footer>
        <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 5vw;"> <!-- 120px -->
        <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const defaultOpenId = 'profil'; // ID yang ingin dibuka pertama kali
            const collapseElement = document.getElementById(defaultOpenId);

            if (collapseElement) {
                const bsCollapse = new bootstrap.Collapse(collapseElement, {
                    show: true
                });
            }

            // Tutup collapse lainnya
            closeOtherCollapses(defaultOpenId);
        });

        function closeOtherCollapses(openId) {
            const collapseIds = ['profil', 'riwayat', 'terimakasih'];

            collapseIds.forEach(id => {
                if (id != openId) {
                    const collapseElement = document.getElementById(id);
                    if (collapseElement) {
                        const bsCollapse = bootstrap.Collapse.getInstance(collapseElement);
                        if (bsCollapse) {
                            bsCollapse.hide();
                        }
                    }
                }
            })

            const collapseElement = document.getElementById(openId);

            if (collapseElement) {
                const bsCollapse = new bootstrap.Collapse(collapseElement, {
                    show: true
                });
            }
        }

        document.getElementById("logoutButton").addEventListener("click", function() {
            // Logika logout, misalnya menghapus sesi dan redirect
            window.location.href = "logout.php";
        });


    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>