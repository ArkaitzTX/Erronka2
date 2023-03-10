let colorElegido = 0;
const COLORES = [
    {
        // CLARO
        f: '#FFFFFE',

        d0: '#004173',
        d1: '#0979b0',
        d2: '#F5F3F0',

        h: '#252525',
        t: '#191919'
    },
    {
        // OSCURO
        f: '#252525',

        d0: '#B79a00',
        d1: '#323232',
        d2: '#F5F3F0',

        h: '#191919',
        t: '#FFFFFE'
    },
    {
        // BEIGE
        f: '#EFDBC7',

        d0: '#B08D6B',
        d1: '#E8C39E',
        d2: '#F5F3F0',

        h: '#B08D6B',
        t: '#FFFFFE'
    },
];


$(document).ready(function () {

    colorElegido = Number(localStorage.getItem("color"));
    aplicarColor();

    $(document).on("click", "#col", function () {
        colorElegido = colorElegido < COLORES.length -1 ? colorElegido + 1 : 0;
        localStorage.setItem("color", colorElegido);

        aplicarColor();
    });

  // CARGAR
  $("#main").removeClass("d-none");

});

function aplicarColor() {
    const R = document.documentElement;

    R.style.setProperty('--f', COLORES[colorElegido].f);

    R.style.setProperty('--d0', COLORES[colorElegido].d0);
    R.style.setProperty('--d1', COLORES[colorElegido].d1);
    R.style.setProperty('--d2', COLORES[colorElegido].d2);

    R.style.setProperty('--h', COLORES[colorElegido].h);
    R.style.setProperty('--t', COLORES[colorElegido].t);
}

