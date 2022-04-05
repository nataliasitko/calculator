<?php

require_once 'init.php';

$action = $_REQUEST['action'] ?? null;

switch ($action) {
    default :
        $ctrl = new app\controllers\CalcCtrl();
        $ctrl->generateView();
        break;
    case 'calcCompute' :
        $ctrl = new app\controllers\CalcCtrl();
        $ctrl->process();
        break;
}

