window.onload = () => {

    const app1=Vue.createApp({})
    app1.component('reloj',{
        data() {
            return{
                minutos: 30,
                segundos: '00',
                tiempo: null,
            }
        },
        template: //html
        `
            <strong class="otro">Erlojua: {{ minutos }}:{{ segundos }}</strong>
        `,
        methods: {

            intervalo () {
                this.tiempo = setInterval(() => {

                    this.segundos--;

                    if (this.segundos < 0) {
                        this.segundos = 59;
                        this.minutos--;
                    }

                    if(this.segundos < 10){
                        this.segundos = '0' + this.segundos;
                    }
                    if(this.minutos < 10){
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
        created () {
            this.intervalo()
        }
    });

    app1.mount('#reloj')

    const app2=Vue.createApp({})

    app2.component('pregunta',{
        data() {
            return{
                preguntas: [
                    {
                        pregunta: "Pregunta1",
                        respuesta: ["Respuesta1", "Respuesta2", "Respuesta3", "Respuesta4"],
                        miRespuesta: null,
                        correcta: 0
                    },
                    {
                        pregunta: "Pregunta2",
                        respuesta: ["Respuesta1", "Respuesta2", "Respuesta3", "Respuesta4"],
                        miRespuesta: null,
                        correcta: 0
                    },
                ]
            }
        },
        methods: {
            corregir() {
                //Cuando das boton te corrigeputon

                //BIEN te dice muy bien :)
                //MAL te quita una vida :(
            }
        },
        template:
        `
        <form v-for="miPregunta in preguntas" action="">
            <label>{{ miPregunta.pregunta }}</label>

            <div v-for="(respuestas, index) in miPregunta.respuesta">
                <label>{{ respuestas }}</label>
                <input type="radio" name="resp" :value="index" v-model="miPregunta.miRespuesta">
            </div>

        </form>

        <button v-on:click='corregir()'>CORREGIR</button>

        
        <pre>
            //BORRAR//
            {{ $data }}
        </pre>
        `
    });

    app2.mount('#cont')
    
}
