<!-- Admin Login Form -->
<div class="sessao form-contact-alter" style="min-height: 100vh;">
    
    <div class="container-xxl my-5 px-4 px-xxl-0">

        <?php 
            if (isset($_GET['type']) and isset($_GET['order'])) {
                $type = $_GET['type'];
                $order = $_GET['order'];
                
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }

                #seo
                switch ($type) {
                    case 'seo':
                        if($order == 'edit'){
                            $query = 'SELECT * FROM seo_descryption WHERE id_seo = '.$id.'';
                            $local_query = mysqli_query($conn, $query);
                            if ($item = mysqli_fetch_array($local_query)) {
                                echo '
                                <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Editar Descrição - '.$item['page'].'</h1>
                    
                                <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                    <form action="update.php" method="post">
                                        <input type="text" name="type" value="seo" hidden>
                                        <input type="text" name="id" value="'.$id.'" hidden>

                                        <label for="descryption" class="subtituloSessao"><h3>Descrição</h3></label>
                                        <textarea id="descryption" name="descryption"  rows="5" class="formulario" style="width: 100%; margin-bottom: 2%;">'.$item["descryption"].'</textarea>

                                        <label for="keywords" class="subtituloSessao"><h3>Keywords</h3></label>
                                        <input id="keywords" name="keywords" type="text" class="formulario" style="width: 100%; margin-bottom: 3%;" value="'.$item["keywords"].'">

                                        <input type="submit" value="Salvar" class="btn" style="float: right;">
                                        <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                    </form>
                                </div>';
                            }
                            
                        }
                        break;
                    #videos
                    case 'video':
                        if ($order == 'add') {
                            echo '<!-- title, link  -->
                            
                
                            <h3 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Adicionar Vídeos</h3>
                
                            <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                <form action="insert.php" method="post">
                                    <input type="text" name="type" value="video" hidden>

                                    <label for="titulo" class="subtituloSessao"><h3>Título*</h3></label>
                                    <input id="titulo" name="title" type="text" class="formulario" style="width: 100%; margin-bottom: 2%;" required>

                                    <label for="link" class="subtituloSessao"><h3>Link*</h3></label>
                                    <input id="link" name="link" type="text" class="formulario" style="width: 100%; margin-bottom: 3%;" required>

                                    <input type="submit" value="Salvar" class="btn" style="float: right;">
                                    <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                </form>
                            </div>';
                        }
                        elseif($order == 'edit'){
                            $query = 'SELECT * FROM youtube_videos WHERE id_videos = '.$id.'';
                            $local_query = mysqli_query($conn, $query);
                            if ($item = mysqli_fetch_array($local_query)) {
                                echo '<!-- title, link  -->

                                <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Editar Vídeos</h1>
                    
                    
                                <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                    <form action="update.php" method="post">
                                        <input type="text" name="type" value="video" hidden>
                                        <input type="text" name="id" value="'.$id.'" hidden>

                                        <label for="titulo" class="subtituloSessao"><h3>Título*</h3></label>
                                        <input id="titulo" type="text" class="formulario" style="width: 100%; margin-bottom: 2%;" value="'.$item["nome"].'" required>

                                        <label for="link" class="subtituloSessao"><h3>Link*</h3></label>
                                        <input id="link" type="text" class="formulario" style="width: 100%; margin-bottom: 3%;" value="'.$item["link"].'" required>

                                        <input type="submit" value="Salvar" class="btn" style="float: right;">
                                        <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                    </form>
                                </div>';
                            }
                            
                        }
                        break;
                    #theme_playlists
                    case 'tema_playlist':
                        if ($order == 'add') {
                            echo '<!-- tema -->
                            <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Adicionar Tema Playlist</h1>
                
                            <div class="col-md-10" style="margin: 0% auto; padding-bottom: 15%;">
                                <form action="insert.php" method="post">
                                    <input type="text" name="type" value="theme_playlist" hidden>

                                    <label for="theme" class="subtituloSessao"><h3>Tema*</h3></label>
                                    <input id="theme" name="theme_playlist" type="text" class="formulario" style="width: 100%; margin-bottom: 2%;" required>

                                    <input type="submit" value="Salvar" class="btn" style="float: right;">
                                    <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                </form>
                            </div>';
                        }
                        elseif($order == 'edit'){
                            $query = 'SELECT * FROM theme_playlists WHERE id_theme_playlist = '.$id.'';
                            $local_query = mysqli_query($conn, $query);
                            if ($item = mysqli_fetch_array($local_query)){
                                echo '<!-- tema -->
                            <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Editar Tema Playlist</h1>
                
                
                            <div class="col-md-10" style="margin: 0% auto; padding-bottom: 15%;">
                                <form action="update.php" method="post">
                                    <input type="text" name="type" value="theme_playlist" hidden>
                                    <input type="text" name="id" value="'.$id.'" hidden>

                                    <label for="theme" class="subtituloSessao"><h3>Tema*</h3></label>
                                    <input id="theme" name="theme_playlist" type="text" class="formulario" style="width: 100%; margin-bottom: 2%;" value="'.$item["nome"].'" required>

                                    <input type="submit" value="Salvar" class="btn" style="float: right;">
                                    <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                </form>
                            </div>';
                            }
                            
                        }
                        break;
                    #theme_posts
                    case 'tema_post':
                        if ($order == 'add') {
                            echo '<!-- tema -->
                            <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Adicionar Tema Post</h1>
                
                            <div class="col-md-10" style="margin: 0% auto; padding-bottom: 15%;">
                                <form action="insert.php" method="post">
                                    <input type="text" name="type" value="theme_post" hidden>

                                    <label for="theme" class="subtituloSessao"><h3>Tema*</h3></label>
                                    <input id="theme" name="theme_post" type="text" class="formulario" style="width: 100%; margin-bottom: 2%;" required>

                                    <input type="submit" value="Salvar" class="btn" style="float: right;">
                                    <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                </form>
                            </div>';
                        }
                        elseif($order == 'edit'){
                            $query = 'SELECT * FROM theme_posts WHERE id_theme_post = '.$id.'';
                            $local_query = mysqli_query($conn, $query);
                            if ($item = mysqli_fetch_array($local_query)){
                                echo '<!-- tema -->
                                <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Editar Tema Post</h1>
                    
                                <div class="col-md-10" style="margin: 0% auto; padding-bottom: 15%;">
                                    <form action="update.php" method="post">
                                        <input type="text" name="type" value="theme_post" hidden>
                                        <input type="text" name="id" value="'.$id.'" hidden>

                                        <label for="theme" class="subtituloSessao"><h3>Tema*</h3></label>
                                        <input id="theme" name="theme_post" type="text" class="formulario" style="width: 100%; margin-bottom: 2%;" value="'.$item["nome"].'" required>

                                        <input type="submit" value="Salvar" class="btn" style="float: right;">
                                        <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                    </form>
                                </div>';
                            }
                            
                        }
                        break;
                    #playlists
                    case 'playlist':
                        if ($order == 'add') {
                            echo '<!-- title, link, cover, data  -->
                            <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Adicionar Playlists</h1>
            
                            <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                <form action="insert.php" method="post" enctype="multipart/form-data">
                                    <input type="text" name="type" value="playlist" hidden>

                                    <label for="title" class="subtituloSessao""><h3>Titulo*</h3></label>
                                    <input id="title" type="text" class="formulario" name="title" style="margin-bottom: 2%;" required>

                                    <label for="link" class="subtituloSessao"><h3>Link*</h3></label>
                                    <input id="link" type="text" class="formulario" name="link" style="margin-bottom: 2%;" required>

                                    <label for="cover" class="subtituloSessao"><h3>Capa* (Ideal: 900x600)</h3></label>
                                    <input id="cover" type="file" class="formulario" name="cover" accept="image/*" style="margin-bottom: 2%;" required>

                                    <label for="theme" class="subtituloSessao"><h3>Tema*</h3></label>
                                    <select id="theme" name="theme" id="" class="formulario" style="margin-bottom: 2%;">';
                                    while ($item = mysqli_fetch_array($consulta_theme_playlists)) {
                                        echo '<option value="'.$item["id_theme_playlist"].'">'.$item["nome"].'</option>';
                                    }
                                    echo '    
                                    </select>

                                    <input  type="text" name="data" hidden value="'.date("d/m/Y").'">
                
                                    <input type="submit" value="Salvar" class="btn" style=" float: right;">
                                    <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                </form>
                            </div>';
                        }
                        elseif($order == 'edit'){
                            $query = 'SELECT * FROM playlists WHERE id_playlist = '.$id.'';
                            $local_query = mysqli_query($conn, $query);
                            if ($item = mysqli_fetch_array($local_query)){
                                echo '<!-- title, link, cover, data  -->
                                <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Editar Playlists</h1>
                    
                                <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                    <form action="update.php" method="post" enctype="multipart/form-data">
                                        <input type="text" name="type" value="playlist" hidden>
                                        <input type="text" name="id" value="'.$id.'" hidden>

                                        <label for="title" class="subtituloSessao"><h3>Titulo*</h3></label>
                                        <input id="title" type="text" class="formulario" name="title" style="margin-bottom: 2%;" value='.$item["title"].' required>

                                        <label for="link" class="subtituloSessao"><h3>Link*</h3></label>
                                        <input id="link" type="text" class="formulario" name="link" style="margin-bottom: 2%;" value="'.$item["link"].'" required>

                                        <label for="cover" class="subtituloSessao"><h3>Capa* (Ideal: 900x600)</h3></label>
                                        <input id="cover" type="file" class="formulario" name="cover" accept="image/*" style="margin-bottom: 2%;" value="'.$item["cover"].'" required>

                                        <label for="theme" class="subtituloSessao"><h3>Tema</h3></label>
                                        <select id="theme" name="theme" id="" class="formulario" style="margin-bottom: 2%;">';
                                        while ($item2 = mysqli_fetch_array($consulta_theme_playlists)) {
                                            echo '<option value="'.$item2["id_theme_playlist"].'"';
                                            if ($item['id_theme_playlist'] == $item2['id_theme_playlist']){echo ' selected ';}
                                            echo '>'.$item2["nome"].'</option>';
                                        }
                                        echo '
                                        </select>
                    
                                        <input type="submit" value="Salvar" class="btn" style="float: right;">
                                        <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                    </form>
                                </div>';
                            }
                            
                        }
                        break;
                    #posts
                    case 'post':
                        if ($order == 'add') {
                            echo '<!-- title, playlist, cover, data  -->
                            <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Adicionar Posts</h1>
                
                            <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                <form action="insert.php" method="post" enctype="multipart/form-data">
                                    <input type="text" name="type" value="post" hidden>

                                    <label for="title" class="subtituloSessao""><h3>Titulo*</h3></label>
                                    <input id="title" type="text" class="formulario" name="title" style="margin-bottom: 2%;" required>

                                    <label for="subtitle" class="subtituloSessao"><h3>Subtitulo</h3></label>
                                    <input id="subtitle" type="text" class="formulario" name="subtitle" style="margin-bottom: 2%;">
                
                                    <label for="texto" class="subtituloSessao">
                                        <h3>Texto 
                                        <button type="button" class="infoIcon" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true"
                                            title="'; 
                                            
                                        echo "  Texto <3 de 3> exemplo = Texto <span class='tam3'> de </span> exemplo 
                                                    <br>
                                                    Tamanho varia de 1 a 3";
                                    echo ' ">
                                            <i class="fas fa-info"></i>
                                        </button>
                                        </h3>
                                    </label>
                                    <textarea id="texto" class="formulario" name="texto" rows="10" style="margin-bottom: 2%;"></textarea>

                                    <label for="cover" class="subtituloSessao"><h3>Capa* (Ideal: 900x600)</h3></label>
                                    <input id="cover" type="file" class="formulario" name="cover" accept="image/*" style="margin-bottom: 2%;" required>
                
                                    <label for="theme" class="subtituloSessao"><h3>Tema</h3></label>
                                    <select name="theme" id="theme" class="formulario" style="margin-bottom: 2%;">';
                                    while ($item = mysqli_fetch_array($consulta_theme_posts)) {
                                        echo '<option value="'.$item['id_theme_post'].'">'.$item["nome"].'</option>';
                                    }
                                    echo '
                                    </select>
                
                                    <label for="keywords" class="subtituloSessao"><h3>Keywords</h3></label>
                                    <input id="keywords" name="keywords" type="text" class="formulario" style="width: 100%; margin-bottom: 3%;" required>

                                    <input  type="text" name="data" hidden value="'.date("d/m/Y").'">
                
                                    <input type="submit" value="Salvar" class="btn" style="float: right;">
                                    <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                </form>
                            </div>';
                        }
                        elseif($order == 'edit'){
                            $query = 'SELECT * FROM posts WHERE id_post = '.$id.'';
                            $local_query = mysqli_query($conn, $query);
                            if ($item = mysqli_fetch_array($local_query)){
                                echo '<!-- title, playlist, cover, data  -->
                                <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Editar Posts</h1>
                    
                                <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                    <form action="update.php" method="post" enctype="multipart/form-data">
                                        <input type="text" name="type" value="post" hidden>
                                        <input type="text" name="id" value="'.$id.'" hidden>

                                        <label for="title" class="subtituloSessao"><h3>Titulo*</h3></label>
                                        <input id="title" type="text" class="formulario" name="title" style="margin-bottom: 2%;" value="'.$item["title"].'" required>

                                        <label for="subtitle" class="subtituloSessao"><h3>Subtitulo</h3></label>
                                        <input id="subtitle" type="text" class="formulario" name="subtitle" style="margin-bottom: 2%;" value="'.$item["subtitle"].'">
                    
                                        <label for="texto" class="subtituloSessao">
                                        <h3>Texto 
                                        <button type="button" class="infoIcon" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true"
                                            title="'; 
                                            
                                            echo "  Texto <3 de 3> exemplo = Texto <span class='tam3'> de </span> exemplo 
                                                        <br>
                                                        Tamanho varia de 1 a 3";
                                        echo ' ">
                                                <i class="fas fa-info"></i>
                                            </button>
                                            </h3>    
                                        </label>
                                        <textarea id="texto" class="formulario" name="texto" rows="10" style="margin-bottom: 2%;">'.$item["texto"].'</textarea>

                                        <label for="cover" class="subtituloSessao"><h3>Capa</h3></label>
                                        <input id="cover" type="file" class="formulario" name="cover" accept="image/*" style="margin-bottom: 2%;" >
                    
                                        <label for="theme" class="subtituloSessao"><h3>Tema</h3></label>
                                        <select name="theme" id="theme" class="formulario" style="margin-bottom: 2%;">';
                                        while ($item2 = mysqli_fetch_array($consulta_theme_posts)) {
                                            echo '<option value="'.$item2['id_theme_post'].'"';
                                            if ($item2['id_theme_post'] == $item['id_theme_post']) {echo ' selected ';}
                                            echo '>'.$item2["nome"].'</option>';
                                        }
                                        echo '</select>
                                        
                                        <label for="keywords" class="subtituloSessao"><h3>Keywords</h3></label>
                                        <input id="keywords" name="keywords" type="text" class="formulario" style="width: 100%; margin-bottom: 3%;" value="'.$item['keywords'].'" required>

                                        <input type="submit" value="Salvar" class="btn" style=" float: right;">
                                        <a href="?i=logged_admin" class="btn" style=" float: left;">Cancelar</a>
                                    </form>
                                </div>';
                            }
                            
                        }
                        break;
                    #best
                    case 'best':
                        if ($order == 'add') {
                            echo '<!-- 4 playlists -->  
                            <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Selecionar Melhores Playlists</h1>
                
                            <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                <form action="insert.php" method="post" enctype="multipart/form-data">
                                    <input type="text" name="type" value="best" hidden>
                                    
                                    <label for="playlist" class="subtituloSessao"><h3>Playlist</h3></label>
                                    <select name="playlist" id="playlist" class="formulario" style="margin-bottom: 2%;">';

                                    while ($item2 = mysqli_fetch_array($consulta_playlists)) {
                                        echo '<option value="'.$item2['id_playlist'].'">'.$item2["title"].'</option>';
                                    }

                                    echo '
                                    </select>
                
                                    <input type="submit" value="Salvar" class="btn" style="float: right;">
                                    <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                </form>
                            </div>';
                        }
                        elseif($order == 'edit'){
                            $query = 'SELECT * FROM best_playlists WHERE id_best_playlists = '.$id.'';

                            $local_query = mysqli_query($conn, $query);

                            if ($item = mysqli_fetch_array($local_query)){
                                echo '<!-- 4 playlists -->  
                                <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Selecionar Melhores Playlists</h1>
                    
                                <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                    <form action="update.php" method="post" enctype="multipart/form-data">
                                        <input type="text" name="type" value="best" hidden>
                                        
                                        <label for="playlist" class="subtituloSessao"><h3>Playlist</h3></label>
                                        <select name="playlist" id="playlist" class="formulario" style="margin-bottom: 2%;">';

                                        while ($item2 = mysqli_fetch_array($consulta_playlists)) {
                                            echo '<option value="'.$item2['id_playlist'].'"';
                                            if($item2['id_playlist'] == $item['id_playlist']) {echo 'selected';}
                                            echo '>'.$item2["title"].'</option>';
                                        }

                                        echo '
                                        </select>
                    
                                        <input type="submit" value="Salvar" class="btn" style="float: right;">
                                        <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                    </form>
                                </div>';
                            }
                        }
                        break;
                    #banner
                    case 'banner':
                        if ($order == 'add') {
                            echo '<!-- Banner -->  
                            <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Adicinar Banner</h1>
                
                            <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                <form action="insert.php" method="post" enctype="multipart/form-data">
                                    <input type="text" name="type" value="best" hidden>
                                    
                                    <label for="banner" class="subtituloSessao"><h3>Imagem Banner</h3></label>
                                    <input id="banner" type="file" class="formulario" name="banner" accept="image/*" style="margin-bottom: 2%;" required>
                
                                    <input type="submit" value="Salvar" class="btn" style="float: right;">
                                    <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                </form>
                            </div>';
                        }
                        elseif($order == 'edit'){
                            $query = 'SELECT * FROM banner WHERE id_banner = '.$id.'';

                            $local_query = mysqli_query($conn, $query);

                            if ($item = mysqli_fetch_array($local_query)){
                                echo '<!-- Banner -->  
                                <h1 class="tituloSessao" style="margin-bottom: 4%; text-align: center;">Editar Banner</h1>
                    
                                <div class="col-md-10" style="margin: 0% auto; padding-bottom: 10%;">
                                    <form action="update.php" method="post" enctype="multipart/form-data">
                                        <input type="text" name="type" value="best" hidden>
                                        
                                        <label for="banner" class="subtituloSessao"><h3>Imagem Banner</h3></label>
                                        <input id="banner" type="file" class="formulario" name="banner" accept="image/*" style="margin-bottom: 2%;" required>
                    
                                        <input type="submit" value="Salvar" class="btn" style="float: right;">
                                        <a href="?i=logged_admin" class="btn" style="float: left;">Cancelar</a>
                                    </form>
                                </div>';
                            }
                        }
                        break;
                    default:
                        header('location:index.php?i=logged_admin');
                        break;
                }
            }

        ?>

    </div>

</div>