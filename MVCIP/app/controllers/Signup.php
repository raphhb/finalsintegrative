<?php

    class Signup{

        use Controller;
        
        public function index(){

            $users = new Users;
            $data = [];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $arr['fname'] = $_POST['fname'];
                $arr['lname'] = $_POST['lname'];
                $arr['email'] = $_POST['remail'];
                $arr['phone'] = $_POST['rmobile'];
                $arr['password'] = $_POST['rpassword'];

                $users->insert($arr);

                redirect('login');

            }

            $this->view('signup', $data);
        }
    }
