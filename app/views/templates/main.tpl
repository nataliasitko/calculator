<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="{$page_description|default:'Opis domyślny'}">
    <title>{$page_title|default:'Tytuł domyślny'}</title>
    <link rel="stylesheet" href="{$conf->app_url}/styles/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="{$conf->app_url}/styles/assets/css/noscript.css" /></noscript>

</head>

<body class="is-preload">

    <div id="wrapper">

        <header id="header" class="alt">
            <span class="logo"><img src="{$conf->app_url}/styles/images/coin.svg" alt="" /></span>
            <h1>{$page_header|default:"Tytuł domyślny"}</h1>
        </header>
        <div id="main">
            <section id="first" class="main special">
                {block name="content"}
                    Zawartość domyślna...
                {/block}
            </section>
        </div>
        <footer id="footer">
            <p class="copyright">&copy; Untitled. Design based on: <a href="https://html5up.net">HTML5 UP</a>.<br>Natalia Sitko</p>
        </footer>
    </div>

<!-- Scripts -->
<script src="{$conf->app_url}/styles/assets/js/jquery.min.js"></script>
<script src="{$conf->app_url}/styles/assets/js/breakpoints.min.js"></script>
<script src="{$conf->app_url}/styles/assets/js/main.js"></script>

</body>

</html>