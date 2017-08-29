<?php

include('./db.inc.php');

//获取link路径
function getCatePath($cid,&$result=array()){
	//引用数据库连接资源
	global $link;
	
	$sql = "SELECT * FROM category WHERE id=$cid";
	$rs = mysqli_query($link,$sql);
	
	$row = mysqli_fetch_assoc($rs);
	if($row){
		$result[] = $row;
		getCatePath($row['pid'],$result);
	}
	//数组顺序倒序
	krsort($result);
	
	return $result;
	
}

//$res = getCatePath(10);
//print_r($res);

//展示link路径
function displayCatePath($cid,$url="cate.php?cid="){
	
	$res = getCatePath($cid);
	
	$str = "";
	foreach($res as $key=>$val){
		$str .= "<a href='{$url}{$val['id']}'>{$val['catename']}</a>>";
	}
	
	return $str;
	
}

echo displayCatePath(10);
