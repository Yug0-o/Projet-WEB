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

    <div class="account-container">
        <div class="account-info">

            <div class="profile-picture">
                <img src="images/person-icon.webp" alt="profile picture">
                <div class="profile-picture-text" id="name">Yousk2 BOZO</div>
                <button class="logout" type="logout" enabled>Déconnexion</button>
            </div>
            <div class="scroll-container">
                <div class="profile-info">
                    <div class="info-container">Adresse mail
                        <div class="info" id="email"></div>
                    </div>
                    <div class="info-container">Promotion
                        <div class="info" id="promotion">Yousk2</div>
                    </div>
                    <div class="info-container">CV
                        <a class="info" href="CV_Yousk2.pdf" target="_blank" id="cv">CV_Yousk2.pdf</a>
                    </div>
                </div>
            </div>
            <button class="enabled modify" type="modify" enabled>Modifier</button>
        </div>
        <div class="wishlist">
            <div class="wishlist-title">Favoris</div>
            <div class="scroll-container">
                <div class="job-list" id="jobList">
                    <!-- TEST DATA -->
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <div class="job">test</div>
                    <!-- TEST DATA -->
                </div>
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
    <script src="assets/JS/global.js" async></script>
    <script src="assets/JS/account.js" async></script>

</body>

</html>