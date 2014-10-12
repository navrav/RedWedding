<?php

include('servercon.php');

$u_id=$_REQUEST['u_id'];//当前登录者的id

$delete_id=$_REQUEST['delete_id'];//登录者要删除他的哪些朋友

//执行sql 查询  满足两个条件才能删除  登录主人和主人的朋友  

$sql="delete from `friends` where `ID_2`='".$delete_id."' and `ID_1`='".$u_id."'";


if(mysqli_query($dbconn, $sql)) echo 'ok';//如果成功执行了 sql语句 那么告诉浏览器 操作ok