<?php use_helper('Date', 'UrlPagerSort') ?>

<?php if ($pager->count() > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo link_to_pager_sort(__('Sender'), $route, $pager, 'sender') ?></th>
      <th><?php echo __('Sent to') ?></th>
      <th><?php echo link_to_pager_sort(__('Subject'), $route, $pager, 'subject') ?></th>
      <th><?php echo link_to_pager_sort(__('Sent date'), $route, $pager, 'sent_date') ?></th>
      <th><?php echo __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $mail): ?>
    <tr>
      <td><?php echo $mail['Sender']['username'] ?></td>
      <td><?php echo $mail['recipients_label'] ?></td>
      <td><?php echo $mail['subject']  ?></td>
      <td><?php echo format_datetime($mail['created_at'], 'g') ?></td>
      <td>
        <?php echo link_to(__('View'), 'mail_view', $mail) ?>
        <?php echo link_to(__('Delete'), 'mail_delete', $mail, array('method' => 'delete', 'confirm' => 'The email will be deleted. Are you sure?')) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include_partial('damages/pager', array('pager' => $pager,
                                             'route' => $route)) ?>
<?php else: ?>
<p><b><?php echo __("No sent email.") ?></b></p>
<?php endif; ?>
