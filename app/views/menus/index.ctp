<div class="blocks form">
    <h2><?php __('முதன்மை'); ?></h2>
    <div class="actions">
    	<ul>
            <li><?php echo $html->link(__('தொடக்க இருப்புத் தொகை', true), array('action'=>'balanceindex')); ?></li>
      </ul>
      <ul>
          <li><?php echo $html->link(__('குக்கிராமங்கள்', true), array('action'=>'hamletindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('தலைப்புகள்', true), array('action'=>'headerindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('தொடக்கக் கையிருப்பு', true), array('action'=>'stockindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('கையிருப்பு விநியோகம்', true), array('action'=>'issueindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('புத்தகக் கையிருப்பு விபரம்', true), array('action'=>'bookindex')); ?></li>
      </ul>
      <ul>
            <li><?php echo $html->link(__('கழிவுகளின் விபரம்', true), array('controller' => 'scraps', 'action'=>'index')); ?></li>
      </ul>
    </div>
</div>