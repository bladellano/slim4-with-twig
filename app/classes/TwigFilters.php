<?php

namespace app\classes;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigFilters extends AbstractExtension
{
    public function getFilters()
    {
        return [
            /*Nome do filter, próprio objeto e nome da função*/
            new TwigFilter('message', [$this, 'showMessage'])
        ];
    }
    
    public function showMessage($message, $alert)
    {
        if (\is_string($message) && !empty($message)) {
            return '<div class="alert alert-' . $alert . '">' . $message . '</div>';
        }
    }
}
