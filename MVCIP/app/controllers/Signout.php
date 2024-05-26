<?php

    class Signout{

        use Controller;
        
        public function index(){

            if (!isset($_SESSION['users']))
            {
                return Redirect("login");
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                unset($_SESSION['users']);
                redirect('login');
            }

            $this->view('signout');
        }
    }
