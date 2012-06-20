
<div class="blocks form">
    <h2><?php __('Job Cards'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add New Job Cards', true), array('action'=>'addjobcard')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('jobcard_date'),
                $paginator->sort('jobcard_quantity'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($nregs_jobcard AS $nregs) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'editjobcard',
                	$nregs['Jobcard']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'deletejobcard', $nregs['Jobcard']['id'], $nregs['Jobcard']['jobcard_quantity']), 
                	null, __('Are you sure?', true)
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
<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>