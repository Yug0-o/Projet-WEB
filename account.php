<!DOCTYPE html>
<html lang="fr">

<?php
define('SMARTY_DIR', 'libs\\');
require_once(SMARTY_DIR . 'Smarty.class.php');

$smarty_head = new Smarty();

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

    <div class="account-container">
        <div class="account-info">

            <div class="profile-picture" id="name">
                <img src="images/logo-classic.webp" alt="profile picture">
                <div class="profile-picture-text">Yousk2 BOZO</div>
            </div>
            <div class="profile-info">
                <div class="info-container" id="email">Adresse mail
                    <div class="info">Yousk2@bozo.com</div>
                </div>
                <div class="info-container" id="promotion">Promotion
                    <div class="info">Yousk2</div>
                </div>
                <div class="info-container" id="cv">CV
                    <a class="info" href="CV_Yousk2.pdf" target="_blank">CV_Yousk2.pdf</a>
                </div>
            </div>
            <button class="enabled modify" type="modify" enabled>Modifier vos informations</button>
        </div>
        <div class="wishlist"></div>
    </div>

    <?php
    $smarty_footer = new Smarty();

    $smarty_footer->setTemplateDir('tpl/');
    $smarty_footer->display('footer.tpl');
    ?>

    <script src="assets/JS/global.js" async></script>
    <script src="assets/JS/account.js" async></script>

</body>

</html>