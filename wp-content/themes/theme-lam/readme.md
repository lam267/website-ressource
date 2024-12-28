my-custom-theme/
├── assets/                        # Tài nguyên (CSS, JS, hình ảnh)
│   ├── css/                       # File CSS
│   │   ├── main.css               # CSS chính
│   │   ├── custom.css             # CSS tùy chỉnh
│   │   └── admin.css              # CSS cho admin panel (nếu cần)
│   ├── js/                        # File JavaScript
│   │   ├── main.js                # Script chính
│   │   ├── custom.js              # Script tùy chỉnh
│   │   └── admin.js               # Script cho admin panel (nếu cần)
│   ├── images/                    # Hình ảnh
│   │   ├── logo.png               # Logo
│   │   ├── banner.jpg             # Banner
│   │   └── icons/                 # Thư mục chứa icon
│   └── fonts/                     # Font chữ
│       ├── Roboto.woff2
│       └── OpenSans.ttf
├── template-parts/                # Các phần giao diện tái sử dụng
│   ├── header/                    # Các phần header
│   │   ├── header-main.php
│   │   ├── header-secondary.php
│   │   └── header-mobile.php
│   ├── footer/                    # Các phần footer
│   │   ├── footer-main.php
│   │   └── footer-widgets.php
│   ├── content/                   # Nội dung bài viết
│   │   ├── content-single.php
│   │   ├── content-page.php
│   │   └── content-excerpt.php
│   └── sidebar/                   # Các phần sidebar
│       ├── sidebar-main.php
│       └── sidebar-secondary.php
├── inc/                           # Các file PHP chức năng
│   ├── setup.php                  # Thiết lập theme (menus, supports, widgets)
│   ├── enqueue.php                # Nạp CSS & JS
│   ├── customizer.php             # Tùy chỉnh theme qua Customizer
│   ├── widgets.php                # Đăng ký widget
│   └── helpers.php                # Các hàm tiện ích
├── languages/                     # File ngôn ngữ
│   ├── en_US.mo
│   ├── en_US.po
│   └── vi_VN.po
├── templates/                     # Các template tùy chỉnh
│   ├── full-width.php             # Template toàn chiều rộng
│   ├── no-sidebar.php             # Template không sidebar
│   └── custom-template.php        # Template tùy chỉnh
├── style.css                      # File định nghĩa style chính và metadata
├── functions.php                  # Thêm các chức năng vào theme
├── index.php                      # Template fallback
├── header.php                     # Template phần đầu trang
├── footer.php                     # Template phần chân trang
├── sidebar.php                    # Template sidebar
├── single.php                     # Template bài viết đơn
├── page.php                       # Template trang tĩnh
├── archive.php                    # Template lưu trữ
├── category.php                   # Template chuyên mục
├── tag.php                        # Template thẻ
├── author.php                     # Template tác giả
├── date.php                       # Template ngày
├── search.php                     # Template kết quả tìm kiếm
├── 404.php                        # Template lỗi 404
├── screenshot.png                 # Ảnh minh họa theme
└── readme.txt                     # Thông tin về theme

<!-- Template Hierarchy và thư mục trong cấu trúc -->
my-custom-theme/
├── index.php                      # Fallback cuối cùng
├── front-page.php                 # Trang chủ (nếu "Trang tĩnh" được chọn)
├── home.php                       # Trang blog chính
├── single.php                     # Bài viết đơn
├── single-{post-type}.php         # Bài viết đơn cho post type cụ thể
├── page.php                       # Trang tĩnh
├── page-{slug}.php                # Trang tĩnh theo slug
├── page-{id}.php                  # Trang tĩnh theo ID
├── archive.php                    # Lưu trữ tổng quát
├── category.php                   # Lưu trữ chuyên mục
├── category-{slug}.php            # Lưu trữ chuyên mục theo slug
├── category-{id}.php              # Lưu trữ chuyên mục theo ID
├── tag.php                        # Lưu trữ thẻ
├── tag-{slug}.php                 # Lưu trữ thẻ theo slug
├── tag-{id}.php                   # Lưu trữ thẻ theo ID
├── author.php                     # Lưu trữ bài viết của tác giả
├── date.php                       # Lưu trữ bài viết theo ngày
├── search.php                     # Kết quả tìm kiếm
├── 404.php                        # Trang lỗi 404
├── templates/                     # Template tùy chỉnh
│   ├── full-width.php             # Template toàn chiều rộng
│   └── no-sidebar.php             # Template không sidebar
├── template-parts/                # Các phần giao diện tái sử dụng
│   ├── content/                   # Nội dung bài viết
│   │   ├── content-single.php     # Nội dung bài viết đơn
│   │   ├── content-page.php       # Nội dung trang tĩnh
│   │   └── content-excerpt.php    # Nội dung bài viết tóm tắt
│   ├── header/                    # Header
│   │   ├── header-main.php        # Header chính
│   └── footer/                    # Footer
│       ├── footer-main.php        # Footer chính
├── assets/                        # Tài nguyên (CSS, JS, hình ảnh)
│   ├── css/
│   ├── js/
│   └── images/
