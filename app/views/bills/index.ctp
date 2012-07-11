
<div class="blocks form">
    <h2><?php __('Account-'.$acc_id.' Bill Estimations'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Bill Estimation', true), array('action'=>'addbill', $acc_id)); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
      <?php
				if($acc_id > 1){
        	$tableHeaders = $html->tableHeaders(array(
        		$paginator->sort('bill_date'),
            $paginator->sort('contractor_name'),
            $paginator->sort('address'),
            $paginator->sort('estimation_amt'),
            $paginator->sort('workdone_amt'),
            $paginator->sort('cement'),
            $paginator->sort('steel'),
            $paginator->sort('door'),
            $paginator->sort('windows'),
            $paginator->sort('toilet_basin'),
            $paginator->sort('emd'),
            $paginator->sort('it'),
            $paginator->sort('scst'),
            $paginator->sort('ec'),
            $paginator->sort('vat'),
            $paginator->sort('lwf'),
            $paginator->sort('deduction_amt'),
            $paginator->sort('total_amt'),
            __('Actions', true),
          ));
          echo $tableHeaders;
				}else{
					$tableHeaders = $html->tableHeaders(array(
						$paginator->sort('bill_date'),
            $paginator->sort('contractor_name'),
            $paginator->sort('address'),
            $paginator->sort('estimation_amt'),
            $paginator->sort('workdone_amt'),
            $paginator->sort('emd'),
            $paginator->sort('it'),
            $paginator->sort('scst'),
            $paginator->sort('ec'),
            $paginator->sort('vat'),
            $paginator->sort('lwf'),
            $paginator->sort('deduction_amt'),
            $paginator->sort('total_amt'),
            __('Actions', true),
          ));
          echo $tableHeaders;
				}
        $rows = array();
        foreach ($bills AS $bill) {
          $actions = ' ' . $html->link(__('Edit', true), array(
          		'action' => 'edit'
          		, $bill['ContractBillEstimation']['id'])
					);
          $actions .= ' ' . $html->link(__('Delete', true), array(
              'action' => 'delete',
              $bill['ContractBillEstimation']['id'])
             , null, __('Are you sure?', true)
					);
					if($acc_id > 1){
            $rows[] = array(
            		$bill['ContractBillEstimation']['bill_date'],
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
                $bill['ContractBillEstimation']['total_amt'],
                $actions,
            );
					}else{
						$rows[] = array(
								$bill['ContractBillEstimation']['bill_date'],
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
                $bill['ContractBillEstimation']['total_amt'],
                $actions,
            );
					}
        }
        echo $html->tableCells($rows);
        echo $tableHeaders;
    	?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>