<?php 
	function showState($stateId)
	{	
		//加载自定义文件方式
		//1.创建
		switch ($stateId) {
			case '1':
				echo '正常状态';
				break;
			case '2':
				echo '激活状态';
			
			default:
				echo '未知状态';
				break;
		}
	}

	function getNameByPid($id)
	{
		return DB::table('ycate')->where('pid',$id)->first()['name'];
	}

 ?>