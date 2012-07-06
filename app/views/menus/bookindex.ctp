
<div class="blocks form">
    <h2><?php __('Book Details'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add Book Detail', true), array('action'=>'addbook')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('book_name'),
								$paginator->sort('purchase_date'),
								$paginator->sort('company_name'),
                $paginator->sort('book_number'),
                $paginator->sort('start_receipt_number'),
                $paginator->sort('end_receipt_number'),
                $paginator->sort('status'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($books AS $book) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'editbook',
                	$book['BookDetail']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'deletebook', $book['BookDetail']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
										$book['Book']['book_name'],
                    $book['BookDetail']['purchase_date'],
                    $book['BookDetail']['company_name'],
                    $book['BookDetail']['book_number'],
                    $book['BookDetail']['start_receipt_number'],
                    $book['BookDetail']['end_receipt_number'],
                    $book['BookDetail']['status'],
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