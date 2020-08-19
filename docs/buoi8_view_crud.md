# Buổi 8: View CRUD

- Nội dung bài học:
    - Tạo các view để thực hiện đủ 4 thao tác CRUD:
        - View index        -> đã tạo từ buổi trước, bổ sung button create/update/delete.
        - View create       -> tạo form với method post
        - View update       -> tạo form với method post, giữ được giá trị cũ.

## Note
- Các route create/update/delete tạo từ buổi trước với method `GET` -> sửa về `POST`
- Giới thiệu qua về 7 method RESTful

| Route/Phương thức        | Mô tả           | Method  |
| ------------- |:-------------:| -----:|
| index | Show list các items | `GET` |
| show | Show detailed 1 item | `GET` |
| create | hiển thị view tạo mới | `GET` |
| store | lưu dữ liệu vào DB | `POST` |
| edit | hiển thị view update 1 bản ghi, cần hiển thị data cũ của item | `GET` |
| update | lưu dữ liệu vào DB | `POST` |
| delete | xóa 1 bản ghi đã tồn tại | `POST` |

## 1. Index
- Bổ sung 2 button update, delete đối với từng dòng trong table.
- 1 button create phía trên table.

## 2. Create
### 2.1. `GET /users/create`
- Tạo route `create` trả về view `users/create.blade.php`
- Tạo view `users/create.blade.php`

- View create có thể copy các component của thư viện AdminLTE, đảm bảo có các field input:
    - Name
    - Email
    - Birthday (date-picker)
- Form cần có:
    - `@csrf`
    - method='POST'
    - action='#'

### 2.2. `POST /users/store`
- Sửa route `users/store` thành method `POST` (route này đã tạo từ buổi trước).
- Update lại các thông tin để lưu dữ liệu vào DB.
- Kiểm tra xem sau khi tạo xong data đã được đưa vào DB?
- Sau khi tạo xong -> redirect về trang `1. index`

### 3. View update
### 3.1. `GET /users/{id}`
- Tạo route `/users/{id}` với method `GET`, trả về view để update user với id tương ứng. Lưu ý ở method này cần truy vấn lấy ra được data của user để update.
- Cách tạo tương tự view `create`

### 3.2. `POST /users/{id}`
- Truy vấn lấy ra được user với id tương ứng.
- Update data cho user.

### 4. Delete
- Form post có @csrf token để delete bản ghi.
