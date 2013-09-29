<?php use_helper('Escaping', 'Date', 'Number', 'UrlPagerSort') ?>

<?php
  function esc_group_names($group) { return esc_specialchars($group['name']); }
?>

<?php if ($pager->count() > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo link_to_pager_sort(__('Username'), $route, $pager, 'username') ?></th>
      <th><?php echo link_to_pager_sort(__('Registrant'), $route, $pager, 'manager') ?></th>
      <th><?php echo link_to_pager_sort(__('Email'), $route, $pager, 'email') ?></th>
      <th><?php echo link_to_pager_sort(__('Register date'), $route, $pager, 'register_date') ?></th>
      <th><?php echo __('Groups') ?></th>
      <th><?php echo __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $user): ?>
    <tr>
      <td><?php echo $user['username']  ?></td>
      <td><?php echo isset($user['Manager']['username']) ? $user['Manager']['username'] : '-' ?></td>
      <td><?php echo $user['email_address'] ?></td>
      <td><?php echo format_date($user['created_at']) ?></td>
      <td><?php echo implode(', ', array_map('esc_group_names', $user['Groups']->toArray()->getRawValue())) ?></td>
      <td>
        <?php if ($user->hasPermission('create_damage')): ?>
        <?php echo link_to(__('New damage'), 'user_damage_new', $user) ?> -
        <?php endif; ?>
        <?php echo link_to(__('View'), 'user_view', $user) ?>
        - <?php echo link_to(__('Edit'), 'user_edit', $user) ?>
        <?php if ($sf_user->getUsername() != $user->getUsername()): ?>
        - <?php echo link_to(__('Delete'), 'user_delete', $user, array('method' => 'delete', 'confirm' => 'The user will be deleted. Are you sure?')) ?>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include_partial('damages/pager', array('pager' => $pager,
                                             'route' => $route)) ?>
<?php else: ?>
<p><b><?php echo __("No result.") ?></b></p>
<?php endif; ?>
