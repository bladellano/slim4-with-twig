<?php

namespace app\controllers;

class User extends Base
{
    public function create($request, $response, $args)
    {
        return $this->getTwig()->render($response, $this->setView('site/user-create'), [
            'title' => 'User Create'
        ]);
    }

    public function store($request, $response, $args)
    {
        var_dump("store");
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
