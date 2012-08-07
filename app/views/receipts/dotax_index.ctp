<div class="blocks form">
    <h2><?php __('டி & ஓ வியாபாரிகள் வரி ரசீது விபரங்கள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய டி & ஓ வியாபாரிகள் வரி ரசீது விபரங்களைச் சேர்', true), array('action'=>'adddotaxreceipt')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('தேதி', 'receipt_date'),
                $paginator->sort('ரசீது எண்', 'receipt_number'),
                $paginator->sort('கேட்பு எண்', 'demand_number'),
                $paginator->sort('பெயர்', 'name'),
                $paginator->sort('தந்தையின் பெயர்', 'father_name'),
                $paginator->sort('முகவரி', 'address'),
                $paginator->sort('வைப்புத் தொகை', 'emd'),
                $paginator->sort('ஆரம்ப தேதி', 'start_date'),
                $paginator->sort('இருதி தேதி', 'end_date'),
                $paginator->sort('நிலுவை', 'do_pending'),
                $paginator->sort('நடப்பு', 'do_current'),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($receipts AS $receipt) {
                $rows[] = array(
                    $receipt['DotaxReceipt']['receipt_date'],
                    $receipt['DotaxReceipt']['receipt_number'],
                    $receipt['DotaxReceipt']['demand_number'],
                    $receipt['DotaxReceipt']['name'],
                    $receipt['DotaxReceipt']['father_name'],
                    $receipt['DotaxReceipt']['address'],
                    $receipt['DotaxReceipt']['emd'],
                    $receipt['DotaxReceipt']['start_date'],
                    $receipt['DotaxReceipt']['end_date'],
                    $receipt['DotaxReceipt']['do_pending'],
                    $receipt['DotaxReceipt']['do_current'],
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>