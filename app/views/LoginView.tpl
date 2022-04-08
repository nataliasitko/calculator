{extends file="main.tpl"}

{block name=content}
    <div class="main">
        <h2>Logowanie do systemu</h2>
        <form action="{$conf->action_url}login" method="post"  class="pure-form pure-form-aligned bottom-margin">

            <fieldset class="container">
                <label for="id_login">Login: </label>
                <input id="id_login" type="text" name="login"/>

                <label for="id_pass">Hasło: </label>
                <input id="id_pass" type="password" name="pass" /><br/>

                <input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
            </fieldset>

        </form>
    </div>

    {include file='messages.tpl'}

{/block}