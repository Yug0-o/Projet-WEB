<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
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
    <title>A propos - Internship Etendard</title>
    <link rel="stylesheet" href="assets/style.css">
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
            <div class="container_contact">
                <div class="boxlegalmention">
                    <div>
                        <h1 class="text-center-accueil">Qui sommes-nous ?</h1>
                    </div>
                </div>
                <div class="boxlegalmention">
                    <img src="./images/logo.webp" class="img_legalmentions" alt="logo">
                </div>
                <article class="align">
                    <div class="container_contact">
                        <div class="boxlegalmention">
                            <h2>Histoire</h2>
                            <p>Codé par des étudiants pour des étudiants, <b>Internship Etendard</b> a été fondé en 2024 pour aider les étudiants en recherche de stage pour valider leur cursus. Facile d'utilisation, cette interface permet aux étudiants de pouvoir enregistrer les offres de stage qu'ils trouvent intéressant et de pouvoir y postuler rapidement ! Notre site permet également de consulter le profil des différentes entreprises enregistrées pour pouvoir choisir avec précision votre stage idéal.</p>
                        </div>
                        <span class="vertical-line"></span>
                        <div class="boxlegalmention">
                            <h2>Nos engagements</h2>
                            <p>Quisque quis malesuada augue. Nulla venenatis tellus sed felis accumsan maximus. Nunc sollicitudin risus molestie, tempus nibh eget, interdum justo. Curabitur non mauris eget nulla scelerisque malesuada. Aliquam iaculis, est id dignissim fermentum, enim tellus varius ex, sit amet gravida odio quam tempus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras semper scelerisque turpis nec euismod. Proin arcu urna, vestibulum vitae sem ut, tristique varius ligula. Proin egestas lacinia sapien a dictum. Etiam laoreet tristique velit ut ultrices.</p>
                        </div>
                    </div>
                    <div class="container_contact">
                        <div class="boxlegalmention">
                            <h2>Une satisfaction client reconnue</h2>
                            <p>Duis lacinia est at libero auctor, eget commodo enim vehicula. Proin rhoncus, turpis quis scelerisque commodo, arcu nibh sagittis urna, vitae placerat eros massa id arcu. Praesent ultricies at eros quis bibendum. Vivamus eu nunc risus. Cras convallis, ligula lobortis bibendum pharetra, dolor augue vestibulum dui, sit amet sodales eros leo vulputate augue. Donec rhoncus hendrerit lobortis. In vehicula ullamcorper odio ut facilisis. Aliquam tincidunt tortor a blandit elementum. Etiam sodales facilisis ipsum ac semper. Sed volutpat luctus nulla non pellentesque. Pellentesque eget nisl quis sem dictum congue. Ut pharetra vehicula aliquam. Curabitur venenatis dictum augue, in molestie enim feugiat ut. Curabitur egestas, purus eu hendrerit consectetur, neque libero imperdiet ante, et suscipit libero leo non nisi.</p>
                        </div>
                    </div>
                </article>
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
</body>

</html>