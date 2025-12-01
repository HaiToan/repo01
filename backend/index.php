<?php
// Tên miền Frontend (FE) của bạn
$allowed_origin = 'https://testoss.somee.com';

// Lấy Origin từ request
$request_origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

// 1. Xử lý CORS: Chỉ cho phép tên miền FE truy cập
// Thêm cả http:// và https:// để đề phòng môi trường rf.gd không có HTTPS
if ($request_origin === 'http://testoss.somee.com' || $request_origin === $allowed_origin) {
    header("Access-Control-Allow-Origin: $request_origin");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Content-Type");
}

// 2. Định nghĩa dữ liệu sản phẩm (Dữ liệu mẫu)
$products = [
    [ 'id' => 1, 'name' => 'Sản phẩm 1', 'price' => 15000 ],
    [ 'id' => 2, 'name' => 'Sản phẩm 2', 'price' => 25000 ],
    [ 'id' => 3, 'name' => 'Sản phẩm 3', 'price' => 35000 ]
];

// 3. Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($products);
exit;

?>