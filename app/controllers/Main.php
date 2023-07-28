<?php

namespace App\controllers;
use App\core\Controller;
use App\models\Main_model;
use App\core\View;


class Main extends Controller{ 


    public function __construct() {
        $this->model = new Main_model();
        $this->view = new View();
    }

    public function index() {

        if (!isset($_SESSION['logged_user'])) {

            $this->view->generate('main_view.php', 'template_view.php'); 

        } else {

            $this->view->generate('main_view_auth.php', 'template_view.php'); 
        }
    }

    public function upload() {

        if (!isset($_FILES['file'])) {
            $data = 'Файлы не загружены';
        } else {
            $data = $this->model->uploadImages();
        }

            header('Content-Type: application/json');
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            exit();

    }
                

     public function about() {

        $this->view->generate('about_view.php', 'template_view.php'); 
            
        }
    public function contacts() {

        $this->view->generate('contacts_view.php', 'template_view.php'); 
                
        }

    public function news() {

        $this->view->generate('news_view.php', 'template_view.php'); 
                    
        }

}

?>