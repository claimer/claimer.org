<table>
  <?php include_partial('fields_row', array('field' => $form['business_kind'])) ?>
  <?php include_partial('fields_row', array('field' => $form['business_name'])) ?>
  <?php include_partial('fields_address', array('field' => $form['address'])) ?>
  <?php include_partial('fields_address', array('field' => $form['address_now'])) ?>
  <?php include_partial('fields_row', array('field' => $form['description'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueBT'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueBP'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueTT'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueTP'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueBefore'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueAfter'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueTotal'])) ?>
  <?php include_partial('fields_row', array('field' => $form['coowners'])) ?>
</table>
