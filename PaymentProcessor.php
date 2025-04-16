<?php
require_once 'PaymentStrategy.php';

class PaymentProcessor {
    private $paymentStrategy;

    public function __construct(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function processPayment($amount) {
        $this->paymentStrategy->pay($amount);
    }
}
?>