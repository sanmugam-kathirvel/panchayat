<div class="blocks form">
    <h2><?php __('வீட்டு வரி ரசீது விபரங்கள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய வீட்டு வரி ரசீது விபரங்களைச் சேர்', true), array('action'=>'addhousetaxreceipt')); ?></li>
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
                $paginator->sort('சர்வே எண்', 'survey_number'),
                $paginator->sort('மதிப்பீடு (சதுர அடி)', 'square_feet_estimation'),
                $paginator->sort('வீட்டு வரி (நிலுவை)', 'ht_pending'),
                $paginator->sort('வீட்டு வரி (நடப்பு)', 'ht_current'),
                $paginator->sort('நூலக வரி (நிலுவை)', 'lc_pending'),
                $paginator->sort('நூலக வரி (நடப்பு)', 'lc_current'),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($receipts AS $receipt) {
                $rows[] = array(
                    $receipt['HousetaxReceipt']['receipt_date'],
                    $receipt['HousetaxReceipt']['receipt_number'],
                    $receipt['HousetaxReceipt']['demand_number'],
                    $receipt['HousetaxReceipt']['door_number'],
                    $receipt['HousetaxReceipt']['name'],
                    $receipt['HousetaxReceipt']['father_name'],
                    $receipt['HousetaxReceipt']['address'],
                    $receipt['Hamlet']['hamlet_code'],
                    $receipt['HousetaxReceipt']['survey_number'],
                    $receipt['HousetaxReceipt']['square_feet_estimation'],
                    $receipt['HousetaxReceipt']['ht_pending'],
                    $receipt['HousetaxReceipt']['ht_current'],
                    $receipt['HousetaxReceipt']['lc_pending'],
                    $receipt['HousetaxReceipt']['lc_current'],
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>