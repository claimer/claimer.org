<table>
  <?php include_partial('fields_address', array('field' => $form['address'])) ?>
  <?php include_partial('fields_row', array('field' => $form['description'])) ?>
  <?php include_partial('fields_row_with_hidden', array('field' => $form['realestate_type_id'], 'other' => $form['realestate_type_other'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueBefore'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueAfter'])) ?>
  <?php include_partial('fields_row', array('field' => $form['coowners'])) ?>
</table>
