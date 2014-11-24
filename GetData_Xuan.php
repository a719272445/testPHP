<?php
$DealMessage = "";
// 解析信息From Xuan
// 使用功能强大的curl
function GetDataForXuan() {
	$AllMassage = ""; // 用来返回数据
	$ch = curl_init ();
	curl_setopt ( $ch, CURLOPT_URL, 'http://192.168.16.43:8888/name' );
	curl_setopt ( $ch, CURLOPT_RANGE, '0-500' );
	curl_setopt ( $ch, CURLOPT_BINARYTRANSFER, 1 );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	$result = curl_exec ( $ch );
	curl_close ( $ch );
	// 解析获取的字符串
	$getstring = str_replace ( array (
			"{",
			"}",
			"[",
			"]" 
	), "", ( string ) $result );
	$s = explode ( ',', $getstring );
	// echo 'xuan的数据（ZhangSan）：' . "<br />";
	$AllMassage = 'Xuan的数据：,';
	for($i = 0; $i < count ( $s ); $i ++) {
		$s2 = str_replace ( "\"", "", ( string ) $s [$i] );
		// echo $s2 . "<br />\n";
		$AllMassage = $AllMassage . $s2 . ',';
	}
	return $AllMassage;
}
// 检查从html收到的参数觉得是否执行函数
if (isset ( $_POST ['act_Xuan'] )) {
	$GetDataFor = $_POST ['act_Xuan'];
	if ($GetDataFor == 1) {
		$DealMessage = GetDataForXuan ();
		echo $DealMessage;
	}
}

// 给凯旋发送一个插入指令
function http_post_data($url, $data_string) {
	$ch = curl_init ();
	curl_setopt ( $ch, CURLOPT_POST, 1 );
	curl_setopt ( $ch, CURLOPT_URL, $url );
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data_string );
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
			'Content-Type: application/json; charset=utf-8',
			'Content-Length: ' . strlen ( $data_string ) 
	) );
	ob_start ();
	curl_exec ( $ch );
	$return_content = ob_get_contents ();
	ob_end_clean ();
	
	$return_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
	return array (
			$return_code,
			$return_content 
	);
}

// 检查从html收到的参数判断是否执行函数
if (isset ( $_POST ['change'] )) {
	$GetDataFor = $_POST ['change'];
	$Name_X = $_POST ['Name_Xuan'];
	$Edition_X = $_POST ['Editon_Xuan'];
	if ($GetDataFor == 1) {
		$name = array (
				"name" => $Name_X,
				"edition" => $Edition_X 
		)
		// "age" => "22"
		;
		$SendData = json_encode ( $name );
		$url = "http://192.168.16.43:8888/insert";
		$data = $SendData;
		list ( $return_code, $return_content ) = http_post_data ( $url, $data );
	}
	echo '发送成功';
}

// 连接珍的数据库
// 获取信息for zhen
/* 连接Mongo */
function GetData_Zhen() {
	try {
		$m = new MongoClient ( "192.168.16.44" );
		echo '连接成功' . "\r\n".'From Zhen(mongo)' . "!\r\n";
	} catch ( Exception $e1 ) {
		echo '连接失败';
	}
	// 选择TestForFeng数据库，如果以前没该数据库会自动创建，也可以用$m->selectDB("TestForFeng");
	$db = $m->Testdb;
	// 选择TestForFeng里面的collection集合，相当于RDBMS里面的表，也-可以使用
	$collection = $db->Testcollection;
	$cursor = $collection->find ();
	$DataForZhen="";               //用来存放Zhen的数据
	// 遍历所有集合中的文档
	foreach ( $cursor as $obj ) {
		//echo 'name:' . $obj ["name"] . '      ' . 'sex:' . $obj ["sex"] . '      ' . 'age:' . $obj ["age"] . "<br />\n";
		$DataForZhen=$DataForZhen.'name:' . $obj ["name"] . ';' . 'sex:' . $obj ["sex"] . ';' . 'age:' . $obj ["age"] . ",";
	}
	// 断开MongoDB连接
	$m->close ();
	return $DataForZhen;
}
// 根据参数获取Zhen的数据
if (isset ( $_POST ['act_Zhen'] )) {
	$GetDataFor = $_POST ['act_Zhen'];
	if ($GetDataFor == 1) {
		$DealMessage = GetData_Zhen();
		echo $DealMessage;
	}
}

?>