<?php

namespace App\Model;

use PDOStatement;
use WilliamCosta\DatabaseManager\Database;

class Todo
{
    private int $id;
    private string $descript;
    private string $status = '0';

    public function newTodo(string $descript)
    {
        $this->setDescript($descript);
    }

    public function getId()
    {
        return $this->id;
    }


    public function getDescript()
    {
        return $this->descript;
    }

    public function getStatus()
    {
        return $this->status;
    }

    private function setDescript($d)
    {
        $this->descript = $d;
    }

    private function setStatus($s)
    {
        $this->status = $s;
    }

    public function create(): bool
    {
        $this->id = (new Database('to-do'))->insert([
            'id' => NULL,
            'descript' => $this->descript,
            'stats' => $this->status
        ]);

        return true;
    }
    /** 
     *@return PDOStatement
     */

    public static function read($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('to-do'))->select($where, $order, $limit, $fields);
    }
}
