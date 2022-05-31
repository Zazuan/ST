<?php

namespace Potato\core\database;

use \PDO;
use Potato\core\config\Config;

class Db
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = Config::group('connect');

        $dsn = 'mysql:host=' .$config['host'] .';dbname=' .$config['db_name'] .';charset=' .$config['charset'];

        try {
            $this->link = new PDO($dsn, $config['username'], $config['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        return $this;
    }

    public function execute($sql, $values = [])
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute($values);
    }

    public function query($sql, $values = [], $statement = PDO::FETCH_OBJ)
    {
        $sth = $this->link->prepare($sql);

        $sth->execute($values);

        $result = $sth->fetchAll($statement);

        if($result === false){
            return [];
        }

        return $result;
    }

    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }
}