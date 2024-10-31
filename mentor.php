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

  <title>Cari Mentor</title>
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
          padding: 1.5vw; /* 20px */
          color: white;
          /* position: fixed; */
          bottom: 0;
          width: 100%;
          text-align: center;
          padding: 1vw;
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
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/button.css">
  <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    

</head>

<body style="font-family: 'Rethink Sans', sans-serif;">
  <header>
    <nav class="navbar">
        <div class="container" style="display: flex; align-items: center;">
            <div class="logo">
                <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 1vw;"> <!-- 130px -->
            </div>
            <a style="margin: 0.7rem 0px;" class="nav-menu" href="dashboard.php">NLP OTODU</a>
            <a style="margin: 0.7rem 0px;" class="nav-menu" id="nav-main" href="mentor.php">Mentor OTODU</a>
            <a style="margin: 0.7rem 0px;" class="nav-menu" href="jasa.php">Desain Web & App</a>
      </div>
        </div>
    </nav> 
    <div class="intro">
      <div style="width: 20vw;">Otodidak jauh lebih terarah
        dengan..</div>
      <div style="display: flex;">
        <b>
          Mentor &nbsp;
          <img src="./image/otodu putih.png" width="20" height="12">
          OTODU!
        </b>
      </div>
    </div>
  </header>

  <main>
    <div style="display: flex; justify-content: space-between; margin-left: 5vw;">
      <div style="display: flex;">
      <div style="background-color: #96AA03; color: white; font-size: 12px; text-align: center;">
        <a href="" class="btn btn-primary" style="background-color: #96AA03;  font-size: 12px; text-align: center; border: 0cm;" tabindex="-1" role="button" aria-disabled="true">
          <div style="display: flex;" id="koin">
            <div style="margin-right: 0.4vw;">
              <img src="./image/coin.png" width="20" height="20">
            </div>
            <div style="text-align: left;">69</div>
          </div>
        </a>
      </div>
      <div style="background-color: #4D62A5; color: white; padding: 0;">
        <a href="riwayat.html" class="btn btn-primary" style="background-color: #4D62A5;  font-size: 12px; text-align: center; border: 0cm;" tabindex="-1" role="button" aria-disabled="true">
        <div style="display: flex;" id="riwayat-mentor">
          <div style="margin-right: 0.4vw;">
            <img src="./image/riwayat.png" width="20" height="20">
          </div>
          <div style="text-align: left;">Riwayat transaksi</div>
        </div>
      </a>
    </div>
  </div>
      
        <div>
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
        </div>
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
            <img src="./image/maps.jfif" width="350" height="300">
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div style="display: flex;">
              <div>
                <button type="button" class="btn btn-outline-mtk" style="border-radius: 1.6vw; margin-right: 1.5vw;">
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
                <button type="button" class="btn btn-outline-utbk" style="border-radius: 1.6vw; margin-right: 1.5vw;">
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
            <font style="border-bottom: 0.1vw solid #1F2844; padding-bottom: 5px;">Pemrograman Lanjutan</font>
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
                <button type="button" class="btn btn-outline-bing" style="border-radius: 1.6vw; margin-top: 5px;">
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
                <button type="button" class="btn btn-outline-bing" style="border-radius: 1.6vw; margin-right: 1.5vw;">
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
    <div style="display: flex; margin-left: 5vw; margin-right: 5vw; justify-content: space-between;">
      <div>
        <center>
          <table style="background-color: #4D62A5; border-radius: 1vw; ">
            <tr>
              <td rowspan="2"><img src="./image/user.png" width="30" height="30"
                  style="margin-left: 2vw; margin-top: 1vw; "></td>
              <td colspan="2" style="color: white; padding-top: 1vw; ">
                Mentor Skibidi L., S.Komedi
              </td>
            </tr>
            <tr>
              <td colspan="2" style="color: white; font-size: 12px; border-bottom: 1px solid white;"><img
                  src="./image/pin.png" width="17" height="17">690m</td>
            </tr>
            <tr>
              <td style="padding: 5px;"></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="3">
                <div style="display: flex;">
                  <div><button type="button" class="btn btn-danger"
                      style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0vw;">
                      Matematika </button></div>
                  <div><button type="button" class="btn btn-secondary"
                      style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-bottom: 4px; margin-right: 3vw;">Dasar
                      Pemrograman</button></div>
                </div>
              </td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="3">
                <div style="display: flex;">
                  <div><button type="button" class="btn btn-warning"
                      style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0;">UTBK</button>
                  </div>
                  <div><button type="button" class="btn btn-success"
                      style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw;">Luring</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="text-align: end; padding: 0 0 4px 0; margin-top: 0;">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pesan1"
                  style="color: white; font-size: 12px; margin-right: 1vw;">
                  Pesan Mentor
                </button>

                <div class="modal fade" id="pesan1" data-bs-backdrop="static" data-bs-keyboard="false"
                  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-body">
                        <center>
                          <div class="box1">
                            <div class="box2">
                              <img src="./image/user.png" width="80px" height="80px" style="margin-right: 30px;">
                              <p>(Deskripsi)aaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                            <div>
                              <table class="tabel">
                                <tr>
                                  <td class="tabeltd" scope="col">
                                    <div style="text-align: center;">Materi:</div>
                                    <div style="text-align: center;">Dasar Pemrograman</div>
                                  </td>
                                  <td class="tabeltd" scope="col">
                                    <div style="text-align: center;">Sub-Materi:</div>
                                    <div style="text-align: center;">Bahasa C++, Java, HTML</div>
                                  </td>
                                </tr>
                              </table>
                            </div> <br>
                            <div>
                              <p style="text-align: left; margin-left: 30px; margin-right: 30px;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ad quo sunt sapiente vero
                                possimus aperiam a qui, vel deleniti perferendis, eveniet quam voluptate! Perferendis
                                quaerat odit ea unde eaque!
                              </p>
                            </div>
                            <div class="box3">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a class="btn btn-primary" href="#" role="button"
                                style="background-color: #2D5FFF; margin-left: 50px;">
                                Bayar dengan 10 kredit
                              </a>
                            </div>
                        </center>
                      </div>
                    </div>


                  </div>
                </div>
      </div>
      </td>
      </tr>
      </table>
      </center>
    </div>
    <div>
      <center>
        <table style="background-color: #4D62A5; border-radius: 1vw; ">
          <tr>
            <td rowspan="2"><img src="./image/user.png" width="30" height="30"
                style="margin-left: 2vw; margin-top: 1vw; "></td>
            <td colspan="2" style="color: white; padding-top: 1vw; ">
              Mentor Skibidi L., S.Komedi
            </td>
          </tr>
          <tr>
            <td colspan="2" style="color: white; font-size: 12px; border-bottom: 1px solid white;"><img
                src="./image/pin.png" width="17" height="17">690m</td>
          </tr>
          <tr>
            <td style="padding: 5px;"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="3">
              <div style="display: flex;">
                <div><button type="button" class="btn btn-danger"
                    style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0vw;">
                    Matematika </button></div>
                <div><button type="button" class="btn btn-secondary"
                    style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-bottom: 4px; margin-right: 3vw;">Dasar
                    Pemrograman</button></div>
              </div>
            </td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="3">
              <div style="display: flex;">
                <div><button type="button" class="btn btn-warning"
                    style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0;">UTBK</button>
                </div>
                <div><button type="button" class="btn btn-success"
                    style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw;">Luring</button>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="3" style="text-align: end; padding: 0 0 4px 0; margin-top: 0;">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pesan2"
                style="color: white; font-size: 12px; margin-right: 1vw;">
                Pesan Mentor
              </button>

              <div class="modal fade" id="pesan2" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-body">
                      <center>
                        <div class="box1">
                          <div class="box2">
                            <img src="./image/user.png" width="80px" height="80px" style="margin-right: 30px;">
                            <p>(Deskripsi)aaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                             aaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                          </div>
                          <div>
                            <table class="tabel">
                              <tr>
                                <td class="tabeltd" scope="col">
                                  <div style="text-align: center;">Materi:</div>
                                  <div style="text-align: center;">Dasar Pemrograman</div>
                                </td>
                                <td class="tabeltd" scope="col">
                                  <div style="text-align: center;">Sub-Materi:</div>
                                  <div style="text-align: center;">Bahasa C++, Java, HTML</div>
                                </td>
                              </tr>
                            </table>
                          </div> <br>
                          <div>
                            <p style="text-align: left; margin-left: 30px; margin-right: 30px;">
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ad quo sunt sapiente vero
                              possimus aperiam a qui, vel deleniti perferendis, eveniet quam voluptate! Perferendis
                              quaerat odit ea unde eaque!
                            </p>
                          </div>
                          <div class="box3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn btn-primary" href="#" role="button"
                              style="background-color: #2D5FFF; margin-left: 50px;">
                              Bayar dengan 10 kredit
                            </a>
                          </div>
                      </center>
                    </div>
                  </div>


                </div>
              </div>
    </div>
    </td>
    </tr>
    </table>
    </center>
  </div>
  <div>
    <center>
      <table style="background-color: #4D62A5; border-radius: 1vw; ">
        <tr>
          <td rowspan="2"><img src="./image/user.png" width="30" height="30"
              style="margin-left: 2vw; margin-top: 1vw; "></td>
          <td colspan="2" style="color: white; padding-top: 1vw; ">
            Mentor Skibidi L., S.Komedi
          </td>
        </tr>
        <tr>
          <td colspan="2" style="color: white; font-size: 12px; border-bottom: 1px solid white;"><img
              src="./image/pin.png" width="17" height="17">690m</td>
        </tr>
        <tr>
          <td style="padding: 5px;"></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3">
            <div style="display: flex;">
              <div><button type="button" class="btn btn-danger"
                  style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0vw;">
                  Matematika </button></div>
              <div><button type="button" class="btn btn-secondary"
                  style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-bottom: 4px; margin-right: 3vw;">Dasar
                  Pemrograman</button></div>
            </div>
          </td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3">
            <div style="display: flex;">
              <div><button type="button" class="btn btn-warning"
                  style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0;">UTBK</button>
              </div>
              <div><button type="button" class="btn btn-success"
                  style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw;">Luring</button>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: end; padding: 0 0 4px 0; margin-top: 0;">
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pesan3"
              style="color: white; font-size: 12px; margin-right: 1vw;">
              Pesan Mentor
            </button>

            <div class="modal fade" id="pesan3" data-bs-backdrop="static" data-bs-keyboard="false"
              tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-body">
                    <center>
                      <div class="box1">
                        <div class="box2">
                          <img src="./image/user.png" width="80px" height="80px" style="margin-right: 30px;">
                          <p>(Deskripsi)aaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                        </div>
                        <div>
                          <table class="tabel">
                            <tr>
                              <td class="tabeltd" scope="col">
                                <div style="text-align: center;">Materi:</div>
                                <div style="text-align: center;">Dasar Pemrograman</div>
                              </td>
                              <td class="tabeltd" scope="col">
                                <div style="text-align: center;">Sub-Materi:</div>
                                <div style="text-align: center;">Bahasa C++, Java, HTML</div>
                              </td>
                            </tr>
                          </table>
                        </div> <br>
                        <div>
                          <p style="text-align: left; margin-left: 30px; margin-right: 30px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ad quo sunt sapiente vero
                            possimus aperiam a qui, vel deleniti perferendis, eveniet quam voluptate! Perferendis
                            quaerat odit ea unde eaque!
                          </p>
                        </div>
                        <div class="box3">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <a class="btn btn-primary" href="#" role="button"
                            style="background-color: #2D5FFF; margin-left: 50px;">
                            Bayar dengan 10 kredit
                          </a>
                        </div>
                    </center>
                  </div>
                </div>


              </div>
            </div>
  </div>
  </td>
  </tr>
  </table>
  </center>
</div>
    </div> <!--Baris Kedua-->
    <div style="display: flex; margin-left: 5vw; margin-right: 5vw; justify-content: space-between; margin-top: 2vw;">
      <div>
        <center>
          <table style="background-color: #4D62A5; border-radius: 1vw; ">
            <tr>
              <td rowspan="2"><img src="./image/user.png" width="30" height="30"
                  style="margin-left: 2vw; margin-top: 1vw; "></td>
              <td colspan="2" style="color: white; padding-top: 1vw; ">
                Mentor Skibidi L., S.Komedi
              </td>
            </tr>
            <tr>
              <td colspan="2" style="color: white; font-size: 12px; border-bottom: 1px solid white;"><img
                  src="./image/pin.png" width="17" height="17">690m</td>
            </tr>
            <tr>
              <td style="padding: 5px;"></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="3">
                <div style="display: flex;">
                  <div><button type="button" class="btn btn-danger"
                      style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0vw;">
                      Matematika </button></div>
                  <div><button type="button" class="btn btn-secondary"
                      style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-bottom: 4px; margin-right: 3vw;">Dasar
                      Pemrograman</button></div>
                </div>
              </td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="3">
                <div style="display: flex;">
                  <div><button type="button" class="btn btn-warning"
                      style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0;">UTBK</button>
                  </div>
                  <div><button type="button" class="btn btn-success"
                      style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw;">Luring</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="text-align: end; padding: 0 0 4px 0; margin-top: 0;">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pesan4"
                  style="color: white; font-size: 12px; margin-right: 1vw;">
                  Pesan Mentor
                </button>

                <div class="modal fade" id="pesan4" data-bs-backdrop="static" data-bs-keyboard="false"
                  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-body">
                        <center>
                          <div class="box1">
                            <div class="box2">
                              <img src="./image/user.png" width="80px" height="80px" style="margin-right: 30px;">
                              <p>(Deskripsi)aaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                               aaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                            <div>
                              <table class="tabel">
                                <tr>
                                  <td class="tabeltd" scope="col">
                                    <div style="text-align: center;">Materi:</div>
                                    <div style="text-align: center;">Dasar Pemrograman</div>
                                  </td>
                                  <td class="tabeltd" scope="col">
                                    <div style="text-align: center;">Sub-Materi:</div>
                                    <div style="text-align: center;">Bahasa C++, Java, HTML</div>
                                  </td>
                                </tr>
                              </table>
                            </div> <br>
                            <div>
                              <p style="text-align: left; margin-left: 30px; margin-right: 30px;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ad quo sunt sapiente vero
                                possimus aperiam a qui, vel deleniti perferendis, eveniet quam voluptate! Perferendis
                                quaerat odit ea unde eaque!
                              </p>
                            </div>
                            <div class="box3">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a class="btn btn-primary" href="#" role="button"
                                style="background-color: #2D5FFF; margin-left: 50px;">
                                Bayar dengan 10 kredit
                              </a>
                            </div>
                        </center>
                      </div>
                    </div>


                  </div>
                </div>
      </div>
      </td>
      </tr>
      </table>
      </center>
    </div>
    <div>
      <center>
        <table style="background-color: #4D62A5; border-radius: 1vw; ">
          <tr>
            <td rowspan="2"><img src="./image/user.png" width="30" height="30"
                style="margin-left: 2vw; margin-top: 1vw; "></td>
            <td colspan="2" style="color: white; padding-top: 1vw; ">
              Mentor Skibidi L., S.Komedi
            </td>
          </tr>
          <tr>
            <td colspan="2" style="color: white; font-size: 12px; border-bottom: 1px solid white;"><img
                src="./image/pin.png" width="17" height="17">690m</td>
          </tr>
          <tr>
            <td style="padding: 5px;"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="3">
              <div style="display: flex;">
                <div><button type="button" class="btn btn-danger"
                    style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0vw;">
                    Matematika </button></div>
                <div><button type="button" class="btn btn-secondary"
                    style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-bottom: 4px; margin-right: 3vw;">Dasar
                    Pemrograman</button></div>
              </div>
            </td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="3">
              <div style="display: flex;">
                <div><button type="button" class="btn btn-warning"
                    style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0;">UTBK</button>
                </div>
                <div><button type="button" class="btn btn-success"
                    style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw;">Luring</button>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="3" style="text-align: end; padding: 0 0 4px 0; margin-top: 0;">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pesan5"
                style="color: white; font-size: 12px; margin-right: 1vw;">
                Pesan Mentor
              </button>

              <div class="modal fade" id="pesan5" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-body">
                      <center>
                        <div class="box1">
                          <div class="box2">
                            <img src="./image/user.png" width="80px" height="80px" style="margin-right: 30px;">
                            <p>(Deskripsi)aaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                              aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                          </div>
                          <div>
                            <table class="tabel">
                              <tr>
                                <td class="tabeltd" scope="col">
                                  <div style="text-align: center;">Materi:</div>
                                  <div style="text-align: center;">Dasar Pemrograman</div>
                                </td>
                                <td class="tabeltd" scope="col">
                                  <div style="text-align: center;">Sub-Materi:</div>
                                  <div style="text-align: center;">Bahasa C++, Java, HTML</div>
                                </td>
                              </tr>
                            </table>
                          </div> <br>
                          <div>
                            <p style="text-align: left; margin-left: 30px; margin-right: 30px;">
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ad quo sunt sapiente vero
                              possimus aperiam a qui, vel deleniti perferendis, eveniet quam voluptate! Perferendis
                              quaerat odit ea unde eaque!
                            </p>
                          </div>
                          <div class="box3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn btn-primary" href="#" role="button"
                              style="background-color: #2D5FFF; margin-left: 50px;">
                              Bayar dengan 10 kredit
                            </a>
                          </div>
                      </center>
                    </div>
                  </div>


                </div>
              </div>
    </div>
    </td>
    </tr>
    </table>
    </center>
  </div>
  <div>
    <center>
      <table style="background-color: #4D62A5; border-radius: 1vw; ">
        <tr>
          <td rowspan="2"><img src="./image/user.png" width="30" height="30"
              style="margin-left: 2vw; margin-top: 1vw; "></td>
          <td colspan="2" style="color: white; padding-top: 1vw; ">
            Mentor Skibidi L., S.Komedi
          </td>
        </tr>
        <tr>
          <td colspan="2" style="color: white; font-size: 12px; border-bottom: 1px solid white;"><img
              src="./image/pin.png" width="17" height="17">690m</td>
        </tr>
        <tr>
          <td style="padding: 5px;"></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3">
            <div style="display: flex;">
              <div><button type="button" class="btn btn-danger"
                  style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0vw;">
                  Matematika </button></div>
              <div><button type="button" class="btn btn-secondary"
                  style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-bottom: 4px; margin-right: 3vw;">Dasar
                  Pemrograman</button></div>
            </div>
          </td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3">
            <div style="display: flex;">
              <div><button type="button" class="btn btn-warning"
                  style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0;">UTBK</button>
              </div>
              <div><button type="button" class="btn btn-success"
                  style="font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw;">Luring</button>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: end; padding: 0 0 4px 0; margin-top: 0;">
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pesan6"
              style="color: white; font-size: 12px; margin-right: 1vw;">
              Pesan Mentor
            </button>

            <div class="modal fade" id="pesan6" data-bs-backdrop="static" data-bs-keyboard="false"
              tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-body">
                    <center>
                      <div class="box1">
                        <div class="box2">
                          <img src="./image/user.png" width="80px" height="80px" style="margin-right: 30px;">
                          <p>(Deskripsi)aaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                        </div>
                        <div>
                          <table class="tabel">
                            <tr>
                              <td class="tabeltd" scope="col">
                                <div style="text-align: center;">Materi:</div>
                                <div style="text-align: center;">Dasar Pemrograman</div>
                              </td>
                              <td class="tabeltd" scope="col">
                                <div style="text-align: center;">Sub-Materi:</div>
                                <div style="text-align: center;">Bahasa C++, Java, HTML</div>
                              </td>
                            </tr>
                          </table>
                        </div> <br>
                        <div>
                          <p style="text-align: left; margin-left: 30px; margin-right: 30px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ad quo sunt sapiente vero
                            possimus aperiam a qui, vel deleniti perferendis, eveniet quam voluptate! Perferendis
                            quaerat odit ea unde eaque!
                          </p>
                        </div>
                        <div class="box3">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <a class="btn btn-primary" href="#" role="button"
                            style="background-color: #2D5FFF; margin-left: 50px;">
                            Bayar dengan 10 kredit
                          </a>
                        </div>
                    </center>
                  </div>
                </div>


              </div>
            </div>
  </div>
  </td>
  </tr>
  </table>
  </center>
</div>
    </div>
  </main><br><br><br>

  <footer>
      <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 5vw;"> <!-- 120px -->
      <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  
    <script>
      document.getElementById('riwayat-mentor').addEventListener('click', function(event) {
            event.preventDefault(); 
            window.location.href = 'riwayatmentor.php'; 
        });

      document.getElementById('koin').addEventListener('click', function(event) {
          event.preventDefault();
          window.location.href = 'price.php'; 
      });
    </script>
</body>

</html>