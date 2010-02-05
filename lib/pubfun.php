<?php
/*
 * public function
 */
if (!function_exists('linux_path')){
	function linux_path($path){
		return str_replace("\\","/",$path);
	} 
}

define(LIB_PATH, linux_path(dirname(__FILE__)) .'/');

function debug_info($msg,$type='php') {
	if(get_config('debug_tag') === false){
		return;
	};
	if($type == 'php'){
		echo '<font style="color:red;">' .$msg .'</font>';
	}else
	{
		alert($msg);
	}
}

function display_error($msg) {
	echo '<font style="color:red;">' .$msg .'</font>';;
}
	
define("ROOT_PATH", "/");
function redirect($url, $type='js')
{
  if($type == 'js'){
	 echo "<script LANGUAGE=\"Javascript\">"; 
	 echo "location.href='$url';"; 
	 echo "</script>"; 		
  }elseif($type== 'header'){
  	header("Location: " . $url); 
  }
  
}

function get_current_url()
{
	return  "http://" .$_SERVER[HTTP_HOST] .$_SERVER[REQUEST_URI];
}

function get_microtime(){ 
   list($usec, $sec) = explode(" ",microtime()); 
   return ((float)$usec + (float)$sec); 
} 

function now(){
	return date("Y-m-d H:i:s");
}

function alert($msg)
{
  $msg = str_replace("'", "\'", $msg);
  echo "<script LANGUAGE=\"Javascript\">"; 
  echo "alert('$msg');"; 
  echo "</script>"; 		
}

function rand_str($len=10){
  	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ";
  	$ret = "";
  	for($i=0;$i < $len; $i++){
  		$ret .= $str{mt_rand(0,61)};
  	}
  	return $ret;
  }

function is_ajax(){
	return strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=="xmlhttprequest" ? true : false;
}

function write_to_file($filename,$content,$mode='a'){
	$fp = fopen($filename, $mode);
	fwrite($fp,$content);
	fclose($fp);
	return true;
}

//work only with jquery frame work


function check_db($server_name,$user_name,$password,$db_type='mysql'){
	if($db_type == 'mysql'){
		$ret = @mysql_connect($server_name,$user_name,$password);			
	}else if($db_type == 'mssql'){
		$param = array('UID' => $user_name,'PWD' => $password);
		$ret = sqlsrv_connect($this->servername,$param);
	}
	if(is_resource($ret)){
		mysql_close($ret);
		return true;
	}else{
		return false;
	}	

}

function format_sql($sql){
	$tran = array("'" => "''");	
	return strtr($sql,$tran);
}

function format_mssql($sql){
	$tran = array("\'" => "''");
	$tran += array('\"' => '"');
	$tran += array("'" => "''");
	return strtr($sql,$tran);
}

//copy a direction’s all files to another direction 
function copy_dir($source, $destination, $child=1){ 
//用法： 
// copy_dir("feiy","feiy2",1):拷贝feiy下的文件到 feiy2,包括子目录 
// copy_dir("feiy","feiy2",0):拷贝feiy下的文件到 feiy2,不包括子目录 
//参数说明： 
// $source:源目录名 
// $destination:目的目录名 
// $child:复制时，是不是包含的子目录 
	if(!is_dir($source)){ 
		debug_info("Error:the $source is not a direction!"); 
		return false; 
	} 
	if(!is_dir($destination)){ 
		mkdir($destination,0777); 
	} 
	
	
	$handle=dir($source); 
	while($entry=$handle->read()) { 
		if(($entry!=".")&&($entry!="..")){ 
			if(is_dir($source."/".$entry)){ 
				if($child) 
					copy_dir($source."/".$entry,$destination."/".$entry,$child); 
			} 
			else{ 
				copy($source."/".$entry,$destination."/".$entry); 
			} 		
		} 
	} 
	
	return true; 
} 
?>