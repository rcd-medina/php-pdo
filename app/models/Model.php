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
        # code...
    }

    public function find()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}


