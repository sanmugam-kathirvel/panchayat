
<div class="blocks form">
    <h2><?php __('Job Cards'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add New Work Detail', true), array('action'=>'add_workdetails')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('year'),
                $paginator->sort('name_of_work'),
                $paginator->sort('estimation_amount'),
                $paginator->sort('as_number'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($workdetails AS $workdetail) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'edit_workdetails',
                	$workdetail['Workdetail']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'delete_workdetails', $workdetail['Workdetail']['id']), 
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                  $workdetail['Workdetail']['year'],
                  $workdetail['Workdetail']['name_of_work'],
                  $workdetail['Workdetail']['estimation_amount'],
                  $workdetail['Workdetail']['as_number'],
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