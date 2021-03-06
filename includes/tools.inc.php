<?php

	function _get($name, $default=""){
		
		if(isset($_GET[$name])){
			
			return $_GET[$name];
			
		}
		
		return $default;
		
	}

	function _post($name, $default=""){
		
		if(isset($_POST[$name])){
			
			return $_POST[$name];
			
		}
		
		return $default;
		
	}
	
	function get_module_name($module){
		
		$md = MODULES_PATH . "index.inc.php";
		
		if($module !== ""){
		
			$md = MODULES_PATH . $module . ".inc.php";
			
			if(file_exists($md) && is_file($md)){
					
				return $md;
					
			}
		
		}
		
		return $md;
		
	}

	function log_message($message){
		
		if($fp = fopen(LOG_FILE_PATH, "a")){
			
			fwrite($fp, date("Y-m-d H:i:s") . " - " . $message . "\n");
			
			fclose($fp);
			
			return true;
			
		}
		
		return false;
		
	}
	
	function get_array_from_object($object){
		
		return json_decode(utf8_encode(json_encode($object)), true);
		
	}
	
	function get_json($array){
		
		return json_encode($array);
		
	}
	
	function make_api_get_request($meli, $url, $parameters){
	
		$response = $meli->get($url, $parameters);
	
		return get_array_from_object($response["body"]);
	
	}
	
?>