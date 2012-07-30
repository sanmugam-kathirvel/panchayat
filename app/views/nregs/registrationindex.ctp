
<div class="blocks form">
    <h2><?php echo 'பணியாளர்களின் பதிவீடு'; ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('புதிய பணியாளர்களின் பதிவீடு விபரங்களைச் சேர்', true), array('action'=>'newregistration')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('குடும்ப எண்', 'family_number'),
                $paginator->sort('வேலை அடையாள அட்டை எண்', 'job_card_number'),
                $paginator->sort('பெயர்', 'name'),
                $paginator->sort('தந்தை / கணவர் பெயர்', 'father_or_husband_name'),
                $paginator->sort('குக்கிராமத்தின் குறியீடு', 'hamlet_id'),
                $paginator->sort('பாலினம்', 'sex'),
                $paginator->sort('வயது', 'age'),
                $paginator->sort('சாதி', 'community'),
                $paginator->sort('முகவரி', 'address'),
                $paginator->sort('குடும்ப அடையாள அட்டை எண்', 'ration_card_number'),
                $paginator->sort('வாக்காளர் அடையாள அட்டை எண்', 'voter_id_number'),
                $paginator->sort('வங்கி கணக்கு எண்', 'bank_account_number'),
                $paginator->sort('வங்கியின் பெயர்', 'bank_name'),
                $paginator->sort('வங்கி கிளை', 'bank_branch'),
                $paginator->sort('விண்ணப்பம் வாங்கிய தேதி', 'application_date'),
                $paginator->sort('வேலை அடையாள அட்டை வழங்கிய தேதி', 'job_card_issue_date'),
                				__('செயல்கள்', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($nregs_reg AS $nregs) {
                $actions = ' ' . $html->link(__('திருத்து', true), array(
                	'action' => 'editregistration',
                	$nregs['NregsRegistration']['id']));
								$actions .= ' ' . $html->link(__('நோக்கு', true), array(
                	'action' => 'view',
                	$nregs['NregsRegistration']['id']));
                $actions .= ' ' . $html->link(__('நீக்கு', true), array(
                  'action' => 'deleteregistration', $nregs['NregsRegistration']['id']),
                	null, __('கண்டிப்பாக நீக்க விரும்புகிரீர்களா?', true)
								);
                $rows[] = array(
                    $nregs['NregsRegistration']['family_number'],
                    $nregs['NregsRegistration']['job_card_number'],
                    $nregs['NregsRegistration']['name'],
                    $nregs['NregsRegistration']['father_or_husband_name'],
                    $nregs['Hamlet']['hamlet_code'],
                    $nregs['NregsRegistration']['sex'],
                    $nregs['NregsRegistration']['age'],
                    $nregs['NregsRegistration']['community'],
                    $nregs['NregsRegistration']['address'],
                    $nregs['NregsRegistration']['ration_card_number'],
                    $nregs['NregsRegistration']['voter_id_number'],
                    $nregs['NregsRegistration']['bank_account_number'],
                    $nregs['NregsRegistration']['bank_name'],
                    $nregs['NregsRegistration']['bank_branch'],
                    $nregs['NregsRegistration']['application_date'],
                    $nregs['NregsRegistration']['job_card_issue_date'],
                    $actions,
                );
            }
    
            echo $html->tableCells($rows);
            echo $tableHeaders;
        ?>
    </table>
</div>

<div class="paging"><?php echo $paginator->numbers(); ?></div>
<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>