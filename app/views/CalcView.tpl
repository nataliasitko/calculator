{extends file="main.tpl"}
    {block name="content"}

                <header class="major">
                    <h2>{$page_description}</h2>
                </header>

                <form class="container" action="{$conf->action_root}calcCompute" method="post">

                    <label for="id_loan_amount">Kwota kredytu: </label>
                    <input id="id_loan_amount" type="text" name="loan_amount"
                           value={$form->loan_amount}>
                    <br>

                    <label for="id_interest_rate">Oprocentowanie: </label>
                    <input id="id_interest_rate" type="text" name="interest_rate"
                           value={$form->interest_rate}>
                    <br>

                    <label for="id_num_of_months">Okres spłaty: </label>
                    <input id="id_num_of_months" type="text" name="num_of_months"
                           value={$form->num_of_months}>
                    <br>

                    <input class="button" type="submit" value="Oblicz miesięczną ratę kredytu">

                </form>

            <div class="results">
                {if $res->result}
                    <h3>Rata miesięczna: {$res->result}</h3>
                {/if}
            </div>

    {/block}




