<?php
/**
 * Septix Technologies - AJAX Contact Form Handler
 */

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
    exit;
}

// Retrieve and sanitize input fields
$name    = isset($_POST['name']) ? trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS)) : '';
$email   = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
$phone   = isset($_POST['phone']) ? trim(filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS)) : '';
$company = isset($_POST['company']) ? trim(filter_var($_POST['company'], FILTER_SANITIZE_SPECIAL_CHARS)) : '';
$service = isset($_POST['service']) ? trim(filter_var($_POST['service'], FILTER_SANITIZE_SPECIAL_CHARS)) : '';
$message = isset($_POST['message']) ? trim(filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS)) : '';

// Validation
if (empty($name) || empty($email) || empty($service) || empty($message)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please fill in all required fields (Name, Email, Service, and Message).'
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid email address.'
    ]);
    exit;
}

// Format Inquiry Payload / Storage (In production, mail() or SMTP/database insertion is executed)
$inquiry_record = [
    'timestamp' => date('Y-m-d H:i:s'),
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'company' => $company,
    'service' => $service,
    'message' => $message
];

// Return clean success response
echo json_encode([
    'success' => true,
    'message' => "Thank you, {$name}! Your project inquiry has been received. A Septix Technologies tech consultant will get back to you shortly."
]);
exit;
?>
