<?php

namespace app\traits;

use PDOException;

trait Update

{
    public function update(array $updateFieldAndValues)
    {
        $fields = $updateFieldAndValues['fields'];
        echo '<pre>  $fields<br />'; var_dump(  $fields); echo '</pre>';
        $where = $updateFieldAndValues['where'];

        $update_fields = '';

        foreach (array_keys($fields) as $field)
            $update_fields .= "{$field} = :{$field}, ";
        $update_fields = rtrim($update_fields, ", ");

        $where_update = array_keys($where);

        $sql = sprintf("update %s set %s where %s",$this->table,$update_fields,"{$where_update[0]} = :{$where_update[0]}");

        $bind = array_merge($fields,$where);

        try {
            $prepare = $this->connection->prepare($sql);
            return $prepare->execute($bind);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
        die();
    }
}
