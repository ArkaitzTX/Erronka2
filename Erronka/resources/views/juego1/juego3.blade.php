<!DOCTYPE html>
<html lang="en">

<body>
<<<<<<< HEAD
    JUEGO 1.3
    @yield('content')
</body>
=======
    {{-- JUEGO 3 --}}
    <section id="juego3" class="container d-flex align-items-center justify-content-center flex-column p-relative fs-5">
        <label>Calcula el dígito de control del siguiente código de barras: </label>
        <label class="text-danger">8410297120134</label>
        <br>

        {{-- *************************** VIDEO BUG ****************************** --}}
        {{-- <video class="col w-50 d-block candado" controls>
            <source src="{{asset('IMG/Calculo el dígito de control.mp4')}}" type="video/mp4">
        </video>         --}}
        {{-- <div class="candado embed-responsive embed-responsive-16by9">
        </div> --}}

        <iframe class="video col" src="https://www.youtube.com/embed/u2P6uVqNzSw" allowfullscreen></iframe>

    </section>

    {{-- PREGUNTA CORRECTOR --}}
    <section id="p3">
    </section>
</body>

<style>
    .video{
        min-height: 35vw;
        width: 50vw;
    }
</style>
>>>>>>> origin/development
</html>