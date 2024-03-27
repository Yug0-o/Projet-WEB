<?php
/* Smarty version 3.1.48, created on 2024-03-27 10:38:23
  from 'D:\Programme\Travail\Cesi\Cesi\A2\Web\Projet\Projet-WEB\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6603e90fef6107_89334295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a92d9b57dec74db50ff447adf481fc44b945748e' => 
    array (
      0 => 'D:\\Programme\\Travail\\Cesi\\Cesi\\A2\\Web\\Projet\\Projet-WEB\\tpl\\header.tpl',
      1 => 1711532273,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6603e90fef6107_89334295 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
            <div class="searchbar">
                <a href="homepage.php">
                    <div class="logo-container">
                        <img class="logo animate" id="logo-classic" src="images/logo-classic.webp" alt="logo-classic" min-width="20px">
                        <h1 class="logo animate" id="Name-logo" alt="Name-logo" min-width="20px">INTERNSHIP ETENDARD</h1>
                    </div>
                </a>
                <form class="search searchbar" action="research.php">
                    <input type="text" id="keyword" placeholder="Rechercher un stage" name="search_query">
                    <?php if ($_smarty_tpl->tpl_vars['login']->value == 'recherche') {?>
                    <button class="searchbutton" onclick="searchJobs()" aria-label="Rechercher">
                    <?php } else { ?>
                        <button class="searchbutton" aria-label="Rechercher">
                    <?php }?>
                        <svg class="tds-icon-search animate" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m20.267 19.207-4.818-4.818A6.967 6.967 0 0 0 17 10a7 7 0 1 0-7 7 6.967 6.967 0 0 0 4.389-1.55l4.818 4.817a.748.748 0 0 0 1.06 0 .75.75 0 0 0 0-1.06zM4.5 10c0-3.033 2.467-5.5 5.5-5.5s5.5 2.467 5.5 5.5-2.467 5.5-5.5 5.5-5.5-2.467-5.5-5.5z">
                            </path>
                        </svg>
                    </button>
                </form>
                
                <div class="theme-login">
                    <div class="switch">
                        <div class="slider"></div>
                        <div class="handle ui-widget-content"></div>
                    </div>

                        <?php if ($_smarty_tpl->tpl_vars['login']->value == 'non') {?>
                        <a href="login.php">
                        <button class="enabled animate" type="login" aria-label="Login">
                            <svg class="tds-icon-person" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zM6.858 18.752c.605-1.868 2.722-3.24 5.142-3.24 2.42 0 4.537 1.372 5.142 3.24C15.712 19.844 13.933 20.5 12 20.5s-3.712-.656-5.142-1.748zm11.469-1.095c-1.02-2.165-3.483-3.645-6.327-3.645s-5.307 1.48-6.327 3.645A8.456 8.456 0 0 1 3.5 12c0-4.687 3.813-8.5 8.5-8.5 4.687 0 8.5 3.813 8.5 8.5a8.456 8.456 0 0 1-2.173 5.657zM12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7zm0 5.5c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z">
                                </path>
                            </svg>
                            <span class="connexion-text">Connexion</span>
                        </button>
                        </a>
                        <?php }?>
                </div>
            </div>
        </header><?php }
}
