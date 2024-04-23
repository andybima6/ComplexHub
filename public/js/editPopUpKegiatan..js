
var selectedRow; // tambahkan variabel selectedRow di luar fungsi

function editData(rowId) {
    selectedRow = rowId; // atur nilai selectedRow saat tombol "Edit" ditekan
    // Mendapatkan data dari baris yang ingin diedit
    var table = document.getElementById("tabelUsulan");
    var row = table.rows[rowId + 1]; // Karena index dimulai dari 1, maka perlu ditambah 1
    var namaKegiatan = row.cells[1].innerHTML;
    var keterangan = row.cells[2].innerHTML;
    var lingkup = row.cells[5].innerHTML;

    // Mengisi nilai input pada form edit dengan data yang ingin diedit
    document.getElementById("editNamaKegiatan").value = namaKegiatan;
    document.getElementById("editKeterangan").value = keterangan;
    document.getElementById("editLingkup").value = lingkup;

    // Menampilkan modal edit
    document.getElementById("myModalEdit").style.display = "block";
}

document.addEventListener("DOMContentLoaded", function() {
    // Menambahkan event listener untuk tombol "Edit" pada tiap baris tabel
    var editButtons = document.querySelectorAll(".editbutton");
    editButtons.forEach(function(button, index) {
        button.addEventListener("click", function() {
            editData(index);
        });
    });
});

function saveEditData() {
    // Ambil nilai input dari form edit
    var editedNamaKegiatan = document.getElementById("editNamaKegiatan").value;
    var editedKeterangan = document.getElementById("editKeterangan").value;
    var editedLingkup = document.getElementById("editLingkup").value;

    // Simpan nilai input yang sudah diedit ke dalam tabel
    var table = document.getElementById("tabelUsulan");
    var row = table.rows[selectedRow + 1]; // selectedRow adalah indeks baris yang sedang diedit
    row.cells[1].innerHTML = editedNamaKegiatan;
    row.cells[2].innerHTML = editedKeterangan;
    row.cells[5].innerHTML = editedLingkup;

    // Sembunyikan modal edit
    document.getElementById("myModalEdit").style.display = "none";
}
