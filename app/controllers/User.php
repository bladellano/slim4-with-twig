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

    public function edit($request, $response, $args)
    {
        $id = \filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);

        $user = $this->user->findBy('id', $id);

        if (!$user) {
            Flash::set('message', 'Usuário não encontrado', 'danger');
            return redirect($response, '/');
        }

        $messages = Flash::getAll();

        return $this->getTwig()->render($response, $this->setView('site/user-edit'), [
            'title' => 'User Create',
            'user' => $user,
            'messages' => $messages
        ]);

        return $response;
    }

    public function store($request, $response, $args)
    {

        $data = filter_var_array($request->getParsedBody(), FILTER_SANITIZE_STRIPPED);

        $data['password'] = self::setPasswordHash($data['password']);

        /* Campos obrigatórios e validando e-mails 2x */
        $this->validate->required(['username', 'firstname', 'lastname', 'email', 'password'])
            ->exist($this->user, 'email', $data['email'])
            ->email($data['email']);

        $errors = $this->validate->getErrors();

        if ($errors) {
            Flash::flashes($errors);
            return redirect($response, '/user/create');
        }

        $created = $this->user->create($data);

        if ($created) {
            Flash::set('message', 'Cadastrado com sucesso');
            return redirect($response, '/');
        }

        Flash::set('message', 'Ocorreu um erro ao cadastrar', 'danger');
        return redirect($response, '/user/create');
    }

    public function update($request, $response, $args)
    {
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);
        $data = $request->getParsedBody();
        unset($data['_METHOD']);

        $data['password'] =  self::setPasswordHash($data['password']);

        $this->validate->required(['username', 'firstname', 'lastname', 'email', 'password']);

        $errors = $this->validate->getErrors();

        if ($errors) {
            Flash::flashes($errors);
            return \redirect($response, '/user/edit/' .  $id);
        }

        $updated = $this->user->update(
            [
                "fields" => $data,
                "where" => ["id" =>  $id]
            ]
        );

        if ($updated) {
            Flash::set('message', 'Atualizado com sucesso');
            return \redirect($response, '/user/edit/' .  $id);
        }

        Flash::set('message', 'Não foi possível atualizar', 'danger');
        return \redirect($response, '/user/edit/' .  $id);
    }

    public function destroy($request, $response, $args)
    {
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);

        $user = $this->user->findBy('id', $id);

        if (!$user) {
            Flash::set('message', 'Usuário não existe', 'danger');
            return \redirect($response, '/');
        }

        $deleted = $this->user->delete('id', $id);

        if ($deleted) {
            Flash::set('message', 'Deletado com sucesso');
            return \redirect($response, '/');
        }

        Flash::set('message', 'Ocorreu um problema ao deletar', 'danger');
        return \redirect($response, '/');
    }

    /**
     * Método para criar hash da senha
     * @param [type] $password
     * @return void
     */
    private static function setPasswordHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
