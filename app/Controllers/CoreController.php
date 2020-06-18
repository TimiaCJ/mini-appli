<?php

class CoreController {

    protected $baseUrl;
    protected $dbData;

    public function __construct($baseUrl){
        $this->baseUrl = $baseUrl;
        $this->dbData = new DBData();
    }

    public function notFound()
    {
        // J'envoi un status 404 à mon navigateur
        header('HTTP/1.0 404 Not Found');
        $this->show('tony-404');
    }

    protected function show($tpl_name, $array_argument = [])
    {
 
        foreach ($array_argument as $argument_name => $argument_value) {

            ${$argument_name} = $argument_value;

        }


        require __DIR__.'/../views/header.tpl.php';
        require __DIR__.'/../views/'.$tpl_name.'.tpl.php';
        require __DIR__.'/../views/footer.tpl.php';
    }
}