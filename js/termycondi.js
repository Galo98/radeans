const ancCondi = document.querySelector("#condiciones");
const secCondi = document.querySelector("#secTYC");
const btnCierre = document.querySelector("#btnCierre");

ancCondi.addEventListener("click", (event) => {
    event.preventDefault();
    console.log("se hizo click en t y c");
    secCondi.classList.remove("off");
    window.scrollTo(0, 0);


});


btnCierre.addEventListener("click", (event) => {
    event.preventDefault();
    console.log("Se hizo click en el boton de cierre");
    secCondi.classList.add("off");
    
})
