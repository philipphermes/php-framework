const nav = document.getElementById('phone-nav');
const hide = document.getElementById('phone-nav-hide');
const show = document.getElementById('phone-nav-show');

nav.classList.add('hidden');

hide.addEventListener('click', () => {
   nav.classList.add('hidden');
});

show.addEventListener('click', () => {
   nav.classList.remove('hidden');
});