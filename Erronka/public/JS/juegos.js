// VARIABLE
let vidasVar = 3;
let juegos = [
    false,
    false,
    false,
];

// !COGER DE LA BD SI ESTA ACABADO O NO Y SI LO ESTA CAMBIAR JEUGOS

// FUNCIONES
function JuegosBien(i, c){

    if (!juegos[i]) {

        juegos[i] = true;

        CambiarJuegos();

        if (juegos.every(e=>e===true)) {
            Ganar(c);
            return;
        }

        Swal.fire({
            icon: 'success',
            title: 'EGINDA',
            showConfirmButton: false,
            timer: 1500
        })
    }
}
function Ganar(c){
    Swal.fire({
        icon: 'success',
        title: 'KANDADUA '+c.toUpperCase()+' BUKATUTA DAGO',
    })
    .then(v => {
        //! ACABAR ESTO PARA QUE GUARDE QUE EL CANDADO

        // var juego1 = c == "juego1" ? 1 : 0;
        // var juego2 = c == "juego2" ? 1 : 0;
        // var token = '{{csrf_token()}}';
        // var data={juego1:juego1, juego2:juego2, _token:token};
        // $.ajax({
        //     type: "post",
        //     url: "{{route('Comercio.parUptade', session()->get('usuario')->id)}}",
        //     data: data,
        //     success: function (msg) {
        //             alert("Se ha realizado el POST con exito "+msg);
        //     }
        // });    
    })
}
function CambiarJuegos(){
    // PONER COMPLETADO
    for (const i in juegos) {
        let a = Number(i)+1;
        if (juegos[i]) {
            $("#pills-Juego"+a).html("<div class='completado'><h1>JOLASA EGINDA DAGO!</h1></div>");; 
        }
    }
}

function CambioVidas(i){
    vidasVar-=i;
    if(vidasVar == 0){
        GameOver();
        return;
    }

    Swal.fire({
        icon: 'error',
        title: 'TXARTO DAGO',
        showConfirmButton: false,
        timer: 1500
    })
    $("#vidas").text(vidasVar);
}
function GameOver(){
    Swal.fire({
        icon: 'error',
        title: 'GAMEOVER',
    })
    .then(v => {
            window.location = "../";
    })

}


window.onload = () => {

    CambiarJuegos();

    // RELOJ-----------------------------------------------------------------------------
    const reloj = Vue.createApp({})
    reloj.component('reloj', {
        data() {
            return {
                minutos: 30,
                segundos: '00',
                tiempo: null,
            }
        },
        template: `
            <strong class="otro">Erlojua: {{ minutos }}:{{ segundos }}</strong>
        `,
        methods: {

            intervalo() {
                this.tiempo = setInterval(() => {

                    this.segundos--;

                    if (this.segundos < 0) {
                        this.segundos = 59;
                        this.minutos--;
                    }

                    if (this.segundos < 10) {
                        this.segundos = '0' + this.segundos;
                    }
                    if (this.minutos < 10) {
                        this.segundos = '0' + this.minutos;
                    }


                    if (this.minutos == 0 && this.segundos == 0) {
                        clearInterval(this.tiempo)
                        GameOver();
                    }


                }, 1000)
            },
        },
        created() {
            this.intervalo()
        }
    });

    reloj.mount('#reloj');


    // CORRECTOR-----------------------------------------------------------------------------
    const corrector = Vue.createApp({})
    corrector.component('corrector', {
        props: ['n', 'c'],
        data() {
            return {
                juego: this.n,
                candado: this.c,

                pregunta: null,
                miRespuesta: null,
            }
        },
        template: `
        <div class="row m-5 g-3 align-items-center d-flex justify-content-center text-center">
            <div class="col-12">
                <label class="col-form-label">{{ pregunta }}</label>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" v-model="miRespuesta">
            </div>
            <div class="col-auto">
                <input type="button" class="btn btn-outline-light" value="Bidali" v-on:click='corregir()'>
            </div>
        </div>
        <br>
        `,
        methods: {
            corregir() {
                axios.get('../JS/pregunta.json')
                .then((pregunta) => {
                    const N = (this.candado == "juego2") ? Number(this.juego)+3 : this.juego;

                    if (this.miRespuesta.toUpperCase() === pregunta.data[N].respuesta) {
                        // Swal.fire("TA BIEN EL JUEGO " + N)
                        JuegosBien(this.juego, this.candado);
                    } else {
                        CambioVidas(1);
                    }
                })
                .catch(err => console.log(err));
            }
        },
        created() {
            axios.get('../JS/pregunta.json')
                .then((pregunta) => {
                    const N = (this.candado == "juego2") ? Number(this.juego)+3 : this.juego;
                    this.pregunta = pregunta.data[N].pregunta
                })
                .catch(err => console.log(err));
        }
    });

    corrector.mount('.corrector');


    // PISTAS-----------------------------------------------------------------------------
    let pistas = Vue.createApp({})
    pistas.component('pista', {
        props: ['n', 'c'],
        data() {
           return {
               juego: this.n,
               candado: this.c,
           }
       },
       template:`
       <button v-on:click='darPista()' id="info" type="submit">i</button>
      `,
       methods: {
            darPista(){
                // axios.get('{{asset("JS/pistas.json")}}')
                // Swal.fire(this.juego+" // "+this.candado)

                axios.get('../JS/pistas.json')
                .then((respuesta) => {
                    const N = (this.candado == "juego2") ? Number(this.juego)+3 : this.juego;
                    Swal.fire(respuesta.data[N].pista);
                })
                .catch(err => console.log(err));
            }
        },
    });

    pistas.mount('#pistas');

    // MENU
    $(document).on("click", "#pills-Juego1-tab", function () {
        cambiar(0);
    });
    $(document).on("click", "#pills-Juego2-tab", function () {
        cambiar(1);
    });
    $(document).on("click", "#pills-Juego3-tab", function () {
        cambiar(2);
    });
    



    function cambiar(i){
        $(".tab-pane").addClass("d-none");

        switch(i){
            case 0:
                $("#pills-Juego1").removeClass("d-none");
                break;
            case 1:
                $("#pills-Juego2").removeClass("d-none");
                break;
            case 2:
                $("#pills-Juego3").removeClass("d-none");
                break;
        }

        // console.log( $(".tab-pane")[i]);
        // $(".tab-pane").removeClass("d-none");
    }


    // JUEGOS-----------------------------------------------------------------------------
        // JUEGO 2-----------------------------------------------------------------------------
    Vue.createApp({
        data() {
            return {
                preguntas: [{
                        pregunta: "Como se denomina el almacenamiento en el que cada producto tiene su ubicación",
                        respuesta: ["Almacenamiento caótico.", "Almacenamiento ordenado.", "Almacenamiento desordenado.", "Almacenamiento aleatorio."],
                        miRespuesta: null,
                        correcta: 1
                    },
                    {
                        pregunta: "Entre los objetivos que persigue un buen sistema de almacenamiento está:",
                        respuesta: ["Maximo aprovechamiento de la capacidad de almacenamiento.", "Accesibilidad de los productos.", "Rotación controlado de stock.", "Todas son correctas."],
                        miRespuesta: null,
                        correcta: 3
                    },
                    {
                        pregunta: "El sistema de almacenamiento convencional",
                        respuesta: ["No se utilizan estanterías.", "No sirve para el almacenamiento de mercancía paletizada.", "Es fácil realizar las salidas por el método FIFO.", "Puede adaptarse a cualquier tipo de carga."],
                        miRespuesta: null,
                        correcta: 3
                    },
                    {
                        pregunta: "El consumidor industrial es:",
                        respuesta: ["El que alquila un piso para vivir.", "La fábrica que compra bienes para elaborar otros bienes.", "Una ONG que compra papel para la oficina."],
                        miRespuesta: null,
                        correcta: 1
                    },
                    {
                        pregunta: "Un grupo de referencia es:",
                        respuesta: ["El grupo de personas que van en el autobús", "El grupo de personas haciendo cola para comprar.", "Grupos con quien la persona actúa y que ejercen influencia sobre él."],
                        miRespuesta: null,
                        correcta: 2
                    },
                    {
                        pregunta: "Señala qué afirmación es verdadera:",
                        respuesta: ["Un deportista tenderá a comprar productos que tengan que ver con su deporte favorito.", "En épocas de crisis los individuos tienden a gastar más.", "La personalidad del individuo no influye en su comportamiento de consumo."],
                        miRespuesta: null,
                        correcta: 0
                    },
                    {
                        pregunta: "Entendemos por necesidad:",
                        respuesta: ["La visualización de aquello que nos falta.", "Una carencia física o psíquica de algo que no se tiene y se desea porque, obteniéndolo, desaparece esa sensación desagradable de vacío.", "El producti que consumimos"],
                        miRespuesta: null,
                        correcta: 1
                    },
                    {
                        pregunta: "¿Cuál piensas que es el marketing que se propaga de usuario a usuario?",
                        respuesta: ["De afiliación.", "Viral.", "One to one.", "Relacional."],
                        miRespuesta: null,
                        correcta: 1
                    },
                ]
            }
        },
        methods: {
            // corregir() {
                //Cuando das boton te corrigeputon

                //BIEN te dice muy bien :)
                //MAL te quita una vida :(
            // }
        },
    }).mount('#juego2');

    // JUEGO 3----------------------------------------------------------------------------------
    // const juego3 = Vue.createApp({
    //     data() {
    //         return {
    //             pregunta: "Calcula el dígito de control del siguiente código de barras: 8410297120134",
    //             respuesta: null,
    //             correcta: 72
    //         }
    //     },
    //     methods: {
    //         corregir() {
    //             if (this.respuesta === this.correcta) {
    //                 alert("Ta bien");
    //             } else {
    //                 alert("ta mal");
    //             }
    //         }
         
    //     }
    // });

    // juego3.mount('#juego3');
}

