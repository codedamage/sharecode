<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->Model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = ['title' => 'Homepage', 'posts' => $posts];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = ['title' => 'About'];
        $this->view('pages/about', $data);
    }
}