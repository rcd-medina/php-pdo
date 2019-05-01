<?php

namespace app\models;

use PDO;

class Connection
{
    public static function connect()
    {
        // ================================================================================================
        // Busca o array que contém as informações de conexão com o banco de dados que serão utilizadas
        // para a criação do objeto PDO e em seguida executara a conexão com o banco de dados.
        // 
        // O array em questão é multidimensional, sendo que as informações de conexão com o MySQL estão
        // indexadas pela chave db.
        // ================================================================================================
        $config = require "../config.php";

        // ================================================================================================
        // Configura o objeto PDO com as informações de conexão com o banco de dados.
        //
        // No construtor do PDO, são aceitos alguns parâmetros, sendo:
        // 1º ==> A string de conexão de conexão contendo o driver do banco de dados, no exemplo (mysql:)
        //          seguida do local onde está o hospedado o servidor MySQL (host=) um ponto e vírgula (;)
        //          o nome do banco de dados que queremos acessar (dbname=) ponto e vírgula (;) o charset
        //          a ser utilizado para a conexão com o banco de dados.
        //
        // 2º ==> O nome de usuário para conectar se ao MySQL Server.
        // 
        // 3º ==> A senha do usuário para conectar se ao MySQL Server.
        //
        // Exemplo de string de conexão:
        // "mysql:host=localhost;dbname=meuBancoDados;charset=utf8"
        // ================================================================================================
        $pdo = new PDO
        (
            "mysql:host={$config['db']['host']};
            dbname={$config['db']['dbname']};
            charset={$config['db']['charset']}",
            $config['db']['username'],
            $config['db']['password']
        );

        // ================================================================================================
        // Configura o modo de erro a ser exibido caso ocorra algum problema com o PDO.
        // ================================================================================================
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // ================================================================================================
        // Configura o PDO para tratar os dados no formato de objetos, já que por padrão quando ocorrer
        // uma consulta os dados serão retornados em arrays
        // ================================================================================================
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        // ================================================================================================
        // Retorna o objeto PDO criado.
        // ================================================================================================
        return $pdo;
    }
}


