<head>
        <link rel="preload" href="assets/fonts/GothamSSm-Medium_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="assets/fonts/GothamSSm-Book_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="assets/fonts/GothamSSm-Light_Web.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="images/logo-classic.webp" as="image">
        <link rel="icon" href="images/favicon.png">

        {if $dashboard == 'yes'}
                <link rel="stylesheet" href="assets/dashboard.css">
        {else}
                <link rel="stylesheet" href="assets/style.css">
        {/if}

        <link rel="manifest" href="assets/manifest.json">
        <meta charset="utf-8">
        <meta name="theme-color" content="#F85F6A">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Internship Etendard">
        <meta name="description" content="Internship Etendard est une plateforme de recherche de stage pour les étudiants.">
        <title>{$titre}</title>
</head>