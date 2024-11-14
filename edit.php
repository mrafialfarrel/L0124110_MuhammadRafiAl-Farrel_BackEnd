<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task_name'])) {
    $task_name = $_POST['task_name'];
    $task_id = $_POST['task_id'];
    
    $sql = "UPDATE tasks SET task_name = '$task_name' WHERE id = $task_id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php'); // Redirect ke halaman utama
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $task_id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $task_id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
        <input type="text" name="task_name" value="<?php echo $task['task_name']; ?>" required>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Back to To-Do List</a>
</body>
</html>

<?php
$conn->close();
?>
