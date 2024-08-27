<?php
include_once 'config/database.php'; // Koneksi ke database

function addToCart($productId) {
    global $conn;

    // Asumsikan user_id sebagai identifier sementara (dalam praktik nyata, ambil dari sesi login)
    $userId = 1;

    // Periksa apakah produk sudah ada di keranjang
    $query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika sudah ada, tambahkan jumlahnya
        $query = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
    } else {
        // Jika belum ada, tambahkan produk baru ke keranjang
        $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userId, $productId);
    return $stmt->execute();
}

function getCartItemCount() {
    global $conn;

    // Asumsikan user_id sebagai identifier sementara (dalam praktik nyata, ambil dari sesi login)
    $userId = 1;

    // Hitung jumlah item di keranjang
    $query = "SELECT SUM(quantity) AS total_items FROM cart WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['total_items'] ? $row['total_items'] : 0;
}
?>
