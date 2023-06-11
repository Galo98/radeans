let slideIndex = 0;
showSlide(slideIndex);

function prevSlide() {
    showSlide(slideIndex -= 1);
}

function nextSlide() {
    showSlide(slideIndex += 1);
}

function showSlide(n) {
    const cards = document.getElementsByClassName("card");
    const prevButton = document.getElementsByClassName("prev-slide");
    const nextButton = document.getElementsByClassName("next-slide");

    if (n < 0) {
        slideIndex = cards.length - 1;
    } else if (n >= cards.length) {
        slideIndex = 0;
    }

    for (let i = 0; i < cards.length; i++) {
        cards[i].style.display = "none";
    }

    cards[slideIndex].style.display = "flex";

    // Ajustar las clases de la tarjeta activa
    for (let i = 0; i < cards.length; i++) {
        cards[i].classList.remove("active");
    }

    cards[slideIndex].classList.add("active");

    // Calcular el desplazamiento del slider
    const slideWidth = cards[0].offsetWidth;
    const slideOffset = -slideWidth * slideIndex;

    // Aplicar la animación de deslizamiento
    document.querySelector(".slider-containerCards").style.transform = `translateX(${slideOffset}px)`;
}

