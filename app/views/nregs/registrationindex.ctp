
<div class="blocks form">
    <h2><?php __('Registrations'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Add New Registration', true), array('action'=>'newregistration')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0">
        <?php
            $tableHeaders = $html->tableHeaders(array(
                $paginator->sort('family_number'),
                $paginator->sort('serial_number'),
                $paginator->sort('job_card_number'),
                $paginator->sort('name'),
                $paginator->sort('father_or_husband_name'),
                $paginator->sort('hamlet_id'),
                $paginator->sort('sex'),
                $paginator->sort('age'),
                $paginator->sort('community'),
                $paginator->sort('address'),
                $paginator->sort('ration_card_number'),
                $paginator->sort('voter_id_number'),
                $paginator->sort('bank_account_number'),
                $paginator->sort('bank_name'),
                $paginator->sort('bank_branch'),
                $paginator->sort('application_date'),
                $paginator->sort('job_card_issue_date'),
                __('Actions', true),
            ));
            echo $tableHeaders;
    
            $rows = array();
            foreach ($nregs_reg AS $nregs) {
                $actions = ' ' . $html->link(__('Edit', true), array(
                	'action' => 'editregistration',
                	$nregs['NregsRegistration']['id']));
								$actions .= ' ' . $html->link(__('View', true), array(
                	'action' => 'view',
                	$nregs['NregsRegistration']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                  'action' => 'deleteregistration', $nregs['NregsRegistration']['id']),
                	null, __('Are you sure?', true)
								);
                $rows[] = array(
                    $nregs['NregsRegistration']['family_number'],
                    $nregs['NregsRegistration']['serial_number'],
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