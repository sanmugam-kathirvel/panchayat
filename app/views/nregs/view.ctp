
<div class="blocks form">
  <h2><?php echo 'பணியாளரின் பதிவீடு விபரம்'; ?></h2>
  <div class="actions">
      <ul>
          <li><?php echo $html->link(__('பின் செல்', true), array('action'=>'registrationindex')); ?></li>
      </ul>
  </div>
  <div class='view-data'>
  	<p align="left"><?php echo $html->image('/photo/'.$registration_detail['NregsRegistration']['id']."_p.jpg"); ?></p>
  </div>
  <table>
  	<tr>
  		<td>குடும்ப எண்</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['family_number']; ?> </td>
  	</tr>
    <tr>
    	<td>வேலை அடையாள அட்டை எண்</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['job_card_number']; ?> </td>
  	</tr>
    <tr>
    	<td>பெயர்</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['name']; ?> </td>
  	</tr>
    <tr>
    	<?php
    		if($registration_detail['NregsRegistration']['sex'] == 'ஆண்'){
    			echo "\n\t\t\t<td>தந்தை பெயர்</td>\n";
				}else{
					echo "\n\t\t\t<td>தந்தை / கணவர் பெயர்</td>\n";
				}
    	?>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['father_or_husband_name']; ?> </td>
  	</tr>
    <tr>
    	<td>குக்கிராமத்தின் குறியீடு</td>
  	 	<td> <?php echo $registration_detail['Hamlet']['hamlet_code']; ?> </td>
  	</tr>
    <tr>
    	<td>பாலினம்</td>
 	 		<td> <?php echo $registration_detail['NregsRegistration']['sex']; ?> </td>
  	</tr>
    <tr>
    	<td>வயது</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['age']; ?> </td>
  	</tr>
    <tr>
    	<td>சாதி</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['community']; ?> </td>
  	</tr>
    <tr>
    	<td>முகவரி</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['address']; ?> </td>
  	</tr>
    <tr>
    	<td>குடும்ப அடையாள அட்டை எண்</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['ration_card_number']; ?> </td>
  	</tr>
    <tr>
    	<td>வாக்காளர் அடையாள அட்டை எண் அட்டை எண்</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['voter_id_number']; ?> </td>
  	</tr>
    <tr>
    	<td>வங்கி கணக்கு எண்</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['bank_account_number']; ?> </td>
  	</tr>
    <tr>
    	<td>வங்கியின் பெயர்</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['bank_name']; ?> </td>
  	</tr>
    <tr>
    	<td>வங்கி கிளை</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['bank_branch']; ?> </td>
  	</tr>
    <tr>
    	<td>விண்ணப்பம் வாங்கிய தேதி</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['application_date']; ?> </td>
  	</tr>
    <tr>
    	<td>வேலை அடையாள அட்டை வழங்கிய தேதி</td>
  	 	<td> <?php echo $registration_detail['NregsRegistration']['job_card_issue_date']; ?> </td>
  	</tr>
  </table>
</div>