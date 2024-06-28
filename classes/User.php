<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUsers() {
        $query = "SELECT * FROM users";
        $result = $this->db->query($query);
        return $this->db->fetchAll($result);
    }
}
?>
