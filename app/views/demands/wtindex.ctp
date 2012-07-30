
<div class="blocks form">
    <h2><?php __('குடிநீர் வரி கேட்பு விபரங்கள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('குடிநீர் வரி கேட்பு  விபரங்களைச் சேர்', true), array('action'=>'addwtdemand')); ?></li>
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
                $paginator->sort('குடிநீர் வரி கேட்பு - நிலுவை', 'wt_pending'),
                $paginator->sort('குடிநீர் வரி கேட்பு - நடப்பு', 'wt_current'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($demands AS $demand) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'wtedit',
                	$demand['WtDemand']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'wtdelete', $demand['WtDemand']['id']),
                	null, __('கண்டிப்பாக நீக்க விரும்புகிரீர்களா?', true)
								);
                $rows[] = array(
                    $demand['WtDemand']['demand_number'],
                    $demand['WtDemand']['demand_date'],
                    $demand['WtDemand']['door_number'],
                    $demand['WtDemand']['name'],
                    $demand['WtDemand']['father_name'],
                    $demand['WtDemand']['address'],
                    $demand['Hamlet']['hamlet_code'],
                    $demand['WtDemand']['wt_pending'],
                    $demand['WtDemand']['wt_current'],
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