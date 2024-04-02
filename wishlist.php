<!doctype html> 
<html lang="fr"> 

    <?php
        define('SMARTY_DIR', 'libs\\');
        require_once(SMARTY_DIR . 'Smarty.class.php');

        $smarty_head = new Smarty();

        $smarty_head->assign('titre', 'Favoris');
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

        $smarty_header->setTemplateDir('tpl/');
        $smarty_header->display('header.tpl');
    ?>

    <main>
        <p> Affichage de la BDD wishlist ici <p>
    </main> 

    <?php
        $smarty_footer = new Smarty();

        $smarty_footer->setTemplateDir('tpl/');
        $smarty_footer->display('footer.tpl');
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets\JS\global.js" async></script>

</body>
</html>