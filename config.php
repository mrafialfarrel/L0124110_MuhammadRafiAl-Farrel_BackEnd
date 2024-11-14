<?php
$servername = "localhost";
$username = "root"; // Default username untuk XAMPP
$password = ""; // Default password untuk XAMPP
$dbname = "todo_list";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
