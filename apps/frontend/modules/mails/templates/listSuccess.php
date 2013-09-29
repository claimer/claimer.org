<?php slot('title', __('Sent emails')) ?>

<div class="right">
  Send an email to :
  <?php if ($sf_user->hasCredential(array('administer_any_user', 'administer_granted_user'), false)): ?>
  <?php echo link_to(
    __('Users'), 
    'mail_users',
    array(), 
    array('method' => 'get', 'class' => 'button button_alt')
  ) ?>
  <?php endif; ?>
  
  <?php if ($sf_user->hasCredential(array('administer_managed_user', 'manage_claimants'), true)): ?>
  <?php echo link_to(
    __('Claimants'), 
    'mail_managed',
    array(), 
    array('method' => 'get', 'class' => 'button button_alt')
  ) ?>
  <?php endif; ?>
</div>

<div class="separator clear-right"></div>

<?php include_partial('mails/list', array('pager' => $pager,
                                          'route' => url_for('mails'))) ?>
