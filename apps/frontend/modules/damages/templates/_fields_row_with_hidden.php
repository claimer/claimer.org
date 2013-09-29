<?php use_javascript('damages.js') ?>

<tr>
  <th><?php echo $field->renderLabel() ?></th>
  <td>
      <?php echo $field->renderError() ?>
      <?php echo $field->render(array('class' => 'with-hidden')) ?>
      <?php echo $other->render(array('class' => $other->getValue() ? '' : 'hidden')) ?>
  </td>
</tr>
