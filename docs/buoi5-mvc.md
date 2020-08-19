# Buổi 3 - MVC trong Laravel

Nội dung buổi học:
- Nhắc lại khái niệm MVC
- MVC trong Laravel:
    - Router
    - Controller
    - Model
    - View
- Route trong Laravel.

## 1. Mô hình MVC
- MVC: Model - View - Controller: chỉ là thư mục?
- Trong mô hình cũ (trước khi có MVC), toàn bộ code sẽ được triển khai ở 1 nơi: trong cùng 1 file, 1 function.

Trong cùng 1 function: vừa thực hiện kiểm tra request, vừa thực hiện truy vấn, lại vừa tạo, hiển thị kết quả.

Giống như 1 ngôi nhà chỉ xây 1 tầng vừa nấu nướng, ăn uống, ngủ nghỉ, để xe. -> lộn xộn, khó quản lí, khó thêm người vào.

-> khó quản lí, thay đổi, update, mở rộng
-> Code smell

- Giải pháp: Tách riêng ra từng tầng xử lí:
    - 1 tầng riêng để xử lí logic.
    - 1 tầng riêng để truy vấn dữ liệu.
    - 1 tầng riêng để hiển thị dữ liệu.

=> ra đời mô hình MVC.
Mô hình MVC ko chỉ là tách riêng folder, mà là mô hình chia tầng để xử lí request 1 cách hiệu quả.

## 2. MVC trong Laravel.

- Gồm 4 thành phần:
    - Route             routes/web.php
    - Controller        app/Http/Controllers
    - Model             app/
    - View              resoureces/view

- Flow hoạt động của MVC trong Laravel.
- Tạo folder **Models** trong thư mục app.

## 3. Route trong Laravel

- Tạo basic route với closure & trả về view.
- Đặt tên cho route
- Truyền params vào route
- Liệt kê các route trong project
```
php artisan route:list
```

## 4. Git <tiếp>

- Đẩy code lên Git
- Tạo PR

## Yêu cầu về nhà
- Tải AdminLTE
