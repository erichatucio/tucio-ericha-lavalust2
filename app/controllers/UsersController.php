<?php

class UsersController extends Controller
{
    public function index()
    {
        $this->call->database();
        $this->call->model('UsersModel');

        $users = $this->UsersModel->all();

        $this->call->view('users', [
            'users' => $users
        ]);
    }
}