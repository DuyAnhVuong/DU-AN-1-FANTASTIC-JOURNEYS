<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/DU-AN-1-FANTASTIC-JOURNEYS/');

//đường dẫn vào đường admin
define('BASE_URL_ADMIN'       , 'http://localhost/DU-AN-1-FANTASTIC-JOURNEYS/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'du-an-1-fantastic-journeys');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
