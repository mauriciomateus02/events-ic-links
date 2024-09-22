let tamanho = document.getElementsByClassName("main-body")[0];
let home = document.getElementsByClassName("home-page")[0];

let event = document.getElementsByClassName("events-body")[0];


document.addEventListener('DOMContentLoaded', function() {
    if (home) {  // Verifica se o elemento "home" existe
        tamanho.style.maxWidth = 'initial';
        tamanho.style.minHeight = 'initial';
        //tamanho.style.height = '110% !important';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    if (event) {  // Verifica se o elemento "home" existe
        tamanho.style.maxWidth = 'initial';
        tamanho.style.minHeight = 'initial';
        //tamanho.style.height = '110% !important';
    }
});
