<?php
// Database Configuration
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '33061');
define('DB_NAME', 'sso-basic');
define('DB_USER', 'root');
define('DB_PASS', '');

// Application Configuration
define('APP_NAME', 'Book Store SSO');
define('APP_URL', 'http://127.0.0.1:8088');
define('APP_ROOT', dirname(dirname(__DIR__)));

define('SSO_URL', 'http://127.0.0.1:8000');
define('SSO_CLIENT_ID', '0196dd2a-403c-7087-8008-c8bed32b710d');
define('SSO_CLIENT_SECRET', '$2y$12$v1BoQft4/i3.YFwd3UmlB.qNgnFsFywVa20E7EXm9/m17wYLeY6B2');

// Session Configuration
define('SESSION_LIFETIME', 3600); // 1 hour
define('SESSION_NAME', 'bookstore_session');

// Security Configuration
define('HASH_COST', 12); // For password_hash()

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Time Zone
date_default_timezone_set('Asia/Ho_Chi_Minh');

// URL Configuration
define('BASE_URL', '/');
define('LOGIN_URL', '/login');
define('DASHBOARD_URL', '/dashboard');
define('LOGOUT_URL', '/logout');
define('SSO_REDIRECT_URL', '/auth/redirect');
define('SSO_CALLBACK_URL', '/auth/callback');

// File Upload Configuration
define('UPLOAD_DIR', APP_ROOT . '/public/uploads');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_FILE_TYPES', ['jpg', 'jpeg', 'png', 'gif']);

// Pagination Configuration
define('ITEMS_PER_PAGE', 10);

// Cache Configuration
define('CACHE_ENABLED', true);
define('CACHE_DIR', APP_ROOT . '/cache');
define('CACHE_LIFETIME', 3600); // 1 hour
?> 