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
//                Form process
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data))
                {
                    sessionAlert('register_success', 'You successfully registered account, now you can log in.');
                    redirect('users/login');
                }
                else
                {
                    die('Fail, problems on our side, try again later!');
                }


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
//          Check user email field fill
            if (empty($data['email']))
            {
                $data['name_error'] = 'Enter name!';
            }
//          Check user pass field fill
            if (empty($data['password']))
            {
                $data['password_error'] = 'Wrong password!';
            }
 //         Check for user/email
            if($this->userModel->findUserByEmail($data['email'])){
//          User found
            } else {
//              User not found
                $data['email_error'] = 'No user found';
            }
            if(empty($data['email_error']) && empty($data['password_error']))
            {
//          Form process
//          Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser)
                {
//          Create session
                    $this->createUserSession($loggedInUser);
                }
                else
                {
                    $data['password_error'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            }
            else
            {
//                Load view with errors
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
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        redirect('posts');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('users/login');
    }
}