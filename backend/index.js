const express = require("express");
const app = express();

// Somee dùng IIS + Node nên thường không dùng PORT 3000
const PORT = process.env.PORT || 80;

// Dữ liệu mẫu test
const products = [
  { id: 1, name: "Sản phẩm 1", price: 15000 },
  { id: 2, name: "Sản phẩm 2", price: 25000 },
  { id: 3, name: "Sản phẩm 3", price: 35000 }
];

// Fix CORS cho frontend testoss.somee.com
app.use((req, res, next) => {
  res.setHeader("Access-Control-Allow-Origin", "*");
  res.setHeader("Access-Control-Allow-Methods", "GET");
  res.setHeader("Access-Control-Allow-Headers", "Content-Type");
  next();
});

// API
app.get("/api/products", (req, res) => {
  res.json(products);
});

// Start server
app.listen(PORT, () => {
  console.log("Backend running at port " + PORT);
});
