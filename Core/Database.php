<?php

namespace Core;


use PDO;
use PDOStatement;

class Database
{

    //constructor
    /**
     * @var PDO
     */
    private $pdo;
    /**
     * @var false|PDOStatement
     */
    private $statement;

    /**
     * @param $config
     * @param $username
     * @param $password
     */
    public function __construct($config)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->pdo = new PDO($dsn, $config['username'], $config['password'],[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * @param $sql
     * @return Database
     */
    public function query($sql, $parameters = [])
    {
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute($parameters);

        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            throw new Exception('No record found');
        }

        return $result;
    }
}