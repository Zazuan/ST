<?php

namespace Potato\core\database;

use \ReflectionClass;
use \ReflectionProperty;

trait ActiveRecord
{
    protected $db;
    protected $queryBuilder;

    public function __construct($id = 0)
    {
        global $di;

        $this->db = $di->get('db');
        $this->queryBuilder = new QueryBuilder();

        if ($id) {
            $this->setId($id);
        }
    }

    public function getTable()
    {
        return $this->table;
    }

    public function findOne()
    {
        $find = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->where('id', $this->id)
                ->sql(),
            $this->queryBuilder->values
        // if we want array, default = object
        //,\PDO::FETCH_ASSOC
        );

        return $find[0] ?? null;
    }

    public function insert()
    {
        $properties = $this->getIssetProperties();

        try {
            $this->db->execute(
                $this->queryBuilder
                    ->insert($this->getTable())
                    ->set($properties)
                    ->sql(),
                $this->queryBuilder->values
            );

            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function update()
    {
        $properties = $this->getIssetProperties();

        try {
            if (isset($this->id)) {
                $this->db->execute(
                    $this->queryBuilder
                        ->update($this->getTable())
                        ->set($properties)
                        ->where('id', $this->id)
                        ->sql(),
                    $this->queryBuilder->values
                );
            }

            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function delete()
    {

        try {
            $this->db->execute(
                $this->queryBuilder
                    ->delete()
                    ->from($this->getTable())
                    ->where('id', $this->id)
                    ->sql(),
                $this->queryBuilder->values
            );
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $this->db->lastInsertId();
    }

    private function getIssetProperties()
    {
        $properties = [];

        foreach ($this->getProperties() as $key => $property) {
            if (isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $properties;
    }

    private function getProperties()
    {
        $reflection = new ReflectionClass($this);

        return $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
    }

}