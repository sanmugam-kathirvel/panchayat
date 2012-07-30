
<div class="blocks form">
    <h2><?php __('டி & ஓ வியாபாரிகளின் கேட்பு விபரங்கள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('டி & ஓ வியாபாரிகளின் கேட்பு விபரங்களைச் சேர்', true), array('action'=>'adddodemand')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('கேட்பு எண்', 'demand_number'),
                $paginator->sort('தேதி', 'demand_date'),
                $paginator->sort('பெயர்', 'name'),
                $paginator->sort('தந்தையின் பெயர்', 'father_name'),
                $paginator->sort('முகவரி', 'address'),
                $paginator->sort('வைப்புத் தொகை', 'emd'),
                $paginator->sort('கேட்புத் தொகை - நிலுவை', 'do_pending'),
                $paginator->sort('கேட்புத் தொகை - நடப்பு', 'do_current'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($demands AS $demand) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'doedit',
                	$demand['DoDemand']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'dodelete', $demand['DoDemand']['id']),
                	null, __('கண்டிப்பாக நீக்க விரும்புகிரீர்களா?', true)
								);
                $rows[] = array(
                    $demand['DoDemand']['demand_number'],
                    $demand['DoDemand']['demand_date'],
                    $demand['DoDemand']['name'],
                    $demand['DoDemand']['father_name'],
                    $demand['DoDemand']['address'],
                    $demand['DoDemand']['emd'],
                    $demand['DoDemand']['do_pending'],
                    $demand['DoDemand']['do_current'],
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