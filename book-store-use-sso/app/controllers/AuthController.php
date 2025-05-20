<?php
require_once dirname(__DIR__) . '/models/User.php';
require_once dirname(__DIR__) . '/config/database.php';

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                return ['error' => 'Please fill in all fields'];
            }

            $result = $this->user->login($username, $password);
            if ($result) {
                session_start();
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                header('Location: /dashboard');
                exit;
            } else {
                return ['error' => 'Invalid username or password'];
            }
        }
        require_once dirname(__DIR__) . '/views/auth/login.php';
    }

    public function redirectToSSO() {
        $ssoUrl = SSO_URL . '/auth/authorize';
        $params = [
            'client_id' => SSO_CLIENT_ID,
            'redirect_uri' => APP_URL . SSO_CALLBACK_URL,
            'response_type' => 'code',
            'scope' => '',
        ];
        $ssoUrl .= '?' . http_build_query($params);
        header('Location: ' . $ssoUrl);
        exit;
    }

    public function handleCallback() {
        $code = $_GET['code'] ?? '';
        var_dump($code);
        exit;
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
?> 