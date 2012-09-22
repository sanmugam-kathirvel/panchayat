<?php
	class UploadcsvController extends AppController{
		var $uses = array('HtDemand', 'WtDemand', 'PtDemand', 'DoDemand', 'NregsRegistration');
		
		function index(){
			if(!empty($this->data)){
				if($this->data['Uploadcsv']['file']['size'] > 0){
		    	$upload_path = WWW_ROOT.'csv/';
		      move_uploaded_file($this->data['Uploadcsv']['file']['tmp_name'], $upload_path.'upload.csv');
				}
				$file_path = WWW_ROOT.'csv/upload.csv';
				if($handler = fopen($file_path, 'r')){
					$first_line = trim(str_replace(',', '', fgets($handler)));
					if($first_line == $this->data['Uploadcsv']['table_name']){
						$selected_name = $this->data['Uploadcsv']['table_name'];
						$get_model_name = array('House Tax' => 'HtDemand', 'Water Tax' => 'WtDemand', 'Pt Tax' => 'PtDemand', 'Do Tax' => 'DoDemand', 'NRGS Registration' => 'NregsRegistration');
						$get_table_name = array('HtDemand' => 'ht_demands', 'WtDemand' => 'wt_demands', 'PtDemand' => 'pt_demands', 'DoDemand' => 'do_demands', 'NregsRegistration' => 'nregs_registrations');
						$model_name = $get_model_name[$selected_name];
						$table_name = $get_table_name[$model_name];
						$query = $this->$model_name->query("LOAD DATA LOCAL INFILE '$file_path' INTO TABLE $table_name CHARACTER SET 'utf8' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;");
						$this->Session->setFlash(__("$selected_name data uploaded successfully", true));
					}else{
						$this->Session->setFlash(__('Please check if you upload currect table data', true));
					}
				}
			}
		}
	}
?>