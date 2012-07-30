
<div class="blocks form">
    <h2><?php __('ரொக்கத் தொகையை வங்கி கணக்கிற்கு மாற்றிய விபரம்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('ரொக்கத் தொகையை வங்கி கணக்கிற்கு மாற்று', true), array('action'=>'cashtobank')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('தேதி', 'transfer_date'),
								$paginator->sort('வங்கிக் கணக்கிற்கு மாற்றிய தொகை', 'transfer_amount'),
								$paginator->sort('வங்கியின் பெயர்', 'bank_name'),
								$paginator->sort('கிளை', 'branch')
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($banks AS $bank) {
                $rows[] = array(
										$bank['CashToBank']['transfer_date'],
                    $bank['CashToBank']['transfer_amount'],
                    $bank['BankDetail']['bank_name'],
                    $bank['BankDetail']['branch']
                );
            }
    
            echo $html->tableCells($rows);
            echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இருதிப் பதிவேடு எண் %end%', true))); ?></div>