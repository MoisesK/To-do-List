<?php

namespace App\Model;

use App\App\Util\View;
use App\Library\Connection\Connect;

class Todo
{
   private int $id;
   private string $title;
   private int $status = 0;

   public function __construct(string $title)
   {
      $this->setTitle($title);
   }

   public function getId(): int
   {
      return $this->id;
   }
   public function getTitle(): string
   {
      return $this->title;
   }

   public function getStatus(): string
   {
      return $this->status;
   }

   private function setTitle($t): void
   {
      $this->title = $t;
   }

   private function setDescript($d): void
   {
      $this->descript = $d;
   }

   private function setStatus($st): void
   {
      $this->status = $st;
   }

   public function create(Todo $todo): void
   {
      $query = 'INSERT INTO `todoes` (title, stats) VALUES (?,?,)';

      $stmt = Connect::getConn()->prepare($query);
      $stmt->bindValue(1, $todo->getTitle());
      $stmt->bindValue(3, $todo->getStatus());

      $stmt->execute();
   }

   public function read(): mixed
   {
      $query = "SELECT * FROM `todoes` WHERE stats = '0'";

      $stmt = Connect::getConn()->prepare($query);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
         $results = $stmt->fetchAll();
         return $results;
      } else {
         return [];
      };
   }

   public function readAdvanced($query): mixed
   {
      $query = $query;

      $stmt = Connect::getConn()->prepare($query);
      $stmt->execute();

      return $stmt->rowCount();
   }

   public function delete($id)
   {
      $query = 'DELETE FROM `todoes` WHERE id = ?';

      $stmt = Connect::getConn()->prepare($query);
      $stmt->bindValue(1, $id);

      $stmt->execute();
   }

   public function update($id)
   {
      $query = "UPDATE `todoes` SET stats = ? WHERE id = ?";

      $stmt = Connect::getConn()->prepare($query);
      $stmt->bindValue(1, 1);
      $stmt->bindValue(2, $id);

      $stmt->execute();
   }
}
