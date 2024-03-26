<!doctype html> 
<html lang="fr"> 
    <head>
        <link rel="preload" href="assets/fonts/GothamSSm-Medium_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="assets/fonts/GothamSSm-Book_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="assets/fonts/GothamSSm-Light_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="images/logo-classic.webp" as="image">
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="assets/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Internship Etendard">
        <meta name="description" content="Recherche">
        <title>Recherche - Internship Etendard</title>
    </head> 
    <body>

    <?php
        define('SMARTY_DIR', 'libs\\');
        require_once(SMARTY_DIR . 'Smarty.class.php');

        $smarty_loading = new Smarty();

        $smarty_loading->setTemplateDir('tpl/');
        $smarty_loading->display('loading.tpl');



        $smarty_header = new Smarty();

        $smarty_header->assign('login', 'non');

        $smarty_header->setTemplateDir('tpl/');
        $smarty_header->display('header.tpl');
    ?>

        <div class="container" style="flex-direction:row;">
            <h1>Offres d'emploi</h1>
        </div>
        
        <div class="container">
            <div class="filters">
                <h2 for="keyword">Mot-clé:</h2>
            </div>
            <div class="job-list" id="jobList"></div>
        </div>

        <div class="center-container">
            <div class="pagination" id="pagination"></div>
        </div>

        <?php
        $smarty_footer = new Smarty();

        $smarty_footer->setTemplateDir('tpl/');
        $smarty_footer->display('footer.tpl');
        ?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="assets/JS/global.js" async></script>
        <script src="assets/JS/research.js" async></script>
    </body>
</html>