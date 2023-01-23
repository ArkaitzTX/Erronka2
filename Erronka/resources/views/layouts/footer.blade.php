<!DOCTYPE html>
<html lang="en">

<body>
    {{-- <div>

            <section class="">
                <!-- FOOTER -->
                <footer class="text-center text-white">
                    <div class="container p-4 pb-0">
                        <!-- CONTENIDO -->
                        <section class="">
                            <p class="d-flex justify-content-center align-items-center">
                                @if(null !== session()->get('usuario'))
                                <a href="{{ route('Comercio.cerrarSes') }}" type="button" class="btn btn-outline-light btn-rounded">
                                    Saioa itxi
                                </a>
                                @else
                                    <span class="me-3">Izena eman orain</span>
                                    <a href=' {{ route('Comercio.login') }} ' class="btn btn-outline-danger my-2 my-sm-0 " id="color" type="submit">
                                        Saioa Hasi
                                    </a>
                                @endif
                            </p>
                        </section>
                    </div>
        
                    <!-- Copyright -->
                    <aside class="text-center p-3">
                        © 2023 Copyright:
                        <a class="text-white" href="https://fptxurdinaga.hezkuntza.net/">CIFP Txurdinaga LHII</a>
                    </aside>
                    <!-- Copyright -->
                </footer>
                <!-- Footer -->
            </section>
        
        </div>
        
         --}}





         <section class="">
            <!-- Footer -->
            <footer class="text-center text-white">
              <!-- DIV1 -->
              <div class="container p-4 pb-0">
                    <section class="">
                        <p class="d-flex justify-content-center align-items-center">
                            @if(null !== session()->get('usuario'))
                                <button href="{{ route('Comercio.cerrarSes') }}" class="btn elBoton" id="color">
                                    Saioa itxi
                                </button>
                            @else
                                <span class="me-3">Izena eman orain</span>
                                <a href=' {{ route('Comercio.login') }} ' class="btn elBoton my-2 my-sm-0 " id="color">
                                    Saioa Hasi
                                </a>
                            @endif
                        </p>
                    </section>
              </div>
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
