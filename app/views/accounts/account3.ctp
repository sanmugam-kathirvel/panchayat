<div class="blocks form">
    <h2><?php __('கணக்கு எண் 3'); ?></h2>
    <div class="actions">
      <ul>
      	<li><?php echo $html->link(__('வரவுகள்', true), array('action'=>'../incomes/index', '3')); ?></li>
      </ul>
      <ul>
      	<li><?php echo $html->link(__('செலவுகள்', true), array('action'=>'../expenses/index', '3')); ?></li>
      </ul>
      <ul>
        <li><?php echo $html->link(__('வரைவு மதிப்பீடு', true), array('action'=>'../bills/index', '3')); ?></li>
      </ul>
    </div>
</div>