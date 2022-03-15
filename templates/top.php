<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang "pl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php out($page_title); if (empty($page_title)) {  ?> Tytuł domyślny <?php } ?></title>
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/app/styles.css">	
</head>

<body>
    
<div class="header">
    <h2><?php out($page_header); if (!isset($page_header)) {  ?> Tytuł domyślny ... <?php } ?></h1>
    <h1>
    	<?php out($page_description); if (!isset($page_description)) {  ?> Opis domyślny ... <?php } ?>
    </1>
</div>