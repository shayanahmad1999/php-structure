<?php
class Database {
    private $connection;

    public function __construct() {
        $this->connection = db_connect();
    }

    public function query($query) {
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die('Query failed: ' . mysqli_error($this->connection));
        }
        return $result;
    }

    public function fetchAll($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function fetch($result) {
        return mysqli_fetch_assoc($result);
    }

    public function escapeString($string) {
        return mysqli_real_escape_string($this->connection, $string);
    }

    public function getLastInsertedId() {
        return mysqli_insert_id($this->connection);
    }
}
?>
