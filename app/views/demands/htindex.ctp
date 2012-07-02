
<div class="blocks form">
    <h2><?php __('House Tax Demand'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add House tax Demand', true), array('action'=>'addhtdemand')); ?></li>
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
                $paginator->sort('ht_pending'),
                $paginator->sort('ht_current'),
                $paginator->sort('lc_pending'),
                $paginator->sort('lc_current'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($demands AS $demand) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'htedit',
                	$demand['HtDemand']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'htdelete', $demand['HtDemand']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                    $demand['HtDemand']['demand_number'],
                    $demand['HtDemand']['demand_date'],
                    $demand['HtDemand']['door_number'],
                    $demand['HtDemand']['name'],
                    $demand['HtDemand']['father_name'],
                    $demand['HtDemand']['address'],
                    $demand['Hamlet']['hamlet_code'],
                    $demand['HtDemand']['ht_pending'],
                    $demand['HtDemand']['ht_current'],
                    $demand['HtDemand']['lc_pending'],
                    $demand['HtDemand']['lc_current'],
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