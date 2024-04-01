<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="preload" href="assets/fonts/GothamSSm-Medium_Web.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/GothamSSm-Book_Web.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/GothamSSm-Light_Web.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="images/logo-classic.webp" as="image">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="manifest" href="assets/manifest.json">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Internship Etendard">
    <meta name="description" content="Internship Etendard est une plateforme de recherche de stage pour les étudiants.">
    <title>Accueil</title>
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

    <h1 class="text-center-accueil">Votre stage n'est plus un mirage</h1>
    <div class="container">
        <div class="box1-accueil">
            <h2> La manière la plus simple de trouver un stage</h2>
            <div id="textcontainer_accueil">
                <div id="scrollingText"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card-carousel">
            <div class="card" id="1">
                <div class="image-container"></div>
                <p>Un site créé par les étudiants, pour les étudiants.</p>
            </div>
            <div class="card" id="2">
                <div class="image-container"></div>
                <p>À la recherche d'un stage ? Un domaine vous semble plus intéressant qu'un autre ? Internship Etendard est là pour vous orienter.</p>
            </div>
            <div class="card" id="3">
                <div class="image-container"></div>
                <p>3 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, explicabo!</p>
            </div>
            <div class="card" id="4">
                <div class="image-container"></div>
                <p>4 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, explicabo!</p>
            </div>
            <div class="card" id="5">
                <div class="image-container"></div>
                <p>5 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, explicabo!</p>
            </div>
        </div>
    </div>

    <?php
    $smarty_footer = new Smarty();

    $smarty_footer->setTemplateDir('tpl/');
    $smarty_footer->display('footer.tpl');
    ?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/JS/homepage.js" async></script>
    <script src="assets/JS/global.js" async></script>
    <script src="assets/JS/carousel.js" async></script>

</body>

</html>