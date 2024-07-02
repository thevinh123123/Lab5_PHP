<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ids'])) {
        // Xóa một nhân viên
        $id = $_POST['ids'];
        $sql = "DELETE FROM employees WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            echo 'success';
        } else {
            echo 'error';
        }
    } elseif (isset($_POST['id'])) {
        // Xóa nhiều nhân viên
        $ids = $_POST['ids'];
        $ids = implode(',', $id);
        $sql = "DELETE FROM employees WHERE ids IN ($id)";
        
        if ($conn->query($sql) === TRUE) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

$conn->close();
?>
