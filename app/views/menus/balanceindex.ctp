
<div class="blocks form">
    <h2><?php __('தொடக்க இருப்புத் தொகை'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய தொடக்க இருப்புத் தொகையை சேர்', true), array('action'=>'addopeningbals')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('கணக்கின் பெயர்', 'account_id'),
                $paginator->sort('கணக்கு எண்', 'account_number'),
                $paginator->sort('வங்கியின் பெயர்', 'bank_name'),
                $paginator->sort('கிளை', 'branch'),
                $paginator->sort('தொடக்க ரொக்க இருப்பு', 'opening_cash_balance'),
                $paginator->sort('தொடக்க வங்கி இருப்பு', 'opening_bank_balance'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($balances AS $balance) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'editbalance',
                	$balance['BankDetail']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'deletebalance', $balance['BankDetail']['id']),
                	null, __('கண்டிப்பாக நீக்க விரும்புகிரீர்களா?', true)
								);
                $rows[] = array(
                    $balance['Account']['account_name'],
                    $balance['BankDetail']['account_number'],
                    $balance['BankDetail']['bank_name'],
                    $balance['BankDetail']['branch'],
                    $balance['BankDetail']['opening_cash_balance'],
                    $balance['BankDetail']['opening_bank_balance'],
                    $actions,
                );
            }
    
            echo $html->tableCells($rows);
            echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இருதிப் பதிவேடு எண் %end%', true))); ?></div>