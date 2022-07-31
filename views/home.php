
    
        <!-- Slides Home -->
        <div id="slides" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <ol class="carousel-indicators">
                <li data-bs-target="#slides" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#slides" data-bs-slide-to="1"></li>
                <li data-bs-target="#slides" data-bs-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">

                <div class="carousel-item active">

                    <div class="imgSlide" style="background-image: url('./resources/Slide 1.png');">
                        <p class="tituloSlide">As melhores<br>playlists estão<br>aqui!</p>
                        <img class="logoSlide" src="resources/LOGO.png" alt="logo">
                    </div>
                    
                </div>
                <div class="carousel-item">
                    <div class="imgSlide" style="background-image: url('./resources/Slide 2.png');">
                        
                        <p class="tituloSlide">Descubra qual a<br>playlist para o seu<br>momento!</p>
                        <img class="logoSlide" src="resources/LOGO.png" alt="logo">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="imgSlide" style="background-image: url('./resources/Slide 3.png');">
                    
                        <p class="tituloSlide" style="top: 45%;">Escute já<br>PLAYLIST</p>
                        <img class="logoSlide" src="resources/LOGO.png" alt="logo">
                    </div>
                    
                </div>

                <?php 
                    $q = "SELECT * FROM banner";

                    while ($result = mysqli_fetch_array(mysqli_query($conn, $q))) {
                        echo '<div class="carousel-item">
                            <div class="imgSlide" style="background-image: url('.$result['img'].');">
                            
                                <img class="logoSlide" src="resources/LOGO.png" alt="logo">
                            </div>
                            
                        </div>';
                    }

                ?>
            </div>
        </div>

        <!-- Ultimos posts -->
        <div class="container-xxl my-5 px-4 px-xxl-0">
            <h3 class="tituloSessao">ÚLTIMOS ARTIGOS</h3>
            <h5 class="subtituloSessao">Conheça os destaques das notícias do mundo da música no nosso blog!</h5>

            <div class="row mt-5 mb-3">

                <?php
                $counter = 0;
                while ($linha = mysqli_fetch_array($consulta_posts) and $counter<4) {
                    echo '<div class="col-6 col-md-3 mb-3 mx-auto">
                            <div class="card">
                                <div class="card-img-top imgCard" alt="'.$linha['title'].'" style="background-image: url('.$linha['cover'].');"></div>
                                <div class="card-body">
                                    <h5 class="card-title clippedText2" style="margin-bottom: 5%;">'.$linha['title'].'</h5>
                                    <h6 class="card-subtitle clippedText2" style="margin-bottom: 5%;">'.$linha['subtitle'].'</h6>
                                    <p class="card-text"><a class="linkCard" href="?i=article&id='.$linha['id_post'].'">Ver artigo completo <i class="fas fa-angle-right"></i></a></p>
                                </div>
                            </div>
                        </div>';
                    $counter++;
                }
                if ($counter==0) {
                    echo '<p class="mensagemBreve">Em breve mais conteúdo...</p>';
                }
            
                ?>

            </div>

            <div class="row">
                <a class="section-link" href="?i=blog-completo">Veja todas as novidades <i class="fas fa-angle-right"></i></a>
            </div>

        </div>

        <!-- Melhores Playlists -->
        <div class="container-xxl my-5 px-4 px-xxl-0">

            <h3 class="tituloSessao">MELHORES PLAYLISTS</h3>
            <h5 class="subtituloSessao">Em nossos perfis escutamos as melhores músicas para criar as 
                playlists perfeitas para todos os gostos e momentos. Dá o play e venha conhecer nossa seleção!</h5>

            <div class="row mt-5 mb-3">

                <?php 
                $counter = 0;
                while ($linha2 = mysqli_fetch_array($consulta_best) and $counter<4) {
                    $temp = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM playlists WHERE id_playlist = '.$linha2['id_playlists']));
                    echo '<div class="col-5 col-md-3 px-1 mb-3 centralizedCover">
                            <a class="linkSpotify" href="'.$temp['link'].'">
                                <div class="imgCover playlistCover" style="background-image: url('.$temp['cover'].');" ></div>
                            </a>
                        </div>';
                    $counter++;
                }
                if ($counter==0) {
                    echo ' <p class="mensagemBreve">Em breve mais conteúdo...</p>';
                }
                ?>

            </div>
            <div class="row">
                <a class="section-link" href="?i=playlists">Escute todas as playlists! <i class="fas fa-angle-right"></i></a>
            </div>
            
        </div>

        <!-- Vídeos Calahits -->

        <div class="container-xxl my-5 px-4 px-xxl-0">

            <h3 class="tituloSessao">VÍDEOS CALA HITS</h3>
            <h5 class="subtituloSessao">O Cala Hits também está no Tiktok! Em nossa página você pode conhecer curiosidades sobre 
                o mundo musical, a história dos seus artistas preferidos e ouvir muita música boa!</h5>

            <?php
        
                echo '<div class="container-fluid owl-2-style py-4" style="padding-left: 6%; padding-right: 6%;">
                                
                                <div class="owl-carousel owl-4">';

                $counter = 0;
                while ($linha = mysqli_fetch_array($consulta_videos)) {
                    $link = $linha['link'];
                    $embed = 'https://www.tiktok.com/embed/v2/'.substr($link,-20);

                    echo '<div class="media-29101">
                            <a href=""><iframe width="100%" style="min-height:30vh;" src="'.$embed.'" title="Tiktok video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                        </div>';
                    $counter++;
                }
                    
                if ($counter == 0) {
                    echo '<div class="row">
                    <p class="mensagemBreve">Em breve mais conteúdo...</p>
                </div>';
                }   

                echo '</div></div>';
                
            ?>


        </div>
    