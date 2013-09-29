<?php use_helper('Number') ?>

<?php if (! empty($damage['harvest_crops'])): ?>
<h3><?php echo __('What kind of crops did you plant before the damage?') ?></h3>
<p><?php echo $damage['harvest_crops'] ?></p>
<?php endif; ?>

<?php if (! empty($damage['harvest_feed_before'])): ?>
<h3><?php echo __('How many people of your family could you feed before the damage?') ?></h3>
<p><?php echo $damage['harvest_feed_before'] ?></p>
<?php endif; ?>

<?php if (! empty($damage['harvest_feed_after'])): ?>
<h3><?php echo __('How many people of your family can you feed today?') ?></h3>
<p><?php echo $damage['harvest_feed_after'] ?></p>
<?php endif; ?>

<h3><?php echo __('How much money did you make before the damage each year by selling a part of the harvest?') ?></h3>
<p><?php echo format_currency($damage['ValueBefore']['value'], $damage['ValueBefore']['Currency']['code']) ?></p>

<h3><?php echo __('How much money do you make now each year by selling a part of the harvest?') ?></h3>
<p><?php echo format_currency($damage['ValueAfter']['value'], $damage['ValueAfter']['Currency']['code']) ?></p>

<?php if (! empty($damage['harvest_permanent'])): ?>
<h3><?php echo __('Have you permanently lost the ground necessary to grow crops? If yes, please give details.') ?></h3>
<p><?php echo $damage['harvest_permanent'] ?></p>
<?php endif; ?>

<?php if (! empty($damage['harvest_living_today'])): ?>
<h3><?php echo __('Are you still living from your harvests today? If no, what do you do for a living today?') ?></h3>
<p><?php echo $damage['harvest_living_today'] ?></p>
<?php endif; ?>

<h3><?php echo __('How much do you earn today per month?') ?></h3>
<p><?php echo format_currency($damage['ValueMonth']['value'], $damage['ValueMonth']['Currency']['code']) ?></p>

<h3><?php echo __('How much would you need to earn per month to have a life at the same level as before the damage?') ?></h3>
<p><?php echo format_currency($damage['ValueNeed']['value'], $damage['ValueNeed']['Currency']['code']) ?></p>
