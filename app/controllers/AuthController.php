<?php
declare(strict_types=1);

class AuthController extends Controller
{
    public function showLogin(): void
    {
        if (is_logged_in()) {
            redirect('dashboard');
        }

        $this->view('auth/login', [
            'title' => 'Login | Voley Diloz',
            'scripts' => ['js/login.js'],
        ], 'auth');
    }

    public function loginApi(): void
    {
        $data = $this->requestData();
        $username = trim((string) ($data['username'] ?? ''));
        $password = (string) ($data['password'] ?? '');

        if ($username === '' || $password === '') {
            $this->json(['message' => 'Complete usuario y contrasena'], 422);
        }

        $usuarioModel = new Usuario();
        $user = $usuarioModel->findByUsername($username);

        if (!$user) {
            $this->json(['message' => 'Usuario no encontrado'], 401);
        }

        $storedPassword = (string) ($user['password'] ?? '');
        $validPassword = $password === $storedPassword || password_verify($password, $storedPassword);

        if (!$validPassword) {
            $this->json(['message' => 'Contrasena incorrecta'], 401);
        }

        $_SESSION['user'] = [
            'id' => (int) ($user['id_usuario'] ?? 0),
            'username' => (string) ($user['username'] ?? ''),
            'nombre' => (string) ($user['nombre_admin'] ?? $user['username'] ?? 'Administrador'),
        ];

        $this->json([
            'message' => 'Login correcto',
            'user' => $_SESSION['user'],
            'redirect' => app_url('dashboard'),
        ]);
    }

    public function sessionInfo(): void
    {
        if (!is_logged_in()) {
            $this->json(['authenticated' => false], 401);
        }

        $this->json([
            'authenticated' => true,
            'user' => $this->user(),
        ]);
    }

    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }

        session_destroy();
        redirect();
    }
}
