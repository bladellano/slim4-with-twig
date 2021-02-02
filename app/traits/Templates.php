<?php

namespace app\traits;

use Slim\Views\Twig;

trait Templates {

    public function getTwig()
    {
        try {

            return Twig::create(DIR_VIEWS);
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
    public function setView($name)
    { 
        return $name.EXT_VIEWS;
    }

}