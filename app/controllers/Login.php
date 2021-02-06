<?php

namespace app\controllers;

use app\classes\Flash;
use app\classes\Validate;

class Login extends Base
{
    private $login;

    public function __construct()
    {
        $this->login = new \app\classes\Login;
    }

    public function index($request, $reponse)
    {

        /** Verifica se o usuário já está logado */
        if ($_SESSION['is_logged_in']) {
            Flash::set('message', 'Usuário já se encontra logado!', 'warning');
            return \redirect($reponse, '/');
        }

        $messages = Flash::getAll();

        return $this->getTwig()->render($reponse, $this->setView('site/login'), [
            'title' => "Login",
            'messages' => $messages
        ]);
    }

    public function store($request, $reponse)
    {

        $data = \filter_var_array($request->getParsedBody(), FILTER_SANITIZE_STRIPPED);

        $validate = new Validate;

        $validate->required(['email', 'password'])->email($data['email']);

        $errors = $validate->getErrors();

        if ($errors) {
            Flash::flashes($errors);
            return \redirect($reponse, '/login');
        }

        $logged = $this->login->login($data['email'], $data['password']);

        if ($logged) {
            return \redirect($reponse, '/');
        }

        Flash::set('message', 'Ocorreu um erro ao logar, tente novamente em alguns segundos');
        return \redirect($reponse, '/login');

        return $reponse;
    }


    public function destroy($request, $response)
    {
        $this->login->logout();

        return redirect($response, '/');
    }
}
