<?php
include 'function.php';
$kode_materi = 1; //$_GET['kode_materi'];
$kode_bab = 1; //$_GET['kode_bab'];
$kode_subbab = 1; //$_GET['kode_subbab'];
//$kode_topik = $_GET['kode_topik'];
$kode_subtopik = 1; //$_GET['kode_subtopik'];

$isi_subtopik = ambilData("SELECT * FROM isi_subtopik WHERE kode_subtopik = $kode_subtopik ");
$akhir = [];

// Loop through each item in the fetched data
foreach ($isi_subtopik as $index => $item) {
  if ($item['keterangan'] == 'materi') {
    $teksAkhir = 'Lanjut';
    $descAkhir = 'Silahkan baca dengan teliti';
  } else {
    $teksAkhir = 'Cek';
    $descAkhir = 'Jawab dengan Baik!';
  }
  $akhir[$index + 1] = [
    'jawaban' => $item['jawaban'],
    'keterangan' => $item['keterangan'],
    'deskripsiPetunjuk' => $descAkhir, // Assuming 'materi' is your description
    'teksAkhir' => $teksAkhir, // Assuming 'soal' is your ending text
    'cek' => false, // As per your example, this is set to false
  ];
}
$akhir_json = json_encode($akhir);
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

      }

      .active {
        display: grid;
        place-items: center;
      }

      .active img {
        margin-bottom: 5vw;
      }

      .active p {
        font-size: 3vw;
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
        <p style="color:#4D62A5; font-size:2vw; margin-top:2vw;">Fungsi | 1. Pengantar -> <b><span>Apa Itu Fungsi ?</span></b> -> Subbab 1</p>
      </div>
    </nav>
  </header>

  <footer style="background-color:#375679">
    <div style="padding: 1vw 4vw 1vw 4vw; display:flex; justify-content:space-around;  align-items:center;">

      <div data-bs-theme="dark">
        <button type="button" class="btn-close" aria-label="Close"></button>
      </div>

      <div class="pagination" style="display:flex; align-items:center;">
        <button class="nav-button" onclick="prevContent()" style="color: #5D81AB; background-color:transparent; font-size:4vw;">&#60;</button>
        <?php for ($i = 1; $i <= count($isi_subtopik); $i++) { ?>
          <button id="btn-materi<?= $i; ?>" onclick="showContent('materi<?= $i; ?>')" style="width:8vw; height:1vw; border-radius:5vw;"></button>
        <?php } ?>
        <button class="nav-button" onclick="nextContent()" style="color: #5D81AB; background-color:transparent; font-size:4vw;">&#62;</button>
      </div>

      <i class="bi bi-flag text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 2vw; cursor: pointer;"></i>

      <!-- Modal Bootstrap -->
      <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <?php foreach ($isi_subtopik as $row) : ?>
        <div id="materi<?= $row['nomor']; ?>" class="content">
          <?php
          if ($row['materi'] != NULL) {
            echo "<p>" . $row['materi'] . "</p>";
          }
          if ($row['soal'] != NULL) {
            echo "<p>SOAL: " . $row['soal'] . "</p>";
          }
          ?>
          <form id="form<?= $row['nomor'] ?>">
            <?php if ($row['opsi'] != NULL && $row['soal'] != NULL) { ?>
              <?php
              $opsi_arr = explode(",", $row['opsi']);
              foreach ($opsi_arr as $opsi) {
              ?>
                <label>
                  <input type="radio" name="opsi" value="<?= $opsi ?>">
                  <?= $opsi ?>
                </label><br>
              <?php } ?>
            <?php } ?>
          </form>
        </div>
      <?php endforeach; ?>

    </div>
  </section>

  <footer style="background-color:#1F2844; width: 100%; padding: 4vw; text-align: center; display:grid; grid-template-columns: 3fr 1fr; gap:5vw;">
    <div id="petunjuk" style="margin-top:1vw; text-align: center; display:flex; gap:1vw; justify-content: center;">
      <i class="bi bi-info-circle-fill text-white"></i>
      <p class="text-light" id="deskripsiPetunjuk">Isi Kotak Kosong Dengan Memilih dan Mengetik Saran Jawaban</p>
    </div>
    <button onclick="nextContent()" type="button" class="btn text-light" id="lanjut-btn" style="height:fit-content; width:10vw; background-color:#1EA2F6;">Cek</button>
  </footer>

  <script>
    const akhir = <?php echo $akhir_json; ?>;
    console.log(akhir); // Optional: to verify the content of 'akhir'

    let currentContentIndex = 1;
    const totalContents = <?= count($isi_subtopik) ?>;
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
      const namaForm = 'form' + currentContentIndex;
      const form = document.getElementById(namaForm) || null;
      console.log("current index " + currentContentIndex);
      // Cek apakah elemen dengan ID 'form' ada
      if (akhir[currentContentIndex].keterangan != 'materi') {
        // Cek apakah elemen dengan ID 'form' ada
        if (form != null) {
          const selectedOption = form.opsi.value; // Ambil nilai dari radio button yang terpilih
          console.log(selectedOption);
          if (selectedOption == akhir[currentContentIndex].jawaban) {
            if (currentContentIndex < totalContents) {
              currentContentIndex++;
              showContent(`materi${currentContentIndex}`);
            } else {
              alert("Selamat Anda Telah Menyelesaikan Sub-Topik Ini")
            }
          } else {
            alert("jawaban salah");
          }
        }
      } else {
        if (currentContentIndex < totalContents) {
          currentContentIndex++;
          showContent(`materi${currentContentIndex}`);
        } else {
          alert("Selamat Anda Telah Menyelesaikan Sub-Topik Ini")
        }
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

    function nextPage() {
      if (currentContentIndex < 8) {
        updatePage();
      } else {
        alert('Anda telah menyelesaikan kuis ini!');
      }
    }
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>