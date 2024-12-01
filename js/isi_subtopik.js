let totalContents = 0;

// Konversi data menjadi array sesuai struktur
const akhir = isi_subtopik.reduce((acc, item) => {
  let teksAkhir = "Lanjut"; // Default teksAkhir
  if (item.keterangan === "cocok") {
    teksAkhir = "Cek";
  } else if (item.keterangan === "pilgan") {
    teksAkhir = "Pilihan";
  }

  acc[item.nomor] = {
    deskripsiPetunjuk: item.petunjuk,
    teksAkhir: teksAkhir,
    cek: false,
  };

  totalContents++;

  return acc;
}, {});

// console.log(akhir);
console.log(isi_subtopik);

let currentContentIndex = 5;
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
  } else {
    Swal.fire({
      title: "Subtopik Selesai",
      text: "Selamat, Anda telah menyelesaikan subtopik ini",
      icon: "success",
      confirmButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'materi.php'
      }
    });
  }
}

function cekHalaman() {
  console.log(
    `Index: ${currentContentIndex}, Teks Akhir: ${akhir[currentContentIndex].teksAkhir}`
  );
  if (akhir[currentContentIndex].teksAkhir === "Cek") {
    checkAnswer();
  } else if (
    akhir[currentContentIndex].teksAkhir === "Pilihan" ||
    currentContentIndex === 6
  ) {
    tombolAkhir.style.display = "none";
  } else {
    nextContent();
  }
}

function showContent(id) {
  tombolAkhir.innerText = akhir[currentContentIndex].teksAkhir;
  deskAkhir.innerText = akhir[currentContentIndex].deskripsiPetunjuk;

  // Sembunyikan semua konten terlebih dahulu
  var contents = document.querySelectorAll(".content");
  contents.forEach((content) => content.classList.remove("active"));

  // Tampilkan konten yang dipilih
  document.getElementById(id).classList.add("active");

  // Update index saat pengguna memilih langsung
  currentContentIndex = parseInt(id.replace("materi", ""));

  // Hapus highlight dari semua tombol
  for (let i = 1; i <= totalContents; i++) {
    document.getElementById(`btn-materi${i}`).classList.remove("active-button");
  }

  // Tambahkan highlight pada tombol aktif
  document
    .getElementById(`btn-materi${currentContentIndex}`)
    .classList.add("active-button");
}

function placeAnswer(element) {
  // Cari slot kosong dalam answer-slot
  const emptySlot = document.querySelector("#answer-slot div:empty");
  if (emptySlot) {
    // Isi slot kosong dengan jawaban yang dipilih
    emptySlot.innerText = element.innerText;
    emptySlot.dataset.value = element.innerText;
    element.style.display = "none"; // Sembunyikan pilihan dari area pilihan
  }
}

function removeAnswer(slot) {
  // Hanya jalankan jika slot berisi jawaban
  if (slot.dataset.value) {
    // Cari elemen di choices yang teksnya sama dengan slot yang dihapus
    const choice = Array.from(document.querySelectorAll("#choices div")).find(
      (el) => el.innerText === slot.dataset.value && el.style.display === "none"
    );
    if (choice) {
      choice.style.display = "block"; // Tampilkan kembali pilihan di area pilihan
    }
    // Hapus jawaban dari slot
    slot.innerText = "";
    slot.removeAttribute("data-value");
  }
}

function checkAnswer() {
  // Ambil semua jawaban yang sudah diisi
  const answer = Array.from(document.querySelectorAll("#answer-slot div"))
    .map((div) => div.dataset.value || "")
    .join(" ");

  const jawabanCocok = isi_subtopik
    .filter(item => item.keterangan === "cocok") // Filter objek dengan keterangan = "cocok"
    .map(item => item.jawaban); // Ambil hanya nilai dari properti 'jawaban'

  console.log(jawabanCocok);

  if (jawabanCocok.includes(answer)) {
    hasil.innerText = "Benar!";
    tombolAkhir.innerText = "Lanjut";
    setTimeout(() => nextContent(), 3000);
  } else {
    hasil.innerText = "Salah, coba lagi.";
  }
}

function tentukan(nomor) {
  // Reset warna dan kelas pada semua tombol
  banyakPernyataan.forEach((pernyataan) => {
    pernyataan.classList.remove("benar", "salah");
    pernyataan.style.backgroundColor = "";
  });
  // Cek jawaban
  if (nomor === pernyataanBenar) {
    hasilPilihan.innerText = "Jawaban Anda Benar!";
    document
      .querySelector(`#pernyataan-${pernyataanBenar}`)
      .classList.add("benars");

    // Tampilkan tombol "Lanjut"
    tombolAkhir.innerText = "Lanjut";
    tombolAkhir.style.display = "inline";
    tombolAkhir.onclick = nextContent;
  } else {
    hasilPilihan.innerText = "Jawaban Anda Salah, coba lagi.";
    document
      .querySelector(`#pernyataan-${pernyataanBenar}`)
      .classList.add("benar");
  }
}

// Tampilkan materi 1 secara default dan berikan highlight pada tombolnya
showContent("materi1");
