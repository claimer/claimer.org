<?php use_helper('Date', 'Number', 'I18N') ?>

<?php slot('title', __('Damage %validationcode', array('%validationcode' => $damage['validationcode']))) ?>

<div class="right">
  <?php echo link_to(
    __('Edit'), 
    'damage_edit',
    $damage,
    array('method' => 'get', 'class' => 'button button_alt')
  ) ?>
</div>

<div class="clear-right"></div>

<h2><?php echo __('Overview') ?></h2>
<h3><?php echo __('Damage') ?></h3>
<p><?php echo $damage['Type']['name'] ?></p>
<h3><?php echo __('What was the event that caused the damage?') ?></h3>
<p><?php echo $damage['Cause']['name'] ?><?php if (! empty($damage['Cause']['other'])): ?> - <?php echo $damage['Cause']['other'] ?><?php endif; ?></p>
<h3><?php echo __('When') ?></h3>
<p><?php echo format_date($damage['occurred_at']) ?></p>
<?php if (! empty($damage['Where']['state'])): ?>
<h3><?php echo __('Where') ?></h3>
<p><?php echo format_country($damage['Where']['state']) ?></p>
<?php endif; ?>
<h3><?php echo __('Total value') ?></h3>
<p><?php echo format_currency($damage['Value']['value'], sfConfig::get('app_claimer_default_currency')) ?></p>
<h3><?php echo __('Created date') ?></h3>
<p><?php echo format_date($damage['created_at'], 'g') ?></p>
<h3><?php echo __('Updated date') ?></h3>
<p><?php echo format_date($damage['updated_at'], 'g') ?></p>

<h2><?php echo __('Claimant') ?></h2>
<p><?php echo $damage['Claimant']['username'] ?> (<?php echo link_to(__('View profile'), 'user_view', $damage['Claimant']) ?>)</p>

<?php if (! empty($damage['description'])): ?>
<h2><?php echo __('Description') ?></h2>
<p><?php echo $damage['description'] ?></p>
<?php endif; ?>

<?php if (! empty($damage['story'])): ?>
<h2><?php echo __('Story') ?></h2>
<p><?php echo $damage['story'] ?></p>
<?php endif; ?>

<h2><?php echo __('%type damage', array('%type' => $damage['Type']['name'])) ?></h2>
<?php include_partial('view_'.$damage['Type']['type'], array('damage' => $damage->getDetails())) ?>

<?php if ($damage->hasCoowners()): ?>
<h2><?php echo __('Coowners') ?></h2>
<?php foreach ($damage->getCoowners() as $index => $coowner): ?>
<h3><?php echo __('Coowner %index', array('%index' => $index + 1)) ?>
<?php if (! empty($coowner['percentage'])): ?>
<h4><?php echo __('Percentage') ?></h4>
<p><?php echo $coowner['percentage'] ?>%</p>
<?php endif; ?>
<?php if (! empty($coowner['lastname']) || ! empty($coowner['firstname'])): ?>
<h4><?php echo __('Name') ?></h4>
<p><?php echo $coowner['lastname'] ?> <?php echo $coowner['firstname'] ?></p>
<?php endif; ?>
<?php if (! empty($coowner['email'])): ?>
<h4><?php echo __('Email') ?></h4>
<p><?php echo $coowner['email'] ?>%</p>
<?php endif; ?>
<?php if (! empty($coowner['email_alt'])): ?>
<h4><?php echo __('Email alt') ?></h4>
<p><?php echo $coowner['email_alt'] ?>%</p>
<?php endif; ?>
<?php if (! empty($coowner['phone'])): ?>
<h4><?php echo __('Phone') ?></h4>
<p><?php echo $coowner['phone'] ?>%</p>
<?php endif; ?>
<?php if (! empty($coowner['phone_alt'])): ?>
<h4><?php echo __('Phone alt') ?></h4>
<p><?php echo $coowner['phone_alt'] ?>%</p>
<?php endif; ?>
<?php $address = $coowner['Address']; ?>
<?php if (count(array_filter($address->getRawValue()->toArray(), 'strlen')) > 3): ?>
<h4><?php echo __('Address') ?></h4>
<?php include_partial('view_address', array('address' => $address)) ?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>

<?php if ($damage->hasDocuments()): ?>
<h2><?php echo __('Documents') ?></h2>
<?php foreach($damage->getDocuments() as $index => $document): ?>
<h3><?php echo __('Document %index', array('%index' => $index + 1)) ?></h3>
<h4><?php echo __('File') ?></h4>
<p><?php echo link_to(__('Download'), '@damage_document_view?validationcode='.$damage['validationcode'].'&md5_fname='.md5($document['filename'])) ?></p>
<?php if (! empty($document['description'])): ?>
<h4><?php echo __('description') ?></h4>
<p><?php echo $document['description'] ?></p>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
