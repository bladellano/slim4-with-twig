<?php

namespace app\controllers;

use app\classes\Flash;

class User
{
    public function create($request, $response, $args)
    {

        Flash::set("message",'Redirecionado!!!');

        return redirect($response,"/");
    }
}
