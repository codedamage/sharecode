<?php
class Users extends Controller
{
    public  function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//            Process form
            $data =[
                'title' => 'Register account',
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => ''
            ];
//            Validate form
            if (empty($data['name']))
            {
                $data['name_error'] = 'Enter name!';
            }
            if (empty($data['email']))
            {
                $data['email_error'] = 'Enter email!';
            }
            else
            {
                if ($this->userModel->findUserByEmail($data['email']))
                {
                    $data['name_error'] = 'Email is taken!';
                }
            }
            if (empty($data['password']))
            {
                $data['password_error'] = 'Wrong password!';
            }
            elseif (strlen($data['password']) < 6)
            {
                $data['password_error'] = 'Password too short!';
            }
            if(empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']))
            {
//                Form prosess
                die('Success');
            }
            else
            {
//                Load viev with errors
                $this->view('users/register', $data);
            }
        }
        else
        {
//            Load form
            $data =[
              'title' => 'Register account',
              'name' => '',
              'email' => '',
              'password' => '',
              'confirm_password' => '',
              'name_error' => '',
              'email_error' => '',
              'password_error' => ''
            ];
//            Load view
            $this->view('users/register', $data);
        }
    }
    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
//            Process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//            Process form
            $data =[
                'title' => 'Login account',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => ''
            ];
//            Validate form
            if (empty($data['email']))
            {
                $data['name_error'] = 'Enter name!';
            }
            else
            {
                if ($this->userModel->findUserByEmail($data['email']))
                {
                    $data['name_error'] = 'Email is taken!';
                }
            }
            if (empty($data['password']))
            {
                $data['password_error'] = 'Wrong password!';
            }
            if(empty($data['email_error']) && empty($data['password_error']))
            {
//                Form prosess
                $this->view('pages/index', $data);
                die('Logged in!');
            }
            else
            {
//                Load viev with errors
                $this->view('users/login', $data);
            }
        }
        else
        {
//            Load from
            $data =[
                'title' => 'Login',
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];
//            Load view
            $this->view('users/login', $data);
        }
    }
}