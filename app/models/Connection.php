<?php

namespace app\models;

class Connection
{
    public static function connect()
    {
        $config = require "../config.php";
        // ================================================================================================
        // Configura o objeto PDO com as informações de conexão com o banco de dados.
        // ================================================================================================
        $pdo = new PDO
        (
            "mysql:host={$config['host']};
            dbname = {$config['dbname']};
            charset={$config['charset']}",
            $config['username'],
            $config['password']
        );

        // ================================================================================================
        // Configura o modo de erro a ser exibido caso ocorra algum problema com o PDO.
        // ================================================================================================
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // ================================================================================================
        // Configura o PDO para tratar os dados no formato de objetos.
        // ================================================================================================
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        // ================================================================================================
        // Retorna o objeto PDO criado.
        // ================================================================================================
        return $pdo;
    }
}


