<tr>
  <th><?php echo $field->renderLabel() ?></th>
  <td>
    <?php echo $field->renderError() ?>
    <?php echo $field['value']->render(array('size' => '8')) ?> <?php echo $field['currency_id'] ?>
   <small><?php echo __('(no dot, no comma, please)') ?></small>
  </td>
</tr>
