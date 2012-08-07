<div class="blocks form">
    <h2><?php __('தொழில் வரி ரசீது விபரங்கள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய தொழில் வரி ரசீது விபரங்களைச் சேர்', true), array('action'=>'addprofessionaltaxreceipt')); ?></li>
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
                $paginator->sort('நிறுவனத்தின் பெயர்', 'company_name'),
                $paginator->sort('அரையாண்டு வருமானம்', 'half_yearly_income'),
                $paginator->sort('பாகம் I வரித் தொகை (நிலுவை)', 'part1_pending'),
                $paginator->sort('பாகம் I வரித் தொகை (நடப்பு)', 'part1_current'),
                $paginator->sort('பாகம் II வரித் தொகை (நிலுவை)', 'part2_pending'),
                $paginator->sort('பாகம் II வரித் தொகை (நடப்பு)', 'part2_current'),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($receipts AS $receipt) {
                $rows[] = array(
                    $receipt['ProfessionaltaxReceipt']['receipt_date'],
                    $receipt['ProfessionaltaxReceipt']['receipt_number'],
                    $receipt['ProfessionaltaxReceipt']['demand_number'],
                    $receipt['ProfessionaltaxReceipt']['door_number'],
                    $receipt['ProfessionaltaxReceipt']['name'],
                    $receipt['ProfessionaltaxReceipt']['father_name'],
                    $receipt['ProfessionaltaxReceipt']['address'],
                    $receipt['Hamlet']['hamlet_code'],
                    $receipt['ProfessionaltaxReceipt']['company_name'],
                    $receipt['ProfessionaltaxReceipt']['half_yearly_income'],
                    $receipt['ProfessionaltaxReceipt']['part1_pending'],
                    $receipt['ProfessionaltaxReceipt']['part1_current'],
                    $receipt['ProfessionaltaxReceipt']['part2_pending'],
                    $receipt['ProfessionaltaxReceipt']['part2_current'],
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>