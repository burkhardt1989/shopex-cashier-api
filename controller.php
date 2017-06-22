<?php
include 'core.php';

class controller
{
	public function __construct()
	{
		$this->core = new core();
	}

	// api列表
	public function index()
	{
		// 开始时间/结束时间
		$startTime = !empty($_GET['startTime']) ? $_GET['startTime'] : '1970-01-01 00:00:00';
		$endTime = !empty($_GET['endTime']) ? $_GET['endTime'] : date('Y-m-d H:i:s');
		$param = array();
		// 状态
		if (isset($_GET['status']) && $_GET['status'] !== '') {
			$param['status'] = $_GET['status'];
		}
		$list = $this->core->getFields('api', $param);
		foreach ($list as $k => $v) {
			$list[$k]['statusName'] = $this->statusName($v['status']);
		}
		foreach ($list as $k => $v) {
			if ($v['create_time'] < $startTime || $v['create_time'] >= $endTime) {
				unset($list[$k]);
			}
		}
		include 'view/list.php';
	}

	public function statusName($status)
	{
		$map = array(
			0 => '未完成',
			1 => '已完成',
			2 => '修改中',
		);
		return $map[$status];
	}
}