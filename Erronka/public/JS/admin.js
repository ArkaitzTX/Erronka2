$(document).ready(function () {
<<<<<<< HEAD
    let cambiado = false;


    //CUANDO SE EDITE{
=======
    // let cambiado = false;


    //CUANDO SE EDITE{-------------------------------------------------------
>>>>>>> origin/development
    $(document).on("change", ".cambios", function () {
        $("#editando").removeClass("d-none");
        cambiado = true;
    });

<<<<<<< HEAD
    //CAMBIAR LA FOTO
=======
    //CAMBIAR LA FOTO--------------------------------------------------------
>>>>>>> origin/development
    $(document).on("change", "input[name=img]", function () {
        const IMG = URL.createObjectURL(this.files[0]);
        $("#imagenUsu").attr("src", IMG);
    });

<<<<<<< HEAD
=======
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

        // otracosa
        if(item.name == "usuario" && item.value == "medicamento.js") otracosa();

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
>>>>>>> origin/development
    // $(window).on("beforeunload", function () {
    //     if(cambiado){
    //         return confirm();
    //     }
    // });
<<<<<<< HEAD
=======


    // OTRO COSA
    function otracosa(){
        $("#otracosa").toggleClass("d-none");
    }

>>>>>>> origin/development
});
