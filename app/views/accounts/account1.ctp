<div class="blocks form">
    <h2><?php __('Account 1'); ?></h2>
    <div class="actions">
    	<ul>
        <li><?php echo $html->link(__('Purchases', true), array('action'=>'../purchases/purchase')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('Salaries', true), array('action'=>'../salaries/salary')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('Bill Estimations', true), array('action'=>'../bills/index', '1')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('Incomes', true), array('action'=>'../incomes/index', '1')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('Expenses', true), array('action'=>'../expenses/index', '1')); ?></li>
      </ul>
			<ul>
      	<li><?php echo $html->link(__('Receipts', true), array('action'=>'../receipts/index')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('Transfer Cash To Bank', true), array('action'=>'../receipts/cashtobank')); ?></li>
      </ul>
    </div>
</div>