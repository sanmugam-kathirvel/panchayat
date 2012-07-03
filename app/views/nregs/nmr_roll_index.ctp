
<div class="blocks form">
    <h2><?php __('Registrations'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add New Rolls', true), array('action'=>'nmrrolls')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('role_date'),
                $paginator->sort('starting_roll_no'),
                $paginator->sort('ending_roll_no'),
                $paginator->sort('currently_available_roll_no'),
                $paginator->sort('roll_entry_status'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($nregs_rolls AS $nregs_roll) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'editregistration',
                	$nregs_roll['NmrRoll']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'deleteregistration', $nregs_roll['NmrRoll']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                    $nregs_roll['NmrRoll']['role_date'],
                    $nregs_roll['NmrRoll']['starting_roll_no'],
                    $nregs_roll['NmrRoll']['ending_roll_no'],
                    $nregs_roll['NmrRoll']['currently_available_roll_no'],
                    $nregs_roll['NmrRoll']['roll_entry_status'],
                    $actions,
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>