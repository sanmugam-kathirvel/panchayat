<div class="blocks form">
    <h2><?php __('Attendance Register'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add New Attendance', true), array('action'=>'attendance')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('from_date'),
                $paginator->sort('to_date'),
                //$paginator->sort('estimation_amount'),
                $paginator->sort('payment_status'),
                __('Actions', true),
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
										$actions = ' ' . $html->link(__('Pay', true), array(
                   		'action' => 'payment', 'attendance_id' =>$attendance['AttendanceRegister']['id']));
                }else{
                		$actions = ' ' .'Paid';
                }
                $rows[] = array(
                  $attendance['AttendanceRegister']['from_date'],
                  $attendance['AttendanceRegister']['to_date'],
                  //var_dump($attendance),
                  $attendance['AttendanceRegister']['payment_status'],
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