
<div class="blocks form">
    <h2><?php __('Hamlets'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Hamlet', true), array('action'=>'addhamlet')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('hamlet_code'),
                $paginator->sort('hamlet_name'),
                $paginator->sort('description'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($hamlets AS $hamlet) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'edithamlet',
                	$hamlet['Hamlet']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'deletehamlet', $hamlet['Hamlet']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                    $hamlet['Hamlet']['hamlet_code'],
                    $hamlet['Hamlet']['hamlet_name'],
                    $hamlet['Hamlet']['description'],
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