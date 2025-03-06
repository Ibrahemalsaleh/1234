<?php

function listProducts(PDO $pdo) { // Receive PDO object as parameter
    $stmt = $pdo->query("SELECT * FROM products");
    $productsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    include 'views/products.php';
}

?>