<?php
require_once dirname(__DIR__).'/config.php';

$loan_amount = $_REQUEST['loan_amount'] ?? null;
$intrest_rate = $_REQUEST['intrest_rate'] ?? null;
$num_of_months = $_REQUEST['num_of_months'] ?? null;

if(! (isset($loan_amount) && isset($intrest_rate) && isset($num_of_months))){
    $messages [] = 'Błędne wywołanie aplikacji. Brak wymaganych informacji.';
}

if($loan_amount == ''){
    $messages [] = 'Nie podano wartości kwoty.';
}
if($intrest_rate == ''){
    $messages [] = 'Nie podano wartosci oprocentowania.';
}
if($num_of_months == ''){
    $messages [] = 'Nie podano okresu splaty.';
}

if(empty($messages)){

    if(! is_numeric($loan_amount)){
        $messages [] = 'Podana kwota nie jest liczbą rzeczywistą.';
    }
    if(! is_numeric($intrest_rate)){
        $messages [] = 'Podana wartość oprocentowania nie jest liczbą rzeczywistą.';
    }
    if(! is_numeric($num_of_months)){
        $messages [] = 'Podany okres spłaty nie jest liczbą całkowitą.';
    }
}

if(empty($messages)){
    
    $loan_amount = floatval($loan_amount);
    $num_of_months = intval($num_of_months);
    $intrest_rate = floatval($intrest_rate);

    $intrest_rate_per_month = $intrest_rate/1200;

    $monthly_payment = $loan_amount*$intrest_rate_per_month*pow(1+$intrest_rate_per_month ,$num_of_months)
    /(pow(1+$intrest_rate_per_month ,$num_of_months)-1);

    $monthly_payment = round($monthly_payment,2);
}

include 'calc_view.php';
