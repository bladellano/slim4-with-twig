<?php

namespace app\controllers;

use app\classes\Flash;
use app\database\models\User;

class Home extends Base
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index($request, $response)
    {

        $users = $this->user->find();

        $message = Flash::get('message');

        // $deleted = $this->user->delete("id", 15);
        // echo '<pre>$deleted<br />'; var_dump($deleted); echo '</pre>'; exit;

        /* $updated = $this->user->update([
            'fields' => ['username' => 'Kakake', 'email' => 'teste@teste.com.br'],
            'where' => ['id' => 6]
        ]); */

        // echo '<pre>$updated<br />'; var_dump($updated); echo '</pre>'; exit;
        /*          $created =  $this->user->create([
            "username" => "Intisar",
            "firstname" => "Gouvea",
            "lastname" => "Nana",
            "email" => "intisar8251@uorak.com",
            "password" => password_hash("123456", PASSWORD_DEFAULT),
        ]);  */

        // echo '<pre>$created <br />';var_dump($created);echo '</pre>'; exit;

        //$user_find = $this->user->findBy("email","bladellano@gmail.com");

        return $this->getTwig()->render($response, $this->setView('site/home'), [
            'title' => 'Home',
            'users' => $users,
            'message'=> $message
        ]);
    }
}
