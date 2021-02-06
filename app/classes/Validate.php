<?php

namespace app\classes;

class Validate
{
    private $errors = [];
    /**
     * Valida campos obrigatórios
     * @param array $fields todos os campos
     * @return void
     */
    public function required(array $fields)
    {
        foreach ($fields as $field) {
            if (empty($_REQUEST[$field])) {
                $this->errors[$field] = "O campo {$field} é obrigatório";
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
            $this->errors[$field] = "Este {$field} já está cadastrado no banco de dados";
        return $this;
    }
    /**
     * Valida o formato do e-mail
     * @param [type] $field e-mail
     * @return void
     */
    public function email($field)
    {
        if (!filter_var($field, FILTER_VALIDATE_EMAIL))
            $this->errors['email'] = "Este e-mail não é válido";
        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
