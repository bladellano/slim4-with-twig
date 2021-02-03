<?php

namespace app\classes;

class Validate
{
    private $erros = [];
    /**
     * Valida campos obrigatórios
     * @param array $fields todos os campos
     * @return void
     */
    public function required(array $fields)
    {
        foreach ($fields as $field) {
            if (empty($_REQUEST[$field])) {
                $this->erros[$field] = "O campo {$field} é obrigatório";
            }
        }

        return $this;
    }
    /**
     * Verifica existência de e-mail na tabela
     * @param [type] $model User
     * @param [type] $field campo
     * @param [type] $value valor
     * @return void
     */
    public function exist($model, $field, $value)
    {
        if ($model->findBy($field, $value))
            $this->erros[$field] = "Este {$field} já está cadastrado no banco de dados";
        return $this;
    }

    public function getErrors()
    {
        return $this->erros;
    }
}
