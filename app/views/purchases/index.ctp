<div class="blocks form">
    <h2><?php __('கொள்முதல் விபரம்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய கொள்முதல் விபரங்களைச் சேர்', true), array('action'=>'purchase')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('வாங்கிய தேதி', 'purchase_date'),
                $paginator->sort('நிறுவனத்தின் பெயர்', 'company_name'),
                $paginator->sort('செலவுச் சீட்டு எண்', 'voucher_number'),
                $paginator->sort('காசோலை எண்', 'cheque_number'),
                $paginator->sort('காசோலை வழங்கிய தேதி', 'cheque_date'),
                $paginator->sort('வரித் தொகை', 'tax_amount'),
                $paginator->sort('மொத்தத் தொகை', 'total_amt'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($receipts AS $receipt) {
            		$actions = ' ' . $html->link(__('நோக்கு', true), array(
                	'action' => 'view', $receipt['Purchase']['id']
								));
                $rows[] = array(
                    $receipt['Purchase']['purchase_date'],
                    $receipt['Purchase']['company_name'],
                    $receipt['Purchase']['voucher_number'],
                    $receipt['Purchase']['cheque_number'],
                    $receipt['Purchase']['cheque_date'],
                    $receipt['Purchase']['tax_amount'],
                    $receipt['Purchase']['total_amt'],
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