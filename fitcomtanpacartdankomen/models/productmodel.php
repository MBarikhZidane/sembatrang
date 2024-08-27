<?php
require_once 'config/database.php';

$conn = connectDatabase();
$sql = "SELECT id, namaproduk, gambarproduk, jumlahterjual, rating, hargaproduk, sisastok, category, kondisi, asalpengiriman, buatan, garansi, deskripsiproduk FROM products";
$products = $conn->query($sql);



function getAllProducts($conn) {
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function getProductById($conn, $id) {
    // Query untuk mendapatkan produk berdasarkan ID
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch data produk
    $product = $result->fetch_assoc();

    // Tutup koneksi
    $stmt->close();

    return $product; 
}
function getFilteredProducts($conn, $minHarga, $maxHarga, $rangeStok, $ratingOrder) {
    $sql = "SELECT id, namaproduk, gambarproduk, jumlahterjual, rating, hargaproduk, sisastok, category, kondisi, asalpengiriman, buatan, garansi, deskripsiproduk FROM products WHERE 1=1";

    if (!empty($minHarga)) {
        $sql .= " AND hargaproduk >= " . intval($minHarga);
    }

    if (!empty($maxHarga)) {
        $sql .= " AND hargaproduk <= " . intval($maxHarga);
    }

    if (!empty($rangeStok)) {
        $sql .= " AND sisastok <= " . intval($rangeStok);
    }

    if (!empty($ratingOrder)) {
        if ($ratingOrder == 'highest') {
            $sql .= " ORDER BY rating DESC";
        } else if ($ratingOrder == 'lowest') {
            $sql .= " ORDER BY rating ASC";
        }
    }

    return $conn->query($sql);
}

// Check if it's an AJAX request
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['minHarga'])) {
    $minHarga = $_GET['minHarga'];
    $maxHarga = $_GET['maxHarga'];
    $rangeStok = $_GET['rangeStok'];
    $ratingOrder = $_GET['ratingOrder'];

    $filteredProducts = getFilteredProducts($conn, $minHarga, $maxHarga, $rangeStok, $ratingOrder);

    ob_start(); // Start output buffering
    require 'displayproduk.php';
    $output = ob_get_clean(); // Get output and clean buffer

    echo $output; // Output the filtered products HTML
    exit;
}
function getProductsByCategory($conn, $category) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function searchProducts($conn, $search) {
    $search = '%' . $conn->real_escape_string($search) . '%'; // Menghindari SQL injection dan menambahkan wildcard untuk LIKE
    $stmt = $conn->prepare("SELECT * FROM products WHERE namaproduk LIKE ?");
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function searchProductsByKeyword($conn, $keyword) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE namaproduk LIKE ?");
    $likeKeyword = "%" . $keyword . "%";
    $stmt->bind_param("s", $likeKeyword);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

?>
