<?php

session_start();

if(isset($_SESSION['login'])){

    include './database/conexao.php';


    $tipo = $_POST['type'];

    switch ($tipo) {
        case 'seo':
            $descryption = $_POST['descryption'];
            $keywords = $_POST['keywords'];
            $id = $_POST['id'];

            $query = 'UPDATE seo_descryption SET descryption = "'.$descryption.'", keywords = "'.$keywords.'" WHERE id_seo = '.$id.'';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin&status=success');
            }else{
                header('location: index.php?i=logged_admin&status=error');
            }
            break;

        case 'video':
            $title = $_POST['title'];
            $link = $_POST['link'];
            $id = $_POST['id'];

            $query = 'UPDATE youtube_videos SET nome = "'.$title.'", link = "'.$link.'" WHERE id_videos = '.$id.'';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }
            break;

        case 'theme_playlist':
            $theme = $_POST['theme_playlist'];
            $id = $_POST['id'];

            $query = 'UPDATE theme_playlists SET nome = "'.$theme.'" WHERE id_theme_playlist = '.$id.'';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }
            break;

        case 'theme_post':
            $theme = $_POST['theme_post'];
            $id = $_POST['id'];

            $query = 'UPDATE theme_posts SET nome = "'.$theme.'" WHERE id_theme_post = '.$id.'';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }
            break;

        case 'playlist':
            $title = $_POST['title'];
            $link = $_POST['link'];
            
            $theme = $_POST['theme'];
            $id = $_POST['id'];

            if($_FILES['cover']['size'] == 0){

                $query = 'UPDATE playlists SET title = "'.$title.'", link = "'.$link.'", id_theme_playlist = '.$theme.' WHERE id_playlist = '.$id.'';

            }else{
                
                $cover = $_FILES['cover'];

                $ext = strtolower(substr($_FILES['cover']['name'],-4)); //Pegando extensão do arquivo
                $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
                $dir = './pp_covers/'; //Diretório para uploads
            
                move_uploaded_file($_FILES['cover']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

                $current_cover = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM playlists WHERE id_playlist = '.$id.''));
                unlink($current_cover['cover']);

                $query = 'UPDATE playlists SET title = "'.$title.'", link = "'.$link.'", cover = "'.$dir.$new_name.'", id_theme_playlist = '.$theme.' WHERE id_playlist = '.$id.'';
            }
            
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }

            break;

        case 'post':
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $text = $_POST['texto'];
            $text2 = str_replace("'", "\'", $text);

            $postKeywords = $_POST['keywords'];

            $theme = $_POST['theme'];
            $id = $_POST['id'];

            if($_FILES['cover']['size'] == 0){

                $query = "UPDATE posts SET title = '".$title."', subtitle = '".$subtitle."', texto = '".$text2."', id_theme_post = ".$theme.", keywords= '".$postKeywords."' WHERE id_post = ".$id;
                

            }else{
                
                $cover = $_FILES['cover'];

                $ext = strtolower(substr($_FILES['cover']['name'],-4)); //Pegando extensão do arquivo
                $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
                $dir = './pp_covers/'; //Diretório para uploads
            
                move_uploaded_file($_FILES['cover']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

                $current_cover = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM posts WHERE id_post = '.$id.''));
                unlink($current_cover['cover']);

                $query = "UPDATE posts SET title = '".$title."', subtitle = '".$subtitle."', cover = '".$dir.$new_name."', texto = '".$text2."', id_theme_post = ".$theme.", keywords= '".$postKeywords."' WHERE id_post = ".$id;
            }
            

            if ($sucess = mysqli_query($conn, $query)) {

                header('location: index.php?i=logged_admin');
            }
            

            break;

        case 'best':
            $id_playlist = $_POST['playlist'];
            $id = $_POST['id'];

            $query = 'UPDATE best_playlists SET id_playlist = '.$id_playlist.' WHERE id_best_playlists = '.$id.'';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }
            break;
        case 'banner':
            $id = $_POST['id'];
            $imgBanner = $_POST['banner'];

            $ext = strtolower(substr($_FILES['banner']['name'],-4)); //Pegando extensão do arquivo
            $new_name = "banner-". date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './pp_covers/'; //Diretório para uploads

            $query = 'UPDATE banner SET img = "'.$dir.$new_name.'" WHERE id_banner = '.$id.'';

            $q = "SELECT * FROM banner WHERE id_banner = ".$id."";
            $item = mysqli_fetch_array(mysqli_query($conn, $q));
            $oldImg = $item['img'];
            
            if ($sucess = mysqli_query($conn, $query)) {
                unlink($oldImg);
                move_uploaded_file($_FILES['banner']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
                header('location: index.php?i=logged_admin&status=sucesso');
            }else{
                header('location: index.php?i=logged_admin&status=falha');
            }

            break;
    
        default:
            header('location: index.php?i=logged_admin');
            break;
    }


}