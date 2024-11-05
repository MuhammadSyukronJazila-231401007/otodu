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
  <meta charset="utf-8">
  <mta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Isi Subtopik</title>
    <style>
      #nav1 {
        color: #4D62A5;
        border-right: 0.2vw solid #4D62A5;
        margin-right: 4vw;
        padding-right: 4vw;
        margin-left: 4vw;
        font-size: 17px;
      }

      #nav2 {
        color: #4D62A5;
        border-left: 0.2vw solid;
        margin-right: 4vw;
        padding-left: 4vw;
        margin-left: 4vw;
        font-size: 17px;
      }

      #nav-main {
        background-color: #4D62A5;
        color: white;
        font-size: 17px;

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

      .content {
        display: none;
        /* Default sembunyikan semua konten */
        margin-bottom: 2vw;

      }

      .active {
        display: grid;
        place-items: center;
      }

      .active p {
        margin-top: 5vw;
        font-size: 3vw;
        text-align: justify;
      }

      .pagination button {
        margin: 5px;
        cursor: pointer;
      }

      .pagination .nav-button {
        font-size: 20px;
        /* Ukuran font untuk memperbesar */
        font-weight: bold;
        /* Membuat tombol tebal */
      }

      .pagination .active-button {
        background-color: #1EA2F6;
        color: white;
        /* Warna teks tombol aktif */
        border: none;
      }

      .pagination button:not(.active-button) {
        background-color: #5D81AB;
        /* Warna highlight untuk halaman aktif */
        color: white;
        /* Warna teks tombol aktif */
        border: none;
      }

      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
      }

      .question {
        font-size: 1.5em;
        margin-bottom: 10px;
      }

      .answer-slot {
        display: flex;
        margin-top: 10px;
      }

      .answer-slot div,
      .choices div {
        padding: 10px;
        margin: 5px;
        border: 2px solid #6578B2;
        border-radius: 5px;
        cursor: pointer;
      }

      .choices {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
      }

      .content p {
        font-size: 2vw;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="button.css">
</head>

<body>

  <header>
    <nav class="navbar bg-body-tertiary">
      <div class="container" style="max-width: 100%; display:grid; grid-template-columns: 1fr 3fr; gap:5vw;">
        <a class="navbar-brand" href="#" style="margin: 1vw; padding-left: 5vw;">
          <img src="./image/otodu.png" alt="Bootstrap" width="130" height="22">
        </a>
        <p style="color:#4D62A5; font-size:2vw; margin-top:2vw;">Fungsi | 1. Pengantar -> <b><span>Apa Itu Fungsi
              ?</span></b> -> Subbab 1</p>
      </div>
    </nav>
  </header>

  <footer style="background-color:#375679">
    <div style="padding: 1vw 4vw 1vw 4vw; display:flex; justify-content:space-around;  align-items:center;">

      <div data-bs-theme="dark">
        <button type="button" class="btn-close" aria-label="Close"></button>
      </div>

      <div class="pagination" style="display:flex; align-items:center;">
        <button class="nav-button" onclick="prevContent()"
          style="color: #5D81AB; background-color:transparent; font-size:4vw;">&#60;</button>
        <button id="btn-materi1" onclick="showContent('materi1')"
          style="width:8vw; height:1vw; border-radius:5vw;"></button>
        <button id="btn-materi2" onclick="showContent('materi2')"
          style="width:8vw; height:1vw; border-radius:5vw;"></button>
        <button id="btn-materi3" onclick="showContent('materi3')"
          style="width:8vw; height:1vw; border-radius:5vw;"></button>
        <button id="btn-materi4" onclick="showContent('materi4')"
          style="width:8vw; height:1vw; border-radius:5vw;"></button>
        <button id="btn-materi5" onclick="showContent('materi5')"
          style="width:8vw; height:1vw; border-radius:5vw;"></button>
        <button id="btn-materi6" onclick="showContent('materi6')"
          style="width:8vw; height:1vw; border-radius:5vw;"></button>
        <button id="btn-materi7" onclick="showContent('materi7')"
          style="width:8vw; height:1vw; border-radius:5vw;"></button>
        <button id="btn-materi8" onclick="showContent('materi8')"
          style="width:8vw; height:1vw; border-radius:5vw;"></button>
        <button class="nav-button" onclick="nextContent()"
          style="color: #5D81AB; background-color:transparent; font-size:4vw;">&#62;</button>
      </div>

      <i class="bi bi-flag text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"
        style="font-size: 2vw; cursor: pointer;"></i>

      <!-- Modal Bootstrap -->
      <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Petunjuk!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Tidak Ada Yang Namanya Jalan Pintas</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
      </div>


    </div>
  </footer>

  <section id="materi">
    <div class="container">

      <div id="materi1" class="content">
        <img src="image/himpunan.jpg" alt="">
        <p>Dalam Fungsi sudah sepantasnya terdapat 2 himpunan sebagai poin utama pembelajaran ini. Kedua himpunan diatas
          akan selalu berhubungan jika ingin disebut suatu fungsi. Namun, bukan berarti jika semua elemen dari Himpunan
          A yang terhubung ke Himpunan B adalah fungsi. Terdapat aturan-aturan yang akan menentukannya, yang akan
          dipelajari didalam materi sub-topik selanjutnya<br><br>

          Mari Lanjut Ke Halaman Berikutnya!</p>

      </div>
      <div id="materi2" class="content">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412.03325027236093 316.6260402413798"
          width="412.03325027236093" height="316.6260402413798">
          <!-- svg-source:excalidraw -->

          <defs>
            <style class="style-fonts">
              @font-face {
                font-family: Excalifont;
                src: url(data:font/woff2;base64,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);
              }
            </style>

          </defs>
          <rect x="0" y="0" width="412.03325027236093" height="316.6260402413798" fill="#ffffff"></rect>
          <g stroke-linecap="round"
            transform="translate(10 83.09067399319474) rotate(0 85.71428680419922 110.85713195800781)">
            <path
              d="M92.22 -0.68 C102.74 -1.38, 114.73 5.33, 124.44 11.92 C134.15 18.51, 143.54 28.37, 150.51 38.86 C157.47 49.34, 162.89 61.72, 166.24 74.82 C169.58 87.93, 171.29 103.38, 170.56 117.47 C169.83 131.56, 166.62 146.61, 161.86 159.36 C157.11 172.11, 149.97 184.58, 142.01 193.99 C134.04 203.4, 124.44 211.13, 114.08 215.84 C103.72 220.55, 91.02 223.06, 79.84 222.24 C68.66 221.42, 56.91 217.43, 47.01 210.92 C37.11 204.41, 27.39 193.88, 20.43 183.19 C13.46 172.5, 8.6 159.93, 5.23 146.77 C1.86 133.61, -0.48 118.49, 0.2 104.21 C0.87 89.94, 4.4 73.79, 9.28 61.12 C14.15 48.45, 21.19 37.49, 29.45 28.19 C37.71 18.9, 46 9.52, 58.85 5.33 C71.71 1.15, 96.15 1.98, 106.57 3.09 C116.99 4.2, 121.57 10.12, 121.4 11.98 M118.09 9.83 C128.26 13.67, 138.08 23.37, 146.11 33.43 C154.14 43.49, 161.92 56.94, 166.29 70.19 C170.66 83.44, 172.44 98.97, 172.34 112.93 C172.24 126.89, 170.22 141.29, 165.69 153.97 C161.17 166.66, 153.22 178.85, 145.2 189.05 C137.18 199.25, 127.85 209.62, 117.58 215.18 C107.32 220.74, 94.71 222.9, 83.61 222.42 C72.51 221.94, 61.05 217.88, 51 212.3 C40.95 206.71, 30.69 198.86, 23.3 188.91 C15.91 178.97, 10.74 166.04, 6.67 152.64 C2.6 139.23, -0.91 122.56, -1.11 108.46 C-1.31 94.36, 0.93 81.01, 5.49 68.05 C10.04 55.08, 18.16 40.49, 26.21 30.67 C34.26 20.85, 43.49 14.44, 53.77 9.13 C64.04 3.83, 76.92 -1.34, 87.87 -1.17 C98.82 -1, 114.14 8.31, 119.47 10.13 C124.79 11.94, 120.23 8.39, 119.82 9.72"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(230.60467666396255 84.9117763253642) rotate(0 85.71428680419919 110.85713195800781)">
            <path
              d="M88.01 0.4 C98.42 -0.99, 109.89 4.1, 119.82 9.68 C129.75 15.27, 140.02 23.67, 147.6 33.9 C155.17 44.12, 161.45 57.81, 165.26 71.03 C169.07 84.26, 170.67 99.15, 170.47 113.25 C170.26 127.35, 168.25 142.65, 164.04 155.64 C159.83 168.63, 153.14 181.51, 145.22 191.18 C137.29 200.85, 126.65 208.45, 116.5 213.64 C106.35 218.83, 95.17 222.5, 84.32 222.32 C73.47 222.14, 61.6 218.31, 51.39 212.56 C41.18 206.82, 30.69 198.02, 23.04 187.83 C15.4 177.64, 9.3 164.75, 5.54 151.43 C1.77 138.11, 0.15 122.13, 0.46 107.91 C0.77 93.69, 2.99 79.07, 7.39 66.1 C11.79 53.13, 18.83 39.75, 26.84 30.1 C34.85 20.45, 43.74 13.06, 55.44 8.22 C67.15 3.38, 88.55 1.41, 97.09 1.08 C105.63 0.74, 106.8 4.24, 106.68 6.21 M66.86 2.47 C76.84 -2.15, 90.38 -1.56, 100.9 0.97 C111.42 3.5, 120.74 10.18, 129.99 17.66 C139.24 25.13, 149.82 34.35, 156.41 45.82 C163 57.29, 167.21 72.5, 169.52 86.45 C171.82 100.4, 171.95 115.85, 170.24 129.53 C168.54 143.22, 165.32 156.8, 159.3 168.56 C153.27 180.33, 143.41 191.98, 134.09 200.13 C124.77 208.28, 113.79 214.36, 103.39 217.46 C92.98 220.56, 82.01 220.63, 71.66 218.73 C61.32 216.83, 50.79 213.32, 41.31 206.06 C31.82 198.8, 21.2 187.08, 14.75 175.17 C8.31 163.25, 4.74 148.52, 2.66 134.57 C0.58 120.63, 0.71 105.17, 2.26 91.51 C3.8 77.84, 6.12 64.27, 11.93 52.6 C17.74 40.94, 28.03 29.85, 37.12 21.49 C46.21 13.13, 61.62 5.25, 66.48 2.43 C71.34 -0.39, 65.95 2.66, 66.29 4.57"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g transform="translate(82.28953691395276 82.62330317071502) rotate(0 12.791892665431362 105.71820119191523)">
            <text x="0" y="37.25509410003094" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="42.28728047676611px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">a</text><text x="0" y="90.11419469598857"
              font-family="Excalifont, Xiaolai, Segoe UI Emoji" font-size="42.28728047676611px" fill="#1e1e1e"
              text-anchor="start" style="white-space: pre;" direction="ltr" dominant-baseline="alphabetic">b</text><text
              x="0" y="142.97329529194622" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="42.28728047676611px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">c</text><text x="0" y="195.83239588790383"
              font-family="Excalifont, Xiaolai, Segoe UI Emoji" font-size="42.28728047676611px" fill="#1e1e1e"
              text-anchor="start" style="white-space: pre;" direction="ltr" dominant-baseline="alphabetic">d</text>
          </g>
          <g transform="translate(305.96109545518243 79.33252621110097) rotate(0 15.5 105.71820119191526)"><text x="0"
              y="37.25509410003094" font-family="Excalifont, Xiaolai, Segoe UI Emoji" font-size="42.28728047676611px"
              fill="#1e1e1e" text-anchor="start" style="white-space: pre;" direction="ltr"
              dominant-baseline="alphabetic">w</text><text x="0" y="90.11419469598857"
              font-family="Excalifont, Xiaolai, Segoe UI Emoji" font-size="42.28728047676611px" fill="#1e1e1e"
              text-anchor="start" style="white-space: pre;" direction="ltr" dominant-baseline="alphabetic">x</text><text
              x="0" y="142.97329529194622" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="42.28728047676611px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">y</text><text x="0" y="195.83239588790383"
              font-family="Excalifont, Xiaolai, Segoe UI Emoji" font-size="42.28728047676611px" fill="#1e1e1e"
              text-anchor="start" style="white-space: pre;" direction="ltr" dominant-baseline="alphabetic">z</text></g>
          <g stroke-linecap="round">
            <g
              transform="translate(123.55325519543993 117.29219147772659) rotate(0 87.41690459740141 0.3323912102431592)">
              <path
                d="M-0.27 0.92 C28.9 0.76, 144.84 -0.22, 174.2 -0.43 M1.78 0.36 C31.42 0.26, 147.59 0.52, 176.58 0.54"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(123.55325519543993 117.29219147772659) rotate(0 87.41690459740141 0.3323912102431592)">
              <path
                d="M153.07 9.06 C160.02 6.08, 162.11 6.95, 176.58 0.54 M153.07 9.06 C157.24 7.14, 164.05 4.84, 176.58 0.54"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(123.55325519543993 117.29219147772659) rotate(0 87.41690459740141 0.3323912102431592)">
              <path
                d="M153.1 -8.04 C160.12 -7.06, 162.2 -2.23, 176.58 0.54 M153.1 -8.04 C157.22 -6.24, 164.02 -4.82, 176.58 0.54"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(117.57034654505972 161.83165508553412) rotate(0 93.69537445506135 0.6484083196864106)">
              <path
                d="M-1.01 -1.17 C30.12 -0.99, 154.64 0.36, 186.23 0.69 M0.65 0.83 C32.19 1.2, 157.05 1.73, 188.34 1.91"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(117.57034654505972 161.83165508553412) rotate(0 93.69537445506135 0.6484083196864106)">
              <path
                d="M164.8 10.34 C168.85 6.48, 175.76 8.18, 188.34 1.91 M164.8 10.34 C170.18 8.14, 176.43 6.01, 188.34 1.91"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(117.57034654505972 161.83165508553412) rotate(0 93.69537445506135 0.6484083196864106)">
              <path
                d="M164.89 -6.76 C168.86 -6.29, 175.75 -0.25, 188.34 1.91 M164.89 -6.76 C170.09 -4.48, 176.32 -2.13, 188.34 1.91"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g transform="translate(122.22373473246614 215.67775305855866) rotate(0 84.7578148556552 0)">
              <path
                d="M0.52 0.71 C28.61 0.68, 140.82 -0.5, 169.07 -0.71 M-0.66 0.04 C27.18 0.2, 139.53 0.38, 167.89 0.45"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g transform="translate(122.22373473246614 215.67775305855866) rotate(0 84.7578148556552 0)">
              <path
                d="M144.38 8.95 C153.79 5.16, 159.61 3.8, 167.89 0.45 M144.38 8.95 C151.03 6.95, 157.31 3.64, 167.89 0.45"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g transform="translate(122.22373473246614 215.67775305855866) rotate(0 84.7578148556552 0)">
              <path
                d="M144.42 -8.15 C153.74 -5.99, 159.54 -1.39, 167.89 0.45 M144.42 -8.15 C151.07 -5.79, 157.34 -4.73, 167.89 0.45"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(124.88280228521302 267.52964577972034) rotate(0 88.08165151548866 -0.9971558795299416)">
              <path
                d="M-0.83 1.04 C28.36 0.43, 145.95 -2.24, 175.47 -2.82 M0.93 0.53 C30.49 -0.01, 148.71 -1.4, 177.82 -1.71"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(124.88280228521302 267.52964577972034) rotate(0 88.08165151548866 -0.9971558795299416)">
              <path
                d="M154.43 7.11 C163.75 3.23, 168.31 1.72, 177.82 -1.71 M154.43 7.11 C160.99 5.26, 166.79 1.92, 177.82 -1.71"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(124.88280228521302 267.52964577972034) rotate(0 88.08165151548866 -0.9971558795299416)">
              <path
                d="M154.23 -9.99 C163.73 -8.27, 168.36 -4.18, 177.82 -1.71 M154.23 -9.99 C160.83 -7.34, 166.68 -6.19, 177.82 -1.71"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g transform="translate(77.50155023788284 10) rotate(0 20.663285282825115 38.20876862756637)"><text x="0"
              y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji" font-size="61.1340298041062px"
              fill="#1e1e1e" text-anchor="start" style="white-space: pre;" direction="ltr"
              dominant-baseline="alphabetic">A</text></g>
          <g transform="translate(293.10201740148517 14.94418017060218) rotate(0 23.258079528808594 38.20876862756637)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">B</text>
          </g>
        </svg>

        <p>Gambar diatas adalah bentuk dari fungsi karena elemen-elemen didalam himpunan A berhubungan dengan himpunan
          B, atau bahasa matematikanya adalah Himpunan A memetakan Himpunan B</p>
      </div>
      <div id="materi3" class="content">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 770.7709307932781 498.4367386208297"
          width="770.7709307932781" height="498.4367386208297">
          <!-- svg-source:excalidraw -->

          <defs>
            <style class="style-fonts">
              @font-face {
                font-family: Excalifont;
                src: url(data:font/woff2;base64,d09GMgABAAAAABHkAA4AAAAAHvQAABGRAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGhYbh0YcNAZgAIEMEQgKrCigbQs4AAE2AiQDbAQgBYMYByAbDhijoqwyziD7iwObyNQGbxOGMS7CpOFpURoH9KM4hM9/wY3Xct/wdO7fu7vRtYU5aEgamBax7A9BfUg8z3ff7rz5gcWrWNYO0knXRThLNbS0/jen39tndvaZncBJHlCStkNAgYHVJ1rs7a211ZUMoSaGUNsHJRgG2Tq//wH8+2u15ul1j0WSrWIYn2R1hTFV6sG+Xzr9XCbupctOUwgNQuJMqZvW332aSpPUbkEYjMOia1F3cecOF1SiPFYiVZzGCC7z6qZgZjanglHhg37dASAAqAAKAoISgpy7yVTiYbNFYgYQHnq11lPfpbWizvd0tjdWYMBvowbg49QagegwAtSR6g2fg+ikyYBpSKp1/z/IJ2MxcIH/32Dm/0bf3+ONb6fXiY2k6qYe8nvREy79v+kNHNcADzhn7iBnDgVikmZQGDwCIhIyCioGFi4e/psNSIkhCCCNoZ3A0RcCXCRszDPYZozcHRQKOiRoZoI+iRMAJIFzY2AggA4MAEhRvimiKSoMYuwBQDgr9N/zdQCCQnjIVBq5c+yGCALhAWEMkRlBYQyV8WiM4jJGAJwsAb5gt4ZmOA8CU1/xZP5kMspEOMSMTg4AEuJLwzWNX0s6jJ82Li3J4CAI0Kt2/kbD1c7S2QNggVLsNUxK/HeIoc9foWDMmG6jQkwosgA6dskc0jlVqNGsQ6+lTfEpkdIGlqtSp/Un/n/VIbvs27NrJpdJJdaDcAD8/wdhF0Eo7JUChC1AfMtT2EY1BGQzqReBzHAP560JOytealR5YYSkKVXLjab7tLMMQrdERaLB1cOXETLKT7DhWne7MafxG9JmL8E3GHZSPHOCR3m2Syy+vf0/n4i7iZgQryoskqhrieUHVhwfI/4j8s3BPd0v6qXUW7du1bwhWTQpmzktPgrQ+kgZYLMUADBwxB891woD+iGt8T+zvZzpzim9anYgV2ipEIfbv9TXVS4SQeYXa/KoDmg8xRiKh1i+t9iqeUOTDrzauCYsISxlCTk0pQEKbWfbBe0daqcnzrnRemEEylE/v0TqXa6zzy+O79E+1DXPE2RI92xWUd2RQjzoI3gotVlTf0CmkGJIAQwjuPY/npFsc0yisirKqkciK7iu0PTBw47YvEnuVzDA4V6fC5TdH9UWL0i9pWux+1Gb4XRWAcC47WKp6a2uiBeUrQIz/504dCsF4TMM07ZfHdwjPSqHZre0nLCPkOEjEmY2QIj7xXlYxxDeOVNoN76lh5p6k9qkmX/muAq5HF1S3Z5C11eShphHm4t8jC+DEQqCvqOMtw/NzW6adDIyr0Vn9mYMdbBTuyCzAkII0PLRfXVt++EvpxzxIHRGdwHnATr+JNdNmcs8p9IjYp5lZLds+JlCK/YQVxWb/c8nh8/Py7WfFdWimMqHTh5i3+ztNRc3G99r1/Jb0IfQUG0ocP9ccEy2q+OOVtSVi5zSm7X4h/oMfzVj+CGwC6PLbBgQBFO+j5JthYwZTos6xpgZq7OK2w8Q/4tSRg7NaEH3VmH14CVW6MVZNSpJqd35WnQ1foLt2XKRH+U/UPnDD41XHoMwMJYNP7NEkqBEITU1woMCF7xxrqce/JZJuSZEJCKPDvXZE5Ke2awNKSCcYljwpg2MOUfJwzBqPUZI1FGFWPOHyxcDb/jud6sfl3dO75q1/TVBorJm6po7RYVe7F6Uk3hIY23GTTjA4eWW2wqUY1TuCzcKHCJu+Y3TzqdT9f1SvRObUe08s8qn8rF+QTvN8VflaF29mFj+643AWC9e2Xmjmb+SV4zjB6+ptVLpqQ2QMmbnZ7X49Ya/P11x/va9smxeHTQXT9fMz2Z1RvNbmsa69qX5Lx+WFyb6iSObPeci1/KJeDnbX65wxDlgGqfcr9a/dPTGTu/CpK8chd71O5fX+J/8xmZZLefJj1OFlo9yy79bmF7kSTrU47I6Ka9eFVJKAHuAdxRwi0vac5utnhSXi67L8YlPePY9yQa1+KgOEowmMTwFPfRhsjYnoizzqBY/BBW3H65jtxcYHQYf6aY8krnNMhuo0ikJ+jEF/uOrBaGZ41lr+nApMSeeZXHl9K5tVzcvyjg25cC8bVDqtqzn97lF0QqNNrR9IjYH0dic6ItjfSW22aoLuA3GSKkQFv1+BRBvb1dFZJoC/TNcCS5/MVhUj+rpXcZC17aaO6s32kG/j0OHJyRT2jQQYzOy+BSXEHoSxQ9xlGREmKYlkAL/02g1Uo7FALS55VfbSTlB42kz1tSrCtNbYFYJDbdnyK0tKhcLunhEphtQKULb7Rsh4kn76//h5oWu8OhR98hmxXPFSoFvJ193mdYDEUViTkrzUYL4FO07POgbsIHTjzgXuJyU8kpPf/HZP97YP+sL/oaeenm7fNpylaHaoTP9hN2jNf/6xf1W+NjBQ+knt544e+Wb3cxw0dTyM2Jtr6wsEV+iUQVCHsAoZ+m02hkwo7W4KVMMYLjtrozpVyfY2Um/sVlTxiQryRO5JiKDJ97RzlL2qM3rr/hf8u0kQTzAB8VqEdzWl9V+90+7a+LmoFZO4gsRSZC/Tb6yT4shfWLvFWouHppVoMD1/Jv8oYd2zk1/Crf7DyK3F2L3LkibEkH1PxjXJVQqI7Sc/vgq3/6Tn2VEROIhpRXyD83FKYnGkTalaYqrckHljr3Sb4WWxuguSMFmd2i/OKTSZraEFM/OuajnFuf7K/z/Ptk0za1urC9+Wpi/dtiJvImuDW2GZw5fGbXDk7rMF/HWh9aQsZT05S/Pnm2RTQZXqKfu5fjXCIETXPuXiqL5eYrk1s8C7veNhJ6ShYtLj+Q+qhw4mV/iNfGkEbhqadtet9uol9zI0zPhVONI/iwuhfoYr9ldXr6CuVLGcVwpyv7WsejL/ACT4Se3AA6GTc0buXsAoYYh88BDiJQKZ9ER9qQjIxSQAlc9U2mTWDYcMYMz+9Qy/Fd8s1jfdmNruSoQZAf+lBjuqnKb5wEDGDItmxtUIP8Ur/uUWZHuEWhkNh9+UR6rKdM1RI3likfqFGSCNxHHXItksExQ7ISJWJl68XwRwdcqmxPMYrEh04roOQEHL5Ja2EO9FRSsXcDF9eIQbeAHkzScvqmCOMmKBb61qeR5Id08u9qvyJ+IL4YvZwRQOEto9uVvcr74FLpxSLmNr+QSmIfPXpg2Jq0fYIkq+5PQukBw2nrp8Rm743v4ao5zVgAhqx0QfNCBRoGpuLEtR6oLDYqEJEaWyBG9SGoGuyWn0OuaEt6g6b0WJSfI0ok8Y4GBM2X/YwrhmmXkcaSvXBH7BG1d7ZmdPwOfw2/mA6x10iLmUtMOUjwEmwYT6sIW8DGcJQokBoj6vx0d55KHdCPEoCkj/I56Gux1Nsf3IdBiD+a1Uyc4eT2JvE5lv5ntJUr9yTyO7QA7J5Y3njjm9aOY8QjPguKSiJ2yfmN3xcwpntyjNF3a/Xy8/Ly0LXU4MvoKf08eSYmzy7aASk5hANST8+yi8YnPkHTvXb3Cw0OEtG2ZczPxc/ENnFL5BD9zEW9LAsg2/3h8yqW8SS8fp3VJjBIAMQ0flzAJAZtGsttYj+O/HukUDAMUYE6N3sCSTw5agukehcgeAqqwFCGLQF9IvBZy91l1pqMt0fyLIzn2b4bkcjhPfPEfbZFidVA/37v+wTo252NkDpXUiC1DcAkhYjGH9xld4yR3EDcglj3QKOUy2jJ17zEfp3ZbZQLOIXPgBsnyAjItIbfcGGu3/Hw1UkO5rccNwucMj3VYYoyz2BCKKwfimD6mCuCKtCHJ0hWr82XMwEfKGWq4+osyHtpJrybOSDepMxu8+kQzbszb2OJQwT7ozodjBlpA6+Rf+kPTSofHU3AThyMF0MGpVq3vG7wtyY2MPzQnwbNtYkhc8rCir7rohgpwGP9Y56IcV3szJZPnC31Nu/zLpZOsjBQCq2Z2+NmC/PGCZIE032UcPQX7DXB+pSvNR+TBq/g6L0NLhr6QdQP2rbCi3YRgO6adkrOlGasRguVs9anb63/iU2MIpJQhvZOpj+zesSgB7UXAq/jlyWxmERK980OaaEYwcCiodXLPJHm8MyjbTRRv93gdQuA2vHNtbGRYbEdOBC9t3iYRfM/2j5nGW4RYSBkVWuCVdVReWRubmujyqexgS2qcEkvNRfk8bf39U/QVpYlDOINO3DG0KqTcnuEOfmoKpvcxyvJedeHavurI7kj6E+34Fh73jKZqEeB2csxheQ1z4l2TnQL2HuPk71IU3B5MSipiY6nI+FB11IhIKzkkp/p7cpgF4CgqCq5ru8nx91OdWWqMirKtrtzNuiMX67nFnsTOeeiK4XIgCp+b4llD7xKXz7nr/wJ85BGVV/1aBQzDiz0+dcG2ahr1OkUwUgpQjBakVSEJbDQf4dP/+HBw4fpJJRsh+H8eJxyAfY4jOM15zWlaPl9i5XrmLHDL8YVhbFMLmHCo56e7mLx8sJPDcqRNix+p6S3rBSNY2awRLmeXApq7iOAg5BCE7i+Vxy7wGpquBBClQRAJ8qkFK0S3ykxjdapny6ksfBWKN/843O44MgS8ORFTkmdzP7zuUn8TXX8b6fRylkt9d0KEiEcK1df9TSdG/EPrvNnEXgT3ELQemsnjVdvlOCQFX6PIl8HFVjCIIzhxH/ZzoRHIlJNChHLevxffzRMZgEMtZFoAbRdhmg2iJvGGJbTeJ0BvsLREPh/5HMmnTsovDpn7+3GOz86v3LA2Tkz6o5sbptoPEnNh9gH3OUpq1+GM/43L0QF9kTKSOt3YzZqXMk+b+HYKcjcum9KGqEFoorZ4DNiCkF3ZlVVsXYFyvVUgxRMlurCQNE5gcssi415PG2WaOy4JJTENH8RHav3oYdCw+Zosq0l2O16ypHZi3WYPSyY7FT0Eha/E1eAu5luz3/Ybq6n1rVmv854ZZx8Zd0JrXhfX0M/ta0WzSpzgncW3hZspuoVVUJoR6O95bDcrY5KR6OVHgeSGD5vrwNzW5ubbWftYXhbyCiKoFMK0ApJxwIdTHBONMKXDQ2X9S+3/rjFWejsteB5GQoZLCLWR5ZNnhU7fHy3i2azmjPWKb5QExoJ+9N5ggmwK3cjFbZJSBVopDS5ZKFg2Nn9wMRdHEo6zcqkrLf1GkTmK0aCVTxsbEbXs0aUYOmpD+YgR6Eyca4pwzWv3pZviKW6np4R0BsxP0mcKdSHm0ssifMPzAnk6DpGgH9VbjJ1WXtowXOqHrR2/b1wd9v39lsyPOWH6oh4Cq0XSvz/ghl/KV1zerqD0UXKtWYbDN0num0rvPDREcHKoB8OrdlbzlwZ6oc2VCvXtTbpLy9aAQc7vZuYmQaGZEU5O2SD8VxGs+uzYohtq6qrpa8E6uOsPXrqXGl/SJyzJ0SLuD25T8YRI3agXAypc0pDYPr08xUs3Dw/RrpzkAk2UTBo+8BtHqh5kQcWBiFwRGZR2odT7CMl9r73Sze4dfm4dAcVKltAlQX7KcCyGZvn0h50L7reJpykk1KKI8WtjJl++aY6QuJZdE+XX65xkq2CgN+v7QAve7wNaQve3XOw96+GN7D8RKVWYMXpcel8XN2lS79iW4HdIpKLZZWPsOk1YJClWNk5IBgAAACAAICAcVP4rZkR/iTb6AgDgUS9fIwAA9Cx+3ef/0PfBXjURACBCAAAABI5U0i22xLY/xx9qdIqoljKVOThZCiBD5Hii5R9uuomymy4P2dOIlHjKFPKJK1H8+CVMiC+Y4QnwCARnhujQQURyqOIqrMyljifv+ICR54pNY4ZEbgA8IQzBYjx8jiAPCjYkAEC9yyQCce2PIOg2RlC+hkcwcqURnFhy4B29AJh0K+NUr0alJo3aBUhToUoHp+7UKqtUbtUmnXBWiqkFUjGJYpHXe2lWTUa5pIUmhndKmovD+Aw+hPjoYFc3SmeRLKrTUedkKQyxNOslQY1WrHoieGvAJxYN1RnBVEr1oke6oly77tQl0PHr1Ks/3D3WVkJFTBXodFCulUCPUkf8Bwc=);
              }
            </style>

          </defs>
          <rect x="0" y="0" width="770.7709307932781" height="498.4367386208297" fill="#ffffff"></rect>
          <g stroke-linecap="round"
            transform="translate(10.000000000000028 134.06580634124555) rotate(0 151.25411519034145 176.76525808769748)">
            <path
              d="M162.18 -0.53 C176.48 -2.13, 192.34 5.6, 206.13 12.14 C219.92 18.67, 233.46 28.12, 244.92 38.68 C256.38 49.24, 266.58 61.53, 274.89 75.51 C283.2 89.49, 290.29 106.03, 294.78 122.56 C299.27 139.1, 301.65 157.29, 301.85 174.74 C302.06 192.18, 300.02 210.51, 296.02 227.26 C292.01 244, 286.1 260.58, 277.82 275.19 C269.54 289.8, 258.15 303.86, 246.33 314.92 C234.51 325.98, 220.81 335.32, 206.91 341.56 C193.01 347.79, 177.52 350.95, 162.94 352.33 C148.36 353.72, 133.82 353.37, 119.43 349.86 C105.04 346.36, 89.59 340.06, 76.6 331.32 C63.62 322.58, 51.68 310.08, 41.51 297.44 C31.34 284.8, 22.12 271.05, 15.6 255.47 C9.08 239.88, 4.79 221.27, 2.4 203.93 C0 186.58, -0.88 168.52, 1.23 151.38 C3.34 134.24, 8.53 116.7, 15.06 101.06 C21.59 85.42, 30.36 70.49, 40.42 57.55 C50.49 44.61, 62.86 32.34, 75.46 23.4 C88.07 14.46, 98.17 7.28, 116.06 3.91 C133.96 0.54, 168.6 1.43, 182.83 3.19 C197.07 4.94, 201.99 11.35, 201.45 14.43 M197.76 7.77 C211.72 10.52, 226.41 23.59, 238.43 33.89 C250.44 44.2, 260.94 56.19, 269.85 69.61 C278.75 83.03, 286.65 98.19, 291.85 114.42 C297.06 130.65, 299.93 149.5, 301.06 166.99 C302.18 184.49, 302.14 202.82, 298.6 219.39 C295.07 235.97, 287.79 251.5, 279.84 266.44 C271.88 281.37, 261.67 297.36, 250.88 309 C240.08 320.64, 228.32 328.94, 215.06 336.29 C201.8 343.64, 185.92 350.82, 171.32 353.09 C156.73 355.37, 142.12 352.77, 127.48 349.91 C112.84 347.06, 96.79 343.77, 83.49 335.96 C70.19 328.16, 58.27 315.5, 47.69 303.11 C37.12 290.72, 27.59 276.66, 20.05 261.61 C12.51 246.55, 5.78 229.61, 2.47 212.79 C-0.85 195.96, -1.28 178.05, 0.17 160.63 C1.61 143.22, 5.54 124.47, 11.14 108.29 C16.74 92.12, 24.21 76.72, 33.74 63.57 C43.28 50.43, 55.62 38.94, 68.36 29.43 C81.11 19.93, 95.91 11.63, 110.2 6.54 C124.49 1.46, 139.22 -1.26, 154.11 -1.08 C169.01 -0.91, 192.53 5.21, 199.56 7.62 C206.59 10.03, 197.4 10.37, 196.3 13.37"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(456.59162724005546 134.90622244543476) rotate(0 151.2541151903414 176.76525808769748)">
            <path
              d="M111.3 6.55 C124.31 -0.5, 142.35 -1.31, 157.12 -0.64 C171.9 0.03, 186.05 4.67, 199.96 10.56 C213.86 16.46, 228.44 24.44, 240.54 34.74 C252.65 45.05, 263.6 58.4, 272.59 72.41 C281.58 86.42, 289.44 102.4, 294.48 118.79 C299.53 135.19, 302.25 153.6, 302.89 170.78 C303.53 187.97, 302.37 205.14, 298.31 221.9 C294.25 238.67, 286.59 256.5, 278.52 271.36 C270.46 286.22, 260.88 299.85, 249.92 311.07 C238.95 322.28, 226.35 331.77, 212.73 338.66 C199.11 345.56, 183.04 350.52, 168.18 352.45 C153.32 354.38, 138.04 353.29, 123.55 350.23 C109.06 347.16, 94.53 341.95, 81.22 334.05 C67.9 326.15, 54.11 315.37, 43.67 302.83 C33.22 290.28, 25.53 274.27, 18.54 258.79 C11.55 243.3, 4.73 226.67, 1.72 209.9 C-1.29 193.12, -1.36 175.5, 0.48 158.13 C2.32 140.76, 6.76 121.84, 12.77 105.7 C18.78 89.55, 26.79 74.19, 36.54 61.27 C46.28 48.35, 57.05 37.74, 71.24 28.18 C85.43 18.62, 111.49 7.74, 121.7 3.91 C131.9 0.08, 131.91 2.27, 132.49 5.22 M85.96 15.81 C97.93 6.52, 115.07 5.18, 129.97 2.73 C144.87 0.27, 160.75 -1.44, 175.38 1.07 C190.01 3.59, 204.62 10.16, 217.75 17.84 C230.87 25.51, 243.03 35.04, 254.12 47.13 C265.21 59.21, 276.63 75.28, 284.28 90.35 C291.92 105.41, 297.17 120.8, 299.99 137.52 C302.8 154.25, 302.67 173.22, 301.16 190.68 C299.64 208.14, 296.5 225.77, 290.88 242.28 C285.26 258.79, 276.9 276.31, 267.43 289.73 C257.96 303.16, 246.33 313.25, 234.07 322.82 C221.81 332.39, 207.83 342.05, 193.86 347.16 C179.9 352.28, 165.12 354.04, 150.3 353.52 C135.48 353, 119.33 349.23, 104.94 344.06 C90.56 338.88, 76 331.98, 63.99 322.46 C51.99 312.94, 41.74 300.49, 32.9 286.93 C24.06 273.36, 16.27 257.27, 10.94 241.05 C5.62 224.83, 2.11 206.9, 0.96 189.59 C-0.19 172.28, 0.79 154.29, 4.04 137.19 C7.3 120.09, 12.71 102.31, 20.48 87.01 C28.25 71.7, 39.54 56.96, 50.65 45.37 C61.77 33.78, 80.76 21.48, 87.15 17.48 C93.53 13.48, 88.07 18.95, 88.98 21.38"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g
            transform="translate(33.687084429929854 12.027333359370004) rotate(0 128.45428466796875 38.20876862756637)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Laki-Laki</text>
          </g>
          <g transform="translate(455.2757525706219 10) rotate(0 152.74758911132812 38.20876862756637)"><text x="0"
              y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji" font-size="61.1340298041062px"
              fill="#1e1e1e" text-anchor="start" style="white-space: pre;" direction="ltr"
              dominant-baseline="alphabetic">Jodohnya</text></g>
          <g transform="translate(85.34826170547638 194.5420136740447) rotate(0 73.90951612078445 28.041657643810566)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Ahmad</text>
          </g>
          <g
            transform="translate(117.94414157127594 258.1477574425687) rotate(0 40.617360637099566 28.041657643810566)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Rio</text>
          </g>
          <g transform="translate(551.441614723312 314.1157644348875) rotate(0 63.351064635613284 28.041657643810566)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Layla</text>
          </g>
          <g transform="translate(541.2431314402784 372.1729484651055) rotate(0 83.43701214142897 28.041657643810566)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Miyagi</text>
          </g>
          <g transform="translate(556.6809374240876 246.61075730268226) rotate(0 53.87841648716659 28.041657643810566)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Nurul</text>
          </g>
          <g transform="translate(113.6898782485396 320.23025959172367) rotate(0 48.14774325040763 28.041657643810566)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Joni</text>
          </g>
          <g transform="translate(569.9795692671146 187.6871473895908) rotate(0 38.95546347235211 28.041657643810566)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Siti</text>
          </g>
          <g
            transform="translate(105.37374439177333 381.05395273912245) rotate(0 56.026810574731584 28.041657643810566)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Riski</text>
          </g>
          <g stroke-linecap="round">
            <g transform="translate(243.73309226386306 218.8080975829563) rotate(0 144.2136559859941 86.6437870686122)">
              <path
                d="M-0.84 -0.88 C46.96 28.11, 239.53 145.2, 287.87 174.3 M0.92 1.28 C48.42 29.92, 238.64 144.33, 286.63 172.7"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g transform="translate(243.73309226386306 218.8080975829563) rotate(0 144.2136559859941 86.6437870686122)">
              <path
                d="M262.07 168 C270.18 169.07, 282.87 173.14, 286.63 172.7 M262.07 168 C269.84 168.95, 277.9 170.05, 286.63 172.7"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g transform="translate(243.73309226386306 218.8080975829563) rotate(0 144.2136559859941 86.6437870686122)">
              <path
                d="M270.84 153.32 C275.58 160.04, 284.86 169.82, 286.63 172.7 M270.84 153.32 C275.67 159.22, 280.8 165.2, 286.63 172.7"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(226.37943435069923 341.2266186042832) rotate(0 161.00064541011258 -59.68317679973714)">
              <path
                d="M0.84 0.73 C54.64 -19.11, 268.75 -100.29, 322.19 -120.12 M-0.18 0.06 C53.54 -19.54, 267.91 -98.97, 321.34 -118.98"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(226.37943435069923 341.2266186042832) rotate(0 161.00064541011258 -59.68317679973714)">
              <path
                d="M302.3 -102.77 C308.35 -106.58, 310.57 -111.79, 321.34 -118.98 M302.3 -102.77 C308.97 -108.77, 318.09 -116.07, 321.34 -118.98"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(226.37943435069923 341.2266186042832) rotate(0 161.00064541011258 -59.68317679973714)">
              <path
                d="M296.34 -118.8 C303.71 -118.7, 307.39 -119.97, 321.34 -118.98 M296.34 -118.8 C305.31 -118.53, 316.78 -119.5, 321.34 -118.98"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(210.64897998000504 294.0352307834519) rotate(0 163.31923385043763 23.133072004327403)">
              <path
                d="M0.62 0.97 C54.98 8.77, 272.95 37.92, 327.09 45.62 M-0.51 0.43 C53.65 8.49, 271.67 39.35, 326.38 46.83"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(210.64897998000504 294.0352307834519) rotate(0 163.31923385043763 23.133072004327403)">
              <path
                d="M301.93 52.05 C312.86 50.7, 319.42 46.01, 326.38 46.83 M301.93 52.05 C310.62 49.53, 321.26 49.13, 326.38 46.83"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(210.64897998000504 294.0352307834519) rotate(0 163.31923385043763 23.133072004327403)">
              <path
                d="M304.3 35.11 C314.16 40.18, 319.83 41.91, 326.38 46.83 M304.3 35.11 C312.1 38.95, 321.85 44.91, 326.38 46.83"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(228.23011964504371 405.0738281517298) rotate(0 159.1553525450305 -62.92186690027438)">
              <path
                d="M-0.91 0.87 C52.19 -20, 264.49 -104, 317.52 -125.25 M0.81 0.28 C54.38 -20.95, 266.69 -106.06, 319.82 -127.07"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(228.23011964504371 405.0738281517298) rotate(0 159.1553525450305 -62.92186690027438)">
              <path
                d="M301.16 -110.43 C306.54 -115.1, 310 -119.01, 319.82 -127.07 M301.16 -110.43 C306.26 -114.85, 309.96 -118.51, 319.82 -127.07"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(228.23011964504371 405.0738281517298) rotate(0 159.1553525450305 -62.92186690027438)">
              <path
                d="M294.83 -126.31 C301.54 -127.59, 306.33 -128.16, 319.82 -127.07 M294.83 -126.31 C301.35 -127.01, 306.53 -126.97, 319.82 -127.07"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
        </svg>

        <div class="question">Identifikasi Gambar Diatas!</div>

        <!-- Tempat untuk jawaban yang tersusun -->
        <div class="answer-slot" id="answer-slot">
          <div onclick="removeAnswer(this)"></div>
          <div onclick="removeAnswer(this)"></div>
          <div onclick="removeAnswer(this)"></div>
          <div onclick="removeAnswer(this)"></div>
          <div onclick="removeAnswer(this)"></div>
        </div>

        <!-- Pilihan jawaban sebagai puzzle -->
        <div class="choices" id="choices">
          <div onclick="placeAnswer(this)">Laki-Laki</div>
          <div onclick="placeAnswer(this)">Memetakan</div>
          <div onclick="placeAnswer(this)">Jodohnya</div>
          <div onclick="placeAnswer(this)">Himpunan</div>
          <div onclick="placeAnswer(this)">Himpunan</div>
        </div>

        <!-- Tombol untuk mengecek jawaban -->
        <button onclick="checkAnswer()">Cek Jawaban</button>
        <div id="result"></div>
      </div>
      <div id="materi4" class="content">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1932.6751707090611 861.8286435991814"
          width="90vw" height="50vw">
          <!-- svg-source:excalidraw -->

          <defs>
            <style class="style-fonts">
              @font-face {
                font-family: Excalifont;
                src: url(data:font/woff2;base64,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);
              }
            </style>

          </defs>
          <rect x="0" y="0" width="1932.6751707090611" height="861.8286435991814" fill="#ffffff"></rect>
          <g stroke-linecap="round"
            transform="translate(9.999999999999972 196.8308061508029) rotate(0 151.2541151903414 176.76525808769748)">
            <path
              d="M135.82 0.27 C149.43 -3.99, 165.57 0.67, 180.07 4.28 C194.57 7.89, 209.77 13.86, 222.81 21.91 C235.84 29.97, 247.86 40.18, 258.27 52.62 C268.69 65.07, 278.15 80.97, 285.29 96.61 C292.44 112.25, 298.47 129.4, 301.12 146.46 C303.78 163.53, 303.25 181.9, 301.21 199 C299.17 216.09, 294.94 233.32, 288.89 249.02 C282.84 264.73, 274.58 280.06, 264.93 293.23 C255.29 306.4, 243.66 319.01, 231.04 328.03 C218.41 337.04, 203.53 342.95, 189.18 347.31 C174.83 351.68, 159.68 354.99, 144.92 354.21 C130.16 353.42, 114.67 348.53, 100.63 342.62 C86.59 336.71, 72.68 329.12, 60.7 318.76 C48.71 308.4, 37.38 294.51, 28.74 280.47 C20.1 266.42, 13.5 250.96, 8.87 234.48 C4.25 217.99, 1.44 199.04, 1 181.54 C0.55 164.05, 2.32 146.37, 6.2 129.5 C10.09 112.64, 16.43 95.06, 24.29 80.33 C32.15 65.6, 42.16 52.31, 53.36 41.12 C64.56 29.93, 76.3 19.96, 91.5 13.19 C106.69 6.41, 134.58 1.93, 144.51 0.46 C154.44 -1.01, 151 1.44, 151.07 4.38 M172.47 1.21 C186.9 0.89, 204.35 10.26, 217.83 17.7 C231.3 25.15, 242.38 33.93, 253.3 45.87 C264.21 57.82, 275.88 74.22, 283.34 89.36 C290.8 104.5, 294.84 119.77, 298.05 136.73 C301.26 153.7, 303.53 173.93, 302.58 191.16 C301.63 208.4, 297.74 223.97, 292.37 240.16 C287 256.35, 279.58 274.33, 270.37 288.31 C261.16 302.3, 249.55 314.38, 237.1 324.07 C224.65 333.75, 210.08 341.67, 195.65 346.41 C181.23 351.14, 165.39 352.53, 150.55 352.49 C135.7 352.45, 120.9 351.18, 106.6 346.17 C92.29 341.16, 77.03 332.18, 64.72 322.41 C52.4 312.64, 41.97 301.2, 32.7 287.55 C23.43 273.89, 14.53 256.79, 9.08 240.48 C3.63 224.18, 0.98 206.91, 0.01 189.72 C-0.97 172.53, 0.04 153.97, 3.24 137.35 C6.44 120.74, 11.88 104.78, 19.22 90.02 C26.55 75.26, 36.31 60.94, 47.24 48.8 C58.16 36.67, 71 24.82, 84.74 17.23 C98.49 9.63, 114.82 5.55, 129.71 3.23 C144.59 0.91, 167.07 3.05, 174.08 3.3 C181.08 3.55, 172.39 1.91, 171.73 4.72"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(1100.8076894298201 200.8759667218584) rotate(0 151.2541151903414 176.76525808769748)">
            <path
              d="M90.45 14.46 C102.22 5.34, 118.98 1.86, 134.01 0.04 C149.03 -1.78, 165.69 0.21, 180.59 3.55 C195.5 6.89, 210.45 12.05, 223.45 20.08 C236.45 28.12, 248.39 39.22, 258.62 51.75 C268.85 64.29, 278.05 79.63, 284.85 95.28 C291.65 110.93, 296.58 128.54, 299.44 145.65 C302.3 162.76, 303.55 180.7, 302 197.94 C300.45 215.17, 296.3 233.44, 290.15 249.08 C283.99 264.72, 274.93 278.9, 265.08 291.76 C255.23 304.63, 243.43 316.86, 231.03 326.27 C218.62 335.68, 205.11 343.55, 190.65 348.23 C176.2 352.91, 159.2 355.06, 144.3 354.37 C129.41 353.68, 115.16 349.99, 101.28 344.09 C87.41 338.18, 73.19 329.28, 61.05 318.94 C48.9 308.59, 37.11 295.97, 28.41 282.01 C19.7 268.04, 13.6 251.79, 8.79 235.14 C3.99 218.48, 0.13 199.67, -0.44 182.07 C-1.01 164.47, 1.35 146.17, 5.38 129.53 C9.42 112.89, 15.89 96.83, 23.76 82.23 C31.63 67.63, 39.55 53.99, 52.61 41.93 C65.66 29.86, 91.93 15.29, 102.08 9.85 C112.23 4.41, 112.77 6.64, 113.49 9.29 M100.19 9.03 C112.8 0.96, 130.73 0.67, 145.58 0.29 C160.43 -0.09, 175.09 2.15, 189.32 6.76 C203.55 11.37, 218.37 18.95, 230.96 27.97 C243.55 37, 255.25 48, 264.86 60.93 C274.47 73.86, 282.34 89.82, 288.64 105.58 C294.94 121.33, 300.71 138.16, 302.66 155.46 C304.6 172.75, 303.2 192.08, 300.31 209.36 C297.41 226.64, 292.22 243.79, 285.3 259.12 C278.39 274.45, 269.45 288.84, 258.81 301.34 C248.17 313.84, 234.87 325.88, 221.47 334.12 C208.06 342.36, 192.8 347.89, 178.37 350.77 C163.94 353.65, 149.7 353.3, 134.9 351.4 C120.1 349.49, 103.09 345.98, 89.58 339.34 C76.07 332.71, 64.79 323.15, 53.84 311.6 C42.89 300.04, 31.77 284.71, 23.87 270.01 C15.97 255.31, 10.44 239.8, 6.44 223.41 C2.43 207.02, -0.41 188.96, -0.17 171.65 C0.07 154.34, 2.83 136.02, 7.86 119.56 C12.89 103.09, 21.22 87.09, 30.01 72.86 C38.8 58.62, 48.9 44.48, 60.59 34.14 C72.28 23.8, 93.15 14.44, 100.13 10.8 C107.11 7.16, 101.4 9.44, 102.47 12.32"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(456.59162724005546 197.67122225499236) rotate(0 151.2541151903414 176.76525808769748)">
            <path
              d="M109.68 7.46 C122.55 0.51, 139.93 0.46, 154.75 0.71 C169.56 0.95, 184.49 3.32, 198.58 8.91 C212.67 14.51, 226.9 23.92, 239.28 34.28 C251.66 44.63, 263.88 57.23, 272.88 71.05 C281.87 84.88, 288.4 101.03, 293.24 117.21 C298.08 133.38, 301.14 150.92, 301.9 168.12 C302.65 185.32, 301.29 203.46, 297.77 220.4 C294.25 237.34, 288.51 255.02, 280.78 269.75 C273.06 284.47, 262.53 297.25, 251.42 308.76 C240.3 320.27, 227.58 331.64, 214.12 338.8 C200.65 345.96, 185.44 349.6, 170.64 351.73 C155.83 353.86, 140.03 354.52, 125.29 351.58 C110.55 348.64, 95.33 341.99, 82.19 334.08 C69.04 326.17, 56.9 316.3, 46.42 304.12 C35.94 291.95, 26.44 276.42, 19.31 261.03 C12.18 245.64, 6.69 228.93, 3.66 211.77 C0.62 194.61, -0.21 175.45, 1.11 158.06 C2.43 140.67, 5.97 123.4, 11.6 107.41 C17.23 91.43, 25.11 75.31, 34.87 62.15 C44.63 48.99, 55.87 38.08, 70.16 28.45 C84.45 18.82, 110.17 8.28, 120.61 4.4 C131.06 0.51, 132.22 2.36, 132.85 5.15 M158.02 0.4 C172.3 -1.86, 186.47 2.86, 200.51 8.74 C214.55 14.63, 230.29 25.27, 242.26 35.7 C254.23 46.13, 263.63 57.29, 272.34 71.31 C281.05 85.32, 289.46 103.48, 294.51 119.79 C299.56 136.1, 302.06 151.8, 302.66 169.17 C303.26 186.55, 301.91 206.86, 298.1 224.03 C294.3 241.2, 287.91 257.6, 279.82 272.19 C271.73 286.78, 261.05 300.62, 249.56 311.55 C238.06 322.48, 224.45 330.87, 210.85 337.75 C197.24 344.64, 182.8 350.83, 167.94 352.86 C153.07 354.89, 136.27 353.16, 121.64 349.93 C107.01 346.7, 93.29 341.66, 80.16 333.46 C67.02 325.25, 53.36 313.13, 42.85 300.7 C32.34 288.27, 23.88 274.12, 17.09 258.89 C10.3 243.66, 4.97 226.08, 2.12 209.34 C-0.73 192.59, -1.59 175.38, -0.01 158.42 C1.57 141.45, 5.63 123.76, 11.61 107.54 C17.59 91.32, 25.82 74.29, 35.88 61.08 C45.94 47.87, 59.18 37.25, 71.96 28.3 C84.74 19.35, 98.65 12.19, 112.57 7.37 C126.49 2.55, 148.32 -0.1, 155.47 -0.6 C162.63 -1.09, 155.51 1.45, 155.51 4.4"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(1547.3993166698756 201.71638282604783) rotate(0 151.2541151903414 176.76525808769748)">
            <path
              d="M184.95 3.44 C199.25 4.62, 212.99 15.23, 225.9 24.24 C238.82 33.24, 252.31 44.83, 262.45 57.46 C272.6 70.09, 280.46 84.59, 286.76 100.01 C293.05 115.43, 297.82 132.89, 300.24 149.98 C302.65 167.07, 303.18 185.23, 301.22 202.56 C299.26 219.89, 294.91 238.16, 288.49 253.99 C282.07 269.82, 272.83 284.95, 262.71 297.54 C252.59 310.12, 240.89 320.9, 227.77 329.48 C214.65 338.05, 198.73 344.9, 184 348.98 C169.26 353.06, 153.93 355.33, 139.35 353.95 C124.77 352.56, 110.07 347.09, 96.51 340.69 C82.94 334.3, 69.52 326.29, 57.94 315.59 C46.36 304.89, 35.48 291.07, 27.02 276.49 C18.55 261.91, 11.49 244.65, 7.14 228.11 C2.79 211.58, 0.86 194.61, 0.92 177.28 C0.97 159.95, 3.32 140.81, 7.46 124.13 C11.61 107.46, 17.65 91.46, 25.78 77.23 C33.91 63.01, 44.51 49.69, 56.24 38.77 C67.98 27.85, 82.29 17.99, 96.19 11.71 C110.09 5.43, 124.22 1.97, 139.62 1.08 C155.03 0.18, 180.01 4.84, 188.61 6.33 C197.21 7.81, 191.97 7.37, 191.22 9.97 M134.4 1.23 C148.25 -3.3, 165.7 -0.72, 180.59 2.5 C195.47 5.72, 210.46 12.33, 223.7 20.54 C236.93 28.76, 249.76 39.53, 260.01 51.8 C270.26 64.07, 278.54 78.4, 285.18 94.14 C291.82 109.89, 297.35 128.92, 299.86 146.27 C302.36 163.61, 301.95 181.1, 300.23 198.19 C298.5 215.28, 295.33 232.93, 289.5 248.8 C283.67 264.67, 275.05 280.49, 265.24 293.43 C255.42 306.36, 243.06 317.54, 230.62 326.4 C218.18 335.25, 204.87 342.01, 190.58 346.56 C176.3 351.1, 160.14 354.47, 144.91 353.67 C129.68 352.87, 113.21 347.48, 99.23 341.75 C85.25 336.02, 72.62 329.37, 61.01 319.28 C49.4 309.2, 38.56 295.28, 29.57 281.26 C20.58 267.24, 11.89 251.74, 7.07 235.17 C2.25 218.6, 0.74 199.5, 0.66 181.85 C0.59 164.2, 2.62 145.86, 6.62 129.27 C10.61 112.67, 16.7 96.93, 24.63 82.27 C32.57 67.62, 43.13 52.83, 54.22 41.34 C65.31 29.85, 77.51 20, 91.17 13.34 C104.83 6.68, 128.91 2.79, 136.16 1.39 C143.41 0, 134.3 1.94, 134.66 4.97"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g transform="translate(33.68708442992977 74.79233316892748) rotate(0 128.45428466796875 38.20876862756637)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Laki-Laki</text>
          </g>
          <g
            transform="translate(1237.5868393273113 113.10784618849243) rotate(0 20.660263061523438 38.20876862756637)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">A</text>
          </g>
          <g transform="translate(1161.0105930487769 10) rotate(0 103.57637023925781 38.20876862756637)"><text x="0"
              y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji" font-size="61.1340298041062px"
              fill="#1e1e1e" text-anchor="start" style="white-space: pre;" direction="ltr"
              dominant-baseline="alphabetic">Domain</text></g>
          <g transform="translate(1572.504927219529 18.96963848911696) rotate(0 134.07766723632812 38.20876862756637)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Kodomain</text>
          </g>
          <g transform="translate(455.27575257062176 72.76499980955748) rotate(0 139.76239013671875 38.20876862756637)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Jodohnya</text>
          </g>
          <g
            transform="translate(1681.3567001028314 117.68854296425513) rotate(0 23.258079528808594 38.20876862756637)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">B</text>
          </g>
          <g transform="translate(85.34826170547632 257.3070134836022) rotate(0 73.90951612078445 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Ahmad</text>
          </g>
          <g
            transform="translate(1204.8506969442196 251.56992738175848) rotate(0 19.841252840704556 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">a</text>
          </g>
          <g transform="translate(117.94414157127585 320.9127572521262) rotate(0 40.61736063709958 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Rio</text>
          </g>
          <g transform="translate(1208.751831001096 324.9579178231817) rotate(0 40.61736063709952 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">b</text>
          </g>
          <g transform="translate(551.4416147233119 376.880764244445) rotate(0 63.351064635613284 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Layla</text>
          </g>
          <g
            transform="translate(1685.4541397411922 371.80495196848017) rotate(0 15.825749334392071 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">y</text>
          </g>
          <g transform="translate(541.2431314402784 434.937948274663) rotate(0 83.43701214142897 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Miyagi</text>
          </g>
          <g
            transform="translate(1681.0163174404017 434.1825644365912) rotate(0 16.229486554774894 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">z</text>
          </g>
          <g
            transform="translate(556.6809374240875 309.37575711223974) rotate(0 53.878416487166646 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Nurul</text>
          </g>
          <g
            transform="translate(1685.8929564892917 306.22007543197026) rotate(0 18.354455799355037 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">x</text>
          </g>
          <g
            transform="translate(113.68987824853957 382.99525940128103) rotate(0 48.147743250407615 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Joni</text>
          </g>
          <g transform="translate(1204.4975676783597 387.0404199723365) rotate(0 48.14774325040764 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">c</text>
          </g>
          <g transform="translate(569.9795692671146 250.45214719914827) rotate(0 38.95546347235211 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Siti</text>
          </g>
          <g
            transform="translate(1687.1704128461047 246.17511022927476) rotate(0 20.473408517426492 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">w</text>
          </g>
          <g
            transform="translate(105.37374439177324 443.81895254867993) rotate(0 56.02681057473157 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">Riski</text>
          </g>
          <g
            transform="translate(1193.7017226127405 449.64852831898304) rotate(0 20.873865745154035 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">d</text>
          </g>
          <g stroke-linecap="round">
            <g
              transform="translate(243.733092263863 281.57309739251366) rotate(0 144.21365598599414 86.64378706861214)">
              <path
                d="M0.86 0.18 C48.82 29.11, 239.59 145.19, 287.69 174.17 M-0.15 -0.77 C48.21 27.77, 241.78 143.69, 290.01 172.52"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(243.733092263863 281.57309739251366) rotate(0 144.21365598599414 86.64378706861214)">
              <path
                d="M265.46 167.8 C272.94 167.77, 281.27 172.11, 290.01 172.52 M265.46 167.8 C275.21 169.45, 283.53 172.01, 290.01 172.52"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(243.733092263863 281.57309739251366) rotate(0 144.21365598599414 86.64378706861214)">
              <path
                d="M274.24 153.12 C279.23 157.43, 285.01 166.04, 290.01 172.52 M274.24 153.12 C280.7 160.2, 285.8 168.14, 290.01 172.52"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(1265.1426918024529 294.0470696865426) rotate(0 203.39544921676088 87.72390693669104)">
              <path
                d="M-0.93 -0.08 C66.69 28.89, 338.05 145.77, 406.09 174.91 M0.78 -1.17 C68.76 28.47, 340.77 146.68, 408.43 176.17"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1265.1426918024529 294.0470696865426) rotate(0 203.39544921676088 87.72390693669104)">
              <path
                d="M383.48 174.64 C391.64 174.17, 399.16 176.65, 408.43 176.17 M383.48 174.64 C390.17 175.41, 396.57 174.88, 408.43 176.17"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1265.1426918024529 294.0470696865426) rotate(0 203.39544921676088 87.72390693669104)">
              <path
                d="M390.3 158.96 C396.34 163.64, 401.6 171.32, 408.43 176.17 M390.3 158.96 C395.48 163.6, 400.21 166.89, 408.43 176.17"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(226.37943435069917 403.9916184138407) rotate(0 161.00064541011255 -59.68317679973711)">
              <path
                d="M-0.74 0.89 C52.96 -18.9, 269.34 -98.6, 323.04 -118.56 M1.08 0.31 C54.63 -19.83, 269.42 -100.05, 322.64 -120.27"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(226.37943435069917 403.9916184138407) rotate(0 161.00064541011255 -59.68317679973711)">
              <path
                d="M303.67 -103.99 C312.17 -108.18, 319.07 -116.84, 322.64 -120.27 M303.67 -103.99 C310.06 -108.68, 317.33 -114.11, 322.64 -120.27"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(226.37943435069917 403.9916184138407) rotate(0 161.00064541011255 -59.68317679973711)">
              <path
                d="M297.64 -120 C308.41 -118.21, 317.55 -120.92, 322.64 -120.27 M297.64 -120 C306.2 -119.25, 315.52 -119.25, 322.64 -120.27"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(1262.2815767944307 418.75011837042223) rotate(0 209.09392959000718 -68.85956443555506)">
              <path
                d="M-0.08 -0.7 C69.34 -23.42, 348.05 -114.59, 417.65 -137.24 M-1.58 1.54 C67.54 -21.45, 346.76 -115.8, 416.42 -139.1"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1262.2815767944307 418.75011837042223) rotate(0 209.09392959000718 -68.85956443555506)">
              <path
                d="M396.88 -123.51 C403.49 -130.5, 413.12 -136.83, 416.42 -139.1 M396.88 -123.51 C405.08 -128.91, 411.93 -136.9, 416.42 -139.1"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1262.2815767944307 418.75011837042223) rotate(0 209.09392959000718 -68.85956443555506)">
              <path
                d="M391.43 -139.72 C400.05 -140.35, 411.81 -140.34, 416.42 -139.1 M391.43 -139.72 C401.88 -138.73, 410.88 -140.28, 416.42 -139.1"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(210.64897998000498 356.80023059300936) rotate(0 163.3192338504376 23.133072004327346)">
              <path
                d="M1.04 0.8 C55.52 8.44, 271.7 39.16, 326.11 46.74 M0.13 0.18 C54.47 7.38, 270.37 36.96, 324.89 44.87"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(210.64897998000498 356.80023059300936) rotate(0 163.3192338504376 23.133072004327346)">
              <path
                d="M300.44 50.07 C307.57 47.74, 312.86 48.89, 324.89 44.87 M300.44 50.07 C308.72 49.23, 315.04 47.4, 324.89 44.87"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(210.64897998000498 356.80023059300936) rotate(0 163.3192338504376 23.133072004327346)">
              <path
                d="M302.81 33.14 C309.5 34.87, 314.22 40.05, 324.89 44.87 M302.81 33.14 C310.39 37.43, 315.99 40.72, 324.89 44.87"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(1268.6473246094758 350.8021419242617) rotate(0 201.3263240446422 26.621994501019117)">
              <path
                d="M-0.7 -0.54 C66.64 8.24, 335.72 43.51, 403.14 52.57 M1.13 1.8 C68.44 10.73, 335.35 45.42, 402.44 53.76"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1268.6473246094758 350.8021419242617) rotate(0 201.3263240446422 26.621994501019117)">
              <path
                d="M378.06 59.27 C382.59 58.99, 387.79 58.89, 402.44 53.76 M378.06 59.27 C387.5 56.82, 394.27 55.14, 402.44 53.76"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1268.6473246094758 350.8021419242617) rotate(0 201.3263240446422 26.621994501019117)">
              <path
                d="M380.22 42.3 C384.26 45.79, 388.98 49.46, 402.44 53.76 M380.22 42.3 C389 45.84, 395.01 50.12, 402.44 53.76"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(228.23011964504366 467.83882796128717) rotate(0 159.15535254503052 -62.92186690027438)">
              <path
                d="M-0.53 0.48 C52.5 -20.63, 266.06 -104.93, 319.22 -125.82 M1.4 -0.32 C54.26 -21.29, 266.03 -103.21, 318.75 -124.27"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(228.23011964504366 467.83882796128717) rotate(0 159.15535254503052 -62.92186690027438)">
              <path
                d="M300 -107.73 C307.93 -112.53, 314.44 -120.3, 318.75 -124.27 M300 -107.73 C306.89 -113.59, 314.36 -120.28, 318.75 -124.27"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(228.23011964504366 467.83882796128717) rotate(0 159.15535254503052 -62.92186690027438)">
              <path
                d="M293.75 -123.64 C304.21 -122.26, 313.13 -123.87, 318.75 -124.27 M293.75 -123.64 C303.19 -123.44, 313.07 -124.01, 318.75 -124.27"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(1271.4976806813615 471.214465164746) rotate(0 200.0363346007207 -65.57196832294812)">
              <path
                d="M-0.54 0.48 C66.05 -21.06, 332.53 -108.16, 399.4 -129.98 M1.38 -0.31 C68.37 -22.1, 335.28 -109.48, 401.76 -131.5"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1271.4976806813615 471.214465164746) rotate(0 200.0363346007207 -65.57196832294812)">
              <path
                d="M382.12 -116.04 C388.77 -121.6, 395.66 -123.98, 401.76 -131.5 M382.12 -116.04 C388.71 -122.67, 396.01 -127.9, 401.76 -131.5"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1271.4976806813615 471.214465164746) rotate(0 200.0363346007207 -65.57196832294812)">
              <path
                d="M376.77 -132.28 C384.9 -133.06, 393.36 -130.68, 401.76 -131.5 M376.77 -132.28 C385.37 -133.13, 394.59 -132.53, 401.76 -131.5"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round"
            transform="translate(43.33684135805146 690.5429110258309) rotate(0 315.64385567386 78.62028600114752)">
            <path
              d="M32 0 C188.7 1.2, 346.75 0.54, 599.29 0 M32 0 C182.34 -0.92, 333.34 -0.76, 599.29 0 M599.29 0 C619.93 -0.35, 630 12.63, 631.29 32 M599.29 0 C619.06 2.28, 630.15 10.11, 631.29 32 M631.29 32 C633.85 65.22, 631.09 100.57, 631.29 125.24 M631.29 32 C631.42 64.41, 630.17 96.7, 631.29 125.24 M631.29 125.24 C633.25 145.46, 618.72 158.07, 599.29 157.24 M631.29 125.24 C629.5 144.42, 621.42 155.5, 599.29 157.24 M599.29 157.24 C430.54 155.93, 262.34 156.72, 32 157.24 M599.29 157.24 C414.39 156.3, 229.33 156.02, 32 157.24 M32 157.24 C9.1 156.76, -1.11 145.45, 0 125.24 M32 157.24 C12.96 158.42, -1.06 146.27, 0 125.24 M0 125.24 C0.82 104.47, -0.24 81.56, 0 32 M0 125.24 C0.91 105.56, -0.57 85.9, 0 32 M0 32 C-1.06 9.88, 9.37 -1.47, 32 0 M0 32 C1.08 12.12, 8.92 1.57, 32 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(1134.1445307878716 694.5880715968864) rotate(0 315.64385567386 78.62028600114752)">
            <path
              d="M32 0 C168.57 -0.14, 306.44 -0.44, 599.29 0 M32 0 C232.01 0.81, 432.5 1.22, 599.29 0 M599.29 0 C621.66 -1.23, 633.28 11.92, 631.29 32 M599.29 0 C622.32 0.36, 632.26 8.95, 631.29 32 M631.29 32 C630.74 67.51, 631.88 103.63, 631.29 125.24 M631.29 32 C631.13 62.53, 631.47 92.74, 631.29 125.24 M631.29 125.24 C630.84 146.46, 619.09 155.89, 599.29 157.24 M631.29 125.24 C630.8 146.24, 619.32 155.72, 599.29 157.24 M599.29 157.24 C420.05 155.72, 240.5 155.54, 32 157.24 M599.29 157.24 C440.57 156.6, 281.35 156.93, 32 157.24 M32 157.24 C10.93 157.29, 0.55 146.31, 0 125.24 M32 157.24 C9.59 159.11, -1.95 147.16, 0 125.24 M0 125.24 C1.24 96.71, 1.52 66.13, 0 32 M0 125.24 C-0.93 104.68, -1.11 83.13, 0 32 M0 32 C0.82 11.74, 9.83 -0.78, 32 0 M0 32 C-1.4 11.85, 11.31 -1.6, 32 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g transform="translate(76.14295294091448 730.2851243649326) rotate(0 280.7102063001742 29.831670245476516)">
            <text x="0" y="42.050722378023686" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="47.730672392762415px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">f: Laki-Laki -&gt; Jodohnya</text>
          </g>
          <g
            transform="translate(1361.2547581087126 736.6713522291494) rotate(0 280.71020630017426 29.831670245476516)">
            <text x="0" y="42.050722378023686" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="47.730672392762415px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">f: A -&gt; B</text>
          </g>
          <g stroke-linecap="round">
            <g
              transform="translate(801.5158150925837 383.1093787981591) rotate(0 132.74622695549948 1.9676096726486776)">
              <path
                d="M-0.13 -0.56 C44.39 -0.13, 221.81 1.83, 265.99 2.74 M-1.65 1.76 C42.85 2.28, 221.05 3.44, 265.3 3.65"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(801.5158150925837 383.1093787981591) rotate(0 132.74622695549948 1.9676096726486776)">
              <path
                d="M241.75 12.06 C245.69 11.17, 249.5 7.64, 265.3 3.65 M241.75 12.06 C251.28 8.25, 259.96 6.05, 265.3 3.65"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(801.5158150925837 383.1093787981591) rotate(0 132.74622695549948 1.9676096726486776)">
              <path
                d="M241.86 -5.04 C245.79 -2.39, 249.58 -2.38, 265.3 3.65 M241.86 -5.04 C251.51 -2.38, 260.15 1.91, 265.3 3.65"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
        </svg>
        <p>Didalam latihan sebelumnya, kita memahami permasalahan fungsi ini dengan bahasa yang awam, agar memudahkan
          pemahaman dari sudut pandang matematika kedepannya mari kita ubah sudut pandang pembelajaran kita juga.</p>
        <p>Terlihat di gambar sebelah kanan bahwa himpunannya mulai menantang, mari kita pahami satu persatu. (1)
          Lingkup Himpunan kita ubah menjadi Himpunan A dan B, berlaku juga dengan elemen didalamnya. (2) Terdapat kata
          Domain diatas Himpunan A, yang berarti Himpunan A merupakan Himpunan Asal. (3) Terdapat Kata Kodomain diatas
          Himpunan B, yang berarti himpunan B merupakan Himpunan Kawan. (4) Bahasa Akhirnya menjadi Himpunan A memetakan
          Himpunan B</p>
      </div>
      <div id="materi5" class="content">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1830.1314530975797 1124.657463791304"
          width="90vw" height="50vw">
          <!-- svg-source:excalidraw -->

          <defs>
            <style class="style-fonts">
              @font-face {
                font-family: Excalifont;
                src: url(data:font/woff2;base64,d09GMgABAAAAAA3QAA4AAAAAFvgAAA17AAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGhwbglAcgUQGYACBDBEICqA0mBsLLAABNgIkA1QEIAWDGAcgG8QRUZSRVijZzwTT7Rjp2BOVqlfFFaxw3V71u45ozv/Zu+RiBOKIBfMQKuBRxBMgiMdafoMFfwqpU+gPUhOoiMkjeP5YzX+bGCnUGgm2y7uXAdxoCXQgZ3I91KYFX/gOA226m5Xomihy8srtyese//AdviOEtI7EWk+zYjIDJ/0PEH7RqrW0D2QPhH0y9hXpF+qN2f1gZ0I0AVIIitDGAgqVivDM6oHsCxnjUz5C2Rjj8hRnYMLvND0zY7uIeQECYGMEYMbbDgfCM6JMAdCJSJCWiem54LTfZjaB07HZMAqcLioba8AJCQC8PJrPDeYyUVfCAEiUzUCACqA6lN2Ru0AbgrrA5pdx/X9XbUiApesfh1CQkFGxsHHwIHjIZISxwkasK0jEOJBWDGkxBccGIkGEHfBGtKtmb04VmoIMtvsSzKdbEXw1RBYQRkHoCsaO8FUSaXVV6FSGKZZe0cm75aJqRCXwrs36GrAFi0srcWI2Xw7oueiuKkhoFQKnBI4ATuRwiIULEr4SstulEQIDdCpEstWIfbqqIC2DA+yJXGQ94TOiEysAgLTwJGgDYt+xP3KhYpWUCXtBqDXT/LsTyKMJqFkIMK8VPa6mSnjbAB+BJ4RIIWllJ6xSAuiEAgQJMcQwkaLFkzFq/f8vIOSv3hqux5H+xO66a6665KILzjvrtBX/MyFcgS5CKwAfjYEGVwf5rI2YA24gdVzKEHZjVGCxEBNKeDtM4hZWkFsW7DLc3o3H87KPyePLBNycYvGI55Xztfg5/J5uTJ3M+ZGpJGoAzLEF4cevgK8zuTXUeNZok7Y2OzaCWxaiHVl2GdPZgy+5+cxO7SCFDEp5Ebg5N0nU/jchdgphjvIt/A4qbaJQdmfWUgUhijFQOmtdlgz0frLfy+S8rnptyaw3tOiVFxGNQC/wFfQacr1n1KrfdVZKHb15maneWfJGI/1Iaxv+ARyvQgWvrNQQRFQOZDfv/p+XQ/62ED7OzessK7OmSEye6hVJQ5LWpmE2KqEVrnb0Tnbee6A57El3OT/z/BAKV8KW4R9uM8LUXADC+8Nzx598uPxG9apkamgkcmrEX/jaqvQ4EFpfFKN3BqmgFQXFqzBNzcLDGkrj16ullxtYc41/Pj0SmlC9L7mJdN97m8aUwmCmzLIs13xvxwq6UJrb3NzP3gy0qC/uvZs1/F7rbchBtLd/lTxqzI4ZkyavhRDCIC/L7sYcVNJNNKCBOyFPZJud7t62wU/wCjaeFklVIwRLqsc81TvvJarO9MxpPigmswYxMFgwfKO9pt4DBQQU35f8IY1o9UotTXfNpfksc7rZZvah+OYgIb4UvlwpcJOb808OD1TPaj9anBzh3PYSlrBuM9ccDzrxKox5BbdaPYM802ZrqPQ63TiR6fQxTO1gppxdZgM0JF/2Is17ZEhMjxZHSK/ATUCq74Tk91oVbovjjEdBGtAOpM/HAHy0/PYvdUK0SGiqw77oQQ5DFCtUSU0cYg222uXFUr75oKhG60kL4FGp3vqFdvTpw0z11uBRgH2MAUYOop3hiW75bNnL9pfPniXFewbA4ctSib5eVShPc3En3HdOieWc21TVsuoJ9Z5U90HLoZQGUA5y7oMPejP7Incep5vQZ0g7NGBlWGbxV3VVWOSe1h8ifg+Atx95BX8E4d8I0m2QzkB3mCow5IVQQVDBDx8CJTZIHt/uvMi2s2x+eTnnTsBuWffahoknfTA1ySWiehGBZo3gjjgw7RUSGWtU9+LfvEEyim2i6xtlW8Yc9DjApIZslMI47sDpcqJ6Zy+q47abplme6SUFsYEKJfpwfkAXByPxSoiqMKe4ibEmboodC9zkDiXqTfJgPpfa8eu0hPZgodWB+IXt9aJIf5MdfmDPpfte28KyToWk5lSmNpH5oFtkfd0edyZudw+zgW71NUIaWr3hA79EOzDeg0K4yk2+/g4Z9a5KWgXslqZFMUtqQTKMiqE6Di1cmsvJ7DC7zLIcDTrw+bDMNjPVI0SrElEl6oPb3GUJq2VGPizVGxi0CtzEmkWKJCJaA9QLNIxhnEKKlGHpQ/wlX0H4VxwM47vgrYK+y+7mblJOBupAdUuxgvbglTCmOtOTQVL2isIy62PAb5lPlq1VMvC6fq2TdvVg+fJG7mx5FTgVgg6Ol5O9p2F6VJ0qhCXl8P8xM7lG80TyZlDOqu2FPecQAnEhVAxj5hHZtcfJUz/n0dPY4xJ2qjOnSX182GWWODyOl6xRNJabtsUrJ9FkzArFok9rWfvTT7KmHhoz0aYDat8pnwguFSV1Iu+5/7u31HmAImPPctfUazp3KX4Cu3RnmyMQV1Wo9npEqavC5KFznEorcA1buS53BDgNKUbPCH9bzzx8HJPOkwzUD6rvu9rcxIetX9/eSRAlXj6aKMwGx4x4F/vuW/bgxU8+p5PKff5zLekJ26SRnGbqVqj6YM9c7mqf/MGe92Ut5X7F/EHtgcJ7xvZeQYWf9agCHMrcF0iB9rphGj8GETSiWxEaNLqB2jR/y7eO+OCc9Tm67/o+Mn2oqJdyi6IiZTHwQyltJOimTn2dz181LHEz1m9dMAH6J/2Udj9+6zyweM6x3hIvJEA+KEKolkqG7PAJqzTHnNcIo+5uenbos6Hw78rY7YFvrr+VRrbUkHumFrtxH9uJa6ykPjLr8OTeRJ6OmY6ZVRASuJKk1VQJ7mlxHyJBM0FrKfB8oOKlOIqOlkfKzgymUCqV6s7ogRE2ZpNzqvcNl5pkXOuYujo+9N6HuIpnfffe81JsBm2K6FXbR8ZEKh20exnmF8qW+81V1CCNXOkEXV7iKxH/3Z9NMMOUsGh+Fu9Uk7XIiQLoZpi+ZMLSrvv7usSSHQnppeQBO5u8tTprA4YQYhF42BdSA3mgwU9YTmRx3DxzLvMjN3vz9I4p09YsYc3bewljYd2+voLOoCBCEA4xdRkao/jyBUzc5aIqblfGhxuVmo5p4X4xKc5eNPLKNe6G8CKTRMPP+bhPxPCWqr0aY1+7XgxIbE4VF6Kr/TteKV6oApoOreUPV21MYqgiLoJXA7YLD4Oi5aqQDc/lY/KmrLy7kFhNLVk4qbgmSS+M6aCvu/JuAbduwOWJC9640Gc1Of6mb2GYSIZFL+BL88T2N49ZpN5ZFSmUM5xWZSIPUQaWizzVT4rb93Zj6eKWzj7S3Dfc0OKwZ5S6Er3TpYPs3kF0EzMyjZQ0f49R/c7Td8GfRct0x9KX7TEs5nMdJQgp2zDbsW7itYHpzm5L7Hw30lbSUEfS1XaJALJPiQ9znbg+Rx42ohamNy8mQhKjcnPGX3etD1/LqkB1f/JZ98pkl8/Xzrp0ww8jXSSdIewFBg7uI8AnD8kDC2XBy6o+Lpk9hqlSLfmQNfQ6jXkjeYgau5TnKdY8qJsjI7ybdVqMxZhW2ttutLbMmORi1EfmZVxXyZ94/pCdAccBc9OLxhSbcy70qXmoXzFBMIPHsHlAiLfr9UtYS7242RfK8j83DXycG6KUf+OVIAuqrVvL2wGUUzsvNwIhTOs0wxbj9BwY74MYaNljUUQGO4VMzeXOPLaI+ETUCWUNVzbqRaGQ3/7mIb8pKqybA3KyabqCoCjJEo+muvTje2IFtK42fL/tXgbeDYnZGr07/yId51Dv9hyUh5AjsNvSNJQtNjPbirhJ7p9MuYRidEqJ1I3ly5Zxtkfmztpap5CRs5msso5e/9feYj5LbuS1tSThnrRZjqyZkS48Pf5n6pcOrE8tOqh2TBjPT2wqjv6e0EhjJGPXYB295+t4S8AffI68/Y8lhfx/vdxZ1ugNaJTAUdXpMGRDQ585G/tz8ejlXzhkU/i6u28qD3rPz0HNouihZmYmNfn84ZS/uF8uTIsPgg91Zzl/vq+9YzOVTI10+ZdBuZkByaOBrJmjSFVpliyjLLK/8J1Bc7cvRNCioZLq+1gTVsTmVErw+Y1qWZR8ytS/+ZdYbLVQyRmGcCxQschYHCdR8gXJkew2ofZixPdgp297VZb+/xfKnrPomOBQpzzP4UYYyJ/UX30ahtRf4PuMC/Bskc+yeNxytmDhk/awuEMlBVr2HRplBbOmcTDqQD4D1zGb6W/ogq7rC16AR5KtT857tyEeESzjOhcQ2i427Lq1N5Uex+o7SquBHi1o2NiDTMfpuEOt9xoo3szj8+buNRZCCVbzYX02kfMm8uw6rsp6d8NHp+99I2QSJnex/MvtYj9RGfhTAIB7bYEKAID7gy/+/G/M35+k56QoAKDCFij8A6rOcRTH78+l/0E+y89oQZmsAOgNglMv+IcvuKVZwE0rQBA77WMqwDFSwCvawT3+AvdEBakOd8hGTCwEwD6Bkd799y2ywC4tBpc09b/fEAC+K0D8FysIIkmeAE4vgkNZGgCYnE+dCM9uJ8bWWicu0DgniTetkyyeNwj/8wBKrXQqmVQxqlWjUQg1gxGamGrZTJMT0tqgSpsoFC6UyHCMJL23TZ2RKGuNERCH8CejePvhAlbuQ7h4ZaMVciTJxOUXWuwvr0Iecp02BVWdaOSG4N8BASGLiSyGjFmrTRYtynpm5BahdSxlMhuFi1NDDobQaECzTNALheNI//1GBgA=);
              }
            </style>

          </defs>
          <rect x="0" y="0" width="1830.1314530975797" height="1124.657463791304" fill="#ffffff"></rect>
          <g stroke-linecap="round"
            transform="translate(10 97.76812053336607) rotate(0 151.2541151903414 176.76525808769748)">
            <path
              d="M90.2 14.26 C102.08 4.96, 118.23 2.44, 133.01 0.65 C147.79 -1.13, 164.31 0.28, 178.88 3.53 C193.45 6.78, 207.25 12.16, 220.44 20.15 C233.63 28.13, 247.19 39.18, 258.04 51.42 C268.89 63.66, 278.55 78.48, 285.55 93.59 C292.56 108.7, 297.4 125.11, 300.07 142.06 C302.74 159, 303.17 177.83, 301.57 195.26 C299.97 212.69, 296.22 230.74, 290.48 246.63 C284.73 262.51, 276.68 277.27, 267.1 290.57 C257.52 303.87, 245.81 317.12, 232.99 326.43 C220.18 335.74, 204.63 341.92, 190.2 346.42 C175.77 350.92, 161.1 353.7, 146.41 353.43 C131.73 353.15, 116.24 350.38, 102.11 344.77 C87.98 339.17, 73.6 330.04, 61.61 319.81 C49.62 309.58, 38.93 297.49, 30.18 283.41 C21.44 269.32, 14 251.98, 9.16 235.33 C4.31 218.67, 1.78 200.85, 1.11 183.49 C0.44 166.14, 1.62 147.74, 5.14 131.19 C8.66 114.64, 14.3 98.74, 22.22 84.21 C30.15 69.67, 39.81 56.32, 52.71 43.99 C65.61 31.67, 89.95 15.92, 99.61 10.28 C109.27 4.63, 109.86 7.33, 110.68 10.11 M209.57 13.1 C223.52 17.01, 237.21 29.81, 248.93 41.37 C260.64 52.93, 272.02 67.89, 279.88 82.45 C287.73 97.02, 292.49 112.12, 296.04 128.74 C299.59 145.37, 301.57 164.84, 301.16 182.21 C300.74 199.59, 297.99 216.71, 293.57 232.97 C289.15 249.23, 283.23 265.66, 274.62 279.78 C266.02 293.91, 253.77 307.08, 241.93 317.71 C230.09 328.34, 217.37 337.78, 203.58 343.56 C189.78 349.34, 174.12 351.51, 159.18 352.39 C144.24 353.27, 128.54 352.85, 113.96 348.85 C99.38 344.85, 84.56 337.47, 71.7 328.41 C58.83 319.35, 46.52 307.81, 36.75 294.48 C26.98 281.14, 19.15 264.59, 13.06 248.4 C6.97 232.21, 2.13 214.22, 0.22 197.34 C-1.68 180.46, -1.29 164.18, 1.63 147.11 C4.55 130.03, 10.95 110.73, 17.74 94.88 C24.54 79.02, 31.98 64.18, 42.42 51.96 C52.86 39.73, 66.99 29.61, 80.39 21.54 C93.78 13.47, 108.22 7.21, 122.79 3.53 C137.36 -0.15, 153.05 -2.37, 167.82 -0.56 C182.58 1.25, 204.31 11.47, 211.38 14.4 C218.45 17.33, 211.19 14.37, 210.21 17.02"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(530.5061578289844 688.0977490567334) rotate(0 151.2541151903414 176.76525808769748)">
            <path
              d="M82.09 19.47 C93.51 9.21, 110.26 4.48, 124.94 1.64 C139.62 -1.2, 155.24 0, 170.15 2.43 C185.07 4.85, 200.92 9.3, 214.44 16.2 C227.97 23.1, 240.25 32.47, 251.32 43.83 C262.39 55.19, 273.17 69.54, 280.86 84.37 C288.55 99.21, 294.02 115.89, 297.45 132.85 C300.89 149.81, 302.25 168.8, 301.48 186.14 C300.71 203.48, 297.67 220.67, 292.85 236.91 C288.02 253.16, 281.35 269.7, 272.5 283.62 C263.65 297.54, 251.91 310.18, 239.77 320.45 C227.63 330.73, 213.95 339.77, 199.64 345.28 C185.33 350.78, 168.8 353.07, 153.93 353.48 C139.07 353.89, 124.76 352.38, 110.43 347.73 C96.1 343.09, 80.45 335.38, 67.95 325.6 C55.45 315.83, 44.92 302.69, 35.44 289.09 C25.97 275.48, 16.75 259.96, 11.1 243.98 C5.45 228, 2.89 210.2, 1.54 193.18 C0.19 176.17, 0.14 158.63, 3.02 141.9 C5.9 125.16, 11.54 108.24, 18.83 92.77 C26.12 77.31, 35.61 61.53, 46.74 49.09 C57.87 36.64, 78.33 23.02, 85.59 18.11 C92.86 13.19, 89.11 17.05, 90.32 19.61 M80.69 20.47 C91.96 10.29, 109.58 7.07, 123.95 3.88 C138.32 0.69, 152.24 -0.35, 166.9 1.33 C181.56 3.01, 197.91 7.25, 211.9 13.93 C225.89 20.61, 239.52 30.16, 250.85 41.41 C262.18 52.66, 272.35 66.35, 279.89 81.43 C287.43 96.51, 292.24 114.72, 296.08 131.89 C299.92 149.06, 303.12 167.1, 302.92 184.47 C302.72 201.85, 300.07 219.77, 294.87 236.14 C289.68 252.52, 280.73 269, 271.75 282.72 C262.77 296.43, 252.64 308.14, 240.98 318.44 C229.31 328.73, 215.89 338.65, 201.76 344.49 C187.64 350.33, 171.29 353.11, 156.22 353.48 C141.15 353.85, 125.37 351.05, 111.36 346.73 C97.34 342.41, 84.45 336.78, 72.11 327.56 C59.77 318.34, 47.04 304.54, 37.31 291.4 C27.57 278.27, 19.91 264.47, 13.7 248.74 C7.49 233.02, 2.11 214.58, 0.03 197.05 C-2.06 179.52, -1.9 160.57, 1.17 143.57 C4.23 126.58, 11.47 110.57, 18.41 95.08 C25.34 79.58, 32.26 62.91, 42.78 50.6 C53.3 38.29, 75.24 25.91, 81.53 21.21 C87.83 16.51, 79.46 20.07, 80.56 22.42"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(456.59162724005546 98.60853663755552) rotate(0 151.2541151903414 176.76525808769748)">
            <path
              d="M134.6 0.47 C148.34 -4.03, 165.12 0.34, 179.95 3.65 C194.78 6.97, 210.38 12.11, 223.58 20.36 C236.78 28.61, 248.76 40.49, 259.13 53.16 C269.51 65.82, 278.97 80.92, 285.84 96.33 C292.71 111.74, 297.9 128.68, 300.35 145.59 C302.8 162.51, 302.4 180.6, 300.52 197.83 C298.64 215.06, 294.96 232.97, 289.07 248.96 C283.19 264.95, 275.04 280.63, 265.19 293.76 C255.34 306.89, 242.53 318.88, 229.96 327.73 C217.4 336.58, 204.17 342.59, 189.78 346.86 C175.38 351.13, 158.53 353.96, 143.59 353.35 C128.66 352.74, 113.89 349.14, 100.18 343.19 C86.48 337.25, 73.19 328.09, 61.35 317.69 C49.5 307.29, 37.84 294.68, 29.12 280.77 C20.4 266.87, 13.97 250.55, 9.01 234.26 C4.05 217.96, 0.07 200.38, -0.66 182.99 C-1.39 165.59, 0.67 146.89, 4.62 129.9 C8.58 112.91, 14.8 95.59, 23.06 81.04 C31.31 66.5, 42.59 53.8, 54.15 42.64 C65.71 31.48, 78.32 21.07, 92.42 14.08 C106.53 7.09, 130.41 2.48, 138.81 0.72 C147.21 -1.05, 142.6 0.43, 142.81 3.47 M155.94 0.33 C170.19 -1.52, 186.55 5.75, 200.94 11.3 C215.34 16.84, 230.4 23.74, 242.32 33.6 C254.23 43.46, 263.7 56.49, 272.43 70.45 C281.16 84.4, 289.77 100.62, 294.69 117.35 C299.61 134.08, 301.6 153.38, 301.97 170.82 C302.34 188.27, 300.71 205.24, 296.91 222.04 C293.12 238.84, 286.91 256.74, 279.18 271.63 C271.45 286.52, 261.91 300.15, 250.53 311.4 C239.14 322.64, 224.42 332.31, 210.86 339.08 C197.29 345.84, 183.57 350.23, 169.12 351.98 C154.68 353.73, 138.77 352.75, 124.19 349.57 C109.61 346.38, 95.07 340.99, 81.64 332.88 C68.21 324.77, 54.45 313.25, 43.6 300.89 C32.74 288.53, 23.1 273.74, 16.5 258.7 C9.91 243.66, 6.78 227.71, 4.03 210.64 C1.29 193.57, -1.22 173.49, 0.01 156.27 C1.25 139.06, 5.34 122.94, 11.47 107.34 C17.59 91.75, 26.86 75.89, 36.75 62.72 C46.65 49.55, 58.52 37.59, 70.83 28.33 C83.13 19.07, 96.17 11.65, 110.57 7.13 C124.98 2.62, 149.58 1.62, 157.24 1.23 C164.89 0.83, 156.65 2, 156.48 4.75"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(977.0977850690399 688.9381651609228) rotate(0 151.2541151903414 176.76525808769748)">
            <path
              d="M146.08 -0.37 C159.83 -3.74, 175.2 1.05, 189.68 5.75 C204.15 10.45, 220.13 18.56, 232.92 27.82 C245.71 37.09, 257.01 48.19, 266.4 61.33 C275.79 74.46, 283.49 90.74, 289.24 106.65 C295 122.55, 299.29 139.69, 300.92 156.77 C302.56 173.84, 301.7 192.01, 299.03 209.08 C296.36 226.16, 291.88 243.58, 284.92 259.22 C277.95 274.86, 267.83 290.47, 257.25 302.9 C246.66 315.32, 234.47 325.72, 221.43 333.76 C208.39 341.8, 193.43 348.14, 179 351.13 C164.58 354.13, 149.61 353.72, 134.87 351.74 C120.12 349.75, 104.13 346.24, 90.54 339.23 C76.96 332.23, 64.5 321.08, 53.36 309.69 C42.22 298.3, 31.88 285.59, 23.69 270.91 C15.49 256.24, 8.27 238.34, 4.18 221.64 C0.09 204.94, -1.48 187.97, -0.86 170.71 C-0.24 153.44, 2.7 134.54, 7.9 118.05 C13.1 101.56, 21.24 85.59, 30.36 71.77 C39.48 57.96, 50.9 45.5, 62.63 35.15 C74.36 24.81, 86.35 15.53, 100.74 9.72 C115.14 3.91, 140.53 1.23, 148.99 0.31 C157.44 -0.62, 151.52 1.42, 151.47 4.16 M222.18 21.68 C235.8 26.72, 248.71 38.79, 259.25 50.99 C269.78 63.19, 278.75 79.16, 285.41 94.9 C292.07 110.64, 296.73 128.29, 299.21 145.42 C301.68 162.55, 302.04 180.81, 300.28 197.68 C298.51 214.55, 294.2 230.77, 288.61 246.65 C283.01 262.52, 276.03 279.45, 266.71 292.93 C257.39 306.4, 245.28 318.58, 232.69 327.48 C220.11 336.38, 205.59 342.04, 191.2 346.32 C176.81 350.6, 161.47 353.57, 146.35 353.16 C131.23 352.74, 114.54 349.73, 100.49 343.85 C86.44 337.96, 73.91 328.42, 62.07 317.85 C50.22 307.28, 38.49 294.1, 29.4 280.44 C20.31 266.78, 12.24 252.05, 7.52 235.89 C2.81 219.73, 1.63 200.88, 1.11 183.5 C0.6 166.11, 0.54 148.6, 4.44 131.58 C8.34 114.56, 16.38 96.47, 24.5 81.38 C32.63 66.29, 42.17 52.02, 53.19 41.04 C64.21 30.07, 76.9 22.42, 90.61 15.52 C104.31 8.63, 120.8 1.54, 135.44 -0.34 C150.08 -2.21, 163.87 0.98, 178.45 4.28 C193.02 7.57, 216.06 16.06, 222.91 19.42 C229.77 22.78, 221.02 21.41, 219.58 24.45"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g transform="translate(146.77914989749115 10) rotate(0 20.660263061523438 38.208768627566315)"><text x="0"
              y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji" font-size="61.1340298041062px"
              fill="#1e1e1e" text-anchor="start" style="white-space: pre;" direction="ltr"
              dominant-baseline="alphabetic">A</text></g>
          <g transform="translate(667.2853077264756 600.3296285233673) rotate(0 20.660263061523438 38.208768627566315)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">A</text>
          </g>
          <g transform="translate(590.5490106730113 14.58069677576259) rotate(0 23.258079528808594 38.208768627566315)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">B</text>
          </g>
          <g
            transform="translate(1111.0551685019957 604.9103252991299) rotate(0 23.258079528808594 38.208768627566315)">
            <text x="0" y="53.85908025741756" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="61.1340298041062px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">B</text>
          </g>
          <g
            transform="translate(114.0430075143995 148.46208119326639) rotate(0 19.841252840704556 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">1</text>
          </g>
          <g transform="translate(634.549165343384 738.7917097166337) rotate(0 19.841252840704556 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">1</text>
          </g>
          <g
            transform="translate(117.94414157127585 221.85007163468936) rotate(0 40.61736063709958 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">2</text>
          </g>
          <g transform="translate(638.4502994002603 812.1797001580567) rotate(0 40.61736063709958 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">2</text>
          </g>
          <g
            transform="translate(594.6464503113721 268.69710577998785) rotate(0 15.825749334392071 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">●</text>
          </g>
          <g
            transform="translate(1119.7271369352998 873.4038397592708) rotate(0 31.183089770829383 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">12</text>
          </g>
          <g transform="translate(590.2086280105816 331.0747182480991) rotate(0 16.229486554774894 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">●</text>
          </g>
          <g transform="translate(1114.6358130138665 937.0883856668979) rotate(0 26.03203704008331 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">16</text>
          </g>
          <g
            transform="translate(595.0852670594716 203.11222924347794) rotate(0 18.354455799355037 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">●</text>
          </g>
          <g transform="translate(1129.315011273286 800.6304628461307) rotate(0 22.27547424843408 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">8</text>
          </g>
          <g
            transform="translate(113.68987824853957 283.9325737838444) rotate(0 48.147743250407615 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">3</text>
          </g>
          <g transform="translate(634.196036077524 874.2622023072117) rotate(0 48.14774325040764 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">3</text>
          </g>
          <g
            transform="translate(596.3627234162846 143.06726404078245) rotate(0 20.473408517426492 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">●</text>
          </g>
          <g transform="translate(1116.868881245269 733.3968925641498) rotate(0 33.53293610501555 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">4</text>
          </g>
          <g
            transform="translate(102.89403318292034 346.5406821304905) rotate(0 20.873865745154035 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">4</text>
          </g>
          <g transform="translate(623.4001910119048 936.8703106538578) rotate(0 20.873865745154035 28.041657643810595)">
            <text x="0" y="39.527520614715385" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="44.86665223009692px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">4</text>
          </g>
          <g stroke-linecap="round">
            <g
              transform="translate(174.33500237263274 190.49583679704938) rotate(0 196.91689180702315 -6.392951747496909)">
              <path
                d="M0.38 1.15 C66.05 -1, 328.76 -10.03, 394.15 -12.37 M-0.87 0.7 C64.66 -1.85, 327.38 -12.21, 393.38 -14.27"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(174.33500237263274 190.49583679704938) rotate(0 196.91689180702315 -6.392951747496909)">
              <path
                d="M370.2 -4.88 C379.28 -7.33, 385.26 -12.59, 393.38 -14.27 M370.2 -4.88 C377.06 -7.02, 383 -9.85, 393.38 -14.27"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(174.33500237263274 190.49583679704938) rotate(0 196.91689180702315 -6.392951747496909)">
              <path
                d="M369.59 -21.97 C378.92 -19.12, 385.1 -19.07, 393.38 -14.27 M369.59 -21.97 C376.57 -19.12, 382.69 -16.96, 393.38 -14.27"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(694.8411602016172 780.8254653204167) rotate(0 196.91689180702315 -6.392951747496909)">
              <path
                d="M0.41 -0.42 C65.71 -2.6, 327.51 -10.26, 392.94 -12.41 M-0.83 -1.68 C64.73 -4.3, 329.13 -12.56, 395.19 -14.34"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(694.8411602016172 780.8254653204167) rotate(0 196.91689180702315 -6.392951747496909)">
              <path
                d="M371.96 -5.1 C380.48 -10.35, 391.06 -13.87, 395.19 -14.34 M371.96 -5.1 C377.93 -7.62, 382.93 -8.62, 395.19 -14.34"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(694.8411602016172 780.8254653204167) rotate(0 196.91689180702315 -6.392951747496909)">
              <path
                d="M371.45 -22.19 C380.27 -20.63, 391.06 -17.33, 395.19 -14.34 M371.45 -22.19 C377.41 -20.41, 382.54 -17.11, 395.19 -14.34"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(167.05864133860996 248.00567586519037) rotate(0 208.4344402004682 -6.3929517474966815)">
              <path
                d="M-0.18 0.97 C69.28 -1.37, 346.28 -10.76, 415.83 -12.89 M-1.74 0.44 C68.17 -1.2, 348.3 -9.06, 418 -11.41"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(167.05864133860996 248.00567586519037) rotate(0 208.4344402004682 -6.3929517474966815)">
              <path
                d="M394.78 -2.15 C401.48 -5.9, 404.85 -5.79, 418 -11.41 M394.78 -2.15 C403.03 -5.08, 412.17 -9.54, 418 -11.41"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(167.05864133860996 248.00567586519037) rotate(0 208.4344402004682 -6.3929517474966815)">
              <path
                d="M394.26 -19.24 C401.24 -19.19, 404.73 -15.28, 418 -11.41 M394.26 -19.24 C402.8 -15.67, 412.14 -13.62, 418 -11.41"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(687.5647991675944 838.3353043885577) rotate(0 215.2962333928832 -3.029775177548572)">
              <path
                d="M-0.42 -0.89 C71.29 -2.1, 359.23 -5.83, 430.96 -6.85 M1.56 1.26 C73.09 0.15, 358.98 -4.49, 430.21 -5.73"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(687.5647991675944 838.3353043885577) rotate(0 215.2962333928832 -3.029775177548572)">
              <path
                d="M406.87 3.21 C413.71 0.71, 422.23 -4.08, 430.21 -5.73 M406.87 3.21 C411.7 0.44, 418.18 -1.03, 430.21 -5.73"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(687.5647991675944 838.3353043885577) rotate(0 215.2962333928832 -3.029775177548572)">
              <path
                d="M406.58 -13.89 C413.58 -10.27, 422.2 -8.94, 430.21 -5.73 M406.58 -13.89 C411.33 -12.89, 417.88 -10.59, 430.21 -5.73"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(158.34282702950236 315.5931871692833) rotate(0 209.87408569482955 -5.673052112605546)">
              <path
                d="M-0.1 0.26 C69.85 -1.35, 350.61 -8.65, 420.72 -10.69 M-1.62 -0.65 C68.18 -2.51, 349.98 -10.74, 420.28 -12.47"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(158.34282702950236 315.5931871692833) rotate(0 209.87408569482955 -5.673052112605546)">
              <path
                d="M397.03 -3.28 C406.4 -5.15, 415.91 -8.93, 420.28 -12.47 M397.03 -3.28 C402.49 -6.26, 407.99 -7.47, 420.28 -12.47"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(158.34282702950236 315.5931871692833) rotate(0 209.87408569482955 -5.673052112605546)">
              <path
                d="M396.56 -20.38 C405.97 -15.73, 415.66 -13, 420.28 -12.47 M396.56 -20.38 C402.27 -19.15, 407.88 -16.17, 420.28 -12.47"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(678.8489848584868 905.9228156926506) rotate(0 209.87408569482955 -5.673052112605546)">
              <path
                d="M-0.89 0.37 C68.87 -1.55, 349.01 -9.81, 418.96 -11.93 M0.84 -0.48 C70.95 -2.21, 351.19 -8.85, 421.25 -10.7"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(678.8489848584868 905.9228156926506) rotate(0 209.87408569482955 -5.673052112605546)">
              <path
                d="M397.98 -1.57 C406.41 -5.77, 412.61 -9.09, 421.25 -10.7 M397.98 -1.57 C402.26 -2.52, 407.83 -4.88, 421.25 -10.7"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(678.8489848584868 905.9228156926506) rotate(0 209.87408569482955 -5.673052112605546)">
              <path
                d="M397.55 -18.66 C406.07 -17.14, 412.4 -14.75, 421.25 -10.7 M397.55 -18.66 C401.93 -15.89, 407.6 -14.52, 421.25 -10.7"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(146.74749106853983 373.10302623742473) rotate(0 210.59394688586565 -1.3540387418106548)">
              <path
                d="M0.65 0.8 C70.7 0.34, 350.5 -1.19, 420.54 -1.81 M-0.46 0.18 C69.96 -0.7, 352.84 -3.14, 422.91 -3.46"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(146.74749106853983 373.10302623742473) rotate(0 210.59394688586565 -1.3540387418106548)">
              <path
                d="M399.47 5.25 C408.28 1.23, 415.98 -0.99, 422.91 -3.46 M399.47 5.25 C406.41 3.11, 412.14 0.06, 422.91 -3.46"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(146.74749106853983 373.10302623742473) rotate(0 210.59394688586565 -1.3540387418106548)">
              <path
                d="M399.36 -11.85 C408.34 -10.36, 416.08 -7.08, 422.91 -3.46 M399.36 -11.85 C406.19 -9.18, 411.95 -7.41, 422.91 -3.46"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(667.2536488975243 963.4326547607925) rotate(0 210.59394688586565 -1.3540387418108821)">
              <path
                d="M0.37 -0.79 C70.54 -1.25, 350.63 -3.35, 420.61 -3.66 M-0.89 1.41 C69.72 1.14, 352.43 -2.17, 423.01 -2.62"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(667.2536488975243 963.4326547607925) rotate(0 210.59394688586565 -1.3540387418108821)">
              <path
                d="M399.6 6.14 C404.55 2.78, 410.49 -0.22, 423.01 -2.62 M399.6 6.14 C407.72 3.37, 414.5 0.85, 423.01 -2.62"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(667.2536488975243 963.4326547607925) rotate(0 210.59394688586565 -1.3540387418108821)">
              <path
                d="M399.44 -10.96 C404.31 -9.79, 410.29 -8.25, 423.01 -2.62 M399.44 -10.96 C407.54 -8.51, 414.37 -5.82, 423.01 -2.62"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round"
            transform="translate(1406.110815948779 162.38858186216112) rotate(0 205.83966412559914 78.62028600114763)">
            <path
              d="M32 0 C125.05 1.11, 218.1 -1.19, 379.68 0 M32 0 C152.74 -0.34, 272.42 -0.89, 379.68 0 M379.68 0 C400.98 -0.71, 412.88 9.85, 411.68 32 M379.68 0 C399.73 -1.58, 412.77 11.3, 411.68 32 M411.68 32 C413.79 70.25, 413.23 103.41, 411.68 125.24 M411.68 32 C410.5 66.91, 411.13 100.69, 411.68 125.24 M411.68 125.24 C410.17 145.38, 402.81 157.69, 379.68 157.24 M411.68 125.24 C411.18 148.7, 400.34 156.72, 379.68 157.24 M379.68 157.24 C241.69 156.6, 106.69 157.45, 32 157.24 M379.68 157.24 C250.31 155.35, 121.24 155.68, 32 157.24 M32 157.24 C11.73 155.73, -1.31 146.72, 0 125.24 M32 157.24 C10.49 156.22, 2.25 148.27, 0 125.24 M0 125.24 C-2.05 89.37, -0.05 53.89, 0 32 M0 125.24 C0.03 88.69, -1.14 50.76, 0 32 M0 32 C1.17 8.93, 10.54 -1.53, 32 0 M0 32 C1.85 12.46, 10.38 -1.16, 32 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(1276.8221802673052 728.7565312527486) rotate(0 77.34191465410925 26.581958159928945)">
            <path
              d="M13.29 0 C53.63 -0.44, 90.1 -0.31, 141.39 0 M13.29 0 C54.85 -0.52, 95.62 0.3, 141.39 0 M141.39 0 C150.11 -0.77, 154.34 3.25, 154.68 13.29 M141.39 0 C151.55 -2.2, 154.14 5.68, 154.68 13.29 M154.68 13.29 C154.7 21, 156.52 25.9, 154.68 39.87 M154.68 13.29 C154.45 23.35, 154.72 31.32, 154.68 39.87 M154.68 39.87 C156.23 48.21, 151.82 52.87, 141.39 53.16 M154.68 39.87 C153.03 50.28, 148.89 53.99, 141.39 53.16 M141.39 53.16 C106.46 51.94, 68.12 51.72, 13.29 53.16 M141.39 53.16 C114.61 53.17, 87.08 52.8, 13.29 53.16 M13.29 53.16 C6.12 54.75, 1.78 46.78, 0 39.87 M13.29 53.16 C2.47 53.06, -1.46 48.31, 0 39.87 M0 39.87 C0.29 30.04, 0.08 23.93, 0 13.29 M0 39.87 C0.6 30.23, 1 20.77, 0 13.29 M0 13.29 C-0.85 4.85, 2.45 -1.37, 13.29 0 M0 13.29 C0.41 3.4, 5.51 -1.93, 13.29 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(1293.061235492541 797.8359343956417) rotate(0 80.78366000957203 26.581958159928945)">
            <path
              d="M13.29 0 C46.85 -1.85, 82.32 -2.58, 148.28 0 M13.29 0 C55.23 -0.45, 98.88 1, 148.28 0 M148.28 0 C156.72 -1.86, 162.18 4.38, 161.57 13.29 M148.28 0 C157.81 1.83, 162.27 5.74, 161.57 13.29 M161.57 13.29 C162.21 21.62, 162.34 28.95, 161.57 39.87 M161.57 13.29 C161.36 22.71, 161.66 32.43, 161.57 39.87 M161.57 39.87 C160.87 47.43, 156.64 53.06, 148.28 53.16 M161.57 39.87 C160.1 49.48, 155.83 53.11, 148.28 53.16 M148.28 53.16 C106.85 54.68, 63.93 52.84, 13.29 53.16 M148.28 53.16 C112.02 54.5, 76.31 53.43, 13.29 53.16 M13.29 53.16 C5.31 51.19, 1.28 47.15, 0 39.87 M13.29 53.16 C5.07 51.89, 1.42 50.48, 0 39.87 M0 39.87 C-0.22 32.9, -0.92 24.57, 0 13.29 M0 39.87 C-0.46 34.63, -1.07 28.69, 0 13.29 M0 13.29 C1.65 5.57, 6.16 -1.71, 13.29 0 M0 13.29 C-1.26 4.73, 4.68 -1.98, 13.29 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(1290.2981766963278 868.1495343539868) rotate(0 80.68761033297608 26.581958159928945)">
            <path
              d="M13.29 0 C40.93 0.26, 72.84 2.94, 148.08 0 M13.29 0 C58.2 -0.11, 101.8 -0.15, 148.08 0 M148.08 0 C156.32 0.87, 162.42 4.79, 161.38 13.29 M148.08 0 C156.68 0.55, 159.71 3.51, 161.38 13.29 M161.38 13.29 C162.76 22.54, 160.23 33.05, 161.38 39.87 M161.38 13.29 C160.62 22.48, 160.97 30.28, 161.38 39.87 M161.38 39.87 C161.56 50.41, 157.17 51.19, 148.08 53.16 M161.38 39.87 C162.94 49.36, 158.7 55.01, 148.08 53.16 M148.08 53.16 C98.97 50.69, 47.87 54.31, 13.29 53.16 M148.08 53.16 C119.83 53.13, 92.33 52.9, 13.29 53.16 M13.29 53.16 C4.28 52, -0.5 47.14, 0 39.87 M13.29 53.16 C3.4 52.37, 1.88 48.96, 0 39.87 M0 39.87 C2.05 31.97, 2.15 24.77, 0 13.29 M0 39.87 C0.3 34.73, -0.27 27.44, 0 13.29 M0 13.29 C1.17 3.72, 5.9 -0.51, 13.29 0 M0 13.29 C-1.46 4.95, 3.44 -1.21, 13.29 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(1273.472225269891 943.4813059745984) rotate(0 80.97945981377086 26.581958159928945)">
            <path
              d="M13.29 0 C59.49 -0.39, 106.25 0.6, 148.67 0 M13.29 0 C51.11 -1.84, 89.14 -0.77, 148.67 0 M148.67 0 C158.96 -0.15, 161.88 4.72, 161.96 13.29 M148.67 0 C156.11 1.43, 161.15 4.45, 161.96 13.29 M161.96 13.29 C161.59 23.79, 161.27 33.87, 161.96 39.87 M161.96 13.29 C162.79 20.5, 161.18 30.3, 161.96 39.87 M161.96 39.87 C160.9 48.22, 157.48 54.36, 148.67 53.16 M161.96 39.87 C164.03 46.89, 156.35 53.8, 148.67 53.16 M148.67 53.16 C111.59 51.7, 76.9 53.86, 13.29 53.16 M148.67 53.16 C115.14 53.11, 79.8 53.57, 13.29 53.16 M13.29 53.16 C4.35 53.36, 1.18 50.41, 0 39.87 M13.29 53.16 C3.65 51.47, 0.12 48.97, 0 39.87 M0 39.87 C-0.42 30.01, 0.57 20.19, 0 13.29 M0 39.87 C0.73 33.97, -1.16 27.98, 0 13.29 M0 13.29 C1.69 5.75, 5.38 -0.12, 13.29 0 M0 13.29 C0.05 5.79, 2.33 -1.64, 13.29 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g
            transform="translate(889.9570823811023 217.23678638727552) rotate(0 192.40964508328693 29.831670245476516)">
            <text x="0" y="42.050722378023686" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="47.730672392762415px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">f: x -&gt; 2x + 2x</text>
          </g>
          <g
            transform="translate(1435.3121629310058 204.47186249442393) rotate(0 192.40964508328693 29.831670245476516)">
            <text x="0" y="42.050722378023686" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="47.730672392762415px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">f(x) = 2x + 2x</text>
          </g>
          <g transform="translate(1286.6953189084415 742.9851236669638) rotate(0 76.28700431896948 10.086254459752126)">
            <text x="0" y="14.217584286466444" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="16.138007135603228px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">f(x) = 2(1) + 2(1)</text>
          </g>
          <g transform="translate(1302.9343741336775 812.0645268098569) rotate(0 76.28700431896948 10.086254459752126)">
            <text x="0" y="14.217584286466444" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="16.138007135603228px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">f(x) = 2(2) + 2(2)</text>
          </g>
          <g transform="translate(1302.0418827298445 885.1839487198199) rotate(0 76.28700431896948 10.086254459752126)">
            <text x="0" y="14.217584286466444" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="16.138007135603228px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">f(x) = 2(3) + 2(3)</text>
          </g>
          <g transform="translate(1283.345363911027 957.7098983888136) rotate(0 76.28700431896948 10.086254459752126)">
            <text x="0" y="14.217584286466444" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="16.138007135603228px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">f(x) = 2(4) + 2(4)</text>
          </g>
          <g stroke-linecap="round">
            <g
              transform="translate(1275.7763725476761 246.62029067489084) rotate(0 63.01121005723985 0.000023140768007579027)">
              <path d="M-0.14 0.68 C20.7 0.75, 104.68 0.02, 125.81 -0.05 M-1.67 0 C18.92 0.3, 103.43 1.17, 124.75 1.45"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1275.7763725476761 246.62029067489084) rotate(0 63.01121005723985 0.000023140768007579027)">
              <path
                d="M101.16 9.73 C110.97 6.37, 118.37 4.77, 124.75 1.45 M101.16 9.73 C108.94 5.94, 115.53 3.38, 124.75 1.45"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1275.7763725476761 246.62029067489084) rotate(0 63.01121005723985 0.000023140768007579027)">
              <path
                d="M101.36 -7.37 C111.03 -4.47, 118.36 0.19, 124.75 1.45 M101.36 -7.37 C109.03 -5.67, 115.56 -2.74, 124.75 1.45"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round"
            transform="translate(312.0157441165866 407.3829882477603) rotate(0 61.30164902582749 58.47242351008822)">
            <path
              d="M29.24 0 C50.26 2.38, 71.18 2.17, 93.37 0 M29.24 0 C51.49 0.42, 71.86 -0.93, 93.37 0 M93.37 0 C112.62 -1.7, 121.98 11.25, 122.6 29.24 M93.37 0 C113.1 1.21, 124.61 12.01, 122.6 29.24 M122.6 29.24 C122.71 48.34, 122.8 67.71, 122.6 87.71 M122.6 29.24 C121.92 49.25, 122.46 70.33, 122.6 87.71 M122.6 87.71 C121.39 105.84, 114.31 118.26, 93.37 116.94 M122.6 87.71 C124.36 107.46, 113.37 116.68, 93.37 116.94 M93.37 116.94 C77.22 119.31, 61.5 115.55, 29.24 116.94 M93.37 116.94 C70.77 115.99, 50.43 116.76, 29.24 116.94 M29.24 116.94 C9.5 118.93, 1.44 106.48, 0 87.71 M29.24 116.94 C10.37 118.47, -1.68 106.94, 0 87.71 M0 87.71 C0.95 74.96, 0.12 60.17, 0 29.24 M0 87.71 C-0.91 74.89, 0.66 61.71, 0 29.24 M0 29.24 C-1.6 10.63, 11.59 -0.01, 29.24 0 M0 29.24 C2.18 9.29, 7.68 -1.68, 29.24 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(832.521901945571 997.7126167711276) rotate(0 61.30164902582749 58.47242351008822)">
            <path
              d="M29.24 0 C42.75 -1.17, 56.57 0.52, 93.37 0 M29.24 0 C45.69 -0.02, 62.58 0.03, 93.37 0 M93.37 0 C114.43 -1.3, 122.59 10.87, 122.6 29.24 M93.37 0 C115.04 -2.01, 124.05 10.52, 122.6 29.24 M122.6 29.24 C123.91 40.13, 122.11 55.03, 122.6 87.71 M122.6 29.24 C122.41 47.84, 123.83 66.94, 122.6 87.71 M122.6 87.71 C123.83 108.44, 112.94 115, 93.37 116.94 M122.6 87.71 C124.85 108.12, 113.26 116.78, 93.37 116.94 M93.37 116.94 C70.25 116.9, 45.5 117.89, 29.24 116.94 M93.37 116.94 C78.59 117.18, 65.8 117.33, 29.24 116.94 M29.24 116.94 C10.81 118.53, -1.74 108.73, 0 87.71 M29.24 116.94 C9.39 116.28, 0.6 108.65, 0 87.71 M0 87.71 C-1.14 75.11, 1.33 60.15, 0 29.24 M0 87.71 C-1.02 73.55, -1.35 58.65, 0 29.24 M0 29.24 C1.28 10.72, 7.88 -1.76, 29.24 0 M0 29.24 C1.7 10.71, 7.78 -1.97, 29.24 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g stroke-linecap="round"
            transform="translate(1252.9314250197249 305.55456555845694) rotate(0 61.30164902582749 58.47242351008822)">
            <path
              d="M29.24 0 C46.59 -0.94, 68.44 -0.84, 93.37 0 M29.24 0 C43.71 -0.21, 56.14 -0.67, 93.37 0 M93.37 0 C110.86 1.71, 122.76 9.98, 122.6 29.24 M93.37 0 C114.33 -1.19, 124.05 9.24, 122.6 29.24 M122.6 29.24 C122.06 45.96, 120.79 57.44, 122.6 87.71 M122.6 29.24 C122.44 46.23, 122.55 63.85, 122.6 87.71 M122.6 87.71 C122.77 108.22, 111.34 116.76, 93.37 116.94 M122.6 87.71 C121 106.32, 114.37 116.65, 93.37 116.94 M93.37 116.94 C80.41 115.97, 67.98 115.46, 29.24 116.94 M93.37 116.94 C77.24 116.96, 60.46 117.85, 29.24 116.94 M29.24 116.94 C8.58 117.25, -0.56 109.12, 0 87.71 M29.24 116.94 C11.84 114.66, -0.55 109.46, 0 87.71 M0 87.71 C1.41 69.94, -0.63 48.58, 0 29.24 M0 87.71 C-0.94 68.89, -0.8 49.19, 0 29.24 M0 29.24 C-1.11 10.76, 11.2 0.62, 29.24 0 M0 29.24 C1.76 11.32, 11.2 -0.34, 29.24 0"
              stroke="#1e1e1e" stroke-width="2" fill="none"></path>
          </g>
          <g transform="translate(351.7586459500626 417.522744940954) rotate(0 21.939422021241057 48.56781570513408)">
            <text x="0" y="68.46119301795684" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="77.70850512821436px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">1</text>
          </g>
          <g transform="translate(872.264803779047 1007.8523734643213) rotate(0 21.939422021241057 48.56781570513408)">
            <text x="0" y="68.46119301795684" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="77.70850512821436px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">3</text>
          </g>
          <g transform="translate(1292.674326853201 315.69432225165065) rotate(0 21.939422021241057 48.56781570513408)">
            <text x="0" y="68.46119301795684" font-family="Excalifont, Xiaolai, Segoe UI Emoji"
              font-size="77.70850512821436px" fill="#1e1e1e" text-anchor="start" style="white-space: pre;"
              direction="ltr" dominant-baseline="alphabetic">2</text>
          </g>
          <g stroke-linecap="round">
            <g
              transform="translate(1276.5483034786332 754.3934317124535) rotate(0 -57.32495737386296 0.05491257111657433)">
              <path
                d="M0.11 -0.21 C-19.1 -0.54, -96.36 -1.09, -115.55 -0.86 M-1.29 -1.37 C-20.1 -1.06, -94.19 0.05, -113.31 0.17"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1276.5483034786332 754.3934317124535) rotate(0 -57.32495737386296 0.05491257111657433)">
              <path
                d="M-89.92 -8.64 C-96.62 -7.7, -104.3 -4.4, -113.31 0.17 M-89.92 -8.64 C-99.66 -5.1, -108.73 -2.21, -113.31 0.17"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1276.5483034786332 754.3934317124535) rotate(0 -57.32495737386296 0.05491257111657433)">
              <path
                d="M-89.72 8.46 C-96.63 4.7, -104.37 3.3, -113.31 0.17 M-89.72 8.46 C-99.44 5.36, -108.58 1.61, -113.31 0.17"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(1291.7576639549757 824.5072562171545) rotate(0 -63.57620833134774 1.0048825704097908)">
              <path
                d="M-0.86 0.24 C-21.81 0.82, -105.08 2.47, -126.15 2.67 M0.89 -0.67 C-20.1 -0.38, -105.07 0.37, -126.58 0.89"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1291.7576639549757 824.5072562171545) rotate(0 -63.57620833134774 1.0048825704097908)">
              <path
                d="M-103.22 -8.02 C-109.01 -4.18, -114.46 -3.76, -126.58 0.89 M-103.22 -8.02 C-109.31 -6.55, -115.9 -4.74, -126.58 0.89"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1291.7576639549757 824.5072562171545) rotate(0 -63.57620833134774 1.0048825704097908)">
              <path
                d="M-102.96 9.08 C-108.71 8.42, -114.23 4.34, -126.58 0.89 M-102.96 9.08 C-109.23 6.24, -115.89 3.75, -126.58 0.89"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(1291.073047887924 897.1947438139923) rotate(0 -59.47592465943012 0.027903286324772125)">
              <path
                d="M-0.16 -0.58 C-20.01 -0.87, -98.27 -1.09, -118.13 -1.09 M-1.7 1.73 C-21.73 1.48, -98.89 0.07, -118.64 -0.16"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1291.073047887924 897.1947438139923) rotate(0 -59.47592465943012 0.027903286324772125)">
              <path
                d="M-95.02 -8.35 C-104.99 -3.87, -114.99 -2.65, -118.64 -0.16 M-95.02 -8.35 C-101.31 -7.04, -105.77 -4.69, -118.64 -0.16"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1291.073047887924 897.1947438139923) rotate(0 -59.47592465943012 0.027903286324772125)">
              <path
                d="M-95.28 8.75 C-105.25 6.68, -115.15 1.35, -118.64 -0.16 M-95.28 8.75 C-101.34 5.88, -105.73 4.03, -118.64 -0.16"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
          <g stroke-linecap="round">
            <g
              transform="translate(1271.4706016845503 969.1840260455538) rotate(0 -50.95451264444114 -3.000109369899974)">
              <path
                d="M-0.32 -0.66 C-17.64 -1.66, -86.08 -6.2, -103.09 -7.18 M1.71 1.61 C-15.34 0.81, -83.48 -5.07, -101 -6.26"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1271.4706016845503 969.1840260455538) rotate(0 -50.95451264444114 -3.000109369899974)">
              <path
                d="M-76.92 -12.97 C-86.96 -12.53, -96.71 -8.93, -101 -6.26 M-76.92 -12.97 C-82.58 -11.75, -88.34 -9.36, -101 -6.26"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
            <g
              transform="translate(1271.4706016845503 969.1840260455538) rotate(0 -50.95451264444114 -3.000109369899974)">
              <path
                d="M-78.24 4.08 C-87.64 -1.76, -96.89 -4.45, -101 -6.26 M-78.24 4.08 C-83.72 0.97, -89.15 -0.97, -101 -6.26"
                stroke="#1e1e1e" stroke-width="2" fill="none"></path>
            </g>
          </g>
          <mask></mask>
        </svg>
        <p>Untuk dapat memahami dasar materi ini, terdapat beberapa langkah yang perlu dilakukan.
          <br>
          (1) Pembuatan Himpunan A dan Himpunan B sekaligus elemen didalam Himpunan A (Domain)
          <br>
          (2) Pembuatan rumus fungsi yang akan digunakan untuk mendapatkan elemen Himpunan B(Kodomain), Dengan catatan
          rumus fungsi yang disebelah kanan adalah bentuk yang umum digunakan
          <br>
          (3) Untuk mendapatkan elemen untuk Himpunan B, kita dapat menggunakan rumus yang ada dan mengganti variabel
          x-nya dengan elemen dari Himpunan A
        </p>
      </div>
      <div id="materi6" class="content">
        <h2>Materi 6</h2>
        <p>Ini adalah konten untuk Materi 6.</p>
      </div>
      <div id="materi7" class="content">
        <h2>Materi 7</h2>
        <p>Ini adalah konten untuk Materi 7.</p>
      </div>
      <div id="materi8" class="content">
        <h2>Materi 8</h2>
        <p>Ini adalah konten untuk Materi 8.</p>
      </div>

    </div>
  </section>

  <footer
    style="background-color:#1F2844; width: 100%; padding: 4vw; text-align: center; display:grid; grid-template-columns: 3fr 1fr; gap:5vw;">
    <div id="petunjuk" style="margin-top:1vw; text-align: center; display:flex; gap:1vw; justify-content: center;">
      <i class="bi bi-info-circle-fill text-white"></i>
      <p class="text-light" id="deskripsiPetunjuk">Isi Kotak Kosong Dengan Memilih dan Mengetik Saran Jawaban</p>
    </div>
    <button onclick="nextContent()" type="button" class="btn text-light" id="lanjut-btn"
      style="height:fit-content; width:10vw; background-color:#1EA2F6;">Cek</button>
  </footer>

  <script>
    const akhir = {
      1: {
        deskripsiPetunjuk: "Tetap Semangat Tetap Otodidak",
        teksAkhir: "Lanjut",
        cek: false,
      },
      2: {
        deskripsiPetunjuk: "Otodidak Adalah Jalan Ninjaku",
        teksAkhir: "Lanjut",
        cek: false,
      },
      3: {
        deskripsiPetunjuk: "Isi Kotak Kosong Dengan Memilih dan Mengetik Saran Jawaban",
        teksAkhir: "Cek",
        cek: false,
      },
      4: {
        deskripsiPetunjuk: "Pengalaman Adalah Guru Terbaik",
        teksAkhir: "Lanjut",
        cek: false,
      },
      5: {
        deskripsiPetunjuk: "Self-education is, I firmly believe, the only kind of education there is. – Isaac Asimov",
        teksAkhir: "Lanjut",
        cek: false,
      },
      6: {
        deskripsiPetunjuk: "Fokuslah Dalam Memilih Jawaban, Anda Tidak Dikejar Setan",
        teksAkhir: "Cek",
        cek: false,
      },
      7: {
        deskripsiPetunjuk: "Self-education is a lifelong journey. Keep learning, keep growing.",
        teksAkhir: "Lanjut",
        cek: false,
      },
      8: {
        deskripsiPetunjuk: "Kesuksesanmu Ditentukan Oleh Usahamu Dan Kekuatan Dari Dalam",
        teksAkhir: "Selesai",
        cek: false
      }
    };

    let currentContentIndex = 1;
    const totalContents = 8;
    const deskAkhir = document.querySelector("#deskripsiPetunjuk");
    const tombolAkhir = document.querySelector("#lanjut-btn");

    function showContent(id) {
      // Sembunyikan semua konten terlebih dahulu
      var contents = document.querySelectorAll('.content');
      contents.forEach(content => content.classList.remove('active'));

      // Tampilkan konten yang dipilih
      document.getElementById(id).classList.add('active');

      // Update index saat pengguna memilih langsung
      currentContentIndex = parseInt(id.replace('materi', ''));

      updateHighlight();
    }

    function prevContent() {
      if (currentContentIndex > 1) {
        currentContentIndex--;
        showContent(`materi${currentContentIndex}`);
      }
    }

    function nextContent() {
      if (currentContentIndex < totalContents) {
        currentContentIndex++;
        showContent(`materi${currentContentIndex}`);
      } else {
        alert("Selamat Anda Telah Menyelesaikan Sub-Topik Ini")
      }
    }

    function updateHighlight() {
      // Hapus highlight dari semua tombol
      for (let i = 1; i <= totalContents; i++) {
        document.getElementById(`btn-materi${i}`).classList.remove('active-button');
      }
      // Tambahkan highlight pada tombol aktif
      document.getElementById(`btn-materi${currentContentIndex}`).classList.add('active-button');
      deskAkhir.innerText = akhir[currentContentIndex].deskripsiPetunjuk;
      tombolAkhir.innerText = akhir[currentContentIndex].teksAkhir;
    }

    // Tampilkan materi 1 secara default dan berikan highlight pada tombolnya
    showContent('materi1');

    function updatePage() {
      const deskripsi = akhir[currentContentIndex].deskripsiPetunjuk;
      const buttonText = akhir[currentContentIndex].teksAkhir;
      const cek = akhir[currentPage].cek;

      document.getElementById('deskripsiPetunjuk').innerText = deskripsi;
      const btn = document.getElementById('lanjut-btn');
      btn.innerText = buttonText;
      btn.disabled = cek;
    }

    // function nextPage() {
    //   if (currentContentIndex < 8) {
    //     updatePage();
    //   } else {
    //     alert('Anda telah menyelesaikan kuis ini!');
    //   }
    // }

    function placeAnswer(element) {
      // Cari slot kosong dalam answer-slot
      const emptySlot = document.querySelector('#answer-slot div:empty');
      if (emptySlot) {
        // Isi slot kosong dengan jawaban yang dipilih
        emptySlot.innerText = element.innerText;
        emptySlot.dataset.value = element.innerText;
        element.style.display = 'none';  // Sembunyikan pilihan dari area pilihan
      }
    }

    function removeAnswer(slot) {
      // Hanya jalankan jika slot berisi jawaban
      if (slot.dataset.value) {
        // Cari elemen di choices yang teksnya sama dengan slot yang dihapus
        const choice = Array.from(document.querySelectorAll('#choices div'))
          .find(el => el.innerText === slot.dataset.value && el.style.display === 'none');
        if (choice) {
          choice.style.display = 'block'; // Tampilkan kembali pilihan di area pilihan
        }
        // Hapus jawaban dari slot
        slot.innerText = '';
        slot.removeAttribute('data-value');
      }
    }

    function checkAnswer() {
      // Ambil semua jawaban yang sudah diisi
      const answer = Array.from(document.querySelectorAll('#answer-slot div'))
        .map(div => div.dataset.value || '')
        .join(' ');
      const correctAnswer = 'Himpunan Laki-Laki Memetakan Himpunan Jodohnya';

      document.getElementById('result').innerText =
        answer === correctAnswer ? "Benar!" : "Salah, coba lagi.";
    }
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>