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
 
    {
        // ES
        f: '#FEC400',

        d0: '#C60B1E',
        d1: '#C60B1E',
        d2: '#FEC400',

        h: '#C60B1E',
        t: '#FFFFFE'
    },
    {
        // EU
        f: '#009B48',

        d0: '#D52B1E',
        d1: 'white',
        d2: '#D52B1E',

        h: '#D52B1E',
        t: '#191919'
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
    // console.log(colorElegido);

    const rootElement = document.documentElement;

    rootElement.style.setProperty('--f', COLORES[colorElegido].f);

    rootElement.style.setProperty('--d0', COLORES[colorElegido].d0);
    rootElement.style.setProperty('--d1', COLORES[colorElegido].d1);
    rootElement.style.setProperty('--d2', COLORES[colorElegido].d2);

    rootElement.style.setProperty('--h', COLORES[colorElegido].h);
    rootElement.style.setProperty('--t', COLORES[colorElegido].t);
}
