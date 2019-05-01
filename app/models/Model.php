<?php

namespace app\models;

use app\models\Connection;

abstract class Model
{
    protected $connection;

    public function __construct() {
        $this->connection = Connection::connect();
    }

    public function all()
    {
        // ============================================================================================
        // Criação da sentença SQL.
        // ============================================================================================
        $sql = "SELECT * FROM {$this->table}";
        $list = $this->connection->prepare($sql);
        $list->execute();

        // ============================================================================================
        // Retorna um array multidimensional em que cada índice aponta para outro array que contém
        // os dados de um registro da tabela.
        // Ou seja, a consulta retornar 3 registros, no array multidimensional haveram mais 3 arrays
        // sendo que cada um é um registro (linha) da tabela.
        // ============================================================================================
        return $list->fetchAll();
    }

    public function find($field, $value)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$field} = ?";
        $list = $this->connection->prepare($sql);
        $list->bindValue(1, $value);
        $list->execute();

        return $list->fetch();
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->table} WHERE $filed = ?";
        $delete = $this->connection->prepare($sql);
        $delete->bindValue(1, $value);
        $delete->execute();

        return $delete->rowCount();
    }
}


