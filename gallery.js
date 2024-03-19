const image = document.getElementById('testi');
const overlay = document.querySelector('.overlay-img');

image.addEventListener('click', () => {
  overlay.classList.toggle('show');
});