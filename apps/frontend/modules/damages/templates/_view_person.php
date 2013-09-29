<?php use_helper('Number') ?>

<?php if (! empty($damage['person_name'])): ?>
<h3><?php echo __('Name(s)') ?></h3>
<p><?php echo $damage['person_name'] ?></p>
<?php endif; ?>

<?php if (! empty($damage['person_firstname'])): ?>
<h3><?php echo __('First name(s)') ?></h3>
<p><?php echo $damage['person_firstname'] ?></p>
<?php endif; ?>

<?php $address = $damage['Damage']['Where']; ?>
<?php if (count(array_filter($address->getRawValue()->toArray(), 'strlen')) > 3): ?>
<h3><?php echo __('Last address data') ?></h3>
<?php include_partial('view_address', array('address' => $address)) ?>
<?php endif; ?>

<?php if (! empty($damage['PersonType']['name'])): ?>
<h3><?php echo __('Was this person your mother, your father, your child, your husband, your wife, your grand-father, your grand-mother, your grand-child?') ?></h3>
<p><?php echo $damage['PersonType']['name'] ?><?php if (! empty($damage['person_relationship_other'])): ?> - <?php echo $damage['person_relationship_other'] ?><?php endif; ?></p>
<?php endif; ?>

<?php if (! empty($damage['person_death_where'])): ?>
<h3><?php echo __('Where did this person die?') ?></h3>
<p><?php echo $damage['person_death_where'] ?></p>
<?php endif; ?>

<?php if (! empty($damage['person_death_reason'])): ?>
<h3><?php echo __('What was the concrete reason for the death?') ?></h3>
<p><?php echo $damage['person_death_reason'] ?></p>
<?php endif; ?>

<h3><?php echo __('How much did you have to pay for medical treatment prior to the death of this person?') ?></h3>
<p><?php echo format_currency($damage['ValueMed']['value'], $damage['ValueMed']['Currency']['code']) ?></p>

<h3><?php echo __('How much did you have to pay for the funeral of this person?') ?></h3>
<p><?php echo format_currency($damage['ValueFuneral']['value'], $damage['ValueFuneral']['Currency']['code']) ?></p>

<h3><?php echo __('How much money did you lose because you could not work during the time you had to care for this person?') ?></h3>
<p><?php echo format_currency($damage['ValueCare']['value'], $damage['ValueCare']['Currency']['code']) ?></p>

<h3><?php echo __('How much money did the dead person lose because he or she could not work before dying?') ?></h3>
<p><?php echo format_currency($damage['ValueWork']['value'], $damage['ValueWork']['Currency']['code']) ?></p>
