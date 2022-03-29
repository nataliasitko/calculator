<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="{$page_description|default:'Opis domyślny'}">
    <title>{$page_title|default:'Tytuł domyślny'}</title>
    <link rel="stylesheet" href="{$app_url}/styles/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="{$app_url}/styles/assets/css/noscript.css" /></noscript>

</head>

<body class="is-preload">

    <div id="wrapper">

        <header id="header" class="alt">
            <span class="logo"><img src="{$app_url}/styles/images/coin.svg" alt="" /></span>
            <h1>{$page_header|default:"Tytuł domyślny"}</h1>
        </header>

        <div id="main">

            <section id="first" class="main special">
                <header class="major">
                    <h2>{$page_description}</h2>
                </header>

            {block name=form} Domyślna treść zawartości... {/block}

            </section>

            <div class="messages">
                {block name=messages}Odpowiedź domyślna...{/block}
            </div>

            <div class="results">

                {block name=results}Odpowiedź domyślna...{/block}
            </div>

        </div>

        {block name=footer}Domyślna zawartość stopki ... {/block}

    </div>

<!-- Scripts -->
<script src="{$app_url}/styles/assets/js/jquery.min.js"></script>
<script src="{$app_url}/styles/assets/js/breakpoints.min.js"></script>
<script src="{$app_url}/styles/assets/js/main.js"></script>

</body>

</html>