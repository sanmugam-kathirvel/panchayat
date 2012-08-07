
<div class="blocks form">
    <h2><?php __('தொழில் வரி கேட்பு விபரங்கள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய தொழில் வரி கேட்பு விபரங்களைச் சேர்', true), array('action'=>'addptdemand')); ?></li>
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
                $paginator->sort('நிறுவனத்தின் பெயர்', 'company_name'),
                $paginator->sort('அரையாண்டு வருமானம்', 'half_yearly_income'),
                $paginator->sort('பாகம் ஒன்றின் கேட்புத் தொகை - நிலுவை', 'part1_pending'),
                $paginator->sort('பாகம் ஒன்றின் கேட்புத் தொகை - நடப்பு', 'part1_current'),
                $paginator->sort('பாகம் இரண்டின் கேட்புத் தொகை - நிலுவை', 'part2_pending'),
                $paginator->sort('பாகம் இரண்டின் கேட்புத் தொகை - நடப்பு', 'part2_current'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($demands AS $demand) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'ptedit',
                	$demand['PtDemand']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'ptdelete', $demand['PtDemand']['id']),
                	null, __('கண்டிப்பாக நீக்க விரும்புகிறீர்களா?', true)
								);
                $rows[] = array(
                    $demand['PtDemand']['demand_number'],
                    $demand['PtDemand']['demand_date'],
                    $demand['PtDemand']['door_number'],
                    $demand['PtDemand']['name'],
                    $demand['PtDemand']['father_name'],
                    $demand['PtDemand']['address'],
                    $demand['Hamlet']['hamlet_code'],
                    $demand['PtDemand']['company_name'],
                    $demand['PtDemand']['half_yearly_income'],
                    $demand['PtDemand']['part1_pending'],
                    $demand['PtDemand']['part1_current'],
                    $demand['PtDemand']['part2_pending'],
                    $demand['PtDemand']['part2_current'],
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