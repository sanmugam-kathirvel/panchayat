<div class="blocks form">
    <h2><?php __('Scrap Register'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add New Scrap', true), array('action'=>'add')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('scrap_detail'),
                $paginator->sort('quantity'),
                $paginator->sort('estimation_date'),
                $paginator->sort('estimation_amount'),
                $paginator->sort('tender_status'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($scraps AS $scrap) {
            	if($scrap['Scrap']['tender_status'] == 'available'){
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'edit',
                	$scrap['Scrap']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'delete', $scrap['Scrap']['id']), 
                	null, __('Are you sure?', true)
								);
							}else{
								$actions = ' ' . $html->link(__('View', true), array(
                	'action' => 'view',
                	$scrap['Scrap']['id']));
							}
                $rows[] = array(
                  $scrap['Scrap']['scrap_detail'],
                  $scrap['Scrap']['quantity'],
                  $scrap['Scrap']['estimation_date'],
                  $scrap['Scrap']['estimation_amount'],
                  $scrap['Scrap']['tender_status'] =='available' ? $html->link($scrap['Scrap']['tender_status'], array('controller' => 'scraps', 'action' => 'tender', 'id' => $scrap['Scrap']['id'])): $scrap['Scrap']['tender_status'],
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