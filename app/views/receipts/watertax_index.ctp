<div class="blocks form">
    <h2><?php __('குடிநீர் வரி ரசீது விபரங்கள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய குடிநீர் வரி ரசீது விபரங்களைச் சேர்', true), array('action'=>'addwatertaxreceipt')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('தேதி', 'receipt_date'),
                $paginator->sort('ரசீது எண்', 'receipt_number'),
                $paginator->sort('கேட்பு எண்', 'demand_number'),
                $paginator->sort('கதவு எண்', 'door_number'),
                $paginator->sort('பெயர்', 'name'),
                $paginator->sort('தந்தையின் பெயர்', 'father_name'),
                $paginator->sort('முகவரி', 'address'),
                $paginator->sort('குக்கிராமத்தின் குறியீடு', 'hamlet_id'),
                $paginator->sort('குடிநீர் வரி (நிலுவை)', 'wt_pending'),
                $paginator->sort('குடிநீர் வரி (நடப்பு)', 'wt_current'),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($receipts AS $receipt) {
                $rows[] = array(
                    $receipt['WatertaxReceipt']['receipt_date'],
                    $receipt['WatertaxReceipt']['receipt_number'],
                    $receipt['WatertaxReceipt']['demand_number'],
                    $receipt['WatertaxReceipt']['door_number'],
                    $receipt['WatertaxReceipt']['name'],
                    $receipt['WatertaxReceipt']['father_name'],
                    $receipt['WatertaxReceipt']['address'],
                    $receipt['Hamlet']['hamlet_code'],
                    $receipt['WatertaxReceipt']['wt_pending'],
                    $receipt['WatertaxReceipt']['wt_current'],
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>