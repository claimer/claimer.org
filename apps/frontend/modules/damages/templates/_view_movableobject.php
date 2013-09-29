<?php use_helper('Number') ?>

<?php if (! empty($damage['movableobject_kind'])): ?>
<h3><?php echo __('What kind of object has been damaged?') ?></h3>
<p><?php echo $damage['movableobject_kind'] ?></p>
<?php endif; ?>

<?php $address = $damage['Damage']['Where']; ?>
<?php if (count(array_filter($address->getRawValue()->toArray(), 'strlen')) > 3): ?>
<h3><?php echo __('Where was the object when it was damaged?') ?></h3>
<?php include_partial('view_address', array('address' => $address)) ?>
<?php endif; ?>

<h3><?php echo __('Estimated value of your object before it was damaged') ?></h3>
<p><?php echo format_currency($damage['ValueBefore']['value'], $damage['ValueBefore']['Currency']['code']) ?></p>

<h3><?php echo __('Estimated value of your object after it was damaged') ?></h3>
<p><?php echo format_currency($damage['ValueAfter']['value'], $damage['ValueAfter']['Currency']['code']) ?></p>
