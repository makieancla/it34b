<?php

require_once(__DIR__ . '/../config/config.php');

$user_id = $_SESSION['user_id'] ?? null;
$user_email = $_SESSION['user_email'] ?? null;

$success = logActivity(
    $pdo,
    $user_id,
    $user_email,
    'test_activity',
    'success'
);

if ($success) {
    echo "Activity log inserted successfully.";
} else {
    echo "Failed to insert activity log.";
}

?>