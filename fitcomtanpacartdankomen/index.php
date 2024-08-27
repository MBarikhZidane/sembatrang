<?php
include_once 'controller/productcontroller.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        // Menampilkan detail produk
        $id = $_GET['id'];
        showProductDetail($id);
    } elseif (isset($_GET['category'])) {
        // Menampilkan produk berdasarkan kategori
        $category = $_GET['category'];
        showProductsByCategory($category);
    } elseif (isset($_GET['minHarga'])) {
        // Penanganan filter berdasarkan harga
        $minHarga = $_GET['minHarga'];
        $maxHarga = $_GET['maxHarga'];
        $rangeStok = $_GET['rangeStok'];
        $ratingOrder = $_GET['ratingOrder'];

        $filteredProducts = getFilteredProducts($conn, $minHarga, $maxHarga, $rangeStok, $ratingOrder);

        require 'displayproduk.php';
        exit;
    } elseif (isset($_GET['search'])) {
        // Penanganan pencarian produk
        $keyword = $_GET['search'];
        $products = searchProductsByKeyword($conn, $keyword); // Fungsi pencarian produk
        require 'displayproduk.php'; // Hanya load tampilan produk
        exit;
    } elseif (isset($_GET['allProducts'])) {
        // Tampilkan semua produk
        $products = getAllProducts($conn); // Fungsi untuk mengambil semua produk
        require 'displayproduk.php'; // Load tampilan produk
        exit;
    } else {
        require "halamanutama.php";
    }
} else {
    require "halamanutama.php";
}
?>
