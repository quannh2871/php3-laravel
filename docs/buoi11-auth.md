# Buổi 11: Authentication

- Nội dung bài học:
    - Giới thiệu về Eloquent Mutators.
    - View auth + login
    - Auth::check(), Auth::user
    - Auth::attemptLogin()

## 1. Giới thiệu về Eloquent mutator
- Laravel Eloquent cung cấp 2 khái niệm: *accessor* & *mutator*.
- Accessor cho phép format/thay đổi giá trị của dữ liệu trước khi trả ra.
```
public function getMoneyAttribute($value)
{
    $this->attributes['money'] = $value . ' VND';
}
```

- Mutator cho phép thay đổi/format lại dữ liệu trước khi lưu vào DB:
```
public function setPasswordAttribute($value)
{
    $this->attributes['password'] = bcrypt($value);
}
```

## 2. Auth
- Tạo view login.
- Sử dụng hàm `attemptLogin()` để đăng nhập.
- Auth::user()
- Auth::check()