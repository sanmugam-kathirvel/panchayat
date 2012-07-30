
<div class="blocks form">
    <h2><?php echo 'வேலை அடையாள அட்டைகள்'; ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய வேலை அடையாள அட்டைகளின் விபரங்களைச் சேர்', true), array('action'=>'addjobcard')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('தேதி', 'jobcard_date'),
                $paginator->sort('வேலை அடையாள அட்டைகளின் எண்ணிக்கை', 'jobcard_quantity'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($nregs_jobcard AS $nregs) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'editjobcard',
                	$nregs['Jobcard']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'deletejobcard', $nregs['Jobcard']['id'], $nregs['Jobcard']['jobcard_quantity']), 
                	null, __('கண்டிப்பாக நீக்க விரும்புகிரீர்களா?', true)
								);
                $rows[] = array(
                  $nregs['Jobcard']['jobcard_date'],
                  $nregs['Jobcard']['jobcard_quantity'],
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