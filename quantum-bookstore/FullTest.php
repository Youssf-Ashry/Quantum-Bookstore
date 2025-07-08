<?php
require_once 'Inventory.php';

$store = new Inventory();

$store->add(new PaperBook("PB001", "Mastering PHP", "Ahmed Salah", 2019, 120, 15));
$store->add(new EBook("EB001", "Laravel Tips", "Sara Kamal", 2022, 65, "pdf"));
$store->add(new ShowcaseBook("SB001", "Quantum Legends", "Nabil Qader", 2008, 0));

try {
    $total = $store->buy("PB001", 3, "buyer@example.com", "15 Tahrir St");
    echo "Quantum book store: Total paid: $total EGP<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

try {
    $total = $store->buy("EB001", 1, "reader@example.com", "");
    echo "Quantum book store: Total paid: $total EGP<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

try {
    $store->buy("SB001", 1, "", "");
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

$removedBooks = $store->removeOldBooks(10);
if (!empty($removedBooks)) {
    echo "Quantum book store: Removed outdated books: " . implode(", ", $removedBooks) . "<br>";
}
