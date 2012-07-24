<?php
	App::import('Vendor', 'Writer', array('file' => 'Spreadsheet'.DS.'Writer.php'));
	class ReportsController extends AppController {

		var $uses = array('CashToBank', 'Expense', 'Income', 'HousetaxReceipt', 'WatertaxReceipt', 'ProfessionaltaxReceipt', 'DotaxReceipt', 'OthersReceipt', 'HtDemand', 'PtDemand', 'WtDemand', 'DoDemand', 'Header');
		function index(){

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

		function form3_report() {
			$this->layout = false;
			$xls_fmt = $this->xls_format('Form_3');
			$data = $this->HtDemand->find('all', array(
				'conditions' => array('HtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'HtDemand.demand_number ASC')
			);
			$i = 0;
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்: 3', $xls_fmt['fmt_left_title']);
			$xls_fmt['worksheet']->setMerge($i, 0, $i, 10);
			$xls_fmt['worksheet']->write($i, 11, 'ஆண்டு  _____________________  ', $xls_fmt['fmt_right_title']);
			$xls_fmt['worksheet']->setMerge($i, 11, $i++, 22);
			$xls_fmt['worksheet']->write($i, 0, 'வீட்டு வரி (நிலுவை மற்றும் நடப்பு) கேட்பு பதிவேடு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 0, ++$i, 22);
			$xls_fmt['worksheet']->write(++$i, 0, 'வரி விதிப்பு எண்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 0, ($i + 2), 0);
			$xls_fmt['worksheet']->setColumn(0,0,10.00);
			$xls_fmt['worksheet']->write($i, 1, 'கதவு இலக்க எண்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(1,1,10.00);
			$xls_fmt['worksheet']->setMerge($i, 1, ($i + 2), 1);
			$xls_fmt['worksheet']->write($i, 2, 'சர்வே எண்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(2,2,10.00);
			$xls_fmt['worksheet']->setMerge($i, 2, ($i + 2), 2);
			$xls_fmt['worksheet']->write($i, 3, 'பெயர்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(3,3,25.00);
			$xls_fmt['worksheet']->setMerge($i, 3, ($i + 2), 3);
			$xls_fmt['worksheet']->write($i, 4, 'மதிப்பீடு சதுர அடி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 4, ($i + 2), 4);
			$xls_fmt['worksheet']->setColumn(4,4,12.00);
			$xls_fmt['worksheet']->write($i, 5, 'கேட்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 5, $i, 10);
			$xls_fmt['worksheet']->write($i, 11, 'வசூல்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 11, $i, 16);
			$xls_fmt['worksheet']->write($i, 17, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 17, $i++, 22);
			$xls_fmt['worksheet']->write($i, 5, 'வீட்டு வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 5, $i, 6);
			$xls_fmt['worksheet']->write($i, 7, 'நூல் நிலைய வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 7, $i, 8);
			$xls_fmt['worksheet']->write($i, 9, 'மொத்தம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 9, $i, 10);
			$xls_fmt['worksheet']->write($i, 11, 'வீட்டு வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 11, $i, 12);
			$xls_fmt['worksheet']->write($i, 13, 'நூல் நிலைய வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 13, $i, 14);
			$xls_fmt['worksheet']->write($i, 15, 'மொத்தம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 15, $i, 16);
			$xls_fmt['worksheet']->write($i, 17, 'வீட்டு வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 17, $i, 18);
			$xls_fmt['worksheet']->write($i, 19, 'நூல் நிலைய வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 19, $i, 20);
			$xls_fmt['worksheet']->write($i, 21, 'மொத்தம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 21, $i++, 22);
			$xls_fmt['worksheet']->setColumn(5,22,11.00);
			$xls_fmt['worksheet']->write($i, 5, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 6, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 7, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 8, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 9, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 10, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 11, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 12, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 13, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 14, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 15, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 16, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 17, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 18, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 19, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 20, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 21, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i++, 22, 'நடப்பு', $xls_fmt['fmt_center']);
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
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['HtDemand']['demand_number']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['HtDemand']['door_number']);
				$j++;
				$xls_fmt['worksheet']->write($i, $j++, $row['HtDemand']['name'], $xls_fmt['fmt_left']);
				$j++;
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['HtDemand']['ht_pending']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['HtDemand']['ht_current']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['HtDemand']['lc_pending']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['HtDemand']['lc_current']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, ($row['HtDemand']['ht_pending'] + $row['HtDemand']['lc_pending']));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ($row['HtDemand']['ht_current'] + $row['HtDemand']['lc_current']));
				$xls_fmt['worksheet']->writeNumber($i, $j++, $housetax_pending);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $housetax_current);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $lc_pending);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $lc_current);
				$xls_fmt['worksheet']->writeNumber($i, $j++, ($housetax_pending + $lc_pending));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ($housetax_current + $lc_current));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)($row['HtDemand']['ht_pending']) - $housetax_pending));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)($row['HtDemand']['ht_current']) - $housetax_current));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)($row['HtDemand']['lc_pending']) - $lc_pending));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)($row['HtDemand']['lc_current']) - $lc_current));
				$xls_fmt['worksheet']->writeNumber($i, $j++, (((double)($row['HtDemand']['ht_pending']) - $housetax_pending) + ((double)($row['HtDemand']['lc_pending']) - $lc_pending)));
				$xls_fmt['worksheet']->writeNumber($i, $j++, (((double)($row['HtDemand']['ht_current']) - $housetax_current) + ((double)($row['HtDemand']['lc_current']) - $lc_current)));
				$i++;
			}
			$xls_fmt['workbook']->send('Form_3.xls');
			$xls_fmt['workbook']->close();
			$this->redirect(array('action'=>'index'));
		}

    function form5_report() {
			$this->layout = false;
			$xls_fmt = $this->xls_format('Form_5');
			$data = $this->PtDemand->find('all', array(
				'conditions' => array('PtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'PtDemand.demand_number ASC')
			);
			$i = 0;
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்  5', $xls_fmt['fmt_left_title']);
			$xls_fmt['worksheet']->setMerge($i, 0, $i, 7);
			$xls_fmt['worksheet']->write($i, 8, 'ஆண்டு  _____________________  ', $xls_fmt['fmt_right_title']);
			$xls_fmt['worksheet']->setMerge($i, 8, $i++, 14);
			$xls_fmt['worksheet']->write($i, 0, 'தொழில் வரி (நிலுவை மற்றும் நடப்பு) கேட்பு பதிவேடு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 0, ++$i, 14);
			$xls_fmt['worksheet']->write(++$i, 0, 'வ. எண்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 0, ($i + 2), 0);
			$xls_fmt['worksheet']->write($i, 1, 'வரி விதிப்பு எண்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(1,1,12.00);
			$xls_fmt['worksheet']->setMerge($i, 1, ($i + 2), 1);
			$xls_fmt['worksheet']->write($i, 2, 'நிறுவனத்தின் பெயர்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(2, 2, 30.00);
			$xls_fmt['worksheet']->setMerge($i, 2, ($i + 2), 2);
			$xls_fmt['worksheet']->write($i, 3, 'அலுவலர்/ஊழியர் பெயர்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(3, 3, 25.00);
			$xls_fmt['worksheet']->setMerge($i, 3, ($i + 2), 3);
			$xls_fmt['worksheet']->write($i, 4, 'அரையாண்டு வருமானம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(4, 4, 16.00);
			$xls_fmt['worksheet']->setMerge($i, 4, ($i + 2), 4);
			$xls_fmt['worksheet']->write($i, 5, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 5, ($i + 1), 7);
			$xls_fmt['worksheet']->write($i, 8, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 8, $i, 13);
			$xls_fmt['worksheet']->write($i, 14, 'மொத்த பாக்கி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(14,14,11.00);
			$xls_fmt['worksheet']->setMerge($i, 14, ($i + 2), 14);
			$xls_fmt['worksheet']->write(++$i, 8, 'முதல் அரையாண்டு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 8, $i, 10);
			$xls_fmt['worksheet']->write($i, 11, 'இரண்டாம் அரையாண்டு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 11, $i++, 13);
			$xls_fmt['worksheet']->setColumn(5,13,10.00);
			$xls_fmt['worksheet']->write($i, 5, 'கேட்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 6, 'வசூல்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 7, 'பாக்கி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 8, 'கேட்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 9, 'வசூல்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 10, 'பாக்கி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 11, 'கேட்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 12, 'வசூல்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i++, 13, 'பாக்கி', $xls_fmt['fmt_center']);
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
				$xls_fmt['worksheet']->writeNumber($i, $j++, $sno++);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['PtDemand']['demand_number']);
				$xls_fmt['worksheet']->write($i, $j++, $row['PtDemand']['company_name'], $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->write($i, $j++, $row['PtDemand']['name'], $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['PtDemand']['half_yearly_income']);
				$j += 2;
				$xls_fmt['worksheet']->writeNumber($i, $j++, (((double)$row['PtDemand']['part1_pending'] + (double)$row['PtDemand']['part2_pending']) - ($p1_pending + $p2_pending)));
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['PtDemand']['part1_current']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $p1_current);
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)$row['PtDemand']['part1_current'] - $p1_current));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ($row['PtDemand']['part2_current']));
				$xls_fmt['worksheet']->writeNumber($i, $j++, $p2_current);
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)$row['PtDemand']['part2_current'] - $p2_current));
				$tmp = (((double)$row['PtDemand']['part1_pending'] + (double)$row['PtDemand']['part2_pending']) - ($p1_pending + $p2_pending));
				$tmp += ((double)$row['PtDemand']['part1_current'] - $p1_current);
				$tmp += ((double)$row['PtDemand']['part2_current'] - $p2_current);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $tmp);
				$i++;
			}
			$xls_fmt['workbook']->send('Form_5.xls');
			$xls_fmt['workbook']->close();
			$this->redirect(array('action'=>'index'));
		}

		function form6_report() {
			$this->layout = false;
			$xls_fmt = $this->xls_format('Form_6');
			$i = 0;
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்: 6', $xls_fmt['fmt_left_title']);
			$xls_fmt['worksheet']->setMerge($i, 0, $i, 5);
			$xls_fmt['worksheet']->write($i, 6, 'ஆண்டு  _____________________  ', $xls_fmt['fmt_right_title']);
			$xls_fmt['worksheet']->setMerge($i, 6, $i++, 11);
			$xls_fmt['worksheet']->write($i, 0, 'குடிநீர் வரி  (நிலுவை மற்றும் நடப்பு) கேட்பு பதிவேடு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 0, ++$i, 11);
			$xls_fmt['worksheet']->write(++$i, 0, 'வரி விதிப்பு எண்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(0, 0, 12.00);
			$xls_fmt['worksheet']->setMerge($i, 0, ($i + 1), 0);
			$xls_fmt['worksheet']->writeString($i, 1, 'பெயர்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(1, 1, 25.00);
			$xls_fmt['worksheet']->setMerge($i, 1, ($i + 1), 1);
			$xls_fmt['worksheet']->write($i, 2, 'முகவரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(2, 2, 35.00);
			$xls_fmt['worksheet']->setMerge($i, 2, ($i + 1), 2);
			$xls_fmt['worksheet']->write($i, 3, 'கேட்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 3, $i, 5);
			$xls_fmt['worksheet']->write($i, 6, 'வசூல்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 6, $i, 8);
			$xls_fmt['worksheet']->write($i, 9, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 9, $i++, 11);
			$xls_fmt['worksheet']->setColumn(3, 11, 11.00);
			$xls_fmt['worksheet']->write($i, 3, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 4, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 5, 'மொத்தம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 6, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 7, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 8, 'மொத்தம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 9, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 10, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i++, 11, 'மொத்தம்', $xls_fmt['fmt_center']);
			$data = $this->WtDemand->find('all', array(
				'conditions' => array('WtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'WtDemand.demand_number ASC')
			);
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
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['WtDemand']['demand_number']);
				$xls_fmt['worksheet']->write($i, $j++, $row['WtDemand']['name'], $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->write($i, $j++, $row['WtDemand']['address'], $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['WtDemand']['wt_pending']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $row['WtDemand']['wt_current']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)($row['WtDemand']['wt_pending']) + (double)$row['WtDemand']['wt_current']));
				$xls_fmt['worksheet']->writeNumber($i, $j++, $watertax_pending);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $watertax_current);
				$xls_fmt['worksheet']->writeNumber($i, $j++, ($watertax_current + $watertax_pending));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)($row['WtDemand']['wt_pending']) - $watertax_pending));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)($row['WtDemand']['wt_current']) - $watertax_current));
				$xls_fmt['worksheet']->writeNumber($i, $j++, (((double)($row['WtDemand']['wt_pending']) - $watertax_pending) + ((double)($row['WtDemand']['wt_current']) - $watertax_current)));
				$i++;
			}
			$xls_fmt['workbook']->send('Form_6.xls');
			$xls_fmt['workbook']->close();
			$this->redirect(array('action'=>'index'));
		}

		function form7_report() {
			$this->layout = false;
			$xls_fmt = $this->xls_format('Form_7');
			$i = 0;
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்: 7', $xls_fmt['fmt_left_title']);
			$xls_fmt['worksheet']->setMerge($i, 0, $i++, 16);
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி வரிகள் மற்றும் பல்வகை வரவு வசூல் பதிவேடு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 0, ++$i, 16);
			$xls_fmt['worksheet']->write(++$i, 0, 'தேதி மாதம் ஆண்டு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(0,0,12.00);
			$xls_fmt['worksheet']->setMerge($i, 0, ($i + 1), 0);
			$xls_fmt['worksheet']->write($i, 1, 'வரி விதிப்பு எண்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(1,1,10.00);
			$xls_fmt['worksheet']->setMerge($i, 1, ($i + 1), 1);
			$xls_fmt['worksheet']->write($i, 2, 'வரி ரசீது எண்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(2,2,10.00);
			$xls_fmt['worksheet']->setMerge($i, 2, ($i + 1), 2);
			$xls_fmt['worksheet']->setColumn(3,13,12.00);
			$xls_fmt['worksheet']->write($i, 3, 'வீட்டு வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 3, $i, 4);
			$xls_fmt['worksheet']->write($i, 5, 'நூல் நிலைய வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 5, $i, 6);
			$xls_fmt['worksheet']->write($i, 7, 'தண்ணீர் தீர்வை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 7, $i, 8);
			$xls_fmt['worksheet']->write($i, 9, 'தண்ணீர் கட்டணம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 9, $i, 10);
			$xls_fmt['worksheet']->write($i, 11, 'தொழில் வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 11, $i, 12);
			$xls_fmt['worksheet']->write($i, 13, 'பலவகை வரவினம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 13, $i++, 16);
			$xls_fmt['worksheet']->write($i, 3, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 4, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 5, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 6, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 7, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 8, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 9, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 10, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 11, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 12, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 13, 'ரசீது எண்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 14, 'நபரின் பெயர்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(14,14,35.00);
			$xls_fmt['worksheet']->write($i, 15, 'வரவின் வகை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(15,15,12.00);
			$xls_fmt['worksheet']->write($i++, 16, 'செலுத்திய தொகை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(16,16,12.00);
			$records = array();
			$x = 0;
			$result = $this->HousetaxReceipt->find('all', array(
				'conditions' => array('HousetaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'HousetaxReceipt.receipt_date DESC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'ht';
				$records[$x]['receipt_date'] = $row['HousetaxReceipt']['receipt_date'];
				$records[$x]['demand_number'] = $row['HousetaxReceipt']['demand_number'];
				$records[$x]['receipt_number'] = $row['HousetaxReceipt']['receipt_number'];
				$records[$x]['tax_pending'] = $row['HousetaxReceipt']['ht_pending'];
				$records[$x]['tax_current'] = $row['HousetaxReceipt']['ht_current'];
				$records[$x]['lc_pending'] = $row['HousetaxReceipt']['lc_pending'];
				$records[$x]['lc_current'] = $row['HousetaxReceipt']['lc_current'];
				$x++;
			}
			$result = $this->WatertaxReceipt->find('all', array(
				'conditions' => array('WatertaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'WatertaxReceipt.receipt_date DESC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'wt';
				$records[$x]['receipt_date'] = $row['WatertaxReceipt']['receipt_date'];
				$records[$x]['demand_number'] = $row['WatertaxReceipt']['demand_number'];
				$records[$x]['receipt_number'] = $row['WatertaxReceipt']['receipt_number'];
				$records[$x]['tax_pending'] = $row['WatertaxReceipt']['wt_pending'];
				$records[$x]['tax_current'] = $row['WatertaxReceipt']['wt_current'];
				$x++;
			}
			$result = $this->ProfessionaltaxReceipt->find('all', array(
				'conditions' => array('ProfessionaltaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'ProfessionaltaxReceipt.receipt_date DESC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'pt';
				$records[$x]['receipt_date'] = $row['ProfessionaltaxReceipt']['receipt_date'];
				$records[$x]['demand_number'] = $row['ProfessionaltaxReceipt']['demand_number'];
				$records[$x]['receipt_number'] = $row['ProfessionaltaxReceipt']['receipt_number'];
				$records[$x]['tax_pending'] = (double)$row['ProfessionaltaxReceipt']['part1_pending'] + (double)$row['ProfessionaltaxReceipt']['part2_pending'];
				$records[$x]['tax_current'] = (double)$row['ProfessionaltaxReceipt']['part1_current'] + (double)$row['ProfessionaltaxReceipt']['part2_current'];
				$x++;
			}
			$result = $this->OthersReceipt->find('all', array(
				'conditions' => array('OthersReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'contain' => array('Header'),
				'order' => 'OthersReceipt.receipt_date DESC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'ot';
				$records[$x]['receipt_date'] = $row['OthersReceipt']['receipt_date'];
				$records[$x]['receipt_number'] = $row['OthersReceipt']['receipt_number'];
				$records[$x]['name'] = $row['OthersReceipt']['name'];
				$records[$x]['header_name'] = $row['Header']['header_name'];
				$records[$x]['tax_current'] = $row['OthersReceipt']['amount'];
				$x++;
			}
			function arrange_records($a, $b){
				$time1 = strtotime($a['receipt_date']);
				$time2 = strtotime($b['receipt_date']);
				return $time1 > $time2;
			}
			usort($records, 'arrange_records');
			foreach($records as $row){
				$xls_fmt['worksheet']->write($i, 0, $row['receipt_date'], $xls_fmt['fmt_left']);
				if($row['receipt_type'] == 'ht'){
					$xls_fmt['worksheet']->writeNumber($i, 1, $row['demand_number']);
					$xls_fmt['worksheet']->writeNumber($i, 2, $row['receipt_number']);
					$xls_fmt['worksheet']->writeNumber($i, 3, $row['tax_pending']);
					$xls_fmt['worksheet']->writeNumber($i, 4, $row['tax_current']);
					$xls_fmt['worksheet']->writeNumber($i, 5, $row['lc_pending']);
					$xls_fmt['worksheet']->writeNumber($i, 6, $row['lc_current']);
				}elseif($row['receipt_type'] == 'wt'){
					$xls_fmt['worksheet']->writeNumber($i, 1, $row['demand_number']);
					$xls_fmt['worksheet']->writeNumber($i, 2, $row['receipt_number']);
					$xls_fmt['worksheet']->writeNumber($i, 9, $row['tax_pending']);
					$xls_fmt['worksheet']->writeNumber($i, 10, $row['tax_current']);
				}elseif($row['receipt_type'] == 'pt'){
					$xls_fmt['worksheet']->writeNumber($i, 1, $row['demand_number']);
					$xls_fmt['worksheet']->writeNumber($i, 2, $row['receipt_number']);
					$xls_fmt['worksheet']->writeNumber($i, 11, $row['tax_pending']);
					$xls_fmt['worksheet']->writeNumber($i, 12, $row['tax_current']);
				}elseif($row['receipt_type'] == 'ot'){
					$xls_fmt['worksheet']->writeNumber($i, 13, $row['receipt_number']);
					$xls_fmt['worksheet']->write($i, 14, $row['name'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->writeNumber($i, 16, $row['header_name']);
					$xls_fmt['worksheet']->writeNumber($i, 15, $row['tax_current']);
				}
				$i++;
			}
			$xls_fmt['workbook']->send('Form_7.xls');
			$xls_fmt['workbook']->close();
			$this->redirect(array('action'=>'index'));
		}
		function form8_report() {
			$this->layout = false;
			$xls_fmt = $this->xls_format('Form_8');
			$i = 0;
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்: 8', $xls_fmt['fmt_left_title']);
			$xls_fmt['worksheet']->setMerge($i, 0, $i++, 11);
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சிக்கு வரப்பெற்ற அரசு மானியங்கள் மற்றும் ஒதுக்கீடு செயப்பட்ட வரவினங்கள்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 0, ++$i, 11);
			$xls_fmt['worksheet']->write(++$i, 0, 'தேதி மாதம் ஆண்டு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(0,0,12.00);
			$xls_fmt['worksheet']->setMerge($i, 0, ($i + 1), 0);
			$xls_fmt['worksheet']->write($i, 1, 'காசோலை / வங்கி வரைவோலை எண் / நாள்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(1,1,30.00);
			$xls_fmt['worksheet']->setMerge($i, 1, ($i + 1), 1);
			$xls_fmt['worksheet']->write($i, 2, 'அணுமதி ஆணை எண் / நாள் / யாரிடமிருந்து', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(2,2,30.00);
			$xls_fmt['worksheet']->setMerge($i, 2, ($i + 1), 2);
			$xls_fmt['worksheet']->setColumn(3,8,16.00);
			$xls_fmt['worksheet']->setColumn(9,11,22.00);
			$xls_fmt['worksheet']->write($i, 3, 'மாநில நிதிக்குழு மானியம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 3, ($i + 1), 3);
			$xls_fmt['worksheet']->write($i, 4, 'இதர மானியம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 4, ($i + 1), 4);
			$xls_fmt['worksheet']->write($i, 5, 'வரப்பெற்ற தொகை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 5, $i++, 11);
			$xls_fmt['worksheet']->write($i, 5, 'முத்திரை தாள் மிகுவரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 6, 'கேளிக்கை வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 7, 'தலவரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 8, 'உ.சி. மரவரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 9, 'கனிமம் மற்றும் சுரங்க வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 10, 'இதர ஒதுக்கீடு செய்யப்பட்ட வரவினம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i++, 11, 'மொத்தம்', $xls_fmt['fmt_center']);
			$records = array();
			$record = $this->Income->find('all', array(
				'conditions' => array('Income.income_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'contain' => array('Header'),
				'order' => 'Income.income_date ASC'
			));
			$index = 0;
			foreach($record as $row){
				$records[$index]['income_type'] = 'gov';
				$records[$index]['income_header'] = $row['Header']['header_name'];
				$records[$index]['income_date'] = $row['Income']['income_date'];
				$records[$index]['income_amount'] = $row['Income']['income_amount'];
				$records[$index++]['description'] = $row['Income']['description'];
			}
			$record = $this->OthersReceipt->find('all', array(
				'conditions' => array('OthersReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'contain' => array('Header'),
				'order' => 'OthersReceipt.receipt_date ASC'
			));
			foreach($record as $row){
				$records[$index]['income_type'] = 'tax';
				$records[$index]['income_header'] = $row['Header']['header_name'];
				$records[$index]['income_date'] = $row['OthersReceipt']['receipt_date'];
				$records[$index]['income_amount'] = $row['OthersReceipt']['amount'];
				$records[$index++]['description'] = $row['OthersReceipt']['name'].', '.$row['OthersReceipt']['address'];
			}
			function arrange_records($a, $b){
				$time1 = strtotime($a['income_date']);
				$time2 = strtotime($b['income_date']);
				if($a['income_date'] != $b['income_date']){
					return $time1 > $time2;
				}
				return strcmp($a['income_header'], $b['income_header']);
			}
			usort($records, 'arrange_records');
			foreach($records as $record){
				$xls_fmt['worksheet']->write($i, 0, $record['income_date'], $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->write($i, 1, $record['description'], $xls_fmt['fmt_left']);
				if($record['income_type'] == 'gov'){
					switch($record['income_header']){
						case 'மாநில நிதிக்குழு மானியம்':
							$xls_fmt['worksheet']->writeNumber($i, 3, $record['income_amount']);
							break;
						default:
							$xls_fmt['worksheet']->writeNumber($i, 4, $record['income_amount']);
					}
				}else{
					switch($record['income_header']){
						case 'முத்திரை தாள் மிகுவரி':
							$xls_fmt['worksheet']->writeNumber($i, 5,$record['income_amount']);
							break;
						case 'கேளிக்கை வரி':
							$xls_fmt['worksheet']->writeNumber($i, 6,$record['income_amount']);
							break;
						case 'தலவரி':
							$xls_fmt['worksheet']->writeNumber($i, 7,$record['income_amount']);
							break;
						case 'உ.சி. மரவரி':
							$xls_fmt['worksheet']->writeNumber($i, 8,$record['income_amount']);
							break;
						case 'கனிமம் மற்றும் சுரங்க வரி':
							$xls_fmt['worksheet']->writeNumber($i, 9,$record['income_amount']);
							break;
						default:
							$xls_fmt['worksheet']->writeNumber($i, 10, $record['income_amount']);
					}
				}
				$xls_fmt['worksheet']->writeNumber($i++, 11, $record['income_amount']);
			}
			// echo '<pre>';
			// print_r($records); die;
			$xls_fmt['workbook']->send('Form_8.xls');
			$xls_fmt['workbook']->close();
			$this->redirect(array('action'=>'index'));
		}
		function form9_report() {
			$this->layout = false;
			$i = 0;
			$xls_fmt = $this->xls_format('Form_9');
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்: 9', $xls_fmt['fmt_left_title']);
			$xls_fmt['worksheet']->setMerge($i, 0, $i++, 16);
			$xls_fmt['worksheet']->write($i, 0, 'சிட்டா', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 0, ++$i, 16);
			$xls_fmt['worksheet']->write(++$i, 0, 'தேதி மாதம் ஆண்டு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(0,0,12.00);
			$xls_fmt['worksheet']->setMerge($i, 0, ($i + 1), 0);
			$xls_fmt['worksheet']->setColumn(1,11,12.00);
			$xls_fmt['worksheet']->setColumn(13,16,12.00);
			$xls_fmt['worksheet']->write($i, 1, 'வீட்டு வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 1, $i, 2);
			$xls_fmt['worksheet']->write($i, 3, 'நூல் நிலைய வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 3, $i, 4);
			$xls_fmt['worksheet']->write($i, 5, 'தண்ணீர் தீர்வை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 5, $i, 6);
			$xls_fmt['worksheet']->write($i, 7, 'தண்ணீர் கட்டணம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 7, $i, 8);
			$xls_fmt['worksheet']->write($i, 9, 'தொழில் வரி', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 9, $i, 10);
			$xls_fmt['worksheet']->write($i, 11, 'பலவகை வரவினம்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 11, ($i + 1), 11);
			$xls_fmt['worksheet']->write($i, 12, 'அரசு மானியங்கள் மற்றும் ஒதுக்கீடு செயப்பட்ட வரவினங்கள்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 12, $i, 13);
			$xls_fmt['worksheet']->write($i, 14, 'தினசரி மொத்த வசூல் ரூ.', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 14, ($i + 1), 14);
			$xls_fmt['worksheet']->write($i, 15, 'வங்கியில் செலுத்திய தொகை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 15, ($i + 1), 15);
			$xls_fmt['worksheet']->write($i, 16, 'வங்கியில் செலுத்திய நாள்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 16, ($i + 1), 16);
			$xls_fmt['worksheet']->write(++$i, 1, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 2, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 3, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 4, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 5, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 6, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 7, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 8, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 9, 'நிலுவை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 10, 'நடப்பு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->write($i, 12, 'வகை', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(12,12,25.00);
			$xls_fmt['worksheet']->write($i, 13, 'தொகை', $xls_fmt['fmt_center']);
			$i+=2;
			$records = array();
			$x = 0;
			$result = $this->HousetaxReceipt->find('all', array(
				'conditions' => array('HousetaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'HousetaxReceipt.receipt_date ASC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'ht';
				$records[$x]['receipt_date'] = $row['HousetaxReceipt']['receipt_date'];
				$records[$x]['tax_pending'] = (double)$row['HousetaxReceipt']['ht_pending'];
				$records[$x]['tax_current'] = (double)$row['HousetaxReceipt']['ht_current'];
				$records[$x]['lc_pending'] = (double)$row['HousetaxReceipt']['lc_pending'];
				$records[$x]['lc_current'] = (double)$row['HousetaxReceipt']['lc_current'];
				$x++;
			}
			$result = $this->WatertaxReceipt->find('all', array(
				'conditions' => array('WatertaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'WatertaxReceipt.receipt_date ASC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'wt';
				$records[$x]['receipt_date'] = $row['WatertaxReceipt']['receipt_date'];
				$records[$x]['tax_pending'] = (double)$row['WatertaxReceipt']['wt_pending'];
				$records[$x]['tax_current'] = (double)$row['WatertaxReceipt']['wt_current'];
				$x++;
			}
			$result = $this->ProfessionaltaxReceipt->find('all', array(
				'conditions' => array('ProfessionaltaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'ProfessionaltaxReceipt.receipt_date ASC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'pt';
				$records[$x]['receipt_date'] = $row['ProfessionaltaxReceipt']['receipt_date'];
				$records[$x]['tax_pending'] = (double)$row['ProfessionaltaxReceipt']['part1_pending'] + (double)$row['ProfessionaltaxReceipt']['part2_pending'];
				$records[$x]['tax_current'] = (double)$row['ProfessionaltaxReceipt']['part1_current'] + (double)$row['ProfessionaltaxReceipt']['part2_current'];
				$x++;
			}
			$result = $this->OthersReceipt->find('all', array(
				'conditions' => array('OthersReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'contain' => array('Header'),
				'order' => 'OthersReceipt.receipt_date ASC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'ot';
				$records[$x]['receipt_date'] = $row['OthersReceipt']['receipt_date'];
				$records[$x]['tax_current'] = (double)$row['OthersReceipt']['amount'];
				$x++;
			}
			$result = $this->Income->find('all', array(
				'conditions' => array('Income.income_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']), 'Income.account_id' => 1),
				'contain' => array('Header'),
				'order' => 'Income.income_date DESC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'ic';
				$records[$x]['receipt_date'] = $row['Income']['income_date'];
				$records[$x]['income_type'] = $row['Header']['header_name'];
				$records[$x]['tax_current'] = (double)$row['Income']['income_amount'];
				$x++;
			}
			$result = $this->CashToBank->find('all', array(
				'conditions' => array('CashToBank.transfer_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'CashToBank.transfer_date ASC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'bt';
				$records[$x]['receipt_date'] = $row['CashToBank']['transfer_date'];
				$records[$x]['tax_current'] = (double)$row['CashToBank']['transfer_amount'];
				$x++;
			}
			function arrange_records($a, $b){
				$time1 = strtotime($a['receipt_date']);
				$time2 = strtotime($b['receipt_date']);
				if($a['receipt_date'] != $b['receipt_date']){
					return $time1 > $time2;
				}
				return strcmp($a['receipt_type'], $b['receipt_type']);
			}
			usort($records, 'arrange_records');
			for($j = 0; $j < count($records)-1; $j++){
				if($records[$j]['receipt_date'] == $records[$j+1]['receipt_date'] && $records[$j]['receipt_type'] == $records[$j+1]['receipt_type']){
					switch($records[$j]['receipt_type']){
						case 'ht':
							$records[$j+1]['tax_pending'] += $records[$j]['tax_pending'];
							$records[$j+1]['tax_current'] += $records[$j]['tax_current'];
							$records[$j+1]['lc_pending'] += $records[$j]['lc_pending'];
							$records[$j+1]['lc_current'] += $records[$j]['lc_current'];
							break;
						case 'wt':
							$records[$j+1]['tax_pending'] += $records[$j]['tax_pending'];
							$records[$j+1]['tax_current'] += $records[$j]['tax_current'];
							break;
						case 'pt':
							$records[$j+1]['tax_pending'] += $records[$j]['tax_pending'];
							$records[$j+1]['tax_current'] += $records[$j]['tax_current'];
							break;
						case 'ot':
							$records[$j+1]['tax_current'] += $records[$j]['tax_current'];
							break;
						case 'ic':
							if($records[$j]['income_type'] != $records[$j+1]['income_type'])
								$records[$j+1]['income_type'] = $records[$j]['income_type'].", ".$records[$j+1]['income_type'];
							$records[$j+1]['tax_current'] += $records[$j]['tax_current'];
							break;
						case 'bt':
							$records[$j+1]['tax_current'] += $records[$j]['tax_current'];
							break;
					}
					unset($records[$j]);
				}
			}
			$prev_date = '';
			$total_amount = 0;
			foreach($records as $row){
				if($row['receipt_date'] != $prev_date && $prev_date != ''){
					$xls_fmt['worksheet']->writeNumber($i, 14, $total_amount);
					$total_amount = 0;
					$i++;
				}
				$xls_fmt['worksheet']->write($i, 0, $row['receipt_date'], $xls_fmt['fmt_left']);
				switch($row['receipt_type']){
					case 'ht':
						$xls_fmt['worksheet']->writeNumber($i, 1, $row['tax_pending']);
						$xls_fmt['worksheet']->writeNumber($i, 2, $row['tax_current']);
						$xls_fmt['worksheet']->writeNumber($i, 3, $row['lc_pending']);
						$xls_fmt['worksheet']->writeNumber($i, 4, $row['lc_current']);
						$total_amount += (double)$row['tax_pending'] + (double)$row['tax_current'] + (double)$row['lc_pending'] + (double)$row['lc_current'];
						break;
					case 'wt':
						$xls_fmt['worksheet']->writeNumber($i, 7, $row['tax_pending']);
						$xls_fmt['worksheet']->writeNumber($i, 8, $row['tax_current']);
						$total_amount += (double)$row['tax_pending'] + (double)$row['tax_current'];
						break;
					case 'pt':
						$xls_fmt['worksheet']->writeNumber($i, 9, $row['tax_pending']);
						$xls_fmt['worksheet']->writeNumber($i, 10, $row['tax_current']);
						$total_amount += (double)$row['tax_pending'] + (double)$row['tax_current'];
						break;
					case 'ot':
						$xls_fmt['worksheet']->writeNumber($i, 11, $row['tax_current']);
						$total_amount += (double)$row['tax_current'];
						break;
					case 'ic':
						$xls_fmt['worksheet']->write($i, 12, $row['income_type'], $xls_fmt['fmt_left']);
						$xls_fmt['worksheet']->writeNumber($i, 13, $row['tax_current']);
						$total_amount += (double)$row['tax_current'];
						break;
					case 'bt':
						$xls_fmt['worksheet']->write($i, 16, $row['receipt_date'], $xls_fmt['fmt_right']);
						$xls_fmt['worksheet']->writeNumber($i, 15, $row['tax_current']);
						break;
				}
				$prev_date = $row['receipt_date'];
			}
			if($total_amount > 0){
				$xls_fmt['worksheet']->writeNumber($i, 14, $total_amount);
				$total_amount = 0;
			}
			$xls_fmt['workbook']->send('Form_9.xls');
			$xls_fmt['workbook']->close();
			$this->redirect(array('action'=>'index'));
		}

		function form10_report(){
			$records = $this->DotaxReceipt->find('all', array(
				'conditions' => array('DotaxReceipt.receipt_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
				'order' => 'DotaxReceipt.receipt_date ASC'
			));
			$i = 0;
			$j = 0;
			$xls_fmt = $this->xls_format('Form_10');
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சி படிவம் எண்: 10', $xls_fmt['fmt_left_title']);
			$xls_fmt['worksheet']->setMerge($i, 0, $i++, 9);
			$xls_fmt['worksheet']->write($i, 0, 'ஊராட்சியின் பல்வகை கேட்பு, வசூல் மற்றும் நிலுவைப் பதிவேடு', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($i, 0, $i++, 9);
			$xls_fmt['worksheet']->write($i, 0, 'குத்தகை விபரம் :', $xls_fmt['fmt_left_title']);
			$xls_fmt['worksheet']->setMerge($i, 0, $i++, 9);
			$xls_fmt['worksheet']->setColumn(1,1, 35.00);
			$xls_fmt['worksheet']->setColumn(2,2, 28.00);
			$xls_fmt['worksheet']->setColumn(3,7, 14.00);
			$xls_fmt['worksheet']->setColumn(8,8, 20.00);
			$xls_fmt['worksheet']->setColumn(9,9, 14.00);
			$titles = array('வ எண்', 'குத்தகைதாரர் பெயரும், முகவரியும்', 'குத்தகைக் காலம்', 'வைப்புத் தொகை விபரம்', 'மொத்த குத்தகை தொகை', 'தவணைத் தொகை', 'கட்ட வேண்டிய நாள்', 'கட்டிய தொகை', 'ரசீது எண் மற்றும் நாள்', 'நிலுவை');
			foreach($titles as $title){
				$xls_fmt['worksheet']->write($i, $j++, $title, $xls_fmt['fmt_center']);
			}
			$sno = 1;
			foreach($records as $record){
				$i++;
				$j = 0;
				$xls_fmt['worksheet']->writeNumber($i, $j++, $sno++);
				$xls_fmt['worksheet']->write($i, $j++, $record['DotaxReceipt']['name'].', '.$record['DotaxReceipt']['address'], $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->write($i, $j++, $record['DotaxReceipt']['start_date'].' to '.$record['DotaxReceipt']['end_date'], $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->writeNumber($i, $j++, $record['DotaxReceipt']['emd']);
				$row = $this->DoDemand->find('first', array(
					'conditions' => array('DoDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']), 'DoDemand.demand_number' => $record['DotaxReceipt']['demand_number'])
				));
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)$row['DoDemand']['do_pending'] + (double)$row['DoDemand']['do_current']));
				$j += 2;
				$xls_fmt['worksheet']->writeNumber($i, $j++, ((double)$record['DotaxReceipt']['do_pending'] + (double)$record['DotaxReceipt']['do_current'] + (double)$record['DotaxReceipt']['emd']));
				$xls_fmt['worksheet']->write($i, $j++, $record['DotaxReceipt']['receipt_number'].', '.$record['DotaxReceipt']['receipt_date'], $xls_fmt['fmt_right']);
				if(((double)$row['DoDemand']['do_pending'] + (double)$row['DoDemand']['do_current']) - ((double)$record['DotaxReceipt']['do_pending'] + (double)$record['DotaxReceipt']['do_current']) > 0)
					$xls_fmt['worksheet']->writeNumber($i, $j++, (((double)$row['DoDemand']['do_pending'] + (double)$row['DoDemand']['do_current']) - ((double)$record['DotaxReceipt']['do_pending'] + (double)$record['DotaxReceipt']['do_current'])));
			}
			$xls_fmt['workbook']->send('Form_10.xls');
			$xls_fmt['workbook']->close();
			$this->redirect(array('action'=>'index'));
		}
		function form13_report(){
			$headers = $this->Header->find('all', array(
				'conditions' => array('Header.header_type' => 'expense', 'Header.account_id' => 1),
				'order' => 'Header.id ASC'
			));
			$xls_fmt = $this->xls_format('index');
			// $worksheet = $xls_fmt['workbook']->addWorksheet($sheet_name);
			// $worksheet->setInputEncoding('UTF-8');
			$sno = 1;
			$j = 0;
			$xls_fmt['worksheet']->write($j, 0, 'ஊராட்சி படிவம் எண்: 13', $xls_fmt['fmt_left_title']);
			$xls_fmt['worksheet']->setMerge($j, 0, $j++, 3);
			$xls_fmt['worksheet']->write($j, 0, 'செலவுகள்', $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setMerge($j, 0, $j++, 3);
			$titles = array('வரிசை எண்', 'செலவின் தலைப்பு', 'பக்கம் எண்', 'கூட்டுத் தொகை');
			$xls_fmt['worksheet']->writeRow($j++, 0, $titles, $xls_fmt['fmt_center']);
			$xls_fmt['worksheet']->setColumn(0, 0, 12.00);
			$xls_fmt['worksheet']->setColumn(1, 1, 35.00);
			$xls_fmt['worksheet']->setColumn(2, 3, 14.00);
			foreach($headers as $header){
				$records = $this->Expense->find('all', array(
					'conditions' => array('Expense.expense_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']), 'Expense.header_id' => $header['Header']['id'], 'Expense.account_id' => 1),
					'order' => 'Expense.expense_date ASC'
				));
				$worksheet = $xls_fmt['workbook']->addWorksheet($header['Header']['header_name']);
				$worksheet->setInputEncoding('UTF-8');
				$i = 0;
				$slno = 1;
				$cumulative_total = 0;
				$worksheet->write($i, 0, 'ஊராட்சி படிவம் எண்: 13', $xls_fmt['fmt_left_title']);
				$worksheet->setMerge($i, 0, $i++, 6);
				$worksheet->write($i, 0, $header['Header']['header_name'], $xls_fmt['fmt_center']);
				$worksheet->setMerge($i, 0, $i++, 6);
				$titles = array('வரிசை எண்', 'செலவுச் சீட்டு எண்', 'செலவின் விபரம்', 'பட்டியல் தொகை', 'கழிவுத் தொகை', 'ஒப்புதல் அளித்த நிகரத் தொகை', 'கூட்டுத் தொகை');
				$worksheet->writeRow($i++, 0, $titles, $xls_fmt['fmt_center']);
				$worksheet->setColumn(0, 1, 12.00);
				$worksheet->setColumn(2, 2, 35.00);
				$worksheet->setColumn(3, 6, 14.00);
				foreach($records as $record){
					$worksheet->writeNumber($i, 0, $slno++);
					$worksheet->write($i, 1, $record['Expense']['voucher_number'],$xls_fmt['fmt_left']);
					$worksheet->write($i, 2, $header['Header']['header_name'].', '.$record['Expense']['description'], $xls_fmt['fmt_left']);
					$worksheet->writeNumber($i, 3, $record['Expense']['expense_amount']);
					$worksheet->writeNumber($i, 5, $record['Expense']['expense_amount']);
					$cumulative_total += (double)$record['Expense']['expense_amount'];
					$worksheet->writeNumber($i++, 6, $cumulative_total);
				}
				$xls_fmt['worksheet']->writeNumber($j, 0, $sno);
				$xls_fmt['worksheet']->write($j, 1, $header['Header']['header_name'], $xls_fmt['fmt_left']);
				$xls_fmt['worksheet']->writeNumber($j, 2, $sno++);
				$xls_fmt['worksheet']->writeNumber($j++, 3, $cumulative_total);
			}
			$xls_fmt['workbook']->send('Form_13.xls');
			$xls_fmt['workbook']->close();
			$this->redirect(array('action'=>'index'));
		}
	}
?>