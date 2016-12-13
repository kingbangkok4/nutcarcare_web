<?php
header('Content-Type: text/html; charset=utf-8');
class Service {

    public $sql;

    public function read($condition = " 1 = 1 ") {
        $this->sql = " SELECT * FROM tb_service WHERE $condition" ;
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
