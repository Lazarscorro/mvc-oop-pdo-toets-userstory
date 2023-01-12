<?php

class Les
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();
   }
   public function getLessons()
   {
      $this->db->query('SELECT les.DatumTijd, leerling.Naam as LENA, les.Id, intructeur.Naam as INNA
                        From les
                        INNER JOIN intructeur
                        ON les.InstructeurId = intructeur.Id
                        INNER JOIN leerling
                        ON les.LeerlingId = leerling.Id
                        WHERE intructeur.Id = :Id');
      $this->db->bind(':Id', 2);
      $result = $this->db->resultSet();
      return $result;
   }

   public function getTopicsLesson($lessonId)
   {
      $this->db->query('SELECT * from onderwerp inner join les on les.Id = onderwerp.lesId
                        Where lesId = :Id');
            $this->db->bind(':Id', $lessonId,PDO::PARAM_INT );
            $result = $this->db->resultSet();
            return $result;
   }

   public function addTopic($post)
   {
      $sql = "INSERT INTO onderwerp(LesId
                                   ,Onderwerp)
               VALUES              (:lesId
                                   ,:topic)";

      $this->db->query($sql);
      $this->db->bind(':lesId', $post['lesId'], PDO::PARAM_INT);
      $this->db->bind(':topic', $post['topic'], PDO::PARAM_STR);
      return $this->db->execute();
      

   }

   public function getLesInfo($lesInfoId)
   {
      $this->db->query('SELECT * from opmerking inner join les on les.Id = opmerking.lesId
                        WHERE lesId = :Id');
            $this->db->bind(':Id', $lesInfoId, PDO::PARAM_INT);
            $result = $this->db->resultSet();
            return $result;
   }

   public function addLesInfo ($post)
   {
       $sql = "INSERT INTO opmerking(LesId,
                                     Opmerking)
                 VALUES             (:lesId
                                    ,:Opmerking)";
      $this->db->query($sql);
      $this->db->bind(':lesId', $post['lesId'], PDO::PARAM_INT);
      $this->db->bind(':Opmerking', $post['Opmerking'], PDO::PARAM_STR);
      return $this->db->execute();
   }
}
