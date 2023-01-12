<?php
class Countries extends Controller
{
    private $countryModel;
    public function __construct()
    {
       $this->countryModel =  $this->model('Country');
    }

    public function index($land = null , $age = null)
    {
      //laat de model de gegevens uit de database halen via method getCountries()
       $records = $this->countryModel->getCountries();

       //var_dump($records);
       $rows = '';
       foreach($records as $value)
       {
          $rows .= "<tr>
                      <td>$value->Name</td>
                      <td>$value->CapitalCity</td>
                      <td>$value->Continent</td>
                      <td>$value->Population</td>
                      <td><a href='" . URLROOT . "/countries/update/$value->Id'>update</a></td>
                      <td><a href='" . URLROOT . "/countries/delete/$value->Id'>delete</a></td>
                    </tr>";
       }

       
       // Stuur de gegevens uit de model naar de view via het $data array
       $data = [
          'title' => "Landen van de wereld",
          'rows' => $rows
       ];
       $this->view('countries/index', $data);
    }

    public function update($id = null)
    {
       //var_dump($id);exit();
       // var_dump($_SERVER);exit();

       if ($_SERVER["REQUEST_METHOD"] == "POST")
       {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          $this->countryModel->updateCountry($_POST);
          header("Location: " . URLROOT . "/countries/index");
       } else{
         $row = $this->countryModel->getSingleCountry($id);
       $data = [
          'title' => '<h1>Update landenoverzicht</h1>',
          'row' => $row
       ];
       $this->view("countries/update", $data);
       }
       
       
    }

    public function delete($id) {
       //echo $id;exit();

       $this->countryModel->deleteCountry($id);

       $data = [
          'deleteStatus' => "Het record met id = $id is verwijdert"
       ];
       $this->view("countries/delete", $data);
       header("Refresh:2; url=" . URLROOT . "/countries/index");
    }

    public function create() {
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
          //var_dump($_POST);
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

          $this->countryModel->createCountry($_POST);

          header("Location:" . URLROOT . "/countries/index");
       } else{
          
       $data = [
         'title' => "Voeg een nieuw land in"
       ];

       $this->view("countries/create", $data);
      }
    }
}