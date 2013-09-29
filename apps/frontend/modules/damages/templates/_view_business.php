<?php use_helper('Number') ?>

<?php if (! empty($damage['business_kind'])): ?>
<h3><?php echo __('What kind of business has been damaged?') ?></h3>
<p><?php echo $damage['business_kind'] ?></p>
<?php endif; ?>

<?php if (! empty($damage['business_name'])): ?>
<h3><?php echo __('What is/was the name of the business?') ?></h3>
<p><?php echo $damage['business_name'] ?></p>
<?php endif; ?>

<?php $address = $damage['Damage']['Where']; ?>
<?php if (count(array_filter($address->getRawValue()->toArray(), 'strlen')) > 3): ?>
<h3><?php echo __('Where was the business located?') ?></h3>
<?php include_partial('view_address', array('address' => $address)) ?>
<?php endif; ?>

<?php $address = $damage['AddressNow']; ?>
<?php if (count(array_filter($address->getRawValue()->toArray(), 'strlen')) > 3): ?>
<h3><?php echo __('Where is the business located today?') ?></h3>
<?php include_partial('view_address', array('address' => $address)) ?>
<?php endif; ?>

<h3><?php echo __('What was the annual business turn-over prior to the damage?') ?></h3>
<p><?php echo format_currency($damage['ValueBT']['value'], $damage['ValueBT']['Currency']['code']) ?></p>

<h3><?php echo __('What was the annual profit prior to the damage?') ?></h3>
<p><?php echo format_currency($damage['ValueBP']['value'], $damage['ValueBP']['Currency']['code']) ?></p>

<h3><?php echo __('What is the annual turn-over today?') ?></h3>
<p><?php echo format_currency($damage['ValueTT']['value'], $damage['ValueTT']['Currency']['code']) ?></p>

<h3><?php echo __('What is the annual profit today?') ?></h3>
<p><?php echo format_currency($damage['ValueTP']['value'], $damage['ValueTP']['Currency']['code']) ?></p>

<h3><?php echo __('Estimated purchase value of your business before being damaged?') ?></h3>
<p><?php echo format_currency($damage['ValueBefore']['value'], $damage['ValueBefore']['Currency']['code']) ?></p>

<h3><?php echo __('Estimated value of your business after being damaged?') ?></h3>
<p><?php echo format_currency($damage['ValueAfter']['value'], $damage['ValueAfter']['Currency']['code']) ?></p>

<h3><?php echo __('Total amount of the damage') ?></h3>
<p><?php echo format_currency($damage['ValueTotal']['value'], $damage['ValueTotal']['Currency']['code']) ?></p>
