<?php
include 'function.php';
session_start();

$id = $_SESSION['user_id'];

// Ambil data dari request
$selectedSubjects = isset($_POST['subjects']) ? $_POST['subjects'] : []; 
$nearbyMentors = isset($_POST['nearbyMentors']) ? $_POST['nearbyMentors'] : []; 

// var_dump($selectedSubjects[0]);
//  var_dump($nearbyMentors);

$filteredMentors = [];

// Cek tiap mentor
foreach ($nearbyMentors as $mentor) {
    $id_mentor = $mentor['id'];
    // Ambil data pelajaran mentor dari database
    $pelajaran = ambilData("SELECT * FROM data_mentor WHERE id_user = $id_mentor");
    $subjects = explode(';', $pelajaran[0]['materi']); // Pecah pelajaran menjadi array

    $foundMatch = false;
    foreach ($selectedSubjects as $selectedSubject) {
        if (in_array($selectedSubject, $subjects)) {
            $foundMatch = true;
        }
    }

    // Cek apakah pelajaran yang dipilih ada di array subjects
    if ($foundMatch || empty($selectedSubjects)) {
?>
<table style="background-color: #4D62A5; border-radius: 1vw; margin-bottom: 1vw;">
    <tr>
        <td rowspan="2">
            <img src="./image/user.png" width="30" height="30" style="margin-left: 2vw; margin-top: 1vw;">
        </td>
        <td colspan="2" style="color: white; padding-top: 1vw;">
            Mentor <?= htmlspecialchars($mentor['nama']); ?>, S.Komedi
        </td>
    </tr>
    <tr>
        <td colspan="2" style="color: white; font-size: 12px; border-bottom: 1px solid white;">
            <img src="./image/pin.png" width="17" height="17">
            <?= htmlspecialchars($mentor['jarak']); ?> Km
        </td>
    </tr>
    <tr>
        <td style="padding: 5px;"></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="materi_ajar" colspan="3">
            <div style="display: flex; flex-wrap: wrap;">
                <?php
                foreach ($subjects as $subject) {
                    if($subject == 'MM'){
                        $subjec = "Matematika";
                        $btn = "btn-danger";
                    }else if($subject == 'Bing'){
                        $subject = "Bahasa Inggris";
                        $btn = "btn-warning";
                    }else if($subject == 'Daspro'){
                        $subject = "Dasar Pemrograman";
                        $btn = "btn-secondary";
                    }else if($subject == 'UTBK'){
                        $btn = "btn-warning";
                    }else {
                        $btn = "btn-warning";
                    }
                    echo "<div><button type='button' class='btn $btn' 
                        style='font-size: 12px; padding: 5px 12px 5px 12px; border-radius: 1.5vw; margin-left: 1.7vw; margin-right: 0vw;'>"
                        . htmlspecialchars(trim($subject)) . "</button></div>";
                }
                ?>
            </div>
        </td>
    </tr>

    <tr>
        <td colspan="3" style="text-align: end; padding: 0 0 4px 0; margin-top: 0;">
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal<?= $mentor['id']; ?>"
                style="color: white; font-size: 12px; margin-right: 1vw;">
                Pesan Jasa
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal<?= $mentor['id']; ?>" tabindex="-1"
                aria-labelledby="modalLabel<?= $mentor['id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-transparent">
                        <div style="text-align: right; margin-right: 0.8vw;">
                            <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                style="margin-top: 0.7vw; margin-right: 0.7vw; background-color: white; border-radius: 5vw; font-size: 15px; padding: 0px 0.2vw">
                                &nbsp;X&nbsp;</button>
                        </div>
                        <div class="modal-body">
                            <div
                                style="display: flex; background-color: #375679; border-radius: 0.5vw; margin-bottom: 2vw;">
                                <div
                                    style="margin-top: 0.8vw; color: #F6F7FA; border-radius: 4vw; font-size: 1.5vw; padding-left: 0.25vw; padding-right: 0.25vw; margin: 1.2vw 1vw 1.2vw 2.5vw;">
                                    Pesan jasa mentor OTODU
                                </div>
                            </div>

                            <div style="display: flex; justify-content: space-around">
                                <div
                                    style="width: 40vw; height: 30vw; background-color: white; border-radius: 0.5vw; margin:0; padding: 2vw; overflow-y: auto">
                                    <center>
                                        <div style="display: flex; align-items: center;">
                                            <img src="image/user.png" alt="User Image"
                                                style="width: 50px; margin-right: 15px; margin:0; padding:0 ">

                                            <div
                                                style="display: flex; flex-direction: column; border-bottom: 1px solid black; margin:0; padding: 0; margin-left: 1vw; width:30vw;">
                                                <p style="margin: 0; padding: 0; text-align: left">
                                                    <?= htmlspecialchars($mentor['nama']); ?>,
                                                    S.Komedi
                                                </p>
                                                <div style="display: flex; align-items: center; margin: 0; padding: 0">
                                                    <img src="image/pinhitam.png" alt="Location Pin"
                                                        style="width: 20px; margin-right: 5px;">
                                                    <div><?= htmlspecialchars($mentor['jarak']); ?>
                                                        Km
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div
                                            style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                            <font
                                                style="border-bottom: 1px solid #3A425A; width: 20vw; text-align: left; margin-top: 1.5vw">
                                                Mengajar</font>
                                        </div>

                                        <div style="display: flex; gap: 10px; align-items: center; margin-top: 1vw;">
                                            <b>
                                                <span
                                                    style="padding: 7px 23px; background-color: #793738; color: white; border-radius: 15px; font-size: 13px;">Matematika</span>
                                                <span
                                                    style="padding: 7px 23px; background-color: #6C3779; color: white; border-radius: 15px; font-size: 13px;">Dasar
                                                    Pemrograman</span>
                                                <span
                                                    style="padding: 7px 23px; background-color: #89622B; color: white; border-radius: 15px; font-size: 13px;">UTBK</span>
                                            </b>
                                        </div>

                                        <div
                                            style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                            <font
                                                style="border-bottom: 1px solid #3A425A; width: 20vw; text-align: left; margin-top: 1.5vw">
                                                Ketersediaan</font>
                                        </div>

                                        <div style="display: grid; gap: 10px; margin:auto; margin-top: 1vw;">
                                            <span
                                                style="padding: 7px 23px; background-color: #377939; color: white; border-radius: 13px; font-size: 13px; width: fit-content"><b>Luring
                                                    @ 13:00 - 16:00, 16:30 - 19:00</b></span>
                                            <span
                                                style="padding: 7px 23px; background-color: #6A7937; color: white; border-radius: 13px; font-size: 13px; width: fit-content"><b>Daring
                                                    @ 13:00 - 16:00, 16:30 - 19:00, 19:30 -
                                                    22:30</b></span>
                                        </div>

                                        <div
                                            style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                            <font
                                                style="border-bottom: 1px solid #3A425A; width: 20vw; text-align: left; margin-top: 1.5vw">
                                                Riwayat studi</font>
                                        </div>

                                        <div
                                            style="display: flex; flex-direction: column; gap: 5px; margin-top: 1vw; align-items: flex-start;">
                                            <p style="font-size: 16px; color: #3A425A; margin: 0;">
                                                Sarjana Ilmu Komedi - Universitas
                                                Kampus Institut</p>
                                            <p style="font-size: 16px; color: #3A425A; margin: 0;">
                                                Magister Sastra Mesin - Institut
                                                Teknologi Dimensi</p>
                                        </div>

                                    </center>
                                </div>
                                <div
                                    style="width: 40vw; height: 30vw; background-color: white; border-radius: 0.5vw; padding: 2vw; overflow-y: auto">
                                    <div style="margin-top: 1vw; text-align: center;">

                                        <div
                                            style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                            <font>Materi yang ingin dipelajari</font>
                                        </div>

                                        <div
                                            style="margin-top: 10px; display: flex; flex-direction: column; align-items: flex-start;">
                                            <select
                                                style="padding: 10px 20px; font-size: 16px; color: #3A425A; border: 1px solid #3A425A; border-radius: 5px; width: 100%;">
                                                <option value="matematika" style="font-weight: bold;">
                                                    Matematika</option>
                                            </select>
                                        </div>

                                        <div style="margin-top: 1vw; text-align: center;">

                                            <div
                                                style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                <font>Topik</font>
                                            </div>

                                            <div
                                                style="margin-top: 10px; display: flex; flex-direction: column; align-items: flex-start;">
                                                <select
                                                    style="padding: 10px 20px; font-size: 16px; color: #3A425A; border: 1px solid #3A425A; border-radius: 5px; width: 100%;">
                                                    <option value="Fungsi" style="font-weight: bold;">
                                                        Matematika
                                                    </option>
                                                </select>
                                            </div>

                                            <div style="margin-top: 1vw; text-align: center;">

                                                <div
                                                    style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                    <font>Daring/ luring</font>
                                                </div>

                                                <div
                                                    style="margin-top: 10px; display: flex; flex-direction: column; align-items: flex-start;">
                                                    <select
                                                        style="padding: 10px 20px; font-size: 16px; color: #3A425A; border: 1px solid #3A425A; border-radius: 5px; width: 100%;">
                                                        <option value="Fungsi" style="font-weight: bold;">Daring
                                                        </option>
                                                    </select>
                                                </div>

                                                <div style="margin-top: 1vw; text-align: center;">

                                                    <div
                                                        style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                        <font>Jam belajar</font>
                                                    </div>

                                                    <div
                                                        style="margin-top: 10px; display: flex; flex-direction: column; align-items: flex-start;">
                                                        <select
                                                            style="padding: 10px 20px; font-size: 16px; color: #3A425A; border: 1px solid #3A425A; border-radius: 5px; width: 100%;">
                                                            <option value="matematika" style="font-weight: bold;">13:00
                                                                -
                                                                14:00 WIB</option>
                                                        </select>
                                                    </div>

                                                    <div style="margin-top: 1vw; text-align: center;">

                                                        <div
                                                            style="color: #3A425A; padding-bottom: 4px; display: flex; align-items: center;">
                                                            <font>Deskripsi materi yang ingin
                                                                dipelajari</font>
                                                        </div>

                                                        <div
                                                            style="margin-top: 10px; display: flex; flex-direction: column; align-items: flex-start;">
                                                            <textarea
                                                                style="font-weight: bold; padding: 10px 20px; font-size: 16px; color: #3A425A; border: 1px solid #3A425A; border-radius: 5px; width: 100%; text-align:left">Izin kak, aku belum terlalu paham tentang fungsi komposisi, aku ada beberapa soal yang mungkin bisa tolong kak mentor ajar samaku? Terimakasih sebelumnya kak
                                                                            </textarea>
                                                        </div>

                                                        <div style="margin-top: 1vw; text-align: center;">
                                                            <button
                                                                style="margin-top: 20px; padding: 10px 0; background-color: #FF6F00; color: white; border: none; border-radius: 5px; font-size: 16px; width: 100%; text-align: center;">
                                                                Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>

<?php
}

}
?>