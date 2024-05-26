<?php

    class Payment{

        use Controller;
        
        public function index(){

            $payment = new Payment;
            // $reservation = new Reservation;
            $data = [];

            if (!isset($_SESSION['users']))
            {
                redirect('Login');
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                // $arr1['amount'] = $_POST['amount'];
                $arr1['paymentstatus'] = 'Paid';
                if (isset($_POST['creditsubmit'])) {
                    $arr1['paymentmethod'] = 'Credit Card';

                }else if(isset($_POST['paypalsubmit'])){
                    $arr1['paymentmethod'] = 'PayPal';
                }

                // update the status in reservation table
                // $arr2['paymentstatus'] = 'Paid'; 
                // $reservation->update(1, $arr2, 'ReservationID');

                // inserting datas in payment table
                $payment->insert($arr1);
                // echo'<script>alert("Payment Sucessful");</script>';
                redirect('login');
            }

            $this->view('payment', $data);
        }
    }
