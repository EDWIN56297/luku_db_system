<?php
// process.php - Secure Server-Side Processor Configuration
header('Content-Type: application/json');
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitization & Validation (Lecture 4 Frameworks)
    $meter_number = isset($_POST['meter_number']) ? htmlspecialchars(trim($_POST['meter_number'])) : '';
    $amount = isset($_POST['amount']) ? doubleval($_POST['amount']) : 0.0;
    $mobile_network = isset($_POST['mobile_network']) ? htmlspecialchars(trim($_POST['mobile_network'])) : '';
    $phone_number = isset($_POST['phone_number']) ? htmlspecialchars(trim($_POST['phone_number'])) : '';

    if ($meter_number === "" || $amount < 1000 || $mobile_network === "" || $phone_number === "") {
        echo json_encode(["status" => "error", "message" => "Server-side processing validation failed."]);
        exit;
    }

    // Kuchakata LUKU Token tarakimu 20 bila mtumiaji kuingiza Token ID yenyewe
    $generated_token = rand(1000, 9999) . "-" . rand(1000, 9999) . "-" . rand(1000, 9999) . "-" . rand(1000, 9999);

    // Prepared Statement Execution (Mitigating SQL Injection - Lecture 4)
    $sql = "INSERT INTO token_purchases (meter_number, amount, mobile_network, phone_number, generated_token) VALUES (?, ?, ?, ?, ?)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$meter_number, $amount, $mobile_network, $phone_number, $generated_token]);

        echo json_encode([
            "status" => "success",
            "message" => "Payment successful via " . $mobile_network . "!",
            "token" => $generated_token
        ]);
        exit;
    } catch (\PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Database statement commitment failed."]);
        exit;
    }
} else {
    echo json_encode(["status" => "error", "message" => "Bad Request Method."]);
    exit;
}
?>