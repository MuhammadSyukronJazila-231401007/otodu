<?php
include 'function.php';
session_start();

$id = $_SESSION['user_id'];

if( $_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER["CONTENT_TYPE"]
 === "application/json") {
    // Ambil data yang diterima dari permintaan POST
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);
    $kode_subbab = $data['kode_subabb'];
    $indeks_terpilih;
    $nama_terpilih;
    $video_topik;
    $rangkuman_topik;
    $topik_terpilih;

    $koin = ambilData("SELECT koin FROM users WHERE id = $id");

    $topik = ambilData("SELECT * FROM topik WHERE kode_subbab=$kode_subbab");

        // Pastikan data kode_topik diterima
    if (isset($data['kode_topik'])) {
        $topik_terpilih = $data['kode_topik'];

        if ($topik_terpilih) {
            // Kembalikan HTML untuk ditampilkan pada halaman
            ?>
            <div class="row" style="margin-left: 1.5vw; margin-right: 1.5vw;">
                <div class="col-md-6">
                    <div class="boxleft box-4">
                        <div class="column d-flex flex-column mb-4 mt-2">
                            <span style="color: #3A425A; margin-left: 0.8vw; font-size: 1.3vw;">Materi NLP</span>
                            <div style="height: 0.1vw; width: 20vw; background-color: #3A425A; margin-left: 0.8vw;"></div>
                        </div>

                        <!-- Konten topik -->
                        <?php foreach ($topik as $index => $item): ?>
                            <?php if ($item['kode_topik'] == $topik_terpilih): ?>
                            <?php $indeks_terpilih = $index + 1; $nama_terpilih = $item['nama_topik']; ?>
                            <div class="row" style="margin-left: 0vw;">
                                <div class="inner-box topik-box"
                                    id="topik_<?php echo $item['kode_topik']; ?>"
                                    onclick="selectTopik(<?php echo $item['kode_topik']; ?>)"
                                    style="background-color: #375679; width: 30vw; margin-right: 3vw; cursor: pointer;">
                                <img src="image/0<?php echo $index + 1; ?>.png" style="width: 1.5vw;">
                                <b><?php echo htmlspecialchars($item['nama_topik']);?></b>
                                </div>
                                <div class="inner-box mulai" style="background-color: #46CC6A; color: #24384E; width: 7vw; 
                                    align-items: center; display: flex; justify-content: center; cursor: pointer" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <b>Mulai</b>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="inner-box topik-box"
                                id="topik_<?php echo $item['kode_topik']; ?>"
                                onclick="selectTopik(<?php echo $item['kode_topik']; ?>)">
                            <img src="image/0<?php echo $index + 1; ?>.png" style="width: 1.5vw;">
                                <?php echo htmlspecialchars($item['nama_topik']);?>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxleft box-4">
                        <!-- Rangkuman dan video sesuai dengan topik yang dipilih -->
                        <?php 
                            // Cari data topik yang dipilih
                            $topik_aktif = array_filter($topik, fn($item) => $item['kode_topik'] == $topik_terpilih);
                            $topik_aktif = reset($topik_aktif); // Ambil elemen pertama dari hasil filter
                            $video_topik = $topik_aktif['video_url'];
                            $rangkuman_topik = $topik_aktif['rangkuman'];
                        ?>
                        <div class="column d-flex flex-column mb-4">
                            <span style="color: #3A425A; margin-left: 0.8vw; display:flex;">
                                <span style="font-size: 1.3vw;">
                                    Rangkuman Materi
                                </span>
                                <div style="width: fit-content; border-radius: 4vw; font-size: 1vw; background-color: #F6F7FA; padding-left: 0.25vw; padding-right: 0.25vw; margin: 0.3vw 1vw 1.2vw 2.5vw; color: #375679">
                                    0<?php echo $indeks_terpilih ?>
                                </div>
                            </span>
                            <div style="height: 0.1vw; width: 20vw; background-color: #3A425A; margin-left: 0.8vw;"></div>
                        </div>
                        <div class="inner-box column d-flex flex-column mb-3" style="background-color: #ffffff; border: 0.1vw solid #B2B5BF; align-items: center;">
                            <!-- <img width="420vw"> -->
                            <video width="400vw" style="border-radius: 0.5vw;" controls>
                                <source src="<?php echo htmlspecialchars($topik_aktif['video_url']); ?>">
                            </video>
                            <p style="color: #1F2844; font-size: 1vw; margin-left: 4.5vw; margin-right: 4.5vw; margin-top: 1vw; text-align:justify;">
                                <?php echo nl2br(htmlspecialchars($topik_aktif['rangkuman'])); ?>
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
                                    0<?php echo $indeks_terpilih ?>
                                </div>
                                <div style="margin-top: 0.8vw; color: #F6F7FA;">
                                    <?php echo htmlspecialchars($nama_terpilih);?>
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
                                            <?php $subtopik = ambilData("SELECT * FROM subtopik WHERE kode_topik = $topik_terpilih"); ?>
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
                                                            <form method="post" class="form-beli">
                                                                <input type="hidden" name="kode_subtopik" value="<?= $rowsub['kode_subtopik'] ?>">
                                                                <input type="hidden" name="harga" value="<?= $rowsub['harga'] ?>">
                                                                <?php 
                                                                    $kode_subtopik_pilih  = $rowsub['kode_subtopik'];
                                                                    $status_bayar = ambilData("SELECT * FROM beli_subtopik 
                                                                    WHERE kode_subtopik = $kode_subtopik_pilih AND id_user = $id"); 
                                                                ?>
                                                                <?php if ($status_bayar): ?>
                                                                    <button type="submit" class="btn" style="background-color: #96AA03; color: white;">
                                                                        Buka
                                                                        <span style="text-decoration: line-through; text-decoration-color: black;">
                                                                            <img src="./image/coin.png" width="20" height="20" style="vertical-align: middle;">
                                                                            <?= $rowsub['harga']; ?>
                                                                        </span>
                                                                    </button>
                                                                <?php else: ?>
                                                                    <button type="submit" class="btn btn-beli" style="background-color: #96AA03; color: white;"
                                                                        data-harga="<?= $rowsub['harga'] ?>" data-nama="<?= $rowsub['nama_subtopik']; ?>">
                                                                        Beli
                                                                        <img src="./image/coin.png" width="20" height="20" style="vertical-align: middle;">
                                                                        <?= $rowsub['harga']; ?>
                                                                    </button>
                                                                <?php endif; ?>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" style="padding: 0.7vw;"></td>
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
                                                            <form method="post" class="form-beli">
                                                                <input type="hidden" name="kode_subtopik" value="<?= $rowsub['kode_subtopik'] ?>">
                                                                <input type="hidden" name="harga" value="<?= $rowsub['harga'] ?>">
                                                                <?php 
                                                                    $kode_subtopik_pilih  = $rowsub['kode_subtopik'];
                                                                    $status_bayar = ambilData("SELECT * FROM beli_subtopik 
                                                                    WHERE kode_subtopik = $kode_subtopik_pilih AND id_user = $id"); 
                                                                ?>
                                                                <?php if ($status_bayar): ?>
                                                                    <button type="submit" class="btn" style="background-color: #96AA03; color: white;">
                                                                        Buka
                                                                        <span style="text-decoration: line-through; text-decoration-color: black;">
                                                                            <img src="./image/coin.png" width="20" height="20" style="vertical-align: middle;">
                                                                            <?= $rowsub['harga']; ?>
                                                                        </span>
                                                                    </button>
                                                                <?php else: ?>
                                                                    <button type="submit" class="btn btn-beli" style="background-color: #96AA03; color: white;"
                                                                        data-harga="<?= $rowsub['harga'] ?>" data-nama="<?= $rowsub['nama_subtopik']; ?>">
                                                                        Beli
                                                                        <img src="./image/coin.png" width="20" height="20" style="vertical-align: middle;">
                                                                        <?= $rowsub['harga']; ?>
                                                                    </button>
                                                                <?php endif; ?>
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
                                                            <form method="post" class="form-beli" >
                                                                <input type="hidden" name="kode_subtopik" value="<?= $rowsub['kode_subtopik'] ?>">
                                                                <input type="hidden" name="harga" value="<?= $rowsub['harga'] ?>">
                                                                <?php 
                                                                    $kode_subtopik_pilih  = $rowsub['kode_subtopik'];
                                                                    $status_bayar = ambilData("SELECT * FROM beli_subtopik 
                                                                    WHERE kode_subtopik = $kode_subtopik_pilih AND id_user = $id"); 
                                                                ?>
                                                                <?php if ($status_bayar): ?>
                                                                    <button type="submit" class="btn" style="background-color: #96AA03; color: white;">
                                                                        Buka
                                                                        <span style="text-decoration: line-through; text-decoration-color: black;">
                                                                            <img src="./image/coin.png" width="20" height="20" style="vertical-align: middle;">
                                                                            <?= $rowsub['harga']; ?>
                                                                        </span>
                                                                    </button>
                                                                <?php else: ?>
                                                                    <button type="submit" class="btn btn-beli" style="background-color: #96AA03; color: white;"
                                                                        data-harga="<?= $rowsub['harga']; ?>" data-nama="<?= $rowsub['nama_subtopik']; ?>">
                                                                        Beli
                                                                        <img src="./image/coin.png" width="20" height="20" style="vertical-align: middle;">
                                                                        <?= $rowsub['harga']; ?>
                                                                    </button>
                                                                <?php endif; ?>
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
                                            <source src="<?php echo htmlspecialchars($video_topik); ?>">
                                        </video>
                                    </div>
                                    <div style="padding-left: 4vw; padding-right: 4vw; padding-top: 1vw; font-size: 1.2vw; color: #1F2844">
                                        <?php echo nl2br(htmlspecialchars($rangkuman_topik)); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "<p>Topik tidak ditemukan.</p>";
        }
    } else {
        echo "<p>Kode topik tidak disediakan.</p>";
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $koin = ambilData("SELECT koin FROM users WHERE id = $id");
    $kode_subtopik_pilih = trim($_POST['kode_subtopik']);
    $harga_subtopik = trim($_POST['harga']);
    $status_bayar = ambilData("SELECT * FROM beli_subtopik WHERE kode_subtopik = $kode_subtopik_pilih AND id_user = $id");

    if ($status_bayar)  {
        if($kode_subtopik_pilih == 1){
           echo "isi_subtopik.php";
        }else{
            echo "isi_subtopik2.php";
        }

        exit;
    } else if ($koin[0]['koin'] >= $harga_subtopik) {
        // Update koin
        $new_koin = $koin[0]['koin'] - $harga_subtopik;
        mysqli_query($conn, "UPDATE users SET koin = $new_koin WHERE id = $id;");
        mysqli_query($conn, "INSERT INTO beli_subtopik (kode_subtopik, id_user) VALUES ($kode_subtopik_pilih, $id);");

        // Redirect ke halaman isi_subtopik
        if ($kode_subtopik_pilih == 1) {
            echo 'Selamat anda telah membeli subtopik ini!';
        } else {
            echo 'Selamat anda telah membeli subtopik ini!';
        }
        
        exit();
    } else {
        echo 'Koin anda belum cukup!';
    }
}
?>