const proximo = document.querySelectorAll(".proximo");
const primeiro = document.querySelector(".primeiro");
const segundo = document.querySelector(".segundo");
const terceiro = document.querySelector(".terceiro");
const quarto = document.querySelector(".quarto");
const quinto = document.querySelector(".quinto");
const sexto = document.querySelector(".sexto");
const setimo = document.querySelector(".setimo");
const oitavo = document.querySelector(".oitavo");
const nono = document.querySelector(".nono");
const decimo = document.querySelector(".decimo");
const undecimo = document.querySelector(".undecimo");
const duodecimo = document.querySelector(".duodecimo");

proximo[0].addEventListener("click", () => {
    primeiro.classList.add("hidden");
    segundo.classList.remove("hidden");
});

proximo[1].addEventListener("click", () => {
    segundo.classList.add("hidden");
    terceiro.classList.remove("hidden");
});

proximo[2].addEventListener("click", () => {
    terceiro.classList.add("hidden");
    quarto.classList.remove("hidden");
});

proximo[3].addEventListener("click", () => {
    quarto.classList.add("hidden");
    quinto.classList.remove("hidden");
});

proximo[4].addEventListener("click", () => {
    quinto.classList.add("hidden");
    sexto.classList.remove("hidden");
});

proximo[5].addEventListener("click", () => {
    sexto.classList.add("hidden");
    setimo.classList.remove("hidden");
});

proximo[6].addEventListener("click", () => {
    setimo.classList.add("hidden");
    oitavo.classList.remove("hidden");
});

proximo[7].addEventListener("click", () => {
    oitavo.classList.add("hidden");
    nono.classList.remove("hidden");
});

proximo[8].addEventListener("click", () => {
    nono.classList.add("hidden");
    decimo.classList.remove("hidden");
});

proximo[9].addEventListener("click", () => {
    decimo.classList.add("hidden");
    undecimo.classList.remove("hidden");
});

proximo[10].addEventListener("click", () => {
    undecimo.classList.add("hidden");
    duodecimo.classList.remove("hidden");
});



// radio buttons
