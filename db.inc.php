<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = '123456';
$db_name = 'category';

$link = mysqli_connect($db_host,$db_user,$db_password,$db_name) or die(mysqli_error());

mysqli_query($link,'set names utf8') or die('编码设置错误');


