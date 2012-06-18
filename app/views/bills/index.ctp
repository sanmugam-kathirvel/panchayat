
<div class="blocks form">
    <h2><?php __('Bill Estimation'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Bill Estimation', true), array('action'=>'addbill')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
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
    
            $rows = array();
            foreach ($bills AS $bill) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                		'action' => 'edit'
                		, $bill['ContractBillEstimation']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                    'action' => 'delete',
                    $bill['ContractBillEstimation']['id'])
                   , null, __('Are you sure?', true)
								);
    
                $rows[] = array(
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
    
            echo $html->tableCells($rows);
            echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>