<?php
/* Smarty version 3.1.48, created on 2024-04-03 11:05:18
  from 'D:\Programme\Travail\Cesi\Cesi\A2\Web\Projet\Projet-WEB\tpl\head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_660d1bce8fa546_89673876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '307777c794bd5ea6287823bdf5ef451f3414e747' => 
    array (
      0 => 'D:\\Programme\\Travail\\Cesi\\Cesi\\A2\\Web\\Projet\\Projet-WEB\\tpl\\head.tpl',
      1 => 1712133063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660d1bce8fa546_89673876 (Smarty_Internal_Template $_smarty_tpl) {
?><head>
        <link rel="preload" href="assets/fonts/GothamSSm-Medium_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="assets/fonts/GothamSSm-Book_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="assets/fonts/GothamSSm-Light_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="images/logo-classic.webp" as="image">
        <link rel="icon" href="images/favicon.png">

        <?php if ($_smarty_tpl->tpl_vars['dashboard']->value == 'yes') {?>
                <link rel="stylesheet" href="assets/dashboard.css">
        <?php } else { ?>
                <link rel="stylesheet" href="assets/style.css">
        <?php }?>

        <link rel="manifest" href="assets/manifest.json">
        <meta charset="utf-8">
        <meta name="theme-color" content="#F85F6A">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Internship Etendard">
        <meta name="description" content="Internship Etendard est une plateforme de recherche de stage pour les étudiants.">
        <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
</head><?php }
}
