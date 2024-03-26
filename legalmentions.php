<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preload" href="assets/fonts/GothamSSm-Medium_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="assets/fonts/GothamSSm-Book_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="assets/fonts/GothamSSm-Light_Web.woff2" as="font" type="font/woff2" crossorigin>
        <!-- <link rel="preload" href="images/logo-classic.webp" as="image"> -->
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="assets/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Internship Etendard">
        <meta name="description" content="Internship Etendard est une plateforme de recherche de stage pour les étudiants.">
        <title>Mentions légales</title>
    </head>
    <body>

        <?php
        define('SMARTY_DIR', 'C:\Users\Coline\Desktop\myPortfolio\projet\Projet-WEB\libs\\');
        require_once(SMARTY_DIR . 'Smarty.class.php');

        $smarty_loading = new Smarty();

        $smarty_loading->setTemplateDir('tpl/');
        $smarty_loading->display('loading.tpl');



        $smarty_header = new Smarty();

        $smarty_header->setTemplateDir('tpl/');
        $smarty_header->display('header.tpl');
    ?>


        <h1 class="text-center-accueil">Mentions légales</h1>

        <div class="space"></div>

        <article class="legal_mention">
            <div>
                <h2> Editeur du site :</h2>
                <p> Adresse : CESI Rouen, 80 avenue Edmund Halley Rouen Madrillet Innovation, 76800 Saint-Étienne-du-Rouvray, France </p>
                <p> Téléphone : +33 1 23 45 67 89</p>
                <p> Email : <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0"> hugo.boudry@viacesi.fr </a></p>
            </div>
            <div>
                <h2> Directeur de la publication : </h2>
                <p> Hugo Boudry </p>
            </div>
            <div>
                <h2> Hébergement : </h2>
                <p> Le site est hébergé par <b>La compagnie des joyeuses grenouilles</b></p>
                <p> Adresse : 123 Placeholder de Folie, 12345 Frogcity, Frogland</p>
                <p> Téléphone : +33 9 87 65 43 21</p>
            </div>
            <div>
                <h2> Protection des données personnelles : </h2>
                <p> Conformémement à la loi française "Informatique et Libertés" du 6 janvier 1978, vous disposez d'un droit d'accès, de rectification et de suppression des données vous concernant. Pour exercer ce droit, veuillez contacter Internship Etendard à l'adresse email : <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0"> hugo.boudry@viacesi.fr </a></p>
            </div>
            <div>
                <h2> Propriété intellectuelle : </h2>
                <p> Le contenu de ce site est protégé par les lois françaises et internationales sur le droit d'auteur et la propriété intellectuelle. Toute reproduction ou distribution non autorisée du contenu est strictement interdite.</p>
            </div>
            <div>
                <h2> Responsabilité : </h2>
                <p>Internship Etendard s'efforce de fournir des informations précises et à jour sur ce site, mais ne peut garantir l'exactitude ou l'exhaustivité de ces informations. En conséquence, Internship Etendard décline toute responsabilité en cas d'erreur ou d'omission dans les informations fournies sur ce site.</p>
            </div>
            <div>
                <h2>Liens externes : </h2>
                <p> Ce site peut contenir des liens vers des sites externes sur lesquels Internship Etendard n'a aucun contrôle. Par conséquent, Internship Etendard décline toute responsabilité quant au contenu ou à l'exactitude des informations présentes sur ces sites externes.</p>
            </div>
            <div>
                <h2> Crédits : </h2>
                <p> Conception et développement du site : Internship Etendard</p>
            </div>
        </article>


        <?php
        $smarty_footer = new Smarty();

        $smarty_footer->setTemplateDir('tpl/');
        $smarty_footer->display('footer.tpl');
        ?>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="assets/JS/global.js"async></script>
    </body>
</html>