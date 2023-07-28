<?php

namespace App\controllers;
use App\core\Controller;
use App\models\Login_model;
use App\core\View;

class Login extends Controller{ 

    public function __construct() {
        $this->model = new Login_model();
        $this->view = new View();
    }


    public function index() {

        $this->view->generate('login_view.php', 'template_view.php');

        }

    public function checkLogin() {

        $data = $_POST;

        if (!empty($data)) {

            header('Content-Type: application/json');

            $errors = $this->model->validationLoginForm($data);

            if (empty($errors)) {

                if ($this->model->login($_POST['email'])) {
                    http_response_code(201);
                    echo json_encode([
                        'success' => true
                    ]);
                    exit();
                }
        
                http_response_code(500);
                echo json_encode([
                    'success' => false
                ]);
                exit();
            }
        
            http_response_code(422);
        
            echo json_encode([
                'success' => false,
                'errors' => $errors
            ]);
        
            exit();
        }
    }

    public function logout() {

        unset($_SESSION["logged_user"]);
        header('Location: /');

        }

}


?>