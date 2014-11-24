<?php
class Smarty{
	public   $vars=array();
	
	//用来替换预先定义好的内容
	function assign($key,$value){
		$this->vars[$key]=$value;
	}
		
	//html里面包含$变量时才需要调用的方法
	function display($fplfile){
		$s = explode('.',$fplfile);
		$comfile="con_".$s[0].".php";
		$content=file_get_contents($fplfile);
		$zz=array(
				
		'/\{\s*\$([a-zA-Z_][a-zA-Z0-9_]*)\s*\}/'
				
		);
		$rep=array(
				'<?php echo $this->vars["${1}"] ?>'
		); 
		$recontent =preg_replace($zz, $rep, $content);
		file_put_contents($comfile, $recontent);
		include $comfile;
	}
	
	
	//html直接替换字符串
	function diplay_char($fplfile,$a,$b)
	{
		$s = explode('.',$fplfile);
		$comfile="con_".$s[0].".php";
		$content=file_get_contents($fplfile);
		$recontent=str_replace($a,$b,$content);
		file_put_contents($comfile, $recontent);
		include $comfile;
	}
	
	//直接把html与PHP文件整合为一个新的文件
	function  ComAll($fplfile){
		$s = explode('.',$fplfile);
		$comfile="con_".$s[0].".php";
		$content=file_get_contents($fplfile);
		file_put_contents($comfile, $content);
		include $comfile;
	}
}
?>