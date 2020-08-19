# Buổi 3 - Seeder - Faker - GitSmart

- **Nội dung buổi học**:
    - Kiểm tra btvn: 20m
    - Nhắc lại kiến thức: **Migration**
        - Tạo file migration: `php artisan make:migration <tên_file_migration>`.
        - Khai báo các thay đổi muốn đưa vào DB vào file migration mới tạo.
        - Chạy lệnh `php artisan migrate` để đưa các thay đổi được khai báo trong file migration vào DB.
    - Migration: <tiếp tục>
        - function `down()` & `php artisan migrate:rollback`
    - Seeder/Faker: 1h
        - Faker
        - Seeder:
            - Tạo file seeder
            - Gọi trong DatabaseSeeder
            - Gọi với options `--class=`
    - GitSmart: 40m

## 1. Kiểm tra BTVN
- Tạo được migration, chạy đc & tạo đc tables trong DB
    -> 8đ.
- Thiết kế DB chính xác -> 2đ.

## 2. Migration <tiếp>
### 2.1. Function `down()` & lệnh `rollback`
- Buổi trước đã nhắc tới lệnh `rollback` được dùng để đưa DB về các trạng thái cũ (trước khi thay đổi).
- Cụ thể, **artisan** khi nhận được lệnh `migrate:rollback` sẽ tìm & chạy function `down()` trong file migration gần nhất.
- Trong buổi trước, khi chạy `php artisan migrate:rollback`, *artisan* sẽ chạy tới file migration gần nhất, tìm & thực thi hàm `down()` để đưa DB về trạng thái cũ. Nhưng do function `down()` của chúng ta chưa khai báo gì về việc *revert* DB về trạng thái cũ
---> ko có gì thay đổi trong 2 bảng `users` & `posts`.

- Chuẩn bị:
    - Đưa DB về trạng thái mới nhất (sau khi thêm cột trong bảng `users` & `posts`).
    ```
    php artisan rollback
    ```

- Khai báo việc revert DB trong function `down`:
    - Các cột được thêm vào ở function `up` thì sẽ được *drop* ở function `down`.
    -  Các cột được xoá bỏ ở function `up` thì function `down` sẽ phải thêm lại vào.
    - Các cột thay đổi trong function `up` (đổi tên, đổi kiểu dữ liệu ...) thì function `down` phải phục hồi về trạng thái cũ.

- Trong 2 file create_users_table & create_posts_table (các file migration tạo mới tables), mặc định function `down()` sẽ là:
```
public function down()
{
    Schema::dropIfExists('posts');
}
```
- Giải thích:
    - Do function `up()` tạo 1 bảng mới nên function `down()` sẽ làm ngược lại: drop bảng đó đi(nếu bảng đó có tồn tại).

- Với 2 file migration update đã tạo từ buổi trước:
Thực hiện drop các columns mới thêm:
```
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumns('address');
        });
    }
```

## 3. Seeder/Faker.
- Sau khi sử dụng migration để tạo được DB, lúc này ta đã có các bảng cần thiết, tuy nhiên hiện tại các bảng này chưa có dữ liệu để phục vụ cho việc test.
- Việc tự thêm data bằng tay rất mất công, tốn thời gian.
---> Seeder sẽ giúp ta tạo ra dữ liệu fake, phục vụ mục đích test.

- Seeder sẽ nằm trong thư mục **database/seeds**.
- Ngoài ra, trong thư mục **database** còn có 1 thư mục khác: **factories**.

### 3.1. Factory
- Factory là nơi fake dữ liệu cho từng cột của bảng, & được thực hiện thông qua Model.
- vd:
    - UserFactory sẽ fake data cho bảng user, thông qua Model User:
        - name
        - email
        - ...

-> muốn fake được dữ liệu cho bảng nào, cần:
    - Model ứng với bảng đó.
    - Tạo factory cho model tương ứng.

- Sửa lại UserFactory cho tương ứng với bảng user mới.
- Tạo model Post & PostFactory.

- Factory là nơi định nghĩa cách fake dữ liệu cho 1 bản ghi. Muốn tạo ra nhiều bản ghi fake, ta định nghĩa trong Seeder.

### 3.2. Seeder

- Để tạo ra 1 file Seeder, ta dùng lệnh:
```
php artisan make:seeder <TenSeeder>
```

-> 1 file Seeder mới được tạo trong thư mục `database/seeds`. Trong file mới tạo sẽ có 1 function `run()`. Đây sẽ là nơi khai báo số lượng bản ghi muốn tạo.

- Trong function `run()` ta sẽ gọi tới hàm `factory`, truyền vào Model ứng với bảng mà ta muốn tạo và số lượng bản ghi mong muốn.
```
factory(User::class, 10)->create();
```

- Sau đó, trong file `database/seeds/DatabaseSeeder.php`, ta sẽ gọi tới Seeder vừa tạo:
```
$this->call(UsersTableSeeder::class);
```

- Tới đây, ta dùng lệnh sau để thực thi các seeders:
```
php artisan db:seed
```

Lệnh này sẽ tìm tới file DatabaseSeeder.php, thực thi hàm `run()`
Sau đó, kiểm tra DB ta sẽ thấy các dữ liệu fake đã được tạo thành công.

## 4. SmartGit
- Mở SmartGit
- Add local folder -> chọn folder Laravel đang làm việc.
- Add repo
- Stage -> Working trees -> Stage 
- Commit -> message -> Commit & Push.

#### Note:
- Hướng dẫn sv tạo repo, đẩy code lên repo & tạo PR.
- Document URL: https://github.com/HoangTien339/web4012_giao_an
