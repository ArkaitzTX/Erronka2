const FORM = "editar";
const CORRECTOR = {
    nombre: [ 
        {
            nombre: "between", 
            valor: [3, 50]
        },
        {
            nombre: "tipo", 
            valor: 1
        },
    ],
    apellido: [ 
        {
            nombre: "between", 
            valor: [3, 50]
        },
        {
            nombre: "tipo", 
            valor: 1
        },
    ],
    usuario: [ 
        {
            nombre: "between", 
            valor: [5, 50]
        },
    ],
    pass: [
        {
            nombre: "between", 
            valor: [8, 20]
        },
        {
            nombre: "comparacion", 
            valor: "passV"
        },
    ],
};


const VALIDACIONES = {
    between: {
        validar: (valor, input) =>{
            return valor[0] <= input.length && valor[1] > input.length;
        },
        error: (valor, inputname) =>{
            return `La longitud de tu ${inputname} tiene que estar entre ${valor[0]} y ${valor[1]}`;
        }
    },
    tipo:{
        validar: (valor, input) =>{
            return input.split("").every(char => isNaN(char) == valor);
        },
        error: (valor, inputname) =>{
            const MITIPO = ["INT", "STRING"]
            return `El tipo del dato de tu ${inputname} tiene que ser ${MITIPO[valor]}`;
        }
    },
    comparacion:{
        validar: (valor, input) =>{
            return input === document.getElementsByName(valor)[0].value;
        },
        error: (valor, inputname) =>{
            return `El valor de tu ${inputname} no es igual`;
       }
    },
};


$(document).ready(function () {

    // VALIDACION
    document.querySelector("#" + FORM + " button").addEventListener("click", (e) => {
        e.preventDefault();

        let RESULTADO = true;
        
        Array.from(document.querySelectorAll(".error")).forEach(error => error.remove());
        $("#editar input[type=text], #editar input[type=password]").css({"border":"black 1px solid"});

        const INPUTS = Array.from(document.querySelectorAll("#" + FORM + " input"));
        INPUTS.forEach(input => {

            Object.entries(CORRECTOR).some(nombre =>
                    nombre[0] == input.name
                ) &&
                CORRECTOR[input.name].forEach(correcciones => {
                    if (!VALIDACIONES[correcciones.nombre].validar(correcciones.valor, input.value)) {
                        RESULTADO = false;
                        input.parentElement.insertAdjacentHTML("beforeend", '<p class="error text-danger">' + VALIDACIONES[correcciones.nombre].error(correcciones.valor, input.name) + '</p>');

                        input.style.border = "solid 2px red";
                        input.style.animation ="error .25s  linear 2";
                    }
                });

        });

        if (RESULTADO) document.querySelector("#" + FORM).submit();

    });





    //CUANDO SE EDITE-------------------------------------------------------
    $(document).on("change", ".cambios", function () {
        $("#editando").removeClass("d-none");
        cambiado = true;
    });

    //CAMBIAR LA FOTO--------------------------------------------------------
    $(document).on("change", "input[name=img]", function () {
        const IMG = URL.createObjectURL(this.files[0]);
        $("#imagenUsu").attr("src", IMG);
    });

    // OTRO COSA
    function otracosa() {
        $("#otracosa").toggleClass("d-none");
    }


});



//SALIR-----------------------------------------------------------------

// ! NO SALIR DE JUEGOS
// $(window).on("beforeunload", function () {
//     if(cambiado){
//         return confirm();
//     }
// });
