<?php

namespace App\Model;

class Todo
{
    private int $id;
    private string $descript;
    private string $status;

    public function __construct(int $id, string $descript, string $status)
    {
        $this->title = $id;
        $this->descript = $descript;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getDescript()
    {
        return $this->descript;
    }

    public function getDeadline()
    {
        return $this->status;
    }
}
