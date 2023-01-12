<?php
class Lessen extends Controller
{
    private $lesModel;
    public function __construct()
    {
        $this->lesModel =  $this->model('Les');
    }
    public function index()
    {
        $result = $this->lesModel->getLessons();

        if ($result) {
            $instructeurNaam = $result[0]->INNA;
        } else {
            $instructeurNaam = '';
        }

        $rows = '';
        foreach ($result as $info) {
            $d = new DateTimeImmutable($info->DatumTijd, new DateTimeZone('Europe/Amsterdam'));
            $rows .= "<tr>
           <td>{$d->format('d-m-Y')}</td>
           <td>{$d->format('H:i')}</td>
           <td>$info->LENA</td>
           <td><a href='" . URLROOT ."/lessen/lesinfo/{$info->Id}'><img src='" . URLROOT . "/img/b_help.png' alt='Lesinfo'></a></td>
           <td><a href='" . URLROOT . "/lessen/topicslesson/{$info->Id}'><img src='" . URLROOT . "/img/b_ftext.png' alt='Onderwerp'></a></td>
       </tr>";
        }
        $data = [
            'title' => "Overzicht Lessen",
            'rows' => $rows,
            'instructeurNaam' => $instructeurNaam
        ];
        $this->view('lessen/index', $data);
    }

    function topicslesson($lesId)
    {
        $result = $this->lesModel->getTopicsLesson($lesId);

        if ($result) {
            $d = new DateTimeImmutable($result[0]->DatumTijd, new DateTimeZone('Europe/Amsterdam'));
            $date = $d->format('d-m-Y');
            $time = $d->format('H:i');
        } else {
            $date = '';
            $time = '';
        }

        $rows = "";
        foreach ($result as $topic) {
            $rows .= "<tr>
                      <td>$topic->Onderwerp</td>
                     </tr>";
        }

        $data = [
            'title' => 'Onderwerpen Les',
            'rows' => $rows,
            'lesId' => $lesId,
            'date' => $date,
            'time' => $time
        ];

        $this->view('lessen/topicslesson', $data);
    }

    function addTopic($lesId = NULL)
    {
        $data = [
            'title' => 'Onderwerp Toevoegen',
            'lesId' => $lesId,
            'topicError' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => 'Onderwerp Toevoegen',
                'lesId' => $_POST['lesId'],
                'topic' => $_POST['topic'],
                'topicError' => ''
            ];

            $data = $this->validateAddTopicForm($data);
            if (empty($data['topicError'])) {
                $result = $this->lesModel->addTopic($_POST);

                if ($result) {
                    $data['title'] = "<p>Het nieuwe onderwerp is succesvol toegevoegd</p>";
                } else {
                    echo "<p>Het nieuwe onderwerp is niet toegevoegd</p>";
                }
                header('Refresh:2 url=' . URLROOT . '/lessen/index');
            } else {
                header('Refresh:2 url=' . URLROOT . '/lessen/addTopic/' . $data['lesId']);
            }
        }


        $this->view('lessen/addTopic', $data);
    }
    private function validateAddTopicForm($data)
    {
        if (strlen($data['topic']) > 255) {
            $data['topicError'] = "Het nieuwe onderwerp bevat meer dan 255 letters.";
        } elseif (empty($data['topic']))
        {
             $data['topicError'] = "U bent verplicht om de ontwerp invullen";
        }

        return $data;
    }

    private function validateAddLesInfoForm($data)
    {
        if(strlen($data['Opmerking']) > 255)
        {
             $data['opmerkingError'] = "Het nieuwe opmerking bevat meer dan 255 letters.";
        } elseif (empty($data['Opmerking'])) {
            $data['opmerkingError'] = "U bent verplicht om de opmerking invullen";
        }
        return $data;
    }

    function lesinfo($lesInfoId)
    {
        $result = $this->lesModel->getLesInfo($lesInfoId);
        if ($result) {
            $d = new DateTimeImmutable($result[0]->DatumTijd, new DateTimeZone('Europe/Amsterdam'));
            $date = $d->format('d-m-Y');
            $time = $d->format('H:i');
        } else {
            $date = '';
            $time = '';
        }

        $rows= "";
        foreach($result as $lesInfo)
        {
          $rows .= "<tr>
                  <td>$lesInfo->Opmerking</td>
                  </tr>";
        }

        $data = [
            'title'=> 'Opmerking Les',
            'rows'=> $rows,
            'date'=>$date,
            'time'=>$time,
            'lesInfoId'=>$lesInfoId
        ];
        $this->view('lessen/lesinfo', $data);
    }
    function addLesInfo($lesId = null)
    {
        $data = [
                'title'=> 'Opmerking Toevoegen',
                'lesId'=> $lesId,
                'opmerkingError'=> ''
              ];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'title' => 'Opmerking Toevoegen',
                'lesId' => $_POST['lesId'],
                'Opmerking'=> $_POST['Opmerking'],
                'opmerkingError'=> ''
            ];
            $data = $this->validateAddLesInfoForm($data);

            if(empty($data['opmerkingError']))
            {
                $result = $this->lesModel->addLesInfo($_POST);
                if($result)
                {
                   $data['title'] = "<p>Het nieuwe opmerking is succesvol toegevoegd</p>";
                } else {
                    echo "<p>Het nieuwe opmerking is niet toegevoegd</p>";
                }
                header('Refresh:2 url=' . URLROOT . '/lessen/index');
            } else {
                header('Refresh:2 url=' . URLROOT . '/lessen/addLesInfo/' . $data['lesId']);
            }
            
        } 

        $this->view('lessen/addLesInfo', $data); 
        
    }
}
