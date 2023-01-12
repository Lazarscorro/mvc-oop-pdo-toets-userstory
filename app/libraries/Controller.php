<?php
// De parent controllerclass laad de model en de view
class Controller
{
   public function model($model)
   {
     // Pad naar de modelclass bestand opgeven
       require_once '../app/models/' . $model . '.php';
     // Nieuwe object van de opgegeven model
       return new $model();
   }
   public function view($view, $data = [])
   {
    
      if(file_exists('../app/views/' . $view . '.php'))
      {
          require_once('../app/views/' . $view . '.php');
      } else {
        die('View bestaat niet');
      }
   }
}