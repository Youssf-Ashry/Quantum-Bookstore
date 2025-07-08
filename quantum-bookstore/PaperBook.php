<?php
require_once 'Book.php';

class PaperBook extends Book
{
    private $quantity;

    public function __construct($isbn, $title, $author, $year, $price, $quantity)
    {
        parent::__construct($isbn, $title, $author, $year, $price);
        $this->quantity = $quantity;
    }

    public function buy($quantity, $email, $address)
    {
        if ($quantity > $this->quantity) {
            throw new Exception("Quantum book store: Not enough copies in stock.");
        }

        $this->quantity -= $quantity;
        $this->deliver($email, $address);

        return $this->price * $quantity;
    }

    public function deliver($email, $address)
    {
        echo "Quantum book store: Paper book shipped to $address<br>";
    }
}
