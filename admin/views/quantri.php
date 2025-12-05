<?php require './views/layout/sidebar.php' ?>
<div id="content-area" class="p-8">
  <div id="home-page" class="page-content">
    <div class="mb-6">
      
      <h3 id="welcome-message" class="text-2xl font-semibold text-gray-800 mb-2"
        style="font-family: 'Arial', sans-serif;">Chào mừng đến với hệ thống quản lý FANTASTIC JOURNEYS</h3>
      <p class="text-gray-600">Dashboard tổng quan về hoạt động kinh doanh tour du lịch</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="card bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-500 text-sm font-medium">Tổng Tour</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">156</p>
          </div>
          <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
            </svg>
          </div>
        </div>
      </div>
      <div class="card bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-500 text-sm font-medium">Booking</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">432</p>
          </div>
          <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                clip-rule="evenodd" />
            </svg>
          </div>
        </div>
      </div>
      <div class="card bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-500 text-sm font-medium">Khách hàng</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">1,248</p>
          </div>
          <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
            </svg>
          </div>
        </div>
      </div>
      <div class="card bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-500 text-sm font-medium">Doanh thu</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">2.4B</p>
          </div>
          <div class="w-14 h-14 bg-orange-100 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
              <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                clip-rule="evenodd" />
            </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h4 class="text-lg font-bold text-gray-800 mb-4">Booking gần đây</h4>
        <div class="space-y-3">
          <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
            <div>
              <p class="font-medium text-gray-800">Tour Hạ Long 3N2Đ</p>
              <p class="text-sm text-gray-500">Nguyễn Văn A - 15/01/2024</p>
            </div><span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">Đã xác
              nhận</span>
          </div>
          <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
            <div>
              <p class="font-medium text-gray-800">Tour Đà Nẵng 4N3Đ</p>
              <p class="text-sm text-gray-500">Trần Thị B - 14/01/2024</p>
            </div><span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium">Chờ xử
              lý</span>
          </div>
          <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
            <div>
              <p class="font-medium text-gray-800">Tour Phú Quốc 5N4Đ</p>
              <p class="text-sm text-gray-500">Lê Văn C - 13/01/2024</p>
            </div><span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">Đã xác
              nhận</span>
          </div>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h4 class="text-lg font-bold text-gray-800 mb-4">Tour phổ biến</h4>
        <div class="space-y-3">
          <div class="flex items-center justify-between p-3 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg">
            <div>
              <p class="font-medium text-gray-800">🏖️ Tour Nha Trang</p>
              <p class="text-sm text-gray-600">128 bookings</p>
            </div>
            <div class="text-right">
              <p class="text-lg font-bold text-blue-600">4.8⭐</p>
            </div>
          </div>
          <div class="flex items-center justify-between p-3 bg-gradient-to-r from-green-50 to-green-100 rounded-lg">
            <div>
              <p class="font-medium text-gray-800">🏞️ Tour Sapa</p>
              <p class="text-sm text-gray-600">96 bookings</p>
            </div>
            <div class="text-right">
              <p class="text-lg font-bold text-green-600">4.9⭐</p>
            </div>
          </div>
          <div class="flex items-center justify-between p-3 bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg">
            <div>
              <p class="font-medium text-gray-800">🌊 Tour Hạ Long</p>
              <p class="text-sm text-gray-600">84 bookings</p>
            </div>
            <div class="text-right">
              <p class="text-lg font-bold text-purple-600">4.7⭐</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="customers-page" class="page-content hidden">
    <div class="bg-white rounded-xl shadow-lg p-6">
      <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-gray-800">Danh sách Khách hàng</h3>
        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors font-medium">
          + Thêm khách hàng </button>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Mã KH</th>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Họ tên</th>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Email</th>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Điện thoại</th>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Số tour đã đặt</th>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b hover:bg-gray-50">
              <td class="px-4 py-3 text-sm">KH001</td>
              <td class="px-4 py-3 text-sm font-medium">Nguyễn Văn A</td>
              <td class="px-4 py-3 text-sm">nguyenvana@email.com</td>
              <td class="px-4 py-3 text-sm">0901234567</td>
              <td class="px-4 py-3 text-sm">5 tour</td>
              <td class="px-4 py-3 text-sm">
                <button class="text-indigo-600 hover:text-indigo-800 mr-2">Xem</button>
                <button class="text-blue-600 hover:text-blue-800 mr-2">Sửa</button>
                <button class="text-red-600 hover:text-red-800">Xóa</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div id="categories-page" class="page-content hidden">
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h3 class="text-xl font-bold text-gray-800 mb-6">Danh mục Tour</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="card border-2 border-blue-200 rounded-lg p-4 hover:border-blue-400">
          <div class="text-4xl mb-2">🏖️</div>
          <h4 class="font-bold text-gray-800">Tour Biển</h4>
          <p class="text-sm text-gray-600">45 tours</p>
        </div>
        <div class="card border-2 border-green-200 rounded-lg p-4 hover:border-green-400">
          <div class="text-4xl mb-2">🏔️</div>
          <h4 class="font-bold text-gray-800">Tour Núi</h4>
          <p class="text-sm text-gray-600">32 tours</p>
        </div>
        <div class="card border-2 border-purple-200 rounded-lg p-4 hover:border-purple-400">
          <div class="text-4xl mb-2">🏙️</div>
          <h4 class="font-bold text-gray-800">Tour Thành phố</h4>
          <p class="text-sm text-gray-600">28 tours</p>
        </div>
      </div>
    </div>
  </div>
  <div id="tours-page" class="page-content hidden">
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h3 class="text-xl font-bold text-gray-800 mb-6">Quản lý Tour</h3>
      <p class="text-gray-600">Danh sách tất cả các tour du lịch</p>
    </div>
  </div>
  <div id="suppliers-page" class="page-content hidden">
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h3 class="text-xl font-bold text-gray-800 mb-6">Nhà cung cấp</h3>
      <p class="text-gray-600">Quản lý thông tin nhà cung cấp dịch vụ tour</p>
    </div>
  </div>
  <div id="requests-page" class="page-content hidden">
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h3 class="text-xl font-bold text-gray-800 mb-6">Yêu cầu đặc biệt</h3>
      <p class="text-gray-600">Danh sách các yêu cầu đặc biệt từ khách hàng</p>
    </div>
  </div>
  <div id="accounts-page" class="page-content hidden">
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h3 class="text-xl font-bold text-gray-800 mb-6">Tài khoản</h3>
      <p class="text-gray-600">Quản lý tài khoản người dùng hệ thống</p>
    </div>
  </div>
  <div id="guides-page" class="page-content hidden">
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h3 class="text-xl font-bold text-gray-800 mb-6">Hướng dẫn viên</h3>
      <p class="text-gray-600">Danh sách hướng dẫn viên du lịch</p>
    </div>
  </div>
  <div id="bookings-page" class="page-content hidden">
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h3 class="text-xl font-bold text-gray-800 mb-6">Booking</h3>
      <p class="text-gray-600">Quản lý toàn bộ booking tour</p>
    </div>
  </div>
  <div id="booking-status-page" class="page-content hidden">
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h3 class="text-xl font-bold text-gray-800 mb-6">Trạng thái Booking</h3>
      <p class="text-gray-600">Theo dõi trạng thái các booking</p>
    </div>
  </div>
</div>
</main>
</div>