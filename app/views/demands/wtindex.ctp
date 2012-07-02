
<div class="blocks form">
    <h2><?php __('Water Tax Demand'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Water tax Demand', true), array('action'=>'addwtdemand')); ?></li>
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
                $paginator->sort('wt_pending'),
                $paginator->sort('wt_current'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($demands AS $demand) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'wtedit',
                	$demand['WtDemand']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'wtdelete', $demand['WtDemand']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                    $demand['WtDemand']['demand_number'],
                    $demand['WtDemand']['demand_date'],
                    $demand['WtDemand']['door_number'],
                    $demand['WtDemand']['name'],
                    $demand['WtDemand']['father_name'],
                    $demand['WtDemand']['address'],
                    $demand['Hamlet']['hamlet_code'],
                    $demand['WtDemand']['wt_pending'],
                    $demand['WtDemand']['wt_current'],
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