<?php

namespace app\controllers;

use app\classes\Flash;
use app\classes\Validate;
use app\database\models\User as ModelUser;

class User extends Base
{
    private $validate;
    private $user;

    public function __construct()
    {
        $this->validate = new Validate;
        $this->user = new ModelUser;
    }

    public function create($request, $response, $args)
    {
        $messages = Flash::getAll();

        return $this->getTwig()->render($response, $this->setView('site/user-create'), [
            'title' => 'User Create',
            'messages' => $messages
        ]);
    } 

    public function store($request, $response, $args)
    {
        $email = filter_input(INPUT_POST, 'email');

        $this->validate->required(['username', 'firstname', 'lastname', 'email'])->exist($this->user,'email',$email);
        $errors = $this->validate->getErrors();

        if ($errors) {
            Flash::flashes($errors);
            return redirect($response, '/user/create');
        }

        return $response;
    }

    public function update($request, $response, $args)
    {
        var_dump("update");
        return $response;
    }

    public function destroy($request, $response, $args)
    {
        var_dump("delete");
        return $response;
    }
}
