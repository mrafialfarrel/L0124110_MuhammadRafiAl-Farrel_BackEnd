<?php
include('config.php');

// Menambahkan kegiatan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task_name'])) {
    $task_name = $_POST['task_name'];
    $sql = "INSERT INTO tasks (task_name) VALUES ('$task_name')";
    if ($conn->query($sql) === TRUE) {
        echo "New task added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mengambil semua kegiatan
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>To-Do List</h1>

    <!-- Form untuk menambah kegiatan -->
    <form method="POST" action="index.php">
        <input type="text" name="task_name" placeholder="Tambah kegiatan" required>
        <button type="submit">Tambah</button>
    </form>

    <!-- Daftar kegiatan -->
    <ul>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <li>
                <?php echo $row['task_name']; ?>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
