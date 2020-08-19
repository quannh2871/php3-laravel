# Buổi 10: Controller

- Nội dung bài học:
    - Route group
    - Giới thiệu về Controller
    - Đưa code trong closure trong route sang controller.
    - Migration: nullable() & default()
    - Eager Loading [Optional]

## 1. Route group
- Group các route của `users` lại với nhau:

```
Route::name('users.')->group(function () {
    Route::get('/', function () {
        // Code
    })->name('index');

    Route::get('/{id}', function () {
        // Code
    })->name('show');

    Route::get('/create', function () {
        // Code
    })->name('create');

    Route::get('/edit/{id}', function () {
        // Code
    })->name('edit');

    // ...
});
```

## 2. Controller
- Controller: nơi tiếp nhận & xử lí các request
- Với 1 chức năng CRUD thông thường, 1 controller sẽ có 7 phương thức của RESTful:

| Route/Phương thức        | Mô tả           | Method  |
| ------------- |:-------------:| -----:|
| index | Show list các items | `GET` |
| show | Show detailed 1 item | `GET` |
| create | hiển thị view tạo mới | `GET` |
| store | lưu dữ liệu vào DB | `POST` |
| edit | hiển thị view update 1 bản ghi, cần hiển thị data cũ của item | `GET` |
| update | lưu dữ liệu vào DB | `POST` |
| delete | xóa 1 bản ghi đã tồn tại | `POST` |

- Câu lệnh tạo controller với artisan:
```
php artisan make:controller <tên_controller>
```

- Controller mới tạo sẽ được đặt trong thư mục `app/Http/Controllers`
- Để tạo controller với 7 method RESTful:
```
php artisan make:controller PhotoController --resource
```
- Để đăng kí route cho các phương thức này:

```
# routes/web.php
Route::resource('photos', 'PhotoController');
```

- Kiểm tra:
```
php artisan route:list
```

-> Lúc này sẽ có route của 7 method RESTful.

## 3. Migration: `nullable()` & `default()`

- Vào migration update bảng users - thêm cột address:
```
$table->string('address')->nullable();
```

- Migration thêm cột *like* vào bảng posts:
```
$table->integer('like')->default(0);
```

- Chạy lệnh:
```
php artisan migrate:fresh
```

## 4. Eager loading

- Bài toán: trong buổi trước, trong route `/users` ta lấy tất cả các users trong DB, sau đó `foreach` danh sách users để lấy ra các bài post của user đó.

---> Làm trang web bị chậm

---> KHÔNG truy vấn(QUERY) trong vòng FOR

- Bài toán (n+1):
    - 1 cấu query lấy ra tất cả các users.
    - n câu query lấy ra các bài post của user đó.

---> Bài toán này được Eloquent của Laravel giải quyết 1 cách triệt để:

```
$users = User::all()->with('posts');
```

- **Giải thích**:
    - Theo cách cũ:
        - cần 1 câu query lấy ra các user: `SELECT * FROM users`
        - Sau đó chạy n câu query ứng với từng user:
        `SELECT * FROM posts where user_id = ...`
    - Với **Eager Loading**:
        - 1 câu query lấy ra user:
            `SELECT * FROM users`
        - 1 câu query lấy ra các bài post:
            `select * from posts where user_id in (1, 2, 3, 4, 5, ...)`

## BTVN:
- Tạo route/view chứa 1 form với method post, gồm 2 input: *email* & *password* để chuẩn bị cho buổi sau.
- Có thể dùng lại form của AdminLTE.
