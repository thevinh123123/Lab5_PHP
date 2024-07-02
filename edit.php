<?php
include 'db.php';

// Chọn cơ sở dữ liệu
$conn->select_db('employee_management');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    // Sử dụng Prepared Statement
    $stmt = $conn->prepare("UPDATE employees SET name = ?, email = ?, address = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $name, $email, $address, $phone, $id);

    if ($stmt->execute() === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>