let colorElegido = 0;
const COLORES = [
    {
        // CLARO
        f: '#FFFFFE',

        d0: '#004173',
        d1: '#0979b0',
        d2: '#F5F3F0',

        h: '#252525',
    },
    {
        // OSCURO
        f: '#252525',

        d0: '#B79a00',
        d1: '#323232',
        d2: '#F5F3F0',

        h: '#191919',
    },
    {
        // BEIGE
        f: '#EFDBC7',

        d0: '#B08D6B',
        d1: '#B08D6B',
        d2: '#F5F3F0',

        h: '#B08D6B',
    },
];


$(document).ready(function () {

    colorElegido = typeof localStorage.getItem("color") !== undefined ? Number(localStorage.getItem("color")) : 0;
    aplicarColor();

    $(document).on("click", "#col", function () {
        colorElegido = colorElegido < COLORES.length -1 ? colorElegido + 1 : 0;
        localStorage.setItem("color", colorElegido);

        aplicarColor();
    });

});

function aplicarColor() {
    // console.log(colorElegido);

    const rootElement = document.documentElement;

    rootElement.style.setProperty('--f', COLORES[colorElegido].f);

    rootElement.style.setProperty('--d0', COLORES[colorElegido].d0);
    rootElement.style.setProperty('--d1', COLORES[colorElegido].d1);
    rootElement.style.setProperty('--d2', COLORES[colorElegido].d2);

    rootElement.style.setProperty('--h', COLORES[colorElegido].h);
}