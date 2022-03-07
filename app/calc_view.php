<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang "pl">

<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <style>
    <?php include 'styles.css'; ?>
    </style>
</head>

<body>

    <h2>Kalkulator kredytowy</h2>
    <h5>Podaj kwotę kredytu, oprocentowanie w skali roku oraz okres spłaty w miesiącach.</h5>

    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">

        <label for="id_loan_amount">Kwota kredytu: </label>
        <input id="id_loan_amount" type="text" name="loan_amount"
            value=<?php if (isset($loan_amount)) {print($loan_amount);}?>>
        <br>

        <label for="id_intrest_rate">Oprocentowanie: </label>
        <input id="id_intrest_rate" type="text" name="intrest_rate"
            value=<?php if (isset($intrest_rate)) {print($intrest_rate);}?>>
        <br>

        <label for="id_num_of_months">Okres spłaty: </label>
        <input id="id_num_of_months" type="text" name="num_of_months"
                value=<?php if (isset($num_of_months)) {print($num_of_months);}?>>
        <br>
        <div class="buttonHolder">
            <input class="button" type="submit" value="Oblicz miesięczną ratę kredytu">
        </div>

    </form>

    <?php
        if (isset($messages)) {
            echo '<ul>';
            foreach ($messages as $key => $msg) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ul>';
        }
    ?>

    <?php if (isset($monthly_payment)) {?>

        <div class="result">
            <?php echo 'Rata miesięczna: '.$monthly_payment.' zł'; ?>
        </div>

    <?php } ?>

</body>

</html>