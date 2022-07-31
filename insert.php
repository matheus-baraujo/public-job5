<?php

session_start();

if(isset($_SESSION['login'])){

    include './database/conexao.php';


    $tipo = $_POST['type'];

    switch ($tipo) {
        case 'video':
            $title = $_POST['title'];
            $link = $_POST['link'];

            $query = 'INSERT INTO youtube_videos (nome, link) VALUES ("'.$title.'","'.$link.'")';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }else {
                header('location: index.php?i=logged_admin&status=falhaVideo');
            }
            break;

        case 'theme_playlist':
            $theme = $_POST['theme_playlist'];

            $query = 'INSERT INTO theme_playlists (nome) VALUES ("'.$theme.'")';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }else {
                header('location: index.php?i=logged_admin&status=falhaTema');
            }
            break;

        case 'theme_post':
            $theme = $_POST['theme_post'];

            $query = 'INSERT INTO theme_posts (nome) VALUES ("'.$theme.'")';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }else {
                header('location: index.php?i=logged_admin&status=falhaTema');
            }
            break;

        case 'playlist':
            $title = $_POST['title'];
            $link = $_POST['link'];
            $cover = $_FILES['cover'];
            $theme = $_POST['theme'];
            $data = $_POST['data'];

            $ext = strtolower(substr($_FILES['cover']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './pp_covers/'; //Diretório para uploads
        
            move_uploaded_file($_FILES['cover']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

            $query = 'INSERT INTO playlists (title, link, cover, dia, id_theme_playlist) VALUES ("'.$title.'","'.$link.'","'.$dir.$new_name.'","'.$data.'","'.$theme.'")';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }else {
                header('location: index.php?i=logged_admin&status=falhaPlaylist');
            }
            break;

        case 'post':
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $text = $_POST['texto'];
            $text2 = str_replace("'", "\'", $text);
            $cover = $_FILES['cover'];
            $theme = $_POST['theme'];
            $data = $_POST['data'];

            $postKeywords = $_POST['keywords'];

            $ext = strtolower(substr($_FILES['cover']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './pp_covers/'; //Diretório para uploads

            $query = "INSERT INTO posts (title, subtitle, cover, texto, id_theme_post,  dia, keywords) VALUES ('".$title."','".$subtitle."','".$dir.$new_name."','".$text2."',".$theme.", '".$data."', '".$postKeywords."')";
            
            if ($sucess = mysqli_query($conn, $query)) {
                move_uploaded_file($_FILES['cover']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
                header('location: index.php?i=logged_admin');
            }else {
                header('location: index.php?i=logged_admin&status=falhaPost');
            }
            break;

        case 'best':
            $id_playlist = $_POST['playlist'];

            $query_extra = 'SELECT * FROM best_playlists';

            if(mysqli_num_rows(mysqli_query($conn, $query_extra)) < 4 ){
                $query = 'INSERT INTO best_playlists (id_playlists) VALUES ('.$id_playlist.')';
            
                if ($sucess = mysqli_query($conn, $query)) {
                    header('location: index.php?i=logged_admin');
                }

            }else{
                header('location: index.php?i=logged_admin');
            }

            break;
        case 'banner':
            $imgBanner = $_FILES['banner'];

            $ext = strtolower(substr($_FILES['banner']['name'],-4)); //Pegando extensão do arquivo
            $new_name = "banner-". date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './pp_covers/'; //Diretório para uploads

            $query = 'INSERT INTO banner (img) VALUES ('.$dir.$new_name.')';
            
            if ($sucess = mysqli_query($conn, $query)) {
                

                move_uploaded_file($_FILES['banner']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
                header('location: index.php?i=logged_admin');
            }else{
                header('location: index.php?i=logged_admin');
            }

            break;
        
        default:
            header('location: index.php?i=logged_admin');
            break;
    }


}