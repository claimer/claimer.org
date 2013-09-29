<tr>
  <th><?php echo $field->renderLabel() ?></th>
  <td>
    <?php echo $field->renderError() ?>
    <table>
      <tr>
        <td>
          <?php echo $field['state']->renderLabel() ?><br />
          <?php echo $field['state'] ?>
        </td>
      </tr>
    </table>
  </td>
</tr>