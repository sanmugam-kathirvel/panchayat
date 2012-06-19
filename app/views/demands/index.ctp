<div class="blocks form">
    <h2><?php __('Demands'); ?></h2>
    <div class="actions">
    	<ul>
            <li><?php echo $html->link(__('House Tax Demand', true), array('action'=>'htindex')); ?></li>
      </ul>
      <ul>
          <li><?php echo $html->link(__('Water Tax Demand', true), array('action'=>'wtindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('Professional Tax Demand', true), array('action'=>'ptindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('D&O Traders Demand', true), array('action'=>'doindex')); ?></li>
      </ul>
    </div>
</div>