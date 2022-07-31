<section style="position: relative;">
    
    <div class="topo-blog"></div>
    <img src="resources/LOGO.png" alt="logo" style="position: absolute; right: 6%; bottom: 5%; width: 5%; height: auto;">

</section>

<section class="sessao content-blog">
    <div class="container-xxl my-5 px-4 px-xxl-0">

        <div class="row">

            <div class="col-11 col-md-6 mx-auto mb-3" style="margin-bottom: 5%;">

                <?php 
                
                    if($linha = mysqli_fetch_array($consulta_posts)){

                        
                        echo '<div class="post-principal mx-auto" 
                        style="background: linear-gradient(360deg, rgba(0, 0, 0, 0.9) 15.15%, rgba(0, 0, 0, 0) 63.97%), url('.$linha['cover'].'); ">
                            
                            <p class="dataPostPrincipal">'.$linha['dia'].'</p>
                            <div style="position: absolute; bottom: 2%; left: 5%; width: 90%;">
                                <h3 class="tituloSessao clippedTextMultipleLines">'.$linha['title'].'</h3>
                                <h5 class="subtituloSessao clippedText2">'.$linha['subtitle'].'</h5>
                                <p><a class="link-playlist" href="?i=article&id='.$linha['id_post'].'">Saiba mais!</a></p>
                            </div>
                        </div>';

                    }

                ?>

            </div>

            <div class="col-11 col-md-5 mx-auto mb-3" style="min-height:40vh;">

                <h3 class="subtituloSessao">NESTA SEMANA</h3>
                <h3 class="subtituloSessao"><strong>ÚLTIMAS</strong></h3>

                <div class="container-fluid px-0">
                    <div class="row">

                        <?php

                            $counter = 0;

                            while ($linha = mysqli_fetch_array($consulta_posts) and $counter<3) {

                                $local_query2 = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM theme_posts WHERE id_theme_post = '.$linha['id_theme_post'].''));

                                echo '<a href="?i=article&id='.$linha['id_post'].'" class="col-4 ps-0 my-3 post-secundario imgCover" style="background-image: url('.$linha['cover'].'); height: 15vh;"></a>
                                    <div class="col-8 info-post-secundario">
                                        <a href="?i=article&id='.$linha['id_post'].'" style="text-decoration: none;">
                                            <p class="tipo-post-secundario" style="margin-bottom: 5%;">'.$local_query2['nome'].'</p>
                                            <h4 class="tituloPostSecundario clippedText2" style="margin-bottom: 0%;">'.$linha['title'].'</h4>
                                            <p><a class="link-playlist" href="?i=article&id='.$linha['id_post'].'">Saiba mais!</a></p>
                                        </a>
                                    </div>';

                                $counter++;
                            }
                        
                        ?>

                    </div>

                    <div class="row my-3">
                        <a class="link-blog-completo" href="?i=blog-completo" style="padding-right: 2%;">ver todos os artigos ></a>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

