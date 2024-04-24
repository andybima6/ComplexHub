var modal = document.getElementById('myModal');
var btn = document.getElementById('openModal');
var closeBtn = document.getElementById('closeModal');

btn.onclick = function() {
    modal.style.display = 'block';
}

closeBtn.onclick = function() {
    modal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

