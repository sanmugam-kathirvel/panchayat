
<div class="blocks form">
    <h2><?php __('ரசீது புத்தகத்தின் தகவல்'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய புத்தகத்தின் தகவலைச் சேர்', true), array('action' => 'addbook')); ?></li>
            <li><?php echo $html->link(__('ரசீது புத்தகத்தை உபயோகிப்பதற்க்கு வழங்கு', true), array('action' => 'book_issue')); ?></li>
        </ul>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('புத்தகத்தின் பெயர்', 'book_name'),
								$paginator->sort('வாங்கிய தேதி', 'purchase_date'),
								$paginator->sort('நிறுவனத்தின் பெயர்', 'company_name'),
                $paginator->sort('புத்தகத்தின் எண்', 'book_number'),
                $paginator->sort('ஆரம்ப ரசீது எண்', 'start_receipt_number'),
                $paginator->sort('இருதி ரசீது எண்', 'end_receipt_number'),
                $paginator->sort('நிலை', 'status'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($books AS $book) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'editbook',
                	$book['BookDetail']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'deletebook', $book['BookDetail']['id']),
                	null, __('கண்டிப்பாக நீக்க விரும்புகிரீர்களா?', true)
								);
                $rows[] = array(
										$book['Book']['book_name'],
                    $book['BookDetail']['purchase_date'],
                    $book['BookDetail']['company_name'],
                    $book['BookDetail']['book_number'],
                    $book['BookDetail']['start_receipt_number'],
                    $book['BookDetail']['end_receipt_number'],
                    $book['BookDetail']['status'] == 'available' ? 'இருகின்றது'  : 'வழங்கப்பட்டது' ,
                    $actions,
                );
            }
    
            echo $html->tableCells($rows);
            echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இருதிப் பதிவேடு எண் %end%', true))); ?></div>