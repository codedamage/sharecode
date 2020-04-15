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
        $posts = $this->postModel->getCurrentUserPosts();
        $data = [
            'title' => 'Snippets',
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => '',
                'description_error' => ''
            ];
//            VALIDATE FIELDS
            if (empty($data['title']))
            {
                $data['title_error'] = 'Title error';
            }
            if (empty($data['description']))
            {
                $data['description_error'] = 'Description error';
            }
            if (empty($data['title_error']) && empty($data['title_error']))
            {
//            Form valid
                if ($this->postModel->addPost($data))
                {
                    sessionAlert('snippet_added', 'Snippet submitted');
                    $this->view('posts/single', $data);
                }
                else
                {
                    sessionAlert('snippet_not_added', 'Snippet not submitted, error on our side :(');
                    $this->view('posts/add', $data);
                }
            }
            else
            {
                $this->view('posts/add', $data);
            }
        }
        else
        {
            $data = [
                'title' => 'Add snippet',
                'body' => ''
            ];
            $this->view('posts/add', $data);
        }
    }
    public function single($id)
    {
        
    }
}