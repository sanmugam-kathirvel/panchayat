<div class="blocks form">
    <h2><?php __('Account 5'); ?></h2>
    <div class="actions">
      <ul>
      	<li><?php echo $html->link(__('Incomes', true), array('action'=>'../incomes/index', '5')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('Expenses', true), array('action'=>'../expenses/index', '5')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('Bill Estimations', true), array('action'=>'../bills/index', '5')); ?></li>
      </ul>
    </div>
</div>