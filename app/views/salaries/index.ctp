<div class="blocks form">
    <h2><?php __('ஊதியம் வழங்கிய விபரம்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('ஊதியம் வழங்கிய விபரங்களைச் சேர்', true), array('action'=>'salary')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('தேதி', 'purchase_date'),
                $paginator->sort('காசோலைக்குரியவரின் பெயர்', 'drawee_name'),
                $paginator->sort('செலவுச் சீட்டு எண்', 'voucher_number'),
                $paginator->sort('காசோலை எண்', 'cheque_number'),
                $paginator->sort('காசோலை வழங்கிய தேதி', 'cheque_date'),
                $paginator->sort('காசோலையில் குறிப்பிடப்பட்ட தொகை', 'cheque_amount'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($receipts AS $receipt) {
            		$actions = ' ' . $html->link(__('நோக்கு', true), array(
                	'action' => 'view', $receipt['Salary']['id']
								));
                $rows[] = array(
                    $receipt['Salary']['salary_date'],
                    $receipt['Salary']['drawee_name'],
                    $receipt['Salary']['voucher_number'],
                    $receipt['Salary']['cheque_number'],
                    $receipt['Salary']['cheque_date'],
                    $receipt['Salary']['cheque_amount'],
                    $actions
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>