<div class="blocks form">
    <h2><?php __('Account 4 (NREGS)'); ?></h2>
    <div class="actions">
    	<ul>
        <li><?php echo $html->link(__('Registration', true), array('action'=>'../nregs/registrationindex')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('Job Cards', true), array('action'=>'../nregs/jobcardindex')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('NMR Rolls', true), array('action'=>'')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('Roll Entry', true), array('action'=>'')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('Work details', true), array('controller' => 'nregs', 'action'=>'index_workdetails')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('Attendance', true), array('controller' => 'nregs', 'action'=>'attendance_index')); ?></li>
      </ul>
    </div>
</div>