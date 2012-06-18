
<div class="blocks form">
    <h2><?php __('Expenses'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Expense', true), array('action'=>'addexpense')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('account_id'),
                $paginator->sort('header_id'),
                $paginator->sort('expense_date'),
                $paginator->sort('voucher_number'),
                $paginator->sort('expense_amount'),
                $paginator->sort('drawee_name'),
                $paginator->sort('cheque_number'),
                $paginator->sort('cheque_date'),
                $paginator->sort('description'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($expenses AS $expense) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'edit',
                	$expense['Expense']['id'],$expense['Expense']['account_id'],  $expense['Expense']['expense_amount']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'delete',
                  $expense['Expense']['id'],$expense['Expense']['account_id'],  $expense['Expense']['expense_amount']
                ), null, __('Are you sure?', true));
    
                $rows[] = array(
                    $expense['Account']['account_name'],
                    $expense['Header']['header_name'],
                    $expense['Expense']['expense_date'],
                    $expense['Expense']['voucher_number'],
                    $expense['Expense']['expense_amount'],
                    $expense['Expense']['drawee_name'],
                    $expense['Expense']['cheque_number'],
                    $expense['Expense']['cheque_date'],
                    $expense['Expense']['description'],
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