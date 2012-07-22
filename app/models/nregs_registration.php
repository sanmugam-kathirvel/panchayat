<?php
	class NregsRegistration extends AppModel{
		var $name = 'NregsRegistration';
		var $belongsTo = array('Hamlet');
		var $validate = array(
				'family_number' => array(
					'rule' => 'numeric',
					'allowEmpty' => false,
					'message' => 'Enter valied input'
				),
				'serial_number' => array(
					'rule' => 'numeric',
					'allowEmpty' => false,
					'message' => 'Enter valied input'
				),
				'job_card_number' => array(
					'rule' => 'numeric',
					'allowEmpty' => false,
					'message' => 'Enter valied input'
				),
				'name' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				),
				'father_or_husband_name' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				),
				'hamlet_id' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				),
				'sex' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				),
				'age' => array(
					'rule' => 'numeric',
					'allowEmpty' => false,
					'message' => 'Enter valied input'
				),
				'community' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				),
				'ration_card_number' => array(
					'rule' => 'numeric',
					'allowEmpty' => false,
					'message' => 'Enter valied input'
				),
				'voter_id_number' => array(
					'rule' => 'numeric',
					'allowEmpty' => false,
					'message' => 'Enter valied input'
				),
				'bank_account_number' => array(
					'rule' => 'numeric',
					'allowEmpty' => false,
					'message' => 'Enter valied input'
				),
				'bank_name' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				),
				'bank_branch' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				),
				'application_date' => array(
					'rule' => 'date',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				),
				'job_card_issue_date' => array(
					'rule' => 'date',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				),
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