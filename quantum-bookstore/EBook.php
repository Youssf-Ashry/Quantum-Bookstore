<?php
require_once 'Book.php';

class EBook extends Book
{
    private $fileType;

    public function __construct($isbn, $title, $author, $year, $price, $fileType)
    {
        parent::__construct($isbn, $title, $author, $year, $price);
        $this->fileType = $fileType;
    }

    public function buy($quantity, $email, $address)
    {
        if ($quantity > 1) {
            throw new Exception("Quantum book store: Only one copy of EBook can be purchased per transaction.");
        }

        $this->deliver($email, $address);
        return $this->price;
    }

    public function deliver($email, $address)
    {
        echo "Quantum book store: EBook sent to $email<br>";
    }
}
