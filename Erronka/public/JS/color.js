let colorElegido = 0;
let cantColores = 3;

$(document).ready(function () {

    colorElegido = localStorage.getItem("color");
    aplicarColor();

    $(document).on("click", "#col", function () {
        colorElegido = colorElegido < cantColores - 1 ? colorElegido + 1 : 0;
        localStorage.setItem("color", colorElegido);

        aplicarColor();
    });

});

function aplicarColor() {
    const rootElement = document.documentElement;

    switch (Number(colorElegido)) {
        case 0:
            // console.log("CLARO");
            rootElement.style.setProperty('--f', '#FFFFFE');

            rootElement.style.setProperty('--d0', '#004173');
            rootElement.style.setProperty('--d1', '#0979b0');
            rootElement.style.setProperty('--d2', '#F5F3F0');

            rootElement.style.setProperty('--h', '#252525');
            break;
        case 1:
            // console.log("OSCURO");
            rootElement.style.setProperty('--f', '#252525');

            rootElement.style.setProperty('--d0', '#B79a00');
            rootElement.style.setProperty('--d1', '#323232');
            rootElement.style.setProperty('--d2', '#F5F3F0');

            rootElement.style.setProperty('--h', '#191919');
            break;
        case 2:
            // console.log("BEIGE");
            rootElement.style.setProperty('--f', '#EFDBC7');

            rootElement.style.setProperty('--d0', '#B08D6B');
            rootElement.style.setProperty('--d1', '#E8C39E');
            rootElement.style.setProperty('--d2', '#F5F3F0');

            rootElement.style.setProperty('--h', '#B08D6B');
            break;
        // case 3:
        //     // console.log("OTRO");
        //     rootElement.style.setProperty('--f', 'red');

        //     rootElement.style.setProperty('--d0', 'yellow');
        //     rootElement.style.setProperty('--d1', 'red');
        //     rootElement.style.setProperty('--d2', 'yellow');

        //     rootElement.style.setProperty('--h', 'yellow');
        //     break;
        default:
            console.log("OTRO: " + colorElegido);
            break;
    }
}
