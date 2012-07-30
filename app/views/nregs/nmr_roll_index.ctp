
<div class="blocks form">
    <h2><?php echo 'NMR பட்டியல் விபரங்கள்'; ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய NMR பட்டியல் விபரங்களைச் சேர்', true), array('action'=>'nmrrolls')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('தேதி', 'role_date'),
                $paginator->sort('ஆரம்ப NMR பட்டியல் எண்', 'starting_roll_no'),
                $paginator->sort('இருதி NMR பட்டியல் எண்', 'ending_roll_no'),
                // $paginator->sort('currently_available_roll_no'),
                // $paginator->sort('roll_entry_status'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($nregs_rolls AS $nregs_roll) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'edit_nmrrolls',
                	$nregs_roll['NmrRoll']['id']));
                $rows[] = array(
                    $nregs_roll['NmrRoll']['role_date'],
                    $nregs_roll['NmrRoll']['starting_roll_no'],
                    $nregs_roll['NmrRoll']['ending_roll_no'],
                    // $nregs_roll['NmrRoll']['currently_available_roll_no'],
                    // $nregs_roll['NmrRoll']['roll_entry_status'],
                    $actions,
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இருதிப் பதிவேடு எண் %end%', true))); ?></div>