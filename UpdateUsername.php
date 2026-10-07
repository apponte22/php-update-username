<?php
require 'db.php';
header('Content-Type: application/json');

// Decode JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Validate input
$id = $data['userId'] ?? null;
$newName = $data['newUsername'] ?? null;

if (!$id || !$newName) {
    echo json_encode([
        "status" => "error",
        "message" => "Missing required fields: userId or newUsername."
    ]);
    exit;
}

try {
    // Update user's record
    $sql = "UPDATE users SET username = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$newName, $id])) {
        echo json_encode([
            "status" => "success",
            "message" => "Username updated successfully."
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Database update failed."
        ]);
    }

} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Server error: " . $e->getMessage()
    ]);
}
