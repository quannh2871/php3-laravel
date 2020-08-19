# Buổi 7: Model Eloquent - 1

- Nội dung buổi học:
    - Các khái niệm cơ bản trong model
        - $table
        - $id
        - $fillable
        - CRUD
        - route model binding
    - Tạo view create user.

## 1. Eloquent trong Laravel

- Model thông thường: Trong PHP 1-2
    - Các model là các class độc lập, ko liên quan tới DB
    - Muốn truy xuất tới DB -> phải thao tác từ bước tạo `DB::connection` cho mỗi lần truy xuất tới DB, sau đó khi nhận được kết quả từ DB trả về phải *convert* lại về  *model*

        -> Mất thời gian, giảm hiệu năng của hệ thống mỗi lần query vào DB
        -> Giảm hiệu quả code

- Laravel cung cấp 1 thư viện hỗ trợ việc truy xuất vào DB trở nên thuận tiện hơn: **Eloquent**
- Toàn bộ các công đoạn kết nối tới DB, thực hiện truy vấn & convert data trả về từ DB sẽ được thực hiện bởi **Elquent**.
- Mặt khác, Eloquent/QueryBuilder cung cấp cú pháp đơn giản, thuận tiện (*sugar syntax*) để viết query thay vì phải viết query thuần.
- Sử  dụng Eloquent/QB -> dễ dàng thay đổi DB mà ko cần thay đổi lại truy vấn.
Mọi công việc khi chuyển đổi DB chỉ cần thực hiện ở config là đủ.

### 1.1. Tạo Model
- Để tạo 1 Eloquent Model trong Laravel:
```
php artisan make:model <tên_model>
```
- Tuy nhiên, mặc định trong Laravel, models được đặt trong thư mục `app`
-> code bẩn, khó quản lí khi phát triển dự án.

---> tạo 1 folder *Models* trong folder `app` & đặt model trong thư mục mới tạo này.
- Sử dụng câu lênh sau để tạo model trong folder `app/Models`
```
php artisan make:model Models/<tên_model>
```

- Mở file model mới tạo -> ở dòng khai báo `namespace`:
```
namespace App\Models
```

- Ở các file khác muốn `use` model này cần khai báo:
```
use App\Models\<TênModel>;
```

### 1.2. Eloquent Model mapping với table trong DB
- Eloquent Model sẽ được mapping tới các bảng trong DB.
- Mặc định trong Laravel, tên bảng tương ứng với Model sẽ có dạng:
    - tiếng anh
    - lowercase - chữ thường
    - số nhiều

-> **Cần đặt tên Model đúng chuẩn của Laravel để  Model có thể mapping tới *table* trong DB**:

- Tên Model cần được đặt theo tiếng anh, viết hoa chữ cái đầu, số ít

- VD:
    - Model `User`      -> table `users`
    - Model `Post`      -> table `posts`
    - Model `Category`  -> table `categories`

- Nếu tên Model hoặc tên table ko được đặt đúng chuẩn -> cần trực tiếp khai báo bảng tương ứng bên trong model:

```
protected $table='ten_bang';
```

- Mặc định **primary key** sẽ là cột `id`.
- Nếu PK ko phải là cột `id`, cần chỉ định bên trong model:

```
protected $primaryKey = 'id_user';
```

### 1.3 Create/Read/Update/Delete

#### 1.3.1. Create

- Để tạo mới 1 user & lưu data vào DB: dùng hàm create ()
- Tạo route create user trong `routes/web.php`
- Trong route mới tạo:
```
$user = User::create([
    'name' => 'TienNH21',
    'birthday' => '...',
    'email' => '...',
]);
```

- Kiểm tra DB -> data chưa vào.

- `fillable` trong Eloquent Model
    - Trong Laravel, những cột trong DB muốn cho phép model tác động vào cần được khai báo trong `$fillable`
    - Nếu ko khai báo trong `$fillable`, Laravel sẽ ko cho phép model tác động tới các cột trong DB.

- Khai báo các cột cần thao tác vào `$fillable` & thử lại.

#### 1.3.2. Show(Read)
- Để lấy ra 1 bản ghi theo `id`:
```
$user = User::findById($id)
```

- Để lấy tất cả bản ghi trong DB:
```
$users = User::all();
```

- Thay thế việc lấy data từ `faker` trong route từ buổi trước bằng cách đọc từ DB.

#### 1.3.3. Update

- Để update data vào DB, có 2 cách
    - gọi save
    - gọi update

##### Sử dụng hàm `save()`
- Lấy bản ghi ra từ DB thông qua `id`.
- Update từng trường.
- Gọi hàm `save()`

```
$user = User::findById($id);
$user->name = 'Tien123';
$user->email = 'admin@example.com';
$user->save();
```

##### Sử dụng hàm `update()`
- Hàm update nhận tham số là 1 mảng truyền vào & sẽ update các giá trị trong mảng đó vào DB:

```
$user = User::findById($id);
$user->update([
    'name' => 'TienNH123',
    'email' => 'admin@example.com',
]);
```

#### 1.3.4. Delete

- Tương tự như `update()`, để delete được bản ghi trong DB, ta cần get được bản ghi đó ta qua hàm `findById`.

```
$user = User::findById($id);
$user->delete();
```

### 1.4. Route Model Binding
## 2. Tạo view create user.
- Tạo view có form gồm:
    - username -> input type text
    - email -> input type email
    - date of birth -> input date picker (dùng bootstrap hoặc AdminLTE)
- *Note*:
    - @csrf
    - action/method
    - @stack & @push('')/@endpush
