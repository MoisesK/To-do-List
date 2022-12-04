<?php

namespace App\Model;

use App\App\Util\View;
use App\Library\Connection\Connect;

class Todo
{
   private int $id;
   private string $descript;
   private string $status = '0';

   public function __construct(string $descript)
   {
      $this->setDescript($descript);
   }

   public function getId(): int
   {
      return $this->id;
   }


   public function getDescript(): string
   {
      return $this->descript;
   }

   public function getStatus(): int
   {
      return $this->status;
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
      $query = 'INSERT INTO `todoes` (descript, stats) VALUES (?,?)';

      $stmt = Connect::getConn()->prepare($query);
      $stmt->bindValue(1, $todo->getDescript());
      $stmt->bindValue(2, $todo->getStatus());

      $stmt->execute();
   }

   public function read(): mixed
   {
      $query = "SELECT * FROM `todoes` ";

      $stmt = Connect::getConn()->prepare($query);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
         $results = $stmt->fetchAll();
         return $results;
      } else {
         return [];
      };
   }

   public function delete($id)
   {
      $query = 'DELETE FROM `todoes` WHERE id = ?';

      $stmt = Connect::getConn()->prepare($query);
      $stmt->bindValue(1, $id);

      $stmt->execute();
   }

   public function conclude($id)
   {
      $query = 'UPDATE `todoes` SET stats = ? WHERE id = ?';

      $stmt = Connect::getConn()->prepare($query);
      $stmt->bindValue(1, 1);
      $stmt->bindValue(2, $id);

      $stmt->execute();
   }
}
