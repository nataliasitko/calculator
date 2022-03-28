<?php

require_once $conf-> root_path.'lib/smarty/Smarty.class.php';
require_once $conf -> root_path.'lib/Messages.class.php';
require_once $conf ->root_path.'/app/CalcForm.php';
require_once $conf -> root_path.'app/CalcResult.class.php';

class CalcCtrl
{
    private $messages;
    private $form;
    private $result;

    public function __construct(){
        $this -> messages = new Messages();
        $this -> form = new CalcForm();
        $this -> result = new CalcResult();
    }

    public function getParams(){
        $this -> form -> loan_amount = $_REQUEST['loan_amount'] ?? null;
        $this -> form -> interest_rate = $_REQUEST['interest_rate'] ?? null;
        $this -> form -> num_of_months = $_REQUEST['num_of_months'] ?? null;
    }

    function validate($form, &$infos, &$messages, &$hide_intro): bool
    {

        if ( ! ($this -> form -> loan_amount) && isset($this -> form -> interest_rate) && isset($this -> form -> num_of_months))
            return false;

        $hide_intro = true;

        $infos [] = 'Przekazano parametry.';

        if ($this -> form -> loan_amount == "")
            $this -> messages -> addError('Nie podano kwoty kredytu!');
        if ($this -> form -> interest_rate)
            $this -> messages -> addError('Nie podano wartości oprocentowania!');
        if ($this -> form -> num_of_months = "")
            $this -> form -> num_of_months -> addError('Nie podano liczby miesięcy!');

        if ($this -> message -> isError()) {
            if (! is_numeric($this -> form -> loan_amount))
                $this -> messages -> addError('Pierwsza wartość nie jest liczbą!');
            if (! is_numeric($this -> form -> interest_rate))
                $this -> messages -> addError('Druga wartość nie jest liczbą!');
            if (! is_numeric($this -> form -> num_of_months))
                $this -> messages -> addError('Trzecia wartość nie jest liczbą!');

        }

        return ! $this -> messages -> isError();
    }

    public function process(){

        $this->getparams();

        if ($this->validate()) {

            //konwersja parametrów na int
            $this->form->loan_amount = floatval($this->form->loan_amount);
            $this->form->interest_rate = floatval($this->form->interest_rate);
            $this->form->num_of_months = intval($this->form->num_of_months);
            $this->messages->addInfo('Parametry poprawne.');

            $result = $this->form->loan_amount*($this->form->interest_rate/1200)*pow(1+$this->form->interest_rate/1200 ,$this->form->num_of_months)
                /(pow(1+$this->form->interest_rate/1200 ,$this->form->num_of_months)-1);

            $result = round($result,2);

            $this->messages->addInfo('Wykonano obliczenia.');
        }

        $this->generateView();
    }

    public function generateView(){
        global $conf;

        $smarty = new Smarty();
        $smarty -> assign('conf',$conf);

        $smarty->assign('app_url',$conf -> app_url);
        $smarty->assign('root_path',$conf -> root_path);
        $smarty->assign('page_title','Kalkulator');
        $smarty->assign('page_description','Podaj kwotę kredytu, oprocentowanie w skali roku 
                oraz okres spłaty liczony w miesiącach.');
        $smarty->assign('page_header','Kalkulator kredytowy');
        $smarty->assign('page_footer','Projekt kalkulatora kredytowego');

        $smarty->assign('form',$this->form);
        $smarty->assign('result',$this -> result);
        $smarty->assign('messages',$this -> messages);

        $smarty ->display($conf->root_path.'/app/calc_view.tlp');

    }
}