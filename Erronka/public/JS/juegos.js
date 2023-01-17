window.onload = () => {

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

                        alert("SIN TIEMPO");
                        //GAMEOVER
                    }


                }, 1000)
            },
        },
        created() {
            this.intervalo()
        }
    });

    reloj.mount('#reloj')


    // CORRECTOR
    const corrector = Vue.createApp({})
    corrector.component('corrector', {
        props: ['pre', 'cor'],
        data() {
            return {
                pregunta: this.pre,
                correcta: this.cor,
                miRespuesta: null
            }
        },
        template: `
        <form action="">
            <label>{{ pregunta }}</label>
            <br>
            <input type="text" v-model="miRespuesta">
            <input type="button" value="Bidali" v-on:click='corregir()'>
        </form>
        `,
        methods: {
            corregir() {
                if (this.miRespuesta === this.correcta) {
                    alert("Ta bien");
                } else {
                    alert("ta mal");
                }
            }
        },
    });

    corrector.mount('.corrector')



    // JUEGOS
    // JUEGO 2
    const juego2 = Vue.createApp({
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
            corregir() {
                //Cuando das boton te corrigeputon

                //BIEN te dice muy bien :)
                //MAL te quita una vida :(
            },
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
    }).mount('#cont')

}
