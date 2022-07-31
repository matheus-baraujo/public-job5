        <section style="position: relative;">
            
            <div class="topo-blog-completo"></div>
            <p style="position: absolute; left: 8%; bottom: 6%;"> <a class="link-return" href="?i=blog"><i class="fas fa-angle-left"></i> Voltar</a></p>
            <img src="resources/LOGO.png" alt="logo" style="position: absolute; right: 6%; bottom: 5%; width: 5%; height: auto;">

        </section>

        <?php 
        
            $id = $_GET['id'];
            $local_query = 'SELECT * FROM posts WHERE id_post = '.$id.'';
        
            $consulta = mysqli_query($conn, $local_query);

            if ($linha = mysqli_fetch_array($consulta)) {

                echo '<div class="container-xxl my-5 px-4 px-xxl-0">
                <div class="imgTitulo mx-auto" style="background: linear-gradient(360deg, rgba(0, 0, 0, 0.9) 15.15%, rgba(0, 0, 0, 0) 65.97%), url('.$linha['cover'].'); ">
                
                    <p style="position: absolute; top: 5%; left: 5%; color: white;">'.$linha['dia'].'</p>
                    <p class="tituloSessao" style="position: absolute; bottom: 5%; left: 5%; color: white; margin-bottom: 0%;">'.$linha['title'].'</p>
                </div>
                
                <div class="mx-auto px-2" style="width:80%; margin-top: 5%;">';

                $texto = explode(PHP_EOL, $linha['texto']);

                for($contador = 0; $contador < count($texto); $contador++){

                    $teste = $texto[$contador];

                    $texto[$contador] = str_replace("<1", "<span class='tam1'>", $texto[$contador]);
                    $texto[$contador] = str_replace("<2", "<span class='tam2'>", $texto[$contador]);
                    $texto[$contador] = str_replace("<3", "<span class='tam3'>", $texto[$contador]);

                    $texto[$contador] = str_replace("1>", "</span>", $texto[$contador]);
                    $texto[$contador] = str_replace("2>", "</span>", $texto[$contador]);
                    $texto[$contador] = str_replace("3>", "</span>", $texto[$contador]);

                    if(str_contains($texto[$contador], "open.spotify.com/album" )){
                        echo '<p><a class="commonLink" href="'.$texto[$contador].'" style="margin-top: 5%;">Ouça no spotify!! >></a><p>';

                        if(str_contains($texto[$contador], "?si=" )){
                            $embed = substr($texto[$contador],0, 25).'embed/'.substr($texto[$contador],-54, -26);
                        }else{
                            $embed = substr($texto[$contador],0, 25).'embed/'.substr($texto[$contador],-22);
                        }
                        
                        echo '<iframe class="playlistPlayer" src="'.$embed.'"  frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
                    
                    } elseif (str_contains($texto[$contador], "open.spotify.com/track")){
                        echo '<br><a class="commonLink" href="'.$texto[$contador].'" style="margin-top: 5%;">Ouça no spotify!! </a><br>';
                        if(str_contains($texto[$contador], "?si=" )){
                            $embed = substr($texto[$contador],0, 25).'embed/'.substr($texto[$contador],-48, -20);
                        }else{
                            $embed = substr($texto[$contador],0, 25).'embed/'.substr($texto[$contador],-22);
                        }

                        echo '<iframe class="playlistPlayer" src="'.$embed.'"  frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
                    
                    } elseif (str_contains($texto[$contador], "open.spotify.com/playlist")){
                        echo '<br><a class="commonLink" href="'.$texto[$contador].'" style="margin-top: 5%;">Ouça no spotify!! </a><br>';
                        if(str_contains($texto[$contador], "?si=" )){
                            $embed = substr($texto[$contador],0, 25).'embed/'.substr($texto[$contador],-54, -24);
                        }else{
                            $embed = substr($texto[$contador],0, 25).'embed/'.substr($texto[$contador],-31);
                        }
                        
                        echo '<iframe class="playlistPlayer" src="'.$embed.'"  frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
                    
                    } elseif (str_contains($texto[$contador], "youtu.be/") or str_contains($texto[$contador], "youtube.com/")){
                        
                        $embed = 'https://www.youtube.com/embed/'.substr($texto[$contador],-11);

                        echo '<iframe class="playerYoutube" src="'.$embed.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        
                    } elseif (str_contains($texto[$contador], "calahits.com.br/?i=article&id=")){
                        
                        //pegando a ultima posição da string
                        $tamanho = strlen($texto[$contador]) - 1;

                        $id_artigo = substr($texto[$contador], 41, $tamanho);
                        
                        //http://www.calahits.com.br/?i=article&id=7
                        $query = 'SELECT * FROM posts WHERE id_post = '.$id_artigo;
                        $consulta = mysqli_query($conn, $query);
                        $resultado = mysqli_fetch_array($consulta);

                        $embed = '<a class="commonLink" href="'.$texto[$contador].'">'.$resultado['title'].'</a>';

                        echo $embed;
                        
                    }  elseif (str_contains($texto[$contador], "tiktok.com")){
                        
                        //http://www.calahits.com.br/?i=article&id=7

                        $embed = '<a class="commonLink" href="'.$texto[$contador].'">Veja mais sobre no Tiktok!</a>';

                        echo $embed;
                        
                    } else {
                        echo '<p style="color: white;">'.$texto[$contador].'</p>';
                    }
                }

                echo '</div>
                </div>';

            }
            
        ?>


        <div class="mensagem-final">

            <div class="container-xxl my-5 px-4 px-xxl-0">

                <div class="col-md-6">

                    <h3 class="subtituloSessao" style="margin-bottom: 0%;">NESTA SEMANA</h3>
                    <h3 class="subtituloSessao"><strong>ÚLTIMAS</strong></h3>

                    <?php 
                        $counter = 0;
                        while ($linha2 = mysqli_fetch_array($consulta_posts) and $counter<3){
                            $tema = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM theme_posts WHERE id_theme_post ='.$linha2['id_theme_post']));

                            echo '<div class="row post-secundário" style="position: relative; padding: 2.5% 2.5% 0% 2.5%; text-decoration: none;">
                            <a href="?i=article&id='.$linha2['id_post'].'" class="imagem-post-secundario" style="width: 30%;">
                                <img src="'.$linha2['cover'].'" alt="post3" style="width: 100%;">
                            </a>
                            <a href="?i=article&id='.$linha2['id_post'].'" class="info-post-secundario" style="width: 68%; position: relative; padding: 5% 2% 0% 2%; text-decoration: none;">
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