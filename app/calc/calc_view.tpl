{extends file="../../templates/main.tpl"}

{block name=form}

    <form class="container" action="{$conf->action_root}calcCompute" method="post">

        <label for="id_loan_amount">Kwota kredytu: </label>
        <input id="id_loan_amount" type="text" name="loan_amount"
               value={$form['loan_amount']}>
        <br>

        <label for="id_interest_rate">Oprocentowanie: </label>
        <input id="id_interest_rate" type="text" name="interest_rate"
               value={$form['interest_rate']}>
        <br>

        <label for="id_num_of_months">Okres spłaty: </label>
        <input id="id_num_of_months" type="text" name="num_of_months"
               value={$form['num_of_months']}>
        <br>

        <input class="button" type="submit" value="Oblicz miesięczną ratę kredytu">

    </form>

{/block}

{block name=messages}

        {if isset($messages)}
            <ul>
            {foreach $messages as $msg}
                <li>{$msg}</li>
            {/foreach}
            </ul>
        {/if}
{/block}

{block name= results}

        {if isset($result)}
            <h2>Rata miesięczna: {$result} zł</h2>
        {/if}

{/block}

{block name="footer"}
    <footer id="footer">
        <p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
    </footer>
{/block}


