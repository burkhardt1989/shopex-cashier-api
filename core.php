<?php
class core
{
	public function __construct()
	{
		include 'config.php';
		$this->config = $config;
		$this->db = $this->db();
	}

	public function db()
	{
		$db = new PDO($this->config['db']['dsn'], $this->config['db']['user'], $this->config['db']['password']);
		$db->query('set names utf8;');
		return $db;
	}


	public function getField($tableName, $param = array(), $order = array())
	{
		$where = '';
		if (!empty($param)) {
			$paramArr = array();
			foreach ($param as $key => $value) {
				// 如果是数组
				if (is_array($value)) {
					$paramArr[] = $key . " in ('" . implode(',', $value) . "')";
				} else {
					$paramArr[] = $key . " = '" . $value . "'";
				}
			}
			$where = 'where ' . implode(' and ', $paramArr);
		}
		$sql = "select * from {$tableName} {$where}";
		if (!empty($order)) {
			$orderArr = array();
			foreach ($order as $key => $value) {
				$orderArr[] = "{$key} {$value}";
			}
			$sql .= " order by " . implode(',', $orderArr); 
		}
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function getFields($tableName, $param = array(), $order = array())
	{
		$where = '';
		if (!empty($param)) {
			$paramArr = array();
			foreach ($param as $key => $value) {
				// 如果是数组
				if (is_array($value)) {
					$paramArr[] = $key . " in (" . implode(',', $value) . ")";
				} else {
					$paramArr[] = $key . " = '" . $value . "'";
				}
			}
			$where = 'where ' . implode(' and ', $paramArr);
		}
		$sql = "select * from {$tableName} {$where}";
		if (!empty($order)) {
			$orderArr = array();
			foreach ($order as $key => $value) {
				$orderArr[] = "{$key} {$value}";
			}
			$sql .= " order by " . implode(',', $orderArr); 
		}
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	// 新建数据
	public function rsave($tableName, $data)
	{
		$cols = $vals = array();
		foreach ($data as $k => $v) {
			$cols[] = $k;
			$vals[] = $v;
		}
		$sql = "insert into {$tableName} (" . implode(",", $cols) .") values (" . implode("' '", $vals) . ")";
		$prepare = $this->db->prepare($sql);
		return $prepare->execute();
	}
}