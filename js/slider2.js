const slider2 = document.querySelector(".punt-cards"),
    firstImg2 = slider2.querySelectorAll("card")[0];

flechas2 = document.querySelectorAll(".punt-cards i");

let drag2 = false, isDraggin2, prevPageX2, prevScrollLeft2, positionDiff2;
let firstImg2Width = firstImg2.clientWidth + 14; // Agarramos el width de la primera imagen y le agregamos 14 px de margen

flechas2.forEach(icon => {
    icon.addEventListener("click", () => {
        slider2.scrollLeft += icon.id == "left" ? -firstImg2Width : firstImg2Width;
        showHideIcons2();
        setTimeout(() => showHideIcons2(), 60);
    })
});

const autoSlide2 = () => {
    if (slider2.scrollLeft == (slider2.scrollLeft - slider2.clientWidth)) return;

    positionDiff2 = Math.abs(positionDiff2); // hace los valores positivos
    let firstImg2Width = firstImg2.clientWidth + 14;
    let valDifference = firstImg2Width - positionDiff2;

    if (slider2.scrollLeft > prevScrollLeft2) {
        return slider2.scrollLeft += positionDiff2 > firstImg2Width / 2 ? valDifference : -positionDiff2;
    }
    slider2.scrollLeft -= positionDiff2 > firstImg2Width / 2 ? valDifference : -positionDiff2;
}

const showHideIcons2 = () => {
    // Muestra o esconde las flechas2 de movimiento seguin la posicion del slide
    let scrollWidth = slider2.scrollWidth - slider2.clientWidth; // Toma el maximo width scrolleable
    flechas2[0].style.display = slider2.scrollLeft == 0 ? "none" : "block";
    flechas2[1].style.display = slider2.scrollLeft == scrollWidth ? "none" : "block";
}

const activar2 = (e) => {
    // Actualizacion de las variables globales cuando se hace click
    drag2 = true;
    prevPageX2 = e.pageX || e.touches[0].pageX;
    prevScrollLeft2 = slider2.scrollLeft;
}

const parar2 = () => {
    drag2 = false;
    slider2.classList.remove("dragging");
    if (!isDraggin2) return;
    isDraggin2 = false;
    autoSlide2();
}

const arrastrar2 = (e) => {
    // Movimiento de las imagenes en el slider2
    if (!drag2) return;
    e.preventDefault();
    isDraggin2 = true;
    slider2.classList.add("dragging");
    positionDiff2 = (e.pageX || e.touches[0].pageX) - prevPageX2;
    slider2.scrollLeft = prevScrollLeft2 - positionDiff2;
    showHideIcons2()
}

slider2.addEventListener("mousedown", activar2)
slider2.addEventListener("touchstart", activar2)

slider2.addEventListener("mouseup", parar2)
slider2.addEventListener("touchmove", parar2)

slider2.addEventListener("mousemove", arrastrar2);


slider2.addEventListener("mouseleave", parar2)
slider2.addEventListener("touchend", parar2)