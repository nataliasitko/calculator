<?php
require_once dirname(__DIR__).'/config.php';
require_once $conf -> app_root.'/lib/Smarty/Smarty.class.php';

$ctrl = new CalcCtrl();
$ctrl -> process();

//include _ROOT_PATH.'/app/security/check.php';
