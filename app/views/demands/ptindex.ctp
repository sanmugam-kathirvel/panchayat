
<div class="blocks form">
    <h2><?php __('Professional Tax Demand'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Professional tax Demand', true), array('action'=>'addptdemand')); ?></li>
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
                $paginator->sort('company_name'),
                $paginator->sort('half_yearly_income'),
                $paginator->sort('part1_pending'),
                $paginator->sort('part1_current'),
                $paginator->sort('part2_pending'),
                $paginator->sort('part2_current'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($demands AS $demand) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'ptedit',
                	$demand['PtDemand']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'ptdelete', $demand['PtDemand']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                    $demand['PtDemand']['demand_number'],
                    $demand['PtDemand']['demand_date'],
                    $demand['PtDemand']['door_number'],
                    $demand['PtDemand']['name'],
                    $demand['PtDemand']['father_name'],
                    $demand['PtDemand']['address'],
                    $demand['Hamlet']['hamlet_code'],
                    $demand['PtDemand']['company_name'],
                    $demand['PtDemand']['half_yearly_income'],
                    $demand['PtDemand']['part1_pending'],
                    $demand['PtDemand']['part1_current'],
                    $demand['PtDemand']['part2_pending'],
                    $demand['PtDemand']['part2_current'],
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