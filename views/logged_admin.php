        <!-- Admin Login Form -->

        <a class="btn" href="logout.php" style="color:black; float: right; margin-right: 5%; margin-top: 5%;"> Logout </a>

        <section class="sessao form-contact-alter" style="min-height: 100vh;">

            <div class="container-xxl my-5 px-4 px-xxl-0">
                <h1 class="tituloSessao" style="padding-bottom: 5%; text-align: center;">Administração</h1>

                <div class="sessao" id='controles'>
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-6 col-md-4 mb-3">
                                <button class="btn" onclick="selecionar(seo)" id="controleSEO">SEO</button>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <button class="btn" onclick="selecionar(videos)" id="controleVideos">Vídeos</button>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <button class="btn" onclick="selecionar(playlists)" id="controlePlaylists">PLaylists</button>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <button class="btn" onclick="selecionar(posts)" id="controlePosts">Posts</button>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <button class="btn" onclick="selecionar(best)" id="controleBest">Melhores Playlists</button>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <button class="btn" onclick="selecionar(banner)" id="controleBanner">Banner</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- TABELA SEO -->
                <div class="sessao" id='seo'>

                    <h3 class="tituloSessao" >SEO Páginas</h3>
                    <div id="content-seo" style=" margin: 2% auto; background-color: white; border-radius: 10px; padding: 0.5%;">
                        <table id="table_seo" class="table table-striped table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Página</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $localQuery = "SELECT * FROM seo_descryption";
                                    $result = mysqli_query($conn, $localQuery);
                                    while ($item = mysqli_fetch_array($result)) {
                                        echo'<tr>
                                            <td>'.$item["id_seo"].'</td>
                                            <td>'.$item["page"].'</td>
                                            <td><a href="?i=form_admin&type=seo&order=edit&id='.$item["id_seo"].'" class="linkAdmin"><i class="fas fa-pen"></i></a></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        
                    </div>
                </div>

                <!-- TABELA VIDEOS HOME -->
                <div class="sessao" id='videos'>

                    <h3 class="tituloSessao" >Vídeos - home</h3>
                    <div id="content-videos" style=" margin: 2% auto; background-color: white; border-radius: 10px; padding: 0.5%;">
                        <table id="table_videos" class="table table-striped table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while ($item = mysqli_fetch_array($consulta_videos)) {
                                        echo'<tr>
                                            <td>'.$item["id_videos"].'</td>
                                            <td>'.$item["nome"].'</td>
                                            <td><a href="?i=form_admin&type=video&order=edit&id='.$item["id_videos"].'" class="linkAdmin"><i class="fas fa-pen"></i></a></td>
                                            <td><a href="delete.php?type=video&id='.$item["id_videos"].'" class="linkAdmin"><i class="fas fa-trash"></i></a></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        
                    </div>
                    <a href="?i=form_admin&type=video&order=add" class="btn" style="color: white;">Adicionar</a>
                </div>

                <!-- TABELA TEMAS PLAYLISTS -->
                <div class="sessao" id="temaPlaylists">

                    <h3 class="tituloSessao">Temas - Playlists</h3>
                    <div id="content-theme-playlists" style=" margin: 2% auto; background-color: white; border-radius: 10px; padding: 0.5%;">
                        <table id="table_theme_playlists" class="table table-striped table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tema</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while ($item = mysqli_fetch_array($consulta_theme_playlists)) {
                                        echo '<tr>
                                            <td>'.$item["id_theme_playlist"].'</td>
                                            <td>'.$item["nome"].'</td>
                                            <td><a href="?i=form_admin&type=tema_playlist&order=edit&id='.$item["id_theme_playlist"].'" class="linkAdmin"><i class="fas fa-pen"></i></a></td>
                                            <td><a href="delete.php?type=theme_playlist&id='.$item["id_theme_playlist"].'" class="linkAdmin"><i class="fas fa-trash"></i></a></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                    </div>
                    <a href="?i=form_admin&type=tema_playlist&order=add" class="btn" style="color: white;">Adicionar</a>
                </div>

                <!-- TABELA TEMAS POSTS -->
                <div class="sessao" id="temaPosts">

                    <h3 class="tituloSessao" >Temas - Posts</h3>
                    <div id="content-theme-posts" style=" margin: 2% auto; background-color: white; border-radius: 10px; padding: 0.5%;">
                        <table id="table_theme_posts" class="table table-striped table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tema</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                        while ($item = mysqli_fetch_array($consulta_theme_posts)) {
                                            echo '<tr>
                                            <td>'.$item["id_theme_post"].'</td>
                                            <td>'.$item["nome"].'</td>
                                            <td><a href="?i=form_admin&type=tema_post&order=edit&id='.$item["id_theme_post"].'" class="linkAdmin"><i class="fas fa-pen"></i></a></td>
                                            <td><a href="delete.php?type=theme_post&id='.$item["id_theme_post"].'" class="linkAdmin"><i class="fas fa-trash"></i></a></td>
                                            </tr>';
                                        }
                                    ?>
                                    
                                
                            </tbody>
                            
                        </table>
                    </div>
                    <a href="?i=form_admin&type=tema_post&order=add" class="btn" style="color: white;">Adicionar</a>
                </div>

                <!-- TABELA PLAYLISTS -->
                <div class="sessao" id="playlists">

                    <h3 class="tituloSessao" >Playlists</h3>
                    <div id="content-playlists" style=" margin: 2% auto; background-color: white; border-radius: 10px; padding: 0.5%;">
                        <table id="table_playlists" class="table table-striped table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo</th>
                                    <th>Tema</th>
                                    <th>Data</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $local_query = mysqli_query($conn, 'SELECT * FROM playlists');
                                    while ($item = mysqli_fetch_array($local_query)) {
                                        $local_query2 = mysqli_query($conn, 'SELECT * FROM theme_playlists WHERE id_theme_playlist = '.$item['id_theme_playlist'].'');
                                        $item2 = mysqli_fetch_array($local_query2);

                                        echo '<tr>
                                            <td>'.$item['id_playlist'].'</td>
                                            <td>'.$item['title'].'</td>
                                            <td>'.$item2['nome'].'</td>
                                            <td>'.$item['dia'].'</td>
                                            <td><a href="?i=form_admin&type=playlist&order=edit&id='.$item['id_playlist'].'" class="linkAdmin"><i class="fas fa-pen"></i></a></td>
                                            <td><a href="delete.php?type=playlist&id='.$item["id_playlist"].'" class="linkAdmin"><i class="fas fa-trash"></i></a></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                    <a href="?i=form_admin&type=playlist&order=add" class="btn" style="color: white;">Adicionar</a>
                </div>

                <!-- TABELA POSTS -->
                <div class="sessao" id="posts">

                    <h3 class="tituloSessao" >Posts</h3>
                    <div id="content-posts" style=" margin: 2% auto; background-color: white; border-radius: 10px; padding: 0.5%;">
                        <table id="table_posts" class="table table-striped table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo</th>
                                    <th>Tema</th>
                                    <th>Data</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while ($item = mysqli_fetch_array($consulta_posts)) {
                                        $local_query2 = mysqli_query($conn, 'SELECT * FROM theme_posts WHERE id_theme_post = '.$item['id_theme_post'].'');
                                        $item2 = mysqli_fetch_array($local_query2);

                                        echo '<tr>
                                            <td>'.$item['id_post'].'</td>
                                            <td>'.$item['title'].'</td>
                                            <td>'.$item2['nome'].'</td>
                                            <td>'.$item['dia'].'</td>
                                            <td><a href="?i=form_admin&type=post&order=edit&id='.$item['id_post'].'" class="linkAdmin"><i class="fas fa-pen"></i></a></td>
                                            <td><a href="delete.php?type=post&id='.$item["id_post"].'" class="linkAdmin"><i class="fas fa-trash"></i></a></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                    </div>
                    <a href="?i=form_admin&type=post&order=add" class="btn" style="color: white;">Adicionar</a>
                </div>

                <!-- TABELA MELHORES PLAYLISTS -->
                <div class="sessao" id="best">

                    <h3 class="tituloSessao" >Melhores Playlists (Máx 4)</h3>
                    <div id="content-best" style=" margin: 2% auto; background-color: white; border-radius: 10px; padding: 0.5%;">
                        <table id="table_best" class="table table-striped table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo</th>
                                    <th>Data</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while ($item = mysqli_fetch_array($consulta_best)) {
                                        $item2 = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM playlists WHERE id_playlist = '.$item["id_playlists"].''));

                                        echo '<tr>
                                            <td>'.$item['id_best_playlists'].'</td>
                                            <td>'.$item2['title'].'</td>
                                            <td>'.$item2['dia'].'</td>
                                            <td><a href="?i=form_admin&type=best&order=edit&id='.$item['id_best_playlists'].'" class="linkAdmin"><i class="fas fa-pen"></i></a></td>
                                            <td><a href="delete.php?type=best&id='.$item["id_best_playlists"].'" class="linkAdmin"><i class="fas fa-trash"></i></a></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                    </div>
                    <a href="?i=form_admin&type=best&order=add" class="btn" style="color: white;">Adicionar</a>
                </div>

                <!-- TABELA BANNER -->
                <div class="sessao" id="banner">

                    <h3 class="tituloSessao" >Banner</h3>
                    <div id="content-banner" style=" margin: 2% auto; background-color: white; border-radius: 10px; padding: 0.5%;">
                        <table id="table_banner" class="table table-striped table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Imagem</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    
                                    while ($item = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM banner'))) {

                                        echo '<tr>
                                            <td>'.$item['id_banner'].'</td>
                                            <td>'.$item['img'].'</td>
                                            <td><a href="?i=form_admin&type=banner&order=edit&id='.$item['id_banner'].'" class="linkAdmin"><i class="fas fa-pen"></i></a></td>
                                            <td><a href="delete.php?type=banner&id='.$item["id_banner"].'" class="linkAdmin"><i class="fas fa-trash"></i></a></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                    </div>
                    <a href="?i=form_admin&type=banner&order=add" class="btn" style="color: white;">Adicionar</a>
                </div>
            </div>
            
        </section>

                
        <!-- Datatables -->
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script>

            $(document).ready(function() {
                $('#table_seo').DataTable();
                $('#table_videos').DataTable();
                $('#table_theme_playlists').DataTable();
                $('#table_theme_posts').DataTable();
                $('#table_playlists').DataTable({
                    "order": [[ 0, "desc" ]]
                });
                $('#table_posts').DataTable({
                    "order": [[ 0, "desc" ]]
                });
                $('#table_best').DataTable();
                $('#table_banner').DataTable();
            } );

            $(document).ready(function () {
                $('#seo').hide();
                $('#videos').hide();
                $('#temaPlaylists').hide();
                $('#temaPosts').hide();
                $('#playlists').hide();
                $('#posts').hide();
                $('#best').hide();
                $('#banner').hide();
            });

            function selecionar(tipo) {
                switch (tipo) {
                    case seo:
                        $('#seo').slideToggle();
                        $("#controleSEO").toggleClass('highlight');
                        break;
                    case videos:
                        $('#videos').slideToggle();
                        $("#controleVideos").toggleClass('highlight');
                    break;
                    case playlists:
                        $('#temaPlaylists').slideToggle();
                        $('#playlists').slideToggle();
                        $("#controlePlaylists").toggleClass('highlight');
                    break;
                    case posts:
                        $('#temaPosts').slideToggle();
                        $('#posts').slideToggle();
                        $("#controlePosts").toggleClass('highlight');
                    break;
                    case best:
                        $('#best').slideToggle();
                        $("#controleBest").toggleClass('highlight');
                    break;
                    case banner:
                        $('#banner').slideToggle();
                        $("#controleBanner").toggleClass('highlight');
                    break;
                
                    default:
                        break;
                }
            }

        </script>