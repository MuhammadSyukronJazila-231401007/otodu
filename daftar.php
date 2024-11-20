<?php
include 'function.php';
session_start();

if (isset($_GET['kode_materi'])) {
    $_SESSION['kode_materi'] = $_GET['kode_materi'];
    $_SESSION['kode_subbab'] = $_GET['kode_subbab'];
    $_SESSION['kode_bab'] = $_GET['kode_bab'];
    header("Location: materi.php");
}

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$koin = ambilData("SELECT koin FROM users WHERE id = $id");

$materi = ambilData("SELECT * FROM materi");

include 'navbar.php';

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <style>
        #nlp {
            background-color: #4D62A5;
            color: white;
            font-weight: 450;
        }

        .form-select {
            background-image: url("panah.png");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 2vw 0.8vw;
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

        option {
            font-family: 'Rethink Sans', sans-serif;
        }
    </style>
</head>

<body style="font-family: 'Rethink Sans', sans-serif;">
    <div style="display: flex; justify-content: space-between;">
        <div>
            <font id="koin"
                style="background-color: #96AA03; color: white; align-items: center; padding: 0.7vw; margin-left: 7vw; cursor: pointer;">
                <img src="image/coin.png" width="18" height="18">
                <?= $koin[0]['koin'] ?>
            </font>
        </div>
        <div>
            <font style="background-color: #4D62A5; margin-right: 5vw; padding: 0.4vw;">
                <a href="leaderboard.php">
                    <img src="image/rank.png" width="18" height="18" style="margin-left: 0.7vw;">
                </a>
                <a href="">
                    <img src="image/mail.png" width="18" height="18" style="margin-left: 1.5vw; margin-right: 1.5vw;">
                </a>
                <a href="profil.php">
                    <img src="image/user.png" width="18" height="18" style="margin-right: 0.7vw;">
                </a>
            </font>
        </div>
    </div>
    <h4 style="padding: 4vw 10vw 2vw 10vw;">Daftar Materi</h4>
    <br>
    <div style="background-color: #F6F7FA; border-radius: 0.5vw; padding: 2vw 3vw;">
        <div style="display: flex;">
            <div style="margin: 4vw ;">
                <h6 style="margin-bottom: 1.5vw;">Pilih Materi</h6>
                <select id="pilihMateri" class="form-select" aria-label="Default select example"
                    style="background-color: white; padding: 1vw 4vw 1vw 2vw; border-radius: 1vw;">
                    <?php $no = 0;
                    foreach ($materi as $row) : if ($no == 0) { ?>
                            <option selected value="<?= $row['kode_materi'] ?>"><?= $row['nama_materi'] . ' Kelas ' . $row['kelas']; ?></option>
                        <?php } else { ?>
                            <option value="<?= $row['kode_materi'] ?>"><?= $row['nama_materi'] . ' Kelas ' . $row['kelas']; ?></option>
                    <?php }
                        $no++;
                    endforeach ?>
                </select>
                <br>
                <h6 style="margin-bottom: 1.5vw;">Pilih Bab</h6>
                <select id="pilihBab" class="form-select" aria-label="Default select example"
                    style="background-color: white; padding: 1vw 4vw 1vw 2vw; border-radius: 1vw;">
                    <?php $bab1 = ambilData("SELECT * FROM bab WHERE kode_materi = 1");
                    foreach ($bab1 as $row): ?>
                        <option value="<?= $row['kode_bab'] ?>"><?= $row['nama_bab']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div id="subbabContainer" class="d-flex gap-4">

            </div>

        </div>
    </div>
    </div>
    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;">
        <!-- 120px -->
        <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
    </footer>
    <script>
        document.getElementById('koin').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = 'price.php';
        });
    </script>
    <script>
        isiSubBab(1);

        document.getElementById("pilihMateri").addEventListener("change", function() {
            const idMateri = this.value;
            const babSelect = document.getElementById("pilihBab");
            babSelect.innerHTML = "";

            fetch(`daftar_bc.php?id_materi=${idMateri}`)
                .then(response => response.json())
                .then(data => {
                    let temp;
                    if (data.length === 0 || (data.length === 1 && data[0].id_bab === 0)) {
                        const option = document.createElement("option");
                        option.textContent = "Tidak ada bab";
                        option.disabled = true; // Buat opsi tidak bisa dipilih
                        option.selected = true; // Tampilkan sebagai opsi default
                        babSelect.appendChild(option);
                    } else {
                        data.forEach((bab, index) => {
                            const option = document.createElement("option");
                            option.value = bab.kode_bab;
                            option.textContent = bab.nama_bab;
                            babSelect.appendChild(option);

                            if (index === 0) {
                                temp = bab.kode_bab; // Simpan data pertama
                            }
                        });
                    }
                    // Panggil isiSubBab setelah data pertama dipastikan
                    if (temp) {
                        isiSubBab(temp);
                    }
                })
                .catch(error => console.error("Error fetching bab data:", error));
        });


        document.getElementById("pilihBab").addEventListener("change", function() {
            console.log()
            isiSubBab(this.value);
        });

        function isiSubBab(temp) {
            const idBab = temp
            const materi = document.getElementById("pilihMateri");
            const bab = document.getElementById("pilihBab");
            const selectedMateri = materi.options[materi.selectedIndex].text;
            const selectedBab = bab.options[bab.selectedIndex].text;
            const subbabContainer = document.getElementById("subbabContainer");
            console.log("ID Bab:", idBab, "Materi yang dipilih:", selectedMateri);
            subbabContainer.innerHTML = "";
            fetch(`daftar_bc.php?id_bab=${idBab}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0 || (data.length === 1 && data[0].id_subbab === 0)) {
                        subbabContainer.innerHTML = "<p>Tidak ada subbab tersedia</p>";
                    } else {

                        data.forEach(subbab => {
                            const aTag = document.createElement("a");
                            aTag.className = "btn";
                            // aTag.href = `materi.php?id_subbab=${subbab.id_subbab}`;
                            aTag.href = `daftar.php?kode_materi=${materi.options[materi.selectedIndex].value}&kode_bab=${bab.options[bab.selectedIndex].value}&kode_subbab=${subbab.kode_subbab}`;
                            aTag.role = "button";
                            aTag.style =
                                "background-color: white; outline-color: white; height: 10vw; text-align: left; box-shadow: 0vw 0.02vw 0.05vw;";
                            aTag.innerHTML = `
                    <div
                    style="background-color: white; border-radius: 1vw; width: 27vw;  padding: 1vw; height: 8vw; ">
                    <table style="border-collapse: collapse;">
                        <tr>
                            <td rowspan="4" style="padding-right: 1.5vw;"><img src="image/Bab.png" width="60"
                                    height="60"></td>
                            <td style="font-size: 16px; padding-bottom: 0;"><b>${subbab.nama_subbab}</b></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px; padding-top: 0;">${selectedBab} - ${selectedMateri}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.3vw;"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">1/2 subtopik selesai</td>
                            
                        </tr>
                    </table>
                    </div>      
                `;
                            subbabContainer.appendChild(aTag);
                        });
                    }
                })
                .catch(error => console.error("Error fetching subbab data:", error));
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>