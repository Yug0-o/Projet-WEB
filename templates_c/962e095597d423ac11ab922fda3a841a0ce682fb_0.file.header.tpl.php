<?php
/* Smarty version 3.1.48, created on 2024-03-27 11:51:05
  from 'D:\Cesi\CPIA2\4 Dev Web\Projet\GitHub\Projet-WEB\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6603fa192bb569_29695448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '962e095597d423ac11ab922fda3a841a0ce682fb' => 
    array (
      0 => 'D:\\Cesi\\CPIA2\\4 Dev Web\\Projet\\GitHub\\Projet-WEB\\tpl\\header.tpl',
      1 => 1711536652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6603fa192bb569_29695448 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <div class="searchbar">
        <a href="homepage.php">
            <div class="logo-container">
                <img class="logo animate" id="logo-classic" src="images/logo-classic.webp" alt="logo-classic" min-width="20px">
                <h1 class="logo animate" id="Name-logo" alt="Name-logo" min-width="20px">INTERNSHIP ETENDARD</h1>
            </div>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['login']->value == 'non') {?>
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
        <?php }?>
        <div class="theme-login">
            <div class="switch">
                <div class="slider"></div>
                <div class="handle ui-widget-content">
                    <div class="handle ui-widget-content">
                        <svg class="theme-icon light-icon handle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path d="M 87.823 60.7 c -0.463 -0.423 -1.142 -0.506 -1.695 -0.214 c -15.834 8.398 -35.266 2.812 -44.232 -12.718 c -8.966 -15.53 -4.09 -35.149 11.101 -44.665 c 0.531 -0.332 0.796 -0.963 0.661 -1.574 c -0.134 -0.612 -0.638 -1.074 -1.259 -1.153 c -9.843 -1.265 -19.59 0.692 -28.193 5.66 C 13.8 12.041 6.356 21.743 3.246 33.35 S 1.732 57.08 7.741 67.487 c 6.008 10.407 15.709 17.851 27.316 20.961 C 38.933 89.486 42.866 90 46.774 90 c 7.795 0 15.489 -2.044 22.42 -6.046 c 8.601 -4.966 15.171 -12.43 18.997 -21.586 C 88.433 61.79 88.285 61.123 87.823 60.7 z"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: white; fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                        <svg class="theme-icon dark-icon handle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="26" height="26" viewBox="0 0 256 256" xml:space="preserve">
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                               transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                               <path
                                   d="M 88 47 H 77.866 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 H 88 c 1.104 0 2 0.896 2 2 S 89.104 47 88 47 z"
                                   style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #161616; fill-rule: nonzero; opacity: 1;"
                                   transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                               <path
                                   d="M 12.134 47 H 2 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 10.134 c 1.104 0 2 0.896 2 2 S 13.239 47 12.134 47 z"
                                   style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #161616; fill-rule: nonzero; opacity: 1;"
                                   transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                               <path
                                   d="M 45 14.134 c -1.104 0 -2 -0.896 -2 -2 V 2 c 0 -1.104 0.896 -2 2 -2 s 2 0.896 2 2 v 10.134 C 47 13.239 46.104 14.134 45 14.134 z"
                                   style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #161616; fill-rule: nonzero; opacity: 1;"
                                   transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                               <path
                                   d="M 45 90 c -1.104 0 -2 -0.896 -2 -2 V 77.866 c 0 -1.104 0.896 -2 2 -2 s 2 0.896 2 2 V 88 C 47 89.104 46.104 90 45 90 z"
                                   style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #161616; fill-rule: nonzero; opacity: 1;"
                                   transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                               <path
                                   d="M 75.405 77.405 c -0.512 0 -1.023 -0.195 -1.414 -0.586 l -7.166 -7.166 c -0.781 -0.781 -0.781 -2.047 0 -2.828 s 2.047 -0.781 2.828 0 l 7.166 7.166 c 0.781 0.781 0.781 2.047 0 2.828 C 76.429 77.21 75.917 77.405 75.405 77.405 z"
                                   style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #161616; fill-rule: nonzero; opacity: 1;"
                                   transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                               <path
                                   d="M 21.76 23.76 c -0.512 0 -1.024 -0.195 -1.414 -0.586 l -7.166 -7.166 c -0.781 -0.781 -0.781 -2.047 0 -2.828 c 0.78 -0.781 2.048 -0.781 2.828 0 l 7.166 7.166 c 0.781 0.781 0.781 2.047 0 2.828 C 22.784 23.565 22.272 23.76 21.76 23.76 z"
                                   style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #161616; fill-rule: nonzero; opacity: 1;"
                                   transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                               <path
                                   d="M 68.239 23.76 c -0.512 0 -1.023 -0.195 -1.414 -0.586 c -0.781 -0.781 -0.781 -2.047 0 -2.828 l 7.166 -7.166 c 0.781 -0.781 2.047 -0.781 2.828 0 c 0.781 0.781 0.781 2.047 0 2.828 l -7.166 7.166 C 69.263 23.565 68.751 23.76 68.239 23.76 z"
                                   style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #161616; fill-rule: nonzero; opacity: 1;"
                                   transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                               <path
                                   d="M 14.594 77.405 c -0.512 0 -1.024 -0.195 -1.414 -0.586 c -0.781 -0.781 -0.781 -2.047 0 -2.828 l 7.166 -7.166 c 0.78 -0.781 2.048 -0.781 2.828 0 c 0.781 0.781 0.781 2.047 0 2.828 l -7.166 7.166 C 15.618 77.21 15.106 77.405 14.594 77.405 z"
                                   style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #161616; fill-rule: nonzero; opacity: 1;"
                                   transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                               <path
                                   d="M 45 66.035 c -11.599 0 -21.035 -9.437 -21.035 -21.035 S 33.401 23.965 45 23.965 S 66.035 33.401 66.035 45 S 56.599 66.035 45 66.035 z M 45 27.965 c -9.393 0 -17.035 7.642 -17.035 17.035 c 0 9.394 7.642 17.035 17.035 17.035 c 9.394 0 17.035 -7.642 17.035 -17.035 C 62.035 35.607 54.394 27.965 45 27.965 z"
                                   style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #161616; fill-rule: nonzero; opacity: 1;"
                                   transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                    </div>
                </div>
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
