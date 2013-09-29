<tr>
  <th><?php echo $field->renderLabel() ?></th>
  <td>
    <?php echo $field->renderError() ?>
    <table>
      <tr>
        <td><?php echo $field['street']->renderLabel() ?><br /><?php echo $field['street'] ?></td>
        <td><?php echo $field['number']->renderLabel() ?><br /><?php echo $field['number']->render(array('size' => '7')) ?></td>
        <td><?php echo $field['postbox']->renderLabel() ?><br /><?php echo $field['postbox']->render(array('size' => '7')) ?></td>
      </tr>
      <tr>
        <td><?php echo $field['city']->renderLabel() ?><br /><?php echo $field['city'] ?></td>
        <td><?php echo $field['postcode']->renderLabel() ?><br /><?php echo $field['postcode']->render(array('size' => '7')) ?></td>
      </tr>
      <tr>
        <td colspan="3"><?php echo $field['province']->renderLabel() ?><br /><?php echo $field['province'] ?></td>
      </tr>
      <tr>  
        <td colspan="3"><?php echo $field['state']->renderLabel() ?><br /><?php echo $field['state'] ?></td>
      </tr>
    </table>
  </td>
</tr>
