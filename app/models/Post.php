<?php
class Post
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getPosts()
    {
        $this->db->query('SELECT *, posts.id AS postId, users.id AS userId FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC');
        return $this->db->resultSet();
    }
    public function getCurrentUserPosts()
    {
        $this->db->query('SELECT * FROM posts WHERE user_id = :currentuser');
        $this->db->bind(':currentuser', $_SESSION['user_id']);
        return $this->db->resultSet();
    }
    public  function addPost($data)
    {
        $this->db->query('INSERT posts (title, description, user_id, body) VALUES (:title, :description, :user_id, :body)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);
        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}