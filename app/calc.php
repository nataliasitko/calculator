<?php
require_once dirname(__DIR__).'/config.php';
require_once _ROOT_PATH.'lib/Smarty/Smarty.class.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$form){
	$form['loan_amount'] = $_REQUEST['loan_amount'] ?? null;
	$form['interest_rate'] = $_REQUEST['interest_rate'] ?? null;
	$form['num_of_months'] = $_REQUEST['num_of_months'] ?? null;
}

function validate(&$form,&$infos,&$msgs,&$hide_intro): bool
{

	if ( ! (isset($form['loan_amount']) && isset($form['interest_rate']) && isset($form['num_of_months']) ))	return false;
	
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	if ( $form['loan_amount'] == "") $msgs [] = 'Nie podano liczby 1';
	if ( $form['interest_rate'] == "") $msgs [] = 'Nie podano liczby 2';
        if ( $form['num_of_months'] == "") $msgs [] = 'Nie podano liczby 3';
	
	if ( count($msgs)==0 ) {
		if (! is_numeric( $form['loan_amount'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
		if (! is_numeric( $form['interest_rate'] )) $msgs [] = 'Druga wartość nie jest liczbą';
                if (! is_numeric( $form['num_of_months'] )) $msgs [] = 'Trzecia wartość nie jest liczbą';
                
        }
	
	if (count($msgs)>0) return false;
	else return true;
}
	
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	$form['loan_amount'] = floatval($form['loan_amount']);
        $form['num_of_months'] = intval($form['num_of_months']);
        $form['interest_rate'] = floatval($form['interest_rate']);

        $result = $form['loan_amount']*($form['interest_rate']/1200)*pow(1+$form['interest_rate']/1200 ,$form['num_of_months'])
        /(pow(1+$form['interest_rate']/1200 ,$form['num_of_months'])-1);

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

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator');
$smarty->assign('page_description','Podaj kwotę kredytu, oprocentowanie w skali roku 
                oraz okres spłaty liczony w miesiącach.');
$smarty->assign('page_header','Kalkulator kredytowy');
$smarty->assign('page_footer','Projekt kalkulatora kredytowego');

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

$smarty->display(_ROOT_PATH.'/app/calc_view.tpl');
