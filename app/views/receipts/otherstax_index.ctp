<div class="blocks form">
    <h2><?php __('மற்ற ரசீதுகளின் விபரங்கள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('மற்ற ரசீதுகளின் விபரங்களைச் சேர்', true), array('action'=>'addothersreceipt')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('தேதி', 'receipt_date'),
                $paginator->sort('ரசீது எண்', 'receipt_number'),
                $paginator->sort('பெயர்', 'name'),
                $paginator->sort('முகவரி', 'address'),
                $paginator->sort('தலைப்பு', 'header_id'),
                $paginator->sort('வசூலிக்கப்பட்ட தொகை', 'amount'),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($receipts AS $receipt) {
                $rows[] = array(
                    $receipt['OthersReceipt']['receipt_date'],
                    $receipt['OthersReceipt']['receipt_number'],
                    $receipt['OthersReceipt']['name'],
                    $receipt['OthersReceipt']['address'],
                    $receipt['Header']['header_name'],
                    $receipt['OthersReceipt']['amount'],
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>