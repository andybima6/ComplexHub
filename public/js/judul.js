 // Menangkap semua elemen dengan kelas 'pointer'
 const menuItems = document.querySelectorAll('.pointer');

 // Loop melalui setiap elemen dan tambahkan event listener
 menuItems.forEach(item => {
     item.addEventListener('click', () => {
         // Mengambil teks dari elemen yang diklik
         const menuText = item.querySelector('span').innerText;
         // Mengganti teks pada elemen dengan ID 'card-title'
         document.getElementById('card-title').innerText = menuText;
     });
 });
