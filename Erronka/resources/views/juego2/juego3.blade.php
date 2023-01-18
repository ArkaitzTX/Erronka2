<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('CSS/juego6.css')}}">
</head>
<body>
    <section id="juego6">
        <div class="contenedor tam">
            <div v-on:drop="drop" v-on:dragover="allowDrop" class="caja"></div>
            +
            <div v-on:drop="drop" v-on:dragover="allowDrop" class="caja"></div>
            =
            <div v-on:drop="drop" v-on:dragover="allowDrop" class="caja"></div>
        </div>
        <br>
        <div class="contenedor">
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">0</p>
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">1</p>
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">2</p>
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">3</p>
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">4</p>
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">5</p>
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">6</p>
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">7</p>
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">8</p>
            <p v-on:dragstart="drag" draggable="true" class="caja text-dark">9</p>
        </div>
    </section>

    <section id="p3">
    </section>

</body>
</html>