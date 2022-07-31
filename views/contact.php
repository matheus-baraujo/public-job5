        <!-- Form Contato -->

        <section class="sessao form-contact-alter">

            <div class="container-xxl my-5 px-4 px-xxl-0">

                <h1 class="tituloSessao" style="margin-bottom: 5%; text-align: center;">CONTATO</h1>
                
                <div class="mx-auto" style="width: 70%;">
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST" >
                        <div class="mb-3">
                            <input type="text" class="formulario" id="name" name="name" placeholder="nome">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="formulario" id="email" name="email" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="formulario" id="phone" name="phone" placeholder="telefone">
                        </div>
                        <div class="mb-2">
                            <textarea type="text" class="formulario" rows="4" id="message" name="message" placeholder="mensagem"></textarea>
                            
                        </div>
                        <a class="btn" onclick="validateForm();">ENVIAR</a>
                        <div class="status" style="float: left; padding: 1%; font-size: 1.8vw; color: black;"></div>
                    </form>
                </div>

                <hr class="line">

                <div class="row">
                    <div class="col-4 col-md-2 ms-auto"  >
                        <p class="links-contact-2"><a target="_blank" href="https://www.instagram.com/calahits/"><i class="fab fa-instagram"></i></a> /@instagram</p>
                        <p class="links-contact-2"><a target="_blank" href="https://open.spotify.com/user/lucascaladolima"><i class="fab fa-spotify"></i></a> /@spotify</p>
                        <p class="links-contact-2"><a target="_blank" href="#"><img class="iconResso" src="./resources/resso_icon.png" alt=""></a> /@resso</p>
                    </div>
                    <div class="col-4 col-md-2 me-auto" >
                        <p class="links-contact-2"><a target="_blank" href="#"><i class="fab fa-deezer"></i></a> /@deezer</p>
                        <p class="links-contact-2"><a target="_blank" href="https://www.youtube.com/channel/UC4k8w4epsNASP8Feoze_RGg/playlists"><i class="fab fa-youtube"></i></a> /@youtube</p>
                        <p class="links-contact-2"><a target="_blank" href="https://www.tiktok.com/@calahits"><i class="fab fa-tiktok"></i></a> /@tiktok</p>
                    </div>
                </div>

            </div>
        </section>
            
        