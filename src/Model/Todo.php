<?php

namespace App\Model;

class Todo
{
    private int $id;
    private string $title;
    private string $descript;
    private string $deadline;

    public function __construct(int $id, string $title, string $descript, string $deadline)
    {
        $this->title = $id;
        $this->title = $title;
        $this->descript = $descript;
        $this->deadline = $deadline;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescript()
    {
        return $this->descript;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }
}
