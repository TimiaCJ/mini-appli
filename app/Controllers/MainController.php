<?php

class MainController extends CoreController {


    public function home()
    {
        $this->show('home');
    }
    
    public function confirmation()
    {
        $users = $this->dbData->getUsers();
        $assign_to_view = [
            'users' => $users
        ];
        $this->show('confirmation', $assign_to_view);
    }

    public function notFound()
    {
        $this->show('tony-404');
    }

}