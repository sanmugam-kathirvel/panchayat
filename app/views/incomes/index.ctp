
<div class="blocks form">
    <h2><?php __('Incomes'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Income', true), array('action'=>'addincome')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('account_id'),
                $paginator->sort('header_id'),
                $paginator->sort('income_date'),
                $paginator->sort('income_amount'),
                $paginator->sort('description'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($incomes AS $income) {
                $actions = ' ' . $html->link(__('Edit', true), array('action' => 'edit', $income['Income']['id'],$income['Income']['account_id'],  $income['Income']['income_amount']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                    'action' => 'delete',
                    $income['Income']['id'],$income['Income']['account_id'],  $income['Income']['income_amount']
                ), null, __('Are you sure?', true));
    
                $rows[] = array(
                    $income['Account']['account_name'],
                    $income['Header']['header_name'],
                    $income['Income']['income_date'],
                    $income['Income']['income_amount'],
                    $income['Income']['description'],
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