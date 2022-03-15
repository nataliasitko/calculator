<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Logowanie</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
    integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/app/styles.css">
</head>

<body>

    <div>

        <form calass="grid-g" action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">
            <h2>Logowanie</h2>
            <fieldset>
                <div class="pure-u-2 pure-u-md-1-3">
                    <label for="id_login">login: </label>
                    <input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" />
                </div>
                <div class="pure-u- pure-u-md-1-3">
                    <label for="id_pass">hasło: </label>
                    <input id="id_pass" type="password" name="pass" />
                </div>
            </fieldset>
            <div class="buttonHolder">
                <input type="submit" value="zaloguj" class="button" />
            </div>
        </form>

        <div class='messages'>
            <?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ul>';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ul>';
	}
}
?>
        </div>
    </div>

</body>

</html>