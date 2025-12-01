const express = require("express");
const app = express();
const PORT = 3000;

// Dữ liệu mẫu (giả lập database)
const tasks = [
  { id: 1, title: "Làm báo cáo", status: "Chưa hoàn thành" },
  { id: 2, title: "Học Node.js", status: "Đang làm" },
  { id: 3, title: "Nộp đồ án", status: "Hoàn thành" },
];

// Cho phép Frontend gọi API
app.use((req, res, next) => {
  res.setHeader("Access-Control-Allow-Origin", "*");
  next();
});

// API lấy danh sách công việc
app.get("/api/tasks", (req, res) => {
  res.json(tasks);
});

// Chạy server
app.listen(PORT, () => {
  console.log(`Server đang chạy tại http://localhost:${PORT}`);
});
