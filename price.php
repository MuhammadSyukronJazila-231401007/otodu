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

        #koin img {
            width: 1rem;
            margin-right: 0.5rem;
        }

        body {
            background-color: rgb(150, 137, 137);
        }

        .judul {
            color: white;
            font-weight: 400;
        }

        .text {
            position: relative;
            /* Mengatur posisi relatif untuk overlay */
            text-align: center;
            width: 100%;
            /* Mengambil lebar penuh layar */
            overflow: hidden;
            /* Menghindari elemen keluar dari tampilan */
        }

        .background-image {
            width: 100%;
            /* Mengatur gambar agar mengikuti lebar elemen */
            height: auto;
            /* Menjaga proporsi gambar */
            display: block;
            /* Menghindari spasi di bawah gambar */
        }

        .overlay {
            position: absolute;
            /* Memungkinkan teks berada di atas gambar */
            top: 50%;
            /* Posisi vertikal tengah */
            left: 50%;
            /* Posisi horizontal tengah */
            transform: translate(-50%, -50%);
            /* Memusatkan teks */
            color: white;
            /* Warna teks */
            z-index: 1;
            /* Memastikan teks di atas gambar */
        }

        #text-2 {
            margin-top: 3vw;
            /* 20px */
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
            gap: 10px;
            background-color: white;
        }

        .kredit-satuan {
            font-size: 17px;
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

        footer {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: #1F2844;
            padding: 20px;
            color: white;
        }

        @media (max-width: 600px) {
            .h4-tes {
                font-size: 14px;
            }

            .text img {
                height: 8rem;
            }

            .overlay {
                width: 100%;
            }

            .kredit-satuan {
                margin-top: 1rem;
                font-size: 15px;
                flex-wrap: wrap;
                margin: 0;
                /* Izinkan elemen membungkus ke baris berikutnya */
            }

            .kredit-satuan p {
                margin: 0;
            }

            .kredit-satuan .hemat {
                width: 100%;
                /* Penuh lebar kontainer */
                margin-top: 10px;
                /* Beri sedikit jarak dengan elemen sebelumnya */
                text-align: center;
                /* Sesuaikan dengan kebutuhan tata letak */
            }

            .kredit-satuan p[onclick] {
                padding: 0.5rem 1rem 0.5rem 1rem;
            }

            #jumlah-koin {
                width: 3rem;
                margin-bottom: 0;
            }

            #koin img {
                width: 1rem;
            }

            #koin {
                padding-left: 100px;
                padding-right: 100px;
            }

            #disc-0 {
                height: 15rem;
            }

            #disc-50 {
                height: 15rem;
                margin-left: 2rem;
                margin-top: 1rem;
                margin-bottom: 1rem;
            }

            #disc-100 {
                height: 15rem;
                margin-left: 1.3rem;
            }

        }
    </style>

</head>

<body>
    <div class="text">
        <img src="./image/price bc.png" alt="Gambar Latar" class="background-image">
        <div class="overlay">
            <h4 class="h4-tes">Jelajahi pembelajaran otodidak Kamu untuk</h4>
            <h4 class="h4-tes" id="text-2">NLP dan Mentor dengan <span
                    style="font-family: 'Martian Mono'; font-weight: 600;">Kredit
                    OTODU</span></h4>
        </div>
    </div>


    <div class="card">
        <span style="position: relative; background-color: #96AA03; color: white; display: inline-flex; align-items: center; padding: 0.2vw 1vw; 
                  margin-left: 9vw; border-radius: 3px; width: fit-content; " id="koin">
            <img src="image/coin.png"><?= $koin[0]['koin']; ?>
        </span>
        <!-- <p id="kredit-otodu">Kredit OTODU Anda: <span style="font-weight: 600;">69</span></p> -->
        <div class="kredit-satuan">
            <p>Beli kredit satuan</p>
            <input min=1 id="jumlah-koin" value="1" type="number" class="form-control nomor" placeholder="0" required oninput="updatePrice()">
            <div class="hemat">
                <p style="cursor: pointer;" onclick="konfirmasi(0,0,'Satuan')" class="rounded-text">Beli <u>Rp <span id="total-price">2000</span></u> <b>(hemat Rp <span id="discount">1998</span>)</b></p>
            </div>
        </div>
        <div class="atau">
            <p>Atau</p>
        </div>
        <div style="margin-bottom: 8vh;" class="kredit-diskon ">
            <div style="width: 100%;" class="row">
                <div class="col-md-4 d-flex justify-content-center">
                    <img id="disc-0" src="image/disc 10 f.png" alt="" onclick="konfirmasi(1,5000, 'Paket Sehari')">
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                    <img id="disc-50" src="image/disc 50 f.png" alt="" onclick="konfirmasi(1,20000, 'Paket 5 Hari')">
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                    <img id="disc-100" src="image/disc 100 f.png" alt="" onclick="konfirmasi(1,35000, 'Paket 10 Hari')">
                </div>
            </div>

        </div>
    </div>

    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 120px; margin-right: 2vw; margin-left: 2.3vw;">
        <p style="font-family: 'Martian Mono'; font-size: 10px; margin-top: 17px;">@2024 OTODU Limited</p>
    </footer>
    <script>
        function konfirmasi(banyak, harga, keterangan) {
            let jumlah, biaya, nama, detail; // Deklarasikan di luar blok if/else

            // Tentukan nilai jumlah dan biaya
            if (banyak == 0) {
                const inputJumlah = document.getElementById('jumlah-koin').value; // Mengambil jumlah koin dari input
                biaya = inputJumlah * 2000; // Menghitung biaya berdasarkan jumlah koin
                jumlah = inputJumlah; // Menetapkan jumlah dari input
            } else {
                biaya = harga; // Menggunakan harga yang diteruskan ke fungsi
                jumlah = banyak; // Menggunakan banyak yang diteruskan ke fungsi
            }

            //Untuk ke database
            if (harga == 5000) detail = 10;
            else if (harga == 20000) detail = 50;
            else if (harga == 35000) detail = 100;
            else detail = jumlah;
            setSession(jumlah, biaya, keterangan);
            console.log("jumlah = " + jumlah + " biaya = " + biaya + " ket = " + keterangan); // Log jumlah untuk debugging
            if (keterangan == "Satuan") nama = "Beli " + jumlah + " koin ";
            else nama = "Beli " + keterangan;
            // Menampilkan SweetAlert untuk konfirmasi
            Swal.fire({
                title: nama + "?",
                text: nama + " seharga Rp" + biaya,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Beli"
            }).then((result) => {
                if (result.isConfirmed) {
                    redirectToCheckout(detail);
                }
            });

            // Mengirim jumlah dan biaya ke session
        }

        function setSession(jumlah, biaya, keterangan) {
            // Kirim permintaan AJAX ke server PHP untuk mengatur sesi
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "price_function.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Session updated:", xhr.responseText);
                }
            };
            xhr.send("jumlah=" + jumlah + "&biaya=" + biaya + "&keterangan=" + keterangan);
        }
    </script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-vP30I6evwPVV5p-F"></script>
    <script type="text/javascript">
        function redirectToCheckout(detail) {
            // Ambil order_id dari PHP atau buat di sini jika diperlukan
            const order_id = Math.floor(Math.random() * 1000000); // Contoh random order ID

            // Mengirim request AJAX ke skrip PHP untuk mendapatkan snap_token
            fetch(`./Payment/examples/snap/checkout-process-simple-version.php?order_id=${order_id}`)
                .then(response => response.text())
                .then(snap_token => {
                    // Memanggil Snap dengan token yang didapatkan
                    snap.pay(snap_token, {
                        onSuccess: function(result) {
                            // Buat objek XMLHttpRequest
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "price_function.php", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.send("detail_transaksi=" + detail);

                            Swal.fire({
                                title: 'Pembayaran Berhasil!',
                                text: 'Terima kasih telah melakukan pembayaran. Silahkan refresh laman bila koin belum masuk',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'price.php'
                                }
                            });;
                        }
                    });

                })
                .catch(error => {
                    console.error("Error mendapatkan snap_token:", error);
                });
        }
    </script>

    <script>
        function updatePrice() {
            // Ambil nilai input jumlah koin
            var jumlahKoin = document.querySelector('.nomor').value;

            // Set harga satu koin
            var hargaSatuan = 2000;

            // Hitung total harga
            var totalHarga = jumlahKoin * hargaSatuan;

            // Hitung diskon (misalnya Rp 1.998 per koin dikali jumlah koin)
            var diskon = 1998 * jumlahKoin;

            // Update harga total dan diskon di dalam tag p
            document.getElementById('total-price').textContent = totalHarga;
            document.getElementById('discount').textContent = diskon;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</body>

</html>