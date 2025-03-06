<?php
session_start();

require_once 'config.php'; // Include database connection configuration
require_once 'controllers/products_controller.php';
require_once 'controllers/cart_controller.php';

$page = $_GET['page'] ?? 'products';

switch ($page) {
    case 'products':
        listProducts($pdo); // Pass PDO object to listProducts function
        break;
    case 'add_to_cart':
        addToCart($pdo, $_GET['product_id'], $_GET['quantity'], session_id()); // Pass PDO object and session ID
        break;
    case 'cart':
        viewCart($pdo, session_id()); // Pass PDO object and session ID
        break;
    case 'update_cart_quantity':
        updateCartQuantity($pdo, $_POST['quantities'], session_id()); // Pass PDO object and session ID
        break;
    case 'remove_cart_item':
        removeCartItem($pdo, $_GET['product_id'], session_id()); // Pass PDO object and session ID
        break;
    case 'clear_cart':
        clearCart($pdo, session_id()); // Pass PDO object and session ID
        break;
    case 'checkout':
        viewCheckout($pdo, session_id()); // Pass PDO object and session ID
        break;
    case 'process_checkout':
        processCheckout($pdo, $_POST, session_id()); // Pass PDO object and session ID
        break;
    case 'order_confirmation':
        viewOrderConfirmation($_GET['order_id'] ?? null); // Pass order ID or null if not available
        break;
    default:
        listProducts($pdo); // Pass PDO object to listProducts function for default case
        break;
}

?>