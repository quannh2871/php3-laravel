## 1. Phạm vi assignment
- Assignment 1: phần 1,2,3,4,5
- Assignment 2: phần 6,7,8

## 2. Nội dung bài assignment
1. CRUD 4 bảng
2. Migration/Seeder/Model đầy đủ
3. Route
    3.1. name, get/post, redirect, params
    3.2. group, prefix
4. MVC
5. Layout cho từng phần giao diện
6. Validate
7. Auth
8. Middleware

### Mô tả chi tiết
- Xây dựng 1 blog:
    - users: người dùng đăng bài(role 1), admin quản lí (role 2). user thường có thể  bị block bởi admin -> inactive
    - posts: bài đăng được đăng bởi người dùng. bài post phải thuộc 1 category nào đó.
    - comments: comments cần thuộc 1 bài đăng nào đấy. comment có thể bị inactive bởi admin (vd: comment không phù hợp ...)
    - categories: danh mục 1 cấp. cần có thông tin về người tạo (chỉ admin mới có quyền tạo)
    - Chủ bài post có quyền chặn comment của bài post.

- Đối với admin:
    - cần đủ 4 màn hình quản lí user/post/comment/category, và đủ 4 chức năng CRUD.

- Đối với user thường: có màn hình:
    - R/U profile cá nhân
    - xem toàn bộ các bài đăng của người khác
    - xem toàn bộ bài đăng cá nhân + comment của người khác

## 3. Chi tiết các bảng
- users
    - tên
    - ngày sinh
    - sdt
    - email
    - password
    - role: 1,2 ~ user/admin
    - is_active: true/false
- posts:
    - title
    - content
    - timestamp (sử dụng laravel timestamp)
    - thuộc danh mục nào (category_id)
    - người đăng: user_id
- comments
    - thuộc bài đăng nào (post_id)
    - content
    - người đăng (user_id)
    - is_active: true/false
- categories
    - người tạo (user_id)
    - tên

## 4. Chi tiết điểm
- Admin:
    - CRUD đủ 4 bảng, có validate & check middleware đầy đủ: 5đ

- User:
    - Có đủ các chức năng cho User, kèm theo validate, middleware đầy đủ -> mỗi tính năng + 0.5đ:
        - Auth, check active/deactive khi login.
        - Tạo bài viết
        - Comment bài viết
        - Quản lý profile cá nhân
    - Có tính năng chặn comment bài viết cho chủ bài post hoặc admin -> +1đ.
    - Có tính năng follow/unfollow: +1đ
- Tuỳ vào mức độ sử dụng được Query Builder: +0.25 - 1đ.
## 5. Note - Convention
   - Các bảng cần được đặt tên theo chuẩn Laravel: tên tiếng anh, viết thường, số nhiều. ex: posts, users, categories ...
   - Tất cả các bảng đều cần timestamp của Laravel
   - Khóa chính trong bảng đặt là `id`.
   - Khóa ngoại đặt theo convention: `user_id`, `post_id`, ...
   - Yêu cầu validate với message tiếng việt.
