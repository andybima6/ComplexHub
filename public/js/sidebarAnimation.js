// JavaScript untuk mengaktifkan dan menonaktifkan sidebar & Footer
document.addEventListener("DOMContentLoaded", function () {
    const burger = document.querySelector(".burger");
    const sidenav = document.querySelector("#sidenav");

    burger.addEventListener("click", function () {
        document.body.classList.toggle("sidebar-active");
    });

    sidenav.querySelector(".close").addEventListener("click", function () {
        document.body.classList.remove("sidebar-active");
    });
});
burger.onclick = function () {
    document.body.classList.remove("sidebar-active");
};


