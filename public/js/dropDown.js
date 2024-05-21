const keuangan = document.getElementById('dropdown-keuangan')
const umkm =document.getElementById('dropdown-umkm')
const kegiatan =document.getElementById('dropdown-kegiatan')
function toggleDropdown(keuangan) {
    var dropdown = document.getElementById(keuangan);
    if (dropdown.style.display === 'none') {
        dropdown.style.display = 'block';
    } else {
        dropdown.style.display = 'none';
    }
}
function toggleDropdown(umkm) {
    var dropdown = document.getElementById(umkm);
    if (dropdown.style.display === 'none') {
        dropdown.style.display = 'block';
    } else {
        dropdown.style.display = 'none';
    }
}

function toggleDropdown(kegiatan) {
    var dropdown = document.getElementById(kegiatan);
    if (dropdown.style.display === 'none') {
        dropdown.style.display = 'block';
    } else {
        dropdown.style.display = 'none';
    }
}


