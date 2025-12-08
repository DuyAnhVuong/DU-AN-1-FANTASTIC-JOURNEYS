<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FANTASTIC JOURNEYS - Quản lý Tour Du lịch</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/f081052a6b.js" crossorigin="anonymous"></script>
  <style>
    /* CSS cho Tailwind */
    body {
      box-sizing: border-box;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
      width: 100%;
    }

    .sidebar-item {
      transition: all 0.3s ease;
    }

    .sidebar-item:hover {
      transform: translateX(5px);
    }

    .submenu {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease-in-out;
      /* Dùng ease-in-out cho mượt hơn */
    }

    .submenu.active {
      max-height: 500px;
      /* Giá trị lớn hơn để đảm bảo hiển thị hết */
    }

    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    /* Thêm style cho nút submenu để hiển thị icon mũi tên */
    .rotated {
      transform: rotate(180deg);
    }
  </style>
</head>

<body class="w-full h-full">
  <div class="flex h-full w-full bg-gradient-to-br from-blue-50 to-indigo-100">
    <aside class="w-64 bg-gradient-to-b from-indigo-900 to-indigo-700 text-white flex-shrink-0 overflow-y-auto">
      <div class="p-6 border-b border-indigo-600">
        <a href="<?= BASE_URL_ADMIN ?? '#' ?>" class="flex items-center gap-3 mb-4">
          <img src="../uploads/logo.jpg" alt="Fantastic" class="w-10 h-10 rounded-full opacity-80 shadow-md">
          <span id="website-name" class="text-xl font-bold" style="font-family: 'Arial Black', sans-serif;">FANTASTIC
            JOURNEYS</span>
        </a>


        <div class="flex items-center gap-3 border-t border-indigo-600 pt-4 mt-2">
          <div
            class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
            A
          </div>
          <a href="#" class="font-medium text-white block">ADMIN</a>


        </div>
      </div>

      <nav class="p-4">
        <ul class="space-y-1">
          <li class="nav-item sidebar-item">
            <a href="<?= BASE_URL_ADMIN ?? '#' ?>"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-600 text-left transition-colors text-white">
              <i class="fa-solid fa-house w-5 h-5"></i>
              <span class="font-medium">Trang chủ</span>
            </a>
          </li>
          <li class="nav-item sidebar-item">
            <a href="<?= BASE_URL_ADMIN . '?act=khach-hang' ?>"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-600 text-left transition-colors text-white">
              <i class="fa-solid fa-users w-5 h-5"></i>
              <span class="font-medium">Khách hàng Tour</span>
            </a>
          </li>
          <li class="nav-item sidebar-item">
            <a href="<?= BASE_URL_ADMIN . "?act=danh-muc" ?>"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-600 text-left transition-colors text-white">
              <i class="fa-solid fa-list w-5 h-5"></i>
              <span class="font-medium">Danh mục tour</span>
            </a>
          </li>
          <li class="nav-item sidebar-item">
            <a href="<?= BASE_URL_ADMIN . '?act=tour' ?>"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-600 text-left transition-colors text-white">
              <i class="fa-solid fa-plane w-5 h-5"></i>
              <span class="font-medium">Tour</span>
            </a>
          </li>
          <li class="nav-item sidebar-item">
            <a href="<?= BASE_URL_ADMIN . '?act=tourrun' ?>"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-600 text-left transition-colors text-white">
              <i class="fa-solid fa-plane w-5 h-5"></i>
              <span class="font-medium">Tour run</span>
            </a>
          </li>
          <li class="nav-item sidebar-item">
            <a href="<?= BASE_URL_ADMIN . '?act=ncc' ?>"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-600 text-left transition-colors text-white">
              <i class="fa-brands fa-black-tie w-5 h-5"></i>
              <span class="font-medium">Nhà cung cấp</span>
            </a>
          </li>
          <li class="nav-item sidebar-item">
            <a href="<?= BASE_URL_ADMIN . '?act=yeu-cau-dac-biet' ?>"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-600 text-left transition-colors text-white">
              <i class="fa-solid fa-calendar-check w-5 h-5"></i>
              <span class="font-medium">Yêu cầu đặc biệt</span>
            </a>
          </li>

          <li class="nav-item sidebar-item">
            <button onclick="toggleSubmenu('staff')"
              class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-indigo-600 text-left transition-colors">
              <div class="flex items-center gap-3">
                <i class="fas fa-user w-5 h-5"></i>
                <span class="font-medium">Quản lý Nhân sự</span>
              </div>
              <i class="fas fa-angle-left right w-4 h-4 transition-transform" id="staff-arrow"></i>
            </button>
            <ul id="staff-submenu" class="submenu pl-10 space-y-1">
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>"
                  class="w-full text-left px-4 py-2 hover:bg-indigo-600 rounded-lg transition-colors text-sm text-white flex items-center gap-3">
                  <i class="fas fa-user w-4 h-4"></i>
                  Tài khoản
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=huongdanvien' ?>"
                  class="w-full text-left px-4 py-2 hover:bg-indigo-600 rounded-lg transition-colors text-sm text-white flex items-center gap-3">
                  <i class="fas fa-user w-4 h-4"></i>
                  Hướng Dẫn Viên (HDV)
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item sidebar-item">
            <button onclick="toggleSubmenu('booking')"
              class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-indigo-600 text-left transition-colors">
              <div class="flex items-center gap-3">
                <i class="nav-icon fas fa-user w-5 h-5"></i>
                <span class="font-medium">Quản lý Booking</span>
              </div>
              <i class="fas fa-angle-left right w-4 h-4 transition-transform" id="booking-arrow"></i>
            </button>
            <ul id="booking-submenu" class="submenu pl-10 space-y-1">
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=list-booking' ?>"
                  class="w-full text-left px-4 py-2 hover:bg-indigo-600 rounded-lg transition-colors text-sm text-white flex items-center gap-3">
                  <i class="nav-icon fas fa-user w-4 h-4"></i>
                  Booking
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=list-trang-thai' ?>"
                  class="w-full text-left px-4 py-2 hover:bg-indigo-600 rounded-lg transition-colors text-sm text-white flex items-center gap-3">
                  <i class="nav-icon fas fa-user w-4 h-4"></i>
                  Trạng thái booking
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </aside>

    <main class="flex-1 overflow-y-auto">
      <header class="bg-white shadow-md px-8 py-4">
        <div class="flex items-center justify-between">
          <h2 id="page-title" class="text-3xl font-bold text-indigo-900" style="font-family: 'Georgia', serif;">Trang
            chủ</h2>
          <div class="flex items-center gap-4">
            <button class="p-2 hover:bg-indigo-50 rounded-full transition-colors">
              <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
              </svg>
            </button>
            <div class="flex items-center gap-3">
              <div
                class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                A
              </div>
              <span class="font-medium text-gray-700">Admin</span>
              <a class="nav-link" href="<?= BASE_URL_ADMIN . '?act=logout-admin' ?>"
                onclick="return confirm('Đăng xuất tài khoản ?')">
                <i class="fas fa-sign-out-alt"></i>
              </a>
            </div>
          </div>
        </div>
      </header>



      <script>
        // Hàm chuyển đổi nội dung trang
        function showPage(pageId) {
          const pages = document.querySelectorAll('.page-content');
          pages.forEach(page => {
            page.classList.add('hidden');
          });
          document.getElementById(`${pageId}-page`).classList.remove('hidden');

          // Cập nhật tiêu đề trang
          const pageTitleElement = document.getElementById('page-title');
          let title = '';
          switch (pageId) {
            case 'home': title = 'Trang chủ'; break;
            case 'customers': title = 'Khách hàng Tour'; break;
            case 'categories': title = 'Danh mục Tour'; break;
            case 'tours': title = 'Quản lý Tour'; break;
            case 'suppliers': title = 'Nhà cung cấp'; break;
            case 'requests': title = 'Yêu cầu đặc biệt'; break;
            case 'accounts': title = 'Tài khoản Quản trị'; break;
            case 'guides': title = 'Hướng dẫn viên'; break;
            case 'bookings': title = 'Quản lý Booking'; break;
            case 'booking-status': title = 'Trạng thái Booking'; break;
            default: title = 'FANTASTIC JOURNEYS';
          }
          pageTitleElement.textContent = title;

          // Đóng tất cả các submenu khi chuyển trang
          const submenus = document.querySelectorAll('.submenu');
          submenus.forEach(submenu => {
            submenu.classList.remove('active');
          });
          const arrows = document.querySelectorAll('.transition-transform');
          arrows.forEach(arrow => {
            arrow.classList.remove('rotated');
          });
        }

        // Hàm bật/tắt submenu
        function toggleSubmenu(id) {
          const submenu = document.getElementById(`${id}-submenu`);
          const arrow = document.getElementById(`${id}-arrow`);
          submenu.classList.toggle('active');
          arrow.classList.toggle('rotated');
        }

        // Hiển thị trang chủ khi tải lần đầu
        document.addEventListener('DOMContentLoaded', () => {
          showPage('home');

          // Gán sự kiện click cho các nút trong sidebar
          const sidebarButtons = document.querySelectorAll('.nav-item > a.nav-link');
          sidebarButtons.forEach(button => {
            button.addEventListener('click', (e) => {
              // Ngăn chặn chuyển hướng mặc định của PHP base url
              e.preventDefault();

              // Lấy act từ href (ví dụ: '?act=khach-hang')
              const href = button.getAttribute('href');
              const match = href.match(/act=([^&]+)/);
              let pageId = 'home';
              if (match) {
                const act = match[1];
                switch (act) {
                  case 'khach-hang': pageId = 'customers'; break;
                  case 'danh-muc': pageId = 'categories'; break;
                  case 'tour': pageId = 'tours'; break;
                  case 'ncc': pageId = 'suppliers'; break;
                  case 'yeu-cau-dac-biet': pageId = 'requests'; break;
                  // Submenu items are handled by the inner links
                }
              }
              showPage(pageId);
            });
          });
        });


        // Các script elementSdk, onConfigChange, mapToCapabilities, mapToEditPanelValues đã được giữ lại từ HTML ban đầu 
        // và được đặt trong thẻ <script> cuối cùng.
      </script>
</body>

</html>