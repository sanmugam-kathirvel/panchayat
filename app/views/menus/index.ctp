<div class="blocks form">
    <h2><?php __('Demands'); ?></h2>
    <div class="actions">
    	<ul>
            <li><?php echo $html->link(__('Opening Balance', true), array('action'=>'balanceindex')); ?></li>
      </ul>
      <ul>
          <li><?php echo $html->link(__('Hamlets', true), array('action'=>'hamletindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('Headers', true), array('action'=>'headerindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('Opening Stock', true), array('action'=>'stockindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('Stock Issue', true), array('action'=>'issueindex')); ?></li>
      </ul>
    </div>
</div>