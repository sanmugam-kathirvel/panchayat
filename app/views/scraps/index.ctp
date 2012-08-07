<div class="blocks form">
    <h2><?php __('கழிவுகளின் பதிவேடு'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய கழிவுகளைச் சேர்', true), array('action'=>'add')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('கழிவுகளின் விபரம்', 'scrap_detail'),
                $paginator->sort('அளவு', 'quantity'),
                $paginator->sort('மத்திப்பீடு செய்த தேதி', 'estimation_date'),
                $paginator->sort('மத்திப்பீடு செய்த தொகை', 'estimation_amount'),
                $paginator->sort('ஏலக்குத்தகையின் நிலை', 'tender_status'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($scraps AS $scrap) {
            	if($scrap['Scrap']['tender_status'] == 'available'){
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'edit',
                	$scrap['Scrap']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'delete', $scrap['Scrap']['id']), 
                	null, __('கண்டிப்பாக நீக்க விரும்புகிறீர்களா?', true)
								);
							}else{
								$actions = ' ' . $html->link(__('நோக்கு', true), array(
                	'action' => 'view',
                	$scrap['Scrap']['id']));
							}
                $rows[] = array(
                  $scrap['Scrap']['scrap_detail'],
                  $scrap['Scrap']['quantity'],
                  $scrap['Scrap']['estimation_date'],
                  $scrap['Scrap']['estimation_amount'],
                  $scrap['Scrap']['tender_status'] =='available' ? $html->link('இருக்கின்றது', array('controller' => 'scraps', 'action' => 'tender', 'id' => $scrap['Scrap']['id'])): 'விற்றுத் தீர்ந்துவிட்டது',
                  $actions,
                );
            }
    
            echo $html->tableCells($rows);
            echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('பக்கம் %pages%இல் %page%, இங்கே தெரிவது மொத்தம் %count%இல் %current% பதிவேடு(கள்), ஆரம்பப் பதிவேடு எண் %start%, இறுதிப் பதிவேடு எண் %end%', true))); ?></div>