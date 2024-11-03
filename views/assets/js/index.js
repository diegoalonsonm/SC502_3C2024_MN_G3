// aqui van a ir las funciones de js

let currentIndex = 0;
const totalItems = document.querySelectorAll('.carousel-item').length;
const carousel = document.querySelector('.carousel');
const carouselPrev = document.getElementById('carousel-prev');
const carouselNext = document.getElementById('carousel-next');

function autoSlide() {
    moveSlide(1);
}

let autoSlideInterval = setInterval(autoSlide, 3000);

carousel.addEventListener('mouseover', () => {
    clearInterval(autoSlideInterval);
});

carousel.addEventListener('mouseout', () => {
    autoSlideInterval = setInterval(autoSlide, 3000);
});


function moveSlide(direction) {
    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = totalItems - 1;
    } else if (currentIndex >= totalItems) {
        currentIndex = 0;
    }

    const offset = -currentIndex * 100;
    carousel.style.transform = `translateX(${offset}%)`;

    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(autoSlide, 3000);
}

carouselPrev.addEventListener('click', () => moveSlide(-1));
carouselNext.addEventListener('click', () => moveSlide(1));