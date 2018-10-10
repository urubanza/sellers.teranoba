<?php
	//function for getting class instances
	function getClass($classname){
		global $page_level;
		$class_file = "scripts/class.$classname.php";


		//changing path for pages on different indenting level
		if(!empty($page_level)){
			for($n=0; $n<$page_level; $n++){
				$class_file = "../".$class_file;
			}
		}

		if(file_exists($class_file)){
			include_once $class_file;
			return new $classname();
		}else{
			return false;
		}
	}
?>