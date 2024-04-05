<!doctype html>
<html lang="fr">

<?php
define('SMARTY_DIR', 'libs\\');
require_once(SMARTY_DIR . 'Smarty.class.php');

$smarty_head = new Smarty();

$smarty_head->assign('dashboard', 'no');
$smarty_head->assign('titre', 'Contact');
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
            <div class="space"></div>
            <div class="contact">
                <h2>
                    <span>Contactez-nous depuis ce formulaire</span>
                </h2>

                <div class="confirmation animate" id="confirmation">Merci pour votre demande, nous vous contacterons dans les plus bref délais.</div>
            </div>
            <article>
                <form method="post">
                    <div class="container_contact">
                        <div class="box1">
                            <div class="container_contact">
                                <div class="box1">
                                    <label>Nom *</label>
                                    <input name="lastname" id="lastname" type=" text" value="" size="100" required>
                                </div>
                                <div class="box1">
                                    <label>Prénom </label>
                                    <input name="firstname" id="firstname" type="text" value="" size="100">
                                </div>
                            </div>
                            <div class="container_contact">
                                <div class="box1">
                                    <label>Adresse mail *</label>
                                    <input id="email" name="email" type="text" value="" size="100" required>
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
                            <p> <a href="">hugo.boudry@viacesi.fr</a></p>

                            <div class="space"></div>

                            <img src="./images/logo.webp" class="img_legalmentions" alt="Logo">
                        </div>
                    </div>



                    <div id="error-tel" style="display: none; color: red;">Veuillez entrer un numéro de téléphone correct.</div>
                    <div id="error-email" style="display: none; color: red;">Veuillez entrer une adresse-mail valide.</div>

                    <div class="button-container">
                        <button type="reset" aria-label="Effacer">Effacer</button>
                        <button type="submit" onclick="return verifData()" aria-label="Envoyer">Envoyer</button>
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
    <script src="assets/JS/restriction.js" async></script>
</body>

</html>