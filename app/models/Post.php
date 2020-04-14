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
}