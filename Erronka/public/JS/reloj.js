window.onload = () => {

    const reloj = {
        data() {
            return{
                minutos: 30,
                segundos: 00,
                tiempo: null,
            }
        },
        methods: {

            intervalo () {
                this.tiempo = setInterval(() => {

                    this.segundos--;

                    if (this.segundos < 0) {
                        this.segundos = 59;
                        this.minutos--;
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
    };

    Vue.createApp(reloj).mount('#reloj')
    
}