<?php
header('Content-Type: application/json');
$response = [
    'service' => 'Backend API (PHP)',
    'status' => 'OK',
    'timestamp' => date('Y-m-d H:i:s'),
    'message' => 'Dịch vụ Backend đã được triển khai thành công!'
];

echo json_encode($response);
?>