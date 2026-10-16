<?php
$conn=new mysqli("localhost","root","Dai5432112345","2025-5-7");
if(!$conn){
    die("登录失败".$conn->connect_error);
}
$conn->query("set names utf8");
date_default_timezone_set("PRC");
?>
