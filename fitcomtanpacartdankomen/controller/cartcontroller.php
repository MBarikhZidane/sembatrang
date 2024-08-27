<?php
include_once 'models/cartmodel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add' && isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];
        $result = addToCart($productId);

        if ($result) {
            $response = ['success' => true, 'cart_count' => getCartItemCount()];
        } else {
            $response = ['success' => false];
        }

        echo json_encode($response);
    }
}

?>