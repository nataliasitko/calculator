<?php
require_once dirname(__DIR__).'/config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$form){
	$form['loan_amount'] = isset($_REQUEST['loan_amount']) ? $_REQUEST['loan_amount'] : null;
	$form['intrest_rate'] = isset($_REQUEST['intrest_rate']) ? $_REQUEST['intrest_rate'] : null;
	$form['num_of_months'] = isset($_REQUEST['num_of_months']) ? $_REQUEST['num_of_months'] : null;	
}

function validate(&$form,&$infos,&$msgs,&$hide_intro){

	if ( ! (isset($form['loan_amount']) && isset($form['intrest_rate']) && isset($form['num_of_months']) ))	return false;	
	
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['loan_amount'] == "") $msgs [] = 'Nie podano liczby 1';
	if ( $form['intrest_rate'] == "") $msgs [] = 'Nie podano liczby 2';
        if ( $form['num_of_months'] == "") $msgs [] = 'Nie podano liczby 3';
	
	if ( count($msgs)==0 ) {
		if (! is_numeric( $form['loan_amount'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
		if (! is_numeric( $form['intrest_rate'] )) $msgs [] = 'Druga wartość nie jest liczbą';
                if (! is_numeric( $form['num_of_months'] )) $msgs [] = 'Trzecia wartość nie jest liczbą';
                
        }
	
	if (count($msgs)>0) return false;
	else return true;
}
	
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	$form['loan_amount'] = floatval($form['loan_amount']);
        $form['num_of_months'] = intval($form['num_of_months']);
        $form['intrest_rate'] = floatval($form['intrest_rate']);

        $result = $form['loan_amount']*($form['intrest_rate']/1200)*pow(1+$form['intrest_rate']/1200 ,$form['num_of_months'])
        /(pow(1+$form['intrest_rate']/1200 ,$form['num_of_months'])-1);

        $result = round($result,2);
}


$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

$page_title= 'Kalkulator kredytowy';
$page_description = 'Podaj kwotę kredytu, oprocentowanie w skali roku oraz okres spłaty w miesiącach.';
$page_header = 'Kalkulator kredytowy';
$page_footer = 'projekt kalkulatora kredytowego';

include 'calc_view.php';
