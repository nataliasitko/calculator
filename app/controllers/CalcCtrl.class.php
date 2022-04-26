<?php

namespace app\controllers;


use app\forms\CalcForm;
use app\transfer\CalcResult;
use Medoo\Medoo;
use PDOException;

class CalcCtrl
{
    private CalcForm $form;
    private CalcResult $result;

    public function __construct(){
        $this -> form = new CalcForm();
        $this -> result = new CalcResult();
    }

    public function getParams(){
        $this -> form -> loan_amount = getFromRequest('loan_amount');
        $this -> form -> interest_rate = getFromRequest('interest_rate');
        $this -> form -> num_of_months = getFromRequest('num_of_months');
    }

    function validate(): bool
    {

        if ( ! ($this -> form -> loan_amount) && isset($this -> form -> interest_rate) && isset($this -> form -> num_of_months))
            return false;

        $hide_intro = true;

        $infos [] = 'Przekazano parametry.';

        if ($this -> form -> loan_amount == "")
            getMessages()->addError('Nie podano kwoty kredytu.');
        if ($this -> form -> interest_rate == "")
            getMessages() -> addError('Nie podano wartości oprocentowania.');
        if ($this -> form -> num_of_months == "")
            getMessages()-> addError('Nie podano okresu spłaty.');

        if (! getMessages()-> isError()) {
            if (! is_numeric($this -> form -> loan_amount))
                getMessages()-> addError('Pierwsza wartość nie jest liczbą.');
            if (! is_numeric($this -> form -> interest_rate))
                getMessages()-> addError('Druga wartość nie jest liczbą.');
            if (! is_numeric($this -> form -> num_of_months))
                getMessages()-> addError('Trzecia wartość nie jest liczbą.');

        }

        return ! getMessages()-> isError();
    }

    public function action_calcCompute(){

        $this->getparams();

        if ($this->validate()) {

            $this->form->loan_amount = floatval($this->form->loan_amount);
            $this->form->interest_rate = floatval($this->form->interest_rate);
            $this->form->num_of_months = intval($this->form->num_of_months);
            getMessages()->addInfo('Parametry poprawne.');

            $this->result->result = $this->form->loan_amount*($this->form->interest_rate/1200)*pow(1+$this->form->interest_rate/1200 ,$this->form->num_of_months)
                /(pow(1+$this->form->interest_rate/1200 ,$this->form->num_of_months)-1);

            $this->result->result = round($this->result->result,2);

            getMessages()->addInfo('Wykonano obliczenia.');

        }

        $this->generateView();
    }

    public function saveToDatabase($db){
        try{
            $db->insert("results", [
                "loan_amout" => $this->form->loan_amount,
                "interest_rate" => $this->form->interest_rate,
                "num_of_months" => $this->form->num_of_months,
            ]);
        }catch(PDOException $ex){
            getMessages()->addError("Connection failed".$ex);
        }
    }

    public function action_calcShow(){
        getMessages()->addInfo('Witaj w kalkulatorze');
        $this->generateView();
    }

    public function generateView(){

        getSmarty()->assign('user',unserialize($_SESSION['user']));

        getSmarty()->assign('page_title','Kalkulator');
        getSmarty()->assign('page_header','Kalkulator kredytowy');
        getSmarty()->assign('page_description','Podaj kwotę kredytu, oprocentowanie w skali roku 
                oraz okres spłaty liczony w miesiącach:');

        getSmarty()->assign('page_footer','Projekt kalkulatora kredytowego');

        getSmarty()->assign('form',$this->form);
        getSmarty()->assign('res',$this -> result);

        getSmarty()->display('CalcView.tpl');
    }
}