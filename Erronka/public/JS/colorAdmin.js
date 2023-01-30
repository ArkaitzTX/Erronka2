
window.onload = () => {
    
    const menu = Vue.createApp({})
    menu.component('componente', {
        data() {
            return {
                temas: [
                    {
                        nombre: 'oscuro',
                        f: '#252525',
                        d0: '#B79a00',
                        d1: '#323232',
                        d2: '#F5F3F0',
                        h: '#191919',
                        t: '#FFFFFE'
                    },
                    {
                        nombre: 'claro',
                        f: '#FFFFFE',
                        d0: '#004173',
                        d1: '#0979b0',
                        d2: '#F5F3F0',
                        h: '#252525',
                        t: '#191919'
                    },
                ]
            }
        },
        template: `
            <section v-for="(color, index) in temas">
                <label>Nombre: </label>
                <input type="text" v-model="color.nombre">
                <label>Fondo: </label>
                <input type="color" v-model="color.f">
                <label>Div1: </label>
                <input type="color" v-model="color.d0">
                <label>Div2: </label>
                <input type="color" v-model="color.d1">
                <label>Div3: </label>
                <input type="color" v-model="color.d2">
                <label>Texto: </label>
                <input type="color" v-model="color.t">
                <label>Header: </label>
                <input type="color" v-model="color.h">
            </section>
            <pre class="text-light">{{$data}}</pre>
            `,
        methods: {

        },
        created() {

        }
    });

    menu.mount('#menu');
}
