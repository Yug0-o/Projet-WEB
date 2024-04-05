<!DOCTYPE html>
<html lang="fr">
  
    <?php
        define('SMARTY_DIR', 'libs\\');
        require_once(SMARTY_DIR . 'Smarty.class.php');

        $smarty_head = new Smarty();

        $smarty_head->assign('dashboard','no');
        $smarty_head->assign('titre', 'Accueil');
        $smarty_head->setTemplateDir('tpl/');
        $smarty_head->display('head.tpl');
    ?>



    <body>
        
        <?php

    $smarty_loading = new Smarty();

    $smarty_loading->setTemplateDir('tpl/');
    $smarty_loading->display('loading.tpl');



    $smarty_header = new Smarty();

    $smarty_header->assign('login', 'non');
    $smarty_header->assign('logedin', 'oui');

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
                <p>Un site créé par des étudiants, pour les étudiants.</p>
            </div>
            <div class="card" id="2">
                <div class="image-container"></div>
                <p>À la recherche d'un stage ? Un domaine vous semble plus intéressant qu'un autre ? Internship Etendard est là pour vous orienter.</p>
            </div>
            <div class="card" id="3">
                <div class="image-container"></div>
                <p>Un partenariat avec plus d'une centaine d'entreprises</p>
            </div>
            <div class="card" id="4">
                <div class="image-container"></div>
                <p>Postuler directement depuis notre site pour vous simplifier la tâche</p>
            </div>
            <div class="card" id="5">
                <div class="image-container"></div>
                <p>Une liste de souhaits vous permet de suivre comment évolue chaque offre que vous désirez</p>
            </div>
        </div>
    </div>

    <?php
    $smarty_footer = new Smarty();

    $smarty_footer->setTemplateDir('tpl/');
    $smarty_footer->display('footer.tpl');
    ?>
    <script src="assets/JS/homepage.js" async></script>
    <script src="assets/JS/global.js" async></script>
    <script src="assets/JS/carousel.js" async></script>

</body>

</html>