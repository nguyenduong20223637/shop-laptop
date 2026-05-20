<?php
// Kiểm tra authentication
session_start();

header('Content-Type: application/json');

echo json_encode([
    'session_data' => $_SESSION ?? [],
    'cookies' => $_COOKIE ?? [],
    'message' => 'Check session và cookies'
], JSON_PRETTY_PRINT);
