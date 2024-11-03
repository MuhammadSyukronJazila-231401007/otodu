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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: "Poppins";
        }

        body {
            background-color: #E3ECF5;
        }

        .navbar {
            background-color: white;
            padding-inline-start: 1.5vw; /* 15px */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5vw; /* 20px */
            align-items: center;
        }

        .navbar a {
          margin: 0;
          padding: 0.8vw 2vw;
          position: relative;
          color: black;
          align-self: center;
          font-size: 1.2vw; 
          color: #4D62A5;
          cursor: pointer;
          font-family: 'Rethink Sans';
          text-decoration: none;
        }
    
        .navbar a:not(:last-child)::after {
          content: '';
          position: absolute;
          right: 0; 
          top: 0;
          width: 1px;
          height: 100%;
          background-color: #4D62A5;
          transform: translateX(50%); /* Memindahkan garis ke tengah-tengah jarak antara elemen a */
        }
    
        .navbar a:hover {
          background-color: #4D62A5;
          color: white; 
          font-weight: 450;
        }

        .logo img {
          width: 10vw;
          margin-right: 1vw;
        }
    
        .container {
          display: flex;
          align-items: center;
          gap: 0;
        }

        .container-2 {
          display: flex;
          align-items: center;
          gap: 0;
          margin-top: 2vw;
        }
        
        .text-container {
          align-items: center; 
          padding: 1.5vw; 
          border-radius: 0.4vw;
          background-color: #4D62A5;
          opacity: 85%;
          display: inline-flex; 
          justify-content: center;
          max-height: fit-content;
          width: fit-content;
          margin: 0 auto;
        }
      
        #logo {
          margin-left: 1.5vw;
          margin-right: 1vw;
        }

        #trophy {
            margin-right: 1vw;
            margin-left: 4vw;
        }
      
        .text-container h4 {
          color: white;
          font-weight: 500;
          margin-top: 0.6vw;
        }

        #text-logo {
            margin-right: 4vw;
        }

        .dropdown-container {
            display: flex;
            justify-content: center;
            align-items: center; 
            margin-top: 2vw;
        }

        .dropdown {
            display: flex;
            justify-content: space-between;
            align-items: center; 
        }

        .form-select {
            background-color: white; 
            color: black;
            border-radius: 0.5vw;
            border: 1px solid #ccc; 
            padding: 0.5vw 1vw;
            width: 230px; 
        }

        .form-select option {
            background-color: white; 
            color: black; 
        }

        .table-container {
            display: flex; 
            justify-content: center; 
            align-items: center;
            margin-bottom: 1vw;
        }

        .content-table {
            font-family: 'Rethink Sans';   
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px ;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .content-table thead tr {
            background-color: #60B1ED;
            color: #ffffff;
            text-align: center;
            font-weight: 500;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody td {
            text-align: center;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #EAF0FE;
        }

        .content-table tbody tr:nth-of-type(odd) {
            background-color: #F6F7FA;
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

        #nav-main {
          background-color: #4D62A5;
          color: white;
        }

    </style>
    
</head>
<body>
    
    <nav class="navbar">
        <div class="container" style="display: flex; align-items: center; gap: 0;">
            <div class="logo">
                <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 1vw;"> <!-- 130px -->
            </div>
            <a style="margin: 0;" class="nav-menu" id="nav-main" href="dashboard.php">NLP OTODU</a>
            <a style="margin: 0;" class="nav-menu" href="mentor.php">Mentor OTODU</a>
            <a style="margin: 0;" class="nav-menu" href="jasa.php">Desain Web & App</a>
        </div>
    </nav>      

    <div class="container-2">
        <div class="text-container">
            <img src="image/trophy.png" style="width: 3vw;" id="trophy"> 
            <h4>Papan Peringkat</h4>
            <img src="image/logo otodu.png"  style="height: 5vh;" id="logo"> 
            <h4 style="font-family: 'Martian Mono'; font-weight: 600;" id="text-logo">OTODU</h4>
        </div>
    </div>

    <div class="dropdown-container">
        <div class="dropdown">
            <select class="form-select dp1" aria-label="Default select example">
                <option selected>Semua</option>
                <option value="1">SD</option>
                <option value="2">SMP</option>
                <option value="3">SMA</option>
            </select>
            <select class="form-select dp2" aria-label="Default select example">
                <option selected>Semua</option>
                <option value="materi1">Matematika</option>
                <option value="materi2">Bahasa Inggris</option>
                <option value="materi3">Dasar Pemrograman</option>
                <option value="materi4">UTBK</option>
            </select>
        </div>
    </div>
    
    <div class="table-container">
        <table class="content-table">
            <thead>
                <tr>
                    <td ><b>No</b></td>
                    <td ><b>Nama</b></td>
                    <td ><b>Jenjang</b></td>
                    <td ><b>Materi</b></td>
                    <td ><b>Poin</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td class="user">
                        Anugrah
                        <img src="image/medal 1.png" width="25vw" >
                    </td>
                    <td>SMA</td>
                    <td>Dasar Pemrograman</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td class="user">
                        M. Dzakwan
                        <img src="image/medal 2.png" width="25vw">
                    </td>
                    <td>SMP</td>
                    <td>Dasar Pemrograman</td>
                    <td>800</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td class="user">
                        M. Syukron
                        <img src="image/medal 3.png" width="25vw">
                    </td>
                    <td>SD</td>
                    <td>UTBK</td>
                    <td>700</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="user">Timothy</td>
                    <td>SMA</td>
                    <td>Matematika</td>
                    <td>600</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td class="user">Armanda</td>
                    <td>SMP</td>
                    <td>Bahasa Inggris</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Sigma Skibidi</td>
                    <td>SMA</td>
                    <td>UTBK</td>
                    <td>550</td>
                </tr>
            </tbody>
        </table>
    </div>
    

    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;"> <!-- 120px -->
        <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>

        // Menyesuaikan lebar judul halaman dengan dropdown dan tabel
        window.onload = function() {
            // Ambil elemen dengan class text-container
            var textContainer = document.querySelector('.text-container');

            // Dapatkan lebar dari text-container
            var textContainerWidth = textContainer.offsetWidth;

            // Ambil elemen dengan class dropdown-container
            var dropdownContainer = document.querySelector('.dropdown');
            var tableContainer = document.querySelector('.content-table');

            // Terapkan lebar text-container ke dropdown-container
            dropdownContainer.style.width = textContainerWidth + 'px';
            tableContainer.style.width = textContainerWidth + 'px';
        };

    </script>

</body>
</html>
