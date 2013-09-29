<tr>
  <th><?php echo $address->renderLabel() ?></th>
  <td>
    <?php echo $address->renderError() ?>
    <table>
      <tr>
        <td><?php echo $address['street']->renderLabel() ?><br /><?php echo $address['street'] ?></td>
        <td><?php echo $address['number']->renderLabel() ?><br /><?php echo $address['number']->render(array('size' => '7')) ?></td>
        <td><?php echo $address['postbox']->renderLabel() ?><br /><?php echo $address['postbox']->render(array('size' => '7')) ?></td>
      </tr>
      <tr>
        <td><?php echo $address['province']->renderLabel() ?><br /><?php echo $address['province'] ?></td>
        <td><?php echo $address['city']->renderLabel() ?><br /><?php echo $address['city'] ?></td>
        <td><?php echo $address['postcode']->renderLabel() ?><br /><?php echo $address['postcode']->render(array('size' => '7')) ?></td>
      </tr>
      <tr>
        <td colspan="3"><?php echo $address['state']->renderLabel() ?><br /><?php echo $address['state'] ?></td>
      <tr>
    </table>
  </td>
</tr>
