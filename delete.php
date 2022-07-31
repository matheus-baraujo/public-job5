<?php

session_start();

if(isset($_SESSION['login'])){

    include './database/conexao.php';


    $tipo = $_GET['type'];

    switch ($tipo) {
        case 'video':
            $id = $_GET['id'];

            $query = 'DELETE FROM youtube_videos WHERE id_videos = "'.$id.'"';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }
            break;

        case 'theme_playlist':
            $id = $_GET['id'];

            $query = 'DELETE FROM theme_playlists WHERE id_theme_playlist = '.$id.'';
            
            if ($sucess = mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }
            break;

        case 'theme_post':
            $id = $_GET['id'];

            $query = 'DELETE FROM theme_posts WHERE id_theme_post = '.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }
            break;

        case 'playlist':
            $id = $_GET['id'];

            $item = mysqli_query($conn, 'SELECT * FROM playlists WHERE id_playlist='.$id.'');
            $item2 = mysqli_fetch_array($item);
            unlink($item2['cover']);

            $query = 'DELETE FROM playlists WHERE id_playlist ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }
            break;

        case 'post':
            $id = $_GET['id'];

            $item = mysqli_query($conn, 'SELECT * FROM posts WHERE id_post= '.$id.'');
            $item2 = mysqli_fetch_array($item);
            

            $query = 'DELETE FROM posts WHERE id_post ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                unlink($item2['cover']);
                header('location: index.php?i=logged_admin');
            }
            break;

        case 'best':
            $id = $_GET['id'];

            $query = 'DELETE FROM best_playlists WHERE id_best_playlists ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?i=logged_admin');
            }
            break;
        case 'banner':
            $id = $_GET['id'];

            $q = "SELECT * FROM banner WHERE id_banner = ".$id."";
            $item = mysqli_fetch_array(mysqli_query($conn, $q));
            $oldImg = $item['img'];

            $query = 'DELETE FROM banner WHERE id_banner ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                unlink($oldImg);
                header('location: index.php?i=logged_admin');
            }
            break;
    
        default:
            header('location: index.php?i=logged_admin');
            break;
    }


}