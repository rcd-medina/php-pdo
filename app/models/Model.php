<?php

namespace app\models;

use app\models\Connection;

abstract class Model
{
    protected $connection;

    public function __construct() {
        $this->connection = Connection::connect();
    }

    // ================================================================================================
    // Retorna todos os registros encontrados na tabela indicada.
    // ================================================================================================
    public function all()
    {
        // ============================================================================================
        // Criação da sentença SQL.
        // ============================================================================================
        $sql = "SELECT * FROM {$this->table}";

        // ============================================================================================
        // O método prepare() do objeto connection, que é a conexão PDO, retorna um objeto do tipo
        // PDOStatement, por esse motivo é bem comum declararem a variável $stmt ao invés de $list,
        // como feito neste exemplo.
        // O método query() também retorna um PDOStatement, com algumas diferenças.
        // O método prepare() prepara uma sentença SQL permitindo a utilização de um placeholder que
        // depois será trocado por um valor real. O método query() não permite isso.
        // O método prepare() já nos previne contra ataques do tipo SQL Injection, ou seja, é mais
        // seguro do que utilizar o método query().
        //
        // Ex.:
        // $sql = "SELECT * FROM {$this->table} WHERE id = :placeholder";
        //
        // O placeholder será substituído quando ocorrer a chamada ao método bindValue() do objeto
        // $stmt, neste exemplo o $list. O primeiro parâmetro passado é o nome do placeholder a ser
        // substituído, o segundo parâmetro é o valor real ou variável com o valor.
        // No exemplo estamos trocando o placeholder pelo valor 2
        //
        // Ex.:
        // $list->bindValue(':placeholder', 2)
        // ============================================================================================
        $list = $this->connection->prepare($sql);
        //$list->bindValue(':id', 1);
        $list->execute();

        // ============================================================================================
        // Retorna um array multidimensional em que cada índice aponta para outro array que contém
        // os dados de um registro da tabela.
        // Ou seja, se a consulta retornar 3 registros, no array multidimensional haveram mais 3 arrays
        // sendo que cada um é um registro (linha) da tabela.
        //
        // O método fetchAll() do objeto PDOStatement retorna todos os registros encontrados no banco
        // de dados quando o critério de busca, dado, é genérico.
        //
        // O método fetch() do objeto PDOSstatement retorna apenas 1 registro.
        // ============================================================================================
        return $list->fetchAll();
    }

    public function find($field, $value)
    {
        // ============================================================================================
        // Na sentença SQL utiliza se um sinal de interrogação (?) para indicar onde será feita a uma
        // substituíção por um valor real, muito parecido com :placeholder.
        // Mas no momento em que chamamos o método bindValue() do objeto PDOStatement ($list) indica
        // se em qual posição será a colocação do valor real, como temos apenas uma interrogação (?)
        // usamos o número um (1) e qual o valor que será utilizado, se houvesse mais uma interrogação
        // utilizariamos o número dois, e assim por diante.
        //
        // Ex.:
        // $sql = "SELECT * FROM {$this->table} WHERE {$field} = ? AND name = ?";
        // $list = $this->connection->prepare($sql);
        // $list->bindValue(1, $value);
        // $list->bindValue(2, $nome);
        //
        // Também poderia ser utilizado o método bindParam() do obejto PDOStatement ($list), mas aqui
        // há uma diferença, o bindParam() obriga a utilização dos parâmetros recebidos pelo método
        // find() acima declarado.
        //
        // Ex.:
        // $sql = "SELECT * FROM {$this->table} WHERE {$field} = ? AND name = ?";
        // $list = $this->connection->prepare($sql);
        // $list->bindParam(1, 2);      ==> Errado
        // $list->bindValue(2, $value); ==> Correto
        // ============================================================================================
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


