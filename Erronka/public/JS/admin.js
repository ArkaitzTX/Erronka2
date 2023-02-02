// !VALIDACION VAINILLA

// const FORM = "editar";
// const CORRECTOR = {
//     nombre: [ 
//         {
//             nombre: "between", 
//             valor: [3, 50]
//         },
//         {
//             nombre: "tipo", 
//             valor: 1
//         },
//     ],
//     apellido: [ 
//         {
//             nombre: "between", 
//             valor: [3, 50]
//         },
//         {
//             nombre: "tipo", 
//             valor: 1
//         },
//     ],
//     usuario: [ 
//         {
//             nombre: "between", 
//             valor: [5, 50]
//         },
//     ],
//     pass: [
//         {
//             nombre: "between", 
//             valor: [8, 20]
//         },
//         {
//             nombre: "comparacion", 
//             valor: "passV"
//         },
//     ],
// };


// const VALIDACIONES = {
//     between: {
//         validar: (valor, input) =>{
//             return valor[0] <= input.length && valor[1] > input.length;
//         },
//         error: (valor, inputname) =>{
//             return `La longitud de tu ${inputname} tiene que estar entre ${valor[0]} y ${valor[1]}`;
//         }
//     },
//     tipo:{
//         validar: (valor, input) =>{
//             return input.split("").every(char => isNaN(char) == valor);
//         },
//         error: (valor, inputname) =>{
//             const MITIPO = ["INT", "STRING"]
//             return `El tipo del dato de tu ${inputname} tiene que ser ${MITIPO[valor]}`;
//         }
//     },
//     comparacion:{
//         validar: (valor, input) =>{
//             return input === document.getElementsByName(valor)[0].value;
//         },
//         error: (valor, inputname) =>{
//             return `El valor de tu ${inputname} no es igual`;
//        }
//     },
// };


$(document).ready(function () {

    // !VALIDACION VAINILLA
    // document.querySelector("#" + FORM + " button").addEventListener("click", (e) => {
    //     e.preventDefault();

    //     let RESULTADO = true;
        
    //     Array.from(document.querySelectorAll(".error")).forEach(error => error.remove());
    //     $("#editar input[type=text], #editar input[type=password]").css({"border":"black 1px solid"});

    //     const INPUTS = Array.from(document.querySelectorAll("#" + FORM + " input"));
    //     INPUTS.forEach(input => {

    //         Object.entries(CORRECTOR).some(nombre =>
    //                 nombre[0] == input.name
    //             ) &&
    //             CORRECTOR[input.name].forEach(correcciones => {
    //                 if (!VALIDACIONES[correcciones.nombre].validar(correcciones.valor, input.value)) {
    //                     RESULTADO = false;
    //                     input.parentElement.insertAdjacentHTML("beforeend", '<p class="error text-danger">' + VALIDACIONES[correcciones.nombre].error(correcciones.valor, input.name) + '</p>');

    //                     input.style.border = "solid 2px red";
    //                     input.style.animation ="error .25s  linear 2";
    //                 }
    //             });

    //     });

    //     if (RESULTADO) document.querySelector("#" + FORM).submit();

    // });

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


    // TODO: VALIDACION DEL FORMULARIO
    Vue.createApp({
        data() {
            return {
              misErrores: [],
              misValidaciones: {
                usuario: {
                  estado: true,
                  validacion:[
                    {
                      nombre: "betwen", 
                      valor: [6, 50]
                    }
                  ]
                },
                nombre:{
                    estado: true,
                    validacion: [
                      {
                        nombre: "betwen", 
                        valor: [3, 50]
                      },
                      {
                        nombre: "tipo", 
                        valor: 1
                      }
                    ],
                },
                apellido:{
                  estado: true,
                  validacion: [
                    {
                      nombre: "betwen", 
                      valor: [3, 50]
                    },
                    {
                      nombre: "tipo", 
                      valor: 1
                    }
                  ],
                }
              },
              validaciones: {
                betwen: {
                  validacion: (valor, input) => {
                    return valor[0] <= input.length && valor[1] > input.length;
                  },
                  errores: (valor, inputname) => {
                    return `La longitud de tu ${inputname.toUpperCase()} tiene que estar entre ${valor[0]} y ${valor[1]}`;
                  }
                },
                tipo: {
                  validacion: (valor, input) => {
                    return input.split("").every(char => isNaN(char) == valor);
                  },
                  errores: (valor, inputname) => {
                    const MITIPO = ["tipo NUMERICO", "TEXTO"]
                    return `El tipo del dato de tu ${inputname.toUpperCase()} tiene que ser ${MITIPO[valor]}`;
                  },
                },
                comparacion: {
                  validacion: (valor, input) => {
                    return input === document.getElementsByName(valor)[0].value;
                  },
                  errores: (valor, inputname) => {
                    return `El valor de tu ${inputname.toUpperCase()} no es igual`;
                  },
                },
              }
            }
          },
          methods: {
            invitado() {
              axios.get('https://randomuser.me/api/')
                .then(valor => valor.data.results[0])
                .then(valor => {
                  this.usuario.nombre = valor.name.first;
                  this.usuario.apellido = valor.name.last;
                  this.usuario.perfil = valor.picture.medium;
                });
            },
            validar(event){
              this.misErrores = [];
              const MISVALIDACION = this.misValidaciones[event.target.name];
      
              MISVALIDACION.estado = MISVALIDACION.validacion.every(element => {
      
                const VALIDACIONES = this.validaciones[element.nombre];
                const ESTADO = VALIDACIONES.validacion(element.valor, event.target.value) ;
      
                if(!ESTADO) {
                    this.misErrores.push(VALIDACIONES.errores(element.valor, event.target.name));
      
                    event.target.style.border = "solid 2px red";            
                    event.target.style.animation ="error .25s  linear 2";
                } else event.target.style.border = "solid 1px black";
            
                return ESTADO;
      
              });
            },
            enviar(event){
              Object.values(this.misValidaciones).map(element => {
                return element.estado;
              }).every(element => element) && event.target.parentNode.parentNode.submit();
            }
          }
    }).mount('#validacion');



});



//SALIR-----------------------------------------------------------------

// ! NO SALIR DE JUEGOS
// $(window).on("beforeunload", function () {
//     if(cambiado){
//         return confirm();
//     }
// });
