window.onload = () => {


    const app=Vue.createApp({})
    app.component('reloj',{
        data() {
            return{
                minutos: 30,
                segundos: '00',
                tiempo: null,
            }
        },
        template: //html
        `
            <strong class="otro">Tiempo: {{ minutos }}:{{ segundos }}</strong>
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

    app.mount('#reloj')
    
}
