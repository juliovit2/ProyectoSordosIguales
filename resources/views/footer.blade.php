<!-- Footer -->
<footer class="page-footer font-small indigo">

    <!-- Footer Links -->
    <div class="container">

        <!-- Grid row-->
        <div class="row text-center d-flex justify-content-center pt-5 mb-3">
            <span style="font-size: 20px;color: #BABDC2">
                Colaboradores y Alianzas
            </span>

        </div>
        <!-- Grid row-->
        <hr class="rgba-white-light" style="margin: 0 20%;background-color: #95a5a6">

        <!-- Grid row-->
        <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

            <!-- Grid column -->
            <div class="col-md-12 col-12 mt-5">
                <div style="text-align: center;">
                    <?php
                    use App\tabla_colaborador_alianza;
                    $colabs = tabla_colaborador_alianza::get();
                    ?>
                    @foreach($colabs as $colab)
                        <a href="{{$colab['url']}}" target="_blank"><img class = "img" src="{{$colab['logo']}}" style ="height: 150px; padding: 15px;" alt="{{$colab['nombre']}}" title="{{$colab['nombre']}}"></a>
                    @endforeach
                </div>
            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row-->
        <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

        <!-- Grid row-->
        <div class="row pb-3 pt-5">

            <!-- Grid column -->
            <div class="col-md-12">

                <div class="mb-5 flex-center align-self-center" style ="color: #BABDC2;text-align: center">
                    <!-- Facebook -->
                    <a class="fb-ic footerLink" href = "monkey.png"><i class="fab fa-facebook-f fa-lg white-text mr-4"></i></a>
                    <!-- Twitter -->
                    <a class="tw-ic footerLink" href = "monkey.png"><i class="fab fa-twitter fa-lg white-text mr-4"></i></a>
                    <!--Instagram-->
                    <a class="ins-ic footerLink" href = "monkey.png"><i class="fab fa-instagram fa-lg white-text mr-4"></i></a>
                    <!--Whatsapp-->
                    <a class="pin-ic footerLink" href = "monkey.png"><i class="fab fa-whatsapp fa-lg white-text"></i></a>

                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row-->

    </div>
    <!-- Footer Links -->

</footer>
<!-- Footer -->
