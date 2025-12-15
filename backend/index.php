<?php
// --- CODE PHP ĐÃ SỬA LỖI CORS ---

// Luôn cho phép truy cập từ tên miền frontend của bạn
header("Access-Control-Allow-Origin: http://testoss.somee.com");

// Các phương thức (methods) cho phép
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Các header cho phép
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Trình duyệt có thể gửi một request "OPTIONS" trước. 
// Nếu là request OPTIONS, ta chỉ cần trả về các header ở trên và thoát.
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// ---- Dữ liệu sản phẩm (Giữ nguyên) ----
$products = [
    [ 'id' => 1, 'name' => 'Sản phẩm 1', 'price' => 15000 ],
    [ 'id' => 2, 'name' => 'Sản phẩm 2', 'price' => 25000 ],
    [ 'id' => 3, 'name' => 'Sản phẩm 3', 'price' => 35000 ]
];

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($products);
exit;

?>
