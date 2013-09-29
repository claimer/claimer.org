<?php use_helper('OrdinalNumber') ?>

<?php slot('title', __('%user - Register new damage', array('%user' => $form->getObject()->getClaimant()->getUsername()))) ?>

<?php $ordinalImportance = ordinalNumber($form->getObject()->getImportance()) ?>
<h2 class="importance">
  <?php echo __('What is %user <b>%importance most</b> important loss or damage?',
                array('%user' => $form->getObject()->getClaimant()->getUsername(),
                      '%importance' => ($ordinalImportance == '1st' ? '' : $ordinalImportance))) ?>
</h2>
<?php slot('steps', get_partial('damages/steps', array('step' => $form->getCurrentStep()))) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderFormTag(url_for('user_damage_new', $form->getObject()->getClaimant())) ?>
  <?php if ($form->getObject()->isNew()): ?>
  <?php echo $form[$form->getCurrentStepName()]['type_id'] ?>
  <?php echo $form[$form->getCurrentStepName()]['type_id']->renderError() ?>
  <?php endif; ?>
  <table>
    <?php include_partial('damages/fields_row_with_hidden', array('field' => $form[$form->getCurrentStepName()]['cause_id'], 'other' => $form[$form->getCurrentStepName()]['cause_other'])) ?>
    <?php include_partial('damages/fields_row', array('field' => $form[$form->getCurrentStepName()]['occurred_at'])) ?>
    <?php include_partial('damages/fields_address_state', array('field' => $form[$form->getCurrentStepName()]['Where'])) ?>
  </table>
  
  <?php echo $form->renderHiddenFields() ?>
  
  <?php slot('steps_footer') ?>
    <input type="submit" name="next" value="<?php echo __('Next >>') ?>" />
  <?php end_slot() ?>
  <?php include_partial('damages/steps_footer') ?>
</form>
