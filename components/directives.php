<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="google-site-verification" content="yFk_o0rwT6pTTvcgEfI_Ot93fKjOrvYPZHXk7Y-z44A" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D0F2B3XBKX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-D0F2B3XBKX');
    </script>

    <link rel="stylesheet" href="./owl-caroulsel/owl.carousel.min.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <!-- Owlcaroulsel -->
    <link rel="stylesheet" href="./owl-caroulsel/style.css">

    <!-- Personal modifications -->
    <link rel="stylesheet" href="./css/general-menu.css">

    <?php 

        $pageTitle = '';
        $pageDesc = '';
        $pageCss = '';
        $pageKeywords = '';

        switch ($pagina) {
            case 'home':
                $pageTitle = 'Cala Hits - Home';
                $pageCss = './css/home.css';

                $PD = "SELECT * FROM seo_descryption WHERE id_seo=1";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                $pageKeywords = $result['keywords'];
                
                break;
            case 'playlists':
                $pageTitle = 'Cala Hits - Playlists';
                $pageCss = './css/playlists.css';

                $PD = "SELECT * FROM seo_descryption WHERE id_seo=2";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                $pageKeywords = $result['keywords'];
                
                break;
            case 'blog':
                $pageTitle = 'Cala Hits - Blog';
                $pageCss = './css/blog.css';

                $PD = "SELECT * FROM seo_descryption WHERE id_seo=3";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                $pageKeywords = $result['keywords'];
                
                break;
            case 'blog-completo':
                $pageTitle = 'Cala Hits - Blog';
                $pageCss = './css/blog-completo.css';
                
                $PD = "SELECT * FROM seo_descryption WHERE id_seo=3";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                $pageKeywords = $result['keywords'];
                
                break;
            case 'article':

                if(isset($_GET['id'])){
                    $auxQuery = 'SELECT * FROM posts WHERE id_post = '.$_GET['id'].'';
                    if($auxResult = mysqli_fetch_array(mysqli_query($conn, $auxQuery))){
                        $pageTitle = $auxResult['title'].' - Cala Hits';
                        $pageDesc = $auxResult['subtitle'];
                        $pageKeywords = "Hits, Cala Hits, Cala, CalaHits, Spotify, Resso, Tiktok".", ".$auxResult['keywords'];
                    }

                }else{
                    $pageTitle = 'Cala Hits -  Artigo não encontrado';
                }

                $pageCss = './css/article.css';
                break;     
            case 'about':
                $pageTitle = 'Cala Hits - Sobre';
                $pageCss = './css/about.css';

                $PD = "SELECT * FROM seo_descryption WHERE id_seo=4";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                $pageKeywords = $result['keywords'];
                
                break;    
            case 'contact':
                $pageTitle = 'Cala Hits - Contato';
                $pageCss = './css/contact.css';

                $PD = "SELECT * FROM seo_descryption WHERE id_seo=5";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                $pageKeywords = $result['keywords'];
                
                break;    
            case 'admin':
                $pageTitle = 'Cala Hits - Admin';
                $pageCss = './css/contact.css';

                $PD = "SELECT * FROM seo_descryption WHERE id_seo=1";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                
                break;
            case 'logged_admin':
                $pageTitle = 'Cala Hits - Admin';
                $pageCss = './css/contact.css';

                $PD = "SELECT * FROM seo_descryption WHERE id_seo=1";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                
                break;
            case 'form_admin':
                $pageTitle = 'Cala Hits - Admin';
                $pageCss = './css/contact.css';

                $PD = "SELECT * FROM seo_descryption WHERE id_seo=1";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                
                break;
            default:
                $pageTitle = 'Cala Hits - Home';
                $pageCss = './css/home.css';

                $PD = "SELECT * FROM seo_descryption WHERE id_seo=1";
                $result = mysqli_fetch_array(mysqli_query($conn, $PD));
                $pageDesc = $result['descryption'];
                $pageKeywords = $result['keywords'];
                
                break;
        }

        echo '<title>'.$pageTitle.'</title>';
        echo '<meta name="description" content="'.$pageDesc.'">';
        echo '<meta name="keywords" content="'.$pageKeywords.'">';
        echo '<link rel="stylesheet" href="'.$pageCss.'">';
    ?>

    <meta name="robots" content="index, follow">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/71ab88a830.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

</head>