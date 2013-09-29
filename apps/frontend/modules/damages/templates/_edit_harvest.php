<table>
  <?php include_partial('fields_row', array('field' => $form['harvest_crops'])) ?>
  <?php include_partial('fields_row', array('field' => $form['harvest_feed_before'])) ?>
  <?php include_partial('fields_row', array('field' => $form['harvest_feed_after'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueBefore'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueAfter'])) ?>
  <?php include_partial('fields_row', array('field' => $form['harvest_permanent'])) ?>
  <?php include_partial('fields_row', array('field' => $form['harvest_living_today'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueMonth'])) ?>
  <?php include_partial('fields_value', array('field' => $form['ValueNeed'])) ?>
</table>
