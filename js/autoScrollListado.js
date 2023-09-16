window.onload = function () {
    // Selecciona el elemento al que deseas desplazarte
    var elemento = document.getElementById("edi");

    // Verifica si el elemento existe en la página
    if (elemento) {
        // Utiliza scrollIntoView para desplazarte hacia el elemento
        elemento.scrollIntoView({ behavior: "smooth", block: "center" });
    }
};

