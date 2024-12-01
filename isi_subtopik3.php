<?php
// session_start();
// include "config.php";

// $query = "SELECT poin FROM users WHERE id = ?";
// $stmt = $conn->prepare($query);
// $stmt->bind_param("i", $_SESSION["user_id"]);
// $stmt->execute();
// $result = $stmt->get_result();
// $poin = $result->fetch_assoc()["poin"];

// // Periksa jika ada permintaan untuk menambah poin
// if (isset($_POST['addPoin'])) {
//     $poin += 10; // Tambah 10 poin
    
//     // Update poin ke database
//     $queryUpdate = "UPDATE users SET poin = ? WHERE id = ?";
//     $stmtUpdate = $conn->prepare($queryUpdate);
//     $stmtUpdate->bind_param("ii", $poin, $_SESSION["user_id"]);
//     $stmtUpdate->execute();
    
//     echo $poin; // Kembalikan nilai poin yang baru
//     exit; // Penting untuk menghentikan eksekusi
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <mta name="viewport" content="width=device-width, initial-scale=1">
        <title>Isi Sub Topik</title>
        <link rel="stylesheet" href="css/isi_subtopik3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="">

    <header class="mt-0 mb-0" style="height:6vw">
        <div class="container mt-0"
            style="height:6vw; max-width: 100%; display:grid; grid-template-columns: 1fr 3fr; gap:5vw; align-items:center;">
            <a class="navbar-brand" href="#" style="margin-left: 8vw;">
                <img src="./image/otodu.png" alt="Bootstrap" width="150vw">
            </a>
            <p style="color:#4D62A5; font-size:1.5vw;">Fungsi | 1. Pengantar -> <b><span>Apa Itu Fungsi ?</span></b> ->
                Subbab 1</p>
        </div>
    </header>

    <section class="" style="background-color:#375679; height:6vw;">
        <div class="container"
            style="display: grid; grid-template-columns: 1fr 1fr 1fr; align-items: center; gap: 3vw;">

            <!-- Button Close -->
            <div data-bs-theme="dark">
                <button type="button" class="btn-close" aria-label="Close" style="font-size:1vw;"></button>
            </div>

            <!-- Pagination Buttons -->
            <div class="pagination"
                style="display:grid; justify-items:center; grid-template-columns: repeat(10, 1fr); gap: 1vw;">
                <button class="nav-button" onclick="prevContent()"
                    style="color: #5D81AB; background-color:transparent; font-size:3vw;">&#60;</button>
                <button class="btn-pagination" id="btn-materi1" onclick="showContent('materi1')"></button>
                <button class="btn-pagination" id="btn-materi2" onclick="showContent('materi2')"></button>
                <button class="btn-pagination" id="btn-materi3" onclick="showContent('materi3')"></button>
                <button class="btn-pagination" id="btn-materi4" onclick="showContent('materi4')"></button>
                <button class="btn-pagination" id="btn-materi5" onclick="showContent('materi5')"></button>
                <button class="btn-pagination" id="btn-materi6" onclick="showContent('materi6')"></button>
                <button class="btn-pagination" id="btn-materi7" onclick="showContent('materi7')"></button>
                <button class="btn-pagination" id="btn-materi8" onclick="showContent('materi8')"></button>
                <button class="nav-button" onclick="nextContent()"
                    style="color: #5D81AB; background-color:transparent; font-size:3vw;">&#62;</button>
            </div>

            <!-- Flag Icon Trigger for Modal -->
            <i class="bi bi-flag text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"
                style="font-size: 1vw; cursor: pointer;"></i>

        </div>

        <!-- Modal Bootstrap -->
        <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="display:none;">
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
    </section>

    <section id="materi">
        <div class="container">

            <div id="materi1" class="content">
                <div class="pembungkus-content">
                    <img src="image/svg/materi1.svg" alt="" class="svg" style="width:20vw;">
                    <p style="font-size:20px;">Dalam fungsi, terdapat dua himpunan utama yang saling berhubungan. Agar
                        bisa disebut fungsi, tidak cukup hanya dengan adanya hubungan antara elemen Himpunan A dan
                        Himpunan B; ada aturan-aturan tertentu yang harus dipenuhi. Aturan-aturan ini akan dibahas dalam
                        sub-topik berikutnya.</p>
                </div>
            </div>

            <div id="materi2" class="content">
                <div class="pembungkus-content">
                    <img src="image/svg/materi2.svg" alt="" class="svg" style="width:15vw;">

                    <p style="font-size:20px;">Gambar disamping adalah bentuk dari fungsi karena elemen-elemen didalam
                        himpunan A berhubungan dengan himpunan B, atau bahasa matematikanya adalah Himpunan A memetakan
                        Himpunan B</p>
                </div>
            </div>

            <div id="materi3" class="content" style="height:30vw;">
                <img src="image/svg/materi3.svg" alt="" class="svg" style="width:15vw;">
                <div class="question mt-4">Identifikasi Gambar Diatas!</div>
                <div class="answer-slot" id="answer-slot-1">
                    <div onclick="removeAnswer(this, 1)"></div>
                    <div onclick="removeAnswer(this, 1)"></div>
                    <div onclick="removeAnswer(this, 1)"></div>
                    <div onclick="removeAnswer(this, 1)"></div>
                    <div onclick="removeAnswer(this, 1)"></div>
                </div>
                <div class="choices" id="choices-1">
                    <div onclick="placeAnswer(this, 1)">Laki-Laki</div>
                    <div onclick="placeAnswer(this, 1)">Memetakan</div>
                    <div onclick="placeAnswer(this, 1)">Jodohnya</div>
                    <div onclick="placeAnswer(this, 1)">Himpunan</div>
                    <div onclick="placeAnswer(this, 1)">HImpunan</div>
                </div>
                <div class="hasil" id="hasil-1"></div>
            </div>

            <div id="materi4" class="content">
                <div style="display:grid; grid-template-columns:1fr 1fr;">
                    <img src="image/svg/materi4.svg" alt="" class="svg" style="width:30vw;">
                    <p style="font-size:20px;">Pada latihan sebelumnya, kita memahami permasalahan fungsi dengan bahasa
                        awam. Sekarang, mari ubah sudut pandang agar lebih sesuai dengan matematika. Perhatikan gambar
                        dikanan yang merupakan hasil modifikasi gambar dikiri: (1) Himpunan diubah menjadi Himpunan A
                        dan B beserta elemennya, (2) Himpunan A disebut Domain (himpunan asal), (3) Himpunan B disebut
                        Kodomain (himpunan kawan), dan (4) Himpunan A memetakan Himpunan B.</p>
                </div>

            </div>

            <div id="materi5" class="content">
                <div style="display:grid; grid-template-columns:1fr 1fr;">
                    <img src="image/svg/materi5.svg" alt="" class="svg" style="width:30vw;">

                    <p style="font-size:20px;">Untuk memahami materi ini, diperlukan langkah-langkah sebagai
                        berikut:<br>
                        1. Buat Himpunan A (Domain) dan Himpunan B (Kodomain) beserta elemennya.<br>
                        2. Buat rumus fungsi untuk menentukan elemen Himpunan B, dengan tampilan rumus umumnya di
                        sebelah kanan.<br>
                        3. Gunakan rumus tersebut dan gantikan variabel x dengan elemen Himpunan A untuk mendapatkan
                        elemen Himpunan B.</p>
                </div>

            </div>

            <div id="materi6" class="content">
                <h5 style="margin-top:4vw;">Pernyataan mana yang benar?</h5>
                <div>
                    <ul>
                        <li><button class="pernyataan" id="pernyataan-1" onclick="tentukan(1)">Lorem ipsum dolor sit
                                amet</button></li>
                        <li><button class="pernyataan" id="pernyataan-2" onclick="tentukan(2)">Domain adalah daerah
                                kawan, kodomain adalah daerah asal</button></li>
                        <li><button class="pernyataan" id="pernyataan-3" onclick="tentukan(3)">Domain adalah daerah
                                asal, Kodomain adalah daerah kawan</button></li>
                        <li><button class="pernyataan" id="pernyataan-4" onclick="tentukan(4)">Lorem ipsum dolor sit
                                amet</button></li>
                    </ul>
                </div>

                <h5 id="hasilPilihan"></h5>

            </div>

            <div id="materi7" class="content">
                <div class="pembungkus-content">
                    <img src="image/svg/materi2.svg" alt="" class="svg" style="width:15vw;">

                    <p style="font-size:15px;">Sudah sejauh ini, tapi apakah Anda sudah tahu mengapa kita mempelajari
                        fungsi? <br>

                        Berikut kegunaannya: <br>
                        1. Melatih Berpikir Kritis <br>
                        -Membantu menganalisis hubungan dan mencari solusi logis. <br>
                        2. Memahami Sebab-Akibat <br>
                        -Memahami bagaimana perubahan masukkam memengaruhi keluaran.</p>
                </div>
            </div>

            <div id="materi8" class="content" style="height:30vw;">
                <h5>Soal Akhir!</h5>
                <div class="answer-slot row text-center" id="answer-slot-2">
                    <div class="answered" id="bukan-jawaban">Memahami</div>
                    <div class="answered" id="bukan-jawaban">Sebab</div>
                    <div onclick="removeAnswer(this, 2)"></div>
                    <div onclick="removeAnswer(this, 2)"></div>
                    <div class="answered" id="bukan-jawaban">Merupakan</div>
                    <div class="answered" id="bukan-jawaban">Salah</div>
                    <div class="answered" id="bukan-jawaban">Satu</div>
                    <div onclick="removeAnswer(this, 2)"></div>
                    <div onclick="removeAnswer(this, 2)"></div>
                    <div onclick="removeAnswer(this, 2)"></div>
                </div>
                <div class="choices" id="choices-2">
                    <div onclick="placeAnswer(this, 2)">Akibat</div>
                    <div onclick="placeAnswer(this, 2)">Manfaat</div>
                    <div onclick="placeAnswer(this, 2)">Dan</div>
                    <div onclick="placeAnswer(this, 2)">Fungsi</div>
                    <div onclick="placeAnswer(this, 2)">Mempelajari</div>
                </div>
                <div class="hasil" id="hasil-2"></div>
            </div>

        </div>
    </section>

    <footer
        style="background-color:#1F2844; position: fixed; bottom: 0; width: 100%; padding: 1vw; text-align: center; display:grid; grid-template-columns: 3fr 1fr; gap:5vw;">
        <div id="petunjuk" style="margin-top:1vw; text-align: center; display:flex; gap:1vw; justify-content: center;">
            <i class="bi bi-info-circle-fill text-white"></i>
            <p class="text-light" id="deskripsiPetunjuk">Isi Kotak Kosong Dengan Memilih dan Mengetik Saran Jawaban</p>
        </div>
        <button onclick="cekHalaman()" type="button" class="btn text-light" id="lanjut-btn"
            style="height:fit-content; width:10vw; background-color:#1EA2F6; margin-top:7px;">Lanjut</button>
        <!-- Modal Selesai -->
        <button id="openModalSelesai" style="display:none;">Selesai</button>

        <!-- Modal Overlay -->
        <div class="modal-overlay" id="modalOverlaySelesai">
            <div class="modal-box">
                <button class="close-btn" id="closeModalSelesai">&times;</button>
                <h2>Selesai!</h2>
                <p><span id="poin">+10</span> Poin</p>
                <a class="btn btn-primary" href="dashboard.php" role="button">Kembali</a>
            </div>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-qhMzCV4IFxkpA4MecId+RYLTvIjKNwujuL9X5Ly7j7GsTLk/w1lU8H3N9bQKUf1K" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-YTxKWbFVOUCU1iyXPLBtyHeOHzujwhDlbnEwOnJ/BcPg+3og4tkUmUP1fojKQLsk" crossorigin="anonymous">
    </script>

    <script src="js/isi_subtopik3.js"></script>
</body>

</html>