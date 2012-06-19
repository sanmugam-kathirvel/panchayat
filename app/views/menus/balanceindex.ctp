
<div class="blocks form">
    <h2><?php __('Opening Balance'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Opening Balance', true), array('action'=>'addopeningbals')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('account_id'),
                $paginator->sort('account_number'),
                $paginator->sort('bank_name'),
                $paginator->sort('branch'),
                $paginator->sort('opening_cash_balance'),
                $paginator->sort('opening_bank_balance'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($balances AS $balance) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'editbalance',
                	$balance['BankDetail']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'deletebalance', $balance['BankDetail']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                    $balance['Account']['account_name'],
                    $balance['BankDetail']['account_number'],
                    $balance['BankDetail']['bank_name'],
                    $balance['BankDetail']['branch'],
                    $balance['BankDetail']['opening_cash_balance'],
                    $balance['BankDetail']['opening_bank_balance'],
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