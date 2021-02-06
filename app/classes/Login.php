<?php

namespace app\classes;

use app\database\models\User;

class Login
{

    public function login($email, $password)
    {
        $userFound = (new User)->findBy('email', $email);

        if (!$userFound) {
            return false;
        }

        if (password_verify($password, $userFound->password)) {
            unset($userFound->password);/* Retirando a senha do objeto */
            $_SESSION['user_logged_data'] = $userFound;
            $_SESSION['is_logged_in'] = true;
            return true;
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION['user_logged_data'], $_SESSION['is_logged_in']);
    }
}
