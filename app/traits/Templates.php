<?php

namespace app\traits;

use Slim\Views\Twig;
use app\classes\TwigFilters;
use app\classes\TwigGlobal;

trait Templates
{

    public function getTwig()
    {
        try {

            $twig = Twig::create(DIR_VIEWS);
            $twig->addExtension(new TwigFilters);/* Adiciona o filtro do Twig */
            // $twig->getEnvironment()->addGlobal('name','Lorem Ipsum');/* Adicionando variável global no template */
            TwigGlobal::load($twig);/* Adicionando variável global no template */

            return $twig;
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
    public function setView($name)
    {
        return $name . EXT_VIEWS;
    }
}
