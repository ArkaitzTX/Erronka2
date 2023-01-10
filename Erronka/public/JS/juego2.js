window.onload = () => {


    const app=Vue.createApp({})

    app.component('pregunta',{
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

    app.mount('#cont')
    
}
