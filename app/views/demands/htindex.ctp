
<div class="blocks form">
    <h2><?php __('வீட்டு வரி கேட்பு விபரங்கள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய வீட்டு வரி கேட்பு விபரங்களைச் சேர்', true), array('action'=>'addhtdemand')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('கேட்பு எண்', 'demand_number'),
                $paginator->sort('தேதி', 'demand_date'),
                $paginator->sort('கதவு எண்', 'door_number'),
                $paginator->sort('பெயர்', 'name'),
                $paginator->sort('தந்தை பெயர்', 'father_name'),
                $paginator->sort('முகவரி', 'address'),
                $paginator->sort('குக்கிராமத்தின் குறியீடு', 'hamlet_id'),
                $paginator->sort('வீட்டு வரி நிலுவை', 'ht_pending'),
                $paginator->sort('வீட்டு வரி நடப்பு', 'ht_current'),
                $paginator->sort('நூலக வரி நிலுவை', 'lc_pending'),
                $paginator->sort('நூலக வரி நடப்பு', 'lc_current'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($demands AS $demand) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'htedit',
                	$demand['HtDemand']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'htdelete', $demand['HtDemand']['id']),
                	null, __('கண்டிப்பாக நீக்க விரும்புகிரீர்களா?', true)
								);
                $rows[] = array(
                    $demand['HtDemand']['demand_number'],
                    $demand['HtDemand']['demand_date'],
                    $demand['HtDemand']['door_number'],
                    $demand['HtDemand']['name'],
                    $demand['HtDemand']['father_name'],
                    $demand['HtDemand']['address'],
                    $demand['Hamlet']['hamlet_code'],
                    $demand['HtDemand']['ht_pending'],
                    $demand['HtDemand']['ht_current'],
                    $demand['HtDemand']['lc_pending'],
                    $demand['HtDemand']['lc_current'],
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