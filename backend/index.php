<?php
// Thiết lập header để thông báo rằng phản hồi là JSON
header('Content-Type: application/json');

// Khai báo mảng dữ liệu phản hồi
$response = [
    'service' => 'Backend API (PHP)',
    'status' => 'SUCCESS', // Đổi từ 'OK' thành 'SUCCESS' để rõ ràng hơn
    'code' => 200, // Mã HTTP thành công
    'timestamp' => date('Y-m-d H:i:s'),
    'message' => '🎉 Dịch vụ API Backend PHP đã được triển khai và chạy thành công trên Somee! 🎉'
];

// Chuyển mảng PHP thành chuỗi JSON và in ra
echo json_encode($response);
?>