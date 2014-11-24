<?php
include_once ('samrty.class2.php');
//include('ManageDatabase.html');
// 创建smarty
$smarty = new Smarty ();
// 把html文件和php文件合并
$fplfile = 'ManageDatabase.html';
$s = explode ( '.', $fplfile );
$a = "server";
$b = 'http://anxing.wicp.net/UserSystem2/user/php/login2.php';
$smarty->diplay_char ( $fplfile, $a, $b ); 
?>
