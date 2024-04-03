<!doctype html> 
<html lang="fr"> 
    <?php
        define('SMARTY_DIR', 'libs\\');
        require_once(SMARTY_DIR . 'Smarty.class.php');

        $smarty_head = new Smarty();

        $smarty_head->assign('dashboard','no');
        $smarty_head->assign('titre', 'A propos');
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
                            <p>Internship Etendard s'engage à soutenir et à guider les étudiants dans leur recherche du stage parfait pour leur parcours académique et professionnel. Nous nous engageons à ne présenter que des offres de stage de qualité vérifiées et approuvées, provenant d'entreprises reconnues et sérieuses. Nous visons à garantir que chaque étudiant trouve une opportunité correspondant à son domaine d'étude et à ses aspirations. En choisissant Internship Etendard, vous pouvez être assuré que vous bénéficiez d'un réseau de partenaires de qualité pour vous aider à réussir dans votre parcours professionnel.</p>
                        </div>
                    </div>
                    <div class="container_contact">
                        <div class="boxlegalmention">
                            <h2>Une satisfaction client reconnue</h2>
                            <p>Grâce à notre passerelle, la communication entre étudiants et entreprises n'a jamais été aussi facile. Plusieurs centaines d'étudiants dans tous les domaines ont obtenus un stage grâce à notre plateforme. En partenariat avec une centaine d'entreprises, Internship Etendard regroupe toutes les offres du marché auxquelles vous pouvez postuler en un clic. Inscrivez-vous dès maintenant pour ne plus passer des heures à éplucher les sites d'annonces en tout genre à la recherche de la perle rare.</p>
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