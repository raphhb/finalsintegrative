<?php

    class Login{

        use Controller;
        
        public function index(){

            $users = new User;
            $data = [];

            if (isset($_SESSION['users'])) {
                redirect('Movie');
            }
            //else if(isset($_SESSION['admin'])){
            //     redirect('pay');
            // }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $arr['email'] = $_POST['email'];
                $row = $users->first($arr);

                    if($row){

                        if($row->password === $_POST['password']){
                            if(($row->role == 'admin')||($row->role == 'Admin')){
                                $_SESSION['admin'] = $row;  
                                redirect('admindashboard');
                            }else{
                            $_SESSION['users'] = $row;
                            redirect('movie');
                            }
                        }else{
                            $users->errors['password'] = "Incorrect password";
                        }
                    }else{
                    $users->errors['email'] = "Account doesn't exist";
                    }

                $data['errors'] = $users->errors;
            }

            $this->view('login', $data);
        }
    }
