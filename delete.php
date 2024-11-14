<?php
include('config.php');

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    
    $sql = "DELETE FROM tasks WHERE id = $task_id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php'); // Redirect ke halaman utama
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
