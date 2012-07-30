<div class="blocks form">
    <h2><?php __('கேட்புகள்'); ?></h2>
    <div class="actions">
    	<ul>
            <li><?php echo $html->link(__('வீட்டு வரி கேட்பு', true), array('action'=>'htindex')); ?></li>
      </ul>
      <ul>
          <li><?php echo $html->link(__('குடிநீர் வரி கேட்பு', true), array('action'=>'wtindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('தொழில் வரி கேட்பு', true), array('action'=>'ptindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('டி & ஓ வியாபாரிகளின் கேட்பு', true), array('action'=>'doindex')); ?></li>
      </ul>
    </div>
</div>