# Bài 1: Tổng quan Laravel

- Nhắc lại các kiến thức cần thiết ------- 5p
- Giới thiệu Framework Laravel ----------- 20p
- Các tính năng nổi bật của Laravel ------ 30p
- Cài đặt, triển khai & demo ------------- 50p

## 1. Nhắc lại kiến thức (5p)
- Các kiến thức cần có để bắt đầu môn học:
    - PHP - PHP1, PHP2
    - Database - MySQL
    - HTML/CSS/Js
    - MVC/OOP

## 2. Giới thiệu framework Laravel (20p)
- Lập trình Web với PHP thuần - Nhược điểm.
- Khái niệm về thư viện, framework.
- Giới thiệu framework Laravel, mức độ phổ biến trên thị trường.

- Tổng kết khái niệm về Laravel:
    - framework PHP
    - mã nguồn mở
    - build trên Symfony2
    - sử dụng composer để quản lí thư viện
- Đặt ra câu hỏi: Tại sao Laravel lại được chọn để sử dụng ---> Các tính năng.

## 3. Các tính năng nổi bật của Laravel.
- Auth
- ORM/Eloquent
- Artisan
- MVC
- Security
- Database Migration
- Blade template engine

## 4. Cài đặt, triển khai, demo
### 4.1 Cài đặt
- Các phần mềm cần cài đặt:
    - PHP, MySQL => Xampp -> đã cài trong PHP1, PHP2.
    - Composer -> đã làm quen trong PHP2. 
    - Laravel

## 4.2 Triển khai
- Vào thư mục chứa code Laravel, chạy lệnh:
```
php artisan serve
```
- Truy cập địa chỉ 127.0.0.1:8000

## 4.3 Cấu trúc thư mục Laravel

- app
    - Http
        - Controllers
        - Middleware
        - Requests
    - User.php
- config
- databases
    - migrations
- resources
    - view
    - js
