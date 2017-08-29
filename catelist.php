<?php

include('./db.inc.php');

//获取下拉列表数据
function getList($pid=0,&$result=array(),$spac=0){
	//引用数据库连接资源
	global $link;
	
	$spac = $spac+2;
	
	$sql = "SELECT * FROM category WHERE pid=$pid";
	$res = mysqli_query($link,$sql);
	
	while($row = mysqli_fetch_assoc($res)){	
	
		$row['catename'] = str_repeat('&nbsp;&nbsp;',$spac)."|--".$row['catename'];
		$result[] = $row;
		getList($row['id'],$result,$spac);
	
	}
	
	return $result;
	
}

$rs = getList();
//print_r($rs);


//拼接成下拉select列表 
function displayCate($pid=0,$selected=0){
	
	$rs = getList($pid);
	
	$str = "";
	$str .= "<select name='cate'>";
	foreach($rs as $key=>$val){
		/* //判断是否选中
		$seletedstr = "";
		if($val['id'] == $selected){
			$selectedstr = "selected";
		} */
		$str .= "<option value='".$val['id']."'>".$val['catename']."</option>";
	}
	$str .= "</select>";
	return $str;
	
}

echo displayCate();