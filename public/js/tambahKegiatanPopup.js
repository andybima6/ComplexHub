function saveData() {
    var namaKegiatan = document.getElementById("namaKegiatan").value;
    var keterangan = document.getElementById("keterangan").value;
    var lingkup = document.getElementById("lingkup").value;

    var table = document.getElementById("tabelBody");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = namaKegiatan;
    cell2.innerHTML = keterangan;
    cell3.innerHTML = lingkup;

    var tabelUsulan = document.getElementById("tabelUsulan");
    tabelUsulan.style.display = "table";

    // Mengubah tampilan bgusulan menjadi tidak terlihat
    document.getElementsByClassName("bgusulan")[0].style.display = "none";

    document.getElementById("myModal").style.display = "none";
    document.getElementById("namaKegiatan").value = "";
    document.getElementById("keterangan").value = "";
    document.getElementById("lingkup").value = "";
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

document.getElementById("openModal").addEventListener("click", function() {
    document.getElementById("myModal").style.display = "block";
});

window.onclick = function(event) {
    if (event.target == document.getElementById("myModal")) {
        document.getElementById("myModal").style.display = "none";
    }
}
