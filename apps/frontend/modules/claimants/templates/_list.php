<?php use_helper('Date', 'Number', 'UrlPagerSort') ?>

<?php if ($pager->count() > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo link_to_pager_sort(__('Username'), $route, $pager, 'username') ?></th>
      <?php if ($pager->hasSortField('manager')): ?>
      <th><?php echo link_to_pager_sort(__('Registrant'), $route, $pager, 'manager') ?></th>
      <?php endif; ?>
      <th><?php echo link_to_pager_sort(__('Email'), $route, $pager, 'email') ?></th>
      <th><?php echo link_to_pager_sort(__('Register date'), $route, $pager, 'register_date') ?></th>
      <th><?php echo link_to_pager_sort(__('Total value'), $route, $pager, 'total_value') ?></th>
      <th><?php echo __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $user): ?>
    <tr>
      <td><?php echo $user['username'] ?></td>
      <?php if ($pager->hasSortField('manager')): ?>
      <td><?php echo isset($user['Manager']) ? $user['Manager']['username'] : "-" ?></td>
      <?php endif; ?>
      <td><?php echo $user['email_address'] ?></td>
      <td><?php echo format_date($user['created_at']) ?></td>
      <td><?php echo format_currency((isset($user['total_value']) ? $user['total_value'] : 0), sfConfig::get('app_claimer_default_currency')) ?></td>
      <td>
        <?php echo link_to(__('New damage'), 'user_damage_new', $user) ?> -
        <?php echo link_to(__('View'), 'user_view', $user) ?> -
        <?php echo link_to(__('Edit'), 'user_edit', $user) ?>
        <?php if ($sf_user->getGuardUser()->getId() != $user->getId()): ?>
         - <?php echo link_to(__('Delete'), 'user_delete', $user, array('method' => 'delete', 'confirm' => 'All damages of this claimant will be deleted. Are you sure?')) ?>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include_partial('damages/pager', array('pager' => $pager,
                                             'route' => $route)) ?>
<?php else: ?>
<p><b><?php echo __("No registered claimant.") ?></b></p>
<?php endif; ?>
