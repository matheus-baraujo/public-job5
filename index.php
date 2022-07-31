<?php

session_start();

$pagina = 'home';

if(isset($_GET['i'])) {
    $pagina = addslashes($_GET['i']);
}

include 'stringManipulation.php';

include './database/conexao.php';

include './components/directives.php';

?>

<body>

<?php

if ($pagina != 'admin' && $pagina != 'logged_admin' && $pagina != 'form_admin') {
    include './components/menu.php';
}

switch ($pagina) {
    case 'home':
        include './views/home.php';
        include './components/footer.php';
        break;
    case 'about':
        include './views/about.php';
        include './components/footer.php';
        break;
    case 'playlists':
        include './views/playlists.php';
        break;    
    case 'blog':
        include './views/blog.php';
        break;
    case 'blog-completo':
        include './views/blog-completo.php';
        break;
    case 'article':
        include './views/article.php';
        break;
    case 'contact':
        include './views/contact.php';
        break;    
    case 'admin':
        include './views/admin.php';
        break; 
    case 'logged_admin':
        if (isset($_SESSION['login'])) {
            include './views/logged_admin.php';    
        }
        break;
    case 'form_admin':
        if (isset($_SESSION['login'])) {
            include './views/form_admin.php';    
        }
        break;
    default:
        include './views/home.php';
        include './components/footer.php';
        break;
}


include './components/scripts.php';

?>

</body>