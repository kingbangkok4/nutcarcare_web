<?php

class Order {

    public function insert($data) {
        $this->sql = "INSERT INTO `tb_order` (`id`, `cust_id`, `order_detail`, `price`, `order_by`) VALUES (NULL, {$data["cust_id"]}, '{$data["order_detail"]}', {$data["price"]}, '{$data["order_by"]}') ";
        $query = mysql_query($this->sql);
        if ($query) {
			return mysql_insert_id();
        } else {
            return false;
        }
    }
	//insert_sum_service
    public function insert_sum_service($data) {
        $this->sql = " INSERT INTO `tb_sum_service` (`id`, `name`, `ref_orderId`) VALUES (NULL, '{$data["name"]}', {$data["ref_orderId"]}) ";
        $query = mysql_query($this->sql);
        if ($query) {
			return true;
        } else {
            return false;
        }
    }
	
    public function update_car($data) {
        $this->sql = " UPDATE tb_car SET license_plate = '{$data["license_plate"]}', 
										brand = '{$data["brand"]}', 
										type = '{$data["type"]}', 
										color = '{$data["color"]}', 
										scar = '{$data["scar"]}', 
										front_image = '{$data["front_image"]}', 
										left_image = '{$data["left_image"]}', 
										right_image = '{$data["right_image"]}', 
										behide_image = '{$data["behide_image"]}', 
										top_image = '{$data["top_image"]}' 
										WHERE cust_id = {$data["cust_id"]} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function recive_car($id, $img_signature) {
        $this->sql = "UPDATE tb_order SET status = 3, signature_cust_image = '{$img_signature}'  WHERE id = {$id} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_status($id, $status) {
        $this->sql = "UPDATE tb_order SET status = {$status} WHERE id ={$id} ";
        $query1 = mysql_query($this->sql);
		
		$this->sql = "DELETE tb_sum_service WHERE ref_orderId ={$id} ";
        $query2 = mysql_query($this->sql);
		
        if ($query1 == true && $query2 == true) {
            return true;
        } else {
            return false;
        }
    }

	public function update_print($condition) {
        $this->sql = "UPDATE tb_order SET print = 1 WHERE {$condition} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
    public function delete($condition) {
        $this->sql = "DELETE FROM `tb_order` WHERE {$condition} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1 = 1 ") {                          
        $this->sql = "SELECT tb_order.id, tb_customer.name, tb_customer.email, tb_customer.mobile, tb_car.color, tb_car.type, tb_car.brand, tb_car.license_plate, tb_order.order_detail, tb_order.price, tb_order.order_date, tb_order.status, tb_order.signature_cust_image FROM tb_order LEFT OUTER JOIN tb_customer ON tb_order.cust_id = tb_customer.id LEFT OUTER JOIN tb_car ON tb_customer.id = tb_car.cust_id WHERE {$condition} ORDER BY tb_order.id DESC ";
        //echo $this->sql;
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
	
    public function read_sum_service($condition = " 1 = 1 ") {                          
        $this->sql = " SELECT name, count(*) as qty  FROM `tb_sum_service` where {$condition} group by name order by count(*) desc ";
        //echo $this->sql;
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
	
	public function read_top10($condition = " 1 = 1 ") {                          
        $this->sql = " SELECT tb_customer.name, tb_customer.email, tb_customer.mobile, COUNT(tb_order.id) AS sum_order FROM tb_order LEFT OUTER JOIN tb_customer ON tb_order.cust_id = tb_customer.id WHERE {$condition} GROUP BY tb_customer.name, tb_customer.email, tb_customer.mobile ORDER BY COUNT(tb_order.id) DESC ";
        //echo $this->sql;
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
	public function readAccount($condition = " 1 = 1 ") {
		/*$this->sql = "SELECT DATE_FORMAT(order_date,'%d/%m/%Y') AS order_date, SUM(price) As price, order_detail  FROM `tb_order`	
					  WHERE $condition	GROUP BY DATE_FORMAT(order_date,'%d/%m/%Y')";*/
		$this->sql = "SELECT DATE_FORMAT(order_date,'%Y-%m-%d %H:%i:%s') AS order_date, price, order_detail  FROM `tb_order`	
					  WHERE $condition ORDER BY order_date ";
		//echo $this->sql;
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
