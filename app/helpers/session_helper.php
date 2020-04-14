<?php
session_start();

//Session alert
function sessionAlert($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }

            if(!empty($_SESSION[$name. '_class'])){
                unset($_SESSION[$name. '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name. '_class'] = $class;
        } elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }
}
function navbarIdentifier()
{
    if (isset($_SESSION['user_id']))
    {
        echo '<a class="btn btn-light my-2 my-sm-0" href="'.URLROOT.'users/logout">Logout</a>';
    }
    else
    {
        echo '<a class="btn btn-light my-2 my-sm-0" href="'.URLROOT.'users/login">Login</a><a class="btn btn-light my-2 my-sm-0" href="'.URLROOT.'users/register">Register</a>';
    }
}
function isUserLoggedIn()
{
    if (isset($_SESSION['user_id']))
    {
        return true;
    }
}