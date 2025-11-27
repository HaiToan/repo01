// 1. Nhập module 'http' để tạo máy chủ (server)
const http = require('http');

// 2. Định nghĩa cổng (port) mà server sẽ lắng nghe
const port = process.env.PORT || 3000; // Heroku thường sử dụng biến môi trường PORT

// 3. Khai báo mảng dữ liệu phản hồi (JSON object)
const responseData = {
    service: 'Backend API (Node.js)',
    status: 'SUCCESS',
    code: 200, // Mã HTTP thành công
    timestamp: new Date().toISOString().slice(0, 19).replace('T', ' '), // Định dạng Y-m-d H:i:s
    message: 'Dịch vụ API Backend Node.js đã được triển khai và chạy thành công!'
};

// 4. Chuyển đối tượng JavaScript thành chuỗi JSON
const jsonResponse = JSON.stringify(responseData);

// 5. Tạo máy chủ HTTP
const server = http.createServer((req, res) => {
    // 6. Thiết lập Header để thông báo phản hồi là JSON
    res.setHeader('Content-Type', 'application/json');
    
    // 7. Thiết lập mã trạng thái HTTP (200 OK)
    res.statusCode = 200;

    // 8. Gửi phản hồi JSON và kết thúc request
    res.end(jsonResponse);
});

// 9. Lắng nghe yêu cầu trên cổng đã định nghĩa
server.listen(port, () => {
    console.log(`Server Node.js đang chạy tại cổng: ${port}`);
});