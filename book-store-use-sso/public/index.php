<?php
require_once dirname(__DIR__) . '/app/config/config.php';
session_start();

// Simple router
$request = $_SERVER['REQUEST_URI'];

// Remove query string
$request = strtok($request, '?');

// Debug information
error_log("Request URI: " . $request);

// Route the request
switch ($request) {
    case '':
    case BASE_URL:
        require APP_ROOT . '/app/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;

    case LOGIN_URL:
        require APP_ROOT . '/app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;

    case LOGOUT_URL:
        require APP_ROOT . '/app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;

    case DASHBOARD_URL:
        require APP_ROOT . '/app/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;

    case SSO_REDIRECT_URL:
        require APP_ROOT . '/app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->redirectToSSO();
        break;

    case SSO_CALLBACK_URL:
        require APP_ROOT . '/app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->handleCallback();
        break;

    default:
        http_response_code(404);
        echo '404 - Page Not Found';
        break;
}
?> 