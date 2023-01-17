<!DOCTYPE html>
<html lang="en">

<body>
    <section>
<div  id="cont">
        <form action="">
            <table class="table">
                <tr class="tr">
                    <label v-text="page"></label>
                    <th><label class="preg" v-text="preguntas[page].pregunta"></label></th>
                </tr>
                <tr class="tr">
                    <td>
                        <div class="resp" v-for="(respuestas, index) in preguntas[page].respuesta">
                        <input type="radio" name="resp" class="miResp" :value="index" v-model="preguntas[page].miRespuesta">
                            <label v-text="respuestas"></label>     
                        </div>
                    </td>
                </tr>
            </table>


        </form>
        <div class="pagination">
            <li class="page-item current-page page1"><button class="page-link" v-on:click='paginator1'>1</button></li>
            <li class="page-item current-page page2"><button class="page-link" v-on:click='paginator2'>2</button></li>
            <li class="page-item current-page page3"><button class="page-link" v-on:click='paginator3'>3</button></li>
            <li class="page-item current-page page4"><button class="page-link" v-on:click='paginator4'>4</button></li>
            <li class="page-item current-page page5"><button class="page-link" v-on:click='paginator5'>5</button></li>
            <li class="page-item current-page page6"><button class="page-link" v-on:click='paginator6'>6</button></li>
            <li class="page-item current-page page7"><button class="page-link" v-on:click='paginator7'>7</button></li>
            <li class="page-item current-page page8"><button class="page-link" v-on:click='paginator8'>8</button></li>
        </div>
        <button v-on:click='corregir()'>CORREGIR</button>

        {{-- BORRAR --}}
        {{-- <pre>
            @{{ $data }}
        </pre> --}}
        </div>
    </section>

    <section class="corrector">
        <corrector pre="pregunta 2:" cor="A">
        </corrector>
    </section>
</body>

</html>
