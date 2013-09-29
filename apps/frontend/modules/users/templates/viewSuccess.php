<?php use_helper('Date', 'I18N') ?>

<?php slot('title', __('%user profile', array('%user' => $user['username']))) ?>

<div class="right">
  <?php echo link_to(
    __('Edit'), 
    'user_edit',
    $user,
    array('method' => 'get', 'class' => 'button button_alt')
  ) ?>
</div>

<div class="clear-right"></div>

<h2><?php echo __('Username') ?></h2>
<p><?php echo $user['username'] ?></p>

<?php if (! empty($user['Profile']['manager_id'])): ?>
<?php $manager = $user['Profile']['Manager']; ?>
<h2><?php echo __('Registrant') ?></h2>
<p><?php echo $manager['username'] ?></p>
<?php endif; ?>

<?php if (! empty($user['last_name']) || ! empty($user['first_name'])): ?>
<h2><?php echo __('Name') ?></h2>
<p><?php echo $user['last_name'] ?> <? echo $user['first_name'] ?></p>
<?php endif; ?>

<h2><?php echo __('Email') ?></h2>
<p><?php echo $user['email_address'] ?></p>
<?php if (! empty($user['Profile']['email_alt'])): ?>
<p><?php echo $user['Profile']['email_alt'] ?></p>
<?php endif; ?>

<?php if (! empty($user['Profile']['phone'])): ?>
<h2><?php echo __('Phone') ?></h2>
<p><?php echo $user['Profile']['phone'] ?></p>
<?php if (! empty($user['Profile']['phone_alt'])): ?>
<p><?php echo $user['Profile']['phone_alt'] ?></p>
<?php endif; ?>
<?php endif; ?>

<?php $address = $user['Profile']['Address']; ?>
<?php if (count(array_filter($address->getRawValue()->toArray(), 'strlen')) > 3): ?>
<h2><?php echo __('Address') ?></h2>
<?php include_partial('damages/view_address', array('address' => $address)) ?>
<?php endif; ?>
