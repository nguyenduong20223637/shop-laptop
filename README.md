# DTStore - Shop Laptop

DTStore là website bán laptop được xây dựng bằng framework PHP Laravel. Hệ thống hỗ trợ đầy đủ các chức năng mua sắm trực tuyến cho khách hàng và quản trị cho admin.

## Yêu cầu cài đặt

- `PHP >= 8.0`
- `Composer`
- `MySQL / PHPMyAdmin`
- `XAMPP hoặc tương đương`

## Hướng dẫn cài đặt

Clone project từ GitHub:
```
git clone https://github.com/nguyenduong20223637/shop-laptop.git
```

Di chuyển vào thư mục project:
```
cd shop-laptop
```

Cài đặt các package:
```
composer install
```

Copy file `.env.example` thành `.env` và điền thông tin database:
```
DB_DATABASE=shopdientu
DB_USERNAME=root
DB_PASSWORD=
```

Chạy migration:
```
php artisan migrate
```

Chạy server:
```
php artisan serve
```

Truy cập:
```
http://127.0.0.1:8000/
```

Trang admin:
```
http://127.0.0.1:8000/admin/login
```

## Chức năng chính

### Client
- Đăng ký, đăng nhập tài khoản
- Xem danh sách và chi tiết sản phẩm laptop
- Lọc sản phẩm theo danh mục, thương hiệu, giá
- Thêm vào giỏ hàng, đặt hàng
- Thanh toán COD hoặc VNPay
- Xem lịch sử đơn hàng
- Bình luận, đánh giá sản phẩm

### Admin
- Quản lý sản phẩm (thêm, sửa, xóa, ẩn/hiện)
- Quản lý danh mục, thương hiệu, màu sắc, cấu hình
- Quản lý banner trang chủ
- Quản lý đơn hàng, xử lý trạng thái
- Quản lý tài khoản khách hàng
- Phân quyền admin
- Thống kê doanh thu, top sản phẩm

## Công nghệ sử dụng

- **Backend**: Laravel 10, PHP 8.2
- **Frontend**: Bootstrap 5, Vue.js 2, Axios
- **Database**: MySQL
- **Thanh toán**: VNPay Sandbox
- **Icons**: Font Awesome 6

## Thông tin liên hệ

- **Nhóm**: Nguyễn Duy Toại (20223710) & Nguyễn Đình Tùng Dương (20223637)

## Cập nhật

- Thêm chức năng thống kê doanh thu theo ngày/tháng/năm
- Thêm biểu đồ top sản phẩm xem nhiều và bán chạy
- Cải thiện giao diện quản lý banner với preview ảnh và sắp xếp thứ tự
- Fix lỗi tính tổng tiền trong giỏ hàng

## Ngày 23/05/2026

- Fix lỗi biểu đồ thống kê top sản phẩm
- Cải thiện giao diện trang thống kê doanh thu với nút chọn nhanh
- Fix hash mật khẩu khi cập nhật tài khoản admin
