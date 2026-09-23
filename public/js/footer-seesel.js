document.addEventListener("DOMContentLoaded", () => {

    const anio = document.getElementById("footerSeeselAnio");

    if (anio) {
        anio.textContent = new Date().getFullYear();
    }

});
