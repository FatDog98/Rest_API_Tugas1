<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('authentication');
    }
    public function Back(): string
    {
        return view('authentication');
    }
    public function Login(): string
    {
        return view('login_page');
    }
    public function SignUp(): string
    {
        return view('signUp_page');
    }
    public function validation(): string
    {
        helper('form');
        $model = model('LoginModel');

        $Name = $this->request->getPost('Name');
        $Password = $this->request->getPost('Password');
        $save = $model->where('username', $Name)->first();

        $pass = $save['password'];

        if ($save) {
            if ($pass === $Password) {
                $session = session();
                $session->set('id', $save['id']);
                return view('todolist');
            } else {
                return $this->index();
            }
        } else {
            return $this->index();
        }

    }
    public function inputData(): string
    {
        helper('form');
        $model = model('LoginModel');
        $dataForm = $this->request->getPost(['Name']);
        $dataForm1 = $this->request->getPost(['Password']);
        $data = [
            'username' => $dataForm,
            'password' => $dataForm1
        ];
        $model->save($data);


        return view('login_page');
    }
}
