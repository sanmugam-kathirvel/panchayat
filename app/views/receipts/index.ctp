<div class="blocks form">
    <h2><?php echo 'ரசீதுகள்'; ?></h2>
    <div class="actions">
    	<ul>
            <li><?php echo $html->link(__('வீட்டு வரி ரசீது', true), array('action'=>'addhousetaxreceipt')); ?></li>
      </ul>
      <ul>
          <li><?php echo $html->link(__('குடிநீர் வரி ரசீது', true), array('action'=>'addwatertaxreceipt')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('தொழில் வரி ரசீது', true), array('action'=>'addprofessionaltaxreceipt')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('டி & ஓ வியாபாரிகள் வரி ரசீது', true), array('action'=>'adddotaxreceipt')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('மற்ற ரசீதுகள்', true), array('action'=>'addothersreceipt')); ?></li>
      </ul>
    </div>
</div>