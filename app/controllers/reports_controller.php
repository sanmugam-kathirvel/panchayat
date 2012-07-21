<?php
	App::import('Vendor', 'Writer', array('file' => 'Spreadsheet'.DS.'Writer.php'));
	class ReportsController extends AppController {

		var $uses = array('CashBook', 'Income', 'HousetaxReceipt', 'WatertaxReceipt', 'ProfessionaltaxReceipt', 'DotaxReceipt', 'OthersReceipt', 'Expense', 'Purchase', 'Salary', 'ContractBillEstimation', 'HtDemand', 'HousetaxReceipt', 'PtDemand', 'ProfessionaltaxReceipt', 'WtDemand', 'WatertaxReceipt');
		function index(){
			echo "Index";
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
		function form11_reoprt($start_date, $end_date){
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
					$xls_fmt['worksheet']->write($i, $j++, $record['Header']['header_name'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i, $j++, $record['Income']['income_amount']);
					$xls_fmt['worksheet']->write($i, $j++, $record['Income']['description'], $xls_fmt['fmt_left']);
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
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Header']['header_name'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['expense_amount']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['cheque_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['description'], $xls_fmt['fmt_left']);
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
					$xls_fmt['worksheet']->write($i_copy, $j++, "......".$record['Purchase']['company_name'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Purchase']['total_amt']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Purchase']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Purchase']['cheque_date'], $xls_fmt['fmt_left']);
					$expense_bank += (double)$record['Purchase']['total_amt'];
					$i_copy++;
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
				$xls_fmt['workbook']->send('Form_11.xls');
				$xls_fmt['workbook']->close();
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function form23_reoprt($start_date, $end_date){
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
					$xls_fmt['worksheet']->write($i, $j++, $record['Header']['header_name'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i, $j++, $record['Income']['income_amount']);
					$xls_fmt['worksheet']->write($i, $j++, $record['Income']['description'], $xls_fmt['fmt_left']);
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
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Header']['header_name'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['expense_amount']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['cheque_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['description'], $xls_fmt['fmt_left']);
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
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function form26_reoprt($start_date, $end_date){
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
					$xls_fmt['worksheet']->write($i, $j++, $record['Header']['header_name'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i, $j++, $record['Income']['income_amount']);
					$xls_fmt['worksheet']->write($i, $j++, $record['Income']['description'], $xls_fmt['fmt_left']);
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
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Header']['header_name'], $xls_fmt['fmt_left']);
					$j++;
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['expense_amount']);
					$xls_fmt['worksheet']->writeNumber($i_copy, $j++, $record['Expense']['cheque_number']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['cheque_date'], $xls_fmt['fmt_left']);
					$xls_fmt['worksheet']->write($i_copy, $j++, $record['Expense']['description'], $xls_fmt['fmt_left']);
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
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
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
			$xls_fmt['worksheet']->write($i, 11, 'மொத்தம்', $xls_fmt['fmt_center']);
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
				'order' => 'HousetaxReceipt.receipt_date DESC'
			));
			foreach($result as $row){
				$records[$x]['receipt_type'] = 'ht';
				$records[$x]['receipt_date'] = $row['HousetaxReceipt']['receipt_date'];
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
				$records[$x]['tax_current'] = $row['OthersReceipt']['amount'];
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
				$records[$x]['tax_current'] = $row['Income']['income_amount'];
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
							$records[$j]['tax_pending'] += $records[$j+1]['tax_pending'];
							$records[$j]['tax_current'] += $records[$j+1]['tax_current'];
							$records[$j]['lc_pending'] += $records[$j+1]['lc_pending'];
							$records[$j]['lc_current'] += $records[$j+1]['lc_current'];
							break;
						case 'wt':
							$records[$j]['tax_pending'] += $records[$j+1]['tax_pending'];
							$records[$j]['tax_current'] += $records[$j+1]['tax_current'];
							break;
						case 'pt':
							$records[$j]['tax_pending'] += $records[$j+1]['tax_pending'];
							$records[$j]['tax_current'] += $records[$j+1]['tax_current'];
							break;
						case 'ot':
							$records[$j]['tax_current'] += $records[$j+1]['tax_current'];
							break;
						case 'ic':
							if($records[$j]['income_type'] != $records[$j+1]['income_type'])
								$records[$j]['income_type'] = $records[$j]['income_type'].", ".$records[$j+1]['income_type'];
							$records[$j]['tax_current'] += $records[$j+1]['tax_current'];
							break;
					}
					unset($records[$j+1]);
					$j++;
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
				}
				$prev_date = $row['receipt_date'];
			}
			//echo "<pre>";
			//print_r($records); die;
			$xls_fmt['workbook']->send('Form_9.xls');
			$xls_fmt['workbook']->close();
			$this->redirect(array('action'=>'index'));
		}
	}
?>