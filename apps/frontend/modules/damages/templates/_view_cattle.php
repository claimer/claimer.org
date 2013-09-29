<?php use_helper('Number') ?>

<?php if (! empty($damage['cattle_first_animal'])): ?>
<h3><?php echo __('First animal') ?></h3>
<h4><?php echo __('What is the most important animal you had before the damage?') ?></h4>
<p><?php echo $damage['cattle_first_animal'] ?></p>
<h4><?php echo __('How many of them could you sell or eat each year before the damage?') ?></h4>
<p><?php echo $damage['cattle_first_eachyear'] ?></p>
<h4><?php echo __('How many of them did you loose due to the damage?') ?></h4>
<p><?php echo $damage['cattle_first_loses'] ?></p>
<h4><?php echo __('What was the price for each animal at the time of the damage?') ?></h4>
<p><?php echo format_currency($damage['ValueFirst']['value'], $damage['ValueFirst']['Currency']['code']) ?></p>
<?php endif; ?>

<?php if (! empty($damage['cattle_second_animal'])): ?>
<h3><?php echo __('Second animal') ?></h3>
<h4><?php echo __('What is the second most important animal you had before the damage?') ?></h4>
<p><?php echo $damage['cattle_second_animal'] ?></p>
<h4><?php echo __('How many of them could you sell or eat each year before the damage?') ?></h4>
<p><?php echo $damage['cattle_second_eachyear'] ?></p>
<h4><?php echo __('How many of them did you loose due to the damage?') ?></h4>
<p><?php echo $damage['cattle_second_loses'] ?></p>
<h4><?php echo __('What was the price for each animal at the time of the damage?') ?></h4>
<p><?php echo format_currency($damage['ValueSecond']['value'], $damage['ValueSecond']['Currency']['code']) ?></p>
<?php endif; ?>

<?php if (! empty($damage['cattle_third_animal'])): ?>
<h3><?php echo __('Third animal') ?></h3>
<h4><?php echo __('What is the third most important animal you had before the damage?') ?></h4>
<p><?php echo $damage['cattle_third_animal'] ?></p>
<h4><?php echo __('How many of them could you sell or eat each year before the damage?') ?></h4>
<p><?php echo $damage['cattle_third_eachyear'] ?></p>
<h4><?php echo __('How many of them did you loose due to the damage?') ?></h4>
<p><?php echo $damage['cattle_third_loses'] ?></p>
<h4><?php echo __('What was the price for each animal at the time of the damage?') ?></h4>
<p><?php echo format_currency($damage['ValueThird']['value'], $damage['ValueThird']['Currency']['code']) ?></p>
<?php endif; ?>

<?php if (! empty($damage['cattle_fourth_animal'])): ?>
<h3><?php echo __('Fourth animal') ?></h3>
<h4><?php echo __('What is the fourth most important animal you had before the damage?') ?></h4>
<p><?php echo $damage['cattle_fourth_animal'] ?></p>
<h4><?php echo __('How many of them could you sell or eat each year before the damage?') ?></h4>
<p><?php echo $damage['cattle_fourth_eachyear'] ?></p>
<h4><?php echo __('How many of them did you loose due to the damage?') ?></h4>
<p><?php echo $damage['cattle_fourth_loses'] ?></p>
<h4><?php echo __('What was the price for each animal at the time of the damage?') ?></h4>
<p><?php echo format_currency($damage['ValueFourth']['value'], $damage['ValueFourth']['Currency']['code']) ?></p>
<?php endif; ?>

<?php if (! empty($damage['cattle_fifth_animal'])): ?>
<h3><?php echo __('Fifth animal') ?></h3>
<h4><?php echo __('What is the fifth most important animal you had before the damage?') ?></h4>
<p><?php echo $damage['cattle_fifth_animal'] ?></p>
<h4><?php echo __('How many of them could you sell or eat each year before the damage?') ?></h4>
<p><?php echo $damage['cattle_fifth_eachyear'] ?></p>
<h4><?php echo __('How many of them did you loose due to the damage?') ?></h4>
<p><?php echo $damage['cattle_fifth_loses'] ?></p>
<h4><?php echo __('What was the price for each animal at the time of the damage?') ?></h4>
<p><?php echo format_currency($damage['ValueFifth']['value'], $damage['ValueFifth']['Currency']['code']) ?></p>
<?php endif; ?>

<?php if (! empty($domage['cattle_ground_details'])): ?>
<h3><?php echo __('Have you permanently lost the ground or the buildings necessary to elevate your cattle? If yes, please give details.') ?></h3>
<p><?php echo $damage['cattle_ground_details'] ?></p>
<?php endif; ?>

<?php if (! empty($domage['cattle_living_today'])): ?>
<h3><?php echo __('Have you permanently lost the ground or the buildings necessary to elevate your cattle? If yes, please give details.') ?></h3>
<h3><?php echo __('Are you still living from your cattle today?') ?></h3>
<p><?php echo $damage['cattle_living_today'] ?></p>
<?php endif; ?>
