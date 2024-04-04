<!doctype html>
<html lang="fr">

<head>
    <link rel="preload" href="images/logo-classic.webp" as="image">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .badapple {
            white-space: pre;
            font-family: monospace;
            text-align: center;
            font-size: min(1.5vw - 0.1vw, 1.5vh - 0.1vh);
        }

        button {
            border: 2px solid white;
            border-radius: 15px;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Internship Etendard">
    <meta name="description" content="Connectez-vous à votre espace.">
    <title>Connexion - Internship Etendard</title>
</head>

<body class="dark-mode">
    <?php
    define('SMARTY_DIR', 'libs\\');
    require_once(SMARTY_DIR . 'Smarty.class.php');

    $smarty_loading = new Smarty();

    $smarty_loading->setTemplateDir('tpl/');
    $smarty_loading->display('loading.tpl');

    ?>
    <div style="display:none;">
        <?php
        $smarty_header = new Smarty();
        $smarty_header->assign('login', 'oui');

        $smarty_header->setTemplateDir('tpl/');
        $smarty_header->display('header.tpl');
        ?>
    </div>
    <main style="display:flex;justify-content: center">
        <p class="badapple"></p>
        <audio id="audio" src="assets/BA/Bad apple.mp3" preload="auto"></audio>
        <button class="enabled" id="play-button" style="color:var(--text-color); background-color: var(--pagination-button-color);">Bad Apple</button>
    </main>

    <?php
    $smarty_footer = new Smarty();

    $smarty_footer->setTemplateDir('tpl/');
    $smarty_footer->display('footer.tpl');
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/JS/Bad_Apple.js" async></script>
    <script src="assets/JS/global.js" async></script>
</body>

</html>