<!doctype html>
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
    <meta name="description" content="Contactez-nous en utilisant notre formulaire.">
    <title>Contact - Internship Etendard</title>
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

    <main>
        <section>
            <div class="space"></div>
            <div class="contact">
                <h2>
                    <span>Contactez-nous depuis ce formulaire</span>
                </h2>
            </div>
            <article>
                <form method="post">
                    <div class="container_contact">
                        <div class="box1">
                            <div class="container_contact">
                                <div class="box1">
                                    <label>Nom *</label>
                                    <input name="lastname" type="text" value="" size="100" required>
                                </div>
                                <div class="box1">
                                    <label>Prénom </label>
                                    <input name="firstname" type="text" value="" size="100" required>
                                </div>
                            </div>
                            <div class="container_contact">
                                <div class="box1">
                                    <label>Adresse mail *</label>
                                    <input name="email" type="text" value="" size="100" required>
                                </div>
                                <div class="box1">
                                    <label>Téléphone *</label>
                                    <input id='tel' name="tel" type="text" value="" size="100" required maxlength="10">
                                </div>
                            </div>
                            <div class="container_contact">
                                <div class="box1">
                                    <label>Votre message</label>
                                    <textarea name="feedbacks" rows="5" cols="100"></textarea>
                                </div>
                            </div>
                            <p><i style="color: #f83643;">* : obligatoires</i></p>
                        </div>

                        <div class="vertical-line"></div>

                        <div class="box1">
                            <h3> Ou venez nous rencontrer pour prendre un café !</h3>

                            <div class="space"></div>

                            <p><b> Internship Etendard </b></p>
                            <p> 80 avenue Edmund Halley Rouen Madrillet Innovation</p>
                            <p> Saint-Etienne du Rouvray</p>
                            <p> 76800 </p>
                            <p> <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0">hugo.boudry@viacesi.fr</a></p>

                            <div class="space"></div>

                            <img src="./images/logo.webp" class="img_legalmentions" alt="Logo">
                        </div>
                    </div>

                    <div id="error-tel" style="display: none; color: red;">Veuillez entrer un numéro de téléphone correct.</div>

                    <div class="button-container">
                        <button class="disabled" type="reset" aria-label="Effacer" disabled>Effacer</button>
                        <button class="disabled" type="submit" onclick="return verifData()" aria-label="Envoyer" disabled>Envoyer</button>
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
    <script src="assets/JS/global.js" async></script>
    <script src="assets/JS/resriction.js" async></script>
</body>

</html>