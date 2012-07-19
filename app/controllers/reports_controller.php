<?php
	App::import('Vendor', 'Writer', array('file' => 'Spreadsheet'.DS.'Writer.php'));
	class ReportsController extends AppController {

		var $uses = array('CashBook', 'Income', 'HousetaxReceipt', 'WatertaxReceipt', 'ProfessionaltaxReceipt', 'DotaxReceipt', 'OthersReceipt', 'Expense', 'Purchase', 'Salary', 'ContractBillEstimation', 'HtDemand', 'HousetaxReceipt', 'PtDemand', 'ProfessionaltaxReceipt', 'WtDemand', 'WatertaxReceipt');
		function index(){
			
		}
		function form3_report() {
			$this->layout = false;
			$data = $this->HtDemand->find('all', array(
				'conditions' => array('HtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'HtDemand.demand_number ASC')
			);
			$workbook  = new Spreadsheet_Excel_Writer();
			$workbook->setVersion(8);
			$workbook->setTempDir('../temp');
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
			$fmt_center->setFontFamily('TAMu_Maduram');
			$fmt_left_title = $workbook->addFormat();
			$fmt_left_title->setAlign('left');
			$fmt_left_title->setSize(12);
			$fmt_left_title->setFontFamily('TAMu_Maduram');
			$fmt_right_title = $workbook->addFormat();
			$fmt_right_title->setAlign('right');
			$fmt_right_title->setSize(12);
			$fmt_right_title->setFontFamily('TAMu_Maduram');
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
					$housetax_current += (double)($rec['HousetaxReceipt']['ht_current']);
					$housetax_pending += (double)($rec['HousetaxReceipt']['ht_pending']);
					$lc_current += (double)($rec['HousetaxReceipt']['lc_current']);
					$lc_pending += (double)($rec['HousetaxReceipt']['lc_pending']);
				}
				$worksheet->writeNumber($i, $j++, $row['HtDemand']['demand_number']);
				$worksheet->writeNumber($i, $j++, $row['HtDemand']['door_number']);
				$j++;
				$worksheet->write($i, $j++, $row['HtDemand']['name'], $fmt_left);
				$j++;
				$worksheet->writeNumber($i, $j++, $row['HtDemand']['ht_pending']);
				$worksheet->writeNumber($i, $j++, $row['HtDemand']['ht_current']);
				$worksheet->writeNumber($i, $j++, $row['HtDemand']['lc_pending']);
				$worksheet->writeNumber($i, $j++, $row['HtDemand']['lc_current']);
				$worksheet->writeNumber($i, $j++, ($row['HtDemand']['ht_pending'] + $row['HtDemand']['lc_pending']));
				$worksheet->writeNumber($i, $j++, ($row['HtDemand']['ht_current'] + $row['HtDemand']['lc_current']));
				$worksheet->writeNumber($i, $j++, $housetax_pending);
				$worksheet->writeNumber($i, $j++, $housetax_current);
				$worksheet->writeNumber($i, $j++, $lc_pending);
				$worksheet->writeNumber($i, $j++, $lc_current);
				$worksheet->writeNumber($i, $j++, ($housetax_pending + $lc_pending));
				$worksheet->writeNumber($i, $j++, ($housetax_current + $lc_current));
				$worksheet->writeNumber($i, $j++, ((double)($row['HtDemand']['ht_pending']) - $housetax_pending));
				$worksheet->writeNumber($i, $j++, ((double)($row['HtDemand']['ht_current']) - $housetax_current));
				$worksheet->writeNumber($i, $j++, ((double)($row['HtDemand']['lc_pending']) - $lc_pending));
				$worksheet->writeNumber($i, $j++, ((double)($row['HtDemand']['lc_current']) - $lc_current));
				$worksheet->writeNumber($i, $j++, (((double)($row['HtDemand']['ht_pending']) - $housetax_pending) + ((double)($row['HtDemand']['lc_pending']) - $lc_pending)));
				$worksheet->writeNumber($i, $j++, (((double)($row['HtDemand']['ht_current']) - $housetax_current) + ((double)($row['HtDemand']['lc_current']) - $lc_current)));
				$i++;
			}
			$workbook->send('Form_3.xls');
			$workbook->close();
			$this->redirect(array('action'=>'index'));
		}

		function form5_report() {
			$this->layout = false;
			$data = $this->PtDemand->find('all', array(
				'conditions' => array('PtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'PtDemand.demand_number ASC')
			);
			$workbook  = new Spreadsheet_Excel_Writer();
			$workbook->setVersion(8);
			$workbook->setTempDir('../temp');
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
			$fmt_center->setFontFamily('TAMu_Maduram');
			$fmt_left_title = $workbook->addFormat();
			$fmt_left_title->setAlign('left');
			$fmt_left_title->setSize(12);
			$fmt_left_title->setFontFamily('TAMu_Maduram');
			$fmt_right_title = $workbook->addFormat();
			$fmt_right_title->setAlign('right');
			$fmt_right_title->setSize(12);
			$fmt_right_title->setFontFamily('TAMu_Maduram');
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
					$p1_current += (double)($rec['ProfessionaltaxReceipt']['part1_current']);
					$p1_pending += (double)($rec['ProfessionaltaxReceipt']['part1_pending']);
					$p2_current += (double)($rec['ProfessionaltaxReceipt']['part2_current']);
					$p2_pending += (double)($rec['ProfessionaltaxReceipt']['part2_pending']);
				}
				$worksheet->writeNumber($i, $j++, $sno++);
				$worksheet->writeNumber($i, $j++, $row['PtDemand']['demand_number']);
				$worksheet->write($i, $j++, $row['PtDemand']['company_name'], $fmt_left);
				$worksheet->write($i, $j++, $row['PtDemand']['name'], $fmt_left);
				$worksheet->writeNumber($i, $j++, $row['PtDemand']['half_yearly_income']);
				$j += 2;
				$worksheet->writeNumber($i, $j++, (((double)$row['PtDemand']['part1_pending'] + (double)$row['PtDemand']['part2_pending']) - ($p1_pending + $p2_pending)));
				$worksheet->writeNumber($i, $j++, $row['PtDemand']['part1_current']);
				$worksheet->writeNumber($i, $j++, $p1_current);
				$worksheet->writeNumber($i, $j++, ((double)$row['PtDemand']['part1_current'] - $p1_current));
				$worksheet->writeNumber($i, $j++, ($row['PtDemand']['part2_current']));
				$worksheet->writeNumber($i, $j++, $p2_current);
				$worksheet->writeNumber($i, $j++, ((double)$row['PtDemand']['part2_current'] - $p2_current));
				$tmp = (((double)$row['PtDemand']['part1_pending'] + (double)$row['PtDemand']['part2_pending']) - ($p1_pending + $p2_pending));
				$tmp += ((double)$row['PtDemand']['part1_current'] - $p1_current);
				$tmp += ((double)$row['PtDemand']['part2_current'] - $p2_current);
				$worksheet->writeNumber($i, $j++, $tmp);
				$i++;
			}
			$workbook->send('Form_5.xls');
			$workbook->close();
			$this->redirect(array('action'=>'index'));
		}

		function form6_report() {
			$this->layout = false;
			$data = $this->WtDemand->find('all', array(
				'conditions' => array('WtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'WtDemand.demand_number ASC')
			);
			$workbook  = new Spreadsheet_Excel_Writer();
			$workbook->setVersion(8);
			$workbook->setTempDir('../temp');
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
			$fmt_center->setFontFamily('TAMu_Maduram');
			$fmt_left_title = $workbook->addFormat();
			$fmt_left_title->setAlign('left');
			$fmt_left_title->setSize(12);
			$fmt_left_title->setFontFamily('TAMu_Maduram');
			$fmt_right_title = $workbook->addFormat();
			$fmt_right_title->setAlign('right');
			$fmt_right_title->setSize(12);
			$fmt_right_title->setFontFamily('TAMu_Maduram');
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
					$watertax_current += (double)($rec['WatertaxReceipt']['wt_current']);
					$watertax_pending += (double)($rec['WatertaxReceipt']['wt_pending']);
				}
				$worksheet->writeNumber($i, $j++, $row['WtDemand']['demand_number']);
				$worksheet->write($i, $j++, $row['WtDemand']['name'], $fmt_left);
				$worksheet->write($i, $j++, $row['WtDemand']['address'], $fmt_left);
				$worksheet->writeNumber($i, $j++, $row['WtDemand']['wt_pending']);
				$worksheet->writeNumber($i, $j++, $row['WtDemand']['wt_current']);
				$worksheet->writeNumber($i, $j++, ((double)($row['WtDemand']['wt_pending']) + (double)$row['WtDemand']['wt_current']));
				$worksheet->writeNumber($i, $j++, $watertax_pending);
				$worksheet->writeNumber($i, $j++, $watertax_current);
				$worksheet->writeNumber($i, $j++, ($watertax_current + $watertax_pending));
				$worksheet->writeNumber($i, $j++, ((double)($row['WtDemand']['wt_pending']) - $watertax_pending));
				$worksheet->writeNumber($i, $j++, ((double)($row['WtDemand']['wt_current']) - $watertax_current));
				$worksheet->writeNumber($i, $j++, (((double)($row['WtDemand']['wt_pending']) - $watertax_pending) + ((double)($row['WtDemand']['wt_current']) - $watertax_current)));
				$i++;
			}
			$workbook->send('Form_6.xls');
			$workbook->close();
			$this->redirect(array('action'=>'index'));
		}
		function form11_reoprt($start_date, $end_date){
			if(!empty($start_date) && !empty($end_date)){
				$workbook  = new Spreadsheet_Excel_Writer();
				$workbook->setVersion(8);
				$workbook->setTempDir('../temp');
				$worksheet = $workbook->addWorksheet('Form_11');
				$worksheet->setInputEncoding('UTF-8');
				$fmt_left = $workbook->addFormat();
				$fmt_left->setAlign('left');
				$fmt_left->setSize(12);
				$fmt_left->setTextWrap();
				$fmt_right = $workbook->addFormat();
				$fmt_right->setAlign('right');
				$fmt_right->setSize(12);
				$fmt_right->setTextWrap();
				$fmt_center = $workbook->addFormat();
				$fmt_center->setAlign('center');
				$fmt_center->setSize(12);
				$fmt_center->setBold();
				$fmt_center->setTextWrap();
				$fmt_center->setFontFamily('TAMu_Maduram');
				$fmt_center_spl = $workbook->addFormat();
				$fmt_center_spl->setAlign('center');
				$fmt_center_spl->setSize(12);
				$fmt_center_spl->setBold();
				$fmt_center_spl->setTextWrap();
				$fmt_center_spl->setBottom(2);
				$fmt_center_spl->setFontFamily('TAMu_Maduram');
				$fmt_left_title = $workbook->addFormat();
				$fmt_left_title->setAlign('left');
				$fmt_left_title->setSize(12);
				$fmt_left_title->setTextWrap();
				$fmt_left_title->setFontFamily('TAMu_Maduram');
				$fmt_right_title = $workbook->addFormat();
				$fmt_right_title->setAlign('right');
				$fmt_right_title->setSize(12);
				$fmt_right_title->setTextWrap();
				$fmt_right_title->setFontFamily('TAMu_Maduram');
				$i = 0;
				$worksheet->write($i, 0, 'ஊராட்சி படிவம் எண்: 11', $fmt_left_title);
				$worksheet->setMerge($i, 0, $i++, 12);
				$worksheet->write($i, 0, 'ரொக்கப் பதிவேடு', $fmt_center);
				$worksheet->setMerge($i, 0, ++$i, 12);
				$worksheet->write(++$i, 0, 'வரவு பெற்றுக் கொண்ட தேதி', $fmt_center_spl);
				$worksheet->setColumn(0,0,12.00);
				$worksheet->setMerge($i, 0, ($i + 1), 0);
				$worksheet->write($i, 1, 'வரவுகள்', $fmt_center);
				$worksheet->setMerge($i, 1, $i, 4);
				$worksheet->write($i, 5, 'செலவுகள்', $fmt_center);
				$worksheet->setMerge($i, 5, $i, 8);
				$worksheet->write($i, 9, 'வங்கி அல்லது கருவூலம்', $fmt_center);
				$worksheet->setMerge($i, 9, $i, 11);
				$worksheet->write($i, 12, 'குறிப்புகள்', $fmt_center_spl);
				$worksheet->setColumn(12,12,30.00);
				$worksheet->setMerge($i, 12, ($i+ 1), 12);
				$worksheet->write(++$i, 1, 'விபரங்கள்', $fmt_center_spl);
				$worksheet->setColumn(1,1,40.00);
				$worksheet->write($i, 2, 'ரொக்கம்', $fmt_center_spl);
				$worksheet->setColumn(2,2,12.00);
				$worksheet->write($i, 3, 'வங்கி தொகை', $fmt_center_spl);
				$worksheet->write($i, 4, 'குறிப்புகள்', $fmt_center_spl);
				$worksheet->setColumn(4,4,30.00);
				$worksheet->write($i, 5, 'தொகை கொடுத்த தேதி', $fmt_center_spl);
				$worksheet->setColumn(5,5,12.00);
				$worksheet->write($i, 6, 'செலவு சீட்டு எண்', $fmt_center_spl);
				$worksheet->setColumn(6,6,15.00);
				$worksheet->write($i, 7, 'விபரங்கள்', $fmt_center_spl);
				$worksheet->setColumn(7,7,40.00);
				$worksheet->write($i, 8, 'ரொக்கம்', $fmt_center_spl);
				$worksheet->setColumn(8,8,12.00);
				$worksheet->write($i, 9, 'வங்கி தொகை', $fmt_center_spl);
				$worksheet->write($i, 10, 'காசோலை எண்', $fmt_center_spl);
				$worksheet->setColumn(10,11,14.00);
				$worksheet->write($i++, 11, 'காசோலை நாள்', $fmt_center_spl);
				$i_copy = $i;
				$income_cash = 0;
				$income_bank = 0;
				$expense_cash = 0;
				$expense_bank = 0;
				$worksheet->write($i, 0, $start_date, $fmt_left);
				$records = $this->CashBook->find('first',array(
					'conditions' => array('CashBook.account_id' => 1, 'CashBook.Opening_date' => $start_date)
				));
				$worksheet->write($i, 1, 'இம்மாத ஆரம்ப இருப்பு', $fmt_left_title);
				$worksheet->writeNumber($i, 2, $records['CashBook']['opening_cash']);
				$worksheet->writeNumber($i++, 3, $records['CashBook']['opening_bank']);
				$income_cash = (double)$records['CashBook']['opening_cash'];
				$income_bank = (double)$records['CashBook']['opening_bank'];
				$i++;
				$records = $this->Income->find('all', array(
					'conditions' => array('Income.income_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Income.account_id' => 1),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 0;
					$worksheet->write($i, $j++, $record['Income']['income_date'], $fmt_left);
					$worksheet->write($i, $j++, $record['Header']['header_name'], $fmt_left);
					$j++;
					$worksheet->writeNumber($i, $j++, $record['Income']['income_amount']);
					$worksheet->write($i, $j++, $record['Income']['description'], $fmt_left);
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
					$worksheet->write($i, 0, $redeipt_date, $fmt_left);
					$worksheet->write($i, 1, 'வீட்டு வரி', $fmt_left_title);
					$worksheet->writeNumber($i++, 2, $tax1);
					$worksheet->write($i, 0, $redeipt_date, $fmt_left);
					$worksheet->write($i, 1, 'நூல் நிலைய வரி', $fmt_left_title);
					$worksheet->writeNumber($i++, 2, $tax2);
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
					$worksheet->write($i, 0, $redeipt_date, $fmt_left);
					$worksheet->write($i, 1, 'தொழில் வரி', $fmt_left_title);
					$worksheet->writeNumber($i++, 2, $tax1);
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
					$worksheet->write($i, 0, $redeipt_date, $fmt_left);
					$worksheet->write($i, 1, 'குடிநீர் வரி', $fmt_left_title);
					$worksheet->writeNumber($i++, 2, $tax1);
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
					$worksheet->write($i, 0, $redeipt_date, $fmt_left);
					$worksheet->write($i, 1, 'டி & ஓ வியாபாரிகள் வரி', $fmt_left_title);
					$worksheet->writeNumber($i++, 2, $tax1);
					$income_cash += $tax1;
				}
				$records = $this->OthersReceipt->find('all', array(
					'conditions' => array('OthersReceipt.receipt_date BETWEEN ? AND ?' => array($start_date, $end_date)),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 0;
					$worksheet->write($i, $j++, $record['OthersReceipt']['receipt_date'], $fmt_left);
					$worksheet->write($i, $j++, $record['Header']['header_name'], $fmt_left);
					$worksheet->writeNumber($i, $j++, $record['OthersReceipt']['amount']);
					$income_cash += (double)$record['OthersReceipt']['amount'];
					$i++;
				}
				$records = $this->Expense->find('all', array(
					'conditions' => array('Expense.expense_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Expense.account_id' => 1),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 5;
					$worksheet->write($i_copy, $j++, $record['Expense']['expense_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Expense']['voucher_number'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Header']['header_name'], $fmt_left);
					$j++;
					$worksheet->writeNumber($i_copy, $j++, $record['Expense']['expense_amount']);
					$worksheet->writeNumber($i_copy, $j++, $record['Expense']['cheque_number']);
					$worksheet->write($i_copy, $j++, $record['Expense']['cheque_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Expense']['description'], $fmt_left);
					$expense_bank += (double)$record['Expense']['expense_amount'];
					$i_copy++;
				}
				$records = $this->Purchase->find('all', array(
					'conditions' => array('Purchase.purchase_date BETWEEN ? AND ?' => array($start_date, $end_date)),
				));
				if(!empty($records)){
					$worksheet->write($i_copy++, 7, 'கொள்முதல்:', $fmt_left_title);
				}
				foreach($records as $record){
					$j = 5;
					$worksheet->write($i_copy, $j++, $record['Purchase']['purchase_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Purchase']['voucher_number'], $fmt_left);
					$worksheet->write($i_copy, $j++, "......".$record['Purchase']['company_name'], $fmt_left);
					$j++;
					$worksheet->writeNumber($i_copy, $j++, $record['Purchase']['total_amt']);
					$worksheet->writeNumber($i_copy, $j++, $record['Purchase']['cheque_number']);
					$worksheet->write($i_copy, $j++, $record['Purchase']['cheque_date'], $fmt_left);
					$expense_bank += (double)$record['Purchase']['total_amt'];
					$i_copy++;
				}
				$records = $this->Salary->find('all', array(
					'conditions' => array('Salary.salary_date BETWEEN ? AND ?' => array($start_date, $end_date)),
				));
				foreach($records as $record){
					$j = 5;
					$worksheet->write($i_copy, $j++, $record['Salary']['salary_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Salary']['voucher_number'], $fmt_left);
					$worksheet->write($i_copy, $j++, 'ஊத்தியம்', $fmt_left_title);
					$j++;
					$worksheet->writeNumber($i_copy, $j++, $record['Salary']['cheque_amount']);
					$worksheet->writeNumber($i_copy, $j++, $record['Salary']['cheque_number']);
					$worksheet->write($i_copy, $j++, $record['Salary']['cheque_date'], $fmt_left);
					$expense_bank += (double)$record['Salary']['cheque_amount'];
					$i_copy++;
				}
				$records = $this->ContractBillEstimation->find('all', array(
					'conditions' => array('ContractBillEstimation.bill_date BETWEEN ? AND ?' => array($start_date, $end_date),
													'ContractBillEstimation.account_id' => 1),
				));
				if(!empty($records)){
					$worksheet->write($i_copy++, 7, 'வரைவு மதிப்பீடு:', $fmt_left_title);
				}
				foreach($records as $record){
					$j = 5;
					$worksheet->write($i_copy, $j++, $record['ContractBillEstimation']['bill_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['ContractBillEstimation']['voucher_number'], $fmt_left);
					$worksheet->write($i_copy, $j++, "......".$record['ContractBillEstimation']['contractor_name'], $fmt_left);
					$j++;
					$worksheet->writeNumber($i_copy, $j++, $record['ContractBillEstimation']['cheque_amt']);
					$worksheet->writeNumber($i_copy, $j++, $record['ContractBillEstimation']['cheque_number']);
					$worksheet->write($i_copy, $j++, $record['ContractBillEstimation']['cheque_date'], $fmt_left);
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
				$worksheet->write($i_copy, 5, $end_date, $fmt_left);
				$worksheet->write($i_copy, 7, 'இம்மாத இறுதி இருப்பு', $fmt_left_title);
				$worksheet->writeNumber($i_copy, 8, ($income_cash - $expense_cash));
				$worksheet->writeNumber($i_copy++, 9, ($income_bank - $expense_bank));
				$special = $workbook->addFormat();
				$special->setBottom(2);
				$worksheet->write($i_copy, 2, '', $special);
				$worksheet->write($i_copy, 3, '', $special);
				$worksheet->write($i_copy, 8, '', $special);
				$worksheet->write($i_copy++, 9, '', $special);
				$worksheet->writeNumber(++$i_copy, 2, $income_cash);
				$worksheet->writeNumber($i_copy, 3, $income_bank);
				$worksheet->writeNumber($i_copy, 8, $income_cash);
				$worksheet->writeNumber($i_copy++, 9, $income_bank);
				$worksheet->write($i_copy, 2, '', $special);
				$worksheet->write($i_copy, 3, '', $special);
				$worksheet->write($i_copy, 8, '', $special);
				$worksheet->write($i_copy, 9, '', $special);
				$workbook->send('Form_11.xls');
				$workbook->close();
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function form23_reoprt($start_date, $end_date){
			if(!empty($start_date) && !empty($end_date)){
				$workbook  = new Spreadsheet_Excel_Writer();
				$workbook->setVersion(8);
				$workbook->setTempDir('../temp');
				$worksheet = $workbook->addWorksheet('Form_11');
				$worksheet->setInputEncoding('UTF-8');
				$fmt_left = $workbook->addFormat();
				$fmt_left->setAlign('left');
				$fmt_left->setSize(12);
				$fmt_left->setTextWrap();
				$fmt_right = $workbook->addFormat();
				$fmt_right->setAlign('right');
				$fmt_right->setSize(12);
				$fmt_right->setTextWrap();
				$fmt_center = $workbook->addFormat();
				$fmt_center->setAlign('center');
				$fmt_center->setSize(12);
				$fmt_center->setBold();
				$fmt_center->setTextWrap();
				$fmt_center->setFontFamily('TAMu_Maduram');
				$fmt_center_spl = $workbook->addFormat();
				$fmt_center_spl->setAlign('center');
				$fmt_center_spl->setSize(12);
				$fmt_center_spl->setBold();
				$fmt_center_spl->setTextWrap();
				$fmt_center_spl->setBottom(2);
				$fmt_center_spl->setFontFamily('TAMu_Maduram');
				$fmt_left_title = $workbook->addFormat();
				$fmt_left_title->setAlign('left');
				$fmt_left_title->setSize(12);
				$fmt_left_title->setTextWrap();
				$fmt_left_title->setFontFamily('TAMu_Maduram');
				$fmt_right_title = $workbook->addFormat();
				$fmt_right_title->setAlign('right');
				$fmt_right_title->setSize(12);
				$fmt_right_title->setTextWrap();
				$fmt_right_title->setFontFamily('TAMu_Maduram');
				$i = 0;
				$worksheet->write($i, 0, 'ஊராட்சி படிவம் எண்: 11', $fmt_left_title);
				$worksheet->setMerge($i, 0, $i++, 12);
				$worksheet->write($i, 0, 'ரொக்கப் பதிவேடு', $fmt_center);
				$worksheet->setMerge($i, 0, ++$i, 12);
				$worksheet->write(++$i, 0, 'வரவு பெற்றுக் கொண்ட தேதி', $fmt_center_spl);
				$worksheet->setColumn(0,0,12.00);
				$worksheet->setMerge($i, 0, ($i + 1), 0);
				$worksheet->write($i, 1, 'வரவுகள்', $fmt_center);
				$worksheet->setMerge($i, 1, $i, 4);
				$worksheet->write($i, 5, 'செலவுகள்', $fmt_center);
				$worksheet->setMerge($i, 5, $i, 8);
				$worksheet->write($i, 9, 'வங்கி அல்லது கருவூலம்', $fmt_center);
				$worksheet->setMerge($i, 9, $i, 11);
				$worksheet->write($i, 12, 'குறிப்புகள்', $fmt_center_spl);
				$worksheet->setColumn(12,12,30.00);
				$worksheet->setMerge($i, 12, ($i+ 1), 12);
				$worksheet->write(++$i, 1, 'விபரங்கள்', $fmt_center_spl);
				$worksheet->setColumn(1,1,40.00);
				$worksheet->write($i, 2, 'ரொக்கம்', $fmt_center_spl);
				$worksheet->setColumn(2,2,12.00);
				$worksheet->write($i, 3, 'வங்கி தொகை', $fmt_center_spl);
				$worksheet->write($i, 4, 'குறிப்புகள்', $fmt_center_spl);
				$worksheet->setColumn(4,4,30.00);
				$worksheet->write($i, 5, 'தொகை கொடுத்த தேதி', $fmt_center_spl);
				$worksheet->setColumn(5,5,12.00);
				$worksheet->write($i, 6, 'செலவு சீட்டு எண்', $fmt_center_spl);
				$worksheet->setColumn(6,6,15.00);
				$worksheet->write($i, 7, 'விபரங்கள்', $fmt_center_spl);
				$worksheet->setColumn(7,7,40.00);
				$worksheet->write($i, 8, 'ரொக்கம்', $fmt_center_spl);
				$worksheet->setColumn(8,8,12.00);
				$worksheet->write($i, 9, 'வங்கி தொகை', $fmt_center_spl);
				$worksheet->write($i, 10, 'காசோலை எண்', $fmt_center_spl);
				$worksheet->setColumn(10,11,14.00);
				$worksheet->write($i++, 11, 'காசோலை நாள்', $fmt_center_spl);
				$i_copy = $i;
				$income_cash = 0;
				$income_bank = 0;
				$expense_cash = 0;
				$expense_bank = 0;
				$worksheet->write($i, 0, $start_date, $fmt_left);
				$records = $this->CashBook->find('first',array(
					'conditions' => array('CashBook.account_id' => 2, 'CashBook.Opening_date' => $start_date)
				));
				$worksheet->write($i, 1, 'இம்மாத ஆரம்ப இருப்பு', $fmt_left_title);
				$worksheet->writeNumber($i, 2, $records['CashBook']['opening_cash']);
				$worksheet->writeNumber($i++, 3, $records['CashBook']['opening_bank']);
				$income_cash = (double)$records['CashBook']['opening_cash'];
				$income_bank = (double)$records['CashBook']['opening_bank'];
				$i++;
				$records = $this->Income->find('all', array(
					'conditions' => array('Income.income_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Income.account_id' => 2),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 0;
					$worksheet->write($i, $j++, $record['Income']['income_date'], $fmt_left);
					$worksheet->write($i, $j++, $record['Header']['header_name'], $fmt_left);
					$j++;
					$worksheet->writeNumber($i, $j++, $record['Income']['income_amount']);
					$worksheet->write($i, $j++, $record['Income']['description'], $fmt_left);
					$income_bank += (double)$record['Income']['income_amount'];
					$i++;
				}
				$records = $this->Expense->find('all', array(
					'conditions' => array('Expense.expense_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Expense.account_id' => 2),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 5;
					$worksheet->write($i_copy, $j++, $record['Expense']['expense_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Expense']['voucher_number'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Header']['header_name'], $fmt_left);
					$j++;
					$worksheet->writeNumber($i_copy, $j++, $record['Expense']['expense_amount']);
					$worksheet->writeNumber($i_copy, $j++, $record['Expense']['cheque_number']);
					$worksheet->write($i_copy, $j++, $record['Expense']['cheque_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Expense']['description'], $fmt_left);
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
				$worksheet->write($i_copy, 5, $end_date, $fmt_left);
				$worksheet->write($i_copy, 7, 'இம்மாத இறுதி இருப்பு', $fmt_left_title);
				$worksheet->writeNumber($i_copy, 8, ($income_cash - $expense_cash));
				$worksheet->writeNumber($i_copy++, 9, ($income_bank - $expense_bank));
				$special = $workbook->addFormat();
				$special->setBottom(2);
				$worksheet->write($i_copy, 2, '', $special);
				$worksheet->write($i_copy, 3, '', $special);
				$worksheet->write($i_copy, 8, '', $special);
				$worksheet->write($i_copy++, 9, '', $special);
				$worksheet->writeNumber(++$i_copy, 2, $income_cash);
				$worksheet->writeNumber($i_copy, 3, $income_bank);
				$worksheet->writeNumber($i_copy, 8, $income_cash);
				$worksheet->writeNumber($i_copy++, 9, $income_bank);
				$worksheet->write($i_copy, 2, '', $special);
				$worksheet->write($i_copy, 3, '', $special);
				$worksheet->write($i_copy, 8, '', $special);
				$worksheet->write($i_copy, 9, '', $special);
				$workbook->send('Form_23.xls');
				$workbook->close();
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function form26_reoprt($start_date, $end_date){
			if(!empty($start_date) && !empty($end_date)){
				$workbook  = new Spreadsheet_Excel_Writer();
				$workbook->setVersion(8);
				$workbook->setTempDir('../temp');
				$worksheet = $workbook->addWorksheet('Form_11');
				$worksheet->setInputEncoding('UTF-8');
				$fmt_left = $workbook->addFormat();
				$fmt_left->setAlign('left');
				$fmt_left->setSize(12);
				$fmt_left->setTextWrap();
				$fmt_right = $workbook->addFormat();
				$fmt_right->setAlign('right');
				$fmt_right->setSize(12);
				$fmt_right->setTextWrap();
				$fmt_center = $workbook->addFormat();
				$fmt_center->setAlign('center');
				$fmt_center->setSize(12);
				$fmt_center->setBold();
				$fmt_center->setTextWrap();
				$fmt_center->setFontFamily('TAMu_Maduram');
				$fmt_center_spl = $workbook->addFormat();
				$fmt_center_spl->setAlign('center');
				$fmt_center_spl->setSize(12);
				$fmt_center_spl->setBold();
				$fmt_center_spl->setTextWrap();
				$fmt_center_spl->setBottom(1);
				$fmt_center_spl->setFontFamily('TAMu_Maduram');
				$fmt_left_title = $workbook->addFormat();
				$fmt_left_title->setAlign('left');
				$fmt_left_title->setSize(12);
				$fmt_left_title->setTextWrap();
				$fmt_left_title->setFontFamily('TAMu_Maduram');
				$fmt_right_title = $workbook->addFormat();
				$fmt_right_title->setAlign('right');
				$fmt_right_title->setSize(12);
				$fmt_right_title->setTextWrap();
				$fmt_right_title->setFontFamily('TAMu_Maduram');
				$i = 0;
				$worksheet->write($i, 0, 'ஊராட்சி படிவம் எண்: 11', $fmt_left_title);
				$worksheet->setMerge($i, 0, $i++, 12);
				$worksheet->write($i, 0, 'ரொக்கப் பதிவேடு', $fmt_center);
				$worksheet->setMerge($i, 0, ++$i, 12);
				$worksheet->write(++$i, 0, 'வரவு பெற்றுக் கொண்ட தேதி', $fmt_center_spl);
				$worksheet->write(($i + 1), 0, '', $fmt_center_spl);
				$worksheet->setColumn(0,0,12.00);
				$worksheet->setMerge($i, 0, ($i + 1), 0);
				$worksheet->write($i, 1, 'வரவுகள்', $fmt_center);
				$worksheet->setMerge($i, 1, $i, 4);
				$worksheet->write($i, 5, 'செலவுகள்', $fmt_center);
				$worksheet->setMerge($i, 5, $i, 8);
				$worksheet->write($i, 9, 'வங்கி அல்லது கருவூலம்', $fmt_center);
				$worksheet->setMerge($i, 9, $i, 11);
				$worksheet->write($i, 12, 'குறிப்புகள்', $fmt_center_spl);
				$worksheet->write(($i + 1), 12, '', $fmt_center_spl);
				$worksheet->setColumn(12,12,30.00);
				$worksheet->setMerge($i, 12, ($i+ 1), 12);
				$worksheet->write(++$i, 1, 'விபரங்கள்', $fmt_center_spl);
				$worksheet->setColumn(1,1,40.00);
				$worksheet->write($i, 2, 'ரொக்கம்', $fmt_center_spl);
				$worksheet->setColumn(2,2,12.00);
				$worksheet->write($i, 3, 'வங்கி தொகை', $fmt_center_spl);
				$worksheet->write($i, 4, 'குறிப்புகள்', $fmt_center_spl);
				$worksheet->setColumn(4,4,30.00);
				$worksheet->write($i, 5, 'தொகை கொடுத்த தேதி', $fmt_center_spl);
				$worksheet->setColumn(5,5,12.00);
				$worksheet->write($i, 6, 'செலவு சீட்டு எண்', $fmt_center_spl);
				$worksheet->setColumn(6,6,15.00);
				$worksheet->write($i, 7, 'விபரங்கள்', $fmt_center_spl);
				$worksheet->setColumn(7,7,40.00);
				$worksheet->write($i, 8, 'ரொக்கம்', $fmt_center_spl);
				$worksheet->setColumn(8,8,12.00);
				$worksheet->write($i, 9, 'வங்கி தொகை', $fmt_center_spl);
				$worksheet->write($i, 10, 'காசோலை எண்', $fmt_center_spl);
				$worksheet->setColumn(10,11,14.00);
				$worksheet->write($i++, 11, 'காசோலை நாள்', $fmt_center_spl);
				$i_copy = $i;
				$income_cash = 0;
				$income_bank = 0;
				$expense_cash = 0;
				$expense_bank = 0;
				$worksheet->write($i, 0, $start_date, $fmt_left);
				$records = $this->CashBook->find('first',array(
					'conditions' => array('CashBook.account_id' => 1, 'CashBook.Opening_date' => $start_date)
				));
				$worksheet->write($i, 1, 'இம்மாத ஆரம்ப இருப்பு', $fmt_left_title);
				$worksheet->writeNumber($i, 2, $records['CashBook']['opening_cash']);
				$worksheet->writeNumber($i++, 3, $records['CashBook']['opening_bank']);
				$income_cash = (double)$records['CashBook']['opening_cash'];
				$income_bank = (double)$records['CashBook']['opening_bank'];
				$i++;
				$records = $this->Income->find('all', array(
					'conditions' => array('Income.income_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Income.account_id' => 3),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 0;
					$worksheet->write($i, $j++, $record['Income']['income_date'], $fmt_left);
					$worksheet->write($i, $j++, $record['Header']['header_name'], $fmt_left);
					$j++;
					$worksheet->writeNumber($i, $j++, $record['Income']['income_amount']);
					$worksheet->write($i, $j++, $record['Income']['description'], $fmt_left);
					$income_bank += (double)$record['Income']['income_amount'];
					$i++;
				}
				$records = $this->Expense->find('all', array(
					'conditions' => array('Expense.expense_date BETWEEN ? AND ?' => array($start_date, $end_date), 'Expense.account_id' => 3),
					'contain' => array('Account','Header')
				));
				foreach($records as $record){
					$j = 5;
					$worksheet->write($i_copy, $j++, $record['Expense']['expense_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Expense']['voucher_number'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Header']['header_name'], $fmt_left);
					$j++;
					$worksheet->writeNumber($i_copy, $j++, $record['Expense']['expense_amount']);
					$worksheet->writeNumber($i_copy, $j++, $record['Expense']['cheque_number']);
					$worksheet->write($i_copy, $j++, $record['Expense']['cheque_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['Expense']['description'], $fmt_left);
					$expense_bank += (double)$record['Expense']['expense_amount'];
					$i_copy++;
				}
				$records = $this->ContractBillEstimation->find('all', array(
					'conditions' => array('ContractBillEstimation.bill_date BETWEEN ? AND ?' => array($start_date, $end_date),
													'ContractBillEstimation.account_id' => 3),
				));
				if(!empty($records)){
					$worksheet->write($i_copy++, 7, 'வரைவு மதிப்பீடு:', $fmt_left_title);
				}
				foreach($records as $record){
					$j = 5;
					$worksheet->write($i_copy, $j++, $record['ContractBillEstimation']['bill_date'], $fmt_left);
					$worksheet->write($i_copy, $j++, $record['ContractBillEstimation']['voucher_number'], $fmt_left);
					$worksheet->write($i_copy, $j++, "......".$record['ContractBillEstimation']['contractor_name'], $fmt_left);
					$j++;
					$worksheet->writeNumber($i_copy, $j++, $record['ContractBillEstimation']['cheque_amt']);
					$worksheet->writeNumber($i_copy, $j++, $record['ContractBillEstimation']['cheque_number']);
					$worksheet->write($i_copy, $j++, $record['ContractBillEstimation']['cheque_date'], $fmt_left);
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
				$worksheet->write($i_copy, 5, $end_date, $fmt_left);
				$worksheet->write($i_copy, 7, 'இம்மாத இறுதி இருப்பு', $fmt_left_title);
				$worksheet->writeNumber($i_copy, 8, ($income_cash - $expense_cash));
				$worksheet->writeNumber($i_copy++, 9, ($income_bank - $expense_bank));
				$special = $workbook->addFormat();
				$special->setBottom(2);
				$worksheet->write($i_copy, 2, '', $special);
				$worksheet->write($i_copy, 3, '', $special);
				$worksheet->write($i_copy, 8, '', $special);
				$worksheet->write($i_copy++, 9, '', $special);
				$worksheet->writeNumber(++$i_copy, 2, $income_cash);
				$worksheet->writeNumber($i_copy, 3, $income_bank);
				$worksheet->writeNumber($i_copy, 8, $income_cash);
				$worksheet->writeNumber($i_copy++, 9, $income_bank);
				$worksheet->write($i_copy, 2, '', $special);
				$worksheet->write($i_copy, 3, '', $special);
				$worksheet->write($i_copy, 8, '', $special);
				$worksheet->write($i_copy, 9, '', $special);
				$workbook->send('Form_26.xls');
				$workbook->close();
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function form7_report() {
			$this->layout = false;
			$workbook  = new Spreadsheet_Excel_Writer();
			$workbook->setVersion(8);
			$workbook->setTempDir('../temp');
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
			$fmt_center->setFontFamily('TAMu_Maduram');
			$fmt_left_title = $workbook->addFormat();
			$fmt_left_title->setAlign('left');
			$fmt_left_title->setSize(12);
			$fmt_left_title->setFontFamily('TAMu_Maduram');
			$fmt_right_title = $workbook->addFormat();
			$fmt_right_title->setAlign('right');
			$fmt_right_title->setSize(12);
			$fmt_right_title->setFontFamily('TAMu_Maduram');
			$i = 0;
			$worksheet->write($i, 0, 'ஊராட்சி படிவம் எண்: 7', $fmt_left_title);
			$worksheet->setMerge($i, 0, $i, 16);
			$worksheet->write($i, 0, 'ஊராட்சி வரிகள் மற்றும் பல்வகை வரவு வசூல் பதிவேடு', $fmt_center);
			$worksheet->setMerge($i, 0, ++$i, 16);
			$worksheet->write(++$i, 0, 'தேதி மாதம் ஆண்டு', $fmt_center);
			$worksheet->setColumn(0,0,10.00);
			$worksheet->setMerge($i, 0, ($i + 1), 0);
			$worksheet->write($i, 1, 'வரி விதிப்பு எண்', $fmt_center);
			$worksheet->setColumn(1,1,10.00);
			$worksheet->setMerge($i, 1, ($i + 1), 1);
			$worksheet->write($i, 2, 'வரி ரசீது எண்', $fmt_center);
			$worksheet->setColumn(2,2,10.00);
			$worksheet->setMerge($i, 2, ($i + 1), 2);
			$worksheet->setColumn(3,16,12.00);
			$worksheet->write($i, 3, 'வீட்டு வரி', $fmt_center);
			$worksheet->setMerge($i, 3, $i, 4);
			$worksheet->write($i, 5, 'நூல் நிலைய வரி', $fmt_center);
			$worksheet->setMerge($i, 5, $i, 6);
			$worksheet->write($i, 7, 'தண்ணீர் தீர்வை', $fmt_center);
			$worksheet->setMerge($i, 7, $i, 8);
			$worksheet->write($i, 9, 'தண்ணீர் கட்டணம்', $fmt_center);
			$worksheet->setMerge($i, 9, $i, 10);
			$worksheet->write($i, 11, 'தொழில் வரி', $fmt_center);
			$worksheet->setMerge($i, 11, $i, 12);
			$worksheet->write($i, 13, 'பலவகை வரவினம்', $fmt_center);
			$worksheet->setMerge($i, 13, $i++, 16);
			$worksheet->write($i, 3, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 4, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 5, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 6, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 7, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 8, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 9, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 10, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 11, 'நிலுவை', $fmt_center);
			$worksheet->write($i, 12, 'நடப்பு', $fmt_center);
			$worksheet->write($i, 13, 'ரசீது எண்', $fmt_center);
			$worksheet->write($i, 14, 'நபரின் பெயர்', $fmt_center);
			$worksheet->setColumn(14,14,35.00);
			$worksheet->write($i, 15, 'வரவின் வகை', $fmt_center);
			$worksheet->write($i, 16, 'செலுத்திய தொகை', $fmt_center);
			$workbook->send('Form_7.xls');
			$workbook->close();
			$this->redirect(array('action'=>'index'));
		}
	}
?>