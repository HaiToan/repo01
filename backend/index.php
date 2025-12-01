<?php
// --- THAY THẾ TOÀN BỘ CODE PHP HIỆN TẠI BẰNG ĐOẠN NÀY ---

// Tên miền Frontend (FE) được phép
$allowed_origins = [
    'https://testoss.somee.com',
    'http://testoss.somee.com' // Thêm HTTP để đề phòng
];

// Lấy Origin từ request
$request_origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

// 1. Kiểm tra nếu origin request nằm trong danh sách cho phép
if (in_array($request_origin, $allowed_origins)) {
    // Nếu khớp, gửi header cho phép truy cập TRỞ LẠI chính origin đó
    header("Access-Control-Allow-Origin: $request_origin");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Content-Type");
}

// 2. Định nghĩa dữ liệu sản phẩm (Giữ nguyên)
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