// VARIABLE
let vidasVar = 3;
let juegos = [
    false,
    false,
    false,
];

// !COGER DE LA BD SI ESTA ACABADO O NO Y SI LO ESTA CAMBIAR JEUGOS

// FUNCIONES
function JuegosBien(i, c, id){

    if (!juegos[i]) {

        juegos[i] = true;

        CambiarJuegos();

        if (juegos.every(e=>e===true)) {
            Ganar(c, id);
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
function Ganar(c, id){
    // alert(c+"--"+id);
    Swal.fire({
        icon: 'success',
        title: 'KANDADUA BUKATUTA DAGO',
    })
    .then(v => {
        //! ACABAR ESTO PARA QUE GUARDE QUE EL CANDADO

        $.ajax({
            method: 'POST',
            url: '../PHP/update.php',
            data:
            {
                id: id,
                juego: c
            },
        })
        .done(
            location.href = "../"
        )
        .fail(function(jqXHR, textStatus) {
            console.log("Hubo un error: " + textStatus);
        });
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

     // DATA-----------------------------------------------------------------------------

     const cosa = Vue.createApp({})
     cosa.component('cosa', {
        props: ['j'],
        data() {
            return {
                juego: this.j,
            }
        },
        template: `
        `,
        created() {
            if (this.juego == 1) {
                juegos = [true, true, true]
                CambiarJuegos();
            }
        }
    });
 
    cosa.mount('#cosa');


    // RELOJ-----------------------------------------------------------------------------
    const reloj = Vue.createApp({})
    reloj.component('reloj', {
        props: ['d'],
        data() {
            return {
                minutos: 30,
                segundos: '00',
                tiempo: null,
            }
        },
        template: `
            <strong class="otro">{{ minutos }}:{{ segundos }}</strong>
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


                    if (this.minutos == 0 && this.segundos == 0) {
                        clearInterval(this.tiempo)
                        GameOver();
                    }


                }, 1000)//! 1000
            },
        },
        created() {
            switch (this.d) {
                case "0":
                    this.minutos = 30;
                    break;
                case "1":
                    this.minutos = 20;
                    break;          
                case "2":
                    this.minutos = 10;
                    break;
                default:
                    alert(this.d);
                    break;
            }
            this.intervalo()
        }
    });

    reloj.mount('#reloj');


    // CORRECTOR-----------------------------------------------------------------------------
    const corrector = Vue.createApp({})
    corrector.component('corrector', {
        props: ['n', 'c', 'i'],
        data() {
            return {
                juego: this.n,
                candado: this.c,
                id: this.i,

                pregunta: null,
                miRespuesta: null,
            }
        },
        template: `
        <hr>
        <div class="row m-5 g-3 align-items-center d-flex justify-content-center text-center">
            <div class="col-12">
                <label class="col-form-label">{{ pregunta }}</label>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control"  @keydown='longitud()' v-model="miRespuesta">
            </div>
            <div class="col-auto">
                <input type="button" class="btn" value="Bidali" @click='corregir()'>
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
                        JuegosBien(this.juego, this.candado, this.id);
                    } else {
                        CambioVidas(1);
                    }
                })
                .catch(err => console.log(err));
            },
            longitud(){
                this.miRespuesta = this.miRespuesta != null ? this.miRespuesta.substring(1) : '';
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

                    // window.open("https://calculadora.name/" , "Calculadora" , "width=350,height=600,scrollbars=NO,resizable=NO");
                    Swal.fire({
                        title: "PISTA",
                        text: respuesta.data[N].pista,
                        // footer: '<a href="../../resources/views/calculadora.html" target="_blank">CALCULADORA</a>'
                    });
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
        // JUEGO 1----------------------------------------------------------------------------------

    //VARIABLES
    const PLANTILLA = [
        [0, 0, 0,'1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0,'2','','','','','','', 0, 0, 0, 0, 0, 0,'3'],
        [0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,''],
        ['4', 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,''],
        ['', 0, 0,'', 0, 0,'5', 0, 0, 0, 0, 0, 0, 0, 0,''],
        ['6','','','','','','','','','','','','','','',''],
        ['', 0, 0, 0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0,''],
        ['', 0, 0, 0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0,''],
        ['', 0, 0, 0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0, 0],
        ['', 0, 0, 0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0, 0],
        ['', 0, 0, 0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0, 0],
        ['', 0, 0, 0, 0, 0,'', 0, 0, 0, 0, 0, 0, 0, 0, 0]
    ];

    const PREGUNTAS = [
        {
            nombre: "HORIZONTAL",
            preguntas: [
                "2. Documento confenccionado por el proveedor y que acompaña a la mercancia",
                "6. Forma de pago que se realiza cuando se recibe el producto"
            ]
        },
        {
            nombre: "VERTICAL",
            preguntas: [
                "1. Proceso por el cual el robot de google va de enlace en enlace buscando informacion",
                "3. Palabra clave en internet",
                "4. Fase en la que la mercancia llega al almacen",
                "5. Una de las cuatro P's del marketing"
            ]
        }
    ]

    // METODOS
    $.each(PLANTILLA, (i) => {
        $('#juego1').append('<tr class="fila" id="fila'+i+'"></tr>');

        PLANTILLA[i].forEach(e => {
            if (e === 0) {
                // ESPACIO
                $('#fila'+i).append('<input class="casilla hidden"></input>');
            }
            else{
                // INPUT
                if (e === '') {
                    // VACIO
                    $('#fila'+i).append('<input maxlength="1" class="casilla"></input>');
                }
                else{
                    // CON NUM
                    $('#fila'+i).append('<span class="divCasilla" id="div'+e+'"></span>');

                    $('#fila'+i).append('<input maxlength="1" class="casilla"></input>');
                    $('#div'+e).append('<p class="numero">'+e+'</p>');
                }

            }
        });
    })
    $.each(PREGUNTAS, (i) => {
        $('#preguntas1').append('<strong>'+PREGUNTAS[i].nombre+'</strong>');

        PREGUNTAS[i].preguntas.forEach(element => {
            $('#preguntas1').append('<p>'+element+'</p>');
        });
    })

        // JUEGO 2-----------------------------------------------------------------------------
        Vue.createApp({
            data() {
                return {
                    page: 0,
                    preguntas: [{
                            pregunta: "Como se denomina el almacenamiento en el que cada producto tiene su ubicación",
                            respuesta: ["Almacenamiento caótico.", "Almacenamiento ordenado.", "Almacenamiento desordenado.", "Almacenamiento aleatorio."],
                            miRespuesta: null,
                            correcta: 1,
                        },
                        {
                            pregunta: "Entre los objetivos que persigue un buen sistema de almacenamiento está:",
                            respuesta: ["Maximo aprovechamiento de la capacidad de almacenamiento.", "Accesibilidad de los productos.", "Rotación controlado de stock.", "Todas son correctas."],
                            miRespuesta: null,
                            correcta: 3,
                        },
                        {
                            pregunta: "El sistema de almacenamiento convencional",
                            respuesta: ["No se utilizan estanterías.", "No sirve para el almacenamiento de mercancía paletizada.", "Es fácil realizar las salidas por el método FIFO.", "Puede adaptarse a cualquier tipo de carga."],
                            miRespuesta: null,
                            correcta: 3,
                        },
                        {
                            pregunta: "El consumidor industrial es:",
                            respuesta: ["El que alquila un piso para vivir.", "La fábrica que compra bienes para elaborar otros bienes.", "Una ONG que compra papel para la oficina."],
                            miRespuesta: null,
                            correcta: 1,
                        },
                        {
                            pregunta: "Un grupo de referencia es:",
                            respuesta: ["El grupo de personas que van en el autobús", "El grupo de personas haciendo cola para comprar.", "Grupos con quien la persona actúa y que ejercen influencia sobre él."],
                            miRespuesta: null,
                            correcta: 2,
                        },
                        {
                            pregunta: "Señala qué afirmación es verdadera:",
                            respuesta: ["Un deportista tenderá a comprar productos que tengan que ver con su deporte favorito.", "En épocas de crisis los individuos tienden a gastar más.", "La personalidad del individuo no influye en su comportamiento de consumo."],
                            miRespuesta: null,
                            correcta: 0,
                        },
                        {
                            pregunta: "Entendemos por necesidad:",
                            respuesta: ["La visualización de aquello que nos falta.", "Una carencia física o psíquica de algo que no se tiene y se desea porque, obteniéndolo, desaparece esa sensación desagradable de vacío.", "El producti que consumimos"],
                            miRespuesta: null,
                            correcta: 1,
                        },
                        {
                            pregunta: "¿Cuál piensas que es el marketing que se propaga de usuario a usuario?",
                            respuesta: ["De afiliación.", "Viral.", "One to one.", "Relacional."],
                            miRespuesta: null,
                            correcta: 1,
                        },
                    ]
                }
            },
            methods: {
                paginator1: function() {
                        this.page = 0;
                },
                paginator2: function() {
                        this.page = 1;
                },
                paginator3: function() {
                        this.page = 2;
                },
                paginator4: function() {
                        this.page = 3;
                },
                paginator5: function() {
                        this.page = 4;
                },
                paginator6: function() {
                        this.page = 5;
                },
                paginator7: function() {
                        this.page = 6;
                },
                paginator8: function() {
                        this.page = 7;
                },
            },
            created() {
                this.page = 0;   
            }
        }).mount('#juego2')

    // JUEGO 6----------------------------------------------------------------------------------
    Vue.createApp({
        data() {
            return {
                div: '',
                combinacion: [2, 6, 3, 8]
            }
        },
        methods: {
            //DRAG
            drag(e) {
                this.div = e.target.cloneNode(true);
                this.div.setAttribute("draggable", false);
            },
            // DROP
            drop(e) {
                e.preventDefault();

                if(e.target.firstChild == null){                    
                    e.target.appendChild(this.div);
                }
                else{
                    e.target.parentElement.appendChild(this.div);
                    e.target.remove();
                }

                let color;
                switch (this.corrector(this.div.id, this.div.parentElement.id)) {
                    case 0:
                        color = "green";
                        break;
                    case 1:
                        color = "orange";
                        break;
                    case 2:
                        color = "red";
                        break;
                    default:
                        break;
                }

                this.div.style.backgroundColor = color;
                
            },
            allowDrop(e) {
                e.preventDefault();
            },
            corrector(valor, caja){
                // Rojo
                let res = 2;

                for(n of this.combinacion){

                    if (n == valor) {
                        if (n == this.combinacion[caja]) {
                            //Verde
                            res = 0;
                            break;
                        }
                        // Amarillo
                        res = 1;
                    }
                };

                return res;
            }
        }
    }).mount('#juego6');


}


// ! NO SALIR DE JUEGOS
// $(window).on("beforeunload", function () {
//     return "";
// });