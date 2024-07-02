<?php
include 'db.php';

// Chọn cơ sở dữ liệu
$conn->select_db('employee_management');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    // Sử dụng Prepared Statement
    $stmt = $conn->prepare("INSERT INTO employees (name, email, address, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $address, $phone);

    if ($stmt->execute() === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>