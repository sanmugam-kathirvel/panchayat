
<div class="blocks form">
    <h2><?php __('ஊழியர்களின் விபரம்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய ஊழியரின் தகவலைச் சேர்', true), array('action' => 'add_employee')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('பெயர்', 'name'),
								$paginator->sort('பதவி', 'designation'),
								$paginator->sort('நிறுவனத்தின் பெயர்', 'address'),
                $paginator->sort('கைபேசி எண்', 'phone_number'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($employees AS $employee) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'edit_employee',
                	$employee['Employee']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'delete_employee', $employee['Employee']['id']),
                	null, __('கண்டிப்பாக நீக்க விரும்புகிறீர்களா?', true)
								);
                $rows[] = array(
                    $employee['Employee']['name'],
                    $employee['Employee']['designation'],
                    $employee['Employee']['address'],
                    $employee['Employee']['phone_number'],
                    $actions,
                );
            }
    
            echo $html->tableCells($rows);
            echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>