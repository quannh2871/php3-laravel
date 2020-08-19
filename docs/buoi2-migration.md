# Buoi 2: Migration

- Điểm Danh.
- Bài assignment là project bảo vệ cuối kỳ nên đề bài sẽ được thông báo vào nửa sau của khoá.
- Điểm bài lab1 sẽ được lấy theo điểm btvn cuối buổi. t7 sẽ ktra & cho điểm.

- **Nội dung bài học**
- Giới thiệu về migrations/seeders trong Laravel.
    - Migration files
        - up
        - down
    - Artisan: migrate, rollback, step, batch, fresh
    - Seeders:
        - Faker
- GitSmart.

## Đặt vấn đề: 
Trong các dự án thực tế, 1 team có nhiều người, mỗi người thay đổi DB 1 kiểu (đã vd trong buổi đầu) -> xung đột về DB -> khi sp được tung ra thị trường -> lỗi.

=> Bài toán đặt ra: các thành viên trong cùng 1 team cần thống nhất về DB. Và framework Laravel hỗ trợ chúng ta giải quyết bài toán đó bằng migrations.

## 1. Setup DB
- Chạy xampp.
- Bật MySQL
- Vào Database bằng phpmyadmin: Tạo 1 DB mới
    -> db_name: laravel.
- Vào file .env (tạo 1 file với tên .env nếu chưa có & copy nội dung của file .env.example) & kiểm tra các giá trị:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<DB_NAME> # laravel
DB_USERNAME=<DB_USERNAME>
DB_PASSWORD=<DB_PWD>
```

## 2. Migrations/Seeders (1h30p)

**Đề bài**: xây dựng blog cho phép user đăng bài.
---> Cần 2 bảng: users, posts.

### 2.1 Giai đoạn 1
    - Người dùng: cần lưu lại thông tin về tên, ngày sinh, email, password.
    - Bài đăng: lưu lại ngày giờ đăng, người đăng bài.

---> Thiết kế DB: Batch 1.

- Batch 1:
    - users:
        - id            integer, auto-increment -> increments
        - name          varchar(255)            -> string
        - dob           date                    -> date
        - email         varchar(255)            -> string
        - password      varchar(255)            -> string
        - role: 1,2 ---> user/admin     -> integer
    - posts:
        - id                                    -> increments
        - user_id                               -> integer
        - content                               -> text

- Để tạo file migration -> sử dụng câu lệnh artisan:
```
php artisan make:migrate create_table_<ten_bang>
```

-> Artisan sẽ tạo mới 1 file trong thư mục database/migrations.
    1 file migration sẽ bao gồm 2 function: up & down.

- Các thay đổi(update) cần đưa vào DB -> được thể hiện trong file migration trong function `up()`.

- Sau khi hoàn thành, chạy câu lệnh sau để artisan đưa những thay đổi này vào DB:
```
php artisan migrate
```

### 2.2 Giai đoạn 2
- Yêu cầu: 
    - Người dùng cần lưu thêm thông tin về địa chỉ, quyền.
    - Bài đăng cần lưu dữ liệu về số lượt thích.

- Batch 2: Thêm cột vào DB:
    - users:
        - address:                      -> string
    - posts:
        - like:                         -> integer

- Cũng như giai đoạn 1: mọi thay đổi cần đưa vào DB sẽ được thể hiện ở migration -> cần tạo 1 file migration mới để update vào db.
- Câu lệnh `make:migration` ở giai đoạn 1 dùng để tạo mới bảng. Để update bảng, ta thêm option `--table=<ten_table>`
```
php artisan make:migrate update_table_<ten_table> --table=<ten_table>
```

- Trong file migration mới tạo sẽ có 2 function `up` & `down`.
- Thể hiện các thay đổi mong muốn vào file migrations.

- Cuối cùng, chạy migrate để các thay đổi mới này được đưa vào DB.
```
php artisan migrate
```

### 2.3 Note
- Batch: mở http://localhost/phpmyadmin
- Vào bảng migrations -> có cột batch
---> mỗi lần chạy `php artisan migrate` sẽ được tính là 1 batch mới.

### 2.4 Giai đoạn 3
- Yêu cầu: 2 cột thêm mới ở giai đoạn 2 ko cần thiết -> loại bỏ
- Giải pháp:
    - Tạo thêm 1 file migraion mới?
    -> ko cần thiết. Để đưa DB về trạng thái trước đó, ta tận dụng:
        - hàm `down` trong file migration
        - câu lệnh `php artisan migrate:rollback --step=1`

- Batch 3:
    - Xoá 2 cột đã thêm trong batch 2:
        sử dụng function: dropColumn.
        viết vào hàm down trong file migration trước đấy.

Sau đó sử dụng lệnh:
```
php artisan migrate:rollback --step=1
```

- **Note**:
    - Nếu sử dụng lệnh `migrate:rollback` mà không kèm option `--step`,
        artisan sẽ xoá toàn bộ dữ liệu trong DB, drop toàn bộ DB đi & chạy mới lại toàn bộ
        các file migration từ đầu, kết quả -> DB ở trạng thái mới nhất nhưng không còn dữ liệu

---> Rất nguy hiểm với các hệ thống đã đưa ra thị trường do toàn bộ dữ liệu người dùng sẽ bị xoá.

---> Tuyệt đối không dùng rollback mà không đi kèm với option `--step`.

## 3. Git Smart(30p)
- Mở SmartGit
- Add local folder -> chọn folder Laravel đang làm việc.
- Add repo
- Stage -> Working trees -> Stage 
- Commit -> message -> Commit & Push.
