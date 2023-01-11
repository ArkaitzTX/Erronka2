$(document).ready(function () {
    let cambiado = false;


    //CUANDO SE EDITE{
    $(document).on("change", ".cambios", function () {
        $("#editando").removeClass("d-none");
        cambiado = true;
    });

    //CAMBIAR LA FOTO
    $(document).on("change", "input[name=img]", function () {
        const IMG = URL.createObjectURL(this.files[0]);
        $("#imagenUsu").attr("src", IMG);
    });

    // $(window).on("beforeunload", function () {
    //     if(cambiado){
    //         return confirm();
    //     }
    // });
});
