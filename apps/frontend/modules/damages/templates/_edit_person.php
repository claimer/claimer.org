<table>
  <?php include_partial('fields_row', array('field' => $form['person_name'])) ?>
  <?php include_partial('fields_row', array('field' => $form['person_firstname'])) ?>
  <?php include_partial('fields_address', array('field' => $form['address'])) ?>
  <?php include_partial('fields_row_with_hidden', array('field' => $form['person_relationship_id'], 'other' => $form['person_relationship_other'])) ?>
  <?php include_partial('fields_row', array('field' => $form['person_death_where'])) ?>
  <?php include_partial('fields_row', array('field' => $form['person_death_reason'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueMed'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueFuneral'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueCare'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueWork'])) ?>
</table>
