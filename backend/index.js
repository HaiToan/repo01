// Bước 1: Import các thư viện cần thiết
const express = require("express");
const cors = require("cors"); 
const app = express();

// Bước 2: Thiết lập CORS (BẮT BUỘC)
// Chỉ cho phép tên miền Frontend truy cập API này
app.use(cors({
    origin: 'https://testoss.somee.com' // Đảm bảo sử dụng tên miền FE chính xác
}));

// Bước 3: Định nghĩa Port (Sử dụng biến môi trường của Somee/IIS)
const PORT = process.env.PORT || 80;

// Bước 4: Dữ liệu mẫu test
const products = [
    { id: 1, name: "Sản phẩm 1", price: 15000 },
    { id: 2, name: "Sản phẩm 2", price: 25000 },
    { id: 3, name: "Sản phẩm 3", price: 35000 }
];

// Bước 5: Định nghĩa API Endpoint
app.get("/api/products", (req, res) => {
    // Trả về dữ liệu JSON
    res.json(products);
});

// Bước 6: Khởi động Server
app.listen(PORT, () => {
    console.log(`Backend running at port ${PORT}`);
});