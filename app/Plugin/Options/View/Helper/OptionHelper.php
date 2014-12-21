<?php 
App::uses('AppHelper', 'View/Helper');

class OptionHelper extends AppHelper {
	


	public function get($name){
		
		$optionModel = ClassRegistry::init('Option');
		
		$option = $optionModel->findByName($name);		
		
		if ($option){		
			return $option['Option']['value'];
		}
		else {
			return '';	
		}
		
	}




	
	
} // class




?>