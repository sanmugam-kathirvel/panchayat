
<div class="blocks form">
    <h2><?php __('கணக்கு எண் - '.$acc_id.' வரைவு மதிப்பீடு'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய வரைவு மதிப்பீடு விபரங்களைச் சேர்', true), array('action'=>'addbill', $acc_id)); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
      <?php
				if($acc_id > 1){
        	$tableHeaders = $html->tableHeaders(array(
        		$paginator->sort('தேதி', 'bill_date'),
        		$paginator->sort('காசோலைத் தேதி', 'cheque_date'),
        		$paginator->sort('காசோலை எண்', 'cheque_number'),
        		$paginator->sort('செலவுச் சீட்டு எண்', 'voucher_number'),
            $paginator->sort('ஒப்பந்தக்காரரின் பெயர்', 'contractor_name'),
            $paginator->sort('முகவரி', 'address'),
            $paginator->sort('மதிப்பிட்ட தொகை', 'estimation_amt'),
            $paginator->sort('செலவிடப்பட்ட தொகை', 'workdone_amt'),
            $paginator->sort('சிமெண்ட்', 'cement'),
            $paginator->sort('இரும்பு', 'steel'),
            $paginator->sort('கதவு', 'door'),
            $paginator->sort('ஜன்னல்', 'windows'),
            $paginator->sort('கழிவறை தொட்டி', 'toilet_basin'),
            $paginator->sort('வைப்புத் தொகை', 'emd'),
            $paginator->sort('வருமாண வரி', 'it'),
            $paginator->sort('scst'),
            $paginator->sort('ec'),
            $paginator->sort('vat'),
            $paginator->sort('lwf'),
            $paginator->sort('கழிவுத் தொகை', 'deduction_amt'),
            $paginator->sort('காசோலைத் தொகை', 'cheque_amt'),
            			__('செயல்கள்', true),
          ));
          echo $tableHeaders;
				}else{
					$tableHeaders = $html->tableHeaders(array(
						$paginator->sort('தேதி', 'bill_date'),
        		$paginator->sort('காசோலைத் தேதி', 'cheque_date'),
        		$paginator->sort('காசோலை எண்', 'cheque_number'),
        		$paginator->sort('செலவுச் சீட்டு எண்', 'voucher_number'),
            $paginator->sort('ஒப்பந்தக்காரரின் பெயர்', 'contractor_name'),
            $paginator->sort('முகவரி', 'address'),
            $paginator->sort('மதிப்பிட்ட தொகை', 'estimation_amt'),
            $paginator->sort('செலவிடப்பட்ட தொகை', 'workdone_amt'),
            $paginator->sort('வைப்புத் தொகை', 'emd'),
            $paginator->sort('வருமாண வரி', 'it'),
            $paginator->sort('scst'),
            $paginator->sort('ec'),
            $paginator->sort('vat'),
            $paginator->sort('lwf'),
            $paginator->sort('கழிவுத் தொகை', 'deduction_amt'),
            $paginator->sort('காசோலைத் தொகை', 'cheque_amt'),
            			__('செயல்கள்', true),
          ));
          echo $tableHeaders;
				}
        $rows = array();
        foreach ($bills AS $bill) {
          $actions = ' ' . $html->link(__('திருத்து', true), array(
          		'action' => 'edit'
          		, $bill['ContractBillEstimation']['id'])
					);
          $actions .= ' ' . $html->link(__('நீக்கு', true), array(
              'action' => 'delete',
              $bill['ContractBillEstimation']['id'], $bill['ContractBillEstimation']['account_id'], $bill['ContractBillEstimation']['cheque_amt'])
             , null, __('கண்டிப்பாக நீக்க விரும்புகிறீர்களா?', true)
					);
					if($acc_id > 1){
            $rows[] = array(
            		$bill['ContractBillEstimation']['bill_date'],
            		$bill['ContractBillEstimation']['cheque_date'],
            		$bill['ContractBillEstimation']['cheque_number'],
            		$bill['ContractBillEstimation']['voucher_number'],
            		$bill['ContractBillEstimation']['contractor_name'],
            		$bill['ContractBillEstimation']['address'],
                $bill['ContractBillEstimation']['estimation_amt'],
                $bill['ContractBillEstimation']['workdone_amt'],
                $bill['ContractBillEstimation']['cement'],
                $bill['ContractBillEstimation']['steel'],
                $bill['ContractBillEstimation']['door'],
                $bill['ContractBillEstimation']['windows'],
                $bill['ContractBillEstimation']['toilet_basin'],
                $bill['ContractBillEstimation']['emd'],
                $bill['ContractBillEstimation']['it'],
                $bill['ContractBillEstimation']['scst'],
                $bill['ContractBillEstimation']['ec'],
                $bill['ContractBillEstimation']['vat'],
                $bill['ContractBillEstimation']['lwf'],
                $bill['ContractBillEstimation']['deduction_amt'],
                $bill['ContractBillEstimation']['cheque_amt'],
                $actions,
            );
					}else{
						$rows[] = array(
								$bill['ContractBillEstimation']['bill_date'],
								$bill['ContractBillEstimation']['cheque_date'],
            		$bill['ContractBillEstimation']['cheque_number'],
            		$bill['ContractBillEstimation']['voucher_number'],
            		$bill['ContractBillEstimation']['contractor_name'],
            		$bill['ContractBillEstimation']['address'],
                $bill['ContractBillEstimation']['estimation_amt'],
                $bill['ContractBillEstimation']['workdone_amt'],
                $bill['ContractBillEstimation']['emd'],
                $bill['ContractBillEstimation']['it'],
                $bill['ContractBillEstimation']['scst'],
                $bill['ContractBillEstimation']['ec'],
                $bill['ContractBillEstimation']['vat'],
                $bill['ContractBillEstimation']['lwf'],
                $bill['ContractBillEstimation']['deduction_amt'],
                $bill['ContractBillEstimation']['cheque_amt'],
                $actions,
            );
					}
        }
        echo $html->tableCells($rows);
        //echo $tableHeaders;
    	?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>