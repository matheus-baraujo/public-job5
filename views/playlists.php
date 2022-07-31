<section  style="position: relative;">
    
    <div class="topo-playlists"></div>
    <h1 style="position: absolute; left: 11%; top: 20%; color:#230136; font-size: 3.9vw; font-weight: 700;">Conheça todas as<br>playlists CalaHits!</h1>
    <img src="resources/LOGO.png" alt="logo" style="position: absolute; right: 6%; bottom: 5%; width: 5%; height: auto;">

</section>


<?php
    while ($linha = mysqli_fetch_array($consulta_theme_playlists)) {

        echo '<div class="container-xxl my-5 px-4 px-xxl-0 owl-2-style py-4" >
                        
                        <h3 class="py-3 tituloSessao" style="margin-bottom: 0%; width: 50%;">'.mb_strtoupper($linha['nome'], 'UTF-8').'</h3>
                        
                        <div class="owl-carousel owl-2">';

                    $query = "SELECT * FROM playlists WHERE id_theme_playlist = ".$linha['id_theme_playlist']." ORDER BY id_playlist DESC";
                    $consulta_playlists = mysqli_query($conn, $query);

                    $counter = 0;
                    while ($linha2 = mysqli_fetch_array($consulta_playlists)) {
                        echo '<div class="media-29101">
                                <a class="linkSpotify" href="'.$linha2['link'].'" style="text-decoration: none;">
                                    <div class="imgCover imgPlaylist" style="background-image: url('.$linha2['cover'].');"></div>
                                </a>
                            </div>';
                        $counter++;
                    }
                    if ($counter == 0) {
                        echo '<p class="mensagemBreve">Em breve mais conteúdo...</p>';
                    }
                    
            echo '</div></div>';
        }
?>


<section class="sessao mensagem-final" style="text-align: center; padding-top: 20%; padding-bottom: 20%; color:#FF71A2;">

    <div class="container-fluid">

        <div class="row pt-2 pb-2">

            <div class="col-6 my-auto">
                <p class="links-contact"><a target="_blank" href="https://www.instagram.com/calahits/"><i class="fab fa-instagram"></i></a>  /@instagram</p>
                <p class="links-contact"><a target="_blank" href="https://open.spotify.com/user/lucascaladolima"><i class="fab fa-spotify"></i></a>  /@spotify</p>
            </div>

            <div class="col-6 my-auto">
                <p class="links-contact"><a target="_blank" href="#"><i class="fab fa-deezer"></i></a>  /@deezer</p>
                <p class="links-contact"><a target="_blank" href="https://www.youtube.com/channel/UC4k8w4epsNASP8Feoze_RGg/playlists"><i class="fab fa-youtube"></i></a>  /@youtube</p>
            </div>

            <div class="col-12 my-auto">
                <p class="links-contact"><a target="_blank" href="#"><img class="iconResso" src="./resources/resso_icon.png" alt=""></a>  /@resso</p>
                <p class="links-contact"><a target="_blank" href="https://www.tiktok.com/@calahits"><i class="fab fa-tiktok"></i></a>  /@tiktok</p>
            </div>

        </div>
    </div>

</section>
