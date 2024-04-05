<!DOCTYPE html>
<html lang="en">
<?php
        define('SMARTY_DIR', 'libs\\');
        require_once(SMARTY_DIR . 'Smarty.class.php');

        $smarty_head = new Smarty();

        $smarty_head->assign('dashboard','no');
        $smarty_head->assign('titre', 'Mentions légales');
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


    <h1 class="text-center-accueil">Mentions légales</h1>

    <div class="space"></div>

    <article class="legal_mention">
        <div>
            <h2> Editeur du site :</h2>
            <p> Adresse : CESI Rouen, 80 avenue Edmund Halley Rouen Madrillet Innovation, 76800 Saint-Étienne-du-Rouvray, France </p>
            <p> Téléphone : +33 1 23 45 67 89</p>
            <p> Email : <a href=""> hugo.boudry@viacesi.fr </a></p>
        </div>
        <div>
            <h2> Directeur de la publication : </h2>
            <p> Hugo Boudry </p>
        </div>
        <div>
            <h2> Hébergement : </h2>
            <p> Le site est hébergé par <b>La compagnie des joyeuses grenouilles</b></p>
            <p> Adresse : 123 Rue des nénuphars, 76000 Rouen, France</p>
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

        <div>
            <h2> Cookies et autres données personnelles : </h2>
            <p>Lors de votre visite sur ce site, des cookies peuvent être déposés sur votre ordinateur, tablette ou smartphone. Ces cookies sont utilisés pour améliorer votre expérience utilisateur et analyser le trafic du site. </p>
            <p>Ces données sont utilisées uniquement dans le but pour lequel elles ont été collectées et ne sont pas partagées avec des tiers sans votre consentement préalable. </p>
            <p>Conformément à la réglementation en vigueur, vous disposez d'un droit d'accès, de rectification, de suppression et de portabilité de vos données personnelles. Pour exercer ces droits ou pour toute question concernant la gestion de vos données personnelles, veuillez contacter notre Délégué à la Protection des Données (DPO) à l'adresse email : samuel.courtin@viacesi.fr </p>
        </div>

    </article>


    <?php
    $smarty_footer = new Smarty();

    $smarty_footer->setTemplateDir('tpl/');
    $smarty_footer->display('footer.tpl');
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/JS/global.js" async></script>
</body>

</html>