
<div class="blocks form">
    <h2><?php echo 'கணக்கு எண் '.$acc_id.', வரவுகள்'; ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய வரவு விபரங்களைச் சேர்', true), array('action'=>'addincome', $acc_id)); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('வரவின் தலைப்பு', 'header_id'),
                $paginator->sort('தேதி', 'income_date'),
                $paginator->sort('வரப்பெற்ற தொகை', 'income_amount'),
                $paginator->sort('விபரம்', 'description'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($incomes AS $income) {
                $actions = ' ' . $html->link(__('திருத்து', true), array('action' => 'edit', $income['Income']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                    'action' => 'delete',
                    $income['Income']['id'], $income['Income']['account_id'],  $income['Income']['income_amount']
                ), null, __('கண்டிப்பாக நீக்க விரும்புகிறீர்களா?', true));
    
                $rows[] = array(
                    $income['Header']['header_name'],
                    $income['Income']['income_date'],
                    $income['Income']['income_amount'],
                    $income['Income']['description'],
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