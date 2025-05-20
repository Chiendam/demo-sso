<?php
class DashboardController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        require_once dirname(__DIR__). '/views/dashboard/index.php';
    }
}
?> 