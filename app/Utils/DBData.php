<?php

class DBData {

	/** @var PDO */
	private $dbh;

    public function __construct() {
        $configData = parse_ini_file(__DIR__.'/../config.conf');
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        }
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }
    public function getUsers() {
        $sql = 'SELECT * FROM utilisateurs WHERE login = :login';
        $prep = $this->dbh->prepare($sql);
        $prep->execute(['login' => $_POST['login']]);
        return $users = $prep->fetch();
    }

}