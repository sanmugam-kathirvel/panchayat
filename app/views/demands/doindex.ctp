
<div class="blocks form">
    <h2><?php __('Professional Tax Demand'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add D&O Traders Demand', true), array('action'=>'adddodemand')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('demand_number'),
                $paginator->sort('demand_date'),
                $paginator->sort('door_number'),
                $paginator->sort('name'),
                $paginator->sort('father_name'),
                $paginator->sort('address'),
                $paginator->sort('hamlet_id'),
                $paginator->sort('do_demand'),
                $paginator->sort('pending_amount'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($demands AS $demand) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'doedit',
                	$demand['DoDemand']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'dodelete', $demand['DoDemand']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                    $demand['DoDemand']['demand_number'],
                    $demand['DoDemand']['demand_date'],
                    $demand['DoDemand']['door_number'],
                    $demand['DoDemand']['name'],
                    $demand['DoDemand']['father_name'],
                    $demand['DoDemand']['address'],
                    $demand['Hamlet']['hamlet_code'],
                    $demand['DoDemand']['do_demand'],
                    $demand['DoDemand']['pending_amount'],
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