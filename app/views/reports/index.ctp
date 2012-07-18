<div class="blocks form">
    <h2><?php __('Reports'); ?></h2>
    <div class="actions">
    	<ul>
        <li><?php echo $html->link(__('Form 3 (House tax)', true), array('action'=>'form3_report')); ?></li>
      </ul>
			<ul>
        <li><?php echo $html->link(__('Form 5 (Professional tax)', true), array('action'=>'form5_report')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('Form 6 (Water tax)', true), array('action'=>'form6_report')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('Cash Book (Account I)', true), array('action'=>'form11_reoprt', '2012-07-01', '2012-07-31')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('Cash Book (Account II)', true), array('action'=>'form23_reoprt', '2012-07-01', '2012-07-31')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('Cash Book (Account III)', true), array('action'=>'form26_reoprt', '2012-07-01', '2012-07-31')); ?></li>
      </ul>
    </div>
</div>