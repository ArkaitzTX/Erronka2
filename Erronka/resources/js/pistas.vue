<template>
    <article class="pistas">
        <button v-on:click='corregir()' id="info" type="submit">i</button>
    </article>
</template> 

<script>
    export default {
        props: ['n'],
         data() {
            return {
                juego: this.n,
            }
        },
        methods: {
            darPista(){
                axios.get('{{asset("JS/datos.json")}}')
                .then((respuesta) => {
                    alert(respuesta);
                });
            }
        },
    }
</script>
