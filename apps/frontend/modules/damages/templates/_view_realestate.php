<?php use_helper('Number') ?>

<?php if (! empty($damage['RealestateType']['name'])): ?>
<h3><?php echo __('Type of real estate') ?></h3>
<p><?php echo $damage['RealestateType']['name'] ?><?php if (! empty($damage['realestate_type_other'])): ?> - <?php echo $damage['realestate_type_other'] ?><?php endif; ?></p>
<?php endif; ?>

<?php $address = $damage['Damage']['Where']; ?>
<?php if (count(array_filter($address->getRawValue()->toArray(), 'strlen')) > 3): ?>
<h3><?php echo __('Where was the real estate property?') ?></h3>
<?php include_partial('view_address', array('address' => $address)) ?>
<?php endif; ?>

<h3><?php echo __('Estimated value of your real estate property before the damage') ?></h3>
<p><?php echo format_currency($damage['ValueBefore']['value'], $damage['ValueBefore']['Currency']['code']) ?></p>

<h3><?php echo __('Estimated value of your real estate property after the damage') ?></h3>
<p><?php echo format_currency($damage['ValueAfter']['value'], $damage['ValueAfter']['Currency']['code']) ?></p>
