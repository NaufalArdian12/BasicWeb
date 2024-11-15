<?php
header('Content-Type: application/json');

// Ensure CSRF Token is set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a new token if not set
}

// Retrieve request headers
$headers = apache_request_headers();

// Check if CSRF token is provided in the headers
if (isset($headers['csrf_token'])) {
    // Validate the provided CSRF token
    if ($headers['csrf_token'] !== $_SESSION['csrf_token']) {
        exit(json_encode(['error' => 'Wrong CSRF token.'])); // Invalid token
    }
} else {
    exit(json_encode(['error' => 'No CSRF token.'])); // No token provided
}
?>
