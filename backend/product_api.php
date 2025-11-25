<?php
// Cấu hình CORS (RẤT QUAN TRỌNG)
// 1. Cho phép tất cả các domain truy cập (vì đang test)
header("Access-Control-Allow-Origin: *");
// 2. Cho phép các phương thức được dùng
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
// 3. Cho phép các header tùy chỉnh (như Content-Type)
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// 4. Định dạng trả về
header("Content-Type: application/json; charset=UTF-8");

// Xử lý yêu cầu kiểm tra (Preflight Request)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit(); // Kết thúc ở đây, không xử lý POST
}

// ----------------------------------------------------
// BẮT ĐẦU XỬ LÝ POST
// ----------------------------------------------------

// Nhận dữ liệu JSON từ Frontend
$data = json_decode(file_get_contents("php://input"));

// Kiểm tra phương thức
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(array("status" => "error", "message" => "Chỉ chấp nhận phương thức POST."));
    exit();
}

if (!isset($data->name) || !isset($data->price) || !is_numeric($data->price)) {
    http_response_code(400);
    echo json_encode(array("status" => "error", "message" => "Dữ liệu không hợp lệ (Thiếu tên hoặc giá)."));
    exit();
}

// Xử lý dữ liệu quản lý (Mô phỏng lưu vào Database)
$product_name = trim($data->name);
$product_price = (float)$data->price;

// Trả về kết quả thành công
http_response_code(200);
echo json_encode(array(
    "status" => "success",
    "message" => "Đã nhận dữ liệu quản lý sản phẩm thành công.",
    "data" => array(
        "product_name" => $product_name,
        "product_price" => $product_price
    )
));

?>