<?php
	App::import('Vendor', 'Writer', array('file' => 'Spreadsheet'.DS.'Writer.php'));
	class ReportsController extends AppController {

		var $uses = array('HtDemand', 'HousetaxReceipt', 'PtDemand', 'ProfessionaltaxReceipt', 'WtDemand', 'WatertaxReceipt');
		function index(){
			
		}
		function form3_report() {
			$this->layout = false;
			$this->BookDetail->recursive = 1;
			$data = $this->HtDemand->find('all', array(
				'conditions' => array('HtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'HtDemand.demand_number ASC')
			);
			$workbook  = new Spreadsheet_Excel_Writer();
			$workbook->setVersion(8);
			$worksheet = $workbook->addWorksheet('Form_3');
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
			$fmt_center->setFontFamily('Lohit Tamil');
			$fmt_left_title = $workbook->addFormat();
			$fmt_left_title->setAlign('left');
			$fmt_left_title->setSize(12);
			$fmt_left_title->setFontFamily('Lohit Tamil');
			$fmt_right_title = $workbook->addFormat();
			$fmt_right_title->setAlign('left');
			$fmt_right_title->setSize(12);
			$fmt_right_title->setFontFamily('Lohit Tamil');
			$i = 0;
			$worksheet->write($i, 0, 'ஊராட்சி படிவம் எண்: 3', $fmt_left_title);
			$worksheet->setMerge($i, 0, $i, 10);
			$worksheet->write($i, 11, 'ஆண்டு  _____________________  ', $fmt_right_title);
			$worksheet->setMerge($i, 11, $i++, 22);
			$worksheet->write($i, 0, 'வீட்டு வரி (நிலுவை மற்றும் நடப்பு) கேட்பு பதிவேடு', $fmt_center);
			$worksheet->setMerge($i, 0, ++$i, 22);
			$worksheet->write(++$i, 0, 'வரி விதிப்பு எண்', $fmt_center);
			$worksheet->setMerge($i, 0, ($i + 2), 0);
			$worksheet->setColumn(0,0,10.00);
			$worksheet->write($i, 1, 'கதவு இலக்க எண்', $fmt_center);
			$worksheet->setColumn(1,1,10.00);
			$worksheet->setMerge($i, 1, ($i + 2), 1);
			$worksheet->write($i, 2, 'சர்வே எண்', $fmt_center);
			$worksheet->setColumn(2,2,10.00);
			$worksheet->setMerge($i, 2, ($i + 2), 2);
			$worksheet->write($i, 3, 'பெயர்', $fmt_center);
			$worksheet->setColumn(3,3,25.00);
			$worksheet->setMerge($i, 3, ($i + 2), 3);
			$worksheet->write($i, 4, 'மதிப்பீடு சதுர அடி', $fmt_center);
			$worksheet->setMerge($i, 4, ($i + 2), 4);
			$worksheet->setColumn(4,4,12.00);
			$worksheet->write($i, 5, 'கேட்பு', $fmt_center);
			$worksheet->setMerge($i, 5, $i, 10);
			$worksheet->write($i, 11, 'வசூல்', $fmt_center);
			$worksheet->setMerge($i, 11, $i, 16);
			$worksheet->write($i, 17, 'நிலுவை', $fmt_center);
			$worksheet->setMerge($i, 17, $i++, 22);
			$worksheet->write($i, 5, 'வீட்டு வரி', $fmt_center);
			$worksheet->setMerge($i, 5, $i, 6);
			$worksheet->write($i, 7, 'நூல் நிலைய வரி', $fmt_center);
			$worksheet->setMerge($i, 7, $i, 8);
			$worksheet->write($i, 9, 'மொத்தம்', $fmt_center);
			$worksheet->setMerge($i, 9, $i, 10);
			$worksheet->write($i, 11, 'வீட்டு வரி', $fmt_center);
			$worksheet->setMerge($i, 11, $i, 12);
			$worksheet->write($i, 13, 'நூல் நிலைய வரி', $fmt_center);
			$worksheet->setMerge($i, 13, $i, 14);
			$worksheet->write($i, 15, 'மொத்தம்', $fmt_center);
			$worksheet->setMerge($i, 15, $i, 16);
			$worksheet->write($i, 17, 'வீட்டு வரி', $fmt_center);
			$worksheet->setMerge($i, 17, $i, 18);
			$worksheet->write($i, 19, 'நூல் நிலைய வரி', $fmt_center);
			$worksheet->setMerge($i, 19, $i, 20);
			$worksheet->write($i, 21, 'மொத்தம்', $fmt_center);
			$worksheet->setMerge($i, 21, $i++, 22);
			$worksheet->setColumn(5,22,11.00);
			$worksheet->setColumn(5,22,10.00);
			$worksheet->write($i, 5, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 6, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 7, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 8, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 9, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 10, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 11, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 12, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 13, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 14, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 15, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 16, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 17, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 18, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 19, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 20, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 21, 'நிலுவை', $fmt_center);
			$worksheet->write($i++, 22, 'நடப்பு', $fmt_center);
			foreach($data as $row) {
				$j = 0;
				$housetax_current = 0;
				$housetax_pending = 0;
				$lc_current = 0;
				$lc_pending = 0;
				$output = $this->HousetaxReceipt->find('all', array(
					'conditions' => array('HousetaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])
												 , 'HousetaxReceipt.demand_number' => $row['HtDemand']['demand_number']),
					'order' => 'HousetaxReceipt.receipt_date ASC')
				);
				foreach($output as $rec){
					$housetax_current += (int)($rec['HousetaxReceipt']['ht_current']);
					$housetax_pending += (int)($rec['HousetaxReceipt']['ht_pending']);
					$lc_current += (int)($rec['HousetaxReceipt']['lc_current']);
					$lc_pending += (int)($rec['HousetaxReceipt']['lc_pending']);
				}
				$worksheet->write($i, $j++, $row['HtDemand']['demand_number'], $fmt_right);
				$worksheet->write($i, $j++, $row['HtDemand']['door_number'], $fmt_right);
				$j++;
				$worksheet->write($i, $j++, $row['HtDemand']['name'], $fmt_left);
				$j++;
				$worksheet->write($i, $j++, $row['HtDemand']['ht_pending'], $fmt_right);
				$worksheet->write($i, $j++, $row['HtDemand']['ht_current'], $fmt_right);
				$worksheet->write($i, $j++, $row['HtDemand']['lc_pending'], $fmt_right);
				$worksheet->write($i, $j++, $row['HtDemand']['lc_current'], $fmt_right);
				$worksheet->write($i, $j++, ($row['HtDemand']['ht_pending'] + $row['HtDemand']['lc_pending']), $fmt_right);
				$worksheet->write($i, $j++, ($row['HtDemand']['ht_current'] + $row['HtDemand']['lc_current']), $fmt_right);
				$worksheet->write($i, $j++, $housetax_pending, $fmt_right);
				$worksheet->write($i, $j++, $housetax_current, $fmt_right);
				$worksheet->write($i, $j++, $lc_pending, $fmt_right);
				$worksheet->write($i, $j++, $lc_current, $fmt_right);
				$worksheet->write($i, $j++, ($housetax_pending + $lc_pending), $fmt_right);
				$worksheet->write($i, $j++, ($housetax_current + $lc_current), $fmt_right);
				$worksheet->write($i, $j++, ((int)($row['HtDemand']['ht_pending']) - $housetax_pending), $fmt_right);
				$worksheet->write($i, $j++, ((int)($row['HtDemand']['ht_current']) - $housetax_current), $fmt_right);
				$worksheet->write($i, $j++, ((int)($row['HtDemand']['lc_pending']) - $lc_pending), $fmt_right);
				$worksheet->write($i, $j++, ((int)($row['HtDemand']['lc_current']) - $lc_current), $fmt_right);
				$worksheet->write($i, $j++, (((int)($row['HtDemand']['ht_pending']) - $housetax_pending) + ((int)($row['HtDemand']['lc_pending']) - $lc_pending)), $fmt_right);
				$worksheet->write($i, $j++, (((int)($row['HtDemand']['ht_current']) - $housetax_current) + ((int)($row['HtDemand']['lc_current']) - $lc_current)), $fmt_right);
				$i++;
			}
			$workbook->send('Form_3.xls');
			$workbook->close();
			$this->redirect(array('action'=>'index'));
		}

		function form5_report() {
			$this->layout = false;
			$this->BookDetail->recursive = 1;
			$data = $this->PtDemand->find('all', array(
				'conditions' => array('PtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'PtDemand.demand_number ASC')
			);
			$workbook  = new Spreadsheet_Excel_Writer();
			$workbook->setVersion(8);
			$worksheet = $workbook->addWorksheet('Form_5');
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
			$fmt_center->setFontFamily('Lohit Tamil');
			$fmt_left_title = $workbook->addFormat();
			$fmt_left_title->setAlign('left');
			$fmt_left_title->setSize(12);
			$fmt_left_title->setFontFamily('Lohit Tamil');
			$fmt_right_title = $workbook->addFormat();
			$fmt_right_title->setAlign('left');
			$fmt_right_title->setSize(12);
			$fmt_right_title->setFontFamily('Lohit Tamil');
			$i = 0;
			$worksheet->write($i, 0, 'ஊராட்சி படிவம் எண்  5', $fmt_left_title);
			$worksheet->setMerge($i, 0, $i, 7);
			$worksheet->write($i, 8, 'ஆண்டு  _____________________  ', $fmt_right_title);
			$worksheet->setMerge($i, 8, $i++, 14);
			$worksheet->write($i, 0, 'தொழில் வரி (நிலுவை மற்றும் நடப்பு) கேட்பு பதிவேடு', $fmt_center);
			$worksheet->setMerge($i, 0, ++$i, 14);
			$worksheet->write(++$i, 0, 'வ. எண்', $fmt_center);
			$worksheet->setMerge($i, 0, ($i + 2), 0);
			$worksheet->write($i, 1, 'வரி விதிப்பு எண்', $fmt_center);
			$worksheet->setColumn(1,1,12.00);
			$worksheet->setMerge($i, 1, ($i + 2), 1);
			$worksheet->write($i, 2, 'நிறுவனத்தின் பெயர்', $fmt_center);
			$worksheet->setColumn(2, 2, 30.00);
			$worksheet->setMerge($i, 2, ($i + 2), 2);
			$worksheet->write($i, 3, 'அலுவலர்/ஊழியர் பெயர்', $fmt_center);
			$worksheet->setColumn(3, 3, 25.00);
			$worksheet->setMerge($i, 3, ($i + 2), 3);
			$worksheet->write($i, 4, 'அரையாண்டு வருமானம்', $fmt_center);
			$worksheet->setColumn(4, 4, 16.00);
			$worksheet->setMerge($i, 4, ($i + 2), 4);
			$worksheet->write($i, 5, 'நிலுவை', $fmt_center);
			$worksheet->setMerge($i, 5, ($i + 1), 7);
			$worksheet->write($i, 8, 'நடப்பு', $fmt_center);
			$worksheet->setMerge($i, 8, $i, 13);
			$worksheet->write($i, 14, 'மொத்த பாக்கி', $fmt_center);
			$worksheet->setColumn(14,14,11.00);
			$worksheet->setMerge($i, 14, ($i + 2), 14);
			$worksheet->write(++$i, 8, 'முதல் அரையாண்டு', $fmt_center);
			$worksheet->setMerge($i, 8, $i, 10);
			$worksheet->write($i, 11, 'இரண்டாம் அரையாண்டு', $fmt_center);
			$worksheet->setMerge($i, 11, $i++, 13);
			$worksheet->setColumn(5,13,10.00);
			$worksheet->write($i, 5, 'கேட்பு', $fmt_center);
			$worksheet->write($i, 6, 'வசூல்', $fmt_center);
			$worksheet->write($i, 7, 'பாக்கி', $fmt_center);
			$worksheet->write($i, 8, 'கேட்பு', $fmt_center);
			$worksheet->write($i, 9, 'வசூல்', $fmt_center);
			$worksheet->write($i, 10, 'பாக்கி', $fmt_center);
			$worksheet->write($i, 11, 'கேட்பு', $fmt_center);
			$worksheet->write($i, 12, 'வசூல்', $fmt_center);
			$worksheet->write($i++, 13, 'பாக்கி', $fmt_center);
			$sno = 1;
			foreach($data as $row) {
				$j = 0;
				$p1_current = 0;
				$p1_pending = 0;
				$p2_current = 0;
				$p2_pending = 0;
				$output = $this->ProfessionaltaxReceipt->find('all', array(
					'conditions' => array('ProfessionaltaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])
												 , 'ProfessionaltaxReceipt.demand_number' => $row['PtDemand']['demand_number']),
					'order' => 'ProfessionaltaxReceipt.receipt_date ASC')
				);
				foreach($output as $rec){
					$p1_current += (int)($rec['ProfessionaltaxReceipt']['part1_current']);
					$p1_pending += (int)($rec['ProfessionaltaxReceipt']['part1_pending']);
					$p2_current += (int)($rec['ProfessionaltaxReceipt']['part2_current']);
					$p2_pending += (int)($rec['ProfessionaltaxReceipt']['part2_pending']);
				}
				$worksheet->write($i, $j++, $sno++, $fmt_right);
				$worksheet->write($i, $j++, $row['PtDemand']['demand_number'], $fmt_right);
				$worksheet->write($i, $j++, $row['PtDemand']['company_name'], $fmt_left);
				$worksheet->write($i, $j++, $row['PtDemand']['name'], $fmt_left);
				$worksheet->write($i, $j++, $row['PtDemand']['half_yearly_income'], $fmt_right);
				$j += 2;
				$worksheet->write($i, $j++, (((int)$row['PtDemand']['part1_pending'] + (int)$row['PtDemand']['part2_pending']) - ($p1_pending + $p2_pending)), $fmt_right);
				$worksheet->write($i, $j++, $row['PtDemand']['part1_current'], $fmt_right);
				$worksheet->write($i, $j++, $p1_current, $fmt_right);
				$worksheet->write($i, $j++, ((int)$row['PtDemand']['part1_current'] - $p1_current), $fmt_right);
				$worksheet->write($i, $j++, ($row['PtDemand']['part2_current']), $fmt_right);
				$worksheet->write($i, $j++, $p2_current, $fmt_right);
				$worksheet->write($i, $j++, ((int)$row['PtDemand']['part2_current'] - $p2_current), $fmt_right);
				$tmp = (((int)$row['PtDemand']['part1_pending'] + (int)$row['PtDemand']['part2_pending']) - ($p1_pending + $p2_pending));
				$tmp += ((int)$row['PtDemand']['part1_current'] - $p1_current);
				$tmp += ((int)$row['PtDemand']['part2_current'] - $p2_current);
				$worksheet->write($i, $j++, $tmp, $fmt_right);
				$i++;
			}
			$workbook->send('Form_5.xls');
			$workbook->close();
			$this->redirect(array('action'=>'index'));
		}

		function form6_report() {
			$this->layout = false;
			$this->BookDetail->recursive = 1;
			$data = $this->WtDemand->find('all', array(
				'conditions' => array('WtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'WtDemand.demand_number ASC')
			);
			$workbook  = new Spreadsheet_Excel_Writer();
			$workbook->setVersion(8); 
			$worksheet = $workbook->addWorksheet('Form_6');
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
			$fmt_center->setFontFamily('Lohit Tamil');
			$fmt_left_title = $workbook->addFormat();
			$fmt_left_title->setAlign('left');
			$fmt_left_title->setSize(12);
			$fmt_left_title->setFontFamily('Lohit Tamil');
			$fmt_right_title = $workbook->addFormat();
			$fmt_right_title->setAlign('right');
			$fmt_right_title->setSize(12);
			$fmt_right_title->setFontFamily('Lohit Tamil');
			$i = 0;
			$worksheet->write($i, 0, 'ஊராட்சி படிவம் எண்: 6', $fmt_left_title);
			$worksheet->setMerge($i, 0, $i, 5);
			$worksheet->write($i, 6, 'ஆண்டு  _____________________  ', $fmt_right_title);
			$worksheet->setMerge($i, 6, $i++, 11);
			$worksheet->write($i, 0, 'குடிநீர் வரி  (நிலுவை மற்றும் நடப்பு) கேட்பு பதிவேடு', $fmt_center);
			$worksheet->setMerge($i, 0, ++$i, 11);
			$worksheet->write(++$i, 0, 'வரி விதிப்பு எண்', $fmt_center);
			$worksheet->setColumn(0, 0, 12.00);
			$worksheet->setMerge($i, 0, ($i + 1), 0);
			$worksheet->writeString($i, 1, 'பெயர்', $fmt_center);
			$worksheet->setColumn(1, 1, 25.00);
			$worksheet->setMerge($i, 1, ($i + 1), 1);
			$worksheet->write($i, 2, 'முகவரி', $fmt_center);
			$worksheet->setColumn(2, 2, 35.00);
			$worksheet->setMerge($i, 2, ($i + 1), 2);
			$worksheet->write($i, 3, 'கேட்பு', $fmt_center);
			$worksheet->setMerge($i, 3, $i, 5);
			$worksheet->write($i, 6, 'வசூல்', $fmt_center);
			$worksheet->setMerge($i, 6, $i, 8);
			$worksheet->write($i, 9, 'நிலுவை', $fmt_center);
			$worksheet->setMerge($i, 9, $i++, 11);
			$worksheet->setColumn(3, 11, 11.00);
			$worksheet->write($i, 3, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 4, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 5, 'மொத்தம்', $fmt_center);
			$worksheet->write($i, 6, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 7, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 8, 'மொத்தம்', $fmt_center);
			$worksheet->write($i, 9, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 10, 'நடப்பு', $fmt_center);
			$worksheet->write($i++, 11, 'மொத்தம்', $fmt_center);
			foreach($data as $row) {
				$j = 0;
				$watertax_current = 0;
				$watertax_pending = 0;
				$lc_current = 0;
				$lc_pending = 0;
				$output = $this->WatertaxReceipt->find('all', array(
					'conditions' => array('WatertaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])
												 , 'WatertaxReceipt.demand_number' => $row['WtDemand']['demand_number']),
					'order' => 'WatertaxReceipt.receipt_date ASC')
				);
				foreach($output as $rec){
					$watertax_current += (int)($rec['WatertaxReceipt']['wt_current']);
					$watertax_pending += (int)($rec['WatertaxReceipt']['wt_pending']);
				}
				$worksheet->write($i, $j++, $row['WtDemand']['demand_number'], $fmt_right);
				$worksheet->write($i, $j++, $row['WtDemand']['name'], $fmt_left);
				$worksheet->write($i, $j++, $row['WtDemand']['address'], $fmt_left);
				$worksheet->write($i, $j++, $row['WtDemand']['wt_pending'], $fmt_right);
				$worksheet->write($i, $j++, $row['WtDemand']['wt_current'], $fmt_right);
				$worksheet->write($i, $j++, ((int)($row['WtDemand']['wt_pending']) + (int)$row['WtDemand']['wt_current']), $fmt_right);
				$worksheet->write($i, $j++, $watertax_pending, $fmt_right);
				$worksheet->write($i, $j++, $watertax_current, $fmt_right);
				$worksheet->write($i, $j++, ($watertax_current + $watertax_pending), $fmt_right);
				$worksheet->write($i, $j++, ((int)($row['WtDemand']['wt_pending']) - $watertax_pending), $fmt_right);
				$worksheet->write($i, $j++, ((int)($row['WtDemand']['wt_current']) - $watertax_current), $fmt_right);
				$worksheet->write($i, $j++, (((int)($row['WtDemand']['wt_pending']) - $watertax_pending) + ((int)($row['WtDemand']['wt_current']) - $watertax_current)), $fmt_right);
				$i++;
			}
			$workbook->send('Form_6.xls');
			$workbook->close();
			$this->redirect(array('action'=>'index'));
		}
		function form11_reoprt(){
			$workbook  = new Spreadsheet_Excel_Writer();
			$workbook->setVersion(8);
			$worksheet = $workbook->addWorksheet('Form_11');
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
			$fmt_center->setFontFamily('Lohit Tamil');
			$fmt_left_title = $workbook->addFormat();
			$fmt_left_title->setAlign('left');
			$fmt_left_title->setSize(12);
			$fmt_left_title->setFontFamily('Lohit Tamil');
			$fmt_right_title = $workbook->addFormat();
			$fmt_right_title->setAlign('left');
			$fmt_right_title->setSize(12);
			$fmt_right_title->setFontFamily('Lohit Tamil');
			$i = 0;
			$worksheet->write($i, 0, 'ஊராட்சி படிவம் எண்: 11', $fmt_left_title);
			$worksheet->setMerge($i, 0, $i++, 12);
			$worksheet->write($i, 0, 'ரொக்கப் பதிவேடு', $fmt_center);
			$worksheet->setMerge($i, 0, ++$i, 12);
			$worksheet->write(++$i, 0, 'வரவு பெற்றுக்கொண்ட தேதி', $fmt_center);
			$worksheet->setColumn(0,0,10.00);
			$worksheet->setMerge($i, 0, ($i + 1), 0);
			$worksheet->write($i, 1, 'வரவுகள்', $fmt_center);
			$worksheet->setMerge($i, 1, $i, 4);
			$worksheet->write($i, 5, 'செலவுகள்', $fmt_center);
			$worksheet->setMerge($i, 5, $i, 8);
			$worksheet->write($i, 9, 'வங்கி அல்லது கருவூலம்', $fmt_center);
			$worksheet->setMerge($i, 9, $i, 11);
			$worksheet->write($i, 12, 'குறிப்புகள்', $fmt_center);
			$worksheet->setColumn(12,12,14.00);
			$worksheet->setMerge($i, 12, ($i+ 1), 12);
			$worksheet->write(++$i, 1, 'விபரங்கள்', $fmt_center);
			$worksheet->setColumn(1,1,40.00);
			$worksheet->write($i, 2, 'ரொக்கம்', $fmt_center);
			$worksheet->setColumn(2,2,12.00);
			$worksheet->write($i, 3, 'வங்கி', $fmt_center);
			$worksheet->write($i, 4, 'குறிப்புகள்', $fmt_center);
			$worksheet->setColumn(4,4,14.00);
			$worksheet->write($i, 5, 'தொகை கொடுத்த தேதி', $fmt_center);
			$worksheet->setColumn(5,5,12.00);
			$worksheet->write($i, 6, 'செலவு சீட்டு எண்', $fmt_center);
			$worksheet->setColumn(6,6,11.00);
			$worksheet->write($i, 7, 'விபரங்கள்', $fmt_center);
			$worksheet->setColumn(7,7,40.00);
			$worksheet->write($i, 8, 'ரொக்கம்', $fmt_center);
			$worksheet->setColumn(8,8,12.00);
			$worksheet->write($i, 9, 'வங்கி', $fmt_center);
			$worksheet->write($i, 10, 'காசோலை எண்', $fmt_center);
			$worksheet->setColumn(10,11,14.00);
			$worksheet->write($i, 11, 'காசோலை நாள்', $fmt_center);
			$workbook->send('Form_11.xls');
			$workbook->close();
			$this->redirect(array('action'=>'index'));
		}
	}
?>