document.addEventListener("DOMContentLoaded", function() {
    const overlay = document.getElementById("overlay");
    const popup = document.getElementById("popup");
    const openFormBtn = document.getElementById("openFormBtn");
    const closeFormBtn = document.getElementById("closeFormBtn");

    openFormBtn.addEventListener("click", function() {
        overlay.style.display = "flex";
        setTimeout(() => {
            popup.style.transform = "scale(1)";
            popup.style.opacity = "1";
        }, 100);
    });

    closeFormBtn.addEventListener("click", function() {
        popup.style.transform = "scale(0.7)";
        popup.style.opacity = "0";
        setTimeout(() => {
            overlay.style.display = "none";
        }, 300);
    });

    overlay.addEventListener("click", function(e) {
        if (e.target === overlay) {
            closeFormBtn.click();
        }
    });

    const suggestionForm = document.getElementById("suggestionForm");

    suggestionForm.addEventListener("submit", function(e) {
        e.preventDefault();
        const suggestionForm = document.getElementById("suggestionForm");

suggestionForm.addEventListener("submit", function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);

    fetch("{{ url('/saran') }}", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Terjadi kesalahan saat mengirim data.");
        }
        return response.json();
    })
    .then(data => {
        // Fungsi untuk menangani respons dari server
function handleResponse(response) {
    // Cek apakah respons dari server berhasil atau tidak
    if (response.status === 200) {
        // Jika berhasil, tampilkan pesan sukses atau lakukan tindakan lain yang diinginkan
        console.log("Formulir berhasil dikirim!");
        // Misalnya, tampilkan pesan sukses kepada pengguna
        alert("Formulir berhasil dikirim!");
    } else {
        // Jika tidak berhasil, tampilkan pesan error atau lakukan tindakan lain yang sesuai
        console.error("Gagal mengirim formulir. Terjadi kesalahan pada server.");
        // Misalnya, tampilkan pesan error kepada pengguna
        alert("Gagal mengirim formulir. Terjadi kesalahan pada server.");
    }
}

// Fungsi untuk mengirim data formulir ke server
function sendDataToServer(formData) {
    // URL server Anda
    const urlServer = "https://www.example.com/submit_form.php";

    // Konfigurasi pengiriman data ke server menggunakan Fetch API
    fetch(urlServer, {
        method: 'POST', // Metode pengiriman data (POST)
        body: formData // Data formulir yang akan dikirim
    })
    .then(response => handleResponse(response)) // Tangani respons dari server
    .catch(error => console.error("Gagal mengirim formulir:", error)); // Tangani jika terjadi kesalahan
}

// Fungsi untuk menangani pengiriman formulir
function handleSubmit(event) {
    event.preventDefault(); // Menghentikan perilaku default formulir (misalnya, reload halaman)

    // Dapatkan data formulir
    const form = document.getElementById('myForm');
    const formData = new FormData(form);

    // Kirim data formulir ke server
    sendDataToServer(formData);
}

// Mendengarkan saat formulir disubmit
const form = document.getElementById('myForm');
form.addEventListener('submit', handleSubmit);

        console.log(data);
        alert("Terima kasih atas saran dan pengaduan Anda!");
        closeFormBtn.click();
    })
    .catch(error => {
        console.error("Error:", error.message);
        alert("Terjadi kesalahan saat mengirim data.");
    });
});

        alert("Terima kasih atas saran dan pengaduan Anda!");
        closeFormBtn.click();
    });
});
