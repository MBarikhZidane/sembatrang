<?php
require_once 'models/productmodel.php';

function showProductDetail($id) {
    global $conn; // Mengambil variabel koneksi dari scope global

    // Ambil data produk dari model
    $product = getProductById($conn, $id);

    // Jika produk ditemukan, arahkan ke view
    if ($product) {
        require 'detailProduct.php';
    } else {
        echo "Produk tidak ditemukan!";
    }
}
function showAllProducts() {
    global $conn; // Mengambil variabel koneksi dari scope global
    require_once 'models/productmodel.php';
    $products = getAllProducts($conn);
    
    if ($products) {
        require 'displayproduk.php';
    }
}
function showProductsByCategory($category) {
    global $conn;
    require_once 'models/productmodel.php';
    $products = getProductsByCategory($conn, $category);
    
    if ($products) {
        require 'displayproduk.php';
    }
}
function showProductsBySearch($search) {
    global $conn;
    require_once 'models/productmodel.php';
    $products = searchProducts($conn, $search);
    
    if ($products) {
        require 'displayproduk.php';
    }
}

?> 