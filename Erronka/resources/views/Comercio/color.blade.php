<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Colores</title>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> <!-- {{-- VUE  --}} -->
       
    <link rel="stylesheet" href="{{asset('CSS/color.css')}}">
    <script src="{{asset('JS/colorAdmin.js')}}"></script>

</head>
<body>

    @include('layouts.header')

    <main class="pt-5">
        <article id="menu" class="container">
            <componente></componente>
        </article>
        
        <article id="vista" class="container mt-5">
            <header class="mt-4">
                <h1>HEADER</h1>
            </header>
            <section>
                <div class="mt-4">
                    <p>Este es un texto de ejemplo</p>
                </div>
                <div></div>
            </section>
            <section>
                <div id="div2" class="mt-4"></div>
            </section>
        </article>

    </main>

    @include('layouts.footer')
    
</body>
</html>