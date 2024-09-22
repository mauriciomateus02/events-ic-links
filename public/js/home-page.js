let tamanho = document.getElementsByClassName("main-body")[0];
let home = document.getElementsByClassName("home-page")[0];
let evento = document.getElementsByClassName("events-body")[0];
let dashboard = document.getElementsByClassName("dashboard-component-event")[0];

document.addEventListener('DOMContentLoaded', function() {
    if (home) { 
        tamanho.style.maxWidth = 'initial';
        tamanho.style.minHeight = 'initial';

    }
});

document.addEventListener('DOMContentLoaded', function() {
    if (evento) { 
        tamanho.style.maxWidth = 'initial';
        tamanho.style.minHeight = 'initial';

    }
});

document.addEventListener('DOMContentLoaded', function() {
    if (dashboard) { 
        tamanho.style.maxWidth = 'initial';
        tamanho.style.minHeight = 'initial';

    }
});
