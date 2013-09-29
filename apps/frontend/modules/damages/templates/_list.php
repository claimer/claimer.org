<?php use_helper('Date', 'Number', 'UrlPagerSort') ?>

<?php if ($pager->count() > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo link_to_pager_sort(__('Code'), $route, $pager, 'code') ?></th>
      <?php if ($pager->hasSortField('manager')): ?>
      <th><?php echo link_to_pager_sort(__('Registrant'), $route, $pager, 'manager') ?></th>
      <?php endif; ?>
      <?php if ($pager->hasSortField('claimant')): ?>
      <th><?php echo link_to_pager_sort(__('Claimant'), $route, $pager, 'claimant') ?></th>
      <?php endif; ?>
      <th><?php echo link_to_pager_sort(__('Type'), $route, $pager, 'type') ?></th>
      <th><?php echo link_to_pager_sort(__('Cause'), $route, $pager, 'cause') ?></th>
      <th><?php echo link_to_pager_sort(__('Value'), $route, $pager, 'value') ?></th>
      <th><?php echo link_to_pager_sort(__('When'), $route, $pager, 'when') ?></th>
      <th><?php echo link_to_pager_sort(__('Where'), $route, $pager, 'where') ?></th>
      <th><?php echo __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $damage): ?>
    <tr>
      <td><?php echo link_to($damage['validationcode'], 'damage_view', $damage->getRawValue()) ?></td>
      <?php if ($pager->hasSortField('manager')): ?>
      <td><?php echo isset($damage['Claimant']['Manager']) ? $damage['Claimant']['Manager']['username'] : '-' ?></td>
      <?php endif; ?>
      <?php if ($pager->hasSortField('claimant')): ?>
      <td><?php echo $damage['Claimant']['username'] ?></td>
      <?php endif; ?>
      <td><?php echo $damage['Type']['name'] ?></td>
      <td><?php echo $damage['Cause']['name'] ?></td>
      <td><?php echo format_currency($damage['Value']['value'], sfConfig::get('app_claimer_default_currency')) ?></td>
      <td><?php echo format_date($damage['occurred_at']) ?></td>
      <td><?php echo format_country($damage['Where']['state']) ?></td>
      <td>
        <?php echo link_to(__('View'), 'damage_view', $damage) ?> -
        <?php echo link_to(__('Edit'), 'damage_edit', $damage) ?> -
        <?php echo link_to(__('Delete'), 'damage_delete', $damage, array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr>
      <td colspan="<?php echo $pager->countFields() + 1 ?>">
      <b><?php echo __('Total value: %value', array('%value' => format_currency($totalValue, sfConfig::get('app_claimer_default_currency')))); ?></b>
    </td>
    </tr>
  </tbody>
</table>

<?php include_partial('damages/pager', array('pager' => $pager,
                                             'route' => $route)) ?>
<?php endif; ?>
