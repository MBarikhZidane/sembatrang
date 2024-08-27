<?php

function connectDatabase() {
    $servername = "localhost";  // Sesuaikan dengan konfigurasi server Anda
    $username = "root";         // Sesuaikan dengan username database Anda
    $password = "";             // Sesuaikan dengan password database Anda
    $dbname = "skamart";        // Sesuaikan dengan nama database Anda

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>