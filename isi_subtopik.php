


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <mta name="viewport" content="width=device-width, initial-scale=1">

  <title>Isi Sub Topik</title>
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
            display: none; /* Default sembunyikan semua konten */

        }
        .active {
            display: grid;
            place-items: center;
        }

        .active p{
            margin-top:5vw;
            font-size:3vw;
            text-align:justify;
        }

        .pagination button {
            margin: 5px;
            cursor: pointer;
        }
        .pagination .nav-button {
            font-size: 20px; /* Ukuran font untuk memperbesar */
            font-weight: bold; /* Membuat tombol tebal */
        }
        .pagination .active-button {
            background-color:#1EA2F6;
            color: white; /* Warna teks tombol aktif */
            border: none;
        }

        .pagination button:not(.active-button) {
            background-color: #5D81AB; /* Warna highlight untuk halaman aktif */
            color: white; /* Warna teks tombol aktif */
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
        .answer-slot div, .choices div {
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
        
        ul {
            list-style-type: none;
            padding: 0;
        }

        .pernyataan {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            font-size: 1em;
            cursor: pointer;
            
            border: 1px solid #ccc;
            border-radius: 5px;
            
        }

        .pernyataan:hover {
            background-color: #e0e0e0;
        }

        .benar {
            background-color: #4CAF50; /* Hijau */
            color: white;
        }

        #hasil {
            margin-top: 15px;
            font-weight: bold;
        }

        #lanjut a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        #lanjut a:hover {
            background-color: #0056b3;
        }
        
        .svg{
            ackground-color:blue;
        }
    </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

  <section style="background-color:#375679">
    <div style="padding: 1vw 4vw 1vw 4vw; display:flex; justify-content:space-around;  align-items:center;">

        <div data-bs-theme="dark">
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>

        <div class="pagination" style="display:flex; align-items:center;">
                <button class="nav-button" onclick="prevContent()" style="color: #5D81AB; background-color:transparent; font-size:4vw;">&#60;</button>
                <button id="btn-materi1" onclick="showContent('materi1')" style="width:8vw; height:1vw; border-radius:5vw;"></button>
                <button id="btn-materi2" onclick="showContent('materi2')" style="width:8vw; height:1vw; border-radius:5vw;"></button>
                <button id="btn-materi3" onclick="showContent('materi3')" style="width:8vw; height:1vw; border-radius:5vw;"></button>
                <button id="btn-materi4" onclick="showContent('materi4')" style="width:8vw; height:1vw; border-radius:5vw;"></button>
                <button id="btn-materi5" onclick="showContent('materi5')" style="width:8vw; height:1vw; border-radius:5vw;"></button>
                <button id="btn-materi6" onclick="showContent('materi6')" style="width:8vw; height:1vw; border-radius:5vw;"></button>
                <button id="btn-materi7" onclick="showContent('materi7')" style="width:8vw; height:1vw; border-radius:5vw;"></button>
                <button id="btn-materi8" onclick="showContent('materi8')" style="width:8vw; height:1vw; border-radius:5vw;"></button>
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
  </section>

  <section id="materi">
      <div class="container">

          <div id="materi1" class="content" style="">
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:3vw;">
                  <img src="image/svg/materi1.svg" alt="" class="svg" style="margin-top:4vw; width:30vw;">
                  <p style="font-size:2vw;">Dalam fungsi, terdapat dua himpunan utama yang saling berhubungan. Agar bisa disebut fungsi, tidak cukup hanya dengan adanya hubungan antara elemen Himpunan A dan Himpunan B; ada aturan-aturan tertentu yang harus dipenuhi. Aturan-aturan ini akan dibahas dalam sub-topik berikutnya.</p>
              </div>
          </div>
          
          <div id="materi2" class="content">
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:3vw;">
              <img src="image/svg/materi2.svg" alt="" class="svg" style="margin-top:4vw; width:26vw;">
       
              <p style="font-size:2vw;">Gambar disamping adalah bentuk dari fungsi karena elemen-elemen didalam himpunan A berhubungan dengan himpunan B, atau bahasa matematikanya adalah Himpunan A memetakan Himpunan B</p>
              </div>
          </div>
          <div id="materi3" class="content">
              <img src="image/svg/materi3.svg" alt="" class="svg" style="margin-top:4vw; width:26vw;">
  
          <div class="question mt-4">Identifikasi Gambar Diatas!</div>
        
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

          <div id="hasil"></div>
          </div>  
          <div id="materi4" class="content">
            <div tyle="display:grid;">
              <img src="image/svg/materi4.svg" alt="" class="svg" style="margin-top:4vw; width:50vw; position:relative; left:15vw;">
              <p style="font-size:2vw;">Pada latihan sebelumnya, kita memahami permasalahan fungsi dengan bahasa awam. Sekarang, mari ubah sudut pandang agar lebih sesuai dengan matematika. Perhatikan gambar: (1) Himpunan diubah menjadi Himpunan A dan B beserta elemennya, (2) Himpunan A disebut Domain (himpunan asal), (3) Himpunan B disebut Kodomain (himpunan kawan), dan (4) Himpunan A memetakan Himpunan B.</p>
              </div>
          </div>  
          <div id="materi5" class="content">
              <img src="image/svg/materi5.svg" alt="" class="svg" style="margin-top:4vw; width:50vw; position:relative; eft:15vw;">
              
              <p style="font-size:2vw;">Untuk memahami materi ini, diperlukan langkah-langkah sebagai berikut:<br>
              1. Buat Himpunan A (Domain) dan Himpunan B (Kodomain) beserta elemennya.<br>
              2. Buat rumus fungsi untuk menentukan elemen Himpunan B, dengan tampilan rumus umumnya di sebelah kanan.<br>
              3. Gunakan rumus tersebut dan gantikan variabel x dengan elemen Himpunan A untuk mendapatkan elemen Himpunan B.</p>
          </div>  
          <div id="materi6" class="content">
              <h5>Pernyataan mana yang benar?</h5>
                  <div>
                      <ul>
                          <li><button class="pernyataan" id="pernyataan-1" onclick="tentukan(1)">Lorem ipsum dolor sit amet</button></li>
                          <li><button class="pernyataan" id="pernyataan-2" onclick="tentukan(2)">Domain adalah daerah kawan, kodomain adalah daerah asal</button></li>
                          <li><button class="pernyataan" id="pernyataan-3" onclick="tentukan(3)">Domain adalah daerah asal, Kodomain adalah daerah kawan</button></li>
                          <li><button class="pernyataan" id="pernyataan-4" onclick="tentukan(4)">Lorem ipsum dolor sit amet</button></li>
                      </ul>
                  </div>
    
              <h5 id="hasilPilihan"></h5>
                  
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

  <footer style="background-color:#1F2844; position: fixed; bottom: 0; width: 100%; padding: 1vw; text-align: center; display:grid; grid-template-columns: 3fr 1fr; gap:5vw;">
      <div id="petunjuk" style="margin-top:1vw; text-align: center; display:flex; gap:1vw; justify-content: center;">
        <i class="bi bi-info-circle-fill text-white"></i>
        <p class="text-light" id="deskripsiPetunjuk">Isi Kotak Kosong Dengan Memilih dan Mengetik Saran Jawaban</p>
      </div>
      <button onclick="cekHalaman()" type="button" class="btn text-light" id="lanjut-btn" style="height:fit-content; width:10vw; background-color:#1EA2F6; margin-top:7px;">Lanjut</button>
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
                teksAkhir: "Pilihan",
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

        let currentContentIndex = 5;
        const totalContents = 8;
        const deskAkhir = document.querySelector("#deskripsiPetunjuk");
        const tombolAkhir = document.querySelector("#lanjut-btn");
        
        /* Nomor 3 */
        const hasil = document.querySelector("#hasil");
        
        /* Nomor 6 */
        const banyakPernyataan = document.querySelectorAll(".pernyataan");
        const hasilPilihan = document.querySelector("#hasilPilihan");
        const pernyataanBenar = 3;
        
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
            }else{
                alert("Selamat Anda Telah Menyelesaikan Sub-Topik Ini")
            }
        }
        
        function cekHalaman(){
            console.log(`Index: ${currentContentIndex}, Teks Akhir: ${akhir[currentContentIndex].teksAkhir}`);
            if(akhir[currentContentIndex].teksAkhir === "Cek"){               
                checkAnswer();
            }else if (akhir[currentContentIndex].teksAkhir === "Pilihan" || currentContentIndex === 6){
                tombolAkhir.style.display = "none";
            }
            else{
                nextContent();
            }
        }

        function showContent(id) {
            tombolAkhir.innerText = akhir[currentContentIndex].teksAkhir;
            deskAkhir.innerText = akhir[currentContentIndex].deskripsiPetunjuk;
            
            // Sembunyikan semua konten terlebih dahulu
            var contents = document.querySelectorAll('.content');
            contents.forEach(content => content.classList.remove('active'));

            // Tampilkan konten yang dipilih
            document.getElementById(id).classList.add('active');

            // Update index saat pengguna memilih langsung
            currentContentIndex = parseInt(id.replace('materi', ''));

            // Hapus highlight dari semua tombol
            for (let i = 1; i <= totalContents; i++) {
                document.getElementById(`btn-materi${i}`).classList.remove('active-button');
            }
            // Tambahkan highlight pada tombol aktif
            document.getElementById(`btn-materi${currentContentIndex}`).classList.add('active-button');
        }
        
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
            if (answer === correctAnswer) { 
            hasil.innerText = "Benar!"; tombolAkhir.innerText = "Lanjut"; 
            setTimeout(() => nextContent(), 3000);
            /* tombolAkhir.onclick = nextContent; */
            } else { 
            hasil.innerText = "Salah, coba lagi.";     
            }
        }

        function tentukan(nomor) {
            // Reset warna dan kelas pada semua tombol
            banyakPernyataan.forEach(pernyataan => {
                pernyataan.classList.remove("benar", "salah");
                pernyataan.style.backgroundColor = ""; 
            });

            // Cek jawaban
            if (nomor === pernyataanBenar) {
                hasilPilihan.innerText = "Jawaban Anda Benar!";
                document.querySelector(`#pernyataan-${pernyataanBenar}`).classList.add("benars");
                
                // Tampilkan tombol "Lanjut"
                tombolAkhir.innerText = "Lanjut";
                tombolAkhir.style.display = "inline";
                tombolAkhir.onclick = nextContent;
            } else {
                hasilPilihan.innerText = "Jawaban Anda Salah, coba lagi.";
                document.querySelector(`#pernyataan-${pernyataanBenar}`).classList.add("benar");
            }
        }
        
        // Tampilkan materi 1 secara default dan berikan highlight pada tombolnya
        showContent('materi1');
    </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>