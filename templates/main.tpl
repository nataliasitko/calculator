<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{$page_description|default:'Opis domyślny'}">
    <title>{$page_title|default:'Tytuł domyślny'}</title>
    <link rel="stylesheet" href="{$app_url}/calc_view/assets/css/main.css" />

    <!-- Scripts -->
    <script src="{$app_url}/calc_view/assets/js/jquery.min.js"></script>
    <script src="{$app_url}/calc_view/assets/js/jquery.scrollex.min.js"></script>
    <script src="{$app_url}/calc_view/assets/js/jquery.scrolly.min.js"></script>
    <script src="{$app_url}/calc_view/assets/js/browser.min.js"></script>
    <script src="{$app_url}/calc_view/assets/js/breakpoints.min.js"></script>
    <script src="{$app_url}/calc_view/assets/js/util.js"></script>
    <script src="{$app_url}/calc_view/assets/js/main.js"></script>

</head>

<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <span class="logo"><img src="{$app_url}/calc_view/images/coin.svg" alt="" /></span>
        <h1>{$page_title}|default:"Tytuł domyślny}</h1>
    </header>

    <form class="container" action="{$app_url}/app/calc.php" method="post">

    {block name=form} Domyślna treść zawartości... {/block}

    </form>

    {block name=results}Odpowiedź domyślna...{/block}

    {block name=footer}Domyślna zawartość stopki ... {/block}

</div>

</body>
</html>