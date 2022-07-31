<!-- Form Contato -->
<section class="sessao backgroundContact">

    <div class="container-xxl my-5 px-4 px-xxl-0">
        <div class="row pt-2 pb-2">

            <div class="col-md-5 order-3 order-md-2 my-auto footer1">
                <h4 style="color:white; padding: 4% 4% 0% 8%;">Nos siga em nossas redes sociais e acompanhe novidades em todas as plataformas!</h4>

                <p class="links-contact"><a target="_blank" href="#"><i class="fab fa-instagram"></i></a>  /@instagram</p>
                <p class="links-contact"><a target="_blank" href="https://open.spotify.com/user/lucascaladolima"><i class="fab fa-spotify"></i></a>  /@spotify</p>
                <p class="links-contact"><a target="_blank" href="#"><i class="fab fa-deezer"></i></a>  /@deezer</p>
                <p class="links-contact"><a target="_blank" href="https://www.youtube.com/channel/UC4k8w4epsNASP8Feoze_RGg/playlists"><i class="fab fa-youtube"></i></a>  /@youtube</p>
                <p class="links-contact"><a target="_blank" href="#"><img class="iconResso" src="./resources/resso_icon.png" alt=""></a>  /@resso</p>
            </div>

            <div class="col-md-7 order-2 order-md-3" style="padding: 2%; padding-right: 8%; padding-left: 10%;">

                <h3 style="color: white; font-weight: bold;">CONTATO</h3>
                <h4 style="color: white; font-style: italic;">Entre em contato com Cala Hits e saiba mais sobre o mundo da música!</h4>

                <form id="contact-form" name="contact-form" action="mail.php" method="POST" >
                    <div class="mb-2">
                        <input type="text" class="formulario" id="name" name="name" placeholder="nome">
                    </div>
                    <div class="mb-2">
                        <input type="email" class="formulario" id="email" name="email" placeholder="email">
                    </div>
                    <div class="mb-2">
                        <input type="text" class="formulario" id="phone" name="phone" placeholder="telefone">
                    </div>
                    <div class="mb-2">
                        <textarea type="text" class="formulario" rows="4" id="message" name="message" placeholder="mensagem"></textarea>
                        
                    </div>
                    <a class="btn" onclick="validateForm();">ENVIAR</a>
                    <div class="status" style="float: left; padding: 1%; font-size: 1.8vw; color: black;"></div>
                </form>

            </div>

        </div>

    </div>

</section>