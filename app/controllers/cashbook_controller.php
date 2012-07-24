<?php
	App::import('Vendor', 'Writer', array('file' => 'Spreadsheet'.DS.'Writer.php'));
	class CashbookController extends AppController{

		var $uses = array('CashBook', 'Income', 'HousetaxReceipt', 'WatertaxReceipt', 'ProfessionaltaxReceipt', 'DotaxReceipt', 'OthersReceipt', 'Expense', 'Purchase', 'PurchaseItem', 'Salary', 'EmployeeSalary', 'ContractBillEstimation', 'HtDemand', 'PtDemand', 'WtDemand');

		function index($report_number){
			if(!empty($report_number)){
				$this->set(compact('report_number'));
			}else{
				$this->redirect(array('action'=>'../reports/index'));
			}
		}

		function xls_format($sheet_name){      
      $workbook  = new Spreadsheet_Excel_Writer();
			$workbook->setVersion(8);
			$workbook->setTempDir('../temp');
			$worksheet = $workbook->addWorksheet($sheet_name);
			$worksheet->setInputEncoding('UTF-8');
			$fmt_left = $workbook->addFormat();
			$fmt_left->setAlign('left');
			$fmt_left->setSize(12);
			$fmt_right = $workbook->addFormat();
			$fmt_right->setAlign('right');
			$fmt_right->setSize(12);
			$fmt_center = $workbook->addFormat();
			$fmt_center->setAlign('center');
			$fmt_center->setSize(12);
			$fmt_center->setBold();
			$fmt_center->setTextWrap();
			$fmt_center->setFontFamily('TAMu_Maduram');
			$fmt_left_title = $workbook->addFormat();
			$fmt_left_title->setAlign('left');
			$fmt_left_title->setSize(12);
			$fmt_left_title->setFontFamily('TAMu_Maduram');
			$fmt_right_title = $workbook->addFormat();
			$fmt_right_title->setAlign('right');
			$fmt_right_title->setSize(12);
			$fmt_right_title->setFontFamily('TAMu_Maduram');
			$xls_fmt = array('workbook' => $workbook, 'worksheet' => $worksheet, 'fmt_left' => $fmt_left, 'fmt_right' => $fmt_right, 'fmt_center' => $fmt_center, 'fmt_left_title' => $fmt_left_title, 'fmt_right_title' => $fmt_right_title);
		  return $xls_fmt;
    }

		function form11_reoprt(){
			$start_date = $_POST['year'].'-'.$_POST['month'].'-01';
			$end_date = date('Y,m,d', strtotime($_POST['year'].'-'.((int)$_POST['month'] + 1).'-00'));
			if(!empty($start_date) && !empty($end_date)){
				$xls_fmt = $this->xls_format('Form_11');
				$i = 0;
				$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்: 11', $xls_fmt['fmt_left_title']);
				$xls_fmt['worksheet']->setMerge($i, 0, $i++, 12);
				$xls_fmt['worksheet']->write($i, 0, 'ரொக்கப் பதிவேடு', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 0, ++$i, 12);
				$xls_fmt['worksheet']->write(++$i, 0, 'வரவு பெற்றுக் கொண்ட தேதி', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(0,0,12.00);
				$xls_fmt['worksheet']->setMerge($i, 0, ($i + 1), 0);
				$xls_fmt['worksheet']->write($i, 1, 'வரவுகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 1, $i, 4);
				$xls_fmt['worksheet']->write($i, 5, 'செலவுகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 5, $i, 8);
				$xls_fmt['worksheet']->write($i, 9, 'வங்கி அல்லது கருவூலம்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 9, $i, 11);
				$xls_fmt['worksheet']->write($i, 12, 'குறிப்புகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(12,12,30.00);
				$xls_fmt['worksheet']->setMerge($i, 12, ($i+ 1), 12);
				$xls_fmt['worksheet']->write(++$i, 1, 'விபரங்கள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(1,1,40.00);
				$xls_fmt['worksheet']->write($i, 2, 'ரொக்கம்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(2,2,12.00);
				$xls_fmt['worksheet']->write($i, 3, 'வங்கி தொகை', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->write($i, 4, 'குறிப்புகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(4,4,30.00);
				$xls_fmt['worksheet']->write($i, 5, 'தொகை கொடுத்த தேதி', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(5,5,12.00);
				$xls_fmt['worksheet']->write($i, 6, 'செலவு சீட்டு எண்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(6,6,15.00);
				$xls_fmt['worksheet']->write($i, 7, 'விபரங்கள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(7,7,40.00);
				$xls_fmt['worksheet']->write($i, 8, 'ரொக்கம்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(8,8,12.00);
				$xls_fmt['worksheet']->write($i, 9, 'வங்கி தொகை', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->write($i, 10, 'காசோலை எண்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(10,11,14.00);
				$xls_fmt['worksheet']->write($i++, 11, 'காசோலை நாள்', $xls_fmt['fmt_center']);
				$i_copy = $i;
				$income_cash = 0;
				$income_bank = 0;
				$expense_cash = 0;
				$expense_bank = 0;
				$xls_fmt['worksheet']->write($i, 0, $start_date, $xls_fmt['fmt_left']);
				$records = $this->CashBook->find('first',array(
					'conditions' => array('CashBook.account_id' => 1, 'CashBook.Opening_date' => $start_date)
				));
				$xls_fmt['worksheet']->write($i, 1, 'இம்மாத ஆரம்ப இருப்பு', $xls_fmt['fmt_left_title']);
				$xls_fmt['worksheet']->writeNumber($i, 2, $records['CashBook']['opening_cash']);
				$xls_fmt['worksheet']->writeNumber($i++, 3, $records['CashBook']['opening_bank']);
				$income_cash = (double)$records['CashBook']['opening_cash'];
				$income_bank = (double)$records['CashBook']['opening_bank'];
				$i++;
				$records = $this->Income->find('all', array(
					'conditions' => array('Income.income_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Income.account_id' => 1),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 0;
					$xls_fmt['worksheet']->write($i, $j++, $record['Income']['income_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i, $j++, $record['Header']['header_name'].', '.$record['Income']['description'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i, $j++, $record['Income']['income_amount']);
					$income_bank += (double)$record['Income']['income_amount'];
					$i++;
				}
				$records = $this->HousetaxReceipt->find('all', array(
					'conditions' => array('HousetaxReceipt.receipt_date BETWEEN ? AND ?' => array($start_date, $end_date)),
					'order' => 'HousetaxReceipt.receipt_date ASC'
				));
				$tax1 = 0;
				$tax2 = 0;
				$redeipt_date = '';
				foreach($records as $record){
					$tax1 += (double)$record['HousetaxReceipt']['ht_pending'] + (double)$record['HousetaxReceipt']['ht_current'];
					$tax2 += (double)$record['HousetaxReceipt']['lc_pending'] + (double)$record['HousetaxReceipt']['lc_current'];
					$redeipt_date = $record['HousetaxReceipt']['receipt_date'];
				}
				if($tax1 > 0 || $tax2 > 0){
					$xls_fmt['worksheet']->write($i, 0, $redeipt_date, $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i, 1, 'வீட்டு வரி', $xls_fmt['fmt_left_title']);
					$xls_fmt['worksheet']->writeNumber($i++, 2, $tax1);
					$xls_fmt['worksheet']->write($i, 0, $redeipt_date, $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i, 1, 'நூல் நிலைய வரி', $xls_fmt['fmt_left_title']);
					$xls_fmt['worksheet']->writeNumber($i++, 2, $tax2);
					$income_cash += $tax1 + $tax2;
				}
				$records = $this->ProfessionaltaxReceipt->find('all', array(
					'conditions' => array('ProfessionaltaxReceipt.receipt_date BETWEEN ? AND ?' => array($start_date, $end_date)),
					'order' => 'ProfessionaltaxReceipt.receipt_date ASC'
				));
				$tax1 = 0;
				$redeipt_date = '';
				foreach($records as $record){
					$tax1 += (double)$record['ProfessionaltaxReceipt']['part1_pending'] + (double)$record['ProfessionaltaxReceipt']['part1_current'];
					$tax1 += (double)$record['ProfessionaltaxReceipt']['part2_pending'] + (double)$record['ProfessionaltaxReceipt']['part2_current'];
					$redeipt_date = $record['ProfessionaltaxReceipt']['receipt_date'];
				}
				if($tax1 > 0){
					$xls_fmt['worksheet']->write($i, 0, $redeipt_date, $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i, 1, 'தொழில் வரி', $xls_fmt['fmt_left_title']);
					$xls_fmt['worksheet']->writeNumber($i++, 2, $tax1);
					$income_cash += $tax1;
				}
				$records = $this->WatertaxReceipt->find('all', array(
					'conditions' => array('WatertaxReceipt.receipt_date BETWEEN ? AND ?' => array($start_date, $end_date)),
					'order' => 'WatertaxReceipt.receipt_date ASC'
				));
				$tax1 = 0;
				$redeipt_date = '';
				foreach($records as $record){
					$tax1 += (double)$record['WatertaxReceipt']['wt_pending'] + (double)$record['WatertaxReceipt']['wt_current'];
					$redeipt_date = $record['WatertaxReceipt']['receipt_date'];
				}
				if($tax1 > 0){
					$xls_fmt['worksheet']->write($i, 0, $redeipt_date, $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i, 1, 'குடிநீர் வரி', $xls_fmt['fmt_left_title']);
					$xls_fmt['worksheet']->writeNumber($i++, 2, $tax1);
					$income_cash += $tax1;
				}
				$records = $this->DotaxReceipt->find('all', array(
					'conditions' => array('DotaxReceipt.receipt_date BETWEEN ? AND ?' => array($start_date, $end_date)),
					'order' => 'DotaxReceipt.receipt_date ASC'
				));
				$tax1 = 0;
				$redeipt_date = '';
				foreach($records as $record){
					$tax1 += (double)$record['DotaxReceipt']['do_pending'] + (double)$record['DotaxReceipt']['do_current'];
					$redeipt_date = $record['DotaxReceipt']['receipt_date'];
				}
				if($tax1 > 0){
					$xls_fmt['worksheet']->write($i, 0, $redeipt_date, $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i, 1, 'டி & ஓ வியாபாரிகள் வரி', $xls_fmt['fmt_left_title']);
					$xls_fmt['worksheet']->writeNumber($i++, 2, $tax1);
					$income_cash += $tax1;
				}
				$records = $this->OthersReceipt->find('all', array(
					'conditions' => array('OthersReceipt.receipt_date BETWEEN ? AND ?' => array($start_date, $end_date)),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 0;
					$xls_fmt['worksheet']->write($i, $j++, $record['OthersReceipt']['receipt_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i, $j++, $record['Header']['header_name'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->writeNumber($i, $j++, $record['OthersReceipt']['amount']);
					$income_cash += (double)$record['OthersReceipt']['amount'];
					$i++;
				}
				$records = $this->Expense->find('all', array(
					'conditions' => array('Expense.expense_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Expense.account_id' => 1),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 5;
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['expense_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['voucher_number'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Header']['header_name'].', '.$record['Expense']['description'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['expense_amount']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['cheque_date'], $xls_fmt['fmt_left']);
					$expense_bank += (double)$record['Expense']['expense_amount'];
					$i_copy++;
				}
				$records = $this->Purchase->find('all', array(
					'conditions' => array('Purchase.purchase_date BETWEEN ? AND ?' => array($start_date, $end_date)),
				));
				if(!empty($records)){
					$xls_fmt['worksheet']->write($i_copy++, 7, 'கொள்முதல்:', $xls_fmt['fmt_left_title']);
				}
				foreach($records as $record){
					$j = 5;
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Purchase']['purchase_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Purchase']['voucher_number'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, "..".$record['Purchase']['company_name'].' (வரி உற்பட)', $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Purchase']['total_amt']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Purchase']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Purchase']['cheque_date'], $xls_fmt['fmt_left']);
					$expense_bank += (double)$record['Purchase']['total_amt'];
					$i_copy++;
					$purchase_items = $this->PurchaseItem->find('all', array(
						'conditions' => array('PurchaseItem.purchase_id' => $record['Purchase']['id']),
						'order' => 'PurchaseItem.id ASC',
						'contain' => array('stock')
					));
					foreach($purchase_items as $item){
						$xls_fmt['worksheet']->write($i_copy, 7, '....'.$item['Stock']['item_name']." - ".$item['PurchaseItem']['item_quantity']."/அளவு, ரூ. ".$item['PurchaseItem']['item_tot_amount'], $xls_fmt['fmt_left']);
						$i_copy++;
					}
				}
				$records = $this->Salary->find('all', array(
					'conditions' => array('Salary.salary_date BETWEEN ? AND ?' => array($start_date, $end_date)),
				));
				foreach($records as $record){
					$j = 5;
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Salary']['salary_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Salary']['voucher_number'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, 'ஊத்தியம்', $xls_fmt['fmt_left_title']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Salary']['cheque_amount']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Salary']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Salary']['cheque_date'], $xls_fmt['fmt_left']);
					$expense_bank += (double)$record['Salary']['cheque_amount'];
					$i_copy++;
					$employees_salary = $this->EmployeeSalary->find('all', array(
						'conditions' => array('EmployeeSalary.salary_id' => $record['Salary']['id']),
						'order' => 'EmployeeSalary.id ASC',
					));
					foreach($employees_salary as $salary){
						$xls_fmt['worksheet']->write($i_copy, 7, '....'.$salary['EmployeeSalary']['employee_name']." - ரூ. ".$salary['EmployeeSalary']['employee_pay'], $xls_fmt['fmt_left']);
						$i_copy++;
					}
				}
				$records = $this->ContractBillEstimation->find('all', array(
					'conditions' => array('ContractBillEstimation.bill_date BETWEEN ? AND ?' => array($start_date, $end_date),
													'ContractBillEstimation.account_id' => 1),
				));
				if(!empty($records)){
					$xls_fmt['worksheet']->write($i_copy++, 7, 'வரைவு மதிப்பீடு:', $xls_fmt['fmt_left_title']);
				}
				foreach($records as $record){
					$j = 5;
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['ContractBillEstimation']['bill_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['ContractBillEstimation']['voucher_number'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, "....".$record['ContractBillEstimation']['contractor_name'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['ContractBillEstimation']['cheque_amt']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['ContractBillEstimation']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['ContractBillEstimation']['cheque_date'], $xls_fmt['fmt_left']);
					$expense_bank += (double)$record['ContractBillEstimation']['cheque_amt'];
					$i_copy++;
				}
				if($i > $i_copy){
					$i++;
					$i_copy = $i;
				}else{
					$i_copy++;
					$i = $i_copy;
				}
				$xls_fmt['worksheet']->write($i_copy, 5, $end_date, $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->write($i_copy, 7, 'இம்மாத இறுதி இருப்பு', $xls_fmt['fmt_left_title']);
				$xls_fmt['worksheet']->writeNumber($i_copy, 8, ($income_cash - $expense_cash));
				$xls_fmt['worksheet']->writeNumber($i_copy++, 9, ($income_bank - $expense_bank));
				$special = $xls_fmt['workbook']->addFormat();
				$special->setBottom(2);
				$xls_fmt['worksheet']->write($i_copy, 2, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 3, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 8, '', $special);
				$xls_fmt['worksheet']->write($i_copy++, 9, '', $special);
				$xls_fmt['worksheet']->writeNumber(++$i_copy, 2, $income_cash);
				$xls_fmt['worksheet']->writeNumber($i_copy, 3, $income_bank);
				$xls_fmt['worksheet']->writeNumber($i_copy, 8, $income_cash);
				$xls_fmt['worksheet']->writeNumber($i_copy++, 9, $income_bank);
				$xls_fmt['worksheet']->write($i_copy, 2, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 3, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 8, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 9, '', $special);
				$xls_fmt['workbook']->send('Form_11.xls');
				$xls_fmt['workbook']->close();
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function form23_reoprt(){
			$start_date = $_POST['year'].'-'.$_POST['month'].'-01';
			$end_date = date('Y,m,d', strtotime($_POST['year'].'-'.((int)$_POST['month'] + 1).'-00'));
			if(!empty($start_date) && !empty($end_date)){
				$xls_fmt = $this->xls_format('Form_23');
				$i = 0;
				$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்: 11', $xls_fmt['fmt_left_title']);
				$xls_fmt['worksheet']->setMerge($i, 0, $i++, 12);
				$xls_fmt['worksheet']->write($i, 0, 'ரொக்கப் பதிவேடு', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 0, ++$i, 12);
				$xls_fmt['worksheet']->write(++$i, 0, 'வரவு பெற்றுக் கொண்ட தேதி', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(0,0,12.00);
				$xls_fmt['worksheet']->setMerge($i, 0, ($i + 1), 0);
				$xls_fmt['worksheet']->write($i, 1, 'வரவுகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 1, $i, 4);
				$xls_fmt['worksheet']->write($i, 5, 'செலவுகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 5, $i, 8);
				$xls_fmt['worksheet']->write($i, 9, 'வங்கி அல்லது கருவூலம்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 9, $i, 11);
				$xls_fmt['worksheet']->write($i, 12, 'குறிப்புகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(12,12,30.00);
				$xls_fmt['worksheet']->setMerge($i, 12, ($i+ 1), 12);
				$xls_fmt['worksheet']->write(++$i, 1, 'விபரங்கள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(1,1,40.00);
				$xls_fmt['worksheet']->write($i, 2, 'ரொக்கம்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(2,2,12.00);
				$xls_fmt['worksheet']->write($i, 3, 'வங்கி தொகை', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->write($i, 4, 'குறிப்புகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(4,4,30.00);
				$xls_fmt['worksheet']->write($i, 5, 'தொகை கொடுத்த தேதி', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(5,5,12.00);
				$xls_fmt['worksheet']->write($i, 6, 'செலவு சீட்டு எண்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(6,6,15.00);
				$xls_fmt['worksheet']->write($i, 7, 'விபரங்கள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(7,7,40.00);
				$xls_fmt['worksheet']->write($i, 8, 'ரொக்கம்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(8,8,12.00);
				$xls_fmt['worksheet']->write($i, 9, 'வங்கி தொகை', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->write($i, 10, 'காசோலை எண்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(10,11,14.00);
				$xls_fmt['worksheet']->write($i++, 11, 'காசோலை நாள்', $xls_fmt['fmt_center']);
				$i_copy = $i;
				$income_cash = 0;
				$income_bank = 0;
				$expense_cash = 0;
				$expense_bank = 0;
				$xls_fmt['worksheet']->write($i, 0, $start_date, $xls_fmt['fmt_left']);
				$records = $this->CashBook->find('first',array(
					'conditions' => array('CashBook.account_id' => 2, 'CashBook.Opening_date' => $start_date)
				));
				$xls_fmt['worksheet']->write($i, 1, 'இம்மாத ஆரம்ப இருப்பு', $xls_fmt['fmt_left_title']);
				$xls_fmt['worksheet']->writeNumber($i, 2, $records['CashBook']['opening_cash']);
				$xls_fmt['worksheet']->writeNumber($i++, 3, $records['CashBook']['opening_bank']);
				$income_cash = (double)$records['CashBook']['opening_cash'];
				$income_bank = (double)$records['CashBook']['opening_bank'];
				$i++;
				$records = $this->Income->find('all', array(
					'conditions' => array('Income.income_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Income.account_id' => 2),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 0;
					$xls_fmt['worksheet']->write($i, $j++, $record['Income']['income_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i, $j++, $record['Header']['header_name'].', '.$record['Income']['description'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i, $j++, $record['Income']['income_amount']);
					$income_bank += (double)$record['Income']['income_amount'];
					$i++;
				}
				$records = $this->Expense->find('all', array(
					'conditions' => array('Expense.expense_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Expense.account_id' => 2),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 5;
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['expense_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['voucher_number'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Header']['header_name'].', '.$record['Expense']['description'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['expense_amount']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['cheque_date'], $xls_fmt['fmt_left']);
					$expense_bank += (double)$record['Expense']['expense_amount'];
					$i_copy++;
				}
				if($i > $i_copy){
					$i++;
					$i_copy = $i;
				}else{
					$i_copy++;
					$i = $i_copy;
				}
				$xls_fmt['worksheet']->write($i_copy, 5, $end_date, $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->write($i_copy, 7, 'இம்மாத இறுதி இருப்பு', $xls_fmt['fmt_left_title']);
				$xls_fmt['worksheet']->writeNumber($i_copy, 8, ($income_cash - $expense_cash));
				$xls_fmt['worksheet']->writeNumber($i_copy++, 9, ($income_bank - $expense_bank));
				$special = $xls_fmt['workbook']->addFormat();
				$special->setBottom(2);
				$xls_fmt['worksheet']->write($i_copy, 2, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 3, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 8, '', $special);
				$xls_fmt['worksheet']->write($i_copy++, 9, '', $special);
				$xls_fmt['worksheet']->writeNumber(++$i_copy, 2, $income_cash);
				$xls_fmt['worksheet']->writeNumber($i_copy, 3, $income_bank);
				$xls_fmt['worksheet']->writeNumber($i_copy, 8, $income_cash);
				$xls_fmt['worksheet']->writeNumber($i_copy++, 9, $income_bank);
				$xls_fmt['worksheet']->write($i_copy, 2, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 3, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 8, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 9, '', $special);
				$xls_fmt['workbook']->send('Form_23.xls');
				$xls_fmt['workbook']->close();
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function form26_reoprt(){
			$start_date = $_POST['year'].'-'.$_POST['month'].'-01';
			$end_date = date('Y,m,d', strtotime($_POST['year'].'-'.((int)$_POST['month'] + 1).'-00'));
			if(!empty($start_date) && !empty($end_date)){
				$xls_fmt = $this->xls_format('Form_26');
				$i = 0;
				$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்: 11', $xls_fmt['fmt_left_title']);
				$xls_fmt['worksheet']->setMerge($i, 0, $i++, 12);
				$xls_fmt['worksheet']->write($i, 0, 'ரொக்கப் பதிவேடு', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 0, ++$i, 12);
				$xls_fmt['worksheet']->write(++$i, 0, 'வரவு பெற்றுக் கொண்ட தேதி', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->write(($i + 1), 0, '', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(0,0,12.00);
				$xls_fmt['worksheet']->setMerge($i, 0, ($i + 1), 0);
				$xls_fmt['worksheet']->write($i, 1, 'வரவுகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 1, $i, 4);
				$xls_fmt['worksheet']->write($i, 5, 'செலவுகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 5, $i, 8);
				$xls_fmt['worksheet']->write($i, 9, 'வங்கி அல்லது கருவூலம்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setMerge($i, 9, $i, 11);
				$xls_fmt['worksheet']->write($i, 12, 'குறிப்புகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->write(($i + 1), 12, '', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(12,12,30.00);
				$xls_fmt['worksheet']->setMerge($i, 12, ($i+ 1), 12);
				$xls_fmt['worksheet']->write(++$i, 1, 'விபரங்கள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(1,1,40.00);
				$xls_fmt['worksheet']->write($i, 2, 'ரொக்கம்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(2,2,12.00);
				$xls_fmt['worksheet']->write($i, 3, 'வங்கி தொகை', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->write($i, 4, 'குறிப்புகள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(4,4,30.00);
				$xls_fmt['worksheet']->write($i, 5, 'தொகை கொடுத்த தேதி', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(5,5,12.00);
				$xls_fmt['worksheet']->write($i, 6, 'செலவு சீட்டு எண்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(6,6,15.00);
				$xls_fmt['worksheet']->write($i, 7, 'விபரங்கள்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(7,7,40.00);
				$xls_fmt['worksheet']->write($i, 8, 'ரொக்கம்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(8,8,12.00);
				$xls_fmt['worksheet']->write($i, 9, 'வங்கி தொகை', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->write($i, 10, 'காசோலை எண்', $xls_fmt['fmt_center']);
				$xls_fmt['worksheet']->setColumn(10,11,14.00);
				$xls_fmt['worksheet']->write($i++, 11, 'காசோலை நாள்', $xls_fmt['fmt_center']);
				$i_copy = $i;
				$income_cash = 0;
				$income_bank = 0;
				$expense_cash = 0;
				$expense_bank = 0;
				$xls_fmt['worksheet']->write($i, 0, $start_date, $xls_fmt['fmt_left']);
				$records = $this->CashBook->find('first',array(
					'conditions' => array('CashBook.account_id' => 1, 'CashBook.Opening_date' => $start_date)
				));
				$xls_fmt['worksheet']->write($i, 1, 'இம்மாத ஆரம்ப இருப்பு', $xls_fmt['fmt_left_title']);
				$xls_fmt['worksheet']->writeNumber($i, 2, $records['CashBook']['opening_cash']);
				$xls_fmt['worksheet']->writeNumber($i++, 3, $records['CashBook']['opening_bank']);
				$income_cash = (double)$records['CashBook']['opening_cash'];
				$income_bank = (double)$records['CashBook']['opening_bank'];
				$i++;
				$records = $this->Income->find('all', array(
					'conditions' => array('Income.income_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Income.account_id' => 3),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 0;
					$xls_fmt['worksheet']->write($i, $j++, $record['Income']['income_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i, $j++, $record['Header']['header_name'].', '.$record['Income']['description'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i, $j++, $record['Income']['income_amount']);
					$income_bank += (double)$record['Income']['income_amount'];
					$i++;
				}
				$records = $this->Expense->find('all', array(
					'conditions' => array('Expense.expense_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Expense.account_id' => 3),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 5;
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['expense_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['voucher_number'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Header']['header_name'].', '.$record['Expense']['description'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['expense_amount']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['cheque_date'], $xls_fmt['fmt_left']);
					$expense_bank += (double)$record['Expense']['expense_amount'];
					$i_copy++;
				}
				$records = $this->ContractBillEstimation->find('all', array(
					'conditions' => array('ContractBillEstimation.bill_date BETWEEN ? AND ?' => array($start_date, $end_date),
													'ContractBillEstimation.account_id' => 3),
				));
				if(!empty($records)){
					$xls_fmt['worksheet']->write($i_copy++, 7, 'வரைவு மதிப்பீடு:', $xls_fmt['fmt_left_title']);
				}
				foreach($records as $record){
					$j = 5;
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['ContractBillEstimation']['bill_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['ContractBillEstimation']['voucher_number'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, "......".$record['ContractBillEstimation']['contractor_name'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['ContractBillEstimation']['cheque_amt']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['ContractBillEstimation']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['ContractBillEstimation']['cheque_date'], $xls_fmt['fmt_left']);
					$expense_bank += (double)$record['ContractBillEstimation']['cheque_amt'];
					$i_copy++;
				}
				if($i > $i_copy){
					$i++;
					$i_copy = $i;
				}else{
					$i_copy++;
					$i = $i_copy;
				}
				$xls_fmt['worksheet']->write($i_copy, 5, $end_date, $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->write($i_copy, 7, 'இம்மாத இறுதி இருப்பு', $xls_fmt['fmt_left_title']);
				$xls_fmt['worksheet']->writeNumber($i_copy, 8, ($income_cash - $expense_cash));
				$xls_fmt['worksheet']->writeNumber($i_copy++, 9, ($income_bank - $expense_bank));
				$special = $xls_fmt['workbook']->addFormat();
				$special->setBottom(2);
				$xls_fmt['worksheet']->write($i_copy, 2, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 3, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 8, '', $special);
				$xls_fmt['worksheet']->write($i_copy++, 9, '', $special);
				$xls_fmt['worksheet']->writeNumber(++$i_copy, 2, $income_cash);
				$xls_fmt['worksheet']->writeNumber($i_copy, 3, $income_bank);
				$xls_fmt['worksheet']->writeNumber($i_copy, 8, $income_cash);
				$xls_fmt['worksheet']->writeNumber($i_copy++, 9, $income_bank);
				$xls_fmt['worksheet']->write($i_copy, 2, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 3, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 8, '', $special);
				$xls_fmt['worksheet']->write($i_copy, 9, '', $special);
				$xls_fmt['workbook']->send('Form_26.xls');
				$xls_fmt['workbook']->close();
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
	}
?>