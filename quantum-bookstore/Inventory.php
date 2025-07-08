<?php

require_once 'PaperBook.php';
require_once 'EBook.php';
require_once 'ShowcaseBook.php';

class Inventory
{
    private $catalog = [];

    public function add(Book $book)
    {
        $this->catalog[$book->getISBN()] = $book;
    }

    public function removeOldBooks($maxAge)
    {
        $yearNow = date("Y");
        $removed = [];

        foreach ($this->catalog as $isbn => $book) {
            if (($yearNow - $book->getYear()) > $maxAge) {
                unset($this->catalog[$isbn]);
                $removed[] = $isbn;
            }
        }

        return $removed;
    }

    public function buy($isbn, $quantity, $email, $address)
    {
        if (!isset($this->catalog[$isbn])) {
            throw new Exception("Quantum book store: Book with ISBN $isbn not found.");
        }

        return $this->catalog[$isbn]->buy($quantity, $email, $address);
    }

    public function allBooks()
    {
        return $this->catalog;
    }
}
