<?php
interface PaymentHandler
{
    public function setNext(PaymentHandler $handler): PaymentHandler;
    public function handle(float $amount): bool;
}

class MainAccountHandler implements PaymentHandler
{
    private ?PaymentHandler $nextHandler = null;

    public function setNext(PaymentHandler $handler): PaymentHandler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(float $amount): bool
    {
        $mainAccountBalance = 15;

        if ($amount <= $mainAccountBalance) {
            echo "Payment processed from the main account.";
            return true;
        }

        if ($this->nextHandler) {
            return $this->nextHandler->handle($amount);
        }

        echo "Payment declined due to insufficient funds.";
        return false;
    }
}

class CreditCardHandler implements PaymentHandler
{
    private ?PaymentHandler $nextHandler = null;

    public function setNext(PaymentHandler $handler): PaymentHandler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(float $amount): bool
    {
        $creditCardBalance = 1000;

        if ($amount <= $creditCardBalance) {
            echo "Payment processed from the credit card.";
            return true;
        }

        if ($this->nextHandler) {
            return $this->nextHandler->handle($amount);
        }

        echo "Payment declined due to insufficient funds.";
        return false;
    }
}

$mainAccountHandler = new MainAccountHandler();
$creditCardHandler = new CreditCardHandler();

$mainAccountHandler->setNext($creditCardHandler);

$paymentAmount = 100.0;
$mainAccountHandler->handle($paymentAmount);

?>