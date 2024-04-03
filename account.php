<!DOCTYPE html>
<html lang="fr">

<?php
define('SMARTY_DIR', 'libs\\');
require_once(SMARTY_DIR . 'Smarty.class.php');

$smarty_head = new Smarty();

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

    $smarty_header->setTemplateDir('tpl/');
    $smarty_header->display('header.tpl');
    ?>

    <div class="account-container">
        <div class="account-info">

            <div class="profile-picture">
                <svg class="tds-icon-person" viewBox="0 0 24 26" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zM6.858 18.752c.605-1.868 2.722-3.24 5.142-3.24 2.42 0 4.537 1.372 5.142 3.24C15.712 19.844 13.933 20.5 12 20.5s-3.712-.656-5.142-1.748zm11.469-1.095c-1.02-2.165-3.483-3.645-6.327-3.645s-5.307 1.48-6.327 3.645A8.456 8.456 0 0 1 3.5 12c0-4.687 3.813-8.5 8.5-8.5 4.687 0 8.5 3.813 8.5 8.5a8.456 8.456 0 0 1-2.173 5.657zM12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7zm0 5.5c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z">
                    </path>
                </svg>
                <div class="profile-picture-text" id="name">Yousk2 BOZO</div>
                <button class="logout" type="logout" enabled>
                    <p><a href="homepage.php">Déconnexion</a></p>
                </button>
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
                    <div class="wishlistedjob">
                        <div class="job">test</div>
                        <div class="button-container">
                            <button class="applyjob enabled" enabled>Postuler
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m10 6h-4c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h10c1.1046 0 2-.8954 2-2v-4m-4-10h6m0 0v6m0-6-10 10" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </button>
                            <button class="removewish enabled" enabled>Retirer des favoris
                            </button>
                        </div>
                    </div>
                    <div class="wishlistedjob-divider"></div>
                    <div class="wishlistedjob">
                        <div class="job">test</div>
                        <div class="button-container">
                            <button class="applyjob enabled" enabled>Postuler
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m10 6h-4c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h10c1.1046 0 2-.8954 2-2v-4m-4-10h6m0 0v6m0-6-10 10" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </button>
                            <button class="removewish enabled" enabled>Retirer des favoris
                            </button>
                        </div>
                    </div>
                    <div class="wishlistedjob-divider"></div>
                    <div class="wishlistedjob">
                        <div class="job">test</div>
                        <div class="button-container">
                            <button class="applyjob enabled" enabled>Postuler
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m10 6h-4c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h10c1.1046 0 2-.8954 2-2v-4m-4-10h6m0 0v6m0-6-10 10" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </button>
                            <button class="removewish enabled" enabled>Retirer des favoris
                            </button>
                        </div>
                    </div>
                    <div class="wishlistedjob-divider"></div>
                    <div class="wishlistedjob">
                        <div class="job">test</div>
                        <div class="button-container">
                            <button class="applyjob enabled" enabled>Postuler
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m10 6h-4c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h10c1.1046 0 2-.8954 2-2v-4m-4-10h6m0 0v6m0-6-10 10" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </button>
                            <button class="removewish enabled" enabled>Retirer des favoris
                            </button>
                        </div>
                    </div>
                    <div class="wishlistedjob-divider"></div>
                    <div class="wishlistedjob">
                        <div class="job">test</div>
                        <div class="button-container">
                            <button class="applyjob enabled" enabled>Postuler
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m10 6h-4c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h10c1.1046 0 2-.8954 2-2v-4m-4-10h6m0 0v6m0-6-10 10" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </button>
                            <button class="removewish enabled" enabled>Retirer des favoris
                            </button>
                        </div>
                    </div>
                    <div class="wishlistedjob-divider"></div>
                    <div class="wishlistedjob">
                        <div class="job">test</div>
                        <div class="button-container">
                            <button class="applyjob enabled" enabled>Postuler
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m10 6h-4c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h10c1.1046 0 2-.8954 2-2v-4m-4-10h6m0 0v6m0-6-10 10" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </button>
                            <button class="removewish enabled" enabled>Retirer des favoris
                            </button>
                        </div>
                    </div>
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