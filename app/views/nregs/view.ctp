
<div class="blocks form">
    <h2><?php __('Registrations'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Back', true), array('action'=>'registrationindex')); ?></li>
        </ul>
    </div>
    <div class='view-data'>
    	<label>Family Number</label>
    	<p><?php echo $registration_detail['NregsRegistration']['family_number']; ?></p>
    	<p><?php echo $html->image('/photo/'.$registration_detail['NregsRegistration']['id']."_p.jpg"); ?></p>
    </div>
          <?php echo $registration_detail['NregsRegistration']['serial_number']; ?>
          <?php echo $registration_detail['NregsRegistration']['job_card_number']; ?>
          <?php echo $registration_detail['NregsRegistration']['name']; ?>
          <?php echo $registration_detail['NregsRegistration']['father_or_husband_name']; ?>
          <?php echo $registration_detail['Hamlet']['hamlet_code']; ?>
          <?php echo $registration_detail['NregsRegistration']['sex']; ?>
          <?php echo $registration_detail['NregsRegistration']['age']; ?>
          <?php echo $registration_detail['NregsRegistration']['community']; ?>
          <?php echo $registration_detail['NregsRegistration']['address']; ?>
          <?php echo $registration_detail['NregsRegistration']['ration_card_number']; ?>
          <?php echo $registration_detail['NregsRegistration']['voter_id_number']; ?>
          <?php echo $registration_detail['NregsRegistration']['bank_account_number']; ?>
          <?php echo $registration_detail['NregsRegistration']['bank_name']; ?>
          <?php echo $registration_detail['NregsRegistration']['bank_branch']; ?>
          <?php echo $registration_detail['NregsRegistration']['application_date']; ?>
          <?php echo $registration_detail['NregsRegistration']['job_card_issue_date']; ?>
</div>