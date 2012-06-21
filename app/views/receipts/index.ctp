<div class="blocks form">
    <h2><?php __('Receipts'); ?></h2>
    <div class="actions">
    	<ul>
            <li><?php echo $html->link(__('House Tax Receipts', true), array('action'=>'addhousetaxreceipt')); ?></li>
      </ul>
      <ul>
          <li><?php echo $html->link(__('water Tax Receipts', true), array('action'=>'addwatertaxreceipt')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('Professional Tax Receipts', true), array('action'=>'addprofessionaltaxreceipt')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('D & O Trader Receipts', true), array('action'=>'adddotaxreceipt')); ?></li>
      </ul>
    </div>
</div>