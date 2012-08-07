
<div class="blocks form">
    <h2><?php echo 'கணக்கு எண் - '.$acc_id.' செலவுகள்'; ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய செலவு விபரங்களைச் சேர்', true), array('action'=>'addexpense', $acc_id)); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('செலவின் தலைப்பு', 'header_id'),
                $paginator->sort('தேதி', 'expense_date'),
                $paginator->sort('செலவுச் சீட்டு எண்', 'voucher_number'),
                $paginator->sort('செலவிடப்பட்ட தொகை', 'expense_amount'),
                $paginator->sort('காசோலைக்குரியவரின் பெயர்', 'drawee_name'),
                $paginator->sort('காசோலை எண்', 'cheque_number'),
                $paginator->sort('காசோலை வழங்கிய தேதி', 'cheque_date'),
                $paginator->sort('விபரம்', 'description'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($expenses AS $expense) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'edit',
                	$expense['Expense']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'delete',
                  $expense['Expense']['id'],$expense['Expense']['account_id'],  $expense['Expense']['expense_amount']
                ), null, __('கண்டிப்பாக நீக்க விரும்புகிறீர்களா?', true));
    
                $rows[] = array(
                    $expense['Header']['header_name'],
                    $expense['Expense']['expense_date'],
                    $expense['Expense']['voucher_number'],
                    $expense['Expense']['expense_amount'],
                    $expense['Expense']['drawee_name'],
                    $expense['Expense']['cheque_number'],
                    $expense['Expense']['cheque_date'],
                    $expense['Expense']['description'],
                    $actions,
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>