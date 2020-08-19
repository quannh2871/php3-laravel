# Buổi 14: Validate

- Nội dung buổi học:
    - Giới thiệu **validate**
    - Validate trong Laravel.
        - Các hàm validate built-in của Laravel.
        - Tạo Validate Request.
        - Error trong validate trên view blade.
            - Custom message.
    - Custom Validate.
        - Tạo 1 CustomValidate.
            - Khai báo.
            - Sử dụng.

## 1. Validate trong Laravel.
### 1.1. Giới thiệu về validate trong Laravel.
- Khi người dùng nhập thông tin vào form & submit, các thông tin này sẽ được gửi tới `controller` để xử lí. Lúc này, trước khi thực hiện các thao tác **C.R.U.D**, controller cần kiểm tra các giá trị này có thoả mãn điều kiện hay ko: trường *email* có đúng format, trường *phone* có chứa các kí tự nào khác ngoài các số ...
    - Nếu tất cả các điều kiện được thoả mãn -> Thực hiện các thao tác **C.R.U.D**.
    - Ngược lại, chỉ cần 1 điều kiện ko được thoả mãn -> báo lỗi.

=> Quá trình này được gọi là validate - xác nhận tính đúng đắn của dữ liệu.

- Laravel hỗ trợ validate data theo 2 cách:
    - gọi hàm validate() trong controller 
        
        -> ít được sử dụng (do tầng controller lúc này sẽ xử lí nhiều tác vụ, dẫn tới controller dễ bị phình to, khó quản lí)
    - Validate thông qua Request

### 1.2. Validate với Ruquest.
- Tạo request:
```
php artisan make:request <TênFolder>/<TênRequest>Request
```
vd:
```
php artisan make:request Auth/LoginRequest
```
- Request mới tạo sẽ được đặt trong thư mục: `app/Http/Requests`
- Khi được tạo với lệnh **artisan**, request mặc định sẽ có 1 function `rules()`. Đây là nơi khai báo các điều kiện cho các trường dữ liệu được gửi lên.
- Request mới tạo cần được `extends` class **FormRequest** của Laravel. 
- [Các rule built-in của Laravel](https://laravel.com/docs/5.0/validation#available-validation-rules).

#### 1.2.1. Validate LoginRequest
- Tạo 1 request tương ứng để validate cho `LoginController@login`.
- Trong method `rules()`, định nghĩa các điều kiện cho 2 trường email & password:
    - email :   bắt buộc, đúng định dạng email, có tồn tại trong bảng *users*.
    - password: bắt buộc, tối thiểu 6 kí tự.
- Tham số truyền vào trong `LoginController@login` không còn là *object* của class `Request` nữa mà sẽ là *object* của class request mới tạo: `LoginRequest`:
```
public function login(LoginRequest $request)
{
    // code login
}}
```
- Quay trở lại trình duyệt, nhập các thông tin không đúng với điều kiện đã quy định

-> request bị fail validate, người dùng được điều hướng quay trở lại trang đăng nhập.

-> Nhưng lúc này trang đăng nhập chưa hiển thị lỗi ra cho người dùng. Cần hiển thị được lỗi để người dùng có thể biết được.

### 1.3 Hiển thị lỗi trên `view blade`
- Khi failed validate, người dùng sẽ được điều hướng trở về trang trước đó. Lúc này trong `session` có lưu lại các thông báo lỗi của validate. Các lỗi này có thể được truy xuất thông qua biến `$errors` trong file `.blade`.

-> Hiển thị thông báo lỗi trên file blade.

#### 1.3.1. Custom message.
- Các message báo lỗi của Laravel default là tiếng anh.
- Yêu cầu: chuyển các message sang dạng tiếng việt.

- `FormRequest` trong Laravel hỗ trợ method `messages()`(trả về mảng các messages) cho phép custom các message báo lỗi.

- Tạo method `messages()`:
```
public function messages()
{
    return [
        '<field_name>.<rule_name>' => 'Message Here',
    ];
}
```
VD:

```
public function messages()
{
    return [
        'email.required' => 'Email là yêu cầu bắt buộc',
    ];
}
```

- Sau khi khai báo xong, quay trở lại trình duyệt & thử lại.

## 2. [Custom Validate](https://laravel.com/docs/5.0/validation#custom-validation-rules)