<?php

class User {

    public $sql;

    public function insert($name, $picture, $price) {
        $this->sql = "INSERT INTO user(`id`, `name`, `picture`, `price`) VALUES (NULL, '{$name}', '{$picture}', '{$price}')";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update($set, $condition) {
        $this->sql = "UPDATE user SET {$set} WHERE {$condition}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($condition) {
        $this->sql = "DELETE FROM user WHERE {$condition}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition) {
        $this->sql = "SELECT * FROM user WHERE $condition";
        $query = mysql_query($this->sql);
        if ($query) {
            return mysql_fetch_array($query, MYSQL_ASSOC);
        } else {
            return false;
        }
    }

}
