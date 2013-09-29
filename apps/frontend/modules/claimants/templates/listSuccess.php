<?php slot('title', __('Claimants')) ?>

<div class="right">
  <?php if ($pager->count() > 0): ?>
  <?php echo link_to(
    __('Send an email to claimants'), 
    'mail_managed',
    array(), 
    array('method' => 'get', 'class' => 'button')
  ) ?>
  <?php endif; ?>
  
  <?php echo link_to(
    __('New claimant'), 
    'claimant_new',
    array(), 
    array('method' => 'get', 'class' => 'button button_alt')
  ) ?>
</div>

<div class="separator clear-right"></div>

<?php include_partial('claimants/list', array('pager' => $pager,
                                              'route' => url_for('claimants'))) ?>
