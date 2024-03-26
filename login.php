<!doctype html> 
<html lang="fr"> 
<head> 
    <link rel="preload" href="assets/fonts/GothamSSm-Medium_Web.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/GothamSSm-Book_Web.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/GothamSSm-Light_Web.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="images/logo-classic.webp" as="image">
    <link rel="preload" href="images/favicon.png" as="image">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="assets/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Internship Etendard">
    <meta name="description" content="Connectez-vous à votre espace.">
    <title>Connexion - Internship Etendard</title> 
</head>
<body>
    
<?php
        define('SMARTY_DIR', 'libs\\');
        require_once(SMARTY_DIR . 'Smarty.class.php');

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
                <form>
                    <div class="login-form">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" size="30" value="" required autocomplete="email">

                        <label for="password">Mot de passe</label>
                        <input id="password" name="password" type="password" size="30" value="" required autocomplete="current-password">
                        
                        <div class="forgot-password">
                            <a href="password-recovery.php">Mot de passe oublié ?</a>
                        </div>
                        <div class="button-container">
                            <button class="disabled" type="reset" disabled>Reset</button>
                            <button class="disabled" type="submit" disabled>Connexion</button>
                        </div>
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
    <script src="assets\JS\global.js"async></script>
    <script src="assets\JS\login.js"async></script>
</body> 
</html>
