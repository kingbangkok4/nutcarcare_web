<?php
header('Content-Type: text/html; charset=utf-8');
class Customer {

    public $sql;
    public function insert($data) {
        $this->sql = "INSERT INTO tb_customer (id, name, mobile, email) VALUES (NULL, '{$data["name"]}', '{$data["mobile"]}', '{$data["email"]}') ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
		//echo $this->sql;
    }

	public function insert_cust($data) {
         $this->sql = "INSERT INTO tb_customer (id, name, mobile, email) VALUES (NULL, '{$data["name"]}', '{$data["mobile"]}', '{$data["email"]}') ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }
	
	public function insert_car($cust_id) {
         $this->sql = " INSERT INTO tb_car (id, cust_id) VALUES (NULL, {$cust_id}) ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
    public function update($data) {      
        $this->sql = "UPDATE tb_customer SET name = '{$data["name"]}', mobile = '{$data["mobile"]}', email ='{$data["email"]}' WHERE id = {$data["id"]} ";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($condition) {
        $this->sql = "DELETE FROM tb_customer WHERE {$condition} ";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1 = 1 ") {
        $this->sql = " SELECT * FROM tb_customer WHERE $condition" ;
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
    }
	
	public function read_car($condition = " 1 = 1 ") {
        $this->sql = "SELECT * FROM tb_car WHERE $condition";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
    }

}
