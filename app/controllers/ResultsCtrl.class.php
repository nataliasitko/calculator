<?php

namespace app\controllers;
require 'vendor/autoload.php';

use app\forms\CalcForm;
use Medoo\Medoo;
use PDOException;

class resultsCtrl{
    private CalcForm $form;
    private $records;

    public function __construct(){
        $this->form = new CalcForm();
    }


    public function action_resultSave(){

        $search_params = [];
        if ( isset($this->form->loan_amount) && strlen($this->form->loan_amount) > 0) {
            $search_params['loan_amount[~]'] = $this->form->loan_amount.'%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = [ "AND" => &$search_params ];
        } else {
            $where = &$search_params;
        }

        try{
            $this->records = getDB()->select("results", [
                "loan_amout",
                "interest_rate",
                "num_of_months",
            ], $where );
        } catch (PDOException $e){
            getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
            if (getConf()->debug) getMessages()->addError($e->getMessage());
        }

        getSmarty()->assign('searchForm',$this->form); // dane formularza (wyszukiwania w tym wypadku)
        getSmarty()->assign('results',$this->records);  // lista rekordów z bazy danych
        getSmarty()->display('PersonList.tpl');
    }

}