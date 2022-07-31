        <section style="position: relative;">
            
            <div class="topo-blog-completo"></div>
            <p style="position: absolute; left: 8%; bottom: 6%;"> <a class="link-return" href="?i=blog"><i class="fas fa-angle-left"></i> Voltar</a></p>
            <img src="resources/LOGO.png" alt="logo" style="position: absolute; right: 6%; bottom: 5%; width: 5%; height: auto;">

        </section>


        <div class="container-xxl my-5 px-4 px-xxl-0">

            <?php 
                
                
                while($linha = mysqli_fetch_array($consulta_theme_posts)){
                    echo '<p class="tituloSessao">'.$linha['nome'].'</p>';

                    $counter = 0;
                    $local_query = 'SELECT * FROM posts WHERE id_theme_post = '.$linha['id_theme_post'].' ORDER BY id_post DESC ';
                    $consulta_local = mysqli_query($conn, $local_query);

                    if($linha2 = mysqli_fetch_array($consulta_local)){
                        echo '<div class="container-fluid">
                                <div class="row">
                                    <a  href="?i=article&id='.$linha2['id_post'].'" class="col-6 col-md-5 first-item-image" style="position: relative; color:white; background-image: url('.$linha2['cover'].');">
                                        <h4 style="position: absolute; top: 5%; left: 5%;">'.$linha2['dia'].'</h4>
                                        <h4 class="clippedTextMultipleLines" style="position: absolute; bottom: 5%; left: 5%; font-weight: normal; width: 80%;">'.$linha2['title'].'</h4>
                                    </a>
                                    
                                    <div class="col-6 mx-auto">
                                        <p class="tituloSessao" style="color: #FF71A2; font-weight: lighter; margin-bottom: 1%;">'.$linha['nome'].'</p>
                                        <p class="subtituloSessao clippedTextMultipleLines" style="color: white; font-style: none; margin-bottom: 1%;">'.$linha2['texto'].'</p>
                                        <a href="?i=article&id='.$linha2['id_post'].'" class="link-playlist" style="text-decoration:none;">Saiba mais!</a>
                                    </div>
                                </div>
                            </div>';
                    }

                    echo '<div class="container-fluid owl-2-style py-5" >

                    <div class="owl-carousel owl-3">';
                    
                    while ($linha2 = mysqli_fetch_array($consulta_local)) {

                        echo '<div class="media-29101">
                                <a href="?i=article&id='.$linha2['id_post'].'" style="color: white; text-decoration: none;"">
                                    <img class="img2" src="'.$linha2['cover'].'" alt="Image" class=" coverSecundario"> 
                                    <p style="position: absolute; top: 3%; right: 5%;">'.$linha2['dia'].'</p>
                                    <div style="position: absolute; bottom: 3%; left: 3%; width: 90%;">
                                        <p class="clippedTextMultipleLines" style="margin-bottom: 0%; text-decoration: none;">'.$linha2['title'].'</p>
                                        <p><a href="?i=article&id='.$linha2['id_post'].'" class="commonLink">Detalhes</a></p>
                                    </div>
                                </a>
                            </div>';   
                        
                        $counter++;
                    }

                    if ($counter == 0) {
                        echo '<p style="color: #FF71A2; padding: 5%; text-align: center;">Em breve mais conteúdo...</p>';
                    }
                    
                    echo '</div></div>';
                }
                
                echo '</div>';
            
            ?>

        </div>
        


        <div class=" mensagem-final" style="background-color: black;">

            <div class="container-xxl my-5 px-4 px-xxl-0">
                <div class="row">
                    <div class="col-md-6">

                        <h3 style="padding-top:2%; font-size: 2vw; margin-bottom: 0%; color: white;">NESTA SEMANA</h3>
                        <h3 style="font-size: 2.5vw; color: white;"><strong>ÚLTIMAS</strong></h3>

                        <?php 
                            $counter = 0;
                            while ($linha2 = mysqli_fetch_array($consulta_posts) and $counter<3){
                                $tema = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM theme_posts WHERE id_theme_post ='.$linha2['id_theme_post']));

                                echo '<div class="row post-secundário" style="position: relative; padding: 2.5% 2.5% 0% 2.5%;">
                                <a href="?i=article&id='.$linha2['id_post'].'" class="imagem-post-secundario" style="width: 30%;">
                                    <img src="'.$linha2['cover'].'" alt="post3" style="width: 100%;">
                                </a>
                                <a href="?i=article&id='.$linha2['id_post'].'" class="info-post-secundario" style="width: 68%; position: relative; padding: 5% 2% 0% 2%; text-decoration:none;">
                                    <p class="tipo-post-secundario">'.$tema['nome'].'</p>
                                    <p class="titulo-secundario clippedText" style="margin-bottom: 0%;">'.$linha2['title'].'</p>
                                    <p class="link-playlist">Saiba mais!</p>
                                </a>
                            </div>

                            <hr class="separation" style="width: 65%; border-color: #9641C7; margin: 0% 0% 0% 32%;">';
                            $counter++;
                            }

                        ?>

                        <a class="link-blog-completo" href="?i=blog-completo" style="float:right; padding-right: 2%; margin: 5% 0%;">ver todos os artigos ></a>

                    </div>
                </div>
            </div>
                
        </div>