const slider = document.querySelector(".slider"),
    firstImg = slider.querySelectorAll("img")[0];

flechas = document.querySelectorAll(".contenedorSlider i");

let drag = false, isDraggin, prevPageX, prevScrollLeft, positionDiff;
let firstImgWidth = firstImg.clientWidth + 14; // Agarramos el width de la primera imagen y le agregamos 14 px de margen

flechas.forEach(icon => {
    icon.addEventListener("click", () => {
        slider.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        showHideIcons();
        setTimeout(() => showHideIcons(), 60);
    })
});

const autoSlide = () => {
    if (slider.scrollLeft == (slider.scrollLeft - slider.clientWidth)) return;

    positionDiff = Math.abs(positionDiff); // hace los valores positivos
    let firstImgWidth = firstImg.clientWidth + 14;
    let valDifference = firstImgWidth - positionDiff;

    if (slider.scrollLeft > prevScrollLeft) {
        return slider.scrollLeft += positionDiff > firstImgWidth / 2 ? valDifference : -positionDiff;
    }
    slider.scrollLeft -= positionDiff > firstImgWidth / 2 ? valDifference : -positionDiff;
}

const showHideIcons = () => {
    // Muestra o esconde las flechas de movimiento seguin la posicion del slide
    let scrollWidth = slider.scrollWidth - slider.clientWidth; // Toma el maximo width scrolleable
    flechas[0].style.display = slider.scrollLeft == 0 ? "none" : "block";
    flechas[1].style.display = slider.scrollLeft == scrollWidth ? "none" : "block";
}

const activar = (e) => {
    // Actualizacion de las variables globales cuando se hace click
    drag = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = slider.scrollLeft;
}

const parar = () => {
    drag = false;
    slider.classList.remove("dragging");
    if (!isDraggin) return;
    isDraggin = false;
    autoSlide();
}

const arrastrar = (e) => {
    // Movimiento de las imagenes en el slider
    if (!drag) return;
    e.preventDefault();
    isDraggin = true;
    slider.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    slider.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons()
}

slider.addEventListener("mousedown", activar)
slider.addEventListener("touchstart", activar)

slider.addEventListener("mouseup", parar)
slider.addEventListener("touchmove", parar)

slider.addEventListener("mousemove", arrastrar);


slider.addEventListener("mouseleave", parar)
slider.addEventListener("touchend", parar)