<?php
require_once 'BookTypeInterface.php';

abstract class Book implements BookTypeInterface
{
    protected $isbn;
    protected $title;
    protected $author;
    protected $year;
    protected $price;

    public function __construct($isbn, $title, $author, $year, $price)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->price = $price;
    }

    public function getISBN()
    {
        return $this->isbn;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getPrice()
    {
        return $this->price;
    }

    abstract public function buy($quantity, $email, $address);
}
