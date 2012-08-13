<div class="blocks form">
    <h2><?php __('கணக்கு எண் 4 (NREGS)'); ?></h2>
    <div class="actions">
    	<ul>
        <li><?php echo $html->link(__('பதிவு செய்தல்', true), array('action'=>'registrationindex')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('வேலை அடையாள அட்டை', true), array('action'=>'jobcardindex')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('NMR பட்டியல்', true), array('action'=>'nmr_roll_index')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('வேலையின் விபரம்', true), array('action'=>'index_workdetails')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('வருகை மற்றும் பணம் வழங்கல் பதிவேடு', true), array('action'=>'attendance_index')); ?></li>
      </ul>
    </div>
</div>