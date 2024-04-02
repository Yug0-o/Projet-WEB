<!doctype html>
<html lang="fr">
<head>
<?php
        define('SMARTY_DIR', 'libs\\');
        require_once(SMARTY_DIR . 'Smarty.class.php');

        $smarty_head = new Smarty();

        $smarty_head->assign('titre', 'Mot de passe oublié ? - Internship Etendard');
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
        $smarty_header->assign('login', 'non');

        $smarty_header->setTemplateDir('tpl/');
        $smarty_header->display('header.tpl');
    ?>

    <main>
        <section class="email-entry">
            <div>
                <h1 class="garde">MOT DE PASSE OUBLIÉ ?</h1>
            </div>
            <article>
                <form>
                    <div class="password-recovery-form">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" size="30" value="" required>
                        <div class="button-container">
                            <button class="disabled" type="submit" disabled>Récupérer mon Mot De Passe</button>
                        </div>
                    </div>
                </form>
            </article>
        </section>
        <section class="email-sent">
            <div>
                <h4 class="garde">Un courriel de confirmation a été envoyé à votre adresse:</h4>
                <h4 class="garde email"></h4>
            </div>
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
    <script src="assets\JS\password-recovery.js" async></script>
</body>

</html>