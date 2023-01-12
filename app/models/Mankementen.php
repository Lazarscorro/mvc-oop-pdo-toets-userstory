<?php
class Mankementen
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();
   }
   public function getMankement()
   {
      $this->db->query('SELECT mankement.Datum, mankement.Mankement, instructeur.Naam, instructeur.Email, auto.Kenteken 
                      from mankement Inner join auto on mankement.AutoId = auto.Id
                      Inner join instructeur on instructeur.Id = auto.InstructeurId WHERE instructeur.Id = :Id order by mankement.Datum desc' );
      $this->db->bind(':Id', 2);
      $result = $this->db->resultSet();
      return $result;
   }
   public function addMankement($post)
   {
      $sql = "INSERT INTO mankement(AutoId
                                   ,Mankement
                                   ,Datum)
              VALUES               (:AutoId
                                   ,:Mankement
                                   ,:Datum)";
      $this->db->query($sql);
      $this->db->bind(':AutoId', $post['AutoId'], PDO::PARAM_INT);
      $this->db->bind(':Mankement', $post['Mankement'], PDO::PARAM_STR);
      $this->db->bind(':Datum', date("Y-m-d"), PDO::PARAM_STR);
      return $this->db->execute();
   }
}