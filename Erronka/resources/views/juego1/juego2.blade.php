<!DOCTYPE html>
<html lang="en">

<body>
    <section id="cont">

        <form v-for="miPregunta in preguntas" action="">
            <label>@{{ miPregunta.pregunta }}</label>

            <div v-for="(respuestas, index) in miPregunta.respuesta">
                <label>@{{ respuestas }}</label>
                <input type="radio" name="resp" :value="index" v-model="miPregunta.miRespuesta">
            </div>

        </form>

        <button v-on:click='corregir()'>CORREGIR</button>

        {{-- BORRAR --}}
        {{-- <pre>
            @{{ $data }}
        </pre> --}}

    </section>

    <section class="corrector">
        <corrector pre="pregunta 2:" cor="A">
        </corrector>
    </section>
</body>

</html>