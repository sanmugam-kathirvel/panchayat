<div class="blocks form">
    <h2><?php __('வருகைப் பதிவேடு'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய வருகையைப் பதிவு செய்', true), array('action'=>'attendance')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('ஆரம்ப தேதி','from_date'),
                $paginator->sort('இருதி தேதி', 'to_date'),
                //$paginator->sort('estimation_amount'),
                $paginator->sort('ஊதியத்தின் நிலை', 'payment_status'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($attendances AS $attendance) {
                // $actions = ' ' . $html->link(__('Edit', true), array(
                	// 'action' => 'edit_workdetails',
                	// $attendance['AttendanceRegister']['id']));
                // $actions .= ' ' . $html->link(__('Delete', true), array(
                  // 'action' => 'delete_workdetails', $attendance['AttendanceRegister']['id']), 
                	// null, __('Are you sure?', true)
								// );
								if($attendance['AttendanceRegister']['payment_status'] != 'yes'){
										$actions = ' ' . $html->link(__('பணம் வழங்கு', true), array(
                   		'action' => 'payment', 'attendance_id' =>$attendance['AttendanceRegister']['id']));
                }else{
                		$actions = ' ' .'-';
                }
                $rows[] = array(
                  $attendance['AttendanceRegister']['from_date'],
                  $attendance['AttendanceRegister']['to_date'],
                  //var_dump($attendance),
                  $attendance['AttendanceRegister']['payment_status'] == 'yes' ? 'ஊதியம் வழங்கப்பட்டது' : 'ஊதியம் வழங்கப்படவில்லை',
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