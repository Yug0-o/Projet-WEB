<!doctype html>
<html lang="fr">
<?php
define('SMARTY_DIR', 'libs\\');
require_once(SMARTY_DIR . 'Smarty.class.php');

$smarty_head = new Smarty();

$smarty_head->assign('dashboard', 'no');
$smarty_head->assign('titre', 'Connexion - Internship Etendard');
$smarty_head->setTemplateDir('tpl/');
$smarty_head->display('head.tpl');
?>

<body>

    <?php

    $smarty_loading = new Smarty();

    $smarty_loading->setTemplateDir('tpl/');
    $smarty_loading->display('loading.tpl');

    $smarty_header = new Smarty();
    $smarty_header->assign('login', 'oui');

    $smarty_header->setTemplateDir('tpl/');
    $smarty_header->display('header.tpl');
    ?>

    <main>
        <section>
            <div>
                <h1 class="garde">Connexion</h1>
            </div>
            <article>
                <form action="check.php" method="post"> <!-- Modification 1 & 2 -->
                    <div class="login-form">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" size="30" value="" required autocomplete="email"> <!-- Modification 3 -->

                        <label for="password">Mot de passe</label>
                        <input id="password" name="password" type="password" size="30" value="" required autocomplete="current_password"> <!-- Modification 3 -->

                        <div class="forgot-password">
                            <a href="password-recovery.php">Mot de passe oublié ?</a>
                        </div>
                        <div class="button-container">
                            <button class="reset" type="reset">Reset</button> <!-- Modification 4 -->
                            <button class="submit" type="submit">Connexion</button> <!-- Modification 4 -->
                        </div>
                        <div class="wrong-credential" id="wrong-credential"></div>
                    </div>
                </form>
            </article>
        </section>
    </main>

    <?php
    $smarty_footer = new Smarty();

    $smarty_footer->setTemplateDir('tpl/');
    $smarty_footer->display('footer.tpl');
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets\JS\global.js" async></script>
    <script src="assets\JS\login.js" async></script>
</body>

</html>