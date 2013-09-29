<?php use_helper('Number') ?>

<h3><?php echo __('How much money did you lose between the damaging event and today?') ?></h3>
<p><?php echo format_currency($damage['ValueBetween']['value'], $damage['ValueBetween']['Currency']['code']) ?></p>

<h3><?php echo __('How much money will you lose for the same reason per year in the future?') ?></h3>
<p><?php echo format_currency($damage['ValuePerYear']['value'], $damage['ValuePerYear']['Currency']['code']) ?></p>

<?php if (! empty($damage['otherloss_years_until'])): ?>
<h3><?php echo __('For how many years do you think you will continue to lose the same amount?') ?></h3>
<p><?php echo $damage['otherloss_years_until'] ?></p>
<?php endif; ?>
