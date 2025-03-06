<?php

function addToCart(PDO $pdo, $productId, $quantity, $sessionId) { // Receive PDO object and session ID
    // Check if product already exists in cart for this session
    $stmt = $pdo->prepare("SELECT * FROM cart_items WHERE session_id = ? AND product_id = ?");
    $stmt->execute([$sessionId, $productId]);
    $existingCartItem = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingCartItem) {
        // If product exists, update the quantity
        $newQuantity = $existingCartItem['quantity'] + $quantity;
        $updateStmt = $pdo->prepare("UPDATE cart_items SET quantity = ? WHERE id = ?");
        $updateStmt->execute([$newQuantity, $existingCartItem['id']]);
    } else {
        // If product does not exist, add it to cart
        $insertStmt = $pdo->prepare("INSERT INTO cart_items (session_id, product_id, quantity) VALUES (?, ?, ?)");
        $insertStmt->execute([$sessionId, $productId, $quantity]);
    }

    header('Location: index.php?page=cart'); // Redirect to cart page
    exit();
}


function viewCart(PDO $pdo, $sessionId) { // Receive PDO object and session ID
    $stmt = $pdo->prepare("
        SELECT cart_items.quantity, products.*
        FROM cart_items
        INNER JOIN products ON cart_items.product_id = products.id
        WHERE cart_items.session_id = ?
    ");
    $stmt->execute([$sessionId]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $cartSubtotal = 0;
    foreach ($cartItems as $item) {
        $cartSubtotal += $item['price'] * $item['quantity'];
    }

    include 'views/cart.php';
}


function updateCartQuantity(PDO $pdo, $quantities, $sessionId) { // Receive PDO object and session ID
    foreach ($quantities as $productId => $quantity) {
        if ($quantity > 0) {
            $updateStmt = $pdo->prepare("UPDATE cart_items SET quantity = ? WHERE session_id = ? AND product_id = ?");
            $updateStmt->execute([$quantity, $sessionId, $productId]);
        } else {
            // If quantity is zero or less, remove item from cart
            removeCartItem($pdo, $productId, $sessionId);
        }
    }
    header('Location: index.php?page=cart');
    exit();
}


function removeCartItem(PDO $pdo, $productId, $sessionId) { // Receive PDO object and session ID
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE session_id = ? AND product_id = ?");
    $stmt->execute([$sessionId, $productId]);
    header('Location: index.php?page=cart');
    exit();
}

function clearCart(PDO $pdo, $sessionId) { // Receive PDO object and session ID
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE session_id = ?");
    $stmt->execute([$sessionId]);
    header('Location: index.php?page=cart');
    exit();
}


function viewCheckout(PDO $pdo, $sessionId) { // Receive PDO object and session ID
    $stmt = $pdo->prepare("
        SELECT cart_items.quantity, products.*
        FROM cart_items
        INNER JOIN products ON cart_items.product_id = products.id
        WHERE cart_items.session_id = ?
    ");
    $stmt->execute([$sessionId]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $cartSubtotal = 0;
    foreach ($cartItems as $item) {
        $cartSubtotal += $item['price'] * $item['quantity'];
    }

    include 'views/checkout.php';
}


function processCheckout(PDO $pdo, $customerData, $sessionId) { // Receive PDO object and session ID
    // Here you can add code to process payment and save order to database if needed
    // ...

    // After successful payment processing (for now, we assume success)
    clearCart($pdo, $sessionId); // Clear the cart after checkout

    // You can add code here to save order and customer information to database tables if desired
    // ...

    header('Location: index.php?page=order_confirmation'); // Redirect to order confirmation page
    exit();
}

function viewOrderConfirmation($orderId) {
    include 'views/order_confirmation.php';
}