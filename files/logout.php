<?php
session_start();
// 销毁所有会话变量
session_unset();
// 销毁会话
session_destroy();
?>