$(document).ready(function () {
    // let cambiado = false;


    //CUANDO SE EDITE{-------------------------------------------------------
    $(document).on("change", ".cambios", function () {
        $("#editando").removeClass("d-none");
        cambiado = true;
    });

    //CAMBIAR LA FOTO--------------------------------------------------------
    $(document).on("change", "input[name=img]", function () {
        const IMG = URL.createObjectURL(this.files[0]);
        $("#imagenUsu").attr("src", IMG);
    });

    //VALIDACION-------------------------------------------------------------
    const VALIDACION = [
        {
            name: "nombre",
            min: 3,
            max: 50,
        },
        {
            name: "apellido",
            min: 3,
            max: 50,
        },
        {
            name: "usuario",
            min: 6,
            max: 50,
        },
        {
            name: "pass",
            min: 8,
            max: 50,
        },
    ]

    $("#editar").submit(function(e){
        e.preventDefault();
        let estado = [];

        $(".error").remove();
        $("#editar input[type=text], #editar input[type=password]").css({"border":"black 1px solid"});

        $("#editar input[type=text], #editar input[type=password]").each(function(i,item){
            estado.push(between(item));
        });

        if (!estado.some(e => !e)) {
            this.submit()
        }
    });

    function between(item){
        const VALOR = VALIDACION.filter((val) => val.name == item.name)[0];

        if (VALOR.min <= item.value.length && VALOR.max >= item.value.length) {
            return true;
        }
        
        item.insertAdjacentHTML("afterend", '<p class="text-danger error"> Luzera '+VALOR.min+' eta '+VALOR.max+' artekoa izan behar da </p>');
        item.style.border = "solid 2px red";
        item.style.animation = "error .25s linear 2";

        return false;
    }


    //SALIR-----------------------------------------------------------------

    // ! NO SALIR DE JUEGOS
    // $(window).on("beforeunload", function () {
    //     if(cambiado){
    //         return confirm();
    //     }
    // });






    // $(document).on("keypress", "#cerrar", function () {
    //     $(document).on("mouseover", "#cerrar", function () {
    //         // OTROS
    //         console.log("SIMIO");
    //     });
    // });
});
