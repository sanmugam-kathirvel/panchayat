<?php
	class NregsRegistration extends AppModel{
		var $name = 'NregsRegistration';
		var $belongsTo = array('Hamlet');
		var $validate = array(
				'family_number' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				)
			);
		function afterSave(){
	    if($this->data['NregsRegistration']['photo']['size'] > 0){
	    	$upload_path = WWW_ROOT.'photo/';
	      move_uploaded_file($this->data['NregsRegistration']['photo']['tmp_name'], $upload_path.$this->id."_o.jpg");
	      App::import('Component', 'PImage');
	      $p_image = new PImageComponent();
	      $p_image->resizeImage(
	        'resize',
	        $upload_path.$this->id."_o.jpg",
	        $upload_path,
	        $this->id."_p.jpg",
	        150,
	        150,
	        80
	      );
			}
    }
	}
?>