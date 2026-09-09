<?php
class AuthController extends Controller
{
    public function login()
    {
        $session = load_class('session', 'libraries');
        $response = load_class('response', 'kernel');

        if ($session->has_userdata('is_logged_in') && $session->userdata('is_logged_in')) {
            $response->redirect('/products');
        }

        $this->call->view('login', [
            'error' => $session->flashdata('error') ?? '',
            'success' => $session->flashdata('success') ?? '',
        ]);
    }

    public function authenticate()
    {
        $session = load_class('session', 'libraries');
        $response = load_class('response', 'kernel');
        $request = load_class('request', 'kernel');

        $this->call->database();
        $this->call->model('UsersModel');

        $username = trim($request->post('username') ?? '');
        $password = trim($request->post('password') ?? '');

        if ($username === '' || $password === '') {
            $session->set_flashdata('error', 'Username and password are required.');
            $response->redirect('/login');
        }

        $user = $this->UsersModel->find_by('email', $username);
        if (!$user) {
            $user = $this->UsersModel->find_by('username', $username);
        }

        if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
            $session->set_userdata([
                'is_logged_in' => true,
                'user_id' => $user['id'],
                'username' => $user['username'] ?? $user['email'],
            ]);

            $session->set_flashdata('success', 'Welcome back, ' . ($user['username'] ?? $user['email']));
            $response->redirect('/products');
        }

        $session->set_flashdata('error', 'Invalid username or password.');
        $response->redirect('/login');
    }

    public function logout()
    {
        $session = load_class('session', 'libraries');
        $response = load_class('response', 'kernel');

        $session->sess_destroy();
        $response->redirect('/login');
    }
}
