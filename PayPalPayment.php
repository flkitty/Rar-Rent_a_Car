<?php
require_once 'PaymentStrategy.php';

class PayPalPayment implements PaymentStrategy {
    private $email;
    
    public function __construct($email) {
        $this->email = $email;
    }

    public function pay($amount) {
        echo "Paid $$amount using PayPal with email: " . $this->email;
    }
}
?>