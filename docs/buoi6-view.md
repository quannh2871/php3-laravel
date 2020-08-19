# Buổi 6: View - Blade Engine

- Nội dung buổi học:
    - Giải thích khái niệm template, layout
    - Blade engine:
        - @include
        - @extends
        - @yield
        - @section
        - @stack
        - @if
        - @for
    - Truyền data vào view
    - Tạo view hiển thị 1 table:
        - server trả về dữ liệu (1 mảng fake)
        - có đủ các phần: header, sidebar, footer, contents.
        - nếu data từ server trả về là rỗng -> hiển thị message "No data" thay vì table.

## 1. Template, layout
- Trong 1 website, thông thường các page sẽ share (dùng chung) header, sidebar, footer. Chỉ có 2 phần duy nhất thay đổi -> contents.
    
    ---> Các thành phần header, sidebar, contents, footer tạo nên **layout/template** của 1 trang web.
- Với mô hình truyền thống với các file html -> tất cả các file html đều phải chứa code của các phần header, sidebar, footer ...
    
    ---> code ko thể tái sử dụng mà bị trùng lặp, thừa thãi.
    
    ---> khi cần thay đổi -> phải thay đổi nhiều chỗ
    
    ---> code ko tối ưu, khó mở rộng, khó quản lí

---> Các thành phần cố định, ko thay đổi nên được tách riêng

---> Blade Engine.

## 2. Blade engine
### 2.1 Lí thuyết
- Blade engine là 1 thư viện hỗ trợ:
    - viết code PHP trong HTML ngắn gọn, thuận tiện hơn
    - biên dịch code PHP trong HTML
    - hỗ trợ tách biệt các thành phần trong template: header, sidebar ... giúp code trở nên ngắn gọn, dễ quản lí, có thể tái sử dụng.
    - hỗ trợ kế thừa view hiệu quả.
    - Trong laravel, các file blade được đặt trong thư mục `resources/view` & có đuôi `.blade.php`

### 2.2 Thực hành

- Tải AdminLTE
- Copy thư mục *bower_components*, *dist*, *plugins* từ AdminLTE vào folder *public* trong Laravel.
- Tạo 1 view mới copy code HTML từ *starter.html* của AdminLTE.
- Thay thế các đường dẫn css bằng lời gọi hàm `asset('...')`.

---> lên được giao diện mặc định - có đủ các phần:
    - header
    - main-sidebar
    - control-sidebar
    - footer
    - contents

- Tách các phần này ra thành các file blade riêng biệt, sau đó @include chúng vào file chính.

- @yield('contents') sẽ cho phép các view blade khác kế thừa lại từ view blade này.

- Tạo dữ liệu fake bằng factory.
- Truyền ra view.
- Hiển thị ngoài view:
    - nếu không có data hoặc data rỗng

        ---> hiển thị text "No data"

    - nếu có dữ liệu -> hiển thị ra dữ liệu ở dạng bảng, có thể dùng bootstrap.

- **Note**:
    - Có @yield('title')
    - [Code mẫu](https://github.com/HoangTien339/laravel_web_4012/pull/1/files)

- BTVN:
    - Tạo view layouts.blade.php có 4 phần:
        - headers
        - sidebars
        - contents
        - footer
    - Các phần cần được tách riêng ra các file blade & được include lại trong file layouts
    - Tạo view posts.blade.php kế thừa lại view layouts.
    - View posts sẽ hiển thị danh sách các bài post (data được fake bằng factory).
    - Trong trường hợp không có bài post nào sẽ hiển thị text "No Data"
    - Đẩy code lên github & mail lại link PR.
