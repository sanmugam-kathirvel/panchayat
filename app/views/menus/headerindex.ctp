
<div class="blocks form">
    <h2><?php __('Headers'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Header', true), array('action'=>'addheader')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('account_id'),
                $paginator->sort('header_name'),
                $paginator->sort('header_type'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($headers AS $header) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'editheader',
                	$header['Header']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'deleteheader', $header['Header']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                    $header['Account']['account_name'],
                    $header['Header']['header_name'],
                    $header['Header']['header_type'],
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