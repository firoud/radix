<?php 
App::uses('Component', 'Controller');


class OptionComponent extends Component {
	
	
    public function load() {
		
		
        $optionModel = ClassRegistry::init('Option');
		
		$options = $optionModel->find('all');
		
		
		foreach($options as $option){
			
			
			Configure::write(
				$option['Option']['name'],$option['Option']['value']
			);
			
			
			
			
		}
		
    }
	
	public function update($name, $value){
		
		$optionModel = ClassRegistry::init('Option');
		
		$option = $optionModel->findByName($name);
		
		if (!empty($option)){		
			$optionModel->id = $option['Option']['id'];
			$optionModel->saveField('value', $value );
		}
		
		
	}
	
	
	public function get($name){
		
		$optionModel = ClassRegistry::init('Option');
		
		$option = $optionModel->findByName($name);		
		
		if ($option){		
			return $option['Option']['value'];
		}
		else {
			return false;	
		}
		
	}
	
	
	
	public function delete($name){
		
		$optionModel = ClassRegistry::init('Option');
		
        $optionModel->deleteAll(array('Option.name' => $name), false);
		
	}	
	
	
	
	public function add($name, $value){
		
		$optionModel = ClassRegistry::init('Option');
        $optionModel->save(array('name' => $name , 'value' => $value));
		
	}		
	
	
}




?>