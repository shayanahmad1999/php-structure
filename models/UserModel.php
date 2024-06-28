<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUsers() {
        $query = "SELECT * FROM users";
        $result = $this->db->query($query);
        return $this->db->fetchAll($result);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = " . $id;
        $result = $this->db->query($query);
        return $this->db->fetch($result);
    }

    public function addUser($name, $email, $password) {
        $name = $this->db->escapeString($name);
        $email = $this->db->escapeString($email);
        $password = $this->db->escapeString($password);

        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = $this->db->query($query);
        if ($result) {
            return true;
        } else {
            die('Error adding user: ' . mysqli_error($this->db->connection));
        }
    }

    public function updateUser($id, $name, $email) {
        $name = $this->db->escapeString($name);
        $email = $this->db->escapeString($email);

        $query = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
        $result = $this->db->query($query);
        if ($result) {
            return true;
        } else {
            die('Error updating user: ' . mysqli_error($this->db->connection));
        }
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = " . $id;
        $result = $this->db->query($query);
        if ($result) {
            return true;
        } else {
            die('Error deleting user: ' . mysqli_error($this->db->connection));
        }
    }
}
?>
