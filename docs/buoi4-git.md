# Buổi 4: Git Flow

- Nội dung buổi học:
    - Hoàn thiện nội dung seeder:
        - Tạo model Post
        - Tạo factory PostFactory
        - Tạo PostsTableSeeder 
        - Gọi PostsTableSeeder trong DatabaseSeeder
    - Git Flow

## 1. Seeder <tiếp>
- Tạo model cho bảng posts với lệnh:
```
php artisan make:model Post
```

- **Note**:
    - Nếu trong database tên của bảng khác với `posts`: `post`, `bai_dang` ...
    ---> Sau khi tạo xong model, thêm dòng code sau vào file App\Post
```
    protected $table='<ten_bang>';
```

- Tạo tương tự factory, seeder như buổi trước.
- Gọi lại PostsTableSeeder trong DatabaseSeeder.
- Chạy lệnh sau để artisan fake dữ liệu vào DB:
```
php artisan db:seed
```

## 2. Git Flow

- Giới thiệu Git.
- Git Flow.
- Git Smart.

### 2.1. Git
- Trong dự án thực tế khi làm việc cả 1 team lớn
    -> việc quản lí source code (mã nguồn) gặp trở ngại rất lớn: các thành viên phát triển các tính năng khác nhau -> khi ghép code sẽ xảy ra xung đột.
    
- Git là công cụ quản lí source code (mã nguồn), giúp team quản lí source code (quản lí phiên bản, version ...) 1 cách thuận tiện.

- Git có 2 nơi lưu trữ code:
    - local: máy tính cá nhân, là khi phát triển tính năng mới.
    - repo: github, bit bucket, là nơi lưu trữ & chia sẻ code chính trong team.

### 2.2. Git Flow
- Git quản lí các thay đổi theo từng commit.
- Git luôn có 1 nhánh chính (branch master).
- Khi phát triển các tính năng mới -> sẽ tách nhánh mới từ nhánh chính (master), sau khi hoàn tất quá trình phát triển -> nhánh mới tạo sẽ được ghép về nhánh chính.
    -> nhánh chính luôn có code mới.
    -> khi tách nhánh ra: luôn tách từ nhánh chính để đảm bảo luôn có code mới nhất.

- Qui trình làm việc với git:
    - Nếu đang ko đứng ở nhánh chính -> quay trở về nhánh chính.
    ```
    git stash
    git checkout master
    ```

    - Tách ra nhánh mới từ nhánh chính(master).
    ```
    git checkout -b <tên nhánh>
    ```

    - Thực hiện phát triển tính năng mong muốn.
        ---> có nhiều file thay đổi.
    - Stage(gắn cờ) các file mong muốn đưa vào lần    thay đổi này.
    - Commit & Push.
    - Tạo Pull Request vào nhánh chính.

### 2.3. Git Smart
- Khi làm việc với git -> làm việc qua dòng lệnh.
- Git smart cung cấp giao diện để làm việc, thao tác với git dễ dàng hơn.

#### 2.3.1. Tạo github/repo
- Tạo account github.
- Tạo repo -> đặt tên ...
- Tạo ssh key:
    - Tải phần mềm: PuTTY-Gen
    - Type of key to generate -> RSA
    - Generate
    - Keyphrase -> để trống.
    - Nhận được 2 key: private key & public key
        -> lưu vào file.
        - private key: lưu trữ trên máy (only).
        - public key: paste vào [github](https://github.com/settings/keys)

#### 2.3.2. GitSmart
- Trong GitSmart, chọn Repository -> Add or Create. Link tới folder chứa code.
- Chọn stage.
- Commit -> đặt tên cho commit.
- Push lên repo github.
- Tạo Pull Request.

- **Note**: 
    - Các bài lab sau sẽ phải đẩy lên git & nộp lại link pull request cho giảng viên.
