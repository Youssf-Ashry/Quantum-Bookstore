<?php
require_once 'Book.php';

class ShowcaseBook extends Book
{
    public function buy($quantity, $email, $address)
    {
        throw new Exception("Quantum book store: Showcase book is not available for sale.");
    }

    public function deliver($email, $address) {}
}
