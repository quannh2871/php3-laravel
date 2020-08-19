# Buổi 15: Middleware.

- Nội dung buổi học:
    - Giới thiệu về middleware
    - Middleware trong Laravel
        - Tạo middleware với artisan
        - Đăng kí middleware với Laravel
        - Middleware group
    - Tổng hợp kiến thức môn học

## 1. Giới thiệu về middleware
- Khi xây dựng website, thông thường sẽ có 2 role: *user* & *admin*.
- Bài toán đặt ra:
    - Với những role riêng biệt -> cần giới hạn quyền truy cập tới các màn hình/chức năng riêng biệt.
    - vd1: role *user* sẽ chỉ truy cập được tới các màn hình của *user*. Role *user* sẽ ko được quyền truy cập tới các màn hình của *admin*.
    - vd2: trong hệ thống đa số các màn hình/chức năng yêu cầu người dùng phải được xác thực trước khi truy cập vào.

- Để giải quyết vấn đề này, khi 1 request được gửi tới hệ thống (server), ta cần kiểm tra user đó có thoả mãn điều kiện truy cập tới chức năng hay ko.

- Trong Laravel, tầng xử lí việc kiểm tra quyền này được gọi là `middleware`.

## 2. Middleware trong Laravel

- Middleware trong Laravel sẽ được đặt trong thư mục `app/Http/Middleware`.

- Các request khi được gửi tới server sao khi vào *route* sẽ được check với middleware trước khi đi tới *controller*.

- Ví dụ mẫu buổi học: tạo middleware cho route C.R.U.D *users*: chỉ quyền admin mới được truy cập vào các route này.

### 2.1 Tạo Middleware trong Laravel
- Để tạo middleware trong Laravel:
```
php artisan make:middleware <Tên>Middleware
```

- Middleware mới tạo sẽ được đặt trong folder `app/Http/Middleware` & bên trong middleware có sẵn 1 hàm `handle()`. Đây chính là nơi sẽ kiểm tra các điều kiện trước khi request được gửi tới *controller*.

### 2.2 Đăng kí middleware với Laravel.
- Sau khi middleware được tạo, ta cần đăng kí với Laravel trước khi có thể sử dụng middleware đó.

- Để đăng kí middleware với Laravel, ta khai báo middleware (với đầy đủ namespace) trong file `app/Http/Kernel.php` - thuộc tính `$routeMiddleware`.

- Lưu ý:
    - khi khai báo middleware trong `app/Http/Kernel.php`, thuộc tính `$routeMiddleware` là kiểu mảng với dạng `'key' => $value`. 
    - `key` ở đây sẽ là tên của middleware để gọi trong hệ thống thay vì phải gọi qua tên class.

### 2.3. Middleware cho route - group.
- Trong Laravel, có 2 nơi có thể gọi tới middleware để kiểm tra quyền:
    - Trong constructor của controller tương ứng -> việc gọi tới middleware sẽ rải rác trong các controller & rất khó quản lí.
    - gọi trong route tương ứng.

- Với *route group*, trong mảng các *options* truyền vào, ta đăng kí thêm *option* middleware:

```
Route::group([
    // options
    'middleware' => [
        '<tênMiddleware>'
    ],
], function () {
    // routes
});
```

## 3. Tổng hợp kiến thức môn học
- Các kiến thức cơ bản đã được học trong môn học:
    - Database: migration/seeder/factory.
    - MVC: Route - Controller - Model - View.
        - Route: name, group, middleware.
        - Controller: 7 method RESTful.
        - Model: Eloquent - $table, $id, các phương thức CRUD, relations.
        - View: Blade engine.
    - Authentication: auth với `attemptLogin()`.
    - Validate: tạo & validate với `FormRequest`, custom messages.
    - Middleware.
