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
}