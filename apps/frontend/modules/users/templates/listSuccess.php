<?php slot('title', __('Users')) ?>

<div class="right">
  <?php echo link_to(
    __('New user'), 
    'user_new',
    array(),
    array('method' => 'get', 'class' => 'button button_alt')
  ) ?>
</div>

<div class="separator clear-right"></div>

<?php include_partial('users/list', array('pager' => $pager,
                                          'route' => url_for('users'))) ?>
