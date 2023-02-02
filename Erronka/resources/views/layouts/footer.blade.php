<!DOCTYPE html>
<html lang="en">

<body>

    <section class="">
        <!-- Footer -->
        <footer class="text-center text-white">
            <!-- DIV1 -->
            <article class="container p-4 pb-0">
                <section class="">
                    <p class="d-flex justify-content-center align-items-center">
                        @if(null !== session()->get('usuario'))
                        <a href="{{ route('Comercio.cerrarSes') }}" class="btn elBoton" id="color">
                            {{__("header.f1")}} {{-- !idioma --}}
                        </a>
                        @else
                        <span class="me-3">{{__("header.f3")}} {{-- !idioma --}}</span>
                        <a href=' {{ route('Comercio.login') }} ' class="btn elBoton my-2 my-sm-0 " id="color">
                            {{__("header.f2")}} {{-- !idioma --}}
                        </a>
                        @endif
                    </p>
                </section>
            </article>
            <!--DIV1-->

            <!-- DIV2 -->
            <aside class="text-center p-3">
                © 2023 Copyright:
                <a class="text-white" href="https://fptxurdinaga.hezkuntza.net/">CIFP Txurdinaga LHII</a>
            </aside>
            <!-- DIV2 -->
        </footer>
        <!-- Footer -->
    </section>
</body>

</html>
