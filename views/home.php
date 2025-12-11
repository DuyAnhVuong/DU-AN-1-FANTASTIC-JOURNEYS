<!doctype html>
<html lang="vi" class="h-full">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tour Guide Home Dashboard</title>
  <script src="/_sdk/element_sdk.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <style>
        body {
            box-sizing: border-box;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .app-wrapper {
            width: 100%;
            height: 100%;
            overflow:auto;
        }
        
        .menu-item {
            transition: all 0.2s ease;
            cursor: pointer;
            text-decoration: none;
        }
        
        .menu-item:hover {
            transform: translateY(-2px);
        }
        
        .icon-wrapper {
            transition: transform 0.3s ease;
        }
    </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body class="h-full">
  <div class="app-wrapper" id="app"><!-- Menu Bar -->
   <nav>
    <div class="flex items-center justify-between px-6 py-4 shadow-md"><!-- Logo/Title -->
     <div class="flex items-center gap-3">
      <div class="icon-wrapper w-10 h-10 rounded-lg flex items-center justify-center">
       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
       </svg>
      </div>
      <h1 id="menu-title" class="text-xl font-bold whitespace-nowrap">Tour Guide</h1>
     </div><!-- User Info -->
     <div class="flex items-center gap-3">
      <div class="text-right hidden sm:block">
       <p class="text-sm font-medium" id="user-name">Nguyễn Văn A</p>
       <p class="text-xs" id="user-role">Hướng dẫn viên</p>
      </div>
      <div class="user-avatar w-10 h-10 rounded-full flex items-center justify-center font-semibold">
       HDV
      </div>
     </div>
    </div>
   </nav><!-- Main Content -->
   <main class="p-6"><!-- Welcome Section -->
    <div class="mb-8">
     <h2 id="page-title" class="text-3xl font-bold mb-2">Hướng Dẫn Viên</h2>
     <p id="welcome-text" class="text-lg">Chào mừng trở lại</p>
    </div><!-- Dashboard Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full mx-auto"><!-- Xem Tour --> <a href="#xem-tour" class="menu-item rounded-xl p-6 shadow-lg border-2 transition-all">
      <div class="flex items-start gap-4">
       <div class="icon-card w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
        </svg>
       </div>
       <div class="flex-1">
        <h3 id="view-tour-label" class="text-xl font-semibold mb-1">Xem Tour</h3>
        <p class="text-sm description-text">Xem chi tiết lịch trình và thông tin tour</p>
       </div>
      </div></a> <!-- Danh Sách Khách --> <a href="#danh-sach-khach" class="menu-item rounded-xl p-6 shadow-lg border-2 transition-all">
      <div class="flex items-start gap-4">
       <div class="icon-card w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
       </div>
       <div class="flex-1">
        <h3 id="guest-list-label" class="text-xl font-semibold mb-1">Danh Sách Khách</h3>
        <p class="text-sm description-text">Quản lý thông tin khách tham gia tour</p>
       </div>
      </div></a> <!-- Nhật Ký Tour --> <a href="#nhat-ky-tour" class="menu-item rounded-xl p-6 shadow-lg border-2 transition-all">
      <div class="flex items-start gap-4">
       <div class="icon-card w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
       </div>
       <div class="flex-1">
        <h3 id="tour-diary-label" class="text-xl font-semibold mb-1">Nhật Ký Tour</h3>
        <p class="text-sm description-text">Ghi chú và cập nhật tiến độ tour</p>
       </div>
      </div></a> <!-- Check In --> <a href="#check-in" class="menu-item rounded-xl p-6 shadow-lg border-2 transition-all">
      <div class="flex items-start gap-4">
       <div class="icon-card w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
        </svg>
       </div>
       <div class="flex-1">
        <h3 id="check-in-label" class="text-xl font-semibold mb-1">Check In</h3>
        <p class="text-sm description-text">Điểm danh khách tại các điểm dừng</p>
       </div>
      </div></a> <!-- Yêu Cầu Đặc Biệt --> <a href="#yeu-cau-dac-biet" class="menu-item rounded-xl p-6 shadow-lg border-2 transition-all">
      <div class="flex items-start gap-4">
       <div class="icon-card w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
       </div>
       <div class="flex-1">
        <h3 id="special-requests-label" class="text-xl font-semibold mb-1">Yêu Cầu Đặc Biệt</h3>
        <p class="text-sm description-text">Theo dõi yêu cầu đặc biệt của khách</p>
       </div>
      </div></a> <!-- Hồ Sơ Cá Nhân --> <a href="#ho-so" class="menu-item rounded-xl p-6 shadow-lg border-2 transition-all">
      <div class="flex items-start gap-4">
       <div class="icon-card w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
       </div>
       <div class="flex-1">
        <h3 id="profile-label" class="text-xl font-semibold mb-1">Hồ Sơ Cá Nhân</h3>
        <p class="text-sm description-text">Xem và cập nhật thông tin cá nhân</p>
       </div>
      </div></a>
    </div>
   </main>
  </div>
  <script>
        const defaultConfig = {
            background_color: '#f8fafc',
            menu_background: '#ffffff',
            card_background: '#ffffff',
            text_color: '#1e293b',
            secondary_text: '#64748b',
            accent_color: '#3b82f6',
            page_title: 'Hướng Dẫn Viên',
            welcome_text: 'Chào mừng trở lại',
            view_tour_label: 'Xem Tour',
            guest_list_label: 'Danh Sách Khách',
            tour_diary_label: 'Nhật Ký Tour',
            check_in_label: 'Check In',
            special_requests_label: 'Yêu Cầu Đặc Biệt',
            profile_label: 'Hồ Sơ Cá Nhân',
            font_family: 'Inter',
            font_size: 16
        };

        async function onConfigChange(config) {
            const body = document.body;
            const appWrapper = document.getElementById('app');
            const nav = appWrapper.querySelector('nav > div');
            const menuItems = document.querySelectorAll('.menu-item');
            const iconWrapper = document.querySelector('.icon-wrapper');
            const userAvatar = document.querySelector('.user-avatar');
            const iconCards = document.querySelectorAll('.icon-card');
            const menuTitle = document.getElementById('menu-title');
            const pageTitle = document.getElementById('page-title');
            const welcomeText = document.getElementById('welcome-text');
            const viewTourLabel = document.getElementById('view-tour-label');
            const guestListLabel = document.getElementById('guest-list-label');
            const tourDiaryLabel = document.getElementById('tour-diary-label');
            const checkInLabel = document.getElementById('check-in-label');
            const specialRequestsLabel = document.getElementById('special-requests-label');
            const profileLabel = document.getElementById('profile-label');
            const userName = document.getElementById('user-name');
            const userRole = document.getElementById('user-role');

            const backgroundColor = config.background_color || defaultConfig.background_color;
            const menuBackground = config.menu_background || defaultConfig.menu_background;
            const cardBackground = config.card_background || defaultConfig.card_background;
            const textColor = config.text_color || defaultConfig.text_color;
            const secondaryText = config.secondary_text || defaultConfig.secondary_text;
            const accentColor = config.accent_color || defaultConfig.accent_color;
            const customFont = config.font_family || defaultConfig.font_family;
            const baseSize = config.font_size || defaultConfig.font_size;

            body.style.backgroundColor = backgroundColor;
            appWrapper.style.backgroundColor = backgroundColor;
            nav.style.backgroundColor = menuBackground;

            menuItems.forEach(item => {
                item.style.backgroundColor = cardBackground;
                item.style.borderColor = secondaryText + '30';
            });

            if (iconWrapper) {
                iconWrapper.style.backgroundColor = accentColor + '20';
                iconWrapper.style.color = accentColor;
            }

            if (userAvatar) {
                userAvatar.style.backgroundColor = accentColor;
                userAvatar.style.color = '#ffffff';
            }

            iconCards.forEach(icon => {
                icon.style.backgroundColor = accentColor + '15';
                icon.style.color = accentColor;
            });

            menuTitle.textContent = 'Tour Guide';
            menuTitle.style.color = textColor;
            menuTitle.style.fontFamily = `${customFont}, Arial, sans-serif`;
            menuTitle.style.fontSize = `${baseSize * 1.25}px`;

            pageTitle.textContent = config.page_title || defaultConfig.page_title;
            pageTitle.style.color = textColor;
            pageTitle.style.fontFamily = `${customFont}, Arial, sans-serif`;
            pageTitle.style.fontSize = `${baseSize * 1.875}px`;

            welcomeText.textContent = config.welcome_text || defaultConfig.welcome_text;
            welcomeText.style.color = secondaryText;
            welcomeText.style.fontFamily = `${customFont}, Arial, sans-serif`;
            welcomeText.style.fontSize = `${baseSize * 1.125}px`;

            viewTourLabel.textContent = config.view_tour_label || defaultConfig.view_tour_label;
            guestListLabel.textContent = config.guest_list_label || defaultConfig.guest_list_label;
            tourDiaryLabel.textContent = config.tour_diary_label || defaultConfig.tour_diary_label;
            checkInLabel.textContent = config.check_in_label || defaultConfig.check_in_label;
            specialRequestsLabel.textContent = config.special_requests_label || defaultConfig.special_requests_label;
            profileLabel.textContent = config.profile_label || defaultConfig.profile_label;

            const allLabels = [viewTourLabel, guestListLabel, tourDiaryLabel, checkInLabel, specialRequestsLabel, profileLabel];
            allLabels.forEach(label => {
                label.style.color = textColor;
                label.style.fontFamily = `${customFont}, Arial, sans-serif`;
                label.style.fontSize = `${baseSize * 1.25}px`;
            });

            if (userName) {
                userName.style.color = textColor;
                userName.style.fontFamily = `${customFont}, Arial, sans-serif`;
                userName.style.fontSize = `${baseSize * 0.875}px`;
            }

            if (userRole) {
                userRole.style.color = secondaryText;
                userRole.style.fontFamily = `${customFont}, Arial, sans-serif`;
                userRole.style.fontSize = `${baseSize * 0.75}px`;
            }

            const descriptions = document.querySelectorAll('.description-text');
            descriptions.forEach(desc => {
                desc.style.color = secondaryText;
                desc.style.fontFamily = `${customFont}, Arial, sans-serif`;
                desc.style.fontSize = `${baseSize * 0.875}px`;
            });
        }

        function mapToCapabilities(config) {
            return {
                recolorables: [
                    {
                        get: () => config.background_color || defaultConfig.background_color,
                        set: (value) => {
                            config.background_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ background_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.card_background || defaultConfig.card_background,
                        set: (value) => {
                            config.card_background = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ card_background: value });
                            }
                        }
                    },
                    {
                        get: () => config.text_color || defaultConfig.text_color,
                        set: (value) => {
                            config.text_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ text_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.accent_color || defaultConfig.accent_color,
                        set: (value) => {
                            config.accent_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ accent_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.secondary_text || defaultConfig.secondary_text,
                        set: (value) => {
                            config.secondary_text = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ secondary_text: value });
                            }
                        }
                    }
                ],
                borderables: [],
                fontEditable: {
                    get: () => config.font_family || defaultConfig.font_family,
                    set: (value) => {
                        config.font_family = value;
                        if (window.elementSdk) {
                            window.elementSdk.setConfig({ font_family: value });
                        }
                    }
                },
                fontSizeable: {
                    get: () => config.font_size || defaultConfig.font_size,
                    set: (value) => {
                        config.font_size = value;
                        if (window.elementSdk) {
                            window.elementSdk.setConfig({ font_size: value });
                        }
                    }
                }
            };
        }

        function mapToEditPanelValues(config) {
            return new Map([
                ['page_title', config.page_title || defaultConfig.page_title],
                ['welcome_text', config.welcome_text || defaultConfig.welcome_text],
                ['view_tour_label', config.view_tour_label || defaultConfig.view_tour_label],
                ['guest_list_label', config.guest_list_label || defaultConfig.guest_list_label],
                ['tour_diary_label', config.tour_diary_label || defaultConfig.tour_diary_label],
                ['check_in_label', config.check_in_label || defaultConfig.check_in_label],
                ['special_requests_label', config.special_requests_label || defaultConfig.special_requests_label],
                ['profile_label', config.profile_label || defaultConfig.profile_label]
            ]);
        }

        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange,
                mapToCapabilities,
                mapToEditPanelValues
            });
        }
    </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9ac1d780208404fe',t:'MTc2NTQyMzE4MS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>