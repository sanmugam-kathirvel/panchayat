<div class="blocks form">
    <h2><?php __('கணக்கு எண் 1'); ?></h2>
    <div class="actions">
    	<ul>
        <li><?php echo $html->link(__('கொள்முதல்', true), array('action'=>'../purchases/index')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('ஊதியம்', true), array('action'=>'../salaries/index')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('வரைவு மதிப்பீடு', true), array('action'=>'../bills/index', '1')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('வரவுகள்', true), array('action'=>'../incomes/index', '1')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('செலவுகள்', true), array('action'=>'../expenses/index', '1')); ?></li>
      </ul>
			<ul>
      	<li><?php echo $html->link(__('ரசீதுகள்', true), array('action'=>'../receipts/index')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('ரொக்கத் தொகையை வங்கி கணக்கிற்கு மாற்றுதல்', true), array('action'=>'../receipts/cashtobank_index')); ?></li>
      </ul>
    </div>
</div>