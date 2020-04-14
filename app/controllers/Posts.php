<?php
class Posts extends Controller
{
    public function __construct()
    {
        if (!isUserLoggedIn())
        {
            sessionAlert('access_denied', 'Log in to reach this area', 'alert alert-danger');
            redirect('users/login');

        }
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'Snippets',
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }
}