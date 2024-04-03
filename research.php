<!doctype html>
<html lang="fr">

<head>
    <?php
    define('SMARTY_DIR', 'libs\\');
    require_once(SMARTY_DIR . 'Smarty.class.php');

    $smarty_head = new Smarty();

    $smarty_head->assign('dashboard', 'no');
    $smarty_head->assign('titre', 'Recherche');
    $smarty_head->setTemplateDir('tpl/');
    $smarty_head->display('head.tpl');
    ?>
</head>

<body>

    <?php

    $smarty_loading = new Smarty();

    $smarty_loading->setTemplateDir('tpl/');
    $smarty_loading->display('loading.tpl');



    $smarty_header = new Smarty();

    $smarty_header->assign('login', 'recherche');

    $smarty_header->setTemplateDir('tpl/');
    $smarty_header->display('header.tpl');
    ?>

    <div class="container" style="flex-direction:row;">
        <h1>Offres d'emploi</h1>
    </div>

    <div class="container internship-container">
        <!-- <div class="filters">
            <h2 for="location">Lieu:</h2>
            <input type="text" id="location" name="location" placeholder="Recherche par lieu" required>
        </div> -->
        <div class="job-list" id="jobList"></div>
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