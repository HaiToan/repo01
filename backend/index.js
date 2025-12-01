const express = require("express");
const cors = require("cors"); // Thêm thư viện cors
const app = express();

const PORT = process.env.PORT || 80;

// Dữ liệu mẫu test
const products = [
  { id: 1, name: "Sản phẩm 1", price: 15000 },
  { id: 2, name: "Sản phẩm 2", price: 25000 },
  { id: 3, name: "Sản phẩm 3", price: 35000 }
];

// Thay thế CORS thủ công bằng thư viện chuẩn, chỉ cho phép FE
app.use(cors({
    origin: 'https://testoss.somee.com' // Chỉ cho phép tên miền FE của bạn
}));

// API
app.get("/api/products", (req, res) => {
  res.json(products);
});

// Start server
app.listen(PORT, () => {
  console.log("Backend running at port " + PORT);
});