
<div class="blocks form">
    <h2><?php __('தலைப்புகள்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய தலைப்பினை சேர்', true), array('action'=>'addheader')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('கணக்கின் பெயர்', 'account_id'),
                $paginator->sort('தலைப்பின் பெயர்', 'header_name'),
                $paginator->sort('தலைப்பின் வகை', 'header_type'),
                $paginator->sort('ரசீது', 'receipt'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($headers AS $header) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'editheader',
                	$header['Header']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'deleteheader', $header['Header']['id']),
                	null, __('கண்டிப்பாக நீக்க விரும்புகிறீர்களா?', true)
								);
                $rows[] = array(
                    $header['Account']['account_name'],
                    $header['Header']['header_name'],
                    ($header['Header']['header_type'] == 'income') ? 'வரவு' : 'செலவு',
                    ($header['Header']['receipt'] == 'no') ? 'இல்லை' : 'ஆம்',
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