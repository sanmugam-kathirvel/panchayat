
<div class="blocks form">
    <h2><?php __('கையிருப்பு விபரம்'); ?></h2>
    <div class="actions">
        <!-- <ul>
            <li><?php echo $html->link(__('புதிய தொடக்க இருப்புத் தொகையை சேர்', true), array('action'=>'addopeningbals')); ?></li>
        </ul> -->
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('பொருளின் பெயர்', 'item_name'),
								$paginator->sort('பொருளின் அளவு', 'item_quantity'),
								$paginator->sort('விவரிப்பு', 'description')
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($stocks AS $stock) {
                $rows[] = array(
										$stock['Stock']['item_name'],
                    $stock['Stock']['item_quantity'],
                    $stock['Stock']['description']
                );
            }
    
            echo $html->tableCells($rows);
            //echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>