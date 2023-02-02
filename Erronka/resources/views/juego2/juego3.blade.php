<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('CSS/_juego6.css')}}">
</head>
<body>

    <section id="juego6">

        <h5>Completa la ecuacion arrastrando los numeros en su posicion correcta.</h5>
        <h5><span class="text-danger">Rojo</span>: No esta <br> <span class="text-warning">Amarillo</span>: Es en otro lugar <br> <span class="text-success">Verde</span>: Es la posicion correcta</h5>
        <br>

        <div class="contenedor tam">
            <div id="0" v-on:drop="drop" v-on:dragover="allowDrop" class="caja"></div>
            <div id="1" v-on:drop="drop" v-on:dragover="allowDrop" class="caja"></div>
            +
            <div id="2" v-on:drop="drop" v-on:dragover="allowDrop" class="caja"></div>
            *
            <div id="3" v-on:drop="drop" v-on:dragover="allowDrop" class="caja"></div>
     
        </div>
        <br>
        <div class="contenedor">
            <div id="0" v-on:dragstart="drag" draggable="true" class="caja text-dark">0</div>
            <div id="1" v-on:dragstart="drag" draggable="true" class="caja text-dark">1</div>
            <div id="2" v-on:dragstart="drag" draggable="true" class="caja text-dark">2</div>
            <div id="3" v-on:dragstart="drag" draggable="true" class="caja text-dark">3</div>
            <div id="4" v-on:dragstart="drag" draggable="true" class="caja text-dark">4</div>
            <div id="5" v-on:dragstart="drag" draggable="true" class="caja text-dark">5</div>
            <div id="6" v-on:dragstart="drag" draggable="true" class="caja text-dark">6</div>
            <div id="7" v-on:dragstart="drag" draggable="true" class="caja text-dark">7</div>
            <div id="8" v-on:dragstart="drag" draggable="true" class="caja text-dark">8</div>
            <div id="9" v-on:dragstart="drag" draggable="true" class="caja text-dark">9</div>

        </div>
    </section>


    <section id="p3">
    </section>

</body>
</html>